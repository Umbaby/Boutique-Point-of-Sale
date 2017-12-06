<?php include "../models/DBConnection.php";

		if(isset($_POST['void'])){
			$void_query = "DELETE FROM cart;";
			$void_result = $conn->query($void_query);
			if($void_result){
				echo "All purchase deleted";
			} else {
				echo "Error";
			}
		}
		
		if(isset($_POST['enter'])){
			$customer = $_POST['customer'];
			$items = $_POST['items'];
			$total = $_POST['total'];
			$payment = $_POST['payment'];
			$change = $payment - $total;

			$enter_query = "SELECT product_name FROM cart";
			$enter_result = $conn->query($enter_query);
			if($enter_result->num_rows>0){
				$num = 0;
				while($row=$enter_result->fetch_array()){	
					$products[$num] = $row['0'];
					$num++;
				}
			}

			$string_products = implode(", ", $products);

			$transaction_query = "INSERT INTO transactions (customer,products,items,total_amount,payment,payment_change)
			VALUES ('$customer','$string_products','$items','$total','$payment','$change');";

			$transaction_result = $conn->query($transaction_query);

			if($transaction_result){
				echo "Transaction was successful";
			} else {
				echo "Error";
			}
		}

		if(isset($_POST['done'])){
			$done_query = "DELETE FROM cart;";
			$done_result = $conn->query($done_query);
			if($done_result){
				echo "Transaction complete";
			} else {
				echo "Error";
			}
		}
?>