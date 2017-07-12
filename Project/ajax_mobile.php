<?php
session_start();
include("../config/config.php");
if(isset($_POST['operator_ids']))
{	
echo $operator_ids = $_POST['operator_ids'];
echo $subscriber_id = $_POST['subscriber_id'];
echo $mbl_num = $_POST['mbl_num'];
echo $amount =$_POST['amount'];
echo $add_client_ids =$_POST['add_client_ids'];
echo $add_retailer_ids =$_POST['add_retailer_ids'];
echo $date=date('Y-m-d H:i:s');
	if ($subscriber_id!='')
{
	if($count==0){
	
	$s.=  "subscriber_id='".$subscriber_id."'";
    $count++;
	}
   else{
	  $s.= " , subscriber_id='".$subscriber_id."'";
   }
}
	

	
		 if($conn)
		 {
		 $sql1 =$conn->prepare('insert into transaction_retailer(`operator_ids`,`subscriber_id`,`amount`,`mbl_num`,`add_client_ids`,`add_retailer_ids`,`date`)VALUES(?,?,?,?,?,?,?)');
			 $sql1->bindParam(1,$operator_ids);
			 $sql1->bindParam(2,$operator_ids);
			 $sql1->bindParam(3,$amount);
			 $sql1->bindParam(4,$mbl_num);
			 $sql1->bindParam(5,$add_client_ids);
			 $sql1->bindParam(6,$add_retailer_ids);
			 $sql1->bindParam(7,$date);
			if($sql1->execute())
			 {
				echo "success"; 
				}
			else{
				echo "insertion fail";
			}

			  }
		  else{
		  echo "qry fail";
		  }
		 }
		 else{
		 echo "insertion failed";
		 }
 ?>
			 