<?php

class Product {
    public $product_id;
    public $product_name;
    public $product_price;
    public $product_stock;
    public $product_description;

    // Constructor to initialize a product directly
    public function __construct($id = null) {
        if ($id) {
            $this->create_product($id);
        }
    }

    // Function to fetch product details from the database
    public function create_product($id) {
        if ($id) {
            global $database; // Assumes $database is a global variable handling DB connection

            $result = $database->query_array("SELECT * FROM products WHERE product_id = $id");

            while ($row = mysqli_fetch_array($result)) {
                $this->product_id = $row['product_id'];
                $this->product_name = $row['product_name'];
                $this->product_price = $row['product_price'];
                $this->product_stock = $row['product_stock'];
                $this->product_description = $row['product_description'];
            }
        }
    }

    // Function to return product price
    public function getPrice() {
        return $this->product_price;
    }

    // Function to return product stock availability
    public function getStock() {
        return $this->product_stock;
    }

    // Function to return product name
    public function getName() {
        return $this->product_name;
    }
}

?>
