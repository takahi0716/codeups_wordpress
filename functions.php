<?php
function enqueue_custom_styles_and_scripts()
{
  // Google Fonts
  wp_enqueue_style(
    'google-fonts',
    'https://fonts.googleapis.com/css2?family=Gotu&family=Noto+Sans+JP:wght@400;500;700&family=Noto+Serif+JP:wght@400;500;700&display=swap',
    array(),
    null
  );

  // Swiper CSS
  wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css');

  // Theme Stylesheet
  wp_enqueue_style('theme-style', get_theme_file_uri('/dist/assets/css/style.css'));

  // jQuery
  wp_enqueue_script('jquery');

  // jQuery InView
  wp_enqueue_script('jquery-inview', get_theme_file_uri('/dist/assets/js/jquery.inview.min.js'), array('jquery'), null, true);

  // Swiper JS
  wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js', array(), null, true);

  // GSAP
  wp_enqueue_script('gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js', array(), null, true);
  wp_enqueue_script(
    'gsap-scrolltrigger',
    'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js',
    array('gsap'),
    null,
    true
  );

  // Custom Script
  wp_enqueue_script('custom-script', get_theme_file_uri('/dist/assets/js/script.js'), array(
    'jquery', 'gsap',
    'gsap-scrolltrigger'
  ), null, true);
}

add_action('wp_enqueue_scripts', 'enqueue_custom_styles_and_scripts');


function my_setup()
{
  add_theme_support('post-thumbnails'); /* アイキャッチ */
  add_theme_support('automatic-feed-links'); /* RSSフィード */
  add_theme_support('title-tag'); /* タイトルタグ自動生成 */
  add_theme_support(
    'html5',
    array( /* HTML5のタグで出力 */
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
    )
  );
}
add_action('after_setup_theme', 'my_setup');


//アーカイブページの表示件数変更
function change_posts_per_page($query)
{
  if (is_admin() || !$query->is_main_query())
    return;
  if ($query->is_archive(array('campaign'))) { //カスタム投稿タイプを指定
    $query->set('posts_per_page', '4'); //表示件数を指定(全部表示したい場合は-1)
  }
  if ($query->is_archive(array('voice'))) { //カスタム投稿タイプを指定
    $query->set('posts_per_page', '6'); //表示件数を指定(全部表示したい場合は-1)
  }
}
add_action('pre_get_posts', 'change_posts_per_page');


//概要（抜粋）の文字数調整
function my_excerpt_length($length)
{
  return 85;
}
add_filter('excerpt_length', 'my_excerpt_length');


// 記事のPVを取得
function getPostViews($postID)
{
  $count_key = 'post_views_count';
  $count = get_post_meta($postID, $count_key, true);
  if ($count == '') {
    delete_post_meta($postID, $count_key);
    add_post_meta($postID, $count_key, '0');
    return "0 View";
  }
  return $count . ' Views';
}
// 記事のPVをカウントする
function setPostViews($postID)
{
  $count_key = 'post_views_count';
  $count = get_post_meta($postID, $count_key, true);
  if ($count == '') {
    $count = 0;
    delete_post_meta($postID, $count_key);
    add_post_meta($postID, $count_key, '0');
  } else {
    $count++;
    update_post_meta($postID, $count_key, $count);
  }
  // デバッグ start
  echo '';
  echo 'console.log("postID: ' . $postID . '");';
  echo 'console.log("カウント: ' . $count . '");';
  echo '';
  // デバッグ end
}
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

// 管理画面の「投稿」を「ブログ」に変更
function Change_menulabel()
{
  global $menu;
  global $submenu;
  $name = 'ブログ';
  $menu[5][0] = $name;
  $submenu['edit.php'][5][0] = $name . '一覧';
  $submenu['edit.php'][10][0] = '新しい' . $name;
}
function Change_objectlabel()
{
  global $wp_post_types;
  $name = 'ブログ';
  $labels = &$wp_post_types['post']->labels;
  $labels->name = $name;
  $labels->singular_name = $name;
  $labels->add_new = _x('追加', $name);
  $labels->add_new_item = $name . 'の新規追加';
  $labels->edit_item = $name . 'の編集';
  $labels->new_item = '新規' . $name;
  $labels->view_item = $name . 'を表示';
  $labels->search_items = $name . 'を検索';
  $labels->not_found = $name . 'が見つかりませんでした';
  $labels->not_found_in_trash = 'ゴミ箱に' . $name . 'は見つかりませんでした';
}
add_action('init', 'Change_objectlabel');
add_action('admin_menu', 'Change_menulabel');

//Contact Form 7 のカスタマイズ
function filter_wpcf7_form_tag($scanned_tag, $replace)
{
  if (!empty($scanned_tag)) {
    //フォームの名前で判別
    if ($scanned_tag['name'] == 'menu-760') {

      //カスタム投稿タイプの取得
      global $post;
      $args = array(
        'posts_per_page' => -1,
        'post_type' => 'campaign',
        'order' => 'DESC',
      );

      $customPosts = get_posts($args);
      if ($customPosts) {
        foreach ($customPosts as $post) {
          setup_postdata($post);
          $title = get_the_title();

          //$scanned_tagに情報を追加
          $scanned_tag['values'][] = $title;
          $scanned_tag['labels'][] = $title;
        }
      }
      wp_reset_postdata();
    }
  }
  return $scanned_tag;
};
//wpcf7_add_form_tag と言う関数でショートコードと実際のフォームでどのように出力するかを決めている
add_filter('wpcf7_form_tag', 'filter_wpcf7_form_tag', 11, 2);
add_filter('protected_title_format', 'remove_protected');
function remove_protected($title)
{
  return '%s';
}

// Contact Form 7で自動挿入されるPタグ、brタグを削除
add_filter('wpcf7_autop_or_not', 'wpcf7_autop_return_false');
function wpcf7_autop_return_false() {
  return false;
}