<?php
	include('session.php');
	if(isset($_POST['check'])){
		?>
		<table width="100%" class="table table-striped table-bordered table-hover">
			<thead>
				<th></th>
				<th>Product Name</th>
				<th>Available Qty</th>
				<th>Product Price</th>
				<th>Purchase Qty</th>
				<th>SubTotal</th>
			</thead>
			<tbody>
			<form method="POST" action="">
			<?php
				$total=0;
				$customerId = $_SESSION['custId'];
				$query=mysqli_query($conn," select * from tblcart left join tblproduct on tblproduct.productId=tblcart.productId INNER join tblinventory on tblproduct.productId = tblinventory.productId where customerId='$customerId' ");
				while($row=mysqli_fetch_array($query)){
					?>
					<tr>
						<td><button type="button" class="btn btn-danger btn-sm remove_prod" value="<?php echo $row['productId']; ?>"><i class="fa fa-trash fa-fw"></i> Remove</button></td>
						<td><?php echo $row['description']; ?></td>
						<td><?php echo $row['stock']; ?></td>
						<td align="right"><?php echo number_format($row['price'],2); ?></td>
						<td><button type="button" class="btn btn-warning btn-sm minus_qty2" value="<?php echo $row['productId']; ?>"><i class="fa fa-minus fa-fw"></i></button> 
							<button type="button"class="btn btn-primary btn-sm add_qty2" value="<?php echo $row['productId']; ?>"><i class="fa fa-plus fa-fw"></i></button> 
							<?php echo $row['quantity'];?>
						</td>
						<td align="right"><strong><span class="subt">
							<?php
								$subtotal=$row['quantity']*$row['price'];
								echo number_format($subtotal,2);
								$total+=$subtotal;
							?>
						</span></strong></td>
					</tr>
					<?php
				}
			?>
			<tr>
				<td colspan="5"><span class="pull-right"><strong>Grand Total</strong></span></td>
				<td align="right"><strong><span id="total"><?php echo number_format($total,2); ?></span><strong></td>
			</tr>
			</form>
			</tbody>
		</table>
		<?php
	}


?>