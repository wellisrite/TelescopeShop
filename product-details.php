<?php require_once('header.php');?>	
<?php require_once('process/products.php');
	$p=new products();
	$id=$_GET['pId'];
	$product=$p->getProduct($id);
?>
	<section>
	<form method="post" action="process/addtocart.php?pId=<?php echo $product['pId']; ?>">
		<div class="container">
			<div class="row">
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="images/products/<?php echo $product['image'];?>" class="img-responsive" alt="" />
							</div>
						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<h2><?php echo $product['pname'];?></h2>
								<p>Product ID: <?php echo $product['pId']; ?></p>
								<img src="images/product-details/rating.png" alt="" />
								<span>
									<span>$<?php echo $product['price'];?></span>
									<input type="submit" value="Add to Cart" name="">
								</span>
								<p><b>Availability:</b> 
								In Stock</p>
								<p><b>Condition:</b> New</p>
								<p><b>Description:</b><?php echo $product['description'];?></p>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
				</div>
			</div>
		</div>
	</form>
	</section>
<?php require_once('footer.php');?>