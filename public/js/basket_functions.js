


// -------------BASKET SHOW--------------------





function onBasket(){
    const basketContainer = document.querySelector(".basket-user");
    const bodymask = document.querySelector(".body-mask");
    bodymask.style.display="block";
    document.body.style.overflowY = "hidden";
    basketContainer.classList.remove("inactive-basket")
    basketContainer.classList.add("active-basket")
    ReloadBasketAjax()

  }

  function offBasket(){
    const basketContainer = document.querySelector(".basket-user");
    const bodymask = document.querySelector(".body-mask");

    bodymask.style.display="none";
    document.body.style.overflowY = "scroll";
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
              ReloadBasketAjax()
            })
            .catch(error => {
              console.error('Error:', error);
            });
        }
      });
    });
  }
  removeFromBasket()

  // -------------increment and decrement --------------------
  function increment_decrement_basket(){

    function send_data_ajax(controller){
      const productId = controller.getAttribute("data-prod-id");
      const productsize= controller.getAttribute("data-prod-size");
      data = {productId:productId,productsize:productsize };

      if(controller.classList.contains("basket-increment")) {
        SendDataAjax(data, "ajax/add_to_basket.php")
        .then(data => {
            // w8 for data and then reload basket

            ReloadBasketAjax()


        })
        .catch(error => {
            console.error('Error:', error);
        })
      }
      else {
        SendDataAjax(data, "ajax/basket-decrement.php")
        .then(data => {
          // w8 for data and then reload basket

            ReloadBasketAjax()
          200
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
        const colBasketProduct = decrementor.closest(".basket_product_template ");
        colBasketProduct.classList.add("incremeting_class")
        send_data_ajax(incrementor)
      })
      decrementor.addEventListener("click", ()=>{
        const colBasketProduct = decrementor.closest(".basket_product_template ");
        colBasketProduct.classList.add("incremeting_class")
        send_data_ajax(decrementor)
      })
     })
  }

  increment_decrement_basket()

  function displayModalWindowAddedProduct(data){
    function displayOffModal(){
      const cross = document.querySelectorAll(".exit-modal");
      const crossBasket = document.querySelector(".exit-modal-go-basket");
      // off the modal
      cross.forEach(element => {
        element.addEventListener("click", ()=>{
          // display off all opened products labels
          const Labels = document.querySelectorAll(".hidden-prod-label");
          Labels.forEach(label=>{
            label.classList.remove("clicked-active-label");
          })
          // close modal
          modalWindow.innerHTML="";
          bodymask.style.display="none";
          document.body.style.overflowY = "scroll";
        })
      });
      // display basket and off the modal
      crossBasket.addEventListener("click", ()=>{
        onBasket()
      })

    }

    const modalWindow = document.querySelector(".modal-container");
    const bodymask = document.querySelector(".body-mask");
    bodymask.style.display="block";
    document.body.style.overflowY = "hidden";
    modalWindow.innerHTML=data;

    displayOffModal()

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

          displayModalWindowAddedProduct(data)
          ReloadBasketAjax()

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
    const basketContainer = document.querySelectorAll(".body-basket");
    const basketTotalContainer = document.querySelectorAll(".basket_total");
    const basketNumber = document.querySelector(".basket-number");
    const dummydata= "";
    SendDataAjax(dummydata, "ajax/reload_basket.php")
    .then(data => {
      const basket_reloaded = data[0];
      const total_reloaded = data[1];
      const number_items = data[2];


      number_items>0? basketNumber.classList.add("basket-active") : basketNumber.classList.remove("basket-active");

      basketNumber.innerHTML=number_items;
      basketContainer.forEach(ele=>{ele.innerHTML=basket_reloaded;})
      basketTotalContainer.forEach(ele=>{ele.innerHTML=total_reloaded;})
      // when basket is reloaded initiate decrement and increment function ajax
      increment_decrement_basket()
      // when basket is reloaded initiate remove item function ajax
      removeFromBasket()

    })
    .catch(error => {
        console.error('Error:', error);
    })

  }
