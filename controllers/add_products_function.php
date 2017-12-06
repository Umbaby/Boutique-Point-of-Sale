<?php 
    include "../models/DBConnection.php";

    if(isset($_POST['submit'])){
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $description = $_POST['description'];
        $category = $_POST['category'];
        $stock = $_POST['product_stock'];

        $query = "INSERT INTO products (category,product_name,description,stock,price)
                  VALUES ('$category','$product_name','$description','$stock','$product_price');";

        $result = $conn->query($query);

        if($result){
            echo "Product added successfully";
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