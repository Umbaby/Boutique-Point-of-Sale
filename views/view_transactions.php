<?php session_start();
	include "../models/DBConnection.php"; 

	if(isset($_SESSION['name'])){
    $query = "SELECT * FROM transactions";
	
	$result = $conn->query($query);

?>

<html>
    <head>
        <title>Transaction Logs</title>
		<meta charset="utf-8"> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>

    <body>

	<a class="menu" href="view_transactions.php">Transaction Logs</a>
	<a class="menu" href="delete_transactions.php">Remove Transactions</a>
    
	<?php if ($result->num_rows>0) { ?>
	<table>
	<thead>
		<tr>
			<th>Transaction ID</th>
			<th>Timestamp</th>
			<th>Customer Name</th>
			<th>Products Sold</th>
			<th>Total Items</th>
            <th>Total Amount</th>
            <th>Customer Payment</th>
            <th>Customer Change</th>
		</tr>
	</thead>
	
	<tbody>
		<?php while($row=$result->fetch_array()){ ?>
			<tr>
				<td><?php echo $row['0']; ?></td>
				<td><?php echo $row['1']; ?></td>
				<td><?php echo $row['2']; ?></td>
                <td><?php echo $row['3']; ?></td>
				<td><?php echo $row['4']; ?></td>
				<td><?php echo $row['5']; ?></td>
                <td><?php echo $row['6']; ?></td>
                <td><?php echo $row['7']; ?></td>
			</tr>
        <?php } ?>
	</tbody>
    </table>
    </body>
</html>

	<?php 
} else {
		echo "No transactions yet.";
	} 
	echo "<a href='view_products.php'>Inventory</a><br>";
	//echo "<a href='view_accounts.php'>Accounts</a><br>";
	echo "<a href='add_to_cart.php'>Cashiering</a><br>";
	echo "<a href='view_transactions.php'>Transactions</a><br>";
	?>
				<form action="login.php" method="POST">
					<input type="submit" name="logout" value="Logout">
				 </form>
	<?php
} else {
	header('location:login.php');	
}?>