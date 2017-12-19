<?php include "../models/DBConnection.php";
    $check = null;
    if(isset($_POST['submitcart'])){
        $product_number = mysqli_real_escape_string($conn, $_POST['product_number']);
        $product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
        $product_price = mysqli_real_escape_string($conn, $_POST['product_price']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);
        $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);

        $amount = $product_price * $quantity;

        $stock_query = "SELECT stock FROM products WHERE product_number ='$product_number';";
        $stock_result = $conn->query($stock_query);
        $row = $stock_result->fetch_array();

        if($quantity<=$row['0']){
            $query = "INSERT INTO cart (product_number,product_name,price,description,quantity,amount)
                    VALUES ('$product_number','$product_name','$product_price','$description','$quantity','$amount');";

            $result = $conn->query($query);

            if($result){
                //echo "Product was added";
                $check = true;
            } else {
                $check = false;
                //echo "Error";
            }
        } else {
            //echo "Quantity exceeds the stock available.";
        }
    }

    /*if(isset($_POST['typeahead'])){
        $searchTerm = $_POST['typeahead'];
        $query = "SELECT product_name FROM products WHERE product_name LIKE '%$searchTerm%'";
            $result = $conn->query($query);
            $array = array();
            if($result){
                while ($row = $result->fetch_array()){
                    $array[] = $row['0'];
                }
            } else {
                echo "Error";
            }
    }*/

    if(isset($_POST['logout'])){
        unset($_SESSION['name']);
        unset($_SESSION['views']);
        session_destroy();
    }

?>