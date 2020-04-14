<?php require_once('header.php');
?>
<?php require_once('process/products.php') ?>
<?php $p=new products();
	$products=$p->getProducts();
	$categories=$p->getCategories();
 ?>
	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">
									<h1><span>AAstronomer</span>-SHOP</h1>
									<h2><?php echo $products[1]['pname'];?></h2>
									<p><?php echo substr($products[1]['description'],0,400)."..... ";?><a href="product-details.php?pId=<?php echo $products[1]['pId'];?>">read more</a></p>
									<button type="button" class="btn btn-default get" onclick="redirect('<?php echo $products[1]['pId'];?>') " >Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="images/products/<?php echo $products[1]['image'];?>" class="Telescope img-responsive" alt="<?php  echo $products[1]['pId'];?>" />
									<!-- <img src="images/home/pricing.png"  class="pricing" alt="" /> -->
								</div>
							</div>
						<?php for($i=2;$i<4;$i++){?>
				<div class="item">
								<div class="col-sm-6">
									<h1><span>AAstronomer</span>-SHOP</h1>
									<h2><?php echo $products[$i]['pname'];?></h2>
									<p><?php echo substr($products[$i]['description'],0,400)."......"?>
									<a href="product-details.php?pId=<?php echo $products[$i]['pId'];?>">
										read more
									</a></p>
									<button type="button" onclick="redirect('<?php echo $products[$i]['pId'];?>') " class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="images/products/<?php echo $products[$i]['image'];?>" class="Telescope img-responsive" alt="<?php echo $products[$i]['pId'];?>" />
									<!-- <img src="images/home/pricing.png"  class="pricing" alt="" /> -->
								</div>
						</div>
				<?php } ?>
				</div>
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
				</div>
			</div>
		</div>
	</section><!--/slider-->
		<script type="text/javascript">
			function redirect(pId){
				window.location="http://localhost/uas/process/addtocart.php?pId="+pId;
			}
		</script>
<?php require_once('footer.php');?>