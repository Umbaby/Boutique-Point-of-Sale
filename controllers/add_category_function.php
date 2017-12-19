<?php include "../models/DBConnection.php";

    if(isset($_POST['submit'])){
        $category_name = mysqli_real_escape_string($conn, $_POST['category_name']);

        $query = "INSERT INTO categories (category_name) VALUES ('$category_name');";

        $result = $conn->query($query);

        if($result){
            //echo "Category added successfully";
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