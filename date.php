<?php get_header(); ?>
<?php
$campaign = esc_url(home_url('/campaign/'));
$voice = esc_url(home_url('/voice/'));
$price = esc_url(home_url('/price/'));
$single = esc_url(home_url('/single/'));
$contact = esc_url(home_url('/contact/'));

?>
<main>
  <!--サブメインビュー -->
  <section class="sub-mv">
    <picture class="sub-mv__image">
      <!-- ↓幅768px以下で表示↓ -->
      <source srcset="<?php echo get_theme_file_uri(); ?>/dist/assets/images/common/blog-sp.jpg"
        media="(max-width: 767px)" />
      <!-- ↓上記全て表示条件に当てはまらない場合に表示↓ -->
      <img src="<?php echo get_theme_file_uri(); ?>/dist/assets/images/common/blog-pc.jpg" alt="ダイバーの写真">
    </picture>
    <h1 class="sub-mv__title">blog</h1>
  </section>

  <!-- パンくずリスト -->
  <?php get_template_part('breadcrumb'); ?>

  <!-- 下層ページ -->
  <section class="home-layout home ornament">
    <div class="home__inner inner">
      <div class="home__container columns">
        <div class="columns__main">

          <div class="columns__cards article-cards article-cards--sub">
            <?php if (have_posts()) :
              while (have_posts()) :
                the_post(); ?>
            <a href="<?php the_permalink(); ?>" class="article-cards__item article-card">

              <figure class="article-card__img">
                <?php if (get_the_post_thumbnail()) : ?>
                <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title() ?>の画像">
                <?php else : ?>
                <img src="<?php echo get_theme_file_uri(); ?>/dist/assets/images/common/no-image.jpg" alt="noimage">
                <?php endif; ?>
              </figure>
              <div class="article-card__body">
                <time class="article-card__time" datetime="<?php the_time('c'); ?>"><?php the_time('Y.m.d'); ?></time>
                <h3 class="article-card__title "><?php the_title(); ?></h3>
                <p class="article-card__text">
                  <?php the_excerpt(); ?>
                </p>
              </div>
            </a>
            <?php endwhile;
            endif; ?>
          </div>

          <div class="columns__pagenavi wp-pagenavi">
            <?php wp_pagenavi(); ?>
          </div>
        </div>

        <!-- サイドバー　-->
        <?php get_template_part('sideber'); ?>
      </div>
    </div>
  </section>

  <?php get_footer(); ?>