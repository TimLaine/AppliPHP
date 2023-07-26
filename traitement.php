<?php
    session_start();

    if(isset($_POST['submit'])){
        
        $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
        $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT);

        if($name && $price && $qtt){
    
            $product = [
                "name" => $name,
                "price" => $price,
                "qtt" => $qtt,
                "total" => $price*$qtt
            ];
    
            $_SESSION['products'][] = $product;
            $_SESSION['message'] = "Produit bien ajouté.";
        } else{
            $_SESSION['message'] = "Veuillez ajouter un produit valide.";
        }
    }
    if(isset($_GET['action'])){
        var_dump("test1");
        echo "test";
        switch($_GET['action']){
            case "add":
            case "delete": var_dump("test2");
            case "clear":
            case "up-qtt":
            case "down-qtt":
        }
    }
    header("Location:recap.php");
    header("Location:index.php");

