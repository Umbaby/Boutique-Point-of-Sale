<?php include "../models/DBConnection.php";

    if(isset($_POST['submit2'])){
        $product_number = mysqli_real_escape_string($conn, $_POST['product_number']);

        $query = "DELETE FROM cart WHERE product_number = '$product_number'";

        $result = $conn->query($query);

        if($result){
            //echo "Product was deleted";
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