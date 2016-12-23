<?php
	include 'header.php';
	include 'login/identify.php';
	echo"<link href='css/cardStyles.css' type='text/css' rel='stylesheet' />";
?>


<?php
	if ((isset($_SESSION['id'])) && ((string)$_SESSION['access'] == 'admin'))
	{
		
	}
	else
	{
		//echo "<script type='text/javascript'>alert('Please login to view this page')</script>";
		session_destroy();
		echo "<SCRIPT LANGUAGE='JavaScript'>
			 window.alert('Please Login as an Admin to View This Page')
			 window.location.href='index.php';
			 </SCRIPT>";
	}
?>

</body>
</html>
