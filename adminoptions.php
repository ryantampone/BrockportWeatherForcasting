<?php
	include 'header.php';
	include 'login/identify.php'
?>


<?php
	if ((isset($_SESSION['id'])) && ((string)$_SESSION['access'] == 'admin'))
	{
		echo
			"
			 <div id='callToAction'>
            	<h3 align='center'>Fill out the user information below</h3>
        	 </div>

    		<center>
        		<form action='/brockportforecasting/new_user_ui_form.php'><button >Register User</button></form>
    		</center>

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
