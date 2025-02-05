// ---------------submit search-------------


function submitForm() {
    const searchButton = document.querySelector(".search-icon-container");
    searchButton&&searchButton.addEventListener("click", ()=>{
        document.querySelector(".search-form").submit();
    })

}



submitForm()

// ---------------dropdowns-------------

function DropDownFilters() {
    const allDropdowns = document.querySelectorAll(".filter-dropdown");
    const dropDowns = document.querySelectorAll(".filter-col");

    // Handle opening/closing dropdowns
    dropDowns.forEach((dropdown) => {
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