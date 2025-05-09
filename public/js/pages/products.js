


function GetCommentAjax(){
  document.querySelector(".form-comment").addEventListener("submit", function(event) {
    event.preventDefault();
  });

  let rating = "";
  const stars = document.querySelectorAll(".stars-form-container .stars .star");
  const ratingAlert = document.querySelector(".rating-stars-container");
  const submitFormButton = document.querySelector(".accept-feedback");

  // get rating from stars attribute
  stars.forEach(star=>{
    star.addEventListener("click", ()=>{
      rating = star.getAttribute("data-value");

    })

  })

  submitFormButton.addEventListener("click", ()=>{

    if(rating!="") {
      sendAjaxComment(rating)
      // reset rating  and rating alert after sending ajax
      rating = "";
      ratingAlert.classList.add("inactive-comment-form");
    }
    else {
      // show alert to show rating
      ratingAlert.classList.remove("inactive-comment-form");
    }
  })


  function sendAjaxComment(stars_rating){
    const feedbackFormContainer = document.querySelector(".form-comment-add");

    const alertContainer = document.querySelector(".alert-comment");
    const userNameForm = document.querySelector(".userName").value;
    const userEmailForm = document.querySelector(".userEmail").value;
    const userFeedback = document.querySelector(".feedback-content").value;
    const rating = stars_rating;

    // get product id from param GET
    const urlParams = new URLSearchParams(window.location.search);
    const productId = urlParams.get("show");

    const formData = new FormData();
    formData.append('userName', userNameForm);
    formData.append('userEmail', userEmailForm);
    formData.append('userFeedback', userFeedback);
    formData.append('productId', productId);
    formData.append('rating', rating);

    fetch('./ajax/create_comment.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
      if(data) {
        alertContainer.innerHTML=data;
        feedbackFormContainer.classList.add("inactive-comment-form")



      }



    })
    .catch(error => {
        console.error('Error:', error);
    });
  }


}

GetCommentAjax()



function resetForm(){
  let userNameForm = document.querySelector(".userName");
  let userEmailForm = document.querySelector(".userEmail")
  let userFeedback = document.querySelector(".feedback-content");
  const stars = document.querySelectorAll(".star");
  // reset form
  stars.forEach(star=>{
  star.classList.remove("selected")
  })
  userFeedback.value = ""
  userNameForm.value = ""
  userEmailForm.value= ""

}


function showAddReview(){
  const triggerReviewForm = document.querySelector(".write-review-button");
  const reviewForm = document.querySelector(".form-comment-add");


  triggerReviewForm.addEventListener("click", ()=>{

    document.querySelector(".product-comments-section-container").scrollIntoView({ behavior: "smooth", block: "start" });
    const closeForm = document.querySelector(".cancel-feedback");
    reviewForm.classList.remove("inactive-comment-form");
    resetForm()

    closeForm.addEventListener("click", ()=>{

      reviewForm.classList.add("inactive-comment-form");
    })
  })
}

showAddReview()

// ---------------stars revire function-------------------
function manageStartsReviews(){
  const stars = document.querySelectorAll(".star");
  const ratingTexts = document.querySelectorAll(".rating-text .text");
  const ratingInput = document.getElementById("rating");

  stars.forEach((star, index) => {
      star.addEventListener("click", function() {
          const value = star.getAttribute("data-value");

          // Toggle selected class for current star and deselect others
          stars.forEach((s, i) => {
              if (i <= index) {
                  s.classList.add("selected");
              } else {
                  s.classList.remove("selected");
              }
          });

          // Display corresponding rating text and hide others
          ratingTexts.forEach((text, i) => {
              if (i == index) {
                  text.style.display = "inline-block";
              } else {
                  text.style.display = "none";
              }
          });


      });

      star.addEventListener("mouseover", function() {
          const value = star.getAttribute("data-value");
          // Highlight stars on hover
          stars.forEach((s, i) => {
              if (i < value) {
                  s.classList.add("hovered");
              } else {
                  s.classList.remove("hovered");
              }
          });
      });

      star.addEventListener("mouseout", function() {
          // Remove hover effect on mouseout
          stars.forEach(s => s.classList.remove("hovered"));
      });
  });
}

manageStartsReviews()




// -----------------Size guide Modal-----------------


function displayModalGuideSizes() {
    const triggerfemale = document.querySelector(".size_guide_container_female");
    const triggermale = document.querySelector(".size_guide_container_male");
    const modalContainer = document.querySelector(".modal-container");
    const triggerGuides = document.querySelector(".link_sizes");

    const guidesTemplate = `
    <div class="sizes_guide">
        <div class="size_gruide_container">

            <div class="cross-gruides">
                <i class="fa-solid fa-xmark"></i>
            </div>

            <div class="gender-guides-controller flex-row">
                <button class="men-guide">Men</button>
                <button class="female-guide active-guide-trigger">Female</button>
            </div>

            <table class="table_guides table_female">
                <thead>
                    <tr>
                    <th>UK Size</th>
                    <th>EU Size</th>
                    <th>US Size</th>
                    <th>Foot Length (mm)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td>2</td>
                    <td>35</td>
                    <td>4</td>
                    <td>212</td>
                    </tr>
                    <tr class="highlight-row">
                    <td>3</td>
                    <td>36</td>
                    <td>5</td>
                    <td>220</td>
                    </tr>
                    <tr>
                    <td>4</td>
                    <td>37</td>
                    <td>6</td>
                    <td>229</td>
                    </tr>
                    <tr class="highlight-row">
                    <td>5</td>
                    <td>38</td>
                    <td>7</td>
                    <td>237</td>
                    </tr>
                    <tr>
                    <td>6</td>
                    <td>39</td>
                    <td>8</td>
                    <td>246</td>
                    </tr>
                    <tr class="highlight-row">
                    <td>7</td>
                    <td>40</td>
                    <td>9</td>
                    <td>254</td>
                    </tr>
                    <tr>
                    <td>8</td>
                    <td>41</td>
                    <td>10</td>
                    <td>262</td>
                    </tr>
                    <tr class="highlight-row">
                    <td>9</td>
                    <td>42</td>
                    <td>11</td>
                    <td>270</td>
                    </tr>
                </tbody>
            </table>


    <table class="table_guides table_male">
      <thead>
        <tr>
          <th>UK Size</th>
          <th>EU Size</th>
          <th>US Size</th>
          <th>Foot Length (mm)</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>3</td>
          <td>35.5</td>
          <td>4</td>
          <td>220</td>
        </tr>
        <tr class="highlight-row">
          <td>4</td>
          <td>37</td>
          <td>5</td>
          <td>229</td>
        </tr>
        <tr>
          <td>5</td>
          <td>38</td>
          <td>6</td>
          <td>237</td>
        </tr>
        <tr class="highlight-row">
          <td>6</td>
          <td>39</td>
          <td>7</td>
          <td>246</td>
        </tr>
        <tr>
          <td>7</td>
          <td>40.5</td>
          <td>8</td>
          <td>254</td>
        </tr>
        <tr class="highlight-row">
          <td>8</td>
          <td>42</td>
          <td>9</td>
          <td>262</td>
        </tr>
        <tr>
          <td>9</td>
          <td>43</td>
          <td>10</td>
          <td>271</td>
        </tr>
        <tr class="highlight-row">
          <td>10</td>
          <td>44.5</td>
          <td>11</td>
          <td>279</td>
        </tr>
        <tr>
          <td>11</td>
          <td>46</td>
          <td>12</td>
          <td>288</td>
        </tr>
        <tr class="highlight-row">
          <td>12</td>
          <td>47</td>
          <td>13</td>
          <td>296</td>
        </tr>
        <tr>
          <td>13</td>
          <td>48</td>
          <td>14</td>
          <td>305</td>
        </tr>
        <tr class="highlight-row">
          <td>14</td>
          <td>49.5</td>
          <td>15</td>
          <td>314</td>
        </tr>
      </tbody>
    </table>
      </div>

  </div>
  `;

  triggerGuides.addEventListener("click", () => {
    const bodyMask = document.querySelector(".body-mask");
    bodyMask.style.display="block";
    modalContainer.innerHTML = guidesTemplate;

    const triggerMale = document.querySelector(".men-guide");
    const triggerFemale = document.querySelector(".female-guide");
    const maleTable = document.querySelector(".table_male");
    const femaleTable = document.querySelector(".table_female");
    const closeModal = document.querySelector(".cross-gruides i");

    // Show the appropriate table based on the gender button click
    triggerMale.addEventListener("click", () => {
      maleTable.classList.add("table_guides_active");
      femaleTable.classList.remove("table_guides_active");
      triggerMale.classList.add("active-guide-trigger");
      triggerFemale.classList.remove("active-guide-trigger");
    });

    triggerFemale.addEventListener("click", () => {
      femaleTable.classList.add("table_guides_active");
      maleTable.classList.remove("table_guides_active");
      triggerFemale.classList.add("active-guide-trigger");
      triggerMale.classList.remove("active-guide-trigger");
    });

    // Close the modal when the "X" icon is clicked
    closeModal.addEventListener("click", () => {
      modalContainer.innerHTML = "";
      bodyMask.style.display="none";
    });

    // Initially show the female table by default
    femaleTable.classList.add("table_guides_active");
  });
}



displayModalGuideSizes()


function LatestmainSliderProducts(){
  let mainSliderSelector = '.products-slider',
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

let mainSlider = new Swiper('.products-slider', mainSliderOptions);

}
LatestmainSliderProducts()



// ------------------------ajax send product to basket on products page--------------------------------



function addProduct_products(){

  const allLabels = document.querySelectorAll(".available-size");
  const submitPurchased = document.querySelector(".add-to-card-products");

  allLabels.forEach(label=>{
    label.addEventListener("click", ()=>{
      allLabels.forEach(label=>{
        label.classList.remove("selected-size-products");
      })
      label.classList.add("selected-size-products");




    })



  })

  submitPurchased&&submitPurchased.addEventListener("click", ()=>{
    const buttonAlert = document.querySelector(".button-alert");
    const selectedSize = document.querySelector(".selected-size-products");
    if(selectedSize) {
      const productId = selectedSize.getAttribute("data-prod-id");
      const productsize= selectedSize.getAttribute("data-prod-size");
      data = {productId:productId,productsize:productsize };
      SendDataAjax(data, "ajax/add_to_basket.php")
      .then(data => {
        displayModalWindowAddedProduct(data)
        ReloadBasketAjax()

      })
      .catch(error => {
          console.error('Error:', error);
      })
    }
    else {
      buttonAlert.classList.remove("active-alert");
      void buttonAlert.offsetWidth;
      buttonAlert.classList.add("active-alert");


    }



  })

}
addProduct_products()
