<?php 
    include "../models/DBConnection.php";
    $password_check = null;
    $success_check = null;

    if(isset($_POST['submit'])){
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $age = mysqli_real_escape_string($conn, $_POST['age']);
        $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
        $gender = mysqli_real_escape_string($conn, $_POST['gender']);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $account_type = mysqli_real_escape_string($conn, $_POST['account_type']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm']); 

        if($password==$confirm_password){
            $password_check = true;
            $query = "INSERT INTO users (name,age,mobile_number,gender,username,user_type,password)
                    VALUES ('$name','$age','$mobile','$gender','$username','$account_type','$password');";

            $result = $conn->query($query);

            if($result){
                $success_check = true;
            } else {
                $success_check = false;
            }
        } else {
            $password_check = false;
        }
    }

    if(isset($_POST['logout'])){
        unset($_SESSION['name']);
        unset($_SESSION['views']);
        session_destroy();
    }

?>