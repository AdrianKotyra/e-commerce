


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
  // -------------add to basket --------------------
  function add_similar_to_basket() {
    const similarProds = document.querySelectorAll(".similar-prod-col");

    similarProds.forEach(simiProd => {
      const inputSelected = simiProd.querySelector(".prod-size-similar"); //<<<< select tag
      const addSimilarButton = simiProd.querySelector(".add-similar-button"); //<<<< button

      addSimilarButton.addEventListener("click", () => {
        const selectedOption = inputSelected.options[inputSelected.selectedIndex]; //<<<< selected option
        const productId = selectedOption.getAttribute("data-prod-id");
        const productsize = selectedOption.getAttribute("data-prod-size");

        const data = { productId: productId, productsize: productsize };

        if (data) {
          SendDataAjax(data, "ajax/add_to_basket.php")
            .then(data => {
              onBasket();
            })
            .catch(error => {
              console.error('Error:', error);
            });
        }
      });
    });
  }

  add_similar_to_basket()


  // -------------remove from basket --------------------
  function removeFromBasket() {
    const basketProductCol = document.querySelectorAll(".basket_product_template");

    basketProductCol.forEach(basketProd => {
      const removeButton = basketProd.querySelector(".remove-item-basket"); //<<<< button

      removeButton.addEventListener("click", () => {
        const selectedDecrementor = basketProd.querySelector(".basket-decrement");
        const productId = selectedDecrementor.getAttribute("data-prod-id");
        const productsize = selectedDecrementor.getAttribute("data-prod-size");

        const data = { productId: productId, productsize: productsize };

        if (data) {
          SendDataAjax(data, "ajax/remove_from_basket.php")
            .then(data => {
              onBasket();
            })
            .catch(error => {
              console.error('Error:', error);
            });
        }
      });
    });
  }

  // -------------increment and decrement --------------------
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
  // ---------------reloado basket products ajax-------------------
  function ReloadBasketAjax(){
    const basketContainer = document.querySelector(".body-basket")
    const dummydata= "";
    SendDataAjax(dummydata, "ajax/reload_basket.php")
    .then(data => {
      basketContainer.innerHTML=data;
      // when basket is reloaded initiate decrement and increment function ajax
      increment_decrement_basket()
      removeFromBasket()

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
