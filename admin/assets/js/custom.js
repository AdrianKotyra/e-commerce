
// SEARCH PRODUCTS AJAX

function searchProductAdmin(){

    const productsContainer = document.querySelector(".products_table");
    const productSearcheInput = document.querySelector(".searcher-product");


    productSearcheInput&&productSearcheInput.addEventListener("keyup", function(){
      const productSearcheInputValue = productSearcheInput.value;

        SendDataAjax(productSearcheInputValue, "./ajax/search_product.php")
        .then(data => {
            productsContainer.innerHTML=data;
            createConfirmWindowDeleteRow()

        })
        .catch(error => {
            console.error('Error:', error);
        });




    })

  }
  searchProductAdmin()


// SEARCH PRODUCTS AJAX

function searchUsersAdmin(){

    const usersContainer = document.querySelector(".users_table");
    const userSearcheInput = document.querySelector(".searcher-user");


    userSearcheInput&&userSearcheInput.addEventListener("keyup", function(){
      const userSearcheInputValue = userSearcheInput.value;

        SendDataAjax(userSearcheInputValue, "./ajax/search_user.php")
        .then(data => {
            usersContainer.innerHTML=data;
            createConfirmWindowDeleteRow()

        })
        .catch(error => {
            console.error('Error:', error);
        });




    })

  }
  searchUsersAdmin()


// SEARCH comment AJAX

function searchCommentAdmin(){

    const productsContainer = document.querySelector(".comments_table");
    const productSearcheInput = document.querySelector(".searcher-comment");


    productSearcheInput&&productSearcheInput.addEventListener("keyup", function(){
      const productSearcheInputValue = productSearcheInput.value;

        SendDataAjax(productSearcheInputValue, "./ajax/search_comment.php")
        .then(data => {
            productsContainer.innerHTML=data;
            createConfirmWindowDeleteRow()
            changeStatusComments()
            createfeedbackWindow()

        })
        .catch(error => {
            console.error('Error:', error);
        });




    })

  }
  searchCommentAdmin()

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
                <button class="accept_button btn btn-primary btn-round">OK</button>
                <button class="exit-modal btn btn-primary btn-round">Cancel</button>
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

// ------------change comment status-----------
function changeStatusComments(){
    const allButtons = document.querySelectorAll(".change_status_button");
    allButtons.forEach(changeButton=>{
        changeButton.addEventListener("click", ()=>{
            let selectedchangeLink = changeButton.getAttribute("data-link");

            window.location.href = `${selectedchangeLink}`;
        })
    })


}

changeStatusComments()


function SendDataAjax(sendData, file) {
    return new Promise((resolve, reject) => {
        $.post(file, {data: sendData}, function(data) {
            resolve(data);
        }).fail(function(jqXHR, textStatus, errorThrown) {
            reject(errorThrown);
        });
    });
  }
  function createfeedbackWindow(){
    const commentButtons = document.querySelectorAll(".comment-id-link")
    const modalContainer = document.querySelector(".modal-window-container");


    commentButtons.forEach(button => {

        button.addEventListener("click", ()=>{
            const productId = button.getAttribute("data-comment-id");
            SendDataAjax(productId, "./ajax/comment_modal.php")
            .then(data => {
                modalContainer.innerHTML=data;

                const exitModal = document.querySelectorAll(".exit-modal");
                exitModal.forEach(ele=>ele.addEventListener("click", ()=>{

                    modalContainer.innerHTML="";

                }))


            })
            .catch(error => {
                console.error('Error:', error);
            });



        })
    });





}

createfeedbackWindow()


function createProductreviewsWindow(){
    const commentButtons = document.querySelectorAll(".product_link")
    const modalContainer = document.querySelector(".modal-window-container");


    commentButtons.forEach(button => {

        button.addEventListener("click", ()=>{
            const productId = button.getAttribute("product_id");

            SendDataAjax(productId, "./ajax/product_reviews.php")
            .then(data => {

                modalContainer.innerHTML=data;



                const exitModal = document.querySelectorAll(".exit-modal");
                exitModal.forEach(ele=>ele.addEventListener("click", ()=>{

                    modalContainer.innerHTML="";

                }))


            })
            .catch(error => {
                console.error('Error:', error);
            });



        })
    });





}
createProductreviewsWindow()


function createPostContentWindow(){
    const postButtons = document.querySelectorAll(".post_link")
    const modalContainer = document.querySelector(".modal-window-container");


    postButtons.forEach(button => {

        button.addEventListener("click", ()=>{
            const postId = button.getAttribute("post_id");
            SendDataAjax(postId, "./ajax/post_content_modal.php")
            .then(data => {
                modalContainer.innerHTML=data;

                const exitModal = document.querySelectorAll(".exit-modal");
                exitModal.forEach(ele=>ele.addEventListener("click", ()=>{

                    modalContainer.innerHTML="";

                }))


            })
            .catch(error => {
                console.error('Error:', error);
            });



        })
    });





}
createPostContentWindow()