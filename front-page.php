<?php get_header() ?>
<?php
$home = esc_url(home_url('/'));
$about = esc_url(home_url('/about-us/'));
$campaign = esc_url(home_url('/campaign/'));
$information = esc_url(home_url('/information/'));
$blog = esc_url(home_url('/blog/'));
$voice = esc_url(home_url('/voice/'));
$price = esc_url(home_url('/price/'));
$contact = esc_url(home_url('/contact/'));
$sitemap = esc_url(home_url('/sitemap/'));
$privacypolicy = esc_url(home_url('/privacypolicy/'));

?>

<main>
  <!-- ローディング -->
  <div class="loading">
    <div class="loading__backgroud">
    </div>
    <div class="loading__image-wrap">
      <div class="loading__image-left">
      </div>
      <div class="loading__image-right">
      </div>
      <div class="loading__title">
        <p class="loading__main">DIVING</p>
        <p class="loading__sub">into the ocean</p>
      </div>
    </div>
  </div>
  <!-- メインビュー -->
  <div class="top-mv mv">
    <div class="mv_slide slide">
      <?php
      $mv_image_group = SCF::get('mv_image_group');
      foreach ($mv_image_group as $fields) :
                if ($fields['sp_mv_image'] !== "" and $fields['pc_mv_image'] !== "") :
              ?>

      <picture class="slide__image">
        <!-- ↓幅768px以下で表示↓ -->
        <source srcset="<?php echo wp_get_attachment_url($fields['sp_mv_image']); ?>" media="(max-width: 767px)" />
        <!-- ↓上記全て表示条件に当てはまらない場合に表示↓ -->
        <img src="<?php echo wp_get_attachment_url($fields['pc_mv_image']); ?>"
          alt="<?php echo $fields['alt-text']; ?>">
      </picture>
      <?php endif; ?>
      <?php endforeach; ?>
    </div>
    <div class="mv__title">
      <p class="mv__main">DIVING</p>
      <p class="mv__sub">into the ocean</p>
    </div>
  </div>

  <!-- キャンペーン -->
  <section class="top-campaign campaign">
    <div class="campaign__inner inner">
      <div class="campaign__title section-title">
        <p class="section-title__main">campaign</p>
        <h2 class="section-title__sub">キャンペーン</h2>
      </div>

      <!-- Swiper -->
      <div class="campaign__swiper-buttons">
        <div class="campaign__swiper-button swiper-button">
          <a href="#" class="swiper-button__prev swiper-button-prev">
            <img src="<?php echo get_theme_file_uri(); ?>/dist/assets/images/common/prev-btn.png" alt="スライドを前に戻すボタン">
          </a>
          <a href="#" class="swiper-button__next swiper-button-next">
            <img src="<?php echo get_theme_file_uri(); ?>/dist/assets/images/common/next-btn.png" alt="スライドを次に進めるボタン">
          </a>
        </div>
      </div>

      <div class="campaign__swiper swiper js-campaign-swiper">
        <div class="campaign__swiper-wrapper swiper-wrapper">

          <?php
          $args = array(
            'post_type' => 'campaign',
            'post_status' => 'publish', // 公開済の投稿を指定
            'posts_per_page' => -1,
            'orderby' => 'menu_order', // 順序順で表示
            'order' => 'DESC',
          );
          $the_view_query = new WP_Query($args);
          if ($the_view_query->have_posts()) :
            while ($the_view_query->have_posts()) : $the_view_query->the_post();
          ?>
          <div class="campaign__cards swiper-slide">
            <!-- campaign-card -->
            <div class="campaign__card">
              <div class="campaign-card">
                <figure class="campaign-card__img">
                  <?php if (get_the_post_thumbnail()) : ?>
                  <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title() ?>の画像">
                  <?php else : ?>
                  <img src="<?php echo get_theme_file_uri(); ?>/dist/assets/images/common/no-image.jpg" alt="noimage">
                  <?php endif; ?>
                </figure>
                <div class="campaign-card__inner">
                  <div class="campaign-card__body">
                    <?php
                          $terms = get_the_terms($post->ID, 'campaign_category');
                          if ($terms) { ?>
                    <div class="campaign-card__category">

                      <?php echo $terms[0]->name; ?>

                    </div>
                    <?php } ?>
                    <h3 class="campaign-card__title "><?php the_title(); ?></h3>
                  </div>
                  <div class="campaign-card__price">
                    <p class="campaign-card__person">
                      全部コミコミ(お一人様)
                    </p>
                    <p class="campaign-card__price-text">
                      <?php
                          $price_group = get_field('campaign_price-group');
                          if ($price_group) :
                          $previous_price = $price_group['previous_price'];
                          $current_price = $price_group['current_price'];
                          ?>
                      <span class="campaign-card__price-previous"><?php echo $previous_price; ?></span>
                      <span class="campaign-card__price-current"><?php echo $current_price; ?></span>
                      <?php endif; ?>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
          <?php endif; ?>
        </div>
      </div>
      <div class="campaign__wrapper">
        <div class="information__button">
          <!-- button -->
          <a href="<?php echo $campaign; ?>" class="button"><span class="button__text">View
              more</span></a>
        </div>
      </div>
    </div>
  </section>

  <!-- About us -->
  <section class="top-about about">
    <div class="about__inner inner">
      <div class="about__title section-title">
        <p class="section-title__main">about us</p>
        <h2 class="section-title__sub">私たちについて</h2>
      </div>

      <div class="about__contaner">
        <picture class="about__image-right">
          <!-- ↓幅768px以下で表示↓ -->
          <source srcset="<?php echo get_theme_file_uri(); ?>/dist/assets/images/common/ocean2-sp.jpg"
            media="(max-width: 767px)" />
          <!-- ↓上記全て表示条件に当てはまらない場合に表示↓ -->
          <img src="<?php echo get_theme_file_uri(); ?>/dist/assets/images/common/ocean2-pc.jpg" alt="黄色い熱帯魚の写真">
        </picture>
        <div class="about__image-left">
          <img src="<?php echo get_theme_file_uri(); ?>/dist/assets/images/common/ocean1.jpg" alt="空とシーサーの画像">
        </div>
        <div class="about__body">
          <h3 class="about__sub-title">
            Dive into<br>
            the Ocean
          </h3>
          <div class="about__content">
            <p class="about__text">
              ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br>ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキスト
            </p>
            <div class="about__wrapper">
              <!-- button -->
              <a href="<?php echo $about; ?>" class="button"><span class="button__text">View
                  more</span></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- information -->
  <section class="top-information information">
    <div class="information__inner inner">
      <div class="information__title section-title">
        <p class="section-title__main">information</p>
        <h2 class="section-title__sub">ダイビング情報</h2>
      </div>
      <div class="infomation__contaner">
        <div class="information__image colorbox js-colorbox">
          <img src="<?php echo get_theme_file_uri(); ?>/dist/assets/images/common/ocean3.jpg" alt="サンゴと黄色い熱帯魚の画像">
        </div>
        <div class="information__body">
          <h3 class="information__article-title">ライセンス講習</h3>
          <p class="information__text">
            当店はダイビングライセンス（Cカード）世界最大の教育機関PADIの「正規店」として店舗登録されています。<br>
            正規登録店として、安心安全に初めての方でも安心安全にライセンス取得をサポート致します。
          </p>

          <div class="information__wrapper">
            <!-- button -->
            <a href="<?php echo $information; ?>" class="button"><span class="button__text">View
                more</span></a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- blog -->
  <section class="top-blog blog">

    <div class="blog__inner inner">
      <div class="blog__title section-title">
        <p class="section-title__main section-title__main--white">
          blog
        </p>
        <h2 class="section-title__sub section-title__sub--white">ブログ</h2>
      </div>
      <!-- article-cards -->
      <div class="blog__cards article-cards">

        <?php
        $args = array(
          'post_type' => 'post',
          'post_status' => 'publish', // 公開済の投稿を指定
          'posts_per_page' => 3,
          'orderby' => 'post_date',
          'order' => 'DESC',
        );
        $the_view_query = new WP_Query($args);
        if ($the_view_query->have_posts()) :
          while ($the_view_query->have_posts()) : $the_view_query->the_post();
        ?>
        <div class="article-cards__item">
          <?php get_template_part('parts/article-card'); ?>
        </div>
        <?php endwhile; ?>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
      </div>
      <div class="blog__wrapper">
        <!-- button -->
        <a href="<?php echo $blog; ?>" class="button"><span class="button__text">View more</span></a>
      </div>
    </div>
  </section>

  <!-- voice -->
  <section class="top-voice voice">
    <div class="voice__inner inner">
      <div class="voice__title section-title">
        <p class="section-title__main">voice</p>
        <h2 class="section-title__sub">お客様の声</h2>
      </div>
      <div class="voice__cards voice-cards">

        <?php
        $args = array(
          'post_type' => 'voice',
          'post_status' => 'publish', // 公開済の投稿を指定
          'posts_per_page' => 2,
          'orderby' => 'post_date',
          'order' => 'DESC',
        );
        $the_view_query = new WP_Query($args);
        if ($the_view_query->have_posts()) :
          while ($the_view_query->have_posts()) : $the_view_query->the_post();
        ?>
        <div class="voice-cards__item">
          <div class="voice-card">
            <div class="voice-card__header">
              <div class="voice-card__wrapper">
                <div class="voice-card__container">
                  <?php 
                  $guset_group = get_field('guest_group');
                  if ($guset_group) :
                  $age = $guset_group['age'];
                  $gender = $guset_group['gender'];
                  ?>
                  <p class="sidebar-voice__guest"><?php echo $age,'(',$gender,')'; ?></p>
                  <?php endif; ?>
                  <p class="voice-card__category">
                    <?php
                        $terms = get_the_terms($post->ID, 'voice_category');
                        if ($terms) {
                          echo $terms[0]->name;
                        }
                        ?>
                  </p>
                </div>
                <h3 class="voice-card__title"><?php the_title(); ?></h3>
              </div>
              <div class="voice-card__image colorbox js-colorbox">
                <?php if (get_the_post_thumbnail()) : ?>
                <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title() ?>の画像">
                <?php else : ?>
                <img src="<?php echo get_theme_file_uri(); ?>/dist/assets/images/common/no-image.jpg" alt="noimage">
                <?php endif; ?>
              </div>
            </div>

            <p class="voice-card__text">
              <?php echo wp_trim_words(get_the_content(), 196, '[…]'); ?>
            </p>
          </div>
        </div>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
        <?php endif; ?>
      </div>
      <div class="voice__wrapper">
        <!-- button -->
        <a href="<?php echo $voice; ?>" class="button"><span class="button__text">View more</span></a>
      </div>
    </div>
  </section>

  <!-- price -->
  <section class="top-price price">
    <div class="price__inner inner">
      <div class="price__title section-title">
        <p class="section-title__main">price</p>
        <h2 class="section-title__sub">料金一覧</h2>
      </div>
      <div class="price__flex">
        <picture class="price__image colorbox js-colorbox">
          <!-- ↓幅768px以下で表示↓ -->
          <source srcset="<?php echo get_theme_file_uri(); ?>/dist/assets/images/common/price-image.jpg"
            media="(max-width: 767px)" />
          <!-- ↓上記全て表示条件に当てはまらない場合に表示↓ -->
          <img src="<?php echo get_theme_file_uri(); ?>/dist/assets/images/common/priceimg.jpg" alt=黄色い熱帯魚の写真">
        </picture>
        <div class="price__contaner">
          <?php $license_group = SCF::get_option_meta('price_option','license');
        if ($license_group[0]['license_course_name']) : ?>
          <div class="price__list data-list">
            <h3 class="data-list__title"><span>ライセンス講習</span></h3>
            <dl class="data-list__data">
              <?php foreach ($license_group as $fields) :
                  if ($fields['license_course_name'] !== "" and $fields['license_course_price'] !== "") :
                ?>
              <dt><?php echo $fields['license_course_name']; ?></dt>
              <dd><?php echo $fields['license_course_price']; ?></dd>
              <?php endif;
                endforeach; ?>
            </dl>
          </div>
          <?php endif; ?>

          <?php $experience_group = SCF::get_option_meta('price_option','experience');
          if ($experience_group[0]['experience_course_name']) : ?>
          <div class="price__list data-list">
            <h3 class="data-list__title"><span>体験ダイビング</span></h3>
            <dl class="data-list__data">
              <?php foreach ($experience_group as $fields) :
                  if ($fields['experience_course_name'] !== "" and $fields['experience_course_price'] !== "") :
                ?>
              <dt><?php echo $fields['experience_course_name']; ?></dt>
              <dd><?php echo $fields['experience_course_price']; ?></dd>
              <?php endif;
                endforeach; ?>
            </dl>
          </div>
          <?php endif; ?>

          <?php $fun_group = SCF::get_option_meta('price_option','fun');
          if ($fun_group[0]['fun_course_name']) : ?>
          <div class="price__list data-list">
            <h3 class="data-list__title"><span>ファンダイビング</span></h3>
            <dl class="data-list__data">
              <?php foreach ($fun_group as $fields) :
                  if ($fields['fun_course_name'] !== "" and $fields['fun_course_price'] !== "") :
                ?>
              <dt><?php echo $fields['fun_course_name']; ?></dt>
              <dd><?php echo $fields['fun_course_price']; ?></dd>
              <?php endif;
                endforeach; ?>
            </dl>
          </div>
          <?php endif; ?>

          <?php $special_group = SCF::get_option_meta('price_option','special');
          if ($special_group[0]['special_course_name']) : ?>
          <div class="price__list data-list">
            <h3 class="data-list__title"><span>スペシャルダイビング</span></h3>
            <dl class="data-list__data">
              <?php foreach ($special_group as $fields) :
                  if ($fields['special_course_name'] !== "" and $fields['special_course_price'] !== "") :
                ?>
              <dt><?php echo $fields['special_course_name']; ?></dt>
              <dd><?php echo $fields['special_course_price']; ?></dd>
              <?php endif;
                endforeach; ?>
            </dl>
          </div>
          <?php endif; ?>
        </div>
      </div>
      <div class="price__wrapper">
        <!-- button -->
        <a href="<?php echo $price; ?>" class="button"><span class="button__text">View more</span></a>
      </div>
    </div>
  </section>

  <?php get_footer() ?>