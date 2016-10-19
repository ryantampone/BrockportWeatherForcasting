<?php
	include 'header.php';
?>


<?php
	if (isset($_SESSION['id']))
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
		echo "<script type='text/javascript'>alert('Please login to view this page')</script>";
	}
?>
        
</body>
</html>
