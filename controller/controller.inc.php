<?php
    function setProducts() {
        $products = array();
        $file = fopen("./controller/ProductDict.csv", 'r');

        while (!feof($file)) {
            $row = fgetcsv($file, 1024);
            array_push($products, new Product($row[0], $row[1], 0));
        }
        return $products;
    }

    function setValue() {
        require_once("./controller/Form.inc.php");

        $products = array_slice($_POST, 0, count($_POST) - 1);
        $form = new Form($products, $_POST['address']);
        return $form->isValid();
    }

    function orderPage() {
        if (!isset($_SESSION['products']))
            $_SESSION['products'] = setProducts();
        require_once "./views/orderform.php";
    }

    function invoicePage() {
        if (setValue()) {
            require_once "./controller/Invoice.inc.php";
            $invoice = new Invoice($_SESSION['products'], $_SESSION['address']);
            session_destroy();
            require_once "./views/processorder.php";
        } else {
            require_once "./views/orderform.php";
        }
    }
?>