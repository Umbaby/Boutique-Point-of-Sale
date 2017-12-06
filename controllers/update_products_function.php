<?php include "../models/DBConnection.php";

    if(isset($_POST['submit2'])){
        $product_number = $_POST['product_number'];
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $description = $_POST['description'];
        $category = $_POST['category'];
        $add_stock = $_POST['add_product_stock'];

        $stock_query = "SELECT stock FROM products WHERE product_number = '$product_number'";
        $stock_result = $conn->query($stock_query);

        if($stock_result->num_rows>0){
            $row=$stock_result->fetch_array();
        }
        $current_stock = $row['0'];
        
        if($add_stock>0){
            $new_stock = $current_stock + $add_stock;
        } else {
            $new_stock = $current_stock;
        }

        $query = "UPDATE products SET product_number = '$product_number', category = '$category', product_name = '$product_name',
                                      description = '$description', stock = '$new_stock', price = '$product_price'
                  WHERE product_number = '$product_number'";

        $result = $conn->query($query);

        if($result){
            echo "Product updated successfully";
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