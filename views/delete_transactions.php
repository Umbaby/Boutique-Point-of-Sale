<?php session_start();
    include "../controllers/delete_transactions_function.php"; 
    
    if(isset($_SESSION['name'])){
    ?>
<html>
    <head>
        <title>Remove Transactions</title>
        <meta charset="utf-8"> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>

    <body>
    <div class="container">
    <a class="menu" href="view_transactions.php">Transaction Logs</a>
	<a class="menu" href="delete_transactions.php">Remove Transactions</a>
    </div>
    <div class="container">
        <form action="<?php $_PHP_SELF; ?>" method="POST">
            <fieldset>
                <legend><p class="head">Transaction You Want to Remove</p></legend>
                    <label for="id">Transaction ID</label><br>
                        <input type="number" name="id" required />

                        <input type="submit" name="submit" value="Search" />
            </fieldset>
        </form>
    </div>
<?php
    if(isset($_POST['submit'])){
    $id = $_POST['id'];

    $query = "SELECT * FROM transactions WHERE transaction_id = '$id'";
    $result = $conn->query($query);
    $row = $result->fetch_array();

    if ($result->num_rows>0) {
?>
    <div class="container">
        <form action="<?php $_PHP_SELF; ?>" method="POST">
            <fieldset>
                <legend><p class="head">Remove Transaction</p></legend>
                    <label for="id">Transaction ID</label><br>
                        <input type="number" name="id" value="<?php echo $row['0']; ?>" readonly/><br>

                    <label for="tmp">Timestamp</label><br>
                        <input type="text" name="tmp" value="<?php echo $row['1']; ?>" readonly/><br>

                    <label for="customer">Customer</label><br>
                        <input type="text" name="customer" value="<?php echo $row['2']; ?>" readonly/><br>

                    <label for="products">Products Sold</label><br>
                        <input type="text" name="products" value="<?php echo $row['3']; ?>" readonly/><br>
                        
                    <label for="items">Total Items</label><br>
                        <input type="number" name="items" value="<?php echo $row['4']; ?>" readonly/><br>

                    <label for="total">Total Amount</label><br>
                        <input type="number" name="total" value="<?php echo $row['5']; ?>" readonly/><br>

                    <label for="payment">Customer Payment</label><br>
                        <input type="number" name="payment" value="<?php echo $row['6']; ?>" readonly/><br>

                    <label for="change">Customer Change</label><br>
                        <input type="number" name="change" value="<?php echo $row['7']; ?>" readonly/><br><br>

                        <input type="submit" name="submit2" value="Remove this transaction" />
            </fieldset>
        </form>
    </div>
    
                        <?php 
                    } else {
                         echo "No such transaction exists.";   
                        }
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
                }?>
    
    </body>
</html>