<?php include("includes/header.php") ?>

<section class="contact-hero-banner">
    <div class="hero-container">



      <h1 class="category_header">Contact</h1>
      <img class="category_bg"src="imgs/contact/contact.jpg" alt="">

    </div>






</section>

<section class="contact-section">

    <div class="contact-section-container wrapper-extra">
        <h3 class="section-header">
            Let’s Start a Conversation
        </h3>
        <div class="container-form-contact">
            <div class="form-info-contact-container">
                <div class="details-account-col">
                    <h3>Support</h3>
                    <span>schools@edinburghcollege.ac.uk</span>
                </div>
                <div class="details-account-col">
                    <h3>Address</h3>
                    <span>24 Milton Rd E, Edinburgh EH15 2PQ</span>
                </div>
                <div class="details-account-col">
                    <h3>Phone number</h3>
                    <span>0131 669 4400</span>
                </div>
                <div class="map-contact">
                    <iframe class="iframe-map"src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2234.3195008059847!2d-3.101098923106368!3d55.943834073155536!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4887b9a7365fccff%3A0x52629bc613f4b94b!2sEdinburgh%20College!5e0!3m2!1spl!2suk!4v1740138654013!5m2!1spl!2suk"   style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

            </div>
            <div class="form-contact-container">
                <form action="contact.php?sendform" id="send-contact-form" method="POST">

                    <div class="details-account-col">
                        <label   for="first_name">Email </label>
                        <input class="form-control"  type="text" name="email">

                    </div>

                    <div class="details-account-col">
                        <label   for="first_name">First name </label>
                        <input class="form-control"  type="text" name="first_name">

                    </div>

                    <div class="details-account-col">
                        <label for="last_name">Last name </label>
                        <input class="form-control"  type="text" name="last_name">

                    </div>

                    <div class="details-account-col">
                        <label  for="address">Address </label>
                        <input class="form-control"  type="text" name="address">

                    </div>


                    <div class="details-account-col">
                        <label for="city">City</label>
                        <input class="form-control" type="text" name="city">
                    </div>
                    <div class="details-account-col">
                        <label  for="postal">Postal/ZIP code</label>
                        <input class="form-control" type="text" name="postal">
                    </div>


                    <div class="details-account-col">
                        <button type="submit" name="send-form-contact"class="button-custom send-contact-form">SEND</button>
                    </div>

                </div>

            </form>
            </div>
        </div>
    </div>
</section>






<?php include("includes/footer.php") ?>