<?php session_start();
    include "../controllers/delete_accounts_function.php"; 
    
    if(isset($_SESSION['name'])){
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
    <a class="menu" href="view_accounts.php">View Accounts</a>
    <a class="menu" href="add_accounts.php">Create Account</a>
    <a class="menu" href="update_accounts.php">Update Account</a>
    <a class="menu" href="delete_accounts.php">Delete Account</a>
    </div>
    <div class="container">
        <form action="<?php $_PHP_SELF; ?>" method="POST">
            <fieldset>
                <legend><p class="head">Account You Want to Delete</p></legend>
                    <label for="username">Username</label><br>
                        <input type="text" name="username" required />

                        <input type="submit" name="submit" value="Search" />
            </fieldset>
        </form>
    </div>
<?php
    if(isset($_POST['submit'])){
    $username = $_POST['username'];

    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($query);
    $row = $result->fetch_array();

    if ($result->num_rows>0) {
?>
    <div class="container">
        <form action="<?php $_PHP_SELF; ?>" method="POST">
            <fieldset>
                <legend><p class="head">Delete Account</p></legend>
                    <label for="id">Id</label><br>
                        <input type="number" name="id" value="<?php echo $row['0']; ?>" readonly/><br>

                    <label for="name">Name</label><br>
                        <input type="text" name="name" value="<?php echo $row['1']; ?>" readonly/><br>

                    <label for="age">Age</label><br>
                        <input type="number" name="age" value="<?php echo $row['2']; ?>" readonly/><br>

                    <label for="mobile">Mobile</label><br>
                        <input type="number" name="mobile" value="<?php echo $row['3']; ?>" readonly/><br>
                        
                    <label for="gender">Gender</label><br>
                        <input type="text" name="gender" value="<?php echo $row['4']; ?>" readonly/><br>

                    <label for="username">Username</label><br>
                        <input type="text" name="username" value="<?php echo $row['5']; ?>" readonly/><br>

                    <label for="account_type">Account Type</label><br>
                        <input type="text" name="account_type" value="<?php echo $row['6']; ?>" readonly/><br>
                        
                    <label for="password">Password</label><br>
                        <input type="password" name="password" value="<?php echo $row['7']; ?>" readonly/><br><br>

                        <input type="submit" name="submit2" value="Delete Account">
            </fieldset>
        </form>
    </div>
   
                        <?php 
                    } else {
                         echo "No account exists.";   
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