<?php session_start();
    include "../controllers/delete_categories_function.php"; 
    
    if(isset($_SESSION['name'])){
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
                <legend><p class="head">Category You Want to Delete</p></legend>
                    <label for="category_name">Category Name</label><br>
                        <input type="text" name="category_name" required /><br><br>

                        <input type="submit" name="submit" value="Search" />
            </fieldset>
        </form>
    </div>
<?php
    if(isset($_POST['submit'])){
    $category_number = $_POST['category_name'];

    $query = "SELECT * FROM categories WHERE category_name = '$category_name'";
    $result = $conn->query($query);
    $row = $result->fetch_array();

    if ($result->num_rows>0) {
?>
    <div class="container">
        <form action="<?php $_PHP_SELF; ?>" method="POST">
            <fieldset>
                <legend><p class="head">Delete Category</p></legend>
                    <label for="category_number">Category Number</label><br>
                        <input type="number" name="category_number" value="<?php echo $row['0']; ?>" readonly/><br>

                    <label for="category_name">Category Name</label><br>
                        <input type="text" name="category_name" value="<?php echo $row['1']; ?>" readonly/><br><br>

                        <input type="submit" name="submit2" value="Delete Category">
            </fieldset>
        </form>
    </div>
    <div class="container">
                        <?php 
                    } else {
                         echo "No such category exists.";   
                        }
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
                }?>
    </div>
    </body>
</html>