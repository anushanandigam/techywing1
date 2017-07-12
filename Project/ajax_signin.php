<?php
session_start();
include("../config/config.php");
if(isset($_POST['mbl_num']))
{
echo $mbl_num = $_POST['mbl_num'];
echo $password = $_POST['password'];

if($conn)
		{
				
		 $sql1 =$conn->prepare('select * from add_retailer where mbl_num=? AND password=?');
		 $sql1->bindParam(1,$mbl_num);
		 $sql1->bindParam(2,$password);
		 if($sql1->execute())
			 {
				 
				//echo $count= $sql1->rowCount();
				while($row2=$sql1->fetch(PDO::FETCH_OBJ))
	         {
				echo $mbl_num= $row2->mbl_num;
				echo $password= $row2->password;
				echo $add_retailer_ids=$row2->add_retailer_id;
				echo $add_client_ids=$row2->add_client_ids;
				echo $plan_ids=$row2->plan_ids;
	
				
				echo $_SESSION['mbl_num']=$mbl_num;
				echo $_SESSION['password']=$password;
				echo $_SESSION['add_retailer_ids']=$add_retailer_ids;
				echo $_SESSION['add_client_ids']=$add_client_ids;
				echo $_SESSION['plan_ids']=$plan_ids;
				
		       
				
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
    