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
// ---------------fancybox-------------------
Fancybox.bind("[data-fancybox]", {

});

// ---------------extra nav display-------------------
function showExtraNav(){

  const bodymask = document.querySelector(".body-mask-nav");
  const mainExtraNav = document.querySelector(".nav-extra");
  const navContainers = document.querySelectorAll(".nav-extra-container");
  const menNav = document.querySelector(".men-extra-nav");
  const womenNav = document.querySelector(".female-extra-nav");
  const uniNav = document.querySelector(".uni-extra-nav");

  const menTrigger = document.querySelector("#cat_male");
  const femaleTrigger = document.querySelector("#cat_female");
  const uniTrigger = document.querySelector("#cat_unisex");

  function displayExtraNavOff(){
    document.addEventListener('mouseover', (event) => {
      const hoveredElement = event.target;
      if (!hoveredElement.closest('.extra-nav-trigger')) {
        mainExtraNav.style.display="none";
        bodymask.style.display="none";
      }
    });

  }
  function displayExtraNavCategory(trigger, navToDisplay ){
    trigger.addEventListener("mouseover", ()=>{
      const searchInput = document.querySelector(".searcher-mobile");
      searchInput.classList.remove("active-search-bar")
      mainExtraNav.style.display="block";
      navContainers.forEach(navGender=>{
        navGender.style.display="none"
      })
      navToDisplay.style.display="flex"
      bodymask.style.display="block";
      displayExtraNavOff()

    })
  }

  displayExtraNavCategory(menTrigger,menNav )
  displayExtraNavCategory(femaleTrigger,womenNav )
  displayExtraNavCategory(uniTrigger,uniNav )



}
showExtraNav()



// ---------------mobile nav display-------------------

function displayMobileNav(){
  function switchCategories(){
    const maleSwitcher = document.querySelector(".maleSwitch");
    const femaleSwitcher = document.querySelector(".femaleSwitch");
    const maleContainer = document.querySelector(".body-mobile-nav .male-cats");
    const femaleContainer = document.querySelector(".body-mobile-nav .female-cats ");
    const allCatsSwitcher = document.querySelectorAll(".top-nav-gender-switcher span");
    const allCats = document.querySelectorAll(".mobile-cats");

    maleSwitcher.addEventListener("click", ()=>{
      allCatsSwitcher.forEach(ele=>{
        ele.classList.remove("mobile-active-cat")
      })
      allCats.forEach(ele=>{
        ele.classList.remove("active-mobile-nav")
      })
      maleContainer.classList.add("active-mobile-nav");
      maleSwitcher.classList.add("mobile-active-cat");
    })

    femaleSwitcher.addEventListener("click", ()=>{
      allCatsSwitcher.forEach(ele=>{
        ele.classList.remove("mobile-active-cat")
      })
      allCats.forEach(ele=>{
        ele.classList.remove("active-mobile-nav")
      })
      femaleContainer.classList.add("active-mobile-nav");

      femaleSwitcher.classList.add("mobile-active-cat");
    })
  }

  const triggerMobile = document.querySelector(".hamb-container");
  const mobileNav = document.querySelector(".nav-mobile");
  triggerMobile.addEventListener("click", ()=>{
    triggerMobile.innerHTML='<i class="fa-solid fa-xmark"></i>';
    mobileNav.classList.toggle("active-mobile-nav");
    // change hamb icons depending on mobile nav class
    triggerMobile.innerHTML= mobileNav.classList.contains("active-mobile-nav")? '<i class="fa-solid fa-xmark"></i>' : ' <i class="fa-solid fa-bars"></i>';

    switchCategories()

  })
  window.addEventListener("resize", ()=>{
    if(window.innerWidth>=1024) {
      mobileNav.classList.remove("active-mobile-nav");
    }
  })


}


displayMobileNav()


// ---------------mobile quick add product-------------------
function addProductWindowMobile(){
 const mobileQuickAddWindow = `


 `
}



// ---------------hover prod carts label-------------------


function hoverProdCart(){
  const carts = document.querySelectorAll(".layout-card")
  carts && carts.forEach(cart=>{

    cart.addEventListener("mouseover", ()=>{
      if (window.innerWidth > 1024) {
        const label = cart.querySelector(".hidden-prod-label");
        if(label.classList.contains("detailed-grid")) {
          label.classList.remove("clicked-inactive-label");
          label.classList.remove("hidden-prod-label-detailed-inactive");
          label.classList.add("hidden-prod-label-detailed-active");
        }else {
          label.classList.remove("clicked-inactive-label");
          label.classList.remove("hidden-prod-label-inactive");
          label.classList.add("hidden-prod-label-active");
        }
      }
    })
    cart.addEventListener("mouseleave", ()=>{
      if (window.innerWidth > 1024) {
      const label = cart.querySelector(".hidden-prod-label");
      if(label.classList.contains("detailed-grid")) {
        label.classList.remove("hidden-prod-label-detailed-active");
        label.classList.add("hidden-prod-label-detailed-inactive");
      }
      else {
        label.classList.remove("hidden-prod-label-active");
        label.classList.add("hidden-prod-label-inactive");
      }
      }

    })


  })
}

hoverProdCart()

function displayOffmobileAddproduct(){
  const exitWindow = document.querySelectorAll(".exit-mobile-label");

  exitWindow.forEach(exit=>{
    exit.addEventListener("click", ()=>{
      const Labels = document.querySelectorAll(".hidden-prod-label");
      Labels.forEach(label=>{

        label.classList.remove("clicked-active-label");
      })
    })
  })


}

displayOffmobileAddproduct()

window.addEventListener("resize", ()=>{
  const exitWindow = document.querySelectorAll(".exit-mobile-label");


  exitWindow.forEach(exit=>{
    exit.addEventListener("click", ()=>{
      const Labels = document.querySelectorAll(".hidden-prod-label");
      Labels.forEach(label=>{

        label.classList.remove("clicked-active-label");
      })
    })
  })

})
function clickOnPlusProdCart(){

  const carts = document.querySelectorAll(".card-product")
  carts && carts.forEach(cart=>{
    const iconSelected = cart.querySelector(".add-prod-img");
    const iconSelectedImg = cart.querySelector(".add-prod-img i");
    iconSelected.addEventListener("click", ()=>{


      const label = cart.querySelector(".hidden-prod-label");


      if(label.classList.contains("clicked-active-label")) {
        label.classList.add("clicked-inactive-label");
        label.classList.remove("clicked-active-label");

        iconSelectedImg.classList.add("clicked-inactive-icon");
        iconSelectedImg.classList.remove("clicked-active-icon");

      }
      else {
        label.classList.remove("clicked-inactive-label");
        label.classList.add("clicked-active-label");


        iconSelectedImg.classList.add("clicked-active-icon");
        iconSelectedImg.classList.remove("clicked-inactive-icon");
      }

    })
  })

}

clickOnPlusProdCart()


// -------------------------AJAX--------------------------------

function SendDataAjax(sendData, file) {
  return new Promise((resolve, reject) => {
      $.post(file, {data: sendData}, function(data) {
          resolve(data);
      }).fail(function(jqXHR, textStatus, errorThrown) {
          reject(errorThrown);
      });
  });
}




function disableLinksSliderOnDrag() {
  const sliders = document.querySelectorAll(".vetical-scroll-grab-class"); // Replace with your slider's class or ID
  const links = document.querySelectorAll(".card-prod-link");

  let isDragging = false;

  if (sliders.length > 0) {
    sliders.forEach(slider => {
      slider.addEventListener("mousedown", () => {
        isDragging = false;
      });

      slider.addEventListener("mousemove", () => {
        isDragging = true; // Set to true when the user moves the slider
      });

      slider.addEventListener("mouseup", () => {
        setTimeout(() => (isDragging = false), 0); // Reset after drag ends
      });
    });
  }

  links.forEach(link => {
    link.addEventListener("click", e => {
      if (isDragging) {
        e.preventDefault(); // Prevent link navigation if dragging
      }
    });
  });
}


disableLinksSliderOnDrag()



// ----------------BFOR HORIZONTAL SCROLLING AND VERTICAL ---------------

function verticalScrollActive() {
    const containers = document.querySelectorAll('.vetical-scroll-grab-class');

    containers.forEach(container => {
      let startY;
      let startX;
      let scrollLeft;
      let scrollTop;
      let isDown = false;

      container.addEventListener('mousedown', (e) => mouseIsDown(e));
      container.addEventListener('mouseup', (e) => mouseUp(e));
      container.addEventListener('mouseleave', (e) => mouseLeave(e));
      container.addEventListener('mousemove', (e) => mouseMove(e));

      function mouseIsDown(e) {
        isDown = true;
        startY = e.pageY - container.offsetTop;
        startX = e.pageX - container.offsetLeft;
        scrollLeft = container.scrollLeft;
        scrollTop = container.scrollTop;
      }

      function mouseUp(e) {
        isDown = false;
      }

      function mouseLeave(e) {
        isDown = false;
      }

      function mouseMove(e) {
        if (isDown) {
          e.preventDefault();
          const y = e.pageY - container.offsetTop;
          const walkY = y - startY;
          container.scrollTop = scrollTop - walkY;

          const x = e.pageX - container.offsetLeft;
          const walkX = x - startX;
          container.scrollLeft = scrollLeft - walkX;
        }
      }
    });
  }


  verticalScrollActive()




// --------------nav search-------------
function searchNav(){
  const searchInput = document.querySelector(".searcher-mobile");
  const searchTrigger = document.querySelector(".search-trigger");
  const searchBox = document.querySelector(".search-box-nav")
  const closeSearchIcon = document.querySelector(".close-search-nav")
  searchTrigger? searchTrigger.addEventListener("click", ()=>{
    searchInput.classList.remove("inactive-search-bar")
    searchInput.classList.add("active-search-bar")
  }): null;

  // Add a click event listener to the document to handle clicks outside the active card
  closeSearchIcon.addEventListener("click",() => {

      searchInput.classList.remove("active-search-bar")


  })

}
searchNav()
