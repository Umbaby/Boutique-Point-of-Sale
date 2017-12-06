<?php include "../models/DBConnection.php";

    if(isset($_POST['submit2'])){
        $category_number = $_POST['category_number'];
        $category_name = $_POST['category_name'];

        $query = "UPDATE categories SET category_number = '$category_number', category_name = '$category_name'
                  WHERE category_number = '$category_number'";

        $result = $conn->query($query);

        if($result){
            echo "Category successfully updated";
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