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


        }

    }


    public function get_user_order_cart($order_id) {
        global $database;
        $products_container = '';
        $result_product= $database->query_array("SELECT * FROM order_items where order_id = $order_id");
        while($row = mysqli_fetch_array($result_product)) {
            $product_id = htmlspecialchars($row["product_id"]);
            $product_order = new Product();
            $product_order->create_product($product_id);

            $product_name = htmlspecialchars($product_order->product_name);
            $product_img = htmlspecialchars($product_order->product_img);
            $product_price = htmlspecialchars($row["price"]);
            $product_size= htmlspecialchars($row["size"]);


            $products_container .= '
                <div class="img_order_col flex-col">

                    <img src="./imgs/products/' . $product_name . '/' . $product_img . '" alt="' . $product_name . '" />
                       <span >' . $product_name . '</span>
                        <span > size: ' . $product_size . '</span>
                        <span > ' . $product_price . '£</span>
                </div>';
        }

        // Build the order template
        $order_user_template = '
        <div class="product_order_user_cart flex-col">
            <div class="info_order_col flex-col">
               <span class="text-center"> <b>Order Number: ' . htmlspecialchars($this->order_id) . '</b></span>
                <p>Delivery address</p>
                <span>' . htmlspecialchars($this->payer_name) . '</span>
                <span>' . htmlspecialchars($this->shipping_city) . '</span>
                <span>' . htmlspecialchars($this->shipping_street) . '</span>
                <span>' . htmlspecialchars($this->shipping_state) . '</span>
                <span>' . htmlspecialchars($this->shipping_postal_code) . '</span>
                <span>' . htmlspecialchars($this->shipping_country) . '</span>
                <br>
                <span>Transaction status:<br>' . htmlspecialchars($this->transaction_status) . '</span>
                <br>
                 <div>
            <b>Total: <span>' . htmlspecialchars($this->transaction_amount) .htmlspecialchars($this->transaction_currency) .'</span></b>
            </div>
                <a href="account.php?show=orders&order=' . htmlspecialchars($this->order_id) . '">View full order details</a>
            </div>



            <div class="products_orders_container">

                ' . $products_container . '
            </div>

        </div>';

        return $order_user_template;
    }
}

?>
