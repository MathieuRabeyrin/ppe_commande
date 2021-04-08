<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="technos prod commande">
  <title>Technos Prod</title>
  <link rel="stylesheet" href="./public/css/style.css">
  <link rel="shortcut icon" href="#" type="image/x-icon">
</head>
<body>
  <header>
    <h1>Technos Prod</h1>
    <h2>Formulaire de commande</h2>
  </header>
<main>
  <?php
    if (isset($_SESSION['error']))
      echo "<p class='error'>".$_SESSION['error']."</p>";
  ?>
  <form action="?action=invoice" method="POST">
    <table>
      <thead>
        <tr>
          <th>Produits</th>
          <th>Quantité</th>
        </tr>
      </thead>
      <?php
        $first = TRUE;

        foreach ($_SESSION['products'] as $product) {
          echo "<tr>
                  <td><label for=$product->name>".ucfirst($product->name)."</label></td>
                  <td>
                  <input type='number' min='0' max='10' name=$product->name id=$product->name placeholder='0' value=$product->quantity ". ($first ? "autofocus": "") ." >
                  </td>
                </tr>";
          $first = FALSE;
        }
      ?>
      <tr>
        <td><label for="adresse">Adresse</label></td>
        <td><input type="text" name="address" id="adresse" placeholder="Adresse" value="<?php echo isset($_SESSION['address']) ? $_SESSION['address'] : "" ?>" ></td>
      </tr>
      <tfoot>
        <tr>
          <td colspan=2><input type=submit value="Envoyer la commande"></td>
        </tr>
    </tfoot>
    </table>
  </form>  
</main>
</body>
</html>