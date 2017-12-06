<?php 
    include "../models/DBConnection.php";

    if(isset($_POST['submit2'])){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $age = $_POST['age'];
        $mobile = $_POST['mobile'];
        $gender = $_POST['gender'];
        $username = $_POST['username'];
        $account_type = $_POST['account_type'];
        $password = $_POST['password'];

        $query = "UPDATE users SET user_id = '$id', name = '$name', age = '$age',
                    mobile_number = '$mobile', gender = '$gender', username = '$username', 
                    user_type = '$account_type' , password = '$password'
                  WHERE user_id = '$id'";

        $result = $conn->query($query);

        if($result){
            echo "Account successfully updated";
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