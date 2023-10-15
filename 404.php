<?php get_header(); ?>
<?php
$home = esc_url(home_url('/'));
?>
<main>
  <section class="not-found">
    <div class="not-found__inner inner">
      <!-- パンくずリスト -->
      <?php get_template_part('breadcrumb'); ?>

      <h1 class="not-found__title">404</h1>
      <p class="not-found__text">
        申し訳ありません。<br>
        お探しのページが見つかりません。
      </p>
      <div class="not-found__wrapper">
        <!-- button -->
        <a href="<?php echo $home; ?>" class="not-found__button button button--white"><span
            class="button__text button__text--white">Page
            Top</span>
        </a>
      </div>
    </div>
  </section>

</main>
<?php get_footer(); ?>