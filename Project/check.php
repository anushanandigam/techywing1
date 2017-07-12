<?php
include("../config/config.php");
session_start();
$add_retailer_ids=$_SESSION['add_retailer_id'];
if(isset($_POST['mobilerecharge-service_number']))
{	
$mobile=$_POST['mobilerecharge-service_number'];
$amount=$_POST['mobilerecharge-amount'];
$operator=$_POST['mobilerecharge-operator'];
	if($conn)
	{
	$sql=$conn->prepare('select * from wallet where add_retailer_ids=?');
	$sql->bindParam(1,$add_retailer_ids);
		if($sql->execute())
		{
			if(count($sql) > 0)
			{
				$row=$sql->fetch(PDO::FETCH_OBJ);
				$wamount=$row->amount;
					if($wamount != 0)
					{
						$sql1=$conn->prepare('SELECT cm.add_client_ids cid,cm.operator_margin cmom,mm.operator_margin mmom FROM client_margin cm left join mobile_margin mm on cm.operator_ids=mm.operator_name WHERE cm.operator_ids=? and cm.add_retailer_ids=?');
						$sql1->bindParam(1,$operator);
						$sql1->bindParam(2,$add_retailer_ids);
						if($sql1->execute())
						{
							$row1=$sql1->fetch(PDO::FETCH_OBJ);
							 echo $rmargin=$row1->cmom;
							 echo $cmargin=$row1->mmom;
							 echo $cid=$row1->cid;
							/*  -----this is for retailer--- */
								$x=$cmargin/100*$amount;
								$y=$rmargin/100*$amount;
								$z=$amount-$y;
								$b=$x-$y;
						/*  -----end for retailer--- */
					
								$sql2=$conn->prepare('update wallet set amount=amount-? where add_retailer_ids=?');
								$sql2->bindParam(1,$z);
								$sql2->bindParam(2,$add_retailer_ids);
									if($sql2->execute())
									{
								$sql3=$conn->prepare('update client_wallet set client_amount=client_amount+? where client_ids=?');
										$sql3->bindParam(1,$b);
										$sql3->bindParam(2,$cid);
											if($sql3->execute())
											{
												echo 'update done';	
											}
											else
											{
												echo 'noo';
											}
									}
									else
									{
										echo 'no update';	
									}
						}
					}	
			}
		}
	}
}



$sql4 =$conn->prepare('insert into transaction_retailer (`operator_ids`,`mbl_num`,`amount`,`service_ids`,`add_client_ids`,`add_retailer_ids`,`date`) values (?,?,?,?,?,?,?)');

	$sql4->bindParam(1,$operator_ids);
	$sql4->bindParam(2,$mbl_num);
	$sql4->bindParam(3,$amount);
	$sql4->bindParam(4,$service_ids);
	$sql4->bindParam(5,$add_client_ids);
	$sql4->bindParam(6,$add_retailer_ids);
	$sql4->bindParam(7,$date);
if($sql4->execute())
		{
			echo "executed";
	}
	else{
		echo "not";
	}
	}
	else{
		echo "else in";
	}
?>