
function animateOnScroll() {

    const elements = document.querySelectorAll('.animate-on-scroll');


    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {

            if (entry.isIntersecting) {

                entry.target.classList.add('animate-on-scroll-visible');

                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.4
    });


    elements.forEach(element => {
        observer.observe(element);
    });
}


animateOnScroll();