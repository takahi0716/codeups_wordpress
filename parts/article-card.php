<a href="<?php the_permalink(); ?>" class="article-card">
  <figure class="article-card__img">
    <?php if (get_the_post_thumbnail()) : ?>
    <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title() ?>の画像">
    <?php else : ?>
    <img src="<?php echo get_theme_file_uri(); ?>/dist/assets/images/common/no-image.jpg" alt="noimage">
    <?php endif; ?>
  </figure>
  <div class="article-card__body">
    <time class="article-card__time" datetime="<?php the_time('c'); ?>"><?php the_time('Y.m.d'); ?></time>
    <h3 class="article-card__title "><?php the_title(); ?></h3>
    <p class="article-card__text">
      <?php the_excerpt(); ?>
    </p>
  </div>
</a>