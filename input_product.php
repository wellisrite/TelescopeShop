<?php require_once('header.php');?>
<?php if(!isset($_SESSION['login'])){
	?><script type="text/javascript">
		window.location="http://localhost/uas";
	</script>
	<?php } ?>
<div class="container" style="width:50%;">
	<div class="shopper-informations text-center" >
						<div class="shopper-info">
							<p>Input Products</p>
							<form action="process/input_product.php" method="post">
								<input name="pid" type="text" placeholder="Product ID" required="" autofocus="">
								<input name="pname" type="text" placeholder="Product Name" required="">
								<input name="stock" type="number" placeholder="Stock" required="">
								<input name="price" type="number" placeholder="Price (In Dollar)" required="">
								<input name="image" type="text" placeholder="Product Image" required="">
								<input name="category" type="text" placeholder="Category" required="">
								<label><p>Description:</p></label><textarea name="description" type="text" style="height:200px"></textarea>
								<input class="btn btn-primary" type="submit" name="button" value="Input">
							</form>
						</div>
	</div>
</div>	
<?php require_once('footer.php');?>