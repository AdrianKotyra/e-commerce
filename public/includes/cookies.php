
<!-- <div class="cookies_trigger">
<img src="./imgs/icons/cookie-nobg.png" alt="">
</div> -->

<div class="cookies_container_main">
<div class="cookies_window ">
        <div class="container-cookies flex-row wrapper ">
            <div class="col text-cookies">
            We use cookies to improve your browsing experience, personalize content, analyze site traffic, and serve targeted ads. By clicking "Accept", you consent to our use of cookies.
            </div>
            <div class="col lex-row">
                <button class="button-custom accept-cookies">
                    Accept cookies
                </button>

            </div>
            <i class="fa-solid fa-xmark cross-cookies"></i>
        </div>

</div>

</div>

<!-- if cookies are created dont display cookies window again -->
<script>

    function getCookie(name) {
    let match = document.cookie.match(new RegExp("(^| )" + name + "=([^;]+)"));
    return match ? decodeURIComponent(match[2]) : null;
    }
    function check_status(){
    const inputDarkMode = document.querySelector(".cookies_container_main");
    if(getCookie("cookies")){
        inputDarkMode.style.display="none";
    }


}
check_status()


</script>