<?php
    session_start();
    ob_start();
?>

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
            <td><a href='traitement.php?action=down-qtt&id=$index'> - </a>".$product['qtt']."<a href='traitement.php?action=up-qtt&id=$index'> + </a></td>
            <td>".number_format($product['total'], 2, ",", "&nbsp;")."&nbsp;€</td>
            <td><a href='traitement.php?action=delete&id=$index'>Supprimer</a></td>
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
<?php
    $content = ob_get_clean();

    require_once "template.php";
?>