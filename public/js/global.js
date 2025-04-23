
// ------------------BANNER PROMO-----------------------

function setBanner(){
  const textPromo_1 = document.querySelector(".banner-text-1");
  const textPromo_2 = document.querySelector(".banner-text-2");
  if(textPromo_1 && textPromo_2) {
    setInterval(() => {
      textPromo_1.classList.replace("inactive-promo", "active-promo")
       textPromo_2.classList.replace("active-promo", "inactive-promo")
     }, 4000);
     setInterval(() => {
       textPromo_1.classList.replace("active-promo", "inactive-promo")
       textPromo_2.classList.replace("inactive-promo", "active-promo")
     }, 8000);
  }

}
setBanner()
// ------------------COOKIES WINDOW AND FUNCTIONALITY-----------------------
function setCookie(name, value, days) {
  let expires = "";
  if (days) {
      let date = new Date();
      date.setTime(date.getTime() + days * 86400000);
      expires = "; expires=" + date.toUTCString();
  }
  document.cookie = name + "=" + encodeURIComponent(value) + expires + "; path=/";
}


function cookies_window(){

  const crossCookies = document.querySelector(".cross-cookies")
  const acceptCookies = document.querySelector(".accept-cookies")
  const cookiesWindow = document.querySelector(".cookies_window");
  setTimeout(() => {
    cookiesWindow.classList.add("active_cookies");
  if(cookiesWindow.classList.contains("active_cookies")) {
    crossCookies&&crossCookies.addEventListener("click", ()=>{
      setCookie("cookies", "not_accepted", 7);
      cookiesWindow.style.display="none";

    })
    acceptCookies&&acceptCookies.addEventListener("click", ()=>{
      setCookie("cookies", "accepted", 7);
      cookiesWindow.style.display="none";


    })
  }
  }, 1000);


}

cookies_window()
// get cookies name to check value
function getCookie(name) {
  let match = document.cookie.match(new RegExp("(^| )" + name + "=([^;]+)"));
  return match ? decodeURIComponent(match[2]) : null;
}
// -----------------check if cookies are accepted or not to close window----------------------



// ----------------GENERATE CONTENT WHEN VISIBLE TO IMPROVE PERFORMANCE-----------------

const products_cards = document.querySelectorAll(".lazy-loading");

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {invisible_lazy
            entry.target.document.querySelector(".")
            entry.target.classList.add("visible_lazy");
        }
    });
}, { threshold: 0.3 }); // Trigger when at least 50% of the element is visible

products_cards.forEach(card => observer.observe(card));


// ----------------------DISPLAY ON BLACK MASK---------------------


function bodyMaskOn(){
  const bodymask = document.querySelector(".body-mask");
  bodymask.style.display="block";
  document.body.style.overflowY = "hidden";
}

// ----------------------DISPLAY OFF BLACK MASK---------------------
function bodyMaskOff(){
  const bodymask = document.querySelector(".body-mask");
  bodymask.style.display="none";
  document.body.style.overflowY = "scroll";
}
// ---------------fancybox-------------------
Fancybox.bind("[data-fancybox]", {

});
// ---------------display off hovered links-------------------

function displayOffHoveredLinks(){
  const femaleTrigger = document.querySelector(".active-female-nav-hovered");
  const maleTrigger = document.querySelector(".active-male-nav-hovered");
  const uniTrigger = document.querySelector(".active-uni-nav-hovered");
  const brandTrigger = document.querySelector(".active-brand-nav-hovered");
  const catsTrigger = document.querySelector(".active-categories-nav-hovered");
  if(femaleTrigger&&femaleTrigger.classList.contains("female-trigger")) {
    femaleTrigger.classList.remove("active-female-nav-hovered")
  }
  if(maleTrigger&&maleTrigger.classList.contains("male-trigger")) {
    maleTrigger.classList.remove("active-male-nav-hovered")
  }
  if(uniTrigger&&uniTrigger.classList.contains("uni-trigger")) {
    uniTrigger.classList.remove("active-uni-nav-hovered")
  }
  if(brandTrigger&&brandTrigger.classList.contains("brand-trigger")) {
    brandTrigger.classList.remove("active-brand-nav-hovered")
  }
  if(catsTrigger&&catsTrigger.classList.contains("categories-trigger")) {
    catsTrigger.classList.remove("active-categories-nav-hovered")
  }
}

// ---------------extra nav display-------------------
function showExtraNav(){

  const bodymask = document.querySelector(".body-mask-nav");
  const mainExtraNav = document.querySelector(".nav-extra");
  const navContainers = document.querySelectorAll(".nav-extra-container");
  const brandNav = document.querySelector(".brand-extra-nav");
  const menNav = document.querySelector(".men-extra-nav");
  const womenNav = document.querySelector(".female-extra-nav");
  const uniNav = document.querySelector(".uni-extra-nav");
  const categoriesNav = document.querySelector(".categories-extra-nav");

  const brandTrigger = document.querySelector("#cat_brands");
  const menTrigger = document.querySelector("#cat_male");
  const femaleTrigger = document.querySelector("#cat_female");
  const uniTrigger = document.querySelector("#cat_unisex");
  const categoriesTrigger = document.querySelector("#cat_types");

  function displayExtraNavOff(){

    document.addEventListener('mouseover', (event) => {


      const hoveredElement = event.target;
      if (!hoveredElement.closest('.extra-nav-trigger')) {
        mainExtraNav.style.display="none";
        bodymask.style.display="none";

        displayOffHoveredLinks()

      }
    });

  }
  function displayExtraNavCategory(trigger, navToDisplay ){

    trigger&&trigger.addEventListener("mouseover", ()=>{
      displayOffHoveredLinks()

      if(trigger.classList.contains("female-trigger")) {
        trigger.classList.add("active-female-nav-hovered")
      }
      if(trigger.classList.contains("male-trigger")) {
        trigger.classList.add("active-male-nav-hovered")
      }
      if(trigger.classList.contains("uni-trigger")) {
        trigger.classList.add("active-uni-nav-hovered")
      }
      if(trigger.classList.contains("brand-trigger")) {
        trigger.classList.add("active-brand-nav-hovered")
      }
      if(trigger.classList.contains("categories-trigger")) {
        trigger.classList.add("active-categories-nav-hovered")
      }
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
  displayExtraNavCategory(brandTrigger,brandNav )
  displayExtraNavCategory(menTrigger,menNav )
  displayExtraNavCategory(femaleTrigger,womenNav )
  displayExtraNavCategory(uniTrigger,uniNav )
  displayExtraNavCategory(categoriesTrigger,categoriesNav )


}
showExtraNav()



// ---------------mobile nav display-------------------

function displayMobileNav(){
  function switchCategories(){
    const maleSwitcher = document.querySelector(".maleSwitch");
    const femaleSwitcher = document.querySelector(".femaleSwitch");
    const uniwitcher = document.querySelector(".uniSwitch");
    const brandswitcher = document.querySelector(".brandsSwitch");
    const catsSwitcher = document.querySelector(".catsSwitch");

    const maleContainer = document.querySelector(".body-mobile-nav .male-cats");
    const femaleContainer = document.querySelector(".body-mobile-nav .female-cats ");
    const uniContainer = document.querySelector(".body-mobile-nav .uni-cats");
    const brandsContainer = document.querySelector(".body-mobile-nav .brands-cats");
    const catsContainer = document.querySelector(".body-mobile-nav .categories-cats");


    const allCatsSwitcher = document.querySelectorAll(".top-nav-gender-switcher span");
    const allCats = document.querySelectorAll(".mobile-cats");


    function resetNav(){
      allCatsSwitcher.forEach(ele=>{
        ele.classList.remove("mobile-active-cat")
      })
      allCats.forEach(ele=>{
        ele.classList.remove("active-mobile-nav")
      })
    }
    maleSwitcher.addEventListener("click", ()=>{
      resetNav()
      maleContainer.classList.add("active-mobile-nav");
      maleSwitcher.classList.add("mobile-active-cat");
    })

    femaleSwitcher.addEventListener("click", ()=>{
      resetNav()
      femaleContainer.classList.add("active-mobile-nav");

      femaleSwitcher.classList.add("mobile-active-cat");
    })

    uniwitcher.addEventListener("click", ()=>{
      resetNav()

      uniContainer.classList.add("active-mobile-nav");

      uniwitcher.classList.add("mobile-active-cat");
    })

    brandswitcher.addEventListener("click", ()=>{
      resetNav()

      brandsContainer.classList.add("active-mobile-nav");

      brandswitcher.classList.add("mobile-active-cat");
    })
    catsSwitcher.addEventListener("click", ()=>{
      resetNav()

      catsContainer.classList.add("active-mobile-nav");

      catsSwitcher.classList.add("mobile-active-cat");
    })
  }

  const triggerMobile = document.querySelector(".hamb-container");
  const mobileNav = document.querySelector(".nav-mobile");
  triggerMobile&&triggerMobile.addEventListener("click", ()=>{
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

  exitWindow = document.querySelectorAll(".exit-mobile-label");

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
// ----------------------CLICK ON PLUS ICON SHOPPING PRODUCT CARD TO DISPLAY SIZES GRID---------------------
function clickOnPlusProdCart(){

  const carts = document.querySelectorAll(".card-product")
  carts && carts.forEach(cart=>{
    const iconSelected = cart.querySelector(".add-prod-img");
    const iconSelectedImg = cart.querySelector(".add-prod-img i");
    iconSelected&&iconSelected.addEventListener("click", ()=>{


      const label = cart.querySelector(".hidden-prod-label");
      const labels = document.querySelectorAll(".clicked-active-label");
      const plusMinuses = document.querySelectorAll(".add-prod-img i");

      if(label.classList.contains("clicked-active-label")) {
        label.classList.add("clicked-inactive-label");
        label.classList.remove("clicked-active-label");
        labels.forEach(label=>{
          label.classList.remove("clicked-active-label");
        })
        plusMinuses.forEach(label=>{
          label.classList.remove("clicked-active-icon");
        })
        iconSelectedImg.classList.add("clicked-inactive-icon");
        iconSelectedImg.classList.remove("clicked-active-icon");

      }
      else {
        label.classList.remove("clicked-inactive-label");
        label.classList.add("clicked-active-label");
        labels.forEach(label=>{
          label.classList.remove("clicked-active-label");
        })
        plusMinuses.forEach(label=>{
          label.classList.remove("clicked-active-icon");
        })

        iconSelectedImg.classList.add("clicked-active-icon");
        iconSelectedImg.classList.remove("clicked-inactive-icon");
      }

    })
  })

}

clickOnPlusProdCart()


// -------------------------AJAX GENERAL--------------------------------

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
  const extraNav = document.querySelector(".nav-extra")
  const closeSearchIcon = document.querySelector(".close-search-nav")
  searchTrigger? searchTrigger.addEventListener("click", ()=>{
    if(searchInput.classList.contains("inactive-search-bar")) {
      searchInput.classList.remove("inactive-search-bar")
      searchInput.classList.add("active-search-bar")
      extraNav.style.display="none";
    }
    else {
      searchInput.classList.add("inactive-search-bar")
      searchInput.classList.remove("active-search-bar")
    }

  }): null;

  // Add a click event listener to the document to handle clicks outside the active card
  closeSearchIcon&&closeSearchIcon.addEventListener("click",() => {

      searchInput.classList.remove("active-search-bar")


  })

}
searchNav()
// ----------------------------LOADER------------------------

let loaderTimeout;

function displayLoader() {
    // Set a timeout to display the loader after 1 second

        const loader = document.querySelector(".loader");
        loader.style.display = "block";
        bodyMaskOn();

}

function offLoader() {
    // Clear the timeout to prevent showing the loader if it didn't appear
    clearTimeout(loaderTimeout);

    // Hide the loader immediately if it is displayed
    const loader = document.querySelector(".loader");
    loader.style.display = "none";
    bodyMaskOff();
}