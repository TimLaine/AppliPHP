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
    <title>Ajout produit</title>
</head>
<body>
    <br>
    <div class="container">
        <div class="d-flex align-items-center col-lg-2 p-3 my-1 text-white bg-black rounded">
            <?php
                if(!isset($_SESSION['products']) || empty($_SESSION['products'])){
                    echo "Vous n'avez aucun produit.";
                }else{
                    $result = 0;
                    foreach($_SESSION['products'] as $index => $product){
                        $result = $result + $product['qtt'];
                    }
                    echo "Vous avez ".$result." produits.";
                }
            ?>
        </div>
    </div>
    <h1 class="row justify-content-md-center">Ajouter un produit</h1>
    <div class="container text-center">
        <form action="traitement.php" method="post" class="row row-cols-1">
            <div class="col">
                <label class="form-label">
                    Nom du produit :
                    <input type="text" name="name" class="form-control">
                </label>
            </div>
            <div class="col">
                <label class="form-label">
                    Prix du produit :
                    <input type="number" step="any" name="price" class="form-control">
                </label>
            </div>
            <div class="col">
                <label class="form-label">
                    Quantité désirée :
                    <input type="number" name="qtt" value="1" class="form-control">
                </label>
            </div>
            <div class="col">
                <input type="submit" name="submit" value="Ajouter le produit" class="btn btn-primary">
            </div>
        </form>
    </div>
    <br>
    <nav class="container text-center">
        <div class="">
            <a href="recap.php" class="btn btn-secondary">Récapitulatif</a>
        </div>
    </nav>
    <br>
    <div class="container text-center">
        <p>
            <?php echo $_SESSION['message'] ?>
        </p>
    </div>
</body>
</html>