<?php session_start(); 
    include "../controllers/login_function.php"; ?>
<!DOCTYPE html> 
<html lang="en">
    <head>
		<title>Login</title>
        <meta charset="utf-8"> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>

    <body>
    <div class="container">
            <?php if ($Logged_In){ 

                $_SESSION['name'] = $_POST['login_username'];
                $_SESSION['views'] = 1;

                    echo "You are logged in, " . $_SESSION['name'] . "<br>";
                    echo "<a href='view_products.php'>Inventory</a><br>";
                    echo "<a href='view_accounts.php'>Accounts</a><br>";
                    echo "<a href='add_to_cart.php'>Cashiering</a><br>";
                    echo "<a href='view_transactions.php'>Transactions</a><br>";
             ?>

             <form action="<?php $_PHP_SELF ?>" method="POST">
                <input type="submit" name="logout" value="Logout">
             </form>

            <?php } ?>
            
            <?php if (!$Logged_In){ ?>
            
                <form action="<?php $_PHP_SELF ?>" method="POST">
                    <fieldset>
                    <legend><p class="head">LOGIN</p></legend>
                        <label for="login_username">Username</label><br>
                            <input type="text" id="login_username" name="login_username" required/><br>
                        <label for="login_password">Password</label><br>
                            <input type="password" id="login_password" name="login_password" required/><br><br>
                        <input type="submit" name="submit" value="Login"><br><br>
                    </fieldset>	
                </form>
            <?php } ?>
    </div>
    </body>
</html>