<?php include "../models/DBConnection.php";

    if(isset($_POST['submit2'])){
        $category_number = $_POST['category_number'];

        $query = "DELETE FROM categories WHERE category_number = '$category_number'";

        $result = $conn->query($query);

        if($result){
            echo "Category was deleted";
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