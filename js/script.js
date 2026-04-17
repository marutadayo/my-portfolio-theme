'use strict';

document.addEventListener('DOMContentLoaded', () => {
  //必ず必要ではないが画面読み込み時にイベント処理など入れる場合はお作法として'DOMContentLoaded'を入れておく。
  //ブラウザがHTMLを読み終わる前にJavaScriptが走り出すのを防ぐため。HTMLのパース（解析）が全部終わったから動いてOKともいう。

  // SP or tablet Hamburger menu
  const $navBtn = document.querySelector('.js-nav-btn');

  const closeMenu = () => {
    $navBtn.classList.remove('close-btn');

    const $navBar = $navBtn.querySelectorAll('.nav-ber');
    $navBar.forEach(ber => {
      ber.classList.remove('bar-active');
    });

    // ?.（オプショナルチェーン）if文と同じだが分岐先がなかった場合に使う
    // もしなかったらスルーするだけ
    // 分岐させたいときはif else を使うか 代わりのデータをセットしたい時は ?? も使える。
    // 書かなくても動くのになぜ書くか、「防衛的プログラミング」保険をかける
    //「予期せぬ変更があっても、エラーで画面全体がフリーズするのだけは防ぐ」
    $navBtn.previousElementSibling?.classList.remove('cover');
    $navBtn.nextElementSibling?.classList.remove('nav-open');
  }

  $navBtn.addEventListener('click', function () {

    this.classList.toggle('close-btn');
    //子要素の .nav-berはjQueryではfind等で子要素を指定できるがvanillaではquerySelectorAllなど他にも色々ある
    //querySelectorAllは配列で返す。配列の中身を一つずつ処理する必要があるのでforEachを入れる。
    const $navBar = this.querySelectorAll('.nav-ber');
    $navBar.forEach(ber => {
      ber.classList.toggle('bar-active');
    });

    this.previousElementSibling?.classList.toggle('cover');
    this.nextElementSibling?.classList.toggle('nav-open');
  });

  document.addEventListener('click', (e) => {

    if (!e.target.closest('.js-nav-btn, .js-global-nav')) {
      closeMenu();
    }
  });
  const $navLinks = document.querySelectorAll('.site-header__item-link');
  $navLinks.forEach(link => {

    link.addEventListener('click', () => {
      closeMenu();
    });
  });

  //main-visulal animations
  const $fadeElements = document.querySelectorAll('.js-nav-btn, .js-site-name, .js-header-nav');
  //これもさっきのハンバーガーメニューと同じだがquerySelectorAllは親兄弟子関係なくクラスを指定し配列にできる。
  //逆にカンマで区切らなければ子孫要素まで取得してしまう。なので後はforEachで一つずつ取り出して処理していくだけ。
  $fadeElements.forEach(navItem => {
    navItem.classList.add('header-active');
  });

  const $line = document.querySelector('.js-line-show');

  $line.classList.add('wd-active');
  document.querySelector('.leaf-area').classList.add('leaf-show');
  document.querySelector('.js-mask').setAttribute('data-animate', 'on');


  const $copyGroup = [$line,
    document.querySelector('.name-ttl'),
    document.querySelector('.catch-copy')
  ];

  $copyGroup.forEach(catchTlt => {
    catchTlt.classList.add('copy-show');
  });


  //top-page backbtn
  const $pageTop = document.querySelector('.js-page-top');
  window.addEventListener('scroll', () => {

    if (window.scrollY > window.innerHeight) {
      $pageTop.classList.add('is-show');
    } else {
      $pageTop.classList.remove('is-show');
    }
  });

  $pageTop.addEventListener('click', () => {

    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    });
  });

  //modal click triggers
  const $modalTriggers = document.querySelectorAll('.js-modal-trigger');
  const $bgOverlay = document.querySelector('#js-bg-overlay');
  const $html = document.documentElement; //  htmlタグを取得
  const $body = document.body;            //  bodyタグを取得

  $modalTriggers.forEach(trigger => {
    trigger.addEventListener('click', () => {
      const targetId = trigger.dataset.target;
      const $targetModal = document.getElementById(targetId);

      $targetModal.classList.add('modal-open');
      $bgOverlay.classList.add('bg-open');
      $html.classList.add('page-stop');
      $body.classList.add('page-stop');

    });
  });

  // 【準備】モーダルを閉じる
  const closeModal = () => {
    const $openModal = document.querySelector('.modal-open');
    if ($openModal) {
      $openModal.classList.remove('modal-open');
    }

    $bgOverlay.classList.remove('bg-open');
    $html.classList.remove('page-stop');
    $body.classList.remove('page-stop');
  };

  // 【実行】モーダル本体（全画面）の「どこか」をクリックした時
  const $modals = document.querySelectorAll('.js-modal');

  $modals.forEach(modal => {
    // どこをクリックしても閉じる
    modal.addEventListener('click', () => {
      closeModal();
    });

    if (modal.classList.contains('js-no-scroll')) {

      modal.addEventListener('wheel', (e) => {
        e.preventDefault();
      }, { passive: false });

      modal.addEventListener('touchmove', (e) => {
        e.preventDefault();
      }, { passive: false });

    }
  });

  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
      closeModal();
    }
  });

  // スクロールでフワッと表示させるアニメーション
  // 1. 監視対象（.c-js-fade）のリストを作る
  const $fadeElem = document.querySelectorAll('.c-js-fade');
  const options = {
    // 画面の下から「-100px」内側に入った時を交差検知にする
    //rootは交差監視をする枠のような要素
    rootMrtgin: '0px 0px -100px 0px'
  }

  // 2. 交差監視API（Observer）のルールを決める　
  const fadeObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      // isIntersecting（イズ・インターセクティング ＝ 交差しているか？）
      if (entry.isIntersecting) {
        entry.target.classList.add('fade-in');
        fadeObserver.unobserve(entry.target);
      }
    });
    // 見張らせるとき、第2引数に「指示書（options）」を渡す
  }, options);
  // 3. 全員を一斉に監視スタート
  $fadeElem.forEach(Elem => {
    fadeObserver.observe(Elem);
  });
});



