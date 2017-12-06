<?php session_start();
    include "../controllers/add_accounts_function.php"; 

    if(isset($_SESSION['name'])){
    
    $query = "SELECT * FROM users";
    
    $result = $conn->query($query);
    
        if ($result->num_rows>0) {
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
                <legend><p class="head">Create Account</p></legend>
                    <label for="name">Name</label><br>
                        <input type="text" name="name" required/><br>

                    <label for="age">Age(year)</label><br>
                        <input type="number" name="age" min="18" max="65" required/><br>

                    <label for="mobile">Mobile Number</label><br>
                        <input type="text" name="mobile" minlength="11" maxlength="11" required/><br>
                        
                    <label for="gender">Gender</label><br>
                        <select id="gender" name="gender" required>
                            <option id="male" name="male">Male</option>
                            <option id="female" name="female">Female</option>
                            <option id="others" name="others">Others</option>
                        </select><br>

                    <label for="username">Username</label><br>
                        <input type="text" name="username" required /><br>

                    <label for="account_type">Account Type</label><br>
                        <select id="account_type" name="account_type" required>
                            <option id="admin" name="admin">Admin</option>
                            <option id="user" name="user">User</option>
                        </select><br>
                        
                    <label for="password">Password</label><br>
                        <input type="password" name="password" minlength="8" required/><br><br>

                        <input type="submit" name="submit" value="Create Account">
            </fieldset>
        </form>
    </div>

    <div class="container">
<?php 
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
    </div>
    </body>
</html>