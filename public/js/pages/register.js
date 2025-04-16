
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

    // Send data via AJAX
    fetch('./ajax/create_acc_verify.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
    if(data.trim()==="pass") {
        TermsAndConditonModal()
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
    event.preventDefault()
    sendRegisterAjax()
})



function confirmCreateAccount(){



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

            const modalMain = document.querySelector(".modal-container");
            modalMain.style.display="none";
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




function TermsAndConditonModal(){

    const modal = `<div class="terms-and-condition wrapper">

    <div class="exit-icon exit-modal">
      <i class="fa-solid fa-xmark "></i>
    </div>

    <div class="container-terms">

        <main>
        <article class="terms-container">

        </article>

    <!-- Modal Confirmation Buttons -->
    <div class="term-buttons-container">
        <div class="button-terms-window flex-row">
        <button class="button-custom accept-terms">ACCEPT</button>
        <button class="button-custom exit-modal">DECLINE</button>
        </div>
    </div>
    </main>

    </div>




    </div>
  </div>`;

    const modalMain = document.querySelector(".modal-container");
    modalMain.innerHTML=modal;
        //   fetch json terms

    fetch('./json/terms_conditions/terms_conditions.json')
    .then(response => response.json())
    .then(data => {
        const termsContainer = document.querySelector(".terms-container");
        termsContainer.innerHTML = data.terms;
    })
    .catch(error => {
        console.error('Error loading terms:', error)
        termsContainer.innerHTML = "fail fetching data";
    }



    );

  bodyMaskOn()


    const exitModal = document.querySelectorAll(".exit-modal");
    exitModal.forEach(element => {
        element.addEventListener("click", ()=>{
            modalMain.innerHTML="";
            bodyMaskOff()
        })
    });


    const acceptTerms = document.querySelector(".accept-terms");
    acceptTerms.addEventListener("click", ()=>{
        confirmCreateAccount()
    })








}
