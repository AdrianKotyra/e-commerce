
<!-- <div class="cookies_trigger">
<img src="./imgs/icons/cookie-nobg.png" alt="">
</div> -->

<div class="cookies_container_main">
<div class="cookies_window ">
        <div class="container-cookies wrapper ">
            <div class="col text-cookies">
            We use cookies to improve your browsing experience, personalize content, analyze site traffic, and serve targeted ads. By clicking "Accept", you consent to our use of cookies.
            </div>
            <div class="col flex-row">
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
    const cookiesWindow = document.querySelector(".cookies_window");
    if(getCookie("cookies")){
        cookiesWindow.classList.add("inactive_cookies");
    } else {
        cookiesWindow.classList.replace("inactive_cookies", "active_cookies");
    }


}
check_status()


</script>