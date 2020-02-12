<?php

// start session
session_start();

require_once ('include/db.php');
require_once ('include/component.php');
require_once ('include/header.php');

// instantiate class
$database = new CreateDb();

// to generate session product id from the database once you click the button:
if (isset($_POST["add"])) {

	if (isset($_SESSION["cart"])) {

		// 'array_column()' function returns values from a single column in the array
		// here, we are checking to see if the id of an an item exists in the product_id column
		$item_array_id = array_column($_SESSION["cart"],"product_id");

		// the 'in_array()' function checks to see if a value exists in an array
		// if the product is already in the session variable, execute the echo statement below
		if (in_array($_POST["product_id"], $item_array_id)) {
			
			echo "<script>alert('product already added to cart!')</script>";
			// to take you back to the home page:
			echo "<script>window.location ='index.php'</script>";
		} else{
			// if product is not in the session variable, we need to add it, therefore we'll use the 'count' function to get the total number of items in the session variable 'cart', i.e.
			$count = count($_SESSION["cart"]);
			$item_array = array(
				"product_id" => $_POST["product_id"] 
			);

			$_SESSION["cart"][$count] = $item_array;
			print_r($_SESSION["cart"]);

		}
		
	} else{
		
		$item_array = array(
			"product_id" => $_POST["product_id"]
		);
		
		// create session variable
		$_SESSION["cart"][0] = $item_array;
		print_r($_SESSION["cart"]);
	}

}

?>

<!DOCTYPE html>
<html>
<head>
<title>Shop with Me</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<!-- stylesheets -->
<link rel="shortcut icon" type="image/jpg" href="img/favicon.jpg">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/mdb.min.css">
<link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="container">
	<div class="row text-center py-5">

	<?php
		$result = $database->getData();

		// to get data from the database and display it on the index page:
		// mysqli_fetch_assoc is used to fetch the result row as an associative array
		while ($row = mysqli_fetch_assoc($result)) {
			// using the 'component' function
			component(
				$row['product_name'],
				$row['product_price'],
				$row['product_img'],
				$row['id']
			);
		}

	?>
	</div>
	
</div>

<!-- script tags -->
<script type="text/javascript" src="js/jquery-3.4.0.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/popper.min.js"></script>
<script type="text/javascript" src="script.js"></script>

</body>
</html>