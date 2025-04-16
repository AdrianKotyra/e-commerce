function channgeDelivery(){
    const changeDeliveryOptions = document.querySelectorAll(".change_delivery");
    const totalAmount = document.querySelector(".display_total");


    changeDeliveryOptions.forEach(change_delivery=>{
      change_delivery.addEventListener("change", ()=>{
        const deliveryOption = change_delivery.value;


        data = {deliveryOption:deliveryOption};
        SendDataAjax(data, "ajax/change_delivery_option_update_total.php")
        .then(data => {
            // reload website to load paypal button with new session total fetched when starting
            window.location.reload();

        })
        .catch(error => {
            console.error('Error:', error);
        })


      })
    })
  }
channgeDelivery()
