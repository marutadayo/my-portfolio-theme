<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="UTF-8">
  <meta name="format-detection" content="telephone=no">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Yuya Ishikawa のポートフォリオサイトです">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;700&family=Noto+Serif+JP:wght@400;500;700&display=swap" rel="stylesheet">
  
  <?php wp_head(); ?> </head>

<body id="index" <?php body_class('js-page-stop'); ?>>
<?php wp_body_open(); ?>
  <div class="wrapper">
    <header class="site-header">
      <h1 class="site-header__site-name js-site-name">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="site-header__name-link">
          <img src="<?php echo get_template_directory_uri(); ?>/images/site_logo.svg" width="990" height="990" alt="私のポートフォリオサイトロゴ" class="site-header__site-logo">My Portfolio
        </a>
      </h1>

      <div class="site-header__hero-area area-mask"></div>
      <button class="site-header__nav-btn js-nav-btn" aria-controls="global-nav" aria-expanded="false">
        <span class="site-header__btn-bar nav-ber"></span>
        <span class="site-header__btn-bar nav-ber"></span>
        <span class="site-header__btn-bar nav-ber"></span>
        <span class="site-header__btn-txt nav-ber">Close</span>
      </button>
      <nav class="site-header__global-nav js-global-nav js-header-nav" id="global-nav">
        <ul class="site-header__nav-list">
          <li class="site-header__list-item"><a href="#about" class="site-header__item-link"><span class="site-header__link-number">01</span>ABOUT<span class="site-header__link-ja-txt">私について</span></a></li>
          <li class="site-header__list-item"><a href="#works" class="site-header__item-link"><span class="site-header__link-number">02</span>WORKS<span class="site-header__link-ja-txt">作品紹介</span></a></li>
          <li class="site-header__list-item"><a href="#contact" class="site-header__item-link"><span class="site-header__link-number">03</span>CONTACT<span class="site-header__link-ja-txt">連絡先</span></a></li>
        </ul>
      </nav>
    </header>