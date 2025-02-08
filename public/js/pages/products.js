
function showAddReview(){
  const triggerReviewForm = document.querySelector(".write-review-button");
  const reviewForm = document.querySelector(".form-comment-add");

  triggerReviewForm.addEventListener("click", ()=>{
    const closeForm = document.querySelector(".cancel-feedback");
    reviewForm.classList.remove("inactive-comment-form");
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
          console.log(value)
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


class Slider {
    constructor(slider) {
        this.slider = slider;
        this.display = slider.querySelector(".image-display");
        this.navButtons = Array.from(slider.querySelectorAll(".nav-button"));
        this.prevButton = slider.querySelector(".prev-button");
        this.nextButton = slider.querySelector(".next-button");
        this.sliderNavigation = slider.querySelector(".slider-navigation");
        this.currentSlideIndex = 0;
        this.preloadedImages = {};

        this.initialize();
    }

    initialize() {
        this.setupSlider();
        this.preloadImages();
        this.eventListeners();
    }

    setupSlider() {
        this.showSlide(this.currentSlideIndex);
    }

    showSlide(index) {
        this.currentSlideIndex = index;
        const navButtonImg = this.navButtons[
            this.currentSlideIndex
        ].querySelector("img");
        if (navButtonImg) {
            const imgClone = navButtonImg.cloneNode();
            this.display.replaceChildren(imgClone);
        }
        this.updateNavButtons();
    }

    updateNavButtons() {
        this.navButtons.forEach((button, buttonIndex) => {
            const isSelected = buttonIndex === this.currentSlideIndex;
            button.setAttribute("aria-selected", isSelected);
            if (isSelected) button.focus();
        });
    }

    preloadImages() {
        this.navButtons.forEach((button) => {
            const imgElement = button.querySelector("img");
            if (imgElement) {
                const imgSrc = imgElement.src;
                if (!this.preloadedImages[imgSrc]) {
                    this.preloadedImages[imgSrc] = new Image();
                    this.preloadedImages[imgSrc].src = imgSrc;
                }
            }
        });
    }

    eventListeners() {
        document.addEventListener("keydown", (event) => {
            this.handleAction(event.key);
        });

        this.sliderNavigation.addEventListener("click", (event) => {
            const targetButton = event.target.closest(".nav-button");
            const index = targetButton
                ? this.navButtons.indexOf(targetButton)
                : -1;
            if (index !== -1) {
                this.showSlide(index);
            }
        });

        this.prevButton.addEventListener("click", () =>
            this.handleAction("prev")
        );
        this.nextButton.addEventListener("click", () =>
            this.handleAction("next")
        );
    }

    handleAction(action) {
        if (action === "Home") {
            this.currentSlideIndex = 0;
        } else if (action === "End") {
            this.currentSlideIndex = this.navButtons.length - 1;
        } else if (action === "ArrowRight" || action === "next") {
            this.currentSlideIndex =
                (this.currentSlideIndex + 1) % this.navButtons.length;
        } else if (action === "ArrowLeft" || action === "prev") {
            this.currentSlideIndex =
                (this.currentSlideIndex - 1 + this.navButtons.length) %
                this.navButtons.length;
        }

        this.showSlide(this.currentSlideIndex);
    }
}

const ImageSlider = new Slider(document.querySelector(".image-slider"));



// ------------------------ajax send product to basket--------------------------------



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

        onBasket()

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
