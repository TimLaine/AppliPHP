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
        $id = $_GET['id'];
        switch($_GET['action']){
            case "add": ;
            break;
            case "clear": unset($_SESSION['products']);
            break;
            case "delete": 
                foreach($_SESSION['products'] as $index => $product){
                    if($index == $id){
                        unset($_SESSION['products']["$index"]);
                    }
                };
            break;
            case "up-qtt": 
                foreach($_SESSION['products'] as $index => $product){
                    if($index == $id){
                        $_SESSION['products'][$id]['qtt']++;
                        $_SESSION['products'][$id]['total'] = $_SESSION['products'][$id]['price']*$_SESSION['products'][$id]['qtt'];
                        if($_SESSION['products'][$id]['qtt'] <= 0 ){
                            unset($_SESSION['products']["$index"]);
                        }
                    }
                };
                break;
                case "down-qtt": 
                    foreach($_SESSION['products'] as $index => $product){
                        if($index == $id){
                            $_SESSION['products'][$id]['qtt']--;
                            $_SESSION['products'][$id]['total'] = $_SESSION['products'][$id]['price']*$_SESSION['products'][$id]['qtt'];
                            if($_SESSION['products'][$id]['qtt'] <= 0 ){
                                unset($_SESSION['products']["$index"]);
                            }
                    };
                }
            break;
        }
    }
    header("Location:recap.php");
    // header("Location:index.php");

