<?php
include("../config/config.php");
$count=0;
 $operator_ids = $_REQUEST['operator_ids'];
//echo $subscriber_id = $_REQUEST['subscriber_id'];
 $mbl_num = $_REQUEST['mbl_num'];
 echo $plan_ids=$_REQUEST['plan_ids'];
$amount =$_REQUEST['amount'];
 $service_ids =$_REQUEST['service_ids'];
 $add_client_ids =$_REQUEST['add_client_ids'];
 $add_retailer_ids =$_REQUEST['add_retailer_ids'];
 $date=date('Y-m-d H:i:s');
if($conn)
	{
	$sql=$conn->prepare('select * from wallet where add_retailer_ids=?');
	$sql->bindParam(1,$add_retailer_ids);
		if($sql->execute())
		{

		if(count($sql) > 0)
			{
				$row=$sql->fetch(PDO::FETCH_OBJ);
				echo $wamount=$row->amount;
					if($wamount != 0 )
					{
						echo " in wamount";
						$sql1=$conn->prepare('select * from mobile_margin where add_client_ids=? and operator_name=?');
						$sql1->bindParam(1,$add_client_ids);
						$sql1->bindParam(2,$operator_ids);
							if($sql1->execute())
						{
							$row1=$sql1->fetch(PDO::FETCH_OBJ);
								echo 'client margin:';
								echo $client_margin=$row1->operator_margin;
								echo '<br>';
						$sql4=$conn->prepare('select * from client_margin where add_client_ids=? and operator_ids=?');
						$sql4->bindParam(1,$add_client_ids);
						$sql4->bindParam(2,$operator_ids);
							if($sql4->execute())
						{
							$row4=$sql4->fetch(PDO::FETCH_OBJ);
																echo 'retaile margin:';

								echo $retailer_margin=$row4->operator_margin;
							

							echo '<br>';
							/*  -----this is for retailer--- */
								echo $x=$client_margin/100*$amount;
								echo '<br>';
								echo $y=$retailer_margin/100*$amount;
								echo '<br>';
								echo $z=$amount-$y;
								echo '<br>';
								echo $b=$x-$y;	
						/*  -----end for retailer--- */
					
								$sql2=$conn->prepare('update wallet set amount=amount-? where add_retailer_ids=?');
								$sql2->bindParam(1,$z);
								$sql2->bindParam(2,$add_retailer_ids);
									if($sql2->execute())
									{
								$sql3=$conn->prepare('update client_wallet set amount=amount+? where add_client_ids=?');
										$sql3->bindParam(1,$b);
										$sql3->bindParam(2,$add_client_ids);
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
									$sql5 =$conn->prepare('insert into transaction_retailer (`operator_ids`,`mbl_num`,`amount`,`service_ids`,`add_client_ids`,`add_retailer_ids`,`date`) values (?,?,?,?,?,?,?)');

	$sql5->bindParam(1,$operator_ids);
	$sql5->bindParam(2,$mbl_num);
	$sql5->bindParam(3,$amount);
	$sql5->bindParam(4,$service_ids);
	$sql5->bindParam(5,$add_client_ids);
	$sql5->bindParam(6,$add_retailer_ids);
	$sql5->bindParam(7,$date);
if($sql5->execute())
		{
			echo "executed";
	}
	else{
		echo "not";
	}
	
	
	
						}
						else{
							echo "sql4 execute fail";
						}
						}
						else{
							echo "sql 1 execute fail";
						}
			}
			else{
				echo "amount fail";
			}
			}
			else{
				echo "sql count fail";
			}
			}
			else{
				echo "sql execute fail";
			}
	}
	else{
		echo "no conn";
	}

 ?>
			 