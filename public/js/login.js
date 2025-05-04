 // REGISTRATION  NEW USER  USING AJAX
 function loginUserAJAX(){


    function sendLoginAjax(event){
        event.preventDefault()
        const alertContainer = document.querySelector(".alert-container");
        const userEmailForm = document.querySelector(".email").value;
        const userPasswordForm = document.querySelector(".password").value;

        const urlParams = new URLSearchParams(window.location.search);


       // Create a FormData object
        const formData = new FormData();
        // check for param to redirect to checkout or just login
        if (urlParams.has("check_out")) {
          formData.append('userParam', "checkout");
        }
        else {
          formData.append('userParam', "login");
        }
        formData.append('userEmail', userEmailForm);
        formData.append('userPassword', userPasswordForm);

        // Send data via AJAX
        fetch('./ajax/login_acc.php', {
            method: 'POST',
            body: formData

        })
        .then(response => response.text())
        .then(data => {

          if(data.trim()==="success-logged-user") {

            window.location.reload();
            return;
          }

          if(data.trim()==="success-logged-admin") {

            window.location.href = `../admin/dashboard.php`;
            return;
          }
          else {

            alertContainer.innerHTML=data;
            return;
          }


        })
        .catch(error => {
            console.error('Error:', error);
        })

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




function showLogin(){
  const loginTrigger = document.querySelectorAll(".login-trigger");
  const crosslogin = document.querySelector(".cross-login")
  const loginContainer = document.querySelector(".login");
  loginTrigger.forEach(element => {
    element.addEventListener("click", ()=>{
      loginContainer.classList.remove("inactive-basket")
      loginContainer.classList.add("active-basket")
      bodyMaskOn()
      loginUserAJAX()
  })
  });




  crosslogin.addEventListener("click", ()=>{
    const loginContainer = document.querySelector(".login");
    loginContainer.classList.remove("active-basket")
    loginContainer.classList.add("inactive-basket")
    bodyMaskOff()
  })

}
showLogin()













// REGISTRATION  NEW USER  USING AJAX
function remindPasswordUserAJAX(){
  function sendReminderAjax(event){
      event.preventDefault()
      const alertReminder = document.querySelector(".alert-reminder")
      const userEmailForm = document.querySelector(".email-reminder").value;
      const formData = new FormData();
      formData.append('userEmail', userEmailForm);

      // Send data via AJAX
      fetch('./ajax/remind_password_acc.php', {
          method: 'POST',
          body: formData
      })
      .then(response => response.text())
      .then(data => {
        offLoader()
        alertReminder.innerHTML=data;
      })
      .catch(error => {
          console.error('Error:', error);
      })
  }

  // initialise function on click
  const reminderButton = document.querySelector(".reminder-user");
  reminderButton.addEventListener("click", (event)=>{
    displayLoader()
    sendReminderAjax(event)
  })

    // initialise function on enter
    document.addEventListener("keydown", (event)=>{
      if(event.key==="Enter") {
        sendReminderAjax(event)
      }

    })

  }









function showReminder(){
  const loginContainer = document.querySelector(".login");
  const reminderTrigger = document.querySelectorAll(".reminder_password");
  const cancelREminder = document.querySelectorAll(".cancel-reminder");
  const reminderContainer = document.querySelector(".reminder");
  reminderTrigger.forEach(login=>{
    login.addEventListener("click", ()=>{

      // off basket
      loginContainer.classList.remove("active-basket")
      loginContainer.classList.add("inactive-basket")
      reminderContainer.classList.remove("inactive-basket")
      reminderContainer.classList.add("active-basket")
      bodyMaskOn()
      remindPasswordUserAJAX()

    })
  })



  cancelREminder.forEach(ele=>{
    ele.addEventListener("click", ()=>{

    // off reminder
      reminderContainer.classList.remove("active-basket")
      reminderContainer.classList.add("inactive-basket")

      // off basket
      loginContainer.classList.remove("active-basket")
      loginContainer.classList.add("inactive-basket")
      bodyMaskOff()
    })
  })

}
showReminder()