<?php
    class Invoice {
        public function __construct($products, $address)
        {
            $this->date = date("d/m/Y, H:i");
            $this->products = $products;
            $this->address = $address;
        }

        public function getTotal()
        {
            $total = 0;

            foreach($this->products as $product)
                $total += $product->quantity;
            return $total;
        }

        public function getPriceHt()
        {
            $price = 0;

            foreach($this->products as $product)
                $price += $product->getTotalPrice();
            return $price;
        }

        public function getTax()
        {
            return number_format($this->getPriceHt() * 0.2, 2, ".", "");
        }

        public function getPriceTtc()
        {

            return number_format($this->getTax() + $this->getPriceHt(), 2, ".", "");
        }
    }

?>