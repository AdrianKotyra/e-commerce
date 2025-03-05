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
          displayLoader()
          if(data.trim()==="success-logged") {

            window.location.reload();
            return;
          }
          if(data.trim()==="success-logged-checkout") {

            window.location.href = `check_out.php`;
            return;
          }
          if(data.trim()==="admin") {

            window.location.href = `../admin/dashboard.php`;
            return;
          }
          else {
            offLoader()
            alertContainer.innerHTML=data;
            return;
          }


        })
        .catch(error => {
            console.error('Error:', error);
        })
        .finally(() => {
          offLoader()
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




function showLogin(){
  const loginTrigger = document.querySelectorAll(".login-trigger");
  const crosslogin = document.querySelector(".cross-login")
  loginTrigger.forEach(login=>{
    login.addEventListener("click", ()=>{

      const loginContainer = document.querySelector(".login");
      loginContainer.classList.remove("inactive-basket")
      loginContainer.classList.add("active-basket")
      bodyMaskOn()
      loginUserAJAX()
    })
  })



  crosslogin.addEventListener("click", ()=>{
    const loginContainer = document.querySelector(".login");
    loginContainer.classList.remove("active-basket")
    loginContainer.classList.add("inactive-basket")
    bodyMaskOff()
  })

}
showLogin()