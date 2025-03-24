
function ChangeUIColours() {
  const urlParams = new URLSearchParams(window.location.search);

  const getCategory =  urlParams.get('category');

    if(getCategory=='female') {
      document.documentElement.style.setProperty("--ui-main-nav", "#6a1373");
      document.documentElement.style.setProperty("--ui-main-text-nav", "#ffffff");
      document.documentElement.style.setProperty("--ui-filter", "invert(100%) sepia(91%) saturate(38%) hue-rotate(264deg) brightness(110%) contrast(110%)");
      document.documentElement.style.setProperty("--ui-product-card", "#f7ebed;");
    }
    else if(getCategory=='male') {
      document.documentElement.style.setProperty("--ui-main-nav", "#4a5b98");
      document.documentElement.style.setProperty("--ui-main-text-nav", "#ffffff");
      document.documentElement.style.setProperty("--ui-filter", "invert(100%) sepia(91%) saturate(38%) hue-rotate(264deg) brightness(110%) contrast(110%)");
      document.documentElement.style.setProperty("--ui-product-card", "#e9ebf1");
    }
    else if(getCategory=='unisex') {
      document.documentElement.style.setProperty("--ui-main-nav", "#50724b");
      document.documentElement.style.setProperty("--ui-main-text-nav", "#ffffff");
      document.documentElement.style.setProperty("--ui-filter", "invert(100%) sepia(91%) saturate(38%) hue-rotate(264deg) brightness(110%) contrast(110%)");
      document.documentElement.style.setProperty("--ui-product-card", "#e5eee3");
    }
    else {
      document.documentElement.style.setProperty("--ui-main-nav", "#ffffff");
      document.documentElement.style.setProperty("--ui-main-text-nav", "#000000");
      document.documentElement.style.setProperty("--ui-filter", "invert(0%) sepia(100%) saturate(0%) hue-rotate(13deg) brightness(95%) contrast(105%)");
      document.documentElement.style.setProperty("--ui-product-card", "#f7f3f3");
    }
}

ChangeUIColours()



// Main Slider
let mainSliderSelector = '.main-slider',
    navSliderSelector = '.nav-slider',
    interleaveOffset = 0.5;


// Main Slider
let mainSliderOptions = {
  loop: false,
  speed: 1000,
  slidesPerView: 3, // Show 3 slides at a time
  spaceBetween: 10, // Adjust spacing between slides if needed
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
        let innerTranslate = slideProgress * innerOffset / 4;
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





// slider products
$(document).ready(function() {
  $('.card-slider').slick({
    dots: false,
    arrows: true,
    slidesToShow: 8,
    slidesToScroll: 5, // Moves one slide at a time when using arrows
    infinite: false,
    swipeToSlide: true, // Allows dragging multiple slides at once
    prevArrow: '<button type="button" class="slick-prev"></button>',
    nextArrow: '<button type="button" class="slick-next"></button>',
    responsive: [
      {
        breakpoint: 1624,
        settings: {
          slidesToShow: 6,
          slidesToScroll: 4
        }
      },
      {
        breakpoint: 1224,
        settings: {
          slidesToShow: 5,
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
