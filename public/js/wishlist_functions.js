

// -------------wishlist SHOW--------------------



function onWishlist(){
    const basketContainer = document.querySelector(".wishlist-user");
    basketContainer.classList.remove("inactive-basket")
    basketContainer.classList.add("active-basket")
    bodyMaskOn()
    ReloadWishlistAjax()
  }




  function offWishlist(){
    const basketContainer = document.querySelector(".wishlist-user");
    basketContainer.classList.remove("active-basket")
    basketContainer.classList.add("inactive-basket")
    bodyMaskOff()
  }

  function showWishlist(){
    const basketTrigger = document.querySelector(".wish-list-nav");
    const crossBasket = document.querySelector(".cross-wishlist")
    basketTrigger&&basketTrigger.addEventListener("click", ()=>{
        onWishlist()
    })



    crossBasket.addEventListener("click", ()=>{
        offWishlist()

    })

  }


  showWishlist()






  // -------------remove from basket --------------------
  function removeFromWishlist() {
    const basketProductCol = document.querySelectorAll(".wishlist_product_template");

    basketProductCol.forEach(basketProd => {
      const removeButton = basketProd.querySelector(".remove-item-wishlist"); //<<<< button

      removeButton.addEventListener("click", () => {

        const productId = removeButton.getAttribute("data-prod-id");

        const data = { productId: productId };

        if (data) {
          SendDataAjax(data, "ajax/remove_from_wishlist.php")
            .then(data => {
                ReloadWishlistAjax()
            })
            .catch(error => {
              console.error('Error:', error);
            });
        }
      });
    });
  }
  removeFromWishlist()


  function displayModalWindowAddedProduct(data){
    function displayOffModalWishlist(){
      const cross = document.querySelectorAll(".exit-modal");
      const crossBasket = document.querySelector(".exit-modal-go-wishlist");
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
      crossBasket&&crossBasket.addEventListener("click", ()=>{
        onBasket()
      })

    }

    const modalWindow = document.querySelector(".modal-container");
    const bodymask = document.querySelector(".body-mask");
    bodymask.style.display="block";
    document.body.style.overflowY = "hidden";
    modalWindow.innerHTML=data;

    displayOffModalWishlist()

  }


  // ---------------quick add product to basket ajax-------------------
  function addProductFavorite(){
    // select only those not in prodcuts.php by selecting by container which is not in products.php
    const allLabels = document.querySelectorAll(".prod-fav-label");

    allLabels.forEach(label=>{
      label.addEventListener("click", ()=>{
        if(label.classList.contains("prod-fav-label")) {

            label.src='./imgs/icons/heart-solid.svg';
            label.classList.replace("prod-fav-label", "prod-fav-label-added");


            const productId = label.getAttribute("prod-id");
            data = {productId:productId };
            SendDataAjax(data, "ajax/add_to_wishlist.php")
            .then(data => {

              displayModalWindowAddedProduct(data)
              ReloadWishlistAjax()

            })
            .catch(error => {
                console.error('Error:', error);
            })

        }

      })
    })

  }
  addProductFavorite()

  // ---------------reloado basket products ajax-------------------
  function ReloadWishlistAjax(){
    const basketContainer = document.querySelector(".wishlist-body");
    const basketNumber = document.querySelector(".basket-number");
    const dummydata= "";
    SendDataAjax(dummydata, "ajax/reload_wishlist.php")
    .then(data => {
      const basket_reloaded = data;


    //   number_items>0? basketNumber.classList.add("basket-active") : basketNumber.classList.remove("basket-active");

    //   basketNumber.innerHTML=number_items;
      basketContainer.innerHTML=basket_reloaded;
      // when wishlist is reloaded initiate remove item function ajax
      removeFromWishlist()

    })
    .catch(error => {
        console.error('Error:', error);
    })

  }
