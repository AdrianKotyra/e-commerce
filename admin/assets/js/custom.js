
// CHECK FUNCTIONALITY WITH DELETE ALL SELECTED RECORDS
function delete_check_table(){
    const modalContainer = document.querySelector(".modal-window-container");
    const confirmationModalLiteral = `
     <div class="confirmationWindowModal">
        <img class="cross_modal_admin exit-modal exit_modal_trigger"src="../public/imgs/icons/cross.svg" alt="">

        <div class="buttons-message-container">
            <p>Are you sure you want to delete this record?</p>
            <div class="buttons-ok-cancel">
                <button class="accept_button_delete_many btn btn-primary btn-round">OK</button>
                <button class="exit-modal btn btn-primary btn-round exit_modal_trigger">Cancel</button>
            </div>

        </div>
    </div>

    `;
    const button_trigger = document.querySelector(".delete_all");
    const selectors = document.querySelectorAll(".check");
    let letModal = false;


    if(button_trigger) {


        button_trigger.addEventListener("click",()=>{
            // check if any is selected to trigger modal
            selectors.forEach(selector=>{
            if (selector.checked) {
                letModal=true;
            }})

            // triggrer modal window if any selected
            if (letModal === true) {
            modalContainer.innerHTML = confirmationModalLiteral;
            } else {
            return;
            }

            closeModal()
            const deleteAllButton = document.querySelector(".accept_button_delete_many");
            // button to trigger delete record from modal add listener
            deleteAllButton.addEventListener("click", ()=>{
                let dataRow = "";
                let idRowName = "";
                let list_selected_ids = [];
                const selectors = document.querySelectorAll(".check");

                selectors.forEach(selector=>{
                    if (selector.checked) {
                        idRowName = selector.getAttribute("data-id-name");
                        dataRow = selector.getAttribute("data-row");
                        let selectedId = selector.getAttribute("id");
                        list_selected_ids.push(selectedId);
                    }



                })

                const data = {list_selected_ids: list_selected_ids, dataRow:dataRow, idRowName:idRowName};
                SendDataAjax(data, "./ajax/delete_records.php")
                .then(data => {
                    location.reload();

                })
                .catch(error => {
                    console.error('Error:', error);
                });
            })

        })
    }


}

delete_check_table()

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
// SEARCH TEAM MEMBER AJAX

function searchTeamAdmin(){

    const usersContainer = document.querySelector(".users_table");
    const userSearcheInput = document.querySelector(".searcher-team");


    userSearcheInput&&userSearcheInput.addEventListener("keyup", function(){
      const userSearcheInputValue = userSearcheInput.value;

        SendDataAjax(userSearcheInputValue, "./ajax/search_team.php")
        .then(data => {
            usersContainer.innerHTML=data;

            createConfirmWindowDeleteRow()
          createTeamMemberContentWindow()
        })
        .catch(error => {
            console.error('Error:', error);
        });




    })

  }

searchTeamAdmin()

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
// SEARCH post AJAX

function searchPostAdmin(){

    const postsContainer = document.querySelector(".posts_table");
    const postSearcheInput = document.querySelector(".searcher-post");


    postSearcheInput&&postSearcheInput.addEventListener("keyup", function(){
      const productSearcheInputValue = postSearcheInput.value;

        SendDataAjax(productSearcheInputValue, "./ajax/search_post.php")
        .then(data => {
            postsContainer.innerHTML=data;
            createConfirmWindowDeleteRow()
            createPostContentWindow()

        })
        .catch(error => {
            console.error('Error:', error);
        });




    })

  }
  searchPostAdmin()



//CREATE CONFIRMATION WINDOW TO DELETE RECORD. RECORD DELETION ON PASSING DATA-LINK ATTRIBUTE  AND GOING TO THE LINK




function createConfirmWindowDeleteRow(){
    const deleteButton = document.querySelectorAll(".delete_button")

    const modalContainer = document.querySelector(".modal-window-container");
    const confirmationModalLiteral = `
     <div class="confirmationWindowModal">
        <img class="cross_modal_admin exit-modal exit_modal_trigger"src="../public/imgs/icons/cross.svg" alt="">

        <div class="buttons-message-container">
            <p>Are you sure you want to delete this record?</p>
            <div class="buttons-ok-cancel">
                <button class="accept_button btn btn-primary btn-round">OK</button>
                <button class="exit-modal btn btn-primary btn-round exit_modal_trigger">Cancel</button>
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



            closeModal()
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


function closeModal(){
    const modalContainer = document.querySelector(".modal-window-container");
    const modalExits = document.querySelectorAll(".exit_modal_trigger");
    modalExits.forEach(ele=>ele.addEventListener("click", ()=>{

        modalContainer.innerHTML="";

    }))
}

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
                expandWindowModal()
                closeModal()


            })
            .catch(error => {
                console.error('Error:', error);
            });



        })
    });





}

createfeedbackWindow()


function createProductreviewsWindow(){
    const modalContainer = document.querySelector(".modal-window-container");
    const commentButtons = document.querySelectorAll(".product_link")
    commentButtons.forEach(button => {

        button.addEventListener("click", ()=>{
            const productId = button.getAttribute("product_id");

            SendDataAjax(productId, "./ajax/product_reviews.php")
            .then(data => {

                modalContainer.innerHTML=data;
                expandWindowModal()
                closeModal()


            })
            .catch(error => {
                console.error('Error:', error);
            });



        })
    });





}
createProductreviewsWindow()

function createTeamMemberContentWindow(){
    const postButtons = document.querySelectorAll(".team_link")
    const modalContainer = document.querySelector(".modal-window-container");

    postButtons.forEach(button => {

        button.addEventListener("click", ()=>{
            const teamMemberId = button.getAttribute("team_member_id");
            SendDataAjax(teamMemberId, "./ajax/team_content_modal.php")
            .then(data => {
                modalContainer.innerHTML=data;
                expandWindowModal()
                closeModal()


            })
            .catch(error => {
                console.error('Error:', error);
            });



        })
    });





}
createTeamMemberContentWindow()

function createPostContentWindow(){
    const postButtons = document.querySelectorAll(".post_link")
    const modalContainer = document.querySelector(".modal-window-container");

    postButtons.forEach(button => {

        button.addEventListener("click", ()=>{
            const postId = button.getAttribute("post_id");
            SendDataAjax(postId, "./ajax/post_content_modal.php")
            .then(data => {
                modalContainer.innerHTML=data;
                expandWindowModal()
                closeModal()


            })
            .catch(error => {
                console.error('Error:', error);
            });



        })
    });





}
createPostContentWindow()




function createOrdersContentWindow(){
    const orderButtons = document.querySelectorAll(".order_link")
    const modalContainer = document.querySelector(".modal-window-container");
    orderButtons.forEach(button => {

        button.addEventListener("click", ()=>{
            const orderId = button.getAttribute("order_id");
            SendDataAjax(orderId, "./ajax/order_content_modal.php")
            .then(data => {
                modalContainer.innerHTML=data;
                expandWindowModal()
                closeModal()


            })
            .catch(error => {
                console.error('Error:', error);
            });



        })
    });





}
createOrdersContentWindow()



// ------------------expand modal window------------------------
function expandWindowModal(){
    const expandIcon = document.querySelector(".expand-icon");
    const windowModal = document.querySelector(".confirmationWindowModal");
    expandIcon&&expandIcon.addEventListener("click", ()=>{
        windowModal.classList.contains("expanedWindow")?
        windowModal.classList.remove("expanedWindow"):
        windowModal.classList.add("expanedWindow");
    })
}



function createMsgsContentWindow(){
    const msgButtons = document.querySelectorAll(".msg_link")
    const modalContainer = document.querySelector(".modal-window-container");
    msgButtons.forEach(button => {

        button.addEventListener("click", ()=>{
            const msgId = button.getAttribute("msg_id");
            SendDataAjax(msgId, "./ajax/msg_content_modal.php")
            .then(data => {
                modalContainer.innerHTML=data;
                expandWindowModal()
                closeModal()
                // change status innnerhtml to 'readed' when clicked modal
                document.querySelector(`.status-td-${msgId}`).innerHTML="readed"




            })
            .catch(error => {
                console.error('Error:', error);
            });



        })
    });





}
createMsgsContentWindow()

// -----------------dropdowns function--------------------

function DropDownFilters() {
    const allDropdowns = document.querySelectorAll(".filter-dropdown");
    const dropDowns = document.querySelectorAll(".filter-col");

    // Handle opening/closing dropdowns
    dropDowns&&dropDowns.forEach((dropdown) => {
        dropdown.addEventListener("click", (event) => {
            // Prevent click from propagating to the document
            event.stopPropagation();

            const dropDownContentSelected = dropdown.querySelector(".filter-dropdown");

            // Toggle the active state for the clicked dropdown
            const isActive = dropDownContentSelected.classList.contains("active-dropdown-filter");

            // Close all dropdowns first
            allDropdowns.forEach((generaldropdown) => {
                generaldropdown.classList.remove("active-dropdown-filter");
                generaldropdown.classList.add("inactive-dropdown-filter");
            });

            // Open the clicked dropdown if it wasn't active
            if (!isActive) {
                dropDownContentSelected.classList.remove("inactive-dropdown-filter");
                dropDownContentSelected.classList.add("active-dropdown-filter");
            }
        });
    });

    // Close all dropdowns when clicking outside
    document.addEventListener("click", () => {
        // Close all dropdowns
        allDropdowns.forEach((generaldropdown) => {
            generaldropdown.classList.remove("active-dropdown-filter");
            generaldropdown.classList.add("inactive-dropdown-filter");
        });
    });

    // Prevent the dropdown itself from closing when clicking inside
    allDropdowns.forEach((dropdownContent) => {
        dropdownContent.addEventListener("click", (event) => {
            event.stopPropagation();
        });
    });
}


DropDownFilters()



// SEARCH product of month

function searchProductMonth(){

    const productsContainer = document.querySelector(".search-results-wrapper");
    const productSearcheInput = document.querySelector(".searcher-product-year");


    productSearcheInput&&productSearcheInput.addEventListener("keyup", function(){
      const productSearcheInputValue = productSearcheInput.value;

        SendDataAjax(productSearcheInputValue, "./ajax/GET_product_sneaker_month.php")
        .then(data => {
            productsContainer.innerHTML=data;


        })
        .catch(error => {
            console.error('Error:', error);
        });




    })

  }
  searchProductMonth()