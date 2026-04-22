<?php get_header(); ?>

<div class="main-visual">
  <section class="main-visual__site-copy site-copy">
    <h2 class="main-visual__copy-ttl name-ttl"><span class="main-visual__copy-ttl--name">Yuya Ishikawa</span><span class="main-visual__copy-ttl--name">Portfolio</span></h2>
    <div class="main-visual__line js-line-show" aria-hidden="true"></div>
    <p class="main-visual__catch-copy catch-copy"><span class="main-visual__catch-copy--txt">チームでの運用を意識した、</span><span class="main-visual__catch-copy--txt">読みやすく壊れにくいHTML/CSS設計</span></p>
  </section>
  <div class="main-visual__leaf-wind js-background">
    <div class="main-visual__leaf-area leaf-area" aria-hidden="true">
      <span class="main-visual__area-leaf"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/leaf_1.svg" width="69" height="40" alt="" class="main-visual__area-leaf--flowing-1"></span>
      <span class="main-visual__area-leaf"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/leaf_2.svg" width="29" height="23" alt="" class="main-visual__area-leaf--flowing-2"></span>
      <span class="main-visual__area-leaf"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/leaf_3.svg" width="72" height="55" alt="" class="main-visual__area-leaf--flowing-3"></span>
      <span class="main-visual__area-leaf"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/leaf_4.svg" width="74" height="43" alt="" class="main-visual__area-leaf--flowing-4"></span>
      <span class="main-visual__area-leaf"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/leaf_5.svg" width="15" height="19" alt="" class="main-visual__area-leaf--flowing-5"></span>
      <span class="main-visual__area-leaf"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/leaf_6.svg" width="59" height="42" alt="" class="main-visual__area-leaf--flowing-6"></span>
      <span class="main-visual__area-leaf"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/leaf_7.svg" width="26" height="17" alt="" class="main-visual__area-leaf--flowing-7"></span>
      <span class="main-visual__area-leaf"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/leaf_8.svg" width="25" height="22" alt="" class="main-visual__area-leaf--flowing-8"></span>
      <span class="main-visual__area-leaf"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/leaf_9.svg" width="66" height="45" alt="" class="main-visual__area-leaf--flowing-9"></span>
      <span class="main-visual__area-leaf"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/leaf_10.svg" width="41" height="48" alt="" class="main-visual__area-leaf--flowing-10"></span>
      <span class="main-visual__area-leaf"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/leaf_11.svg" width="45" height="31" alt="" class="main-visual__area-leaf--flowing-11"></span>
      <span class="main-visual__area-leaf"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/leaf_12.svg" width="70" height="60" alt="" class="main-visual__area-leaf--flowing-12"></span>
      <span class="main-visual__area-leaf"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/leaf_13.svg" width="60" height="38" alt="" class="main-visual__area-leaf--flowing-13"></span>
      <span class="main-visual__area-leaf"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/leaf_14.svg" width="26" height="15" alt="" class="main-visual__area-leaf--flowing-14"></span>
      <span class="main-visual__area-leaf"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/leaf_15.svg" width="26" height="16" alt="" class="main-visual__area-leaf--flowing-15"></span>
      <span class="main-visual__area-leaf"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/leaf_16.svg" width="51" height="42" alt="" class="main-visual__area-leaf--flowing-16"></span>
      <span class="main-visual__area-leaf"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/leaf_17.svg" width="17" height="13" alt="" class="main-visual__area-leaf--flowing-17"></span>
    </div>
    <div class="main-visual__wind-area" aria-hidden="true">
      <div class="main-visual__leaf-mask js-mask" data-animate="off">
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/wind_line.svg" width="1920" height="329" alt="風のイラスト" class="main-visual__wind-img">
      </div>
    </div>
  </div>
</div>
<main class="main-content">
  <div class="l-container">
    <div class="works" id="works">
      <h2 class="works__ttl c-sec-ttl">WORKS</h2>
      <div class="works__production">

        <section class="works__production-web">
          <h3 class="works__web-ttl">webサイト制作</h3>
          <ul class="works__web-list c-js-fade">

            <?php
            $works_query = new WP_Query(array(
              'post_type'      => 'works',   // CPT UIで作った投稿タイプ名
              'posts_per_page' => -1,        // 全件表示
              'post_status'    => 'publish', // 公開済みの記事のみ
              'order'          => 'ASC'      // 古い順に並べる
            ));
            ?>

            <?php if ($works_query->have_posts()) : ?>
              <?php while ($works_query->have_posts()) : $works_query->the_post(); ?>
                <li class="works__web-list-item">
                  <section class="works__web-item-box">
                    <div class="works__web-item-inner">
                      <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('full', array('class' => 'works__web-inner-img', 'loading' => 'lazy', 'decoding' => 'async')); ?>
                      <?php endif; ?>
                    </div>
                    <h4 class="works__web-item-ttl">
                      <span class="works__ttl-label">サイト名:</span>
                      <span class="works__ttl-name"><?php the_field('works_subtitle'); ?></span>
                    </h4>
                    <dl class="works__web-item-txt">
                      <div class="works__web-txt-row">
                        <dt class="works__txt-label">制作別種:</dt>
                        <dd class="works__txt-summary"><?php the_field('works_category'); ?></dd>
                      </div>
                      <div class="works__web-txt-row">
                        <dt class="works__txt-label">対応内容:</dt>
                        <dd class="works__txt-summary"><?php the_field('works_scope'); ?></dd>
                      </div>
                    </dl>
                    <button type="button" class="works__modal-trigger-btn js-modal-trigger" aria-label="<?php the_title_attribute(); ?>の詳細を見る" data-target="modal-<?php echo esc_attr($post->post_name); ?>" aria-controls="modal-<?php echo esc_attr($post->post_name); ?>">詳細を見る</button>
                  </section>
                </li>
              <?php endwhile; ?>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
          </ul>
        </section>

        <div class="works__production-banner">
          <h3 class="works__banner-ttl">バナー作成</h3>
          <ul class="works__banner-list c-js-fade">
            <?php
            $banner_query = new WP_Query(array(
              'post_type'      => 'banner',
              'posts_per_page' => -1,
              'post_status'    => 'publish',
              'order'          => 'ASC'
            ));
            ?>
            <?php if ($banner_query->have_posts()) : ?>
              <?php while ($banner_query->have_posts()) : $banner_query->the_post(); ?>
                <li class="works__banner-list-item">
                  <div class="works__banner-item-container">
                    <div class="works__banner-item-inner">
                      <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('full', array('class' => 'works__banner-inner-img', 'loading' => 'lazy', 'decoding' => 'async', 'alt' => get_the_title())); ?>
                      <?php endif; ?>
                    </div>
                    <button type="button" class="works__banner-trigger js-modal-trigger js-no-scroll" aria-label="<?php echo esc_attr(get_the_title()); ?>の詳細を見る" data-target="modal-<?php echo esc_attr($post->post_name); ?>" aria-controls="modal-<?php echo esc_attr($post->post_name); ?>"></button>
                  </div>
                </li>
              <?php endwhile; ?>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
          </ul>
        </div>

        <div class="works__production-logo">
          <h3 class="works__logo-ttl">ロゴ作成</h3>
          <ul class="works__logo-list c-js-fade">
            <?php
            $logo_query = new WP_Query(array(
              'post_type'      => 'logo',
              'posts_per_page' => -1,
              'post_status'    => 'publish',
              'order'          => 'ASC'
            ));
            ?>
            <?php if ($logo_query->have_posts()) : ?>
              <?php while ($logo_query->have_posts()) : $logo_query->the_post(); ?>
                <li class="works__logo-list-item">
                  <div class="works__logo-item-container">
                    <div class="works__logo-item-inner">
                      <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('full', array('class' => 'works__logo-inner-img', 'loading' => 'lazy', 'decoding' => 'async', 'alt' => get_the_title())); ?>
                      <?php endif; ?>
                    </div>
                    <button type="button" class="works__logo-item-trigger js-modal-trigger" aria-label="<?php echo esc_attr(get_the_title()); ?>の詳細を見る" data-target="modal-<?php echo esc_attr($post->post_name); ?>" aria-controls="modal-<?php echo esc_attr($post->post_name); ?>"></button>
                  </div>
                </li>
              <?php endwhile; ?>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
          </ul>
        </div>
      </div>
    </div>
    <section class="about" id="about">
      <h2 class="about__ttl c-sec-ttl">ABOUT</h2>
      <div class="about__Self-intro c-js-fade">
        <div class="about__intro-inner"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/my_about_img.jpg" width="625" height="409" alt="レスポンシブ対応を反映したイラスト" class="about__inner-img" loading="lazy" decoding="async"></div>
        <section class="about__intro-detail">
          <h3 class="about__intro-ttl">私について</h3>
          <p class="about__intro-txt c-sec-text">東京都在住。</p>
          <p class="about__intro-txt c-sec-text">精密部品や航空宇宙分野のはんだ付け・組み立てなど、品質が求められるモノづくりの現場を経験してきました。</p>
          <p class="about__intro-txt c-sec-text">現在はWeb制作を学びながら実務にも取り組んでいます。</p>
          <p class="about__intro-txt c-sec-text">丁寧で再現性のある実装を大切にしています。</p>
        </section>
      </div>

      <section class="about__coding-skill">
        <h3 class="about__skill-ttl">CODING SKILL</h3>
        <div class="about__skill-list-wrap c-js-fade">
          <dl class="about__skill-list">
            <div class="about__list-item">
              <dt class="about__item-name">HTML / CSS</dt>
              <dd class="about__item-detail c-sec-text">デザインカンプをもとに、セマンティックなマークアップを意識したコーディングが可能です。レスポンシブや保守性、拡張性も考慮した実装を心がけています。</dd>
            </div>
          </dl>
          <dl class="about__skill-list">
            <div class="about__list-item">
              <dt class="about__item-name">jQuery</dt>
              <dd class="about__item-detail c-sec-text">DOM操作やイベント制御によるUI実装が可能です。これまでの制作ではjQueryを使用し、現在はプレーンなJavaScriptでの実装力向上に取り組んでいます。</dd>
            </div>
          </dl>
          <dl class="about__skill-list">
            <div class="about__list-item">
              <dt class="about__item-name">SASS</dt>
              <dd class="about__item-detail c-sec-text">BEM設計を取り入れ、変数管理を行いながら、クラス構造を整理した保守性の高いスタイル設計を行っています。</dd>
            </div>
          </dl>
          <dl class="about__skill-list">
            <div class="about__list-item">
              <dt class="about__item-name">BootStrap</dt>
              <dd class="about__item-detail c-sec-text">SASSと併用し、効率的なコーディングによる短納期対応が可能です。Bootstrapを用いた既存のサイトの改修やカスタマイズにも対応できます。</dd>
            </div>
          </dl>
          <dl class="about__skill-list">
            <div class="about__list-item">
              <dt class="about__item-name">WordPress</dt>
              <dd class="about__item-detail c-sec-text">オリジナルテーマの自作や既存テーマの改修や、PHPの基礎構文を利用し、WordPress独自のループ処理や条件分岐、テンプレートタグを用いたサイト構築が可能です。</dd>
            </div>
          </dl>
          <dl class="about__skill-list">
            <div class="about__list-item">
              <dt class="about__item-name">Git / Git-Hub</dt>
              <dd class="about__item-detail c-sec-text">Gitを用いたバージョン管理の基本操作が可能です。変更履歴を適切に管理し、既存コードを壊さない安全な実装を心がけています。</dd>
            </div>
          </dl>
        </div>
      </section>

      <section class="about__design-skill">
        <h3 class="about__skill-ttl">DESIGN SKILL</h3>
        <div class="about__skill-list-wrap c-js-fade">
          <dl class="about__skill-list">
            <div class="about__list-item">
              <dt class="about__item-name about__item-name--design">illustrator</dt>
              <dd class="about__item-detail c-sec-text">簡易ロゴや図形制作、パス操作など、Web制作に必要な基本操作が可能です。</dd>
            </div>
          </dl>
          <dl class="about__skill-list">
            <div class="about__list-item">
              <dt class="about__item-name about__item-name--design">Photoshop</dt>
              <dd class="about__item-detail c-sec-text">バナー制作や画像レタッチ、Web用素材の書き出しなど、コーディングを前提とした素材調整が可能です。</dd>
            </div>
          </dl>
          <dl class="about__skill-list">
            <div class="about__list-item">
              <dt class="about__item-name about__item-name--design">Figma</dt>
              <dd class="about__item-detail c-sec-text">デザインカンプ制作やプロトタイプ作成に対応可能です。コンポーネント設計やオートレイアウトの基本操作も扱えます。</dd>
            </div>
          </dl>
          <dl class="about__skill-list">
            <div class="about__list-item">
              <dt class="about__item-name about__item-name--design">Adobe XD</dt>
              <dd class="about__item-detail c-sec-text">デザインカンプ制作および簡易的なプロトタイプ作成が可能です。エンジニア視点を意識したデザイン設計を心がけています。</dd>
            </div>
          </dl>
        </div>
      </section>
    </section>
    <section class="contact" id="contact">
      <h2 class="contact__ttl c-sec-ttl">CONTACT</h2>
      <div class="contact__form-wrap c-js-fade">
        <?php echo do_shortcode('[contact-form-7 id="mail_form" title="CONTACT" html_id="mail_form" html_class="contact__form"]'); ?>
        <p class="contact__txt-bottom c-sec-text">※フォーム送信後、ご入力いただいたメールアドレス宛に自動返信メールが届きます。</p>
      </div>
    </section>
  </div>
</main>

<?php get_footer(); ?>