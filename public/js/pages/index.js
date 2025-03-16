// Main Slider
let mainSliderSelector = '.main-slider',
    navSliderSelector = '.nav-slider',
    interleaveOffset = 0.5;


// Main Slider
let mainSliderOptions = {
  loop: false,
  speed: 1000,
  autoplay: {
    delay: 3000,
    disableOnInteraction: false,
  },
  loopAdditionalSlides: 5,
  grabCursor: true,
  watchSlidesProgress: true,
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  on: {
    init: function () {
      // On slider initialization, show the caption for the first slide
      let firstCaption = this.slides[0].querySelector('.caption');
      if (firstCaption) {
        firstCaption.classList.add('show');
      }
    },
    imagesReady: function () {
      this.el.classList.remove('loading');
      this.autoplay.start(); // Start autoplay when images are ready
    },
    slideChangeTransitionEnd: function () {
      let swiper = this;
      // Remove "show" class from all captions
      let captions = swiper.el.querySelectorAll('.caption');
      for (let i = 0; i < captions.length; ++i) {
        captions[i].classList.remove('show');
      }
      // Add "show" class to the active slide's caption
      let activeCaption = swiper.slides[swiper.activeIndex].querySelector('.caption');
      if (activeCaption) {
        setTimeout(function () {
          activeCaption.classList.add('show');
        }, 100);
      }
    },
    touchEnd: function () {
      let swiper = this;
      // Ensure captions are updated after a touch interaction
      let captions = swiper.el.querySelectorAll('.caption');
      for (let i = 0; i < captions.length; ++i) {
        captions[i].classList.remove('show');
      }
      let activeCaption = swiper.slides[swiper.activeIndex].querySelector('.caption');
      if (activeCaption) {
        setTimeout(function () {
          activeCaption.classList.add('show');
        }, 100);
      }
    },
    progress: function () {
      let swiper = this;
      for (let i = 0; i < swiper.slides.length; i++) {
        let slideProgress = swiper.slides[i].progress,
          innerOffset = 0,
          innerTranslate = slideProgress * innerOffset/4;

        swiper.slides[i].querySelector('.slide-bgimg').style.transform =
          'translateX(' + innerTranslate + 'px)';
      }
    },
    touchStart: function () {
      let swiper = this;
      for (let i = 0; i < swiper.slides.length; i++) {
        swiper.slides[i].style.transition = '';
      }
    },
    setTransition: function (speed) {
      let swiper = this;
      for (let i = 0; i < swiper.slides.length; i++) {
        swiper.slides[i].style.transition = speed + 'ms';
        swiper.slides[i].querySelector('.slide-bgimg').style.transition =
          speed + 'ms';
      }
    },
  },
};
let mainSlider = new Swiper('.main-slider', mainSliderOptions);




// slider products
$(document).ready(function() {
  $('.card-slider').slick({
    dots: false,
    arrows: true,
    slidesToShow: 5,
    infinite: false,
    prevArrow: '<button type="button" class="slick-prev"></button>',
    nextArrow: '<button type="button" class="slick-next"></button>',
    responsive: [
      {
        breakpoint: 1224,
        settings: {
          slidesToShow: 4
        }
      },
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3
        }
      },
      {
        breakpoint: 800,
        settings: {
          slidesToShow: 3
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 2
        }
      }

    ]

  });
});
