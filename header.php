<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <title>Brockport Forecasting Login</title>
    <link href="css/headerStyles.css" type="text/css" rel="stylesheet" />
		<link rel='shortcut icon' type='image/x-icon' href='src/favicon.ico' />
</head>
<body bgcolor="#F5F5F5">

		<!-- ====================== Begin Page Header ====================== -->

	    <img src="src/ForecastingLogo.png" alt="Brockport Forecasting Logo" align="left" style="width:;height:128px;">

   		<img src="src/Ellsworth.png" alt="Ellisworth Logo" align="right" style="width:;height:128px;">


		<h1 align="center">Brockport Forecasting System</h1>
        <p id="dateToDisplay" align="center"  style="font-size:25px; color:#00533E"></p>
        <script>
			var date = new Date();
			document.getElementById("dateToDisplay").innerHTML = date.toDateString();
		</script>

        <div id="nav">
            <div id="nav_wrapper">
                <ul>
                    <!-- <li><a href="/brockportforecasting/forecastoptions.php">Main Menu</a></li> -->
										<li>	<?php
														$firstName = (string)$_SESSION['first'];
														$lastName = (string)$_SESSION['last'];
														$access = (string)$_SESSION['access'];
                            if (isset($_SESSION['id']))
														{
																echo "<a href='#'>Welcome to your $access dashboard $firstName $lastName</a> </li><li>";
                                echo"<form action='login/logout.php'>
                                        <button >Logout</button>
                                    </form>";
                            }
														else
														{
                                /*
																echo"<form action='login/login.php' method='POST'>
                                        <input type='text' name='uid' placeholder='Username'>
                                        <input type='password' name='pwd' placeholder='Password'>
                                        <button type='submit'>Login</button>
                                    </form>";
																*/
																echo "<center><h4 style='color:white;'>Please Login with Your Username and Password</h4></center>";
                            }
                        ?>
                    </li>
                </ul>
            </div>
        </div>
        <!-- ====================== End Page Header ====================== -->
