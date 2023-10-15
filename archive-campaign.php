<?php get_header(); ?>
<?php
$contact = esc_url(home_url('/contact/'));
?>
<main>
  <!--サブメインビュー -->
  <section class="sub-mv">
    <picture class="sub-mv__image">
      <!-- ↓幅768px以下で表示↓ -->
      <source srcset="<?php echo get_theme_file_uri(); ?>/dist/assets/images/common/campaign-sp.jpg"
        media="(max-width: 767px)" />
      <!-- ↓上記全て表示条件に当てはまらない場合に表示↓ -->
      <img src="<?php echo get_theme_file_uri(); ?>/dist/assets/images/common/campaign-pc.jpg" alt="ダイバーの写真">
    </picture>
    <h1 class="sub-mv__title">campaign</h1>
  </section>

  <!-- パンくずリスト -->
  <?php get_template_part('breadcrumb'); ?>

  <!-- 下層ページ -->

  <div class="archive-campaign archive-campaign-layout ornament">
    <div class="archive-campaign__inner inner">
      <div class="archive-campaign__tab tab">
        <span class="tab__text is-active">ALL</span>
        <?php $terms = get_terms('campaign__category', 'hide_empty=0'); //空のタームも出力 
        ?>
        <?php foreach ($terms as $term) : ?>

        <a href="<?php echo get_term_link($term->term_id); ?>" class="tab__text"><?php echo $term->name; ?></a>

        <?php endforeach; ?>
      </div>
      <div class="archive-campaign__cards archive-campaign-cards">
        <?php if (have_posts()) :
          while (have_posts()) :
            the_post(); ?>

        <?php

            $previous = get_field('previous');
            $current = get_field('price-current');
            $card__text = get_field('campaign-card__text');
            $period = get_field('period');
            ?>
        <div class="archive-campaign-cards__item campaign-card">
          <figure class="campaign-card__img">
            <?php if (get_the_post_thumbnail()) : ?>
            <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title() ?>の画像">
            <?php else : ?>
            <img src="<?php echo get_theme_file_uri(); ?>/dist/assets/images/common/no-image.jpg" alt="noimage">
            <?php endif; ?>
          </figure>
          <div class="campaign-card__inner campaign-card__inner--sub">
            <div class="campaign-card__body">
              <p class="card__category">
              <div class="campaign-card__category">
                <?php
                    $terms = get_the_terms($post->ID, 'campaign__category');
                    if ($terms) {
                      echo $terms[0]->name;
                    }
                    ?>
              </div>
              <h2 class="campaign-card__title campaign-card__title--sub">
                <?php the_title(); ?></h2>
            </div>
            <div class="campaign-card__price">
              <p class="campaign-card__person">
                全部コミコミ(お一人様)
              </p>
              <p class="campaign-card__price-text">
                <?php if ($previous) : ?>
                <span class="campaign-card__price-previous"><?php echo $previous; ?></span>
                <?php endif; ?>
                <?php if ($current) : ?>
                <span class="campaign-card__price-current"><?php echo $current; ?></span>
                <?php endif; ?>
              </p>
            </div>
            <div class="campaign-card__text">
              <?php if ($card__text) : ?>
              <p>
                <?php echo $card__text; ?>
              </p>
              <?php endif; ?>
            </div>
            <div class="campaign-card__footer">
              <?php if ($period) : ?>
              <p class="campaign-card__period"><?php echo $period; ?></p>
              <?php endif; ?>
              <p class="campaign-card__reservation">ご予約・お問い合わせはコチラ</p>
              <div class="campaign-card__button button">
                <a href="<?php echo $contact; ?>" class="button__text">Contact us</a>
              </div>
            </div>
          </div>
        </div>
        <?php endwhile;
        endif; ?>
      </div>
    </div>

    <div class="archive-campaign__pagenavi wp-pagenavi">
      <?php wp_pagenavi(); ?>
    </div>
  </div>

  <?php get_footer(); ?>