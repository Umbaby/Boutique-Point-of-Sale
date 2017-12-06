<?php 
    include "../models/DBConnection.php";

    if(isset($_POST['submit2'])){
        $id = $_POST['id'];

        $query = "DELETE FROM users WHERE user_id = '$id'";

        $result = $conn->query($query);

        if($result){
            echo "Account was deleted";
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