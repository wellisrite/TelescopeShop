<?php require_once('header.php'); 
require_once('process/products.php');?>
<?php 
	$p=new products();
	$products=$p->getProducts();
	$categories=$p->getCategories();
 ?>
 <style type="text/css">
 	#notice{
 		color:red;
 	}
 </style>
	<section id="advertisement">
		<div class="container text-center">		
			<?php if(isset($_SESSION['notice'])) {
				echo "<p id=\"notice\">".$_SESSION['notice']."</p>";
				session_unset($_SESSION['notice']);
			}
			?>
			<img src="images/shop/advertisement.jpg" alt="" />
		</div>
	</section>

	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<?php foreach($categories as $i){?>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#"><?php echo $i['category']; ?></a></h4>
								</div>
							</div>
							<?php } ?>
						</div><!--/category-productsr-->
						<div class="shipping text-center"><!--shipping-->
							<img src="images/home/shipping.jpg" alt="" />
						</div><!--/shipping-->
						
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>
						<?php foreach($products as $i){?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="images/products/<?php echo $i['image'];?>" alt="<?php echo $i['pname']; ?>" width="300px" height="200px"/>
										<h2><?php echo "$".$i['price'];?></h2>
										<p><?php echo $i['pname'];?></p>
										<a href="process/addtocart.php?pId=<?php echo $i['pId']; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											<a href="product-details.php?pId=<?php echo $i['pId']; ?>" class="btn btn-default add-to-cart"><i class="fa fa-archive"></i>Product Detail</a>										
									</div>
									<div class="product-overlay">
										<div class="overlay-content">
											<h2>$<?php echo $i['price']; ?></h2>
											<p><?php echo $i['pname']; ?></p>
											<a href="process/addtocart.php?pId=<?php echo $i['pId']; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											<a href="product-details.php?pId=<?php echo $i['pId']; ?>" class="btn btn-default add-to-cart"><i class="fa fa-archive"></i>Product Detail</a>
										</div>
									</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
									<?php if(isset($_SESSION['admin'])){ ?>
										<li><a href="edit_product.php?pId=<?php echo $i['pId'];?>"><i class="fa fa-plus-square"></i>Edit</a></li>
										<li><a href="process/delete_product.php?pId=<?php echo $i['pId'];?>"><i class="fa fa-minus-square"></i>Delete</a></li>
										<?php }  ?>
									</ul>
								</div>
							</div>
						</div>
						<?php } ?>
						
							</div>
						</div>
						<ul class="pagination">
							<li class="active"><a href="">1</a></li>
							<li><a href="">2</a></li>
							<li><a href="">3</a></li>
							<li><a href="">&raquo;</a></li>
						</ul>
					</div><!--features_items-->
				</div>
			</div>
		</div>
	</section>
<?php require_once('footer.php');?>		