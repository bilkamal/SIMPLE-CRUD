<?php 
    session_start();
    if(isset($_POST["productName"])){
        include 'connect.php';

        $productName = $_POST["productName"];
        $productDescription = $_POST["productDescription"];
        $productPrice = $_POST["productPrice"];
        $productImage = $_FILES["productImage"];

        $message        = "";

        if($productName==""){
            $message    = "Product Name must be filled!";
        }else if($productDescription==""){
            $message    = "Product Description must be filled!";
        }else if($productPrice==""){
            $message    = "Product Price must be filled!";
        }else if(!isset($productImage["tmp_name"]) || $productImage["tmp_name"]==""){
            $message    = "Product Image must be chosen!";
        }else{

            $filePath = "upload/".basename($productImage["name"]);
            move_uploaded_file($productImage["tmp_name"], $filePath);

            $connection->query("INSERT INTO product VALUES (null,'".$productName."','".$productDescription."','".$productPrice."','".$filePath."')");

            $message = "Successfully added new Product!";
        }

        $_SESSION["message"] = $message;
       

    }
    
    header("location:insert.php");
    exit();
    
    
?>