 // REGISTRATION  NEW USER  USING AJAX
 function registerNewUserAJAX(){
    function sendRegisterAjax(){

          event.preventDefault()
          const alertContainer = document.querySelector(".alert-container-register");
          const userNameForm = document.querySelector(".firstname_reg").value;
          const userSurnameForm = document.querySelector(".lastname_reg").value;
          const userEmailForm = document.querySelector(".email_reg").value;
          const userPasswordForm = document.querySelector(".password_reg").value;


         // Create a FormData object
          const formData = new FormData();
          formData.append('userName', userNameForm);
          formData.append('userSurname', userSurnameForm);
          formData.append('userEmail', userEmailForm);
          formData.append('userPassword', userPasswordForm);
          displayLoader()

          // Send data via AJAX
          fetch('./ajax/create_acc.php', {
              method: 'POST',
              body: formData
          })

          .then(response => response.text())
          .then(data => {

            if(data.trim()==="pass") {

                document.querySelector(".reg-form").submit();
                offLoader()

                // window.location.href="registration_email.php";

            }
            else{
                offLoader()

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
            sendRegisterAjax()
        })
           // initialise function on enter
        document.addEventListener("keydown", (event)=>{
        if(event.key==="Enter") {


            sendRegisterAjax()
        }

    })


}

registerNewUserAJAX()