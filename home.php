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
  <div class="breadcrumb-layout">
    <div class="breadcrumb-layout">
      <?php get_template_part('parts/breadcrumb'); ?>
    </div>
  </div>

  <!-- 下層ページ -->
  <section class="home-layout home ornament">
    <div class="home__inner inner">
      <div class="home__container columns">
        <div class="columns__main">

          <div class="columns__cards article-cards article-cards--sub">
            <?php if (have_posts()) :
              while (have_posts()) :
                the_post(); ?>
            <div class="article-cards__item">
              <?php get_template_part('parts/article-card'); ?>
            </div>
            <?php endwhile;
            endif; ?>
          </div>

          <div class="columns__pagenavi wp-pagenavi">
            <?php wp_pagenavi(); ?>
          </div>
        </div>

        <!-- サイドバー -->
        <div class="columns__sideber">
          <?php get_template_part('parts/sidebar'); ?>
        </div>
        <div class="breadcrumb-layout">
          <?php get_template_part('parts/breadcrumb'); ?>
        </div>
      </div>
    </div>
  </section>

  <?php get_footer(); ?>