 // REGISTRATION  NEW USER  USING AJAX
 function registerNewUserAJAX(){
    function sendRegisterAjax(){

          event.preventDefault()
          const alertContainer = document.querySelector(".alert-container");
          const userNameForm = document.querySelector(".firstname").value;
          const userSurnameForm = document.querySelector(".lastname").value;
          const userEmailForm = document.querySelector(".email").value;
          const userPasswordForm = document.querySelector(".password").value;


         // Create a FormData object
          const formData = new FormData();
          formData.append('userName', userNameForm);
          formData.append('userSurname', userSurnameForm);
          formData.append('userEmail', userEmailForm);
          formData.append('userPassword', userPasswordForm);

          // Send data via AJAX
          fetch('./ajax/create_acc.php', {
              method: 'POST',
              body: formData
          })
          .then(response => response.text())
          .then(data => {
            if(data.trim()==="success") {
                alertContainer.innerHTML="account created !";

            }
            else{
                alertContainer.innerHTML=data;
            }


          })
          .catch(error => {
              console.error('Error:', error);
          });
        }



        // initialise function on click
        const registerUserButtonMain = document.querySelector(".register-acc-trigger");
        registerUserButtonMain.addEventListener("click", (event)=>{
            sendRegisterAjax()(event)
        })
           // initialise function on enter
        document.addEventListener("keydown", (event)=>{
        if(event.key==="Enter") {
            const inactiveSearch = document.querySelector(".inactive-search-bar");
            if(inactiveSearch) {
            sendRegisterAjax()(event)
        }}

    })


}

registerNewUserAJAX()