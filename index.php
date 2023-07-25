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
    <nav>
        <a href="recap.php">Récapitulatif</a>
        </nav>
    <h1 class="row justify-content-md-center">Ajouter un produit</h1>
    <div class="row row-cols-1 text-center">
        <form action="traitement.php" method="post">
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
</body>
</html>