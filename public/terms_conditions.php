<?php include("includes/header.php") ?>

<section class="contact-hero-banner">
    <div class="hero-container">



      <h1 class="category_header"> Terms & Conditions</h1>
      <img class="category_bg"src="imgs/terms_conditions/img1.jpg" alt="">

    </div>






</section>

<section class="terms-section">

    <div class="terms-section-container wrapper-extra">
    <main>
        <article class="terms-container">



        </article>


    </main>

    </div>
</div>


<script>
   //   fetch json terms

   fetch('./json/terms_conditions/terms_conditions.json')
  .then(response => response.json())
  .then(data => {
    const termsContainer = document.querySelector(".terms-container");
    termsContainer.innerHTML = data.terms;
  })
  .catch(error => {
    console.error('Error loading terms:', error)
    termsContainer.innerHTML = "fail fetching data";
  })

</script>





</div>
</section>






<?php include("includes/footer.php") ?>