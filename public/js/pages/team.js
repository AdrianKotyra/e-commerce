function getTeamMemberInfo(){
    const TeamCarts = document.querySelectorAll(".team_cart");
    TeamCarts.forEach(teamCart=>{
        const crossCart = teamCart.querySelector(".team_cart_image_cross");
        const hiddenDesc = teamCart.querySelector(".team_cart_bio");
        const infoCart =  teamCart.querySelector(".team_cart_image_info");
        infoCart.addEventListener("click", ()=>{
            bodyMaskOn()
            crossCart.classList.add("active_team_hidden_info");
            teamCart.classList.add("active_team_cart");
            hiddenDesc.classList.add("active_team_hidden_info");


            crossCart.addEventListener("click", ()=>{
                bodyMaskOff()
                crossCart.classList.remove("active_team_hidden_info");
                teamCart.classList.remove("active_team_cart");
                hiddenDesc.classList.remove("active_team_hidden_info");

            })
        })


    })
}
getTeamMemberInfo()