<?php
require 'config.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT * FROM product WHERE id='$id'";
    $result = mysqli_query ($conn, $sql);
    $row = mysqli_fetch_array($result);

    $pName = $row['product_name'];
    $pPrice = $row['product_price'];
    $del_charge = 50;
    $total_price = $pPrice + $del_charge;
    $pImage = $row ['product_image'];
}
else{
    $notFound ="no product found";
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>order page</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    
    <div class="container">
        <div class="row justify-content-center">
         <div class="col-md-10 mb-5">
          <h2 class="text-center p-2 text-primary">fill the details to complete your order</h2>
          <h2 class="text-center p-2 text-danger"><?=$notFound; ?></h2>
          <h3>Product details:</h3>
          <table class="table table-bordered" width="500px">
           <tr>
            <th>product name:</th>
            <td><?=$pName; ?></td>
            <td rowspan="4" class="text-center"><img src="<?=$pImage; ?>" width="200"></td>
           </tr>
           <tr>
            <th>product price:</th>
            <td>N<?=number_format($pPrice); ?></td>
           </tr>
           <tr>
            <th>delievery charge:</th>
            <td>>N<?=number_format($del_charge); ?></td>
           </tr>
           <tr>
            <th>total price:</th>
            <td>>N<?=number_format($total_price); ?></td>
           </tr>
          </table>
          <h4>Enter your details:</h4>
         </div>
         <form action="pay.php" method="post" accecpt-chorset="utf-8">
            <input type="hidden" name="product_name" value="<?=$pName;?>">
            <input type="hidden" name="product_price" value="<?=$pPrice;?>">
            <div class="form-group">
             <input type="text" name="name" class="form-control" placeholder="Enter your name" required>
            </div>
            <div class="form-group">
             <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
            </div>
            <div class="form-group">
             <input type="tell" name="phone" class="form-control" placeholder="Enter your phone number" required>
            </div>
            <div class="form-group">
             <input type="submit" name="submit" class="btn btn-danger btn-lg" value="click to pay: N <?=number_format($total_price); ?>">
            </div>
         </form>
        </div>
    </div>
    
</body>
</html>