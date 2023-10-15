<?php get_header(); ?>

<main>
  <!--サブメインビュー -->
  <section class="sub-mv">
    <picture class="sub-mv__image">
      <!-- ↓幅768px以下で表示↓ -->
      <source srcset="<?php echo get_theme_file_uri(); ?>/dist/assets/images/common/information-sp.jpg"
        media="(max-width: 767px)" />
      <!-- ↓上記全て表示条件に当てはまらない場合に表示↓ -->
      <img src="<?php echo get_theme_file_uri(); ?>/dist/assets/images/common/information-pc.jpg" alt="ダイバーの写真">
    </picture>
    <h1 class="sub-mv__title">information</h1>
  </section>

  <!-- パンくずリスト -->
  <?php get_template_part('breadcrumb'); ?>

  <!-- 下層ページ -->
  <section class="information-sub page-information-layout ornament">
    <div class="information-sub__inner inner">
      <div class="information-sub__content">
        <ul class="information-sub__tab information-tab">
          <li class="information-tab__item js-tab-trigger is-active" data-id="tab01">
            <span class="information-tab__text">ライセンス<br class="u-mobile">講習</span>
          </li>
          <li class="information-tab__item js-tab-trigger" data-id="tab02">
            <span>体験<br class="u-mobile">ダイビング</span>
          </li>
          <li class="information-tab__item js-tab-trigger" data-id="tab03">
            <span>ファン<br class="u-mobile">ダイビング</span>
          </li>
        </ul>
        <div class="information-sub__container">
          <div class="information-sub__item information-item js-tab-target is-show" data-tab="tab01">
            <div class="information-item__body">
              <h2 class="information-item__title">
                ライセンス講習
              </h2>
              <p class="information-item__text">
                泳げない人も、ちょっと水が苦手な人も、ダイビングを「安全に」楽しんでいただけるよう、スタッフがサポートいたします！スキューバダイビングを楽しむためには最低限の知識とスキルが要求されます。知識やスキルと言ってもそんなに難しい事ではなく、安全に楽しむ事を目的としたものです。プロダイバーの指導のもと知識とスキルを習得しCカードを取得して、ダイバーになろう！
              </p>
            </div>
            <div class="information-item__image">
              <img src="<?php echo get_theme_file_uri(); ?>/dist/assets/images/common/license.jpg" alt="インフォメーション1の画像">
            </div>
          </div>
          <div class="information-sub__item information-item js-tab-target" data-tab="tab02">
            <div class="information-item__body">
              <h2 class="information-item__title">
                体験ダイビング
              </h2>
              <p class="information-item__text">
                ブランクダイバー、ライセンスを取り立ての方も安心！沖縄本島を代表する「青の洞窟」（真栄田岬）やケラマ諸島などメジャーなポイントはモチロンのこと、最北端「辺戸岬」や最南端の「大渡海岸」等もご用意！
              </p>
            </div>
            <div class="information-item__image">
              <img src="<?php echo get_theme_file_uri(); ?>/dist/assets/images/common/gallery5.jpg" alt="インフォメーション2の画像">
            </div>
          </div>
          <div class="information-sub__item information-item js-tab-target" data-tab="tab03">
            <div class="information-item__body">
              <h2 class="information-item__title">
                ファンダイビング
              </h2>
              <p class="information-item__text">
                ブランクダイバー、ライセンスを取り立ての方も安心！沖縄本島を代表する「青の洞窟」（真栄田岬）やケラマ諸島などメジャーなポイントはモチロンのこと、最北端「辺戸岬」や最南端の「大渡海岸」等もご用意！
              </p>
            </div>
            <div class="information-item__image">
              <img src="<?php echo get_theme_file_uri(); ?>/dist/assets/images/common/gallery3.jpg" alt="インフォメーション3の画像">
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php get_footer(); ?>