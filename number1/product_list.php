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
			<th>Buy</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($result as $data): ?>
			<tr>
				<td><?php echo $data->product_id; ?></td>
				<td><?php echo $data->product_name; ?></td>
				<td><?php echo $data->product_price; ?></td>
				<td><a href="cart.php?product_id=<?php echo $data->product_id; ?>">Order Now</a></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>