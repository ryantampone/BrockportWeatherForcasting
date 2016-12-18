<?php
	include 'header.php';
?>


<?php
	if ((isset($_SESSION['id'])) && ((string)$_SESSION['access'] == 'coach' || (string)$_SESSION['access'] == 'admin'))
	{
		echo
			"
			 <div id='callToAction'>
            	<h3 align='center'>Welcome Coach</h3>
        	 </div>
			";
	}
	else
	{
		//echo "<script type='text/javascript'>alert('Please login to view this page')</script>";
		session_destroy();
		echo "<SCRIPT LANGUAGE='JavaScript'>
			 window.alert('Please Login as an Coach to View This Page')
			 window.location.href='index.php';
			 </SCRIPT>";
	}
?>

</body>
</html>
