<?php

 function component($productname,$productprice,$productimg,$productid)
 {
 	$element = '
 		<div class="col-md-3 col-sm-6 my-3 my-md-0">
			<form action="index.php" method="POST">
				<div class="card shadow">
					<div>
						<img src='.$productimg.' class="card-img-top img-fluid">
					</div>

					<div class="card-body">
						<h5 class="card-title text-capitalize">'.$productname.'</h5>
						<h6>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="far fa-star"></i>
						</h6>

						<h5>
							<small><s class="text-muted">$2290</s></small>
							<span class="price">$'.$productprice.'</span>	
						</h5>

						<button type="submit" class="btn btn-secondary my-4" name="add">Add to Cart
							<i class="fa fa-shopping-cart ml-2"></i>
						</button>

						<input type="hidden" name="product_id" value='.$productid.'>
						
						
					</div>
					
				</div>
				
			</form>
			
		</div>
	 ';
	 
	 echo $element;
 }


// cart function
function cartElement($productname,$productprice,$productimg,$productid){
	$element ='
		<form action="cart.php?action=remove&id= '.$productid.' " method="post" class="cart-items">
			<div class="border rounded">
				<div class="row bg-white">
					<div class="col-md-3"><br>
						<img src='.$productimg.' alt="" class="img-fluid">
					</div>
					<br>
					<div class="col-md-6">
						<h5 class="pt-2">'.$productname.'</h5>
						<br>
						<small class="text-secondary">Seller : Maureen Njeri</small><br>
						<h5 class="pt-2">$'.$productprice.'</h5>
						<br>
						<button type="submit" class="btn btn-warning">Save for Later</button>
						<button type="submit" class="btn btn-danger mx-3" name="remove">Remove</button>
					</div>
					<div class="col-md-3 py-5">
						<div>
							<button type="button" class="btn bg-secondary rounded-circle"><i class="fa fa-minus"></i></button>
							<input type="text" class="form-control w-25 d-inline" value="1"/>
							<button type="button" class="btn bg-secondary rounded-circle"><i class="fa fa-plus"></i></button>
						</div>
					</div>
				</div>
			</div>

		</form>
	';

	echo $element;

}

?>
