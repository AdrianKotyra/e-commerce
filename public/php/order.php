<?php

class Order {

    public $order_id;
    public $transaction_id;
    public $transaction_status;
    public $transaction_amount;
    public $transaction_currency;
    public $transaction_time;

    public $payer_name;
    public $payer_email;
    public $payer_id;
    public $payer_phone;
    public $payer_country;

    public $shipping_street;
    public $shipping_city;
    public $shipping_state;
    public $shipping_postal_code;
    public $shipping_country;

    public $delivery_option;
    public $discount_applied;



    public function order_info_by_user_id($user_id) {
        global $database;
        global $user;

        $result= $database->query_array("SELECT * FROM orders where user_db_id = $user_id");
        // get transcation info
        while($row = mysqli_fetch_array($result)) {
            $this-> order_id = $row['id'];
            $this-> transaction_id = $row['transaction_id'];
            $this-> transaction_status = $row['transaction_status'];
            $this-> transaction_amount = $row['transaction_amount'];
            $this-> transaction_currency = $row['transaction_currency'];
            $this-> transaction_time = $row['transaction_time'];

            $this-> payer_name = $row['payer_name'];
            $this-> payer_email = $row['payer_email'];
            $this-> payer_id = $row['payer_id'];
            $this-> payer_phone = $row['payer_phone'];
            $this-> payer_country = $row['payer_country'];

            $this-> shipping_street = $row['shipping_street'];
            $this-> shipping_city = $row['shipping_city'];
            $this-> shipping_state = $row['shipping_state'];
            $this-> shipping_postal_code = $row['shipping_postal_code'];
            $this-> shipping_country = $row['shipping_country'];
            $this-> delivery_option = $row['delivery_option'];
            $this-> discount_applied = $row['discount_applied'];

        }

    }
    public function order_info_by_order_id($order_id) {
        global $database;
        global $user;

        $result= $database->query_array("SELECT * FROM orders where id = $order_id");
        // get transcation info
        while($row = mysqli_fetch_array($result)) {
            $this-> order_id = $row['id'];
            $this-> transaction_id = $row['transaction_id'];
            $this-> transaction_status = $row['transaction_status'];
            $this-> transaction_amount = $row['transaction_amount'];
            $this-> transaction_currency = $row['transaction_currency'];
            $this-> transaction_time = $row['transaction_time'];

            $this-> payer_name = $row['payer_name'];
            $this-> payer_email = $row['payer_email'];
            $this-> payer_id = $row['payer_id'];
            $this-> payer_phone = $row['payer_phone'];
            $this-> payer_country = $row['payer_country'];

            $this-> shipping_street = $row['shipping_street'];
            $this-> shipping_city = $row['shipping_city'];
            $this-> shipping_state = $row['shipping_state'];
            $this-> shipping_postal_code = $row['shipping_postal_code'];
            $this-> shipping_country = $row['shipping_country'];
            $this-> delivery_option = $row['delivery_option'];
            $this-> discount_applied = $row['discount_applied'];
        }

    }


    public function get_user_order_cart($order_id) {
        global $database;
        $products_container = '';
        $delivery_price = $this->delivery_option == "standard"? 4.99 : 7.99;
        $discount_applied_msg = $this-> discount_applied == true? "Discount applied for purchases for over £150 (-15%)" : "";
        $result_product= $database->query_array("SELECT * FROM order_items where order_id = $order_id");
        while($row = mysqli_fetch_array($result_product)) {
            $product_id = htmlspecialchars($row["product_id"]);
            $product_order = new Product();
            $product_order->create_product($product_id);

            $product_name = htmlspecialchars($product_order->product_name);
            $product_img = htmlspecialchars($product_order->product_img);
            $product_price = htmlspecialchars($row["price"]);
            $product_size= htmlspecialchars($row["size"]);
            $product_quantity = htmlspecialchars($row["quantity"]);

            $products_container .= '
                <div class="img_order_col flex-col">
                    <span class="quantity_product_cart"> ' . $product_quantity . '</span>
                    <img src="./imgs/products/' . $product_name . '/' . $product_img . '" alt="' . $product_name . '" />
                    <span >' . $product_name . '</span>
                    <span > size: ' . $product_size . '</span>
                    <span > price: ' . $product_price .' '.htmlspecialchars($this->transaction_currency).'</span>

                </div>';
        }

        // Build the order template
        $order_user_template = '
        <div class="product_order_user_cart flex-col">
          <span class="orders_account_date">' . htmlspecialchars($this->transaction_time) . '</span>
            <div class="info_order_col flex-col">
               <span class="text-center"> <b>Order Number: <br>' . htmlspecialchars($this->transaction_id) . '</b></span>

                <p>Delivery address</p>
                <span>' . htmlspecialchars($this->payer_name) . '</span>
                <span>' . htmlspecialchars($this->shipping_city) . '</span>
                <span>' . htmlspecialchars($this->shipping_street) . '</span>
                <span>' . htmlspecialchars($this->shipping_state) . '</span>
                <span>' . htmlspecialchars($this->shipping_postal_code) . '</span>
                <span>' . htmlspecialchars($this->shipping_country) . '</span>
                <br>

            <div>
            <p>Delivery Option: <b>'. htmlspecialchars($this->delivery_option) .'</b></p>
            <p>Delivery Price: <b>'. htmlspecialchars( $delivery_price).' '.htmlspecialchars($this->transaction_currency). '</b></p>
           <p>'.$discount_applied_msg.'</p>
            <b>Total: <span>' . htmlspecialchars($this->transaction_amount) .' '.htmlspecialchars($this->transaction_currency) .'</span></b>
            </div>

            </div>



            <div class="products_orders_container">

                ' . $products_container . '
            </div>

        </div>';

        return $order_user_template;
    }
}

?>
