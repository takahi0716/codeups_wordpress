<?php get_header(); ?>

<main>
  <!--サブメインビュー -->
  <section class="sub-mv">
    <picture class="sub-mv__image">
      <!-- ↓幅768px以下で表示↓ -->
      <source srcset="<?php echo get_theme_file_uri(); ?>/dist/assets/images/common/contact-sp.jpg"
        media="(max-width: 767px)" />
      <!-- ↓上記全て表示条件に当てはまらない場合に表示↓ -->
      <img src="<?php echo get_theme_file_uri(); ?>/dist/assets/images/common/contact-pc.jpg" alt="ダイバーの写真">
    </picture>
    <h1 class="sub-mv__title">contact</h1>
  </section>

  <!-- パンくずリスト -->
  <?php get_template_part('breadcrumb'); ?>

  <!-- 下層ページ -->
  <section class="page-contact-layout page-contact ornament">
    <div class="page-contact__inner inner">

      <div class="page-contact__content form">

        <?php echo do_shortcode('[contact-form-7 id="b8119eb" title="コンタクトフォーム 1"]'); ?>

      </div>

    </div>
  </section>

  <?php get_footer(); ?>