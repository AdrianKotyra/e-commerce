
 function sendRegisterAjax(){


    const alertContainer = document.querySelector(".alert-container-register");
    const userNameForm = document.querySelector(".firstname_reg").value;
    const userSurnameForm = document.querySelector(".lastname_reg").value;
    const userEmailForm = document.querySelector(".email_reg").value;
    const userPasswordForm = document.querySelector(".password_reg").value;
    const formContainer = document.querySelector(".reg-wrapper");


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
        formContainer.innerHTML=`<div class="alert alert-success text-center" role="alert">
        Please check your email and activate your account.</div>`;

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
    event.preventDefault()
    sendRegisterAjax()
})


// // initialise function on enter
// document.addEventListener("keydown", (event)=>{
//     event.preventDefault()
//     if(event.key==="Enter") {


//         sendRegisterAjax()
//     }

// })
