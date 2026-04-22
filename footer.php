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

    // ★ 記事のスラッグ（my-portfolio や neorebese など）を安全に取得
    $slug = get_post_field('post_name', get_the_ID());
?>

    <div id="modal-<?php echo esc_attr($slug); ?>" class="modal-<?php echo esc_attr($slug); ?> js-modal" role="dialog" aria-modal="true">
      <div class="modal-<?php echo esc_attr($slug); ?>__wrap">

        <div class="modal-<?php echo esc_attr($slug); ?>__heading-area">
          <h2 class="modal-<?php echo esc_attr($slug); ?>__area-ttl">サイト名: <?php the_field('work_title'); ?></h2>
          <button type="button" class="modal-<?php echo esc_attr($slug); ?>__area-btn js-modal-close" aria-label="モーダルを閉じる">
            <span class="modal-<?php echo esc_attr($slug); ?>__close-ber"></span>
            <span class="modal-<?php echo esc_attr($slug); ?>__close-ber"></span>
          </button>
        </div>

        <div class="modal-<?php echo esc_attr($slug); ?>__content l-container">

          <div class="modal-<?php echo esc_attr($slug); ?>__content-summary">
            <div class="modal-<?php echo esc_attr($slug); ?>__summary-inner">
              <img src="<?php the_field('modal_main_img'); ?>" width="1875" height="1664" alt="<?php the_field('work_title'); ?>" class="modal-<?php echo esc_attr($slug); ?>__inner-img" loading="lazy" decoding="async">
            </div>
            <section class="modal-<?php echo esc_attr($slug); ?>__summary-group">
              <h3 class="modal-<?php echo esc_attr($slug); ?>__summary-ttl">制作概要</h3>
              <dl class="modal-<?php echo esc_attr($slug); ?>__summary-detail">
                <div class="modal-<?php echo esc_attr($slug); ?>__detail-row--col">
                  <dt class="modal-<?php echo esc_attr($slug); ?>__detail-row modal-<?php echo esc_attr($slug); ?>__detail-label--wd">作品名</dt>
                  <dd class="modal-<?php echo esc_attr($slug); ?>__detail-txt c-sec-text"><?php the_field('work_title'); ?></dd>
                </div>
                <div class="modal-<?php echo esc_attr($slug); ?>__detail-row--col">
                  <dt class="modal-<?php echo esc_attr($slug); ?>__detail-row modal-<?php echo esc_attr($slug); ?>__detail-label--wd">使用技術</dt>
                  <dd class="modal-<?php echo esc_attr($slug); ?>__detail-txt c-sec-text"><?php the_field('work_skills'); ?></dd>
                </div>
                <div class="modal-<?php echo esc_attr($slug); ?>__detail-row--col">
                  <dt class="modal-<?php echo esc_attr($slug); ?>__detail-row modal-<?php echo esc_attr($slug); ?>__detail-label--wd">製作期間</dt>
                  <dd class="modal-<?php echo esc_attr($slug); ?>__detail-txt c-sec-text"><?php the_field('work_period'); ?></dd>
                </div>
                <div class="modal-<?php echo esc_attr($slug); ?>__detail-row--base">
                  <dt class="modal-<?php echo esc_attr($slug); ?>__detail-row modal-<?php echo esc_attr($slug); ?>__detail-label--wd">担当範囲</dt>
                  <div class="modal-<?php echo esc_attr($slug); ?>__detail-wrap">
                    <dd class="modal-<?php echo esc_attr($slug); ?>__detail-txt c-sec-text"><?php echo nl2br(esc_html(get_field('work_role'))); ?></dd>
                  </div>
                </div>
                <div class="modal-<?php echo esc_attr($slug); ?>__detail-row--col">
                  <dt class="modal-<?php echo esc_attr($slug); ?>__detail-row modal-<?php echo esc_attr($slug); ?>__detail-label--wd">公開URL</dt>
                  <dd class="modal-<?php echo esc_attr($slug); ?>__detail-txt c-sec-text"><a href="<?php the_field('work_url'); ?>" class="modal-<?php echo esc_attr($slug); ?>__detail-link--ws" target="_blank" rel="noopener"><?php the_field('work_url'); ?></a></dd>
                </div>
              </dl>
            </section>
          </div>

          <section class="modal-<?php echo esc_attr($slug); ?>__content-requirements">
            <h3 class="modal-<?php echo esc_attr($slug); ?>__requirements-ttl">要件定義</h3>
            <dl class="modal-<?php echo esc_attr($slug); ?>__requirements-detail">
              <div class="modal-<?php echo esc_attr($slug); ?>__detail-row">
                <dt class="modal-<?php echo esc_attr($slug); ?>__detail-label">制作背景</dt>
                <dd class="modal-<?php echo esc_attr($slug); ?>__detail-txt c-sec-text"><?php echo nl2br(esc_html(get_field('req_background'))); ?></dd>
              </div>
              <div class="modal-<?php echo esc_attr($slug); ?>__detail-row">
                <dt class="modal-<?php echo esc_attr($slug); ?>__detail-label">ターゲット</dt>
                <dd class="modal-<?php echo esc_attr($slug); ?>__detail-txt c-sec-text"><?php echo nl2br(esc_html(get_field('req_target'))); ?></dd>
              </div>
              <div class="modal-<?php echo esc_attr($slug); ?>__detail-row">
                <dt class="modal-<?php echo esc_attr($slug); ?>__detail-label">訴求ポイント</dt>
                <dd class="modal-<?php echo esc_attr($slug); ?>__detail-txt c-sec-text"><?php echo nl2br(esc_html(get_field('req_appeal'))); ?></dd>
              </div>
            </dl>
          </section>

          <div class="modal-<?php echo esc_attr($slug); ?>__content-design-plan">
            <section class="modal-<?php echo esc_attr($slug); ?>__design-plan">
              <h3 class="modal-<?php echo esc_attr($slug); ?>__design-plan-ttl">デザイン設計</h3>
              <dl class="modal-<?php echo esc_attr($slug); ?>__design-plan-detail">

                <?php for ($i = 1; $i <= 5; $i++): ?>
                  <?php if (get_field('design_title_' . $i)): ?>
                    <div class="modal-<?php echo esc_attr($slug); ?>__detail-row">
                      <dt class="modal-<?php echo esc_attr($slug); ?>__detail-label"><?php the_field('design_title_' . $i); ?></dt>
                      <dd class="modal-<?php echo esc_attr($slug); ?>__detail-txt c-sec-text"><?php echo nl2br(esc_html(get_field('design_text_' . $i))); ?></dd>
                    </div>
                  <?php endif; ?>
                <?php endfor; ?>

              </dl>
            </section>

            <?php if (get_field('design_img_1') || get_field('design_img_2')): ?>
              <div class="modal-<?php echo esc_attr($slug); ?>__design-plan-inner-wrap">
                <?php if (get_field('design_img_1')): ?>
                  <div class="modal-<?php echo esc_attr($slug); ?>__design-plan-inner">
                    <img src="<?php the_field('design_img_1'); ?>" width="900" height="2193" alt="デザイン画像" class="modal-<?php echo esc_attr($slug); ?>__design-inner-img" loading="lazy" decoding="async">
                  </div>
                <?php endif; ?>
                <?php if (get_field('design_img_2')): ?>
                  <div class="modal-<?php echo esc_attr($slug); ?>__design-plan-inner">
                    <img src="<?php the_field('design_img_2'); ?>" width="900" height="2193" alt="デザイン画像" class="modal-<?php echo esc_attr($slug); ?>__design-inner-img" loading="lazy" decoding="async">
                  </div>
                <?php endif; ?>
              </div>
            <?php endif; ?>
          </div>

          <div class="modal-<?php echo esc_attr($slug); ?>__content-coding-plan">
            <section class="modal-<?php echo esc_attr($slug); ?>__coding-plan">
              <h3 class="modal-<?php echo esc_attr($slug); ?>__coding-plan-ttl">コーディング設計</h3>
              <dl class="modal-<?php echo esc_attr($slug); ?>__coding-plan-detail">

                <?php for ($i = 1; $i <= 5; $i++): ?>
                  <?php if (get_field('coding_title_' . $i)): ?>
                    <div class="modal-<?php echo esc_attr($slug); ?>__detail-row">
                      <dt class="modal-<?php echo esc_attr($slug); ?>__detail-label"><?php the_field('coding_title_' . $i); ?></dt>
                      <dd class="modal-<?php echo esc_attr($slug); ?>__detail-txt c-sec-text"><?php echo nl2br(esc_html(get_field('coding_text_' . $i))); ?></dd>
                    </div>
                  <?php endif; ?>
                <?php endfor; ?>

              </dl>
            </section>

            <?php if (get_field('coding_img_1') || get_field('coding_img_2')): ?>
              <div class="modal-<?php echo esc_attr($slug); ?>__coding-plan-img-wrap">

                <?php if (get_field('coding_img_1')): ?>
                  <figure class="modal-<?php echo esc_attr($slug); ?>__coding-plan-inner">
                    <img src="<?php the_field('coding_img_1'); ?>" width="625" height="371" alt="コーディング画像" class="modal-<?php echo esc_attr($slug); ?>__inner-img" loading="lazy" decoding="async">
                    <?php if (get_field('coding_img_1_ttl') || get_field('coding_img_1_txt')): ?>
                      <figcaption class="modal-<?php echo esc_attr($slug); ?>__img-label-wrap">
                        <div class="modal-<?php echo esc_attr($slug); ?>__img-label">
                          <h3 class="modal-<?php echo esc_attr($slug); ?>__label-ttl"><?php the_field('coding_img_1_ttl'); ?></h3>
                          <p class="modal-<?php echo esc_attr($slug); ?>__label-txt c-sec-text"><?php echo nl2br(esc_html(get_field('coding_img_1_txt'))); ?></p>
                        </div>
                      </figcaption>
                    <?php endif; ?>
                  </figure>
                <?php endif; ?>

                <?php if (get_field('coding_img_2')): ?>
                  <figure class="modal-<?php echo esc_attr($slug); ?>__coding-plan-inner">
                    <img src="<?php the_field('coding_img_2'); ?>" width="625" height="371" alt="コーディング画像" class="modal-<?php echo esc_attr($slug); ?>__inner-img" loading="lazy" decoding="async">
                    <?php if (get_field('coding_img_2_ttl') || get_field('coding_img_2_txt')): ?>
                      <figcaption class="modal-<?php echo esc_attr($slug); ?>__img-label-wrap">
                        <div class="modal-<?php echo esc_attr($slug); ?>__img-label">
                          <h3 class="modal-<?php echo esc_attr($slug); ?>__label-ttl"><?php the_field('coding_img_2_ttl'); ?></h3>
                          <p class="modal-<?php echo esc_attr($slug); ?>__label-txt c-sec-text"><?php echo nl2br(esc_html(get_field('coding_img_2_txt'))); ?></p>
                        </div>
                      </figcaption>
                    <?php endif; ?>
                  </figure>
                <?php endif; ?>

              </div>
            <?php endif; ?>

          </div>

          <?php if (get_field('full_img_1') || get_field('full_img_2')): ?>
            <div class="modal-<?php echo esc_attr($slug); ?>__content-img-wrap">

              <?php if (get_field('full_img_1')): ?>
                <div class="modal-<?php echo esc_attr($slug); ?>__content-inner">
                  <img src="<?php the_field('full_img_1'); ?>" alt="SP版サイト画像" class="modal-<?php echo esc_attr($slug); ?>__inner-img" loading="lazy" decoding="async">
                </div>
              <?php endif; ?>

              <?php if (get_field('full_img_2')): ?>
                <div class="modal-<?php echo esc_attr($slug); ?>__content-inner">
                  <img src="<?php the_field('full_img_2'); ?>" alt="PC版サイト画像" class="modal-<?php echo esc_attr($slug); ?>__inner-img" loading="lazy" decoding="async">
                </div>
              <?php endif; ?>

            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>

<?php
  endwhile;
  wp_reset_postdata(); // 3. ループの最後には必ずこれを入れてリセット！
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