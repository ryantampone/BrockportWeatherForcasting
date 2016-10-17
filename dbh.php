<?php
$conn = mysql_connect("csdb.brockport.edu", "rtamp1", "mitra423", "rtamp1_spring16_1");

if (!$conn) 
{
	echo "Unable to connect to DB: " . mysql_error();
       exit;
}

?>
