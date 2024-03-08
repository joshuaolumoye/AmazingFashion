<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>amazing fashion house</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

    <?php
     required 'config.php';
     $sql = "SELECT * FROM product";
     $result = mysqli_query($conn, $sql);
    ?>
    <div class="container">
        <div class="row">
            <?php while($row = mysqli_fetch_array($result)) {?>
             <div class="col-lg-4 mt-3 mb-3">
                 <div class="card-deck">
                    <div class="card border-info p-2">
                     <img src="<?=$row['product_image']; ?>" class="card-img-top" height="320">
                     <h5 class="card-title">Product: <?=$row['product_name']; ?></h5>
                     <h3 class="card-title">Price: <?=number_format($row['product_price']); ?></h3>
                     <a href="order.php? id=<?=$row['id'];?>" class="btn btn-danger btn-block btn-lg">Buy now</a>
                    </div>
                 </div>
             </div>
           <?php } ?>
        </div>
    </div>
</body>
</html>