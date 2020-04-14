<?php require_once('process/products.php');?>
<?php 
	$p=new products();
	$kode=$_GET['pId'];
	$product=$p->getProduct($kode);
 ?>
 <?php require_once('header.php');?>
 <div class="container" style="width:50%;">
	<div class="shopper-informations text-center" >
						<div class="shopper-info">
							<p>Edit Products</p>
							<form action="process/edit_product.php" method="post">
								<input name="pid" type="text" placeholder="Product ID" required="" autofocus="" value="<?php echo $product['pId'];?>" readonly>
								<input name="pname" type="text" placeholder="Product Name" required="" value="<?php echo $product['pname'] ?>">
								<input name="stock" type="number" placeholder="Stock" required="" value="<?php echo $product['stock'];?>">
								<input name="price" type="number" placeholder="Price (In Dollar)" required="" value="<?php echo $product['price'];?>">
								<input name="image" type="text" placeholder="Product Image" required="" value="<?php echo $product['image'];?>">
								<input name="category" type="text" placeholder="Category" required="" value="<?php echo $product['category'];?>">
								<label><p>Description:</p></label><textarea name="description" type="text" style="height:200px"><?php echo $product['description'];?></textarea>
								<input class="btn btn-primary" type="submit" name="button" value="Edit">
							</form>
						</div>
	</div>
</div>	
<?php require_once('footer.php');?>