
// ----------------intersection to display text animated----------------------




function intersection(element, trigger, animationCss){
    const ObsCallback = function(entries) {
        const [entry] = entries
        if(entry.isIntersecting===true ) {


            element.style.animation = animationCss;

        }

    }
    const ObsOptions = {
        root:null,
        threshold: 0,
        rootMargin: '-10px'


    }


    const observer = new IntersectionObserver(ObsCallback, ObsOptions)
    observer.observe(trigger)
}

// even col 1 animation
const ObsCallback = function(entries) {
	const [entry] = entries
	if(entry.isIntersecting===true ) {
		const progressAnim  = document.querySelector(".event_col_1")

		progressAnim.style.animation = "evenCol1 3s forwards";

    }

}
const ObsOptions = {
    root:null,
    threshold: 0,
    rootMargin: '-10px'


}
// invoke animation for col 3
const event_col_1_img  = document.querySelector(".event_col_1_img")
const eventCol_1  = document.querySelector(".event_col_1")
const triggerCol_1 = document.querySelector(".trigger_col_1");
intersection(eventCol_1, triggerCol_1, "eventCol1 3s forwards")
intersection(event_col_1_img, triggerCol_1, "eventCol2 3s forwards")


// invoke animation for col 2
const event_col_2_img  = document.querySelector(".event_col_2_img")
const eventCol_2  = document.querySelector(".event_col_2")
const triggerCol_2 = document.querySelector(".trigger_col_2");
intersection(eventCol_2, triggerCol_2, "eventCol2 3s forwards")
intersection(event_col_2_img, triggerCol_2, "eventCol1 3s forwards")



// invoke animation for col 1
const event_col_3_img  = document.querySelector(".event_col_3_img")
const eventCol_3  = document.querySelector(".event_col_3")
const triggerCol_3 = document.querySelector(".trigger_col_3");

intersection(eventCol_3,  triggerCol_3, "eventCol2 3s forwards")
intersection(event_col_3_img,  triggerCol_3, "eventCol1 3s forwards")