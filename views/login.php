<?php session_start(); 
    include "../controllers/login_function.php"; ?>
<!DOCTYPE html> 
<html lang="en">
    <head>
		<title>Shoe Glamour - Log In</title>

        <!-- Bootstrap CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- bootstrap theme -->
        <link href="css/bootstrap-theme.css" rel="stylesheet">
        <!--external css-->
        <!-- font icon -->
        <link href="css/elegant-icons-style.css" rel="stylesheet" />
        <link href="css/font-awesome.css" rel="stylesheet" />
        <!-- Custom styles -->
        <link href="css/style.css" rel="stylesheet">
        <link href="css/style-responsive.css" rel="stylesheet" />
    </head>

    <body class="login-img3-body">
            <div class="container">
            <?php if (isset($_SESSION['name'])||isset($_COOKIE['user_name'])){ 
                header("location:index.php");
             ?>

             <form action="<?php $_PHP_SELF ?>" method="POST">
                <input type="submit" name="logout" value="Logout(<?php echo $_SESSION['name']; ?>)">
             </form>
             </div>
            <?php } else {?>
                <br><div class="container">
                <form action="<?php $_PHP_SELF ?>" class="login-form" method="POST">
                    <div class="login-wrap">
                        <p class="login-img"><i class="icon_lock_alt"></i></p>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="icon_profile"></i></span>
                                    <input type="text" class="form-control" id="login_username" name="login_username" placeholder="Username" autofocus required/><br>
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                                    <input type="password" id="login_password" name="login_password" class="form-control" placeholder="Password" required/><br><br>
                            </div>  
                            <!--<label class="checkbox">
                                <input type="checkbox" name="remember" value="remember-me"> Remember me
                            </label>-->

                        <input type="submit" class="btn btn-primary btn-lg btn-block" name="submit" value="Login"><br><br>
                    </div>
                </form>
                    <div class="text-right"></div>
                </div>
            <?php if(isset($Logged_In)&&!$Logged_In){
                        //echo "<strong>Invalid input.</strong>";
                    }
            } ?>
    </body>
</html>