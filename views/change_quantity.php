<?php session_start();
    include "../controllers/change_quantity_function.php"; 
    
    if(isset($_SESSION['name'])){
    ?>
<html>
    <head>
        <title>Change Quantity</title>
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
        <form action="<?php $_PHP_SELF; ?>" method="POST">
            <fieldset>
                <legend><p class="head">Product You Want to Change</p></legend>
                    <label for="product_name">Product Name</label><br>
                        <input type="text" name="product_name" required />

                        <input type="submit" name="submit" value="Search" />
            </fieldset>
        </form>
    </div>
<?php
    if(isset($_POST['submit'])){
    $product_name = $_POST['product_name'];

    $query = "SELECT * FROM cart WHERE product_name = '$product_name'";
    $result = $conn->query($query);
    $row = $result->fetch_array();

    $stock_query = "SELECT stock FROM products WHERE product_name ='$product_name';";
    $stock_result = $conn->query($stock_query);
    $stock_row = $stock_result->fetch_array();

    if ($result->num_rows>0) {
?>
    <div class="container">
        <form action="<?php $_PHP_SELF; ?>" method="POST">
            <fieldset>
                <legend><p class="head">Change Quantity</p></legend>
                <label for="product_number">Product Number</label><br>
                    <input type="number" name="product_number" value="<?php echo $row['0']; ?>" readonly/><br>

                <label for="product_name">Product Name</label><br>
                    <input type="text" name="product_name" value="<?php echo $row['1']; ?>" readonly/><br>

                <label for="product_price">Price</label><br>
                    <input type="number" name="product_price" value="<?php echo $row['2']; ?>" readonly/><br>

                <label for="description">Description</label><br>
                    <input type="text" name="description" value="<?php echo $row['3']; ?>" readonly/><br>
                    
                <label for="quantity">Quantity</label><br>
                    <input type="number" name="quantity" max="<?php echo $stock_row['0']; ?>" value="<?php echo $row['4']; ?>" /><br><br>

                    <input type="submit" name="submit2" value="Change Quantity">
            </fieldset>
        </form>
    </div>
    
                        <?php 
                    } else {
                         echo "No such product exists.";   
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
                    <?php
                } else {
                    header('location:login.php');   
                }?>
    </div>
    </body>
</html>