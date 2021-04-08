<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel=stylesheet href="./public/css/style.css">
    <link rel="shortcut icon" href="#" type="image/x-icon">
</head>
<body>
    <header>
        <h1>Technos Prod</h1>
        <h2>Voici le résultat de votre commande</h2>
    </header>
    <main>
        <section>
            <h2>Votre commande du <?php echo $invoice->date ?></h2>
            <h3>Détail de votre commande:</h3>
            <p>Nombre de produits: <?php echo $invoice->getTotal() ?></p>
            <ul>
                <?php
                    foreach ($invoice->products as $product)
                        echo "<li>$product->quantity : ".ucfirst($product->name)."</li>";
                ?>
            </ul>
            <p>Le total de votre TVA est de : <?php echo $invoice->getTax() ?>€</p>
            <p>Le total de votre commande est de : <?php echo $invoice->getPriceTtc() ?>€</p>
            <p>Adresse : <?php echo $invoice->address ?></p>
        </section>
    </main>
</body>
</html>