<?php
$campaign = esc_url(home_url('/campaign/'));
$voice = esc_url(home_url('/voice/'));
$price = esc_url(home_url('/price/'));
$single = esc_url(home_url('/single/'));
$contact = esc_url(home_url('/contact/'));
?>
<aside class="sidebar">
  <div class="sidebar__popular">
    <h2 class="sidebar__title sidebar-title">人気記事</h2>
    <div class="sidebar__cards popular-cards">
      <?php
      $args = array(
        'post_type' => 'post',
        'meta_key' => 'post_views_count',
        'orderby' => 'meta_value_num',
        'posts_per_page' => 3,
        'order' => 'DESC',
      );
      $the_view_query = new WP_Query($args);
      if ($the_view_query->have_posts()) :
        while ($the_view_query->have_posts()) : $the_view_query->the_post();
      ?>
      <a href="<?php echo get_permalink(); ?>" class="popular-cards__item popular-card">

        <div class="popular-card__image">
          <?php if (get_the_post_thumbnail()) : ?>
          <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title() ?>のアイキャッチ画像">
          <?php else : ?>
          <img src="<?php echo get_theme_file_uri(); ?>/dist/assets/images/common/no-image.jpg" alt="noimage">
          <?php endif; ?>
        </div>
        <div class="popular-card__body">
          <time class="popular-card__time" datetime="<?php the_time('c'); ?>"><?php the_time('Y.m.d'); ?></time>
          <p class="popular-card__title"><?php the_title(); ?></p>
        </div>
      </a>
      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
      <?php endif; ?>
    </div>
  </div>

  <div class="sidebar__voice">
    <h2 class="sidebar__title sidebar-title">口コミ</h2>
    <?php
      $args = array(
        'post_type' => 'voice',
        'post_status' => 'publish', // 公開済の投稿を指定
        'posts_per_page' => 1,
        'orderby' => 'post_date',
        'order' => 'DESC',
      );
      $the_view_query = new WP_Query($args);
      if ($the_view_query->have_posts()) :
        while ($the_view_query->have_posts()) : $the_view_query->the_post();
      ?>
    <div class="sidebar__voice-itme sidebar-voice">
      <div class="sidebar-voice__image">
        <?php if (has_post_thumbnail()) {
                the_post_thumbnail('post-thumbnail');
              } ?>
      </div>
      <div class="sidebar-voice__body">
        <?php $guest = get_field('guest'); ?>
        <?php if ($guest) : ?>
        <p class="sidebar-voice__guest"><?php echo $guest; ?></p>
        <?php endif; ?>
        <h3 class="sidebar-voice__title"><?php the_title(); ?></h3>
      </div>
      <div class="sidebar-voice__wrapper">
        <a href="<?php echo $voice; ?>" class="button"><span class="button__text">View
            more</span>
        </a>
      </div>
    </div>
    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
    <?php endif; ?>

  </div>

  <div class="sidebar__campaign">
    <h2 class="sidebar__campaign-title sidebar-title">キャンペーン</h2>

    <div class="sidebar__campaign-cards archive-campaign-cards archive-campaign-cards--sideber">

      <?php
      $args = array(
        'post_type' => 'campaign',
        'post_status' => 'publish', // 公開済の投稿を指定
        'posts_per_page' => 2,
        'orderby' => 'post_date',
        'order' => 'DESC',
      );
      $the_view_query = new WP_Query($args);
      if ($the_view_query->have_posts()) :
        while ($the_view_query->have_posts()) : $the_view_query->the_post();
      ?>
      <div class="archive-campaign-cards__item">
        <div class="campaign-card">
          <figure class="campaign-card__img">
            <?php if (has_post_thumbnail()) {
                the_post_thumbnail('post-thumbnail');
              } ?>
          </figure>
          <div class="campaign-card__inner">
            <div class="campaign-card__body">
              <h2 class="campaign-card__title campaign-card__title--sub"><?php the_title(); ?></h2>
            </div>
            <div class="campaign-card__price">
              <p class="campaign-card__person">
                全部コミコミ(お一人様)
              </p>
              <p class="campaign-card__price-text">
                <?php
                          $price_group = get_field('campaign_price-group');
                          if ($price_group) :
                          $previous_price = $price_group['previous_price'];
                          $current_price = $price_group['current_price'];
                          ?>
                <span class="campaign-card__price-previous"><?php echo $previous_price; ?></span>
                <span class="campaign-card__price-current"><?php echo $current_price; ?></span>
                <?php endif; ?>
              </p>
            </div>
          </div>
        </div>
      </div>
      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
      <?php endif; ?>
      <div class="sidebar__campaign-wrapper">
        <a href="<?php echo $campaign; ?>" class="button"><span class="button__text">View more</span></a>
      </div>
    </div>
  </div>

  <div class="sidebar__archive">
    <h2 class="sidebar__title sidebar-title">アーカイブ</h2>
    <div class="sidebar__archive-item">

      <?php
        $year_prev = null;
        $months = $wpdb->get_results("SELECT DISTINCT MONTH( post_date ) AS month ,
                                      YEAR( post_date ) AS year,
                                      COUNT( id ) as post_count FROM $wpdb->posts
                                      WHERE post_status = 'publish' and post_date <= now( )
                                      and post_type = 'post'
                                      GROUP BY month , year
                                      ORDER BY post_date DESC");
        foreach ($months as $month) :
          $year_current = $month->year;
          if ($year_current != $year_prev) {
            if ($year_prev != null) { ?>
      </ul>
      <?php } ?>
      <div class="sidebar__archive-year js-sider-accordion">
        <span><?php echo $month->year; ?>年</span>
      </div>
      <ul class="sidebar__archive-month">
        <?php } ?>
        <li>
          <a
            href="
          <?php bloginfo('url') ?>/<?php echo $month->year; ?>/<?php echo date("m", mktime(0, 0, 0, $month->month, 1, $month->year)) ?>">
            <?php echo date("n", mktime(0, 0, 0, $month->month, 1, $month->year)) ?>月
          </a>
        </li>
        <?php $year_prev = $year_current;
          endforeach; ?>

    </div>
  </div>
</aside>