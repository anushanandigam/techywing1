<?php 
include("../config/config.php");

if(isset($_POST['signup_user_name']))
{	
echo $signup_user_name = $_POST['signup_user_name'];
echo $signup_user_email = $_POST['signup_user_email'];
echo $signup_user_phoneNo = $_POST['signup_user_phoneNo'];
echo $signup_user_pwd = $_POST['signup_user_pwd'];
echo $signup_user_confirm_pwd = $_POST['signup_user_confirm_pwd'];
echo $date=date('Y-m-d H:i:s');
echo $amount =0;
	
	
		if($conn)
		{
		 $sql =$conn->prepare('insert into registration_users(`signup_user_name`,`signup_user_email`,`signup_user_phoneNo`,`signup_user_pwd`,`signup_user_confirm_pwd`)
		 VALUES(?,?,?,?,?)');
			 $sql->bindParam(1,$signup_user_name);
			 $sql->bindParam(2,$signup_user_email);
			 $sql->bindParam(3,$signup_user_phoneNo);
			 $sql->bindParam(4,$signup_user_pwd);
			 $sql->bindParam(5,$signup_user_confirm_pwd);
			 
			 
			 
		if($sql->execute())
				{
				echo "success";
				echo $last_id = $conn->lastInsertId();
            $sql1 =$conn->prepare('insert into user_wallet(`signup_user_ids`,`amount`,`date`)VALUES(?,?,?)');
			$sql1->bindParam(1,$last_id);
			$sql1->bindParam(2,$amount);
			$sql1->bindParam(3,$date);
				 		
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
		 ?>