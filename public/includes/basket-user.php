<div class="basket-user">
    <div class="header-basket flex-row">
      <span><b>MY CART </b></span>
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
      <a href="check_out.php" class="checkout_basket">
        <button class="button-custom checkout-button-basket">
        Proceed to Checkout
        </button>
      </a>
      <a class="cart-link"href="cart.php">
        <button class="button-custom cart-button">
        Your Cart
        </button>
      </a>

    </div>
  </div>