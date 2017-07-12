<?php
//=============Configuring Server and Database=======
$host        =    'localhost';
$user        =    'root';
$password    =    '';
$database    =    'recharge';
$conn        =    mysql_connect($host,$user,$password) or die('Server Information is not Correct');
mysql_select_db($database,$conn) or die('Database Information is not correct');
?>