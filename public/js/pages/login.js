 // REGISTRATION  NEW USER  USING AJAX
 function loginUserAJAX(){


    function sendLoginAjax(event){
        event.preventDefault()
        const alertContainer = document.querySelector(".alert-container");
        const userEmailForm = document.querySelector(".email").value;
        const userPasswordForm = document.querySelector(".password").value;
       // Create a FormData object
        const formData = new FormData();
        formData.append('userEmail', userEmailForm);
        formData.append('userPassword', userPasswordForm);
        // Send data via AJAX
        fetch('./ajax/login_acc.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
          if(data.trim()==="success-logged") {

            console.log(data)
            window.location.href = `account.php`;
          }
          else {
            console
            alertContainer.innerHTML=data;
          }


        })
        .catch(error => {
            console.error('Error:', error);
        });
    }

    // initialise function on click
    const loginButtonMain = document.querySelector(".login-user");
    loginButtonMain.addEventListener("click", (event)=>{
        sendLoginAjax(event)
    })
    // initialise function on enter
    document.addEventListener("keydown", (event)=>{
        if(event.key==="Enter") {
            sendLoginAjax(event)
        }

    })

  }
  loginUserAJAX()