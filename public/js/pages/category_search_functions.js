


// -------------BASKET SHOW--------------------




function onFilter(){
    const filterContainer = document.querySelector(".filter-modal-container");
    filterContainer.classList.remove("inactive-basket")
    filterContainer.classList.add("active-basket")
    bodyMaskOn();

}

function offFilter(){
    const filterContainer = document.querySelector(".filter-modal-container");
    filterContainer.classList.remove("active-basket")
    filterContainer.classList.add("inactive-basket")
    bodyMaskOff();
}

function showFilterMobile(){
    const basketTrigger = document.querySelector(".filter-icon");
    const crossFilter = document.querySelector(".cross-filter")
    basketTrigger&&basketTrigger.addEventListener("click", ()=>{
        onFilter();
    })


    crossFilter.addEventListener("click", ()=>{
        offFilter()

    })

}


showFilterMobile()
