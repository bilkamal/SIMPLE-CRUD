<?php

use phpDocumentor\Reflection\Location;

session_start();

    if(!isset($_GET["id"])){
	    header("location:view.php");
	    exit();
    }

    include 'connect.php';

    $id = $_GET["id"];

    $getData = $connection->query("SELECT * FROM product WHERE productID = ".$id);

    if($getData->num_rows==0){
	    header("Location:view.php");
	    exit();
    }

    $getData = $getData->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Simple CRUD - Update</title>
</head>
<body>
    <h1>Update Product</h1>
    <form action="doUpdateProduct.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?=$_GET["id"]?>">
    <table>
        <tr>
          <td>Product Name</td>
          <td>:</td>
          <td><input type="text" name="productName" value="<?=$getData["productName"]?>"</td>
        </tr>
        <tr>
          <td>Product Description</td>
          <td>:</td>
          <td><textarea name="productDescription"><?=$getData["productDescription"]?></textarea></td>
        </tr>
        <tr>
          <td>Product Price</td>
          <td>:</td>
          <td><input type="number" name="productPrice" value="<?=$getData["productPrice"]?>"</td>
        </tr>
        <tr>
          <td>Product Image</td>
          <td>:</td>
          <td><input type="file" name="productImage"</td>
        </tr>
        <tr>
          <td>Product Name</td>
          <td></td>
          <td><button>Save Product</button></td>
        </tr>
    </table>
    </form>
    <?php
        if(isset($_SESSION["message"])){
	        echo $_SESSION["message"];
	        unset($_SESSION["message"]);
        }
    ?>	
</body>
</html>