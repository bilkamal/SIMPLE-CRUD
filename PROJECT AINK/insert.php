<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Simple CRUD - Create</title>
</head>
<body>
    <h1>Create Product</h1>
    <form action="doAddProduct.php" method="post" enctype="multipart/form-data">
    <table>
        <tr>
          <td>Product Name</td>
          <td>:</td>
          <td><input type="text" name="productName"</td>
        </tr>
        <tr>
          <td>Product Description</td>
          <td>:</td>
          <td><textarea name="productDescription"></textarea></td>
        </tr>
        <tr>
          <td>Product Price</td>
          <td>:</td>
          <td><input type="number" name="productPrice"</td>
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