<?php

// create session
session_start();

require_once ('include/db.php');
require_once ('include/header.php');
require_once ('include/component.php');

// instantiate db class
$database = new CreateDb();

if (isset($_POST['remove'])) {
    if($_GET['action'] == 'remove')
    foreach ($_SESSION['cart'] as $key => $value) {
        if ($value['product_id'] == $_GET['id']) {
            unset($_SESSION['cart'][$key]);
            echo "<script>alert('Product has been removed!')</script>";
            echo "<script>window.location='cart.php'</script>";

        }
    }
    

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<!-- stylesheets -->
<link rel="shortcut icon" type="image/jpg" href="img/favicon.jpg">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<!-- <link rel="stylesheet" type="text/css" href="css/mdb.min.css"> -->
<link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
<link rel="stylesheet" type="text/css" href="style.css">
<title>Cart</title>
</head>

<body class="bg-light">

<div class="container-fluid">
    <div class="row px-5">
        <div class="col-md-7">
            <div class="shopping-cart">
                <br>
                <h6>My Cart</h6>
                <hr>

                <?php

                $total = 0;

                if (isset($_SESSION['cart'])) {
                    $product_id = array_column($_SESSION['cart'], 'product_id');

                    $result = $database->getData();
    
                    while ($row = mysqli_fetch_assoc($result)) {
                        foreach ($product_id as $id) {
                            if ($row['id'] == $id) {
                                cartElement($row['product_name'], $row['product_price'], $row['product_img'], $row['id']);

                                $total = $total + (int)$row['product_price'];
                            }
                        }
                    }
                } else{
                    echo "<h6>Cart is empty</h6>";
                }

                ?>
            </div>
        </div>
        <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">
            <div class="pt-4">
                <h6 class="text-capitalize">price details</h6>
                <hr>
                <div class="row price-details">
                    <div class="col-md-6">
                        <?php

                        if (isset($_SESSION["cart"])) {
                            $count = count($_SESSION['cart']);
                            echo "<h6>Price($count items)</h6>";
                        } else{
                            echo "<h6>Price(0 items)</h6>";
                        }
                        ?>
                        <br>
                        <h6>Delivery Charges</h6>
                       
                        <hr>
                        
                        <h6>Amount Payable</h6>
                    </div>
                    <div class="col-md-6">
                        
                        <h6>$<?php echo $total; ?></h6>
                        <br>
                        <h6 class="text-success">FREE</h6>
                        <hr>
                        
                        <h6>$<?php echo $total; ?></h6>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>

<!-- script tags -->
<script type="text/javascript" src="js/jquery-3.4.0.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/popper.min.js"></script>
<script type="text/javascript" src="script.js"></script>

</body>
</html>