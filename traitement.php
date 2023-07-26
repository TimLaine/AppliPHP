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
        switch($_GET['action']){
            case "add": ;
            break;
            case "clear": $_SESSION['products'] = [];
            break;
            case "delete": var_dump("delete");
            break;
            case "up-qtt": var_dump("up-qtt");
            break;
            case "down-qtt": var_dump("down-qtt");
            break;
        }
    }
    header("Location:recap.php");
    // header("Location:index.php");

