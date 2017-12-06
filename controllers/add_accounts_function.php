<?php 
    include "../models/DBConnection.php";

    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $age = $_POST['age'];
        $mobile = $_POST['mobile'];
        $gender = $_POST['gender'];
        $username = $_POST['username'];
        $account_type = $_POST['account_type'];
        $password = $_POST['password'];

        $query = "INSERT INTO users (name,age,mobile_number,gender,username,user_type,password)
                  VALUES ('$name','$age','$mobile','$gender','$username','$account_type','$password');";

        $result = $conn->query($query);

        if($result){
            echo "Account successfully added";
        } else {
            echo "Error";
        }
    }

    if(isset($_POST['logout'])){
        unset($_SESSION['name']);
        unset($_SESSION['views']);
        session_destroy();
    }

?>