<?php get_header(); ?>

<main>
  <!--サブメインビュー -->
  <section class="sub-mv">
    <picture class="sub-mv__image">
      <!-- ↓幅768px以下で表示↓ -->
      <source srcset="<?php echo get_theme_file_uri(); ?>/dist/assets/images/common/faq-sp.jpg"
        media="(max-width: 767px)" />
      <!-- ↓上記全て表示条件に当てはまらない場合に表示↓ -->
      <img src="<?php echo get_theme_file_uri(); ?>/dist/assets/images/common/faq-pc.jpg" alt="ダイバーの写真">
    </picture>
    <h1 class="sub-mv__title">FAQ</h1>
  </section>

  <!-- パンくずリスト -->
  <?php get_template_part('breadcrumb'); ?>

  <!-- 下層ページ -->
  <section class="page-faq-layout page-faq ornament">
    <div class="page-faq__inner inner">
      <div class="page-faq__wapper one-column one-column--faq">
        <?php $faqGroup = SCF::get('faq_group'); foreach ( $faqGroup as $fields ) :
        if($fields['faq_question'] !== "" and $fields['faq_answer']!== ""):
          ?>
        <div class="page-faq__accordion faq-accordion">
          <h2 class="faq-accordion__question js-accordion"><?php echo $fields['faq_question']; ?></h2>
          <div class="faq-accordion__answer">
            <?php echo $fields['faq_answer']; ?>
          </div>
        </div>
        <?php endif;endforeach; ?>
      </div>
    </div>
  </section>

  <?php get_footer(); ?>