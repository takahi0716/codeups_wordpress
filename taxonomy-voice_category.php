<?php get_header(); ?>
<main>
  <!--サブメインビュー -->
  <section class="sub-mv">
    <picture class="sub-mv__image">
      <!-- ↓幅768px以下で表示↓ -->
      <source srcset="<?php echo get_theme_file_uri(); ?>/dist/assets/images/common/voice-sp.jpg"
        media="(max-width: 767px)" />
      <!-- ↓上記全て表示条件に当てはまらない場合に表示↓ -->
      <img src="<?php echo get_theme_file_uri(); ?>/dist/assets/images/common/voice-pc.jpg" alt="ダイバーの写真">
    </picture>
    <h1 class="sub-mv__title">voice</h1>
  </section>
  <!-- パンくずリスト -->
  <div class="breadcrumb-layout">
    <?php get_template_part('parts/breadcrumb'); ?>
  </div>

  <!-- 下層ページ -->
  <section class="archive-voice-layout archive-voice ornament">
    <div class="archive-voice__inner inner">
      <div class="archive-voice__tab tab">
        <a href="<?php echo esc_url(home_url('/voice/')); ?>" class="tab__text">ALL</a>
        <?php $term_id = get_queried_object_id(); // タームIDの取得
        ?>
        <?php $terms = get_terms('voice_category', 'hide_empty=0'); //空のタームも出力 
        ?>
        <?php foreach ($terms as $term) :
          if ($term->term_id == $term_id) : ?>
        <span class="tab__text is-active"><?php echo $term->name; ?></span>
        <?php else : ?>
        <a href="<?php echo get_term_link($term->term_id); ?>" class="tab__text"><?php echo $term->name; ?></a>
        <?php endif;
        endforeach; ?>
      </div>

      <div class="archive-voice__cards voice-cards">
        <?php if (have_posts()) :
          while (have_posts()) :
            the_post(); ?>

        <?php
            $guest = get_field('guest');
            ?>
        <div class="voice-cards__item">
          <div class="voice-card">
            <div class="voice-card__header">
              <div class="voice-card__wrapper">
                <div class="voice-card__container">
                  <p class="voice-card__guest">
                    <?php if ($guest) : ?>
                    <?php echo $guest; ?>
                    <?php endif; ?>
                  </p>
                  <p class="voice-card__category">
                    <?php
                      $terms = get_the_terms($post->ID, 'voice_category');
                      if ($terms) {
                        echo $terms[0]->name;
                      }
                      ?>
                  </p>
                </div>
                <h2 class="voice-card__title"><?php the_title(); ?></h2>
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
              <?php the_content(); ?>
            </p>
          </div>
        </div>
        <?php endwhile;
        endif; ?>
      </div>

      <div class="archive-voice__pagenavi wp-pagenavi">
        <?php wp_pagenavi(); ?>
      </div>
    </div>
  </section>


  <?php get_footer(); ?>