  <?php require_once('header.php');?>
<?php require_once('process/products.php');?>
<?php require_once('process/transactions.php');?>
<?php 
	$t=new transactions();
	$transaction=$t->getTransaction($_SESSION['login']);
	$cart=$t->getCart($transaction['kodeT']);
	//print_r($cart);
	$p=new products();
 ?>
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<form action="process/checkout_process.php" method="post">
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
							<tr>
										<td>Transaction Code:</td>
										<td><?php echo $transaction['kodeT'];?></td>
										<input type="hidden" name="kodeT" value="<?php echo $transaction['kodeT'];?>">
									</tr>
									<tr>
										<td>Buyer's ID:</td>
										<td><?php echo $transaction['id'];?></td>
									</tr>
									<tr>
										<td>Date:</td>
										<td><?php echo $transaction['tanggal'];?></td>										
									</tr>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
					<?php 
					$a=0;
					$totalt=0;
					foreach($cart as $i) {
					$product=$p->getProduct($i['pId']);
						?>
						<tr>
							<td class="cart_product">
								<a href=""><img width="300px" height="200px" class="img-responsive" src="images/products/<?php echo $product['image'];?>" alt="<?php echo $product['image'];?>"></a>
							</td>
							<td class="cart_description">
								<h4><a href=""><?php echo $product['pname'];?></a></h4><input type="hidden" name="bought[]" value="<?php echo $product['pname'];?>">
								<p>Web ID: <?php echo $i['pId'];?></p>
							</td>
							<td class="cart_price">
								<p>$<?php echo $product['price'];?></p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<input class="cart_quantity_input" type="number" id="quantity<?php echo $a; ?>" value="1" autocomplete="off" style="width:50px;" min="1" name="quantity[]">
								</div>
							</td>
							<td class="cart_total">
								<p id="subtotal<?php echo $a;?>" class="cart_total_price">$<?php echo $product['price'];?></p>
								<input type="hidden" id="subtotalv<?php  echo $a; ?>" value="<?php echo $product['price'];
									$totalt+=$product['price'];
								?>">
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="process/deleteTd.php?pId=<?php echo $product['pId'];?>&kodeT=<?php echo $transaction['kodeT'];?>"><i class="fa fa-times"></i></a>
							</td>
						</tr>
						<?php $a++; } ?>
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->
	<section id="do_action">
		<div class="container">
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Total <span id="total">$<?php echo $totalt ?></span></li>
							<input type="hidden" name="total" id="totalv" value="<?php echo $totalt; ?>">
						</ul>
							<input type="submit" class="btn btn-default check_out" value="Check out">
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->
	</form>
<script type="text/javascript">
	$(document).ready(function(){
		<?php $a=0; 
		$le=count($cart);
		foreach($cart as $i){
			$b=0;
			$product=$p->getProduct($i['pId']);?>
	$('#quantity<?php echo $a;?>').on('change', function(){
					total=0;
					quantity=$('#quantity<?php echo $a;?>').val();
					price=<?php echo $product['price'];?>;
					subtotal=quantity*price;
					console.log(subtotal);
					$('#subtotal<?php echo $a; ?>').html("$"+subtotal);
					$('#subtotalv<?php echo $a;  ?>').val(subtotal);
					total=total+<?php foreach($cart as $i){?>parseInt($('#subtotalv<?php echo $b;?>').val())<?php if($b<$le-1){echo "+";}$b++; } ?>;
					$('#total').html("$"+total);
					$('#totalv').val(total);
				});
		<?php $a++; } ?>
	});
</script>
<?php require_once('footer.php') ;?>
