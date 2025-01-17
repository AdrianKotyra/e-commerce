
// SETTING UP DEFAULT TODAYS DATE TO ELEMENTS WITH datePicker id

function getTodaysDate(){
    Date.prototype.toDateInputValue = (function() {
        var local = new Date(this);
        local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
        return local.toJSON().slice(0,10);
    });
    const dateElement = document.getElementById('datePicker');
    dateElement? document.getElementById('datePicker').value = new Date().toDateInputValue() : null;
}
getTodaysDate()



//CREATE CONFIRMATION WINDOW TO DELETE RECORD. RECORD DELETION ON PASSING DATA-LINK ATTRIBUTE  AND GOING TO THE LINK




function createConfirmWindowDeleteRow(){
    const deleteButton = document.querySelectorAll(".delete_button")

    const modalContainer = document.querySelector(".modal-window-container");
    const confirmationModalLiteral = `
     <div class="confirmationWindowModal">
        <img class="cross_modal_admin exit-modal"src="../public/imgs/icons/cross.svg" alt="">

        <div class="buttons-message-container">
            <p>Are you sure you want to delete this record?</p>
            <div class="buttons-ok-cancel">
                <button class="accept_button">OK</button>
                <button class="exit-modal">Cancel</button>
            </div>

        </div>
    </div>

    `

    deleteButton.forEach(button => {

        button.addEventListener("click", ()=>{

            modalContainer.innerHTML=confirmationModalLiteral;

            const acceptButton = document.querySelector(".accept_button")
            document.addEventListener('keydown', function(event) {
                if (event.key === 'Enter') {
                    let selectedDeleteLink = button.getAttribute("data-link");

                    window.location.href = `${selectedDeleteLink}`;
                }

            })

            acceptButton.addEventListener("click", ()=>{
                let selectedDeleteLink = button.getAttribute("data-link");

                window.location.href = `${selectedDeleteLink}`;
            })



            const exitModal = document.querySelectorAll(".exit-modal");
            exitModal.forEach(ele=>ele.addEventListener("click", ()=>{

                modalContainer.innerHTML="";

            }))
        })
    });





}
createConfirmWindowDeleteRow()

function SendDataAjax(sendData, file) {
    return new Promise((resolve, reject) => {
        $.post(file, {data: sendData}, function(data) {
            resolve(data);
        }).fail(function(jqXHR, textStatus, errorThrown) {
            reject(errorThrown);
        });
    });
  }

// -------------------------Search  AJAX--------------------------------
function searchMoviesAdmin(){

    const moviesContainer = document.querySelector(".movies-table");
    const movieSearcheInput = document.querySelector(".search-movies-input-admin");


    movieSearcheInput.addEventListener("keyup", function(){
      const movieSearcheInputValue = movieSearcheInput.value;
      if (movieSearcheInputValue.trim().length > 0 && movieSearcheInputValue!="") {
        SendDataAjax(movieSearcheInputValue, "../public/ajax/GET_SEARCHED_MOVIE_ADMIN.php")
        .then(data => {
            moviesContainer.innerHTML=data;
            createConfirmWindowDeleteRow()

        })
        .catch(error => {
            console.error('Error:', error);
        });
      }
      else {
        resultsSearched.innerHTML=""
      }


    })

  }
searchMoviesAdmin()
