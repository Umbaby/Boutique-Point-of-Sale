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
            $query = "INSERT INTO cart (product_number,product_name,price,description,quantity,amount)
                    VALUES ('$product_number','$product_name','$product_price','$description','$quantity','$amount');";

            $result = $conn->query($query);

            if($result){
                echo "Product was added";
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