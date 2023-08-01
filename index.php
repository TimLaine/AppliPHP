<?php
    session_start();
    ob_start();
?>
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
        <form action="traitement.php" method="post" class="row row-cols-1" enctype="multipart/form-data">
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
                <label for="file" class="form-label">Image
                    <input type="file" name="file">
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
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
            <?php
            $_SESSION['page'] = "index";
            if (isset($_SESSION['message'])) {
                echo $_SESSION['message'];
            } else{
                echo "Vous pouvez ajouter vos produits.";
            }
            ?>
        </p>
    </div>
    <?php
        $content = ob_get_clean();
        $titre = "Ajout produits";
        require_once "template.php";
    ?>