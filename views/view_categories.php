<?php session_start();
	include "../models/DBConnection.php"; 

	if(isset($_SESSION['name'])){

    $query = "SELECT * FROM categories";
    $result = $conn->query($query);

?>

<html>
    <head>
        <title>Inventory</title>
		<meta charset="utf-8"> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>

    <body>
	<div class="container">
	<a class="menu" href="view_products.php">List of Products</a>

	<?php if($_SESSION['usertype']=="admin"){ ?>
	<a class="menu" href="add_products.php">Add Product</a>
	<a class="menu" href="update_products.php">Update Product</a>
	<a class="menu" href="delete_products.php">Delete Product</a>
	<?php } ?>

    <a class="menu" href="view_categories.php">List of Categories</a>

	<?php if($_SESSION['usertype']=="admin"){ ?>
	<a class="menu" href="add_category.php">Add Category</a>
    <a class="menu" href="update_categories.php">Update Category</a>
    <a class="menu" href="delete_categories.php">Delete Category</a>
	<?php } ?>

    </div>
	<div class="container">
	<?php if ($result->num_rows>0) { ?>
	<table class="table table-striped">
	<thead>
		<tr>
			<th>Id</th>
			<th>Name</th>
			<th>Products</th>
		</tr>
	</thead>
	
	<tbody>
		<?php while($row=$result->fetch_array()){ ?>
			<tr>
				<td><?php echo $row['0']; ?></td>
				<td><?php echo $row['1']; ?></td>
				<td>
				<?php 
					$category = $row['0'];
					$query2 = "SELECT * FROM products WHERE category = '$category'";
					$result2 = $conn->query($query2);
                    
                    if ($result2->num_rows>0) {
                        while($row2=$result2->fetch_array()){
                            echo $row2['2'] . ", ";
                        } 
                    } else {
                        echo "None";
                    }
				?>
				</td>
			</tr>
        <?php } ?>
	</tbody>
    </table>
	</div>
    </body>
</html>

	<?php 
} else {
		echo "No categories yet.";
	} ?>
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
 } ?>