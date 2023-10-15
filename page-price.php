<?php get_header(); ?>

<main>
  <!--サブメインビュー -->
  <section class="sub-mv">
    <picture class="sub-mv__image">
      <!-- ↓幅768px以下で表示↓ -->
      <source srcset="<?php echo get_theme_file_uri(); ?>/dist/assets/images/common/price-sp.jpg"
        media="(max-width: 767px)" />
      <!-- ↓上記全て表示条件に当てはまらない場合に表示↓ -->
      <img src="<?php echo get_theme_file_uri(); ?>/dist/assets/images/common/price-pc.jpg" alt="ダイバーの写真">
    </picture>
    <h1 class="sub-mv__title">price</h1>
  </section>

  <!-- パンくずリスト -->
  <?php get_template_part('breadcrumb'); ?>

  <!-- 下層ページ -->
  <div class="page-price-layout page-price ornament">
    <div class="page-price__inner inner">
      <div class="page-price__column one-column">
        <?php $license_price = SCF::get('license_price_group'); if($license_price[0]['license_course_name']): ?>
        <div class="page-price__container data-list data-list--sub" id="license">
          <h2 class=" data-list__title"><span>ライセンス講習</span></h2>
          <dl class="data-list__data">
            <?php foreach ( $license_price as $fields ) :
        if($fields['license_course_name'] !== "" and $fields['license_course_price']!== ""):
          ?>
            <dt><?php echo $fields['license_course_name']; ?></dt>
            <dd><?php echo $fields['license_course_price']; ?></dd>
            <?php endif;endforeach; ?>
          </dl>
        </div>
        <?php endif; ?>

        <?php $experience_price = SCF::get('experience_price_group'); if($experience_price[0]['experience_course_name']): ?>
        <div class="page-price__container data-list data-list--sub" id="experience">
          <h2 class="data-list__title"><span>体験ダイビング</span></h2>
          <dl class="data-list__data">
            <?php foreach ( $experience_price as $fields ) :
        if($fields['experience_course_name'] !== "" and $fields['experience_course_price']!== ""):
          ?>
            <dt><?php echo $fields['experience_course_name']; ?></dt>
            <dd><?php echo $fields['experience_course_price']; ?></dd>
            <?php endif;endforeach; ?>
          </dl>
        </div>
        <?php endif; ?>

        <?php $fun_price = SCF::get('fun_price_group'); if($fun_price[0]['fun_course_name']): ?>
        <div class="page-price__container data-list data-list--sub" id="fun">
          <h2 class="data-list__title"><span>ファンダイビング</span></h2>
          <dl class="data-list__data">
            <?php foreach ( $fun_price as $fields ) :
        if($fields['fun_course_name'] !== "" and $fields['fun_course_price']!== ""):
          ?>
            <dt><?php echo $fields['fun_course_name']; ?></dt>
            <dd><?php echo $fields['fun_course_price']; ?></dd>
            <?php endif;endforeach; ?>
          </dl>
        </div>
        <?php endif; ?>

        <?php $special_price = SCF::get('special_price_group'); if($special_price[0]['special_course_name']): ?>
        <div class="page-price__container data-list data-list--sub" id="special">
          <h2 class=" data-list__title"><span>スペシャルダイビング</span></h2>
          <dl class="data-list__data">
            <?php foreach ( $special_price as $fields ) :
        if($fields['special_course_name'] !== "" and $fields['special_course_price']!== ""):
          ?>
            <dt><?php echo $fields['special_course_name']; ?></dt>
            <dd><?php echo $fields['special_course_price']; ?></dd>
            <?php endif;endforeach; ?>
          </dl>
        </div>
        <?php endif; ?>
      </div>

    </div>
  </div>
  <?php get_footer(); ?>