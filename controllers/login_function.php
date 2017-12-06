<?php
    include "../models/DBConnection.php";
    $Logged_In = false;

    if(isset($_POST['submit'])){    

        $login_username = $_POST['login_username'];
        $login_password = $_POST['login_password'];

        $query = "SELECT * FROM users WHERE username = '$login_username' AND password = '$login_password'";
        
        $result = $conn->query($query);
        $row = $result->fetch_array();

            if ($result->num_rows>0) {
                // user is successfully logged in
                $Logged_In = TRUE;
                $_SESSION['usertype'] = $row['6'];
            } else {
                echo "Invalid input.";
            }
    
        $conn->close();
    } 

    if(isset($_POST['logout'])){
        unset($_SESSION['name']);
        unset($_SESSION['views']);
        session_destroy();
    }

?>