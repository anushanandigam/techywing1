<?php
session_start();
include("../config/config.php");
if(isset($_POST['operator_ids']))
{	
echo $operator_ids = $_POST['operator_ids'];
echo $amount =$_POST['amount'];
echo $add_client_ids =$_POST['add_client_ids'];
echo $add_retailer_ids =$_POST['add_retailer_ids'];
echo $date=date('Y-m-d H:i:s');
	
	
		 // if($conn)
		 // {
		 // $sql1 =$conn->prepare('insert into transaction_retailer_electricity(`operator_ids`,`amount`,`add_client_ids`,`add_retailer_ids`,`date`)VALUES(?,?,?,?,?,?)');
			 // $sql1->bindParam(1,$operator_ids);
			 // $sql1->bindParam(2,$amount);
			 // $sql1->bindParam(3,$add_client_ids);
			 // $sql1->bindParam(4,$add_retailer_ids);
			 // $sql1->bindParam(5,$date);
			// if($sql1->execute())
			 // {
				// echo "success"; 
				// }
			// else{
				// echo "insertion fail";
			// }

			  // }
		  // else{
		  // echo "qry fail";
		  // }
		 // }
		 // else{
		 // echo "insertion failed";
		 // }
 ?>
			 