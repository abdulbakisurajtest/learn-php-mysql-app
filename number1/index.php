<?php
require 'connect.php';
$sql = "SELECT * FROM product";
$result = $conn->query($sql);
$result = $result->fetchAll(PDO::FETCH_OBJ);
?>
<table cellpadding="2" cellspacing="2" border="0">
	<thead>
		<tr>
			<th>Id</th>
			<th>Name</th>
			<th>Price</th>
			<th>Quantity</th>
			<th>Buy</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($result as $data): ?>
			<form action="cart.php">
				<tr>
					<td><?php echo $data->product_id; ?></td>
					<td><?php echo $data->product_name; ?></td>
					<td><?php echo $data->product_price; ?></td>
					<td><input type="number" name="quantity" value="1"></td>
					<input type="hidden" name="product_id" value="<?php echo $data->product_id; ?>">
					<td><button type="submit">Order Now</button></td>
				</tr>
			</form>
		<?php endforeach; ?>
	</tbody>
</table>