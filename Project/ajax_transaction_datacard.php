<?php
include '../config/connections.php';
$s ="insert into transaction_retailer (`operator_ids`,`datacard_num`,`amount`,`service_ids`,`add_client_ids`,`add_retailer_ids`,`date`) values (";
$count=0;
echo $operator_ids = $_REQUEST['operator_ids'];
echo $datacard_num = $_REQUEST['datacard_num'];
 echo $amount =$_REQUEST['amount'];
echo $service_ids =$_REQUEST['service_ids'];
echo $add_client_ids =$_REQUEST['add_client_ids'];
echo $add_retailer_ids =$_REQUEST['add_retailer_ids'];
echo $date=date('Y-m-d H:i:s');

if ($operator_ids!='')
{
	if($count==0){
	
	$s.=  "'".$operator_ids."'";
    $count++;
	}
   else{
	  $s.= "'".$operator_ids."'";
   }
}

if ($datacard_num!='')
{
	if($count==0){
	
	$s.=  ",'".$datacard_num."'";
    $count++;
	}
   else{
	  $s.= ",'".$datacard_num."'";
   }
}

if ($amount!='')
{
	if($count==0){
	
	$s.=  ",'".$amount."'";
    $count++;
	}
   else{
	  $s.= ",'".$amount."'";
   }
}

 if ($service_ids!='')
 {
	 if($count==0){
	
	 $s.=  ",'".$service_ids."'";
     $count++;
	 }
    else{
	   $s.= ",'".$service_ids."'";
    }
	}

if ($add_client_ids!='')
{
	if($count==0){
	
	$s.=  ",'".$add_client_ids."'";
    $count++;
	}
   else{
	  $s.= ",'".$add_client_ids."'";
   }
}

if ($add_retailer_ids!='')
{
	if($count==0){
	
	$s.=  ",'".$add_retailer_ids."'";
    $count++;
	}
   else{
	  $s.= ",'".$add_retailer_ids."'";
   }
}

if ($date!='')
{
	if($count==0){
	
	$s.=  ",'".$date."'";
    $count++;
	}
   else{
	  $s.= ",'".$date."'";
   }
}


$s.=")";
echo $s;
$result = mysql_query($s);
if($result){
	$msg="Hello datacard";
	 echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}
 ?>
			 