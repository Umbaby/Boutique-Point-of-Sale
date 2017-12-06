<?php session_start();
    include "../controllers/add_products_function.php"; 
    
    if(isset($_SESSION['name'])){

    $query = "SELECT * FROM categories";
    
    $result = $conn->query($query);
    
        if ($result->num_rows>0) {
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
	<a class="menu" href="view_products.php">View Products</a>
	<a class="menu" href="add_products.php">Add Product</a>
	<a class="menu" href="update_products.php">Update Product</a>
	<a class="menu" href="delete_products.php">Delete Product</a>
    <a class="menu" href="view_categories.php">View Categories</a>
    <a class="menu" href="add_category.php">Add Category</a>
    <a class="menu" href="update_categories.php">Update Category</a>
    <a class="menu" href="delete_categories.php">Delete Category</a>
    </div>
    <div class="container">
        <form action="<?php $_PHP_SELF; ?>" method="POST">
            <fieldset>
                <legend><p class="head">ADD PRODUCT</p></legend>
                    <label for="product_name">Product Name</label><br>
                        <input type="text" name="product_name" required/><br>

                    <label for="product_price">Price</label><br>
                        <input type="number" name="product_price" required/><br>

                    <label for="description">Description</label><br>
                        <input type="text" name="description" /><br>
                        
                    <label for="product_stock">Stock</label><br>
                        <input type="number" name="product_stock" required/><br>

                    <label for="category">Category</label><br>
                        <select id="category" name="category" required>
                        <?php while($row=$result->fetch_array()){ ?>
                            <option value="<?php echo $row['0']; ?>" name="<?php echo $row['0']; ?>"> <?php echo $row['1']; ?> </option>
                        <?php } ?>
                        </select><br><br>

                        <input type="submit" name="submit" value="Add Product">
            </fieldset>
        </form>
    </div>
        
    <div class="container">

<?php 
}
//echo "<a href='view_products.php'>Inventory</a><br>";
echo "<a href='view_accounts.php'>Accounts</a><br>";
echo "<a href='add_to_cart.php'>Cashiering</a><br>";
echo "<a href='view_transactions.php'>Transactions</a><br>";
?>
        <form action="<?php $_PHP_SELF ?>" method="POST">
            <input type="submit" name="logout" value="Logout">
         </form>
<?php
} else {
    header('location:login.php');
}  ?>
    </div>
    </body>
</html>
