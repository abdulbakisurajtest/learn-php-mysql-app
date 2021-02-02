<?php
session_start();
require 'connect.php';
require 'item.php';
if(isset($_GET['product_id'])):
	$sql = "SELECT * FROM product WHERE product_id=:product_id";
	$values = array(':product_id'=>$_GET['product_id']);
	
	$result = $conn->prepare($sql);
	$result->execute($values);
	$product = $result->fetch(PDO::FETCH_OBJ);

	$item = new Item();
	$item->id = $product->product_id;
	$item->name = $product->product_name;
	$item->price = $product->product_price;
	$item->quantity = $_GET['quantity'];

	// check product is existing in cart
	$index = -1;
	if(isset($_SESSION['cart'])):
		$cart = unserialize(serialize($_SESSION['cart']));
		for($i=0; $i<count($cart); $i++):
			if($cart[$i]->id == $_GET['product_id']):
				$index = $i;
				break;
			endif;
		endfor;
	endif;

	if($index == -1):
		$_SESSION['cart'][] = $item;
	else:
		$cart[$index]->quantity++;
		$_SESSION['cart'] = $cart;
	endif;
endif;

//	Delete product in cart
if(isset($_GET['index'])):
	$cart = unserialize(serialize($_SESSION['cart']));
	unset($cart[$_GET['index']]);
	$cart = array_values($cart);
	$_SESSION['cart'] = $cart;
endif;
?>

<table cellpadding="2" cellspacing="2" border="1">
	<thead>
		<tr>
			<th>Option</th>
			<th>Id</th>
			<th>Name</th>
			<th>Price</th>
			<th>Quantity</th>
			<th>Sub Total</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$cart = unserialize(serialize($_SESSION['cart']));
		$s = 0;
		$index = 0;
		for($i=0; $i<count($cart); $i++):
			$s += $cart[$i]->price*$cart[$i]->quantity;
			?>
			<tr>
				<td><a href="cart.php?index=<?php echo $index; ?>" onclick="return confirm('Are you sure?')">Delete</a></td>
				<td><?php echo $cart[$i]->id; ?></td>
				<td><?php echo $cart[$i]->name; ?></td>
				<td><?php echo $cart[$i]->price; ?></td>
				<td><?php echo $cart[$i]->quantity; ?></td>
				<td><?php echo $cart[$i]->price*$cart[$i]->quantity; ?></td>
			</tr>
			<?php
			$index++;
		endfor;?>
		<tr>
			<td colspan="5" align="right">Sum</td>
			<td align="left"><?php echo $s; ?></td>
		</tr>
	</tbody>
</table>
<br/>
<a href="index.php">Continue Shopping</a>