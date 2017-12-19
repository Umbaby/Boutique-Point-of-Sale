<?php 
    include "../models/DBConnection.php";

    if(isset($_POST['submit'])){
        $product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
        $product_price = mysqli_real_escape_string($conn, $_POST['product_price']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);
        $stock = mysqli_real_escape_string($conn, $_POST['product_stock']);
        $category = mysqli_real_escape_string($conn, $_POST['category']);
        

        $query = "INSERT INTO products (category,product_name,description,stock,price)
                  VALUES ('$category','$product_name','$description','$stock','$product_price');";

        $result = $conn->query($query);

        if($result){
           // echo "Product added successfully";
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