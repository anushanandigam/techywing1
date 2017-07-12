<?php 
include("../config/config.php");

if(isset($_POST['password']))
{	
echo $first_name1 = $_POST['password'];
echo $first_name = $_POST['first_name'];
echo $last_name = $_POST['last_name'];
echo $middle_name = $_POST['middle_name'];
echo $gender = $_POST['gender'];
echo $dob = $_POST['dob'];
echo $mbl_num = $_POST['mbl_num'];
echo $address = $_POST['address'];
echo $password = $_POST['password'];
echo $id= $_POST['client_id'];
echo $plan_ids= $_POST['plan_ids'];
echo $email_id= $_POST['email_id'];
echo $date=date('Y-m-d H:i:s');
echo $amount =0;
$status=1;


	
		if($conn)
		{
		 $sql =$conn->prepare('insert into add_retailer(`first_name`,`last_name`,`middle_name`,`gender`,`dob`,`mbl_num`,`address`,`add_client_ids`,`password`,`status`,`plan_ids`,`email_id`) 
		 VALUES(?,?,?,?,?,?,?,?,?,?,?,?)');
			 $sql->bindParam(1,$first_name);
			 $sql->bindParam(2,$last_name);
			 $sql->bindParam(3,$middle_name);
			 $sql->bindParam(4,$gender);
			 $sql->bindParam(5,$dob);
			 $sql->bindParam(6,$mbl_num);
			 $sql->bindParam(7,$address);
			 $sql->bindParam(8,$id);
			 $sql->bindParam(9,$password);
			 $sql->bindParam(10,$status);
			 $sql->bindParam(11,$plan_ids);
			 $sql->bindParam(12,$email_id);
		
		if($sql->execute())
				{
				echo "success";
				$last_id = $conn->lastInsertId();
            $sql1 =$conn->prepare('insert into wallet(`add_client_ids`,`amount`,`add_retailer_ids`,`date`)VALUES(?,?,?,?)');
			$sql1->bindParam(1,$id);
			$sql1->bindParam(2,$amount);
			$sql1->bindParam(3,$last_id);
			$sql1->bindParam(4,$date);
				 		
							 if($sql1->execute())
								{
									
									echo '<b style="color:green">Registration Completed Successfully</b>';
								}
								else
								{
								   echo '<b style="color:red">Invalid data1</b>';
								}
				
				
				}
		 else{
		 echo "fail";
		 }
		 }
		 else{
		 echo "qry fail";
		 }
		 }
		 else{
		 echo "insertion failed";
		 }
		 
			
		 
		