'use strict';

{
  document.addEventListener('DOMContentLoaded', () => {
  
    // SP or tablet Hamburger menu
    const navBtn = document.querySelector('.js-nav-btn');
  
    const closeMenu = () => {
      navBtn.classList.remove('close-btn');
  
      const navBar = navBtn.querySelectorAll('.nav-bar');
      navBar.forEach(ber => {
        ber.classList.remove('bar-active');
      });

      navBtn.previousElementSibling?.classList.remove('cover');
      navBtn.nextElementSibling?.classList.remove('nav-open');
    }
  
    navBtn.addEventListener('click', function () {
  
      this.classList.toggle('close-btn');
      const navBar = this.querySelectorAll('.nav-bar');
      navBar.forEach(ber => {
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
    const navLinks = document.querySelectorAll('.site-header__item-link');
    navLinks.forEach(link => {
  
      link.addEventListener('click', () => {
        closeMenu();
      });
    });
  
    //main-visulal animations
    const fadeElements = document.querySelectorAll('.js-nav-btn, .js-site-name, .js-header-nav');

    fadeElements.forEach(navItem => {
      navItem.classList.add('header-active');
    });
  
    const line = document.querySelector('.js-line-show');
  
    line.classList.add('wd-active');
    document.querySelector('.leaf-area').classList.add('leaf-show');
    document.querySelector('.js-mask').setAttribute('data-animate', 'on');
  
  
    const copyGroup = [line,
      document.querySelector('.name-ttl'),
      document.querySelector('.catch-copy')
    ];
  
    copyGroup.forEach(catchTlt => {
      catchTlt.classList.add('copy-show');
    });
  
  
    //top-page backbtn
    const pageTop = document.querySelector('.js-page-top');
    window.addEventListener('scroll', () => {
  
      if (window.scrollY > window.innerHeight) {
        pageTop.classList.add('is-show');
      } else {
        pageTop.classList.remove('is-show');
      }
    });
  
    pageTop.addEventListener('click', () => {
  
      window.scrollTo({
        top: 0,
        behavior: 'smooth'
      });
    });
  
    //modal click triggers
    const modalTriggers = document.querySelectorAll('.js-modal-trigger');
    const bgOverlay = document.querySelector('#js-bg-overlay');
    const html = document.documentElement;
    const body = document.body;
  
    modalTriggers.forEach(trigger => {
      trigger.addEventListener('click', () => {
        const targetId = trigger.dataset.target;
        const targetModal = document.getElementById(targetId);
  
        targetModal.classList.add('modal-open');
        bgOverlay.classList.add('bg-open');
        html.classList.add('page-stop');
        body.classList.add('page-stop');
  
      });
    });
  
    // モーダルを閉じる
    const closeModal = () => {
      const openModal = document.querySelector('.modal-open');
      if (openModal) {
        openModal.classList.remove('modal-open');
      }
  
      bgOverlay.classList.remove('bg-open');
      html.classList.remove('page-stop');
      body.classList.remove('page-stop');
    };
  
    // モーダル本体（全画面）の「どこか」をクリックした時
    const modals = document.querySelectorAll('.js-modal');
  
    modals.forEach(modal => {
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
    const fadeElem = document.querySelectorAll('.c-js-fade');
    const options = {
      rootMargin: '0px 0px -100px 0px'
    }
  
    // 交差監視API
    const fadeObserver = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('fade-in');
          fadeObserver.unobserve(entry.target);
        }
      });
    }, options);
    // 全員を一斉に監視スタート
    fadeElem.forEach(Elem => {
      fadeObserver.observe(Elem);
    });
  });
}



