<?php get_header(); ?>
<!-- 記事のビュー数を更新(ログイン中・クローラーは除外) -->
<?php if (!is_user_logged_in() && !is_robots()) {
  setPostViews(get_the_ID());
} ?>
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
    <?php get_template_part('parts/breadcrumb'); ?>
  </div>

  <!-- 下層ページ -->
  <section class="single-layout single ornament">
    <div class="single__inner inner">
      <div class="single__container columns">
        <div class="columns__main">
          <article class="columns__article single-article">
            <time class="single-article__time" datetime="<?php the_time('c'); ?>"><?php the_time('Y.m.d'); ?></time>
            <h2 class="single-article__title"><?php the_title(); ?></h2>
            <div class="single-article__thumbnail">
              <?php if (get_the_post_thumbnail()) : ?>
              <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title() ?>のアイキャッチ画像">
              <?php else : ?>
              <img src="<?php echo get_theme_file_uri(); ?>/dist/assets/images/common/no-image.jpg" alt="noimage">
              <?php endif; ?>

            </div>
            <div class="single-article__content">
              <?php if (have_posts()) :
                while (have_posts()) :
                  the_post(); ?>
              <?php the_content(); ?>
              <?php endwhile;
              endif; ?>
            </div>

            <div class="single-article__pagenavi wp-pagenavi wp-pagenavi--single">
              <?php
              $prev = get_previous_post();
              if (!empty($prev)) {
                $prev_url = esc_url(get_permalink($prev->ID));
              }

              $next = get_next_post();
              if (!empty($next)) {
                $next_url = esc_url(get_permalink($next->ID));
              }
              ?>
              <?php if (!empty($prev)) : ?>
              <a class="previouspostslink" rel="prev" href="<?php echo $prev_url; ?>"></a>
              <?php endif; ?>
              <?php if (!empty($next)) : ?>
              <a class="nextpostslink" rel="next" href="<?php echo $next_url; ?>"></a>
              <?php endif; ?>

            </div>
          </article>
        </div>
        <!-- サイドバー　-->
        <div class="columns__sideber">
          <?php get_template_part('parts/sidebar'); ?>
        </div>
      </div>
    </div>
  </section>

  <?php get_footer(); ?>