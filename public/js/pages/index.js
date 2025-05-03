// ------------------------Main Slider hero top --------------------
function sliderHeroMainTop(){
  var options = {
    loop: true,
    accessibility: true,
    prevNextButtons: true,
    pageDots: true,
    setGallerySize: false,
    autoPlay: 3000,
    pauseAutoPlayOnHover: false,
    arrowShape: {
      x0: 10,
      x1: 60,
      y1: 50,
      x2: 60,
      y2: 45,
      x3: 15
    }
};

var carousel = document.querySelector('[data-carousel]');
var slides = document.getElementsByClassName('carousel-cell');
var flkty = new Flickity(carousel, options);

flkty.on('scroll', function () {
    flkty.slides.forEach(function (slide, i) {
        var image = slides[i];
        var x = (slide.target + flkty.x) * -1 / 3;
        image.style.backgroundPosition = x + 'px';
    });
});


}

sliderHeroMainTop()


// ------------------------Main Slider products latest--------------------

function LatestmainSliderProducts(){
  let mainSliderSelector = '.main-slider',
  navSliderSelector = '.nav-slider',
  interleaveOffset = 0.5;


let mainSliderOptions = {
loop: true,
speed: 1000,
slidesPerView: 5, // Default: Show 5 slides at a time
spaceBetween: 10,
autoplay: {
  delay: 3000,
  disableOnInteraction: false,
},
grabCursor: true,
watchSlidesProgress: true,
navigation: {
  nextEl: '.swiper-button-next',
  prevEl: '.swiper-button-prev',
},
breakpoints: {
  1200: { slidesPerView: 5 },
  992: { slidesPerView: 4 },
  768: { slidesPerView: 3 },
  176: { slidesPerView: 2 },
},
on: {
  init: function () {
    let firstCaption = this.slides[0].querySelector('.caption');
    if (firstCaption) {
      firstCaption.classList.add('show');
    }
  },
  imagesReady: function () {
    this.el.classList.remove('loading');
    this.autoplay.start();
  },
  slideChangeTransitionEnd: function () {
    let swiper = this;
    let captions = swiper.el.querySelectorAll('.caption');
    captions.forEach((caption) => caption.classList.remove('show'));

    let activeCaption = swiper.slides[swiper.activeIndex].querySelector('.caption');
    if (activeCaption) {
      setTimeout(() => activeCaption.classList.add('show'), 100);
    }
  },
  touchEnd: function () {
    let swiper = this;
    let captions = swiper.el.querySelectorAll('.caption');
    captions.forEach((caption) => caption.classList.remove('show'));

    let activeCaption = swiper.slides[swiper.activeIndex].querySelector('.caption');
    if (activeCaption) {
      setTimeout(() => activeCaption.classList.add('show'), 100);
    }
  },
  progress: function () {
    let swiper = this;
    swiper.slides.forEach((slide) => {
      let slideProgress = slide.progress;
      let innerOffset = 0;
      let innerTranslate = (slideProgress * innerOffset) / 4;
      slide.querySelector('.slide-bgimg').style.transform = `translateX(${innerTranslate}px)`;
    });
  },
  touchStart: function () {
    let swiper = this;
    swiper.slides.forEach((slide) => (slide.style.transition = ''));
  },
  setTransition: function (speed) {
    let swiper = this;
    swiper.slides.forEach((slide) => {
      slide.style.transition = `${speed}ms`;
      slide.querySelector('.slide-bgimg').style.transition = `${speed}ms`;
    });
  },
},
};

let mainSlider = new Swiper('.main-slider', mainSliderOptions);

}
LatestmainSliderProducts()


// slider products
function sliderProducts(){
  $(document).ready(function() {
    $('.card-slider').slick({
      dots: false,
      arrows: true,
      loop: true,
      slidesToShow: 7,
      slidesToScroll: 5, // Moves one slide at a time when using arrows
      infinite: true,
      swipeToSlide: true, // Allows dragging multiple slides at once
      prevArrow: '<button type="button" class="slick-prev"></button>',
      nextArrow: '<button type="button" class="slick-next"></button>',
      responsive: [
        {
          breakpoint: 1624,
          settings: {
            slidesToShow: 5,
            slidesToScroll: 4
          }
        },
        {
          breakpoint: 1224,
          settings: {
            slidesToShow: 4,
            slidesToScroll: 4
          }
        },
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 800,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1
          }
        }
      ]
    });
  });

}

sliderProducts()

// ------------------------HERO SECTION Slider --------------------
function heroSlider(){
  let mainSliderSelectorHero = '.main-slider-hero',
  navSliderSelector = '.nav-slider',
  interleaveOffset = 0.5;


let mainSliderOptions = {
loop: true,
speed: 1000,
slidesPerView: 1, // Default: Show 5 slides at a time
spaceBetween: 10,
autoplay: {
  delay: 3000,
  disableOnInteraction: false,
},
grabCursor: true,
watchSlidesProgress: true,
navigation: {
  nextEl: '.swiper-button-next',
  prevEl: '.swiper-button-prev',
},

on: {
  init: function () {
    let firstCaption = this.slides[0].querySelector('.caption');
    if (firstCaption) {
      firstCaption.classList.add('show');
    }
  },
  imagesReady: function () {
    this.el.classList.remove('loading');
    this.autoplay.start();
  },
  slideChangeTransitionEnd: function () {
    let swiper = this;
    let captions = swiper.el.querySelectorAll('.caption');
    captions.forEach((caption) => caption.classList.remove('show'));

    let activeCaption = swiper.slides[swiper.activeIndex].querySelector('.caption');
    if (activeCaption) {
      setTimeout(() => activeCaption.classList.add('show'), 100);
    }
  },
  touchEnd: function () {
    let swiper = this;
    let captions = swiper.el.querySelectorAll('.caption');
    captions.forEach((caption) => caption.classList.remove('show'));

    let activeCaption = swiper.slides[swiper.activeIndex].querySelector('.caption');
    if (activeCaption) {
      setTimeout(() => activeCaption.classList.add('show'), 100);
    }
  },
  progress: function () {
    let swiper = this;
    swiper.slides.forEach((slide) => {
      let slideProgress = slide.progress;
      let innerOffset = 0;
      let innerTranslate = (slideProgress * innerOffset) / 4;
      slide.querySelector('.slide-bgimg').style.transform = `translateX(${innerTranslate}px)`;
    });
  },
  touchStart: function () {
    let swiper = this;
    swiper.slides.forEach((slide) => (slide.style.transition = ''));
  },
  setTransition: function (speed) {
    let swiper = this;
    swiper.slides.forEach((slide) => {
      slide.style.transition = `${speed}ms`;
      slide.querySelector('.slide-bgimg').style.transition = `${speed}ms`;
    });
  },
},
};

let mainSlider = new Swiper('.main-slider-hero', mainSliderOptions);
}
heroSlider()
