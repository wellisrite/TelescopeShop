<?php require_once('header.php');?>
<?php require_once('process/users.php');
$u=new users();
$users=$u->getUsers();
 ?>
<div class="container">
	<div class="table-responsive cart_info">
				<table class="table table-bordered">
					<thead>
						<tr class="cart_menu">
							<td>ID</td>
							<td>Name</td>
							<td>Gender</td>
							<td>Email</td>
							<td>Status</td>
							<td>Options</td>
						</tr>
					</thead>
					<tbody>
					<?php foreach ($users as $i) {?>
					<tr>
						<td><?php echo $i['id']; ?></td>
						<td><?php echo $i['name']; ?></td>
						<td><?php echo $i['gender']; ?></td>
						<td><?php echo $i['email']; ?></td>
						<td><?php echo $i['type'];?></td>
						<?php if($i['type']=="normal"){?>
						<td><a href="process/banuser.php?id=<?php echo $i['id']; ?>">Ban User</a></td>
						<?php }else{?>
						<td><a href="process/unbanuser.php?id=<?php echo $i['id']; ?>">Unban User</a></td>				
						<?php } ?>
					</tr>
					<?php } ?>
					</tbody>
				</table>
	</div>
	</div>
<?php require_once('footer.php'); ?>
