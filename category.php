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
  <div class="breadcrumb breadcrumb-layout">
    <div class="breadcrumb__inner inner">
      <p>TOP > キャンペーン</p>
    </div>
  </div>

  <!-- 下層ページ -->

  <div class="archive-campaign archive-campaign-layout ornament">
    <div class="archive-campaign__inner inner">
      <div class="archive-campaign__tab tab">
        <a href="<?php echo esc_url(home_url('/campaign/')); ?>" class="tab__text">ALL</a>
        <?php $cat_info = get_category($cat); ?>
        <?php $cats = get_categories(array('parent' => 0, 'hide_empty' => 0)); ?>
        <?php foreach ($cats as $cat) :
          if ($cat->term_id == $cat_info->term_id) : ?>
        <span class="tab__text is-active"><?php echo $cat->name; ?></span>
        <?php else : ?>
        <a href="<?php echo get_category_link($cat->term_id); ?>" class="tab__text"><?php echo $cat->name; ?></a>
        <?php endif;
        endforeach; ?>
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
            <img src="<?php echo get_theme_file_uri(); ?>/dist/assets/images/common/campaign1.jpg" alt="ビーチの画像">
          </figure>
          <div class="campaign-card__inner campaign-card__inner--sub">
            <div class="campaign-card__body">
              <p class="card__category">
              <div class="campaign-card__category">
                <?php
                    $categories = get_the_category();
                    if ($categories) {
                      echo $categories[0]->name;
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
                <a href="./page-contact.html" class="button__text">Contact us</a>
              </div>
            </div>
          </div>
        </div>
        <?php endwhile;
        endif; ?>
      </div>
    </div>

    <div class="archive-campaign__pagenavi wp-pagenavi">
      <a class="previouspostslink" rel="prev" href="#"></a>
      <span class="current">1</span>
      <a class="page" href="#">2</a>
      <a class="page" href="#">3</a>
      <a class="page" href="#">4</a>
      <a class="page" href="#">5</a>
      <a class="page" href="#">6</a>
      <a class="nextpostslink" rel="next" href="#"></a>
    </div>
  </div>

  <?php get_footer(); ?>