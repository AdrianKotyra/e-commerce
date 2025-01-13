
// ---------------FILTER DROPDOWNS-------------------
function DropDownFilters() {
    const allDropdowns = document.querySelectorAll(".filter-dropdown");
    const dropDowns = document.querySelectorAll(".filter-col");

    // Attach click event to each dropdown
    dropDowns.forEach((dropdown) => {
        dropdown.addEventListener("click", (event) => {
            // Prevent click event from propagating to document
            event.stopPropagation();

            const dropDownContentSelected = dropdown.querySelector(".filter-dropdown");

            // Toggle the active state for the clicked dropdown
            if (dropDownContentSelected.classList.contains("active-dropdown-filter")) {
                dropDownContentSelected.classList.remove("active-dropdown-filter");
                dropDownContentSelected.classList.add("inactive-dropdown-filter");
            } else {
                // Close all dropdowns first
                allDropdowns.forEach((generaldropdown) => {
                    generaldropdown.classList.remove("active-dropdown-filter");
                    generaldropdown.classList.add("inactive-dropdown-filter");
                });
                // Activate the clicked dropdown
                dropDownContentSelected.classList.remove("inactive-dropdown-filter");
                dropDownContentSelected.classList.add("active-dropdown-filter");
            }
        });
    });

    // Close all dropdowns when clicking outside
    document.addEventListener("click", () => {
        allDropdowns.forEach((generaldropdown) => {
            generaldropdown.classList.remove("active-dropdown-filter");
            generaldropdown.classList.add("inactive-dropdown-filter");
        });
    });
}
DropDownFilters()