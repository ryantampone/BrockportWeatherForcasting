<?php
		session_start();

		include '../dbh.php';

		$uid = $_POST['uid'];
		$pwd = $_POST['pwd'];

		$group = 'test';

		$sql = "SELECT * FROM user WHERE uid='$uid' AND pwd='$pwd' AND status='Active'";
		$result = $conn->query($sql);

		if(!$row = mysqli_fetch_assoc($result))
		{
			//echo "Your username or password is incorrect";

			echo "<SCRIPT LANGUAGE='JavaScript'>
				 window.alert('Unable to login: Check your NetID and password and try again or signup for an account')
				 window.location.href='../index.php';
				 </SCRIPT>";

		}
		else
		{
			$_SESSION['id'] = $row['id'];
			$_SESSION['access'] = $row['access'];
			$_SESSION['first'] = $row['first'];
			$_SESSION['last'] = $row['last'];
			$group = $row['access'];
		}


		if ($group == 'admin')
		{
			header('Location: ../adminoptions.php');
		}
		else if ($group == 'student')
		{
			header('Location: ../studentoptions.php');
		}
		else if ($group == 'coach')
		{
			header('Location: ../coachoptions.php');
		}

?>
