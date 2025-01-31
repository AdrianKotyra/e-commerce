
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




  const menTrigger = document.querySelector("#cat_male")
  const femaleTrigger = document.querySelector("#cat_female")
  function displayExtraNavOff(){
    document.addEventListener('mouseover', (event) => {
      const hoveredElement = event.target;
      if (!hoveredElement.closest('nav')) {
        mainExtraNav.style.display="none";
        bodymask.style.display="none";
      }
    });

  }



  menTrigger.addEventListener("mouseover", ()=>{
    mainExtraNav.style.display="block";
    navContainers.forEach(navGender=>{
      navGender.style.display="none"
      menNav.style.display="flex"
      bodymask.style.display="block";
    })
    displayExtraNavOff()

  })

  femaleTrigger.addEventListener("mouseover", ()=>{
    mainExtraNav.style.display="block";
    navContainers.forEach(navGender=>{
      navGender.style.display="none"
      womenNav.style.display="flex"
      bodymask.style.display="block";
    })
    displayExtraNavOff()

  })


}
showExtraNav()

// ---------------reloado basket products ajax-------------------
function ReloadBasketAjax(){
  const basketContainer = document.querySelector(".body-basket")
  const dummydata= "";
  SendDataAjax(dummydata, "ajax/reload_basket.php")
  .then(data => {
    basketContainer.innerHTML=data;
    // when basket is reloaded initiate decrement and increment function ajax
    increment_decrement_basket()

  })
  .catch(error => {
      console.error('Error:', error);
  })

}
// ---------------reloado basket total ajax------------------
function ReloadBasketTotalAjax(){
  const basketTotalContainer = document.querySelector(".basket_total")
  const dummydata= "";
  SendDataAjax(dummydata, "ajax/reload_basket_total.php")
  .then(data => {
    basketTotalContainer.innerHTML=data;


  })
  .catch(error => {
      console.error('Error:', error);
  })

}



// ---------------quick add product to basket ajax-------------------

function addProduct(){
      // select only those not in prodcuts.php by selecting by container which is not in products.php
      const allLabels = document.querySelectorAll(".sizes-grid-prod .available-size");
      allLabels.forEach(label=>{
        label.addEventListener("click", ()=>{
          const productId = label.getAttribute("data-prod-id");
          const productsize= label.getAttribute("data-prod-size");
          data = {productId:productId,productsize:productsize };
          SendDataAjax(data, "ajax/add_to_basket.php")
          .then(data => {

            onBasket()

          })
          .catch(error => {
              console.error('Error:', error);
          })
        })
      })

}
addProduct()

function increment_decrement_basket(){
  // create sub function to increment and decrement
  function send_data_ajax(controller){
    const productId = controller.getAttribute("data-prod-id");
    const productsize= controller.getAttribute("data-prod-size");
    data = {productId:productId,productsize:productsize };

    if(controller.classList.contains("basket-increment")) {
      SendDataAjax(data, "ajax/add_to_basket.php")
      .then(data => {
        onBasket()
      })
      .catch(error => {
          console.error('Error:', error);
      })
    }
    else {
      SendDataAjax(data, "ajax/basket-decrement.php")
      .then(data => {
        onBasket()
      })
      .catch(error => {
          console.error('Error:', error);
      })
    }

  }


  // select only those not in prodcuts.php by selecting by container which is not in products.php
  const allLabels = document.querySelectorAll(".prod-incrementor");
  allLabels.forEach(label=>{
    const incrementor = label.querySelector(".basket-increment");
    const decrementor = label.querySelector(".basket-decrement");

    incrementor.addEventListener("click", ()=>{
      send_data_ajax(incrementor)
    })
    decrementor.addEventListener("click", ()=>{
      send_data_ajax(decrementor)
    })
   })
}

increment_decrement_basket()


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

// -------------BASKET SHOW--------------------


function onBasket(){
  const basketContainer = document.querySelector(".basket-user");
  const bodymask = document.querySelector(".body-mask");
  bodymask.style.display="block";
  basketContainer.classList.remove("inactive-basket")
  basketContainer.classList.add("active-basket")
  ReloadBasketAjax()
  ReloadBasketTotalAjax()
}

function offBasket(){
  const basketContainer = document.querySelector(".basket-user");
  const bodymask = document.querySelector(".body-mask");

  bodymask.style.display="none";
  basketContainer.classList.remove("active-basket")
  basketContainer.classList.add("inactive-basket")
}

function showBasket(){
  const basketTrigger = document.querySelector(".backet-container");
  const crossBasket = document.querySelector(".cross-basket")

  basketTrigger.addEventListener("click", ()=>{
    onBasket()
  })



  crossBasket.addEventListener("click", ()=>{
      offBasket()

  })

}


showBasket()

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
  const searchInput = document.querySelector(".search-box-nav input");
  const searchTrigger = document.querySelector(".search-trigger");
  const searchBox = document.querySelector(".search-box-nav")
  searchTrigger? searchTrigger.addEventListener("click", ()=>{
    searchInput.classList.remove("inactive-search-bar")
    searchInput.classList.add("active-search-bar")
  }): null;

  // Add a click event listener to the document to handle clicks outside the active card
  document.addEventListener("click", (event) => {
    if (searchBox && !searchBox.contains(event.target)) {
       searchInput.classList.remove("active-search-bar")
       searchInput.classList.add("inactive-search-bar")
    } else {

    }

  })

}
searchNav()