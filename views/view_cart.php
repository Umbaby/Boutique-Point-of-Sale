<?php session_start();
	include "../controllers/view_cart_function.php"; 

	if(isset($_SESSION['name'])){

		$query = "SELECT * FROM cart";
		$result = $conn->query($query);

		$items = 0;
		$total = 0;
?>

<html>
    <head>
        <title>Show Cart</title>
		<meta charset="utf-8"> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>

    <body>
	<div class="container">
    <a href="add_to_cart.php">Add to Cart</a>
    <a href="view_cart.php">Show Cart</a>    
	<a href="change_quantity.php">Change Quantity</a>       
    <a href="delete_from_cart.php">Delete from Cart</a>    
    </div>
	<div class="container">
	<?php if ($result->num_rows>0) { ?>
		<form action="<?php $_PHP_SELF; ?>" method="POST">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Product #</th>
						<th>Product Name</th>
						<th>Price</th>
						<th>Quantity</th>
						<th>Amount</th>
					</tr>
				</thead>
				
				<tbody>
					<?php while($row=$result->fetch_array()){ ?>
						<tr>
							<td><?php echo $row['0']; ?></td>
							<td><?php echo $row['1']; ?></td>
							<td><?php echo $row['2']; ?></td>
							<td><?php echo $row['4']; ?></td>
							<td><?php echo $row['5']; ?></td>
						</tr>
					<?php 
								$temp_items = $row['4'];
								$temp_total = $row['5'];
								$items = $items + $temp_items;
								$total = $total + $temp_total;
							} 
					?>
				</tbody>
			</table>
			<table class="table table-striped">
						<tr>
							<td>Items:</td>
							<td><input type="number" name="items" value="<?php echo $items; ?>" readonly/></td>
						</tr>
						<tr>
							<td>Total: (Php)</td>
							<td><input type="number" name="total" value="<?php echo $total; ?>" readonly/></td>
						</tr>
						<tr>
							<td>Customer:</td>
							<td><input type="text" name="customer"/></td>
						</tr>
						<tr>
							<td>Payment: (Php)</td>
							<td><input type="number" name="payment" min="<?php echo $total; ?>" required /></td>
						</tr>	
						<tr>
							<td><input type="submit" name="void" value="Cancel Purchase" /></td>
							<td><input type="submit" name="enter" value="Enter" /></td>
						</tr>	
			</table>
		</form>
	</div>
    </body>
</html>
	<?php if(isset($_POST['enter'])){ 
			$customer = $_POST['customer'];
			$payment = $_POST['payment'];
			$total_purchase = $_POST['total'];
			$change = $payment - $total_purchase;
			?>
		<div class="container">
		<form action="<?php $_PHP_SELF; ?>" method="POST">
			<table>
				<tr>
					<td>Customer Name: </td>
					<td><input type="text" name="customer_name" value="<?php echo $customer; ?>" readonly/></td>
				</tr>
				<tr>
					<td>Amount Paid: (Php)</td>
					<td><input type="number" name="change" value="<?php echo $payment; ?>" readonly/></td>
				</tr>
				<tr>
					<td>Change: (Php)</td>
					<td><input type="number" name="change" value="<?php echo $change; ?>" readonly/></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="done" value="Done" /></td>
				</tr>
			</table>
		</form>
		</div>
		
	<?php	
		}
	} else {
		echo "<br><br>Add products to the Cart.";
	}  ?>
<div class="container">
	<?php
	echo "<a href='view_products.php'>Inventory</a><br>";
	echo "<a href='view_accounts.php'>Accounts</a><br>";
	echo "<a href='add_to_cart.php'>Cashiering</a><br>";
	echo "<a href='view_transactions.php'>Transactions</a><br>";
	?>
				<form action="login.php" method="POST">
					<input type="submit" name="logout" value="Logout">
				 </form>
		</div>
	<?php
} else {
	header('location:login.php');	
}?>