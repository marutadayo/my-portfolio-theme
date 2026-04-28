<footer class="site-footer">
  <ul class="site-footer__list">
    <li class="site-footer__list-item"><a href="#about" class="site-footer__item-link">ABOUT</a></li>
    <li class="site-footer__list-item"><a href="#works" class="site-footer__item-link">WORKS</a></li>
    <li class="site-footer__list-item"><a href="#contact" class="site-footer__item-link">CONTACT</a></li>
  </ul>
  <small class="site-footer__copyright">Copyright My Portfolio All Rights Reserved </small>
</footer>

<div class="page-top js-page-top"><span class="page-top__arrow"></span></div>

<?php
// 1. WORKSのカスタム投稿を全件取得する設定
$args = array(
  'post_type' => 'works',
  'posts_per_page' => -1,
);
$works_query = new WP_Query($args);

// 2. WORKSの記事が存在すればループ
if ($works_query->have_posts()) :
  while ($works_query->have_posts()) : $works_query->the_post();

    // 記事のスラッグを安全に取得
    $slug = get_post_field('post_name', get_the_ID());

    // ★プロのテクニック：特定の案件（レイアウトを変えたい案件）の時だけModifierクラスを付与する
    $modifier_class = '';
    if ($slug === 'my-portfolio' || $slug === 'bizen-fc' || $slug === 'iy_pf') {
      $modifier_class = ' c-work-modal--split';
    }
?>

    <div id="modal-<?php echo esc_attr($slug); ?>" class="c-work-modal<?php echo $modifier_class; ?> js-modal" role="dialog" aria-modal="true">
      <div class="c-work-modal__wrap">

        <div class="c-work-modal__heading-area">
          <h2 class="c-work-modal__area-ttl">サイト名: <?php the_field('work_title'); ?></h2>
          <button type="button" class="c-work-modal__area-btn js-modal-close" aria-label="モーダルを閉じる">
            <span class="c-work-modal__close-ber"></span>
            <span class="c-work-modal__close-ber"></span>
          </button>
        </div>

        <div class="c-work-modal__content l-container">
          <div class="c-work-modal__content-summary">
            <div class="c-work-modal__summary-inner">
              <img src="<?php the_field('modal_main_img'); ?>" width="1875" height="1664" alt="<?php the_field('work_title'); ?>" class="c-work-modal__inner-img" loading="lazy" decoding="async">
            </div>
            <section class="c-work-modal__summary-group">
              <h3 class="c-work-modal__summary-ttl">制作概要</h3>
              <dl class="c-work-modal__summary-detail">
                <div class="c-work-modal__detail-row--col">
                  <dt class="c-work-modal__detail-row c-work-modal__detail-label--wd">作品名</dt>
                  <dd class="c-work-modal__detail-txt c-sec-text"><?php the_field('work_title'); ?></dd>
                </div>
                <div class="c-work-modal__detail-row--col">
                  <dt class="c-work-modal__detail-row c-work-modal__detail-label--wd">使用技術</dt>
                  <dd class="c-work-modal__detail-txt c-sec-text"><?php echo nl2br(esc_html(get_field('work_skills'))); ?></dd>
                </div>
                <div class="c-work-modal__detail-row--col">
                  <dt class="c-work-modal__detail-row c-work-modal__detail-label--wd">製作期間</dt>
                  <dd class="c-work-modal__detail-txt c-sec-text"><?php the_field('work_period'); ?></dd>
                </div>
                <div class="c-work-modal__detail-row--base">
                  <dt class="c-work-modal__detail-row c-work-modal__detail-label--wd">担当範囲</dt>
                  <div class="c-work-modal__detail-wrap">
                    <dd class="c-work-modal__detail-txt c-sec-text"><?php echo nl2br(esc_html(get_field('work_role'))); ?></dd>
                  </div>
                </div>
                <div class="c-work-modal__detail-row--col">
                  <dt class="c-work-modal__detail-row c-work-modal__detail-label--wd">公開URL</dt>
                  <dd class="c-work-modal__detail-txt c-sec-text"><a href="<?php the_field('work_url'); ?>" class="c-work-modal__detail-link--ws" target="_blank" rel="noopener"><?php the_field('work_url'); ?></a></dd>
                </div>
              </dl>
            </section>
          </div>

          <section class="c-work-modal__content-requirements">
            <h3 class="c-work-modal__requirements-ttl">要件定義</h3>
            <dl class="c-work-modal__requirements-detail">
              <div class="c-work-modal__detail-row">
                <dt class="c-work-modal__detail-label">制作背景</dt>
                <dd class="c-work-modal__detail-txt c-sec-text"><?php echo nl2br(esc_html(get_field('req_background'))); ?></dd>
              </div>
              <div class="c-work-modal__detail-row">
                <dt class="c-work-modal__detail-label">ターゲット</dt>
                <dd class="c-work-modal__detail-txt c-sec-text"><?php echo nl2br(esc_html(get_field('req_target'))); ?></dd>
              </div>
              <div class="c-work-modal__detail-row">
                <dt class="c-work-modal__detail-label">訴求ポイント</dt>
                <dd class="c-work-modal__detail-txt c-sec-text"><?php echo nl2br(esc_html(get_field('req_appeal'))); ?></dd>
              </div>
            </dl>
          </section>

          <div class="c-work-modal__content-design-plan">
            <section class="c-work-modal__design-plan">
              <h3 class="c-work-modal__design-plan-ttl">デザイン設計</h3>
              <dl class="c-work-modal__design-plan-detail">
                <?php for ($i = 1; $i <= 5; $i++): ?>
                  <?php if (get_field('design_title_' . $i)): ?>
                    <div class="c-work-modal__detail-row">
                      <dt class="c-work-modal__detail-label"><?php the_field('design_title_' . $i); ?></dt>
                      <dd class="c-work-modal__detail-txt c-sec-text"><?php echo nl2br(esc_html(get_field('design_text_' . $i))); ?></dd>
                    </div>
                  <?php endif; ?>
                <?php endfor; ?>
              </dl>
            </section>

            <?php if (get_field('design_img_1') || get_field('design_img_2')): ?>
              <div class="c-work-modal__design-plan-inner-wrap">
                <?php if (get_field('design_img_1')): ?>
                  <div class="c-work-modal__design-plan-inner">
                    <img src="<?php the_field('design_img_1'); ?>" width="900" height="2193" alt="デザイン画像" class="c-work-modal__design-inner-img" loading="lazy" decoding="async">
                  </div>
                <?php endif; ?>
                <?php if (get_field('design_img_2')): ?>
                  <div class="c-work-modal__design-plan-inner">
                    <img src="<?php the_field('design_img_2'); ?>" width="900" height="2193" alt="デザイン画像" class="c-work-modal__design-inner-img" loading="lazy" decoding="async">
                  </div>
                <?php endif; ?>
              </div>
            <?php endif; ?>
          </div>

          <div class="c-work-modal__content-coding-plan">
            <section class="c-work-modal__coding-plan">
              <h3 class="c-work-modal__coding-plan-ttl">コーディング設計</h3>
              <dl class="c-work-modal__coding-plan-detail">
                <?php for ($i = 1; $i <= 5; $i++): ?>
                  <?php if (get_field('coding_title_' . $i)): ?>
                    <div class="c-work-modal__detail-row">
                      <dt class="c-work-modal__detail-label"><?php the_field('coding_title_' . $i); ?></dt>
                      <dd class="c-work-modal__detail-txt c-sec-text"><?php echo nl2br(esc_html(get_field('coding_text_' . $i))); ?></dd>
                    </div>
                  <?php endif; ?>
                <?php endfor; ?>
              </dl>
            </section>

            <?php if (get_field('coding_img_1') || get_field('coding_img_2')): ?>
              <div class="c-work-modal__coding-plan-img-wrap">
                <?php if (get_field('coding_img_1')): ?>
                  <figure class="c-work-modal__coding-plan-inner">
                    <img src="<?php the_field('coding_img_1'); ?>" width="625" height="371" alt="コーディング画像" class="c-work-modal__inner-img" loading="lazy" decoding="async">
                    <?php if (get_field('coding_img_1_ttl') || get_field('coding_img_1_txt')): ?>
                      <figcaption class="c-work-modal__img-label-wrap">
                        <div class="c-work-modal__img-label">
                          <h3 class="c-work-modal__label-ttl"><?php the_field('coding_img_1_ttl'); ?></h3>
                          <p class="c-work-modal__label-txt c-sec-text"><?php echo nl2br(esc_html(get_field('coding_img_1_txt'))); ?></p>
                        </div>
                      </figcaption>
                    <?php endif; ?>
                  </figure>
                <?php endif; ?>

                <?php if (get_field('coding_img_2')): ?>
                  <figure class="c-work-modal__coding-plan-inner">
                    <img src="<?php the_field('coding_img_2'); ?>" width="625" height="371" alt="コーディング画像" class="c-work-modal__inner-img" loading="lazy" decoding="async">
                    <?php if (get_field('coding_img_2_ttl') || get_field('coding_img_2_txt')): ?>
                      <figcaption class="c-work-modal__img-label-wrap">
                        <div class="c-work-modal__img-label">
                          <h3 class="c-work-modal__label-ttl"><?php the_field('coding_img_2_ttl'); ?></h3>
                          <p class="c-work-modal__label-txt c-sec-text"><?php echo nl2br(esc_html(get_field('coding_img_2_txt'))); ?></p>
                        </div>
                      </figcaption>
                    <?php endif; ?>
                  </figure>
                <?php endif; ?>
              </div>
            <?php endif; ?>
          </div>

          <?php if (get_field('full_img_1') || get_field('full_img_2')): ?>
            <div class="c-work-modal__content-img-wrap">
              <?php if (get_field('full_img_1')): ?>
                <div class="c-work-modal__content-inner">
                  <img src="<?php the_field('full_img_1'); ?>" alt="SP版サイト画像" class="c-work-modal__inner-img" loading="lazy" decoding="async">
                </div>
              <?php endif; ?>
              <?php if (get_field('full_img_2')): ?>
                <div class="c-work-modal__content-inner">
                  <img src="<?php the_field('full_img_2'); ?>" alt="PC版サイト画像" class="c-work-modal__inner-img" loading="lazy" decoding="async">
                </div>
              <?php endif; ?>
            </div>
          <?php endif; ?>

        </div>
      </div>
    </div>

<?php
  endwhile;
  wp_reset_postdata();
endif;
?>

<?php
// バナーとロゴの両方を一気に取得する設定
$image_modal_query = new WP_Query(array(
  'post_type'      => array('banner', 'logo'), // バナーとロゴ、両方の投稿タイプを対象にする
  'posts_per_page' => -1,                      // 全件取得
  'post_status'    => 'publish',               // 公開済みのみ
));

if ($image_modal_query->have_posts()) :
  while ($image_modal_query->have_posts()) : $image_modal_query->the_post();
    $slug = $post->post_name; // スラッグ（URL名）をIDとして使用する
?>

    <div id="modal-<?php echo esc_attr($slug); ?>" class="c-image-modal js-modal js-no-scroll" role="dialog" aria-modal="true">
      <button type="button" class="c-image-modal__close-btn js-modal-close" aria-label="モーダルを閉じる">
        <span class="c-image-modal__close-bar"></span>
        <span class="c-image-modal__close-bar"></span>
      </button>
      <div class="c-image-modal__content">
        <?php
        // アイキャッチ画像があれば表示する
        if (has_post_thumbnail()) :
          the_post_thumbnail('full', array('loading' => 'lazy', 'decoding' => 'async'));
        endif;
        ?>
      </div>
    </div>

<?php
  endwhile;
  wp_reset_postdata(); // クエリをリセットしてメインループに影響を与えないようにする
endif;
?>

<?php wp_footer(); ?>
</body>

</html>