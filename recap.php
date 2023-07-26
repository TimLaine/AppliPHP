<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <title>Récapitulatif des produits</title>
</head>
<body>
    <?php if(!isset($_SESSION['products']) || empty($_SESSION['products'])){
        echo "<p>Aucun produit en session...</p>";
    }
    else{
        echo "<table class='table'>
        <thead>
        <tr>
        <th scope='col'>#</th>
        <th scope='col'>Nom</th>
        <th scope='col'>Prix</th>
        <th scope='col'>Quantité</th>
        <th scope='col'>Total</th>
        <th scope='col'></th>
        </tr>
        </thead>
        <tbody>";
        $totalGeneral = 0;
        foreach($_SESSION['products'] as $index => $product){
            echo "<tr>
            <td scope='row'>".$index + 1 ."</td>
            <td>".$product['name']."</td>
            <td>".number_format($product['price'], 2, ",", "&nbsp;")."&nbsp;€</td>
            <td><a href='traitement.php?action=down-qtt'> - </a>".$product['qtt']."<a href='traitement.php?action=up-qtt'> + </a></td>
            <td>".number_format($product['total'], 2, ",", "&nbsp;")."&nbsp;€</td>
            <td><a href='traitement.php?action=delete'>Supprimer</a></td>
            </tr>";
            $totalGeneral += $product['total'];
        }
        echo "  <tr>
        <td colspan=4 scope='row'>Total général : </td>
        <td><strong>".number_format($totalGeneral, 2, ",", "&nbsp;")."&nbsp;€</strong></td>
        <td></td>
        </tr>
        </tbody>
        </table>";
    }
    
    ?>
    <nav class="container text-center">
        <a href="index.php" class="btn col-lg-2 btn-primary">Main</a>
        <a href="traitement.php?action=clear" class="btn col-lg-2 btn-primary">Tout supprimer</a>
        </nav>
</body>
</html>