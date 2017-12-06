<?php session_start();
    include "../controllers/update_accounts_function.php"; 
    
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
                <legend><p class="head">Account You Want to Update</p></legend>
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
                <legend><p class="head">Update Account</p></legend>
                    <label for="id">Id</label><br>
                        <input type="number" name="id" value="<?php echo $row['0']; ?>" readonly/><br>

                    <label for="name">Name</label><br>
                        <input type="text" name="name" value="<?php echo $row['1']; ?>"/><br>

                    <label for="age">Age</label><br>
                        <input type="number" name="age" min="18" max="65" value="<?php echo $row['2']; ?>"/><br>

                    <label for="mobile">Mobile</label><br>
                        <input type="text" name="mobile" minlength="11" maxlength="11" value="<?php echo $row['3']; ?>"/><br>
                        
                    <label for="gender">Gender</label><br>
                        <select id="gender" name="gender">
                            <option id="male" name="male">Male</option>
                            <option id="female" name="female">Female</option>
                            <option id="others" name="others">Others</option>
                        </select><br>

                    <label for="username">Username</label><br>
                        <input type="text" name="username" value="<?php echo $row['5']; ?>"/><br>

                    <label for="account_type">Account Type</label><br>
                        <select id="account_type" name="account_type">
                            <option id="admin" name="admin">Admin</option>
                            <option id="user" name="user">User</option>
                        </select><br>
                        
                    <label for="password">Password</label><br>
                        <input type="password" name="password" value="<?php echo $row['7']; ?>"/><br><br>

                        <input type="submit" name="submit2" value="Update Account">
            </fieldset>
        </form>
    </div>
    
                        <?php 
                    } else {
                         echo "No such account exists.";   
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
                } ?>
    
    </body>
</html>