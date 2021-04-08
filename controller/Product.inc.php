<?php
    class Product {
        public function __construct($name, $price, $quantity)
        {
            $this->name = $name;
            $this->price = $price;
            $this->quantity = $quantity;
        }

        public function getTotalPrice()
        {
            return $this->quantity * $this->price;
        }
    }
?>