document.addEventListener("DOMContentLoaded", function () {
  document.querySelectorAll(".product-link").forEach(link => {
      link.addEventListener("click", function (event) {
          event.preventDefault(); // Prevent default navigation

          let productUrl = this.href; // Get the product URL
          let productContainer = document.querySelector(".products-container"); // Target container

          // Load product details via AJAX
          fetch(productUrl)
              .then(response => response.text())
              .then(data => {
                  productContainer.innerHTML = data; // Inject content

                  // Update browser history
                  history.pushState({ url: productUrl }, "", productUrl);
              })
              .catch(error => console.error("Error loading product:", error));
      });
  });

  // Handle Back/Forward button navigation
  window.addEventListener("popstate", function (event) {
      if (event.state && event.state.url) {
          fetch(event.state.url)
              .then(response => response.text())
              .then(data => {
                  document.querySelector(".products-container").innerHTML = data;
              })
              .catch(error => console.error("Error loading previous state:", error));
      }
  });
});

function scrollUp(){
  document.querySelector("body").scrollIntoView({ behavior: "instant" });
}


function load_global_js()
{
  let newScript = document.createElement("script");
  newScript.src = "js/basket_functions.js"; // Load the external JS file
  newScript.id = "basket-js";
  document.body.appendChild(newScript);
  let globalScript = document.createElement("script");
  globalScript.src = "js/global.js"; // Load the external JS file
  globalScript.id = "global-js";
  document.body.appendChild(globalScript);
}
function load_page_js(page)
{
  let newScript = document.createElement("script");
  newScript.src = `js/pages/${page}`; // Load the external JS file
  newScript.id = page;
  document.body.appendChild(newScript);


}
function changeUrl(url){
  history.pushState({}, '', `${url}`);
}
function switchPages(){
  const allSwitchers = document.querySelectorAll(".pageSwitcher");
  const mainRoot = document.querySelector(".content-main");
  allSwitchers.forEach(element => {
    let datain = "";
    element.addEventListener("click", ()=>{
      const url = element.getAttribute("link-data");
      const script = element.getAttribute("script-data");
      SendDataAjax(datain, `${url}`)
      .then(data => {
        mainRoot.innerHTML=data;
        load_global_js();
        load_page_js(script)
        changeUrl(url)
        scrollUp()
      })
      .catch(error => {
        console.error('Error:', error);
      });
    })

  });
}
switchPages()