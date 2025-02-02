<div class="basket-user">
    <div class="header-basket flex-row">
      <span>MY CART</span>
      <div class="cross-basket">
        <i class="fa-solid fa-xmark"></i>
      </div>

    </div>


    <div class="body-basket">


    </div>

    <div class="footer-basket">

      <div class="price-basket flex-row">
        <h5>Total</h5>
        <h5>£<span class="basket_total"><?php echo $basket->getTotal();?></span></h5>
      </div>
      <button class="button-custom">
      Proceed to Checkout
      </button>
      <a class="cart-link"href="cart.php">
        <button class="button-custom cart-button">
        Your Cart
        </button>
      </a>

    </div>
  </div>