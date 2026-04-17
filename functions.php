<?php
// テーマの初期設定
function my_portfolio_setup() {
  // <title>タグを自動出力する
  add_theme_support('title-tag');
}
add_action('after_setup_theme', 'my_portfolio_setup');

// CSSとJSの読み込み
function my_portfolio_scripts() {
  // リセットCSS
  wp_enqueue_style('reset-css', get_template_directory_uri() . '/css/reset.css', array(), '1.0.0');
  
  // メインCSS（Live Sass Compilerで書き出されたもの）
  // filemtime() を使うと、CSSを保存するたびにキャッシュがクリアされる実務テクニックです
  wp_enqueue_style('main-style', get_template_directory_uri() . '/css/style.css', array('reset-css'), filemtime(get_theme_file_path('/css/style.css')));

  // メインJS（フッターで読み込むために第5引数を true に設定）
  wp_enqueue_script('main-script', get_template_directory_uri() . '/js/script.js', array(), filemtime(get_theme_file_path('/js/script.js')), true);
}
add_action('wp_enqueue_scripts', 'my_portfolio_scripts');