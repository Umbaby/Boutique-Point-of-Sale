<?php include "../models/DBConnection.php";

    if(isset($_POST['submit2'])){
        $product_number = $_POST['product_number'];
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $description = $_POST['description'];
        $quantity = $_POST['quantity'];

        $amount = $product_price * $quantity;

        $stock_query = "SELECT stock FROM products WHERE product_number ='$product_number';";
        $stock_result = $conn->query($stock_query);
        $row = $stock_result->fetch_array();

        if($quantity<=$row['0']){
            $query = "UPDATE cart SET quantity = '$quantity', amount = '$amount'
                  WHERE product_number = '$product_number'";

            $result = $conn->query($query);

            if($result){
                echo "Quantity was changed";
            } else {
                echo "Error";
            }
        } else {
            echo "Quantity exceeds the stock available.";
        }
    }

    if(isset($_POST['logout'])){
        unset($_SESSION['name']);
        unset($_SESSION['views']);
        session_destroy();
    }

?>