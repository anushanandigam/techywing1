<?php
session_start();
include("../config/config.php");
if(isset($_POST['signin_emailid']))
{
$signin_emailid=$_POST['signin_emailid'];
$signin_pwd=$_POST['pwd'];

if($conn)
		{
			
		 $sql1 =$conn->prepare('select * from registration_users where signup_user_email=? AND signup_user_pwd=?');
		 $sql1->bindParam(1,$signin_emailid);
		 $sql1->bindParam(2,$signin_pwd);
		 if($sql1->execute())
			 {
				 
				//echo $count= $sql1->rowCount();
				while($row2=$sql1->fetch(PDO::FETCH_OBJ))
	         {
				echo $signup_user_id= $row2->signup_user_id;
				echo $signup_user_name= $row2->signup_user_name;
				
				echo $_SESSION['signup_user_id']=$signup_user_id;
				echo $_SESSION['signup_user_name']=$signup_user_name;
		       
				
		   		//header('location:../project/index.php');

			 }}
						else
					{
						echo 'invalid data';
				
					}

		}	
else{
echo "<script>alert('email id or password is incorrect!')</script>";
}	
}
else{
	echo 'no db';
}
?>
    