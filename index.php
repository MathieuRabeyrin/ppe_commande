<?php
    require_once("./controller/controller.inc.php");
    require_once("./controller/Product.inc.php");
    session_start();

    if (isset($_GET['action']) && $_GET['action'] == 'invoice') {
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
            invoicePage();
        else
            header("location: index.php");
    } else
        orderPage();
?>