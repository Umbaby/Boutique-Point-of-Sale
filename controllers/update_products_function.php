<?php include "../models/DBConnection.php";

    if(isset($_POST['submit2'])){
        $product_number = mysqli_real_escape_string($conn, $_POST['product_number']);
        $product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
        $product_price = mysqli_real_escape_string($conn, $_POST['product_price']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);
        $category = mysqli_real_escape_string($conn, $_POST['category']);
        $add_stock = mysqli_real_escape_string($conn, $_POST['add_product_stock']);

        $stock_query = "SELECT stock FROM products WHERE product_number = '$product_number';";
        $stock_result = $conn->query($stock_query);

        if($stock_result->num_rows>0){
            $row=$stock_result->fetch_array();
        }
        $current_stock = $row['0'];
        //echo "current: " . $current_stock;

        if($add_stock>0){
            $new_stock = $current_stock + $add_stock;
            //echo "new: ". $new_stock;
        } else {
            $new_stock = $current_stock;
            //echo "new: ". $new_stock;
        }
        
        $set_category = "UPDATE products SET category = '$category' WHERE product_number = '$product_number'";
        $set_pname = "UPDATE products SET product_name = '$product_name' WHERE product_number = '$product_number'";
        $set_description = "UPDATE products SET description = '$description' WHERE product_number = '$product_number'";
        $set_stock = "UPDATE products SET stock = '$new_stock' WHERE product_number = '$product_number'";
        $set_price = "UPDATE products SET price = '$product_price' WHERE product_number = '$product_number'";
        
        $category_result = $conn->query($set_category);
        $pname_result = $conn->query($set_pname);
        $description_result = $conn->query($set_description);
        $stock_result = $conn->query($set_stock);
        $price_result = $conn->query($set_price);

        if($category_result){
            //echo "Category updated successfully";
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