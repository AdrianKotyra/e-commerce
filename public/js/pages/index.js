



// Main Slider latest
let mainSliderSelector = '.main-slider',
    navSliderSelector = '.nav-slider',
    interleaveOffset = 0.5;


// Main Slider latest
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





// slider products
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


// ----------------------NEWSLETTER---------------------

function newsletterAJAX() {
  function sendnewsletterAjax(event) {
      event.preventDefault();

      const alertContainer = document.querySelector(".subscribe_alert");
      const subscribeContainer = document.querySelector(".subscribe");

      // Get form values
      const userNameForm = document.querySelector(".name_newsletter").value.trim();
      const email = document.querySelector(".email_newsletter").value.trim();


      // Validate required fields
      if (!userNameForm || !email ) {
          alertContainer.innerHTML = "<div class='alert alert-danger  text-center'>Please fill in all fields.</div>";
          return;
      }

      // Create FormData object
      const formData = new FormData();
      formData.append('first_name', userNameForm);
      formData.append('email', email);


      // Send data via AJAX
      fetch('./ajax/newsletter_msg.php', {
          method: 'POST',
          body: formData
      })
      .then(response => response.text())
      .then(data => {
          if (data.trim() === "1") {
            subscribeContainer.innerHTML = `<div class="subscribted_alert_container">
              <p class="section-heading h2" >Thank you for Subscribing</p>
            </div>`;

          } else {
            alertContainer.innerHTML = data;
          }
      })
      .catch(error => {
          console.error('Error:', error);
          alertContainer.innerHTML = "<div class='alert alert-danger  text-center'>Something went wrong. Please try again.</div>";
      });
  }

  // Attach event listener to the submit button
  const sendButton = document.querySelector(".form-submit-newsletter");
  if (sendButton) {
      sendButton.addEventListener("click", function(e) {
          e.preventDefault();
          sendnewsletterAjax(e);
      });
  }

}

newsletterAJAX();