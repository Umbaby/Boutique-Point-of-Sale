<?php include "../controllers/sign_up_function.php"; ?>
<html>
    <head>
        <title>Sign Up</title>
    </head>

    <body>
        <form action="<?php $_PHP_SELF; ?>" method="POST">
            <fieldset>
                <legend><p class="head">SIGN UP</p></legend>
                    <label for="username">Username</label><br>
                        <input type="text" name="username" required /><br>

                    <label for="account_type">Account Type</label><br>
                        <select id="account_type" name="account_type" required>
                            <option id="admin" name="admin">Admin</option>
                            <option id="user" name="user">User</option>
                        </select><br>
                        
                    <label for="password">Password</label><br>
                        <input type="password" name="password" minlength="8" required/><br><br>
            </fieldset>
            <fieldset>
                <legend><p class="head">Personal Info</p></legend>
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
                        </select><br><br>
                
                        <input type="submit" name="submit" value="Sign Up"><br><br>
                    Go Back to
                    <a href="login.php">Login</a>
            </fieldset>
        </form>
    </body>
</html>