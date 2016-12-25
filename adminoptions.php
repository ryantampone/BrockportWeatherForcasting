<?php
	include 'header.php';
	include 'login/identify.php';
	echo"
		<link href='css/cardStyles.css' type='text/css' rel='stylesheet'/>
		<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
	";
?>


<?php
	if ((isset($_SESSION['id'])) && ((string)$_SESSION['access'] == 'admin'))
	{
		echo "
		<div class='cardContainer' style='text-align: center'>
			<div class='cardBody'>
				<div class='cardHeader'>
						<div class='cardHeaderTitle'>
								Testing CSS
						</div>
				</div>
			</div>
		";
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
