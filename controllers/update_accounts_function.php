<?php 
    include "../models/DBConnection.php";
    $confirm_check = null;
    $password_check = null;

    if(isset($_POST['submit2'])){
        $id = mysqli_real_escape_string($conn, $_POST['id']);
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $age = mysqli_real_escape_string($conn, $_POST['age']);
        $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
        $gender = mysqli_real_escape_string($conn, $_POST['gender']);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $account_type = mysqli_real_escape_string($conn, $_POST['account_type']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        //$confirm_password = $_POST['confirm'];

        //if($password==$confirm_password){
            $password_check = true;
            $query = "UPDATE users SET user_id = '$id', name = '$name', age = '$age',
                        mobile_number = '$mobile', gender = '$gender', username = '$username', 
                        user_type = '$account_type' , password = '$password'
                    WHERE user_id = '$id'";

            $result = $conn->query($query);

            if($result){
                $confirm_check = true;
            } else {
                $confirm_check = false;
            }
       /* } else {
            $password_check = false;
        } */
    }

    if(isset($_POST['logout'])){
        unset($_SESSION['name']);
        unset($_SESSION['views']);
        session_destroy();
    }

?>