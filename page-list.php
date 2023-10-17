<?php
$home = esc_url(home_url('/'));
$about = esc_url(home_url('/about-us/'));
$campaign = esc_url(home_url('/campaign/'));
$information = esc_url(home_url('/information/'));
$blog = esc_url(home_url('/blog/'));
$voice = esc_url(home_url('/voice/'));
$price = esc_url(home_url('/price/'));
$faq = esc_url(home_url('/faq/'));
$contact = esc_url(home_url('/contact/'));
$sitemap = esc_url(home_url('/sitemap/'));
$privacypolicy = esc_url(home_url('/privacypolicy/'));
$termsOfService = esc_url(home_url('/terms-of-service/'));
?>
<div class="lists__wrapper">
  <div class="lists__container">
    <ul class="lists__item list">
      <li class="list__item <?php if(is_page('sitemap')){ echo 'list__item--image'; } ?>">
        <a href="<?php echo $campaign; ?>">キャンペーン</a>
      </li>
      <?php $term_id = get_queried_object_id('campaign__category'); // タームIDの取得
        ?>
      <?php $terms = get_terms('campaign__category'); 
        ?>
      <?php foreach ($terms as $term) :
          if ($term) : ?>
      <li class="list__item">
        <a href="<?php echo get_term_link($term->slug,'campaign__category') ?>"><?php echo $term->name ?></a>
      </li>

      <?php endif;
        endforeach; ?>
    </ul>
    <ul class="lists__item list">
      <li class="list__item">
        <a href="<?php echo $about; ?>">私たちについて</a>
      </li>
    </ul>
  </div>
  <div class="lists__container">
    <ul class="lists__item list">
      <li class="list__item">
        <a href="<?php echo $information; ?>">ダイビング情報</a>
      </li>
      <li class="list__item js-tab-list" data-tab="tab01">
        <a href="<?php echo $information; ?>?tab=tab01">ライセンス講習</a>
      </li>
      <li class="list__item js-tab-list" data-tab="tab02">
        <a href="<?php echo $information; ?>?tab=tab02">体験ダイビング</a>
      </li>
      <li class="list__item js-tab-list" data-tab="tab03">
        <a href="<?php echo $information; ?>?tab=tab03">ファンダイビング</a>
      </li>
    </ul>
    <ul class="lists__item list">
      <li class="list__item">
        <a href="<?php echo $blog; ?>">ブログ</a>
      </li>
    </ul>
  </div>
</div>
<div class="lists__wrapper">
  <div class="lists__container">
    <ul class="lists__item list">
      <li class="list__item">
        <a href="<?php echo $voice; ?>">お客様の声</a>
      </li>


      <?php $term_id = get_queried_object_id('voice_category'); // タームIDの取得
        ?>
      <?php $terms = get_terms('voice_category');
        ?>
      <?php foreach ($terms as $term) :
          if ($term) : ?>
      <li class="list__item">
        <a href="<?php echo get_term_link($term->slug,'voice_category') ?>"><?php echo $term->name ?></a>
      </li>

      <?php endif;
        endforeach; ?>


    </ul>
    <ul class="lists__item list">
      <li class="list__item">
        <a href="<?php echo $price; ?>">料金一覧</a>
      </li>
      <li class="list__item">
        <a href="<?php echo $price; ?>#license">ライセンス講習</a>
      </li>
      <li class="list__item">
        <a href="<?php echo $price; ?>#experience">体験ダイビング</a>
      </li>
      <li class="list__item">
        <a href="<?php echo $price; ?>#fun">ファンダイビング</a>
      </li>
      <li class="list__item">
        <a href="<?php echo $price; ?>#special">スペシャルダイビング</a>
      </li>
    </ul>
  </div>
  <div class="lists__container">
    <ul class="lists__item list">
      <li class="list__item">
        <a href="<?php echo $faq; ?>">よくある質問</a>
      </li>
    </ul>
    <ul class="lists__item list">
      <li class="list__item">
        <a href="<?php echo $privacypolicy; ?>">プライバシー<br class="u-mobile">ポリシー</a>
      </li>
    </ul>
    <ul class="lists__item list">
      <li class="list__item">
        <a href="<?php echo $termsOfService; ?>">利用規約</a>
      </li>
    </ul>
    <ul class="lists__item list">
      <li class="list__item">
        <a href="<?php echo $sitemap; ?>">サイトマップ</a>
      </li>
    </ul>
    <ul class="lists__item list">
      <li class="list__item">
        <a href="<?php echo $contact; ?>">お問い合わせ</a>
      </li>
    </ul>
  </div>
</div>