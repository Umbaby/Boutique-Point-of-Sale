<?php include "../models/DBConnection.php";

    if(isset($_POST['submit2'])){
        $transaction_id = $_POST['id'];

        $query = "DELETE FROM transactions WHERE transaction_id = '$transaction_id'";

        $result = $conn->query($query);

        if($result){
            echo "Transaction was removed";
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