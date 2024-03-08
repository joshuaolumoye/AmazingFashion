<?php
require 'config.php';
$msg="";
if(isset($_POST['submit'])){
   $p_name=$_POST['pName'];
   $p_price=$_POST['pPrice'];

   $terget_dir ="image";
   $target_file = $target_dir.basename($_FILES['pImage']["name"]);
   move_uploaded_file($_FILES['pImage']['tmp_name'],$target_file);

   $sql ="INSERT INTO product (product_name, product_price, product_image)VALUES('$p_name','$p_price','$target_file')";

   if(mysqli_query ($conn,$sql)){
      $msg ="product added to the database successfully !";
   }
   else{
      $msg ="failed to add product to the database !";
   }
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Amazing fashion house</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
   <div class="bg-info">
       <div class="container">
         <div class="row justify-content-center">
         <div class="col-md-6 bg-light mt-5 rounded">
            <h2 class="text-center p-2">Add product information</h2>
 <form action="" method="post" enctype="multipart/form-data" id="form-box">
         <div class="form-group pb-3">
            <input type="text" name="pName" class="form-control" placeholder="product name" required>
         </div>
         <div class="form-group pb-3">
            <input type="text" name="pPrice" class="form-control" placeholder="product price" required>
         </div>
         <div class="form-group">
            <div class="custom-file pb-3">
                <input type="file" name="pImage" class="custom-file-input" required>
            <label for="customFile" class="custom-file-label">choose product image</label>
            </div>
         </div>
         <div class="form-group">
            <input type="submit" name="submit" class="btn btn-danger btn-block" value="add" required>
         </div>
         <div class="form-group">
            <h4 class="text-center"><?=$msg; ?></h4>
         </div>
       </form>
       <div class="row justify-content-center">
        <div class="col-md-6 m-4 bg-light rounded">
            <a href="index.php" class="btn btn-warning btn-block btn-lg">Go to product page</a>
        </div>
       </div>
         </div>
         </div>
      
    </div>
   </div>
   
</body>
</html>