<?php session_start();
    include "../models/DBConnection.php"; 

    if(isset($_SESSION['name'])){

    $query = "SELECT * FROM users";
    $result = $conn->query($query);

?>

<html>
    <head>
        <title>Accounts</title>
        <meta charset="utf-8"> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>

    <body>
    <div class="container">
    <a class="menu" href="view_accounts.php">List of Accounts</a>

    <?php if($_SESSION['usertype']=="admin"){ ?>

    <a class="menu" href="add_accounts.php">Create Account</a>
    <a class="menu" href="update_accounts.php">Update Account</a>
    <a class="menu" href="delete_accounts.php">Delete Account</a>

    <?php } ?>

    </div>
    <div class="container">
	<?php if ($result->num_rows>0) { ?>
	<table class="table table-striped">
	<thead>
		<tr>
			<th>Id</th>
			<th>Name</th>
			<th>Age</th>
            <th>Mobile Number</th>
            <th>Gender</th>
            <th>Username</th>
            <th>Account Type</th>
            <th>Password</th>
            <th>Date Created</th>
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
                <td><?php echo "********"; ?></td>
                <td><?php echo $row['8']; ?></td>
			</tr>
        <?php } ?>
	</tbody>
    </table>
    </div>
    <?php 
} else {
		echo "No accounts yet.";
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
    </body>
</html>
