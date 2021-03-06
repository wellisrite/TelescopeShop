<?php require_once('header.php') ?>
<?php require_once('process/checkout.php');?>
<?php 
	$c=new checkout();
	$check=$c->getChecks();
 ?>
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="description">Transaction code</td>
							<td class="description">Bought Items</td>
							<td class="price">Total Price</td>							
							<td>Buyer</td>
							<td>Status</td>
							<td>Options</td>
						</tr>
					</thead>
					<tbody>
					<?php foreach($check as $i){?>
						<tr>
							<td>
								<h4><?php echo $i['kodeT'];?></h4>
							</td>
							<td class="cart_description">
								<h4><?php echo $i['bought'];?></h4>
								<p>Date: <?php echo $i['date'];?></p>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">$<?php echo $i['total'];?></p>
							</td>
							<td class="cart_description">
								<p class="cart_total_price"><?php echo $i['idU'];?></p>
							</td>
							<td class="cart_description">
								<p class="cart_total_price"><?php echo $i['status'];?></p>
							</td>
							<?php if($i['status']=="About to be sent"){?>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="process/cancel_checkout.php?id=<?php echo $i['id']; ?>"><i class="fa fa-times"></i>Cancel Transaction</a>
								<a href="process/complete_checkout.php?id=<?php echo $i['id'];?>">Complete</a>
							</td>
							<?php } 
							else if($i['status']=="Sent and confirmed by user"){?>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="process/cancel_checkout.php?id=<?php echo $i['id']; ?>"><i class="fa fa-times"></i>Remove	Transaction</a>
								</td>
							<?php } ?>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
	</section> <!--/#cart_items-->
<?php require_once('footer.php');?>