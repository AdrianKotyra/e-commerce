



function ChangeUIColours() {
    const urlParams = new URLSearchParams(window.location.search);

    const getCategory =  urlParams.get('category');

      if(getCategory=='female' && window.location.href.includes("index.php")) {
        document.documentElement.style.setProperty("--ui-main-nav", "#6a1373");
        document.documentElement.style.setProperty("--ui-main-text-nav", "#ffffff");
        document.documentElement.style.setProperty("--ui-filter", "invert(100%) sepia(91%) saturate(38%) hue-rotate(264deg) brightness(110%) contrast(110%)");

      }
      if(getCategory=='male'  && window.location.href.includes("index.php")) {
        document.documentElement.style.setProperty("--ui-main-nav", "#4a5b98");
        document.documentElement.style.setProperty("--ui-main-text-nav", "#ffffff");
        document.documentElement.style.setProperty("--ui-filter", "invert(100%) sepia(91%) saturate(38%) hue-rotate(264deg) brightness(110%) contrast(110%)");

      }
      if(getCategory=='unisex'  && window.location.href.includes("index.php")) {
        document.documentElement.style.setProperty("--ui-main-nav", "#50724b");
        document.documentElement.style.setProperty("--ui-main-text-nav", "#ffffff");
        document.documentElement.style.setProperty("--ui-filter", "invert(100%) sepia(91%) saturate(38%) hue-rotate(264deg) brightness(110%) contrast(110%)");

      }

  }


function darkMode(){
const urlParams = new URLSearchParams(window.location.search);

    const getCategory =  urlParams.get('category');


        document.documentElement.style.setProperty("--ui-filter", "invert(100%) sepia(91%) saturate(38%) hue-rotate(264deg) brightness(110%) contrast(110%)");


        if(getCategory=='female'  && window.location.href.includes("index.php")) {
        document.documentElement.style.setProperty("--ui-main-nav", "#6a1373");
        document.documentElement.style.setProperty("--ui-main-text-nav", "#ffffff");
        document.documentElement.style.setProperty("--ui-filter", "invert(100%) sepia(91%) saturate(38%) hue-rotate(264deg) brightness(110%) contrast(110%)");

      }
      else if(getCategory=='male'  && window.location.href.includes("index.php")) {
        document.documentElement.style.setProperty("--ui-main-nav", "#4a5b98");
        document.documentElement.style.setProperty("--ui-main-text-nav", "#ffffff");
        document.documentElement.style.setProperty("--ui-filter", "invert(100%) sepia(91%) saturate(38%) hue-rotate(264deg) brightness(110%) contrast(110%)");

      }
      else if(getCategory=='unisex'  && window.location.href.includes("index.php")) {
        document.documentElement.style.setProperty("--ui-main-nav", "#50724b");
        document.documentElement.style.setProperty("--ui-main-text-nav", "#ffffff");
        document.documentElement.style.setProperty("--ui-filter", "invert(100%) sepia(91%) saturate(38%) hue-rotate(264deg) brightness(110%) contrast(110%)");

      }
      else {
        document.documentElement.style.setProperty("--ui-main-nav", "#000000");

        document.documentElement.style.setProperty("--ui-main-text-nav", "#ffffff");



      }
      document.documentElement.style.setProperty("--ui-main-text", "#ffffff");
      document.documentElement.style.setProperty("--ui-slider-filter", "invert(100%) sepia(91%) saturate(38%) hue-rotate(264deg) brightness(110%) contrast(110%)");
      document.documentElement.style.setProperty("--ui-main", "#1e1c1c");
      document.documentElement.style.setProperty("--ui-product-card", "#000000");


}


function lightMode(){
        const urlParams = new URLSearchParams(window.location.search);
        const getCategory =  urlParams.get('category');


        if(getCategory=='female'  && window.location.href.includes("index.php")) {
        document.documentElement.style.setProperty("--ui-main-nav", "#6a1373");
        document.documentElement.style.setProperty("--ui-main-text-nav", "#ffffff");
        document.documentElement.style.setProperty("--ui-filter", "invert(100%) sepia(91%) saturate(38%) hue-rotate(264deg) brightness(110%) contrast(110%)");

      }
      else if(getCategory=='male'  && window.location.href.includes("index.php")) {
        document.documentElement.style.setProperty("--ui-main-nav", "#4a5b98");
        document.documentElement.style.setProperty("--ui-main-text-nav", "#ffffff");
        document.documentElement.style.setProperty("--ui-filter", "invert(100%) sepia(91%) saturate(38%) hue-rotate(264deg) brightness(110%) contrast(110%)");

      }
      else if(getCategory=='unisex'  && window.location.href.includes("index.php")) {
        document.documentElement.style.setProperty("--ui-main-nav", "#50724b");
        document.documentElement.style.setProperty("--ui-main-text-nav", "#ffffff");
        document.documentElement.style.setProperty("--ui-filter", "invert(100%) sepia(91%) saturate(38%) hue-rotate(264deg) brightness(110%) contrast(110%)");

      }
      else {

        document.documentElement.style.setProperty("--ui-main-nav", "#ffffff");
        document.documentElement.style.setProperty("--ui-main-text-nav", "#000000");
        document.documentElement.style.setProperty("--ui-filter", "invert(0%) sepia(100%) saturate(0%) hue-rotate(13deg) brightness(95%) contrast(105%)");




      }

      document.documentElement.style.setProperty("--ui-product-card", "#f6f6f6");
      document.documentElement.style.setProperty("--ui-slider-filter", "invert(0%) sepia(100%) saturate(0%) hue-rotate(13deg) brightness(95%) contrast(105%)");

      document.documentElement.style.setProperty("--ui-main", "#ffffff");
      document.documentElement.style.setProperty("--ui-main-text", "#000000");



}

function changeModes() {
  const inputDarkMode = document.querySelector("#dark-mode-toggle");

  inputDarkMode&&inputDarkMode.addEventListener("change", () => {
      if (inputDarkMode.checked) {

        if (getCookie("cookies") === "accepted") {
            setCookie("darkmode", "true", 7);
            cookiesDarkMode()
        }
        darkMode()

      }
      else {
        if (getCookie("cookies") === "accepted") {  // Fix: Check "accepted" instead of "not_accepted"
            setCookie("darkmode", "false", 7);
            cookiesDarkMode()
        }
        lightMode()

      }
  });
}


changeModes()
lightMode()
function cookiesDarkMode(){

  if(!getCookie("cookies")){
    lightMode()
  }
  else {

    if(getCookie("darkmode") === "false") {
        lightMode()
    }
    else if(getCookie("darkmode") === "true") {
        darkMode()
    }
  }



}


cookiesDarkMode()