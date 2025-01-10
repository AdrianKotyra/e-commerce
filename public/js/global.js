// ----------------BFOR HORIZONTAL SCROLLING AND VERTICAL ---------------

function verticalScrollActive() {
    const containers = document.querySelectorAll('.vetical-scroll-grab-class');

    containers.forEach(container => {
      let startY;
      let startX;
      let scrollLeft;
      let scrollTop;
      let isDown = false;

      container.addEventListener('mousedown', (e) => mouseIsDown(e));
      container.addEventListener('mouseup', (e) => mouseUp(e));
      container.addEventListener('mouseleave', (e) => mouseLeave(e));
      container.addEventListener('mousemove', (e) => mouseMove(e));

      function mouseIsDown(e) {
        isDown = true;
        startY = e.pageY - container.offsetTop;
        startX = e.pageX - container.offsetLeft;
        scrollLeft = container.scrollLeft;
        scrollTop = container.scrollTop;
      }

      function mouseUp(e) {
        isDown = false;
      }

      function mouseLeave(e) {
        isDown = false;
      }

      function mouseMove(e) {
        if (isDown) {
          e.preventDefault();
          const y = e.pageY - container.offsetTop;
          const walkY = y - startY;
          container.scrollTop = scrollTop - walkY;

          const x = e.pageX - container.offsetLeft;
          const walkX = x - startX;
          container.scrollLeft = scrollLeft - walkX;
        }
      }
    });
  }

  function calculateUserAge() {
    const birthdateInput = document.querySelector('.reg_user_date').value;
    if (birthdateInput) {
      const birthDate = new Date(birthdateInput);
      const today = new Date();
      let age = today.getFullYear() - birthDate.getFullYear();
      return age;
    }
  }
  verticalScrollActive()


// -------------slider_hero functiin------------------

// Enregistrement du plugin Observer de GSAP pour écouter les événements de défilement, de toucher, et de pointeur
gsap.registerPlugin(Observer);

// Sélection des éléments HTML nécessaires pour l'animation
let itemsCars = document.querySelectorAll(".item_car"),  // Liste de tous les éléments de voiture
    backgrounds = document.querySelectorAll(".image_bg"),  // Liste des fonds d'écran associés
    itemsWrap = gsap.utils.toArray(".item_wrap"),  // Liste des éléments de l'enveloppe
    itemsInner = gsap.utils.toArray(".item_inner"),  // Liste des éléments internes à animer
    listImages = gsap.utils.toArray(".list_image"),  // Liste des images dans les items
    titleHeading = gsap.utils.toArray(".content h2"),  // Liste des titres h2 à animer
    isAnimate,  // Variable pour vérifier si une animation est en cours
    wrapIndexCheck = gsap.utils.wrap(0, itemsCars.length),  // Fonction pour s'assurer que l'index reste dans les limites
    currentIndex = -1;  // Index de l'élément actuellement affiché

// Séparation des titres en mots et caractères à l'aide de la bibliothèque SplitType
let titleSplit = titleHeading.map(
  title => new SplitType(title, {
    types: 'words, chars',  // Découpe en mots et en caractères
    wordClass: 'split-word',  // Classe CSS pour les mots
    charClass: 'split-char'   // Classe CSS pour les caractères
  })
);

// Fonction d'animation pour afficher les éléments avec un effet de glissement
function slideIn(index, direction = 1) {
  if (isAnimate) return; // Éviter les animations simultanées
  isAnimate = true;  // Marque le début de l'animation
  index = wrapIndexCheck(index);  // Utilise wrapIndexCheck pour s'assurer que l'index est valide

  // Création d'une timeline GSAP pour enchaîner les animations
  let tlSlideIn = gsap.timeline({
    defaults: { duration: 1, ease: "power1.inOut" },  // Durée et easing par défaut pour les animations
  });

  // Si un élément est actuellement affiché (currentIndex >= 0), on l'efface
  if (currentIndex >= 0) {
    gsap.set(itemsCars[currentIndex], { zIndex: 0 });  // Définit le zIndex de l'élément actuel à 0 (derrière)
    tlSlideIn.to(itemsInner[currentIndex], { autoAlpha: 0 });  // Fait disparaître l'élément actuel
  }

  // Mise à jour du zIndex pour l'élément courant et animation de son apparition
  gsap.set(itemsCars[index], { zIndex: 1 });  // Définit le zIndex de l'élément sélectionné à 1 (devant)
  tlSlideIn.to(itemsInner[index], { autoAlpha: 1 }, "<");  // Fait apparaître l'élément sélectionné avec un fondu
  tlSlideIn.addLabel('startTl', "<");  // Ajoute une étiquette de synchronisation à la timeline

  // Vérification de la largeur de la fenêtre pour décider de l'animation (x ou y)
  const isMobile = window.innerWidth < 992;  // Si la largeur de la fenêtre est inférieure à 992px, considérer comme mobile

  // Si l'écran est mobile (moins de 992px), utiliser yPercent pour l'animation verticale
  if (isMobile) {
    tlSlideIn.fromTo(listImages[index].querySelectorAll("img"), {
      yPercent: 130,  // Déplacer les images verticalement
      opacity: 0
    }, {
      yPercent: 0,  // Animation vers la position d'origine
      opacity: 1,
      stagger: 0.1,  // Ajouter un délai entre chaque image pour l'effet de décalage
      duration: 2,  // Durée de l'animation pour chaque image
      ease: "expo.inOut",  // Easing pour un mouvement fluide
      onComplete: function () {
        isAnimate = false;  // Marque la fin de l'animation
      }
    }, "<");
  } else {
    // Si l'écran est plus grand que 992px, utiliser xPercent pour l'animation horizontale
    tlSlideIn.fromTo(listImages[index].querySelectorAll("img"), {
      xPercent: 120,  // Déplacer les images horizontalement
    }, {
      xPercent: 0,  // Animation vers la position d'origine
      stagger: 0.1,  // Ajouter un délai entre chaque image pour l'effet de décalage
      duration: 2,  // Durée de l'animation pour chaque image
      ease: "expo.inOut",  // Easing pour un mouvement fluide
      onComplete: function () {
        isAnimate = false;  // Marque la fin de l'animation
      }
    }, "<");
  }

  // Animation de l'apparition des caractères dans le titre (typewriting effect)
  tlSlideIn.from(titleSplit[index].chars, {
    yPercent: 100,  // Déplacer les caractères de bas en haut
    opacity: 0,  // Rendre les caractères invisibles au départ
    stagger: {
      each: 0.03,  // Délais de 30ms entre chaque caractère
      from: 'start'  // Commencer à animer les caractères à partir du premier
    },
    ease: "expo.inOut",  // Easing pour un mouvement fluide
    duration: 1.5,  // Durée de l'animation des caractères
  }, "<");

  // Animation de l'échelle du fond d'écran (agrandissement lent)
  tlSlideIn.fromTo(backgrounds[index], { scale: 1 }, { scale: 1.3, duration: 3, ease: "expo.Out" }, "startTl");

  // Mise à jour de l'index actuel
  currentIndex = index;
}

// Fonction pour démarrer une boucle automatique
function startAutoSlide() {
  setInterval(() => {
    slideIn(currentIndex + 1, 1);
  }, 5000); // Change tous les 5 secondes (5000ms)
}

// Démarrer l'animation automatique
slideIn(0, 1); // Appel initial
startAutoSlide();


// --------------nav search-------------
function searchNav(){
  const searchInput = document.querySelector(".search-box-nav input");
  const searchTrigger = document.querySelector(".search-trigger");
  const searchBox = document.querySelector(".search-box-nav")
  searchTrigger? searchTrigger.addEventListener("click", ()=>{
    searchInput.classList.remove("inactive-search-bar")
    searchInput.classList.add("active-search-bar")
  }): null;

  // Add a click event listener to the document to handle clicks outside the active card
  document.addEventListener("click", (event) => {
    if (searchBox && !searchBox.contains(event.target)) {
       searchInput.classList.remove("active-search-bar")
       searchInput.classList.add("inactive-search-bar")
    } else {

    }

  })

}
searchNav()