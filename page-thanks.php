<?php get_header() ?>

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
  <div class="breadcrumb breadcrumb-layout">
    <div class="breadcrumb__inner inner">
      <div>TOP > お問い合わせ > 送信完了</div>
    </div>
  </div>

  <!-- 下層ページ -->
  <section class="page-thanks-layout page-thanks ornament">
    <div class="page-thanks__inner inner">
      <p class="page-thanks__text thanks-text">お問い合わせ内容を送信完了しました。</p>
      <p class="page-thanks__text thanks-text">
        このたびは、お問い合わせ頂き誠にありがとうございます。<br>
        お送り頂きました内容を確認の上、3営業日以内に折り返しご連絡させて頂きます。<br>
        また、ご記入頂いたメールアドレスへ、自動返信の確認メールをお送りしております。
      </p>

    </div>
  </section>

  <?php get_footer(); ?>