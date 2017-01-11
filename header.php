<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <title>Brockport Forecasting Login</title>

		<link rel='shortcut icon' type='image/x-icon' href='src/favicon.ico' />
    <link href="css/headerStyles.css" type="text/css" rel="stylesheet" />

		<script language="javascript">
					function hasToBeNumber(evt)
					{
						var charCode = (evt.which) ? evt.which : event.keycode
						if (charCode > 31 && (charCode < 48 || charCode > 57))
							return false;
						return true;
					}

					function isZipCode(evt)
					{
						var charCode = (evt.which) ? evt.which : event.keycode
						if ((charCode > 31 && (charCode < 48 || charCode > 57)) && (charCode.length == 5))
							return false;
						return true;
					}

					function hasToBeLetter(evt)
					{
						var charCode = (evt.which) ? evt.which : event.keycode
						if  ((charCode > 31 && (charCode < 65 || charCode > 90)) && (charCode > 31 && (charCode < 97 || charCode > 122)))
							return false;
						return true;
					}

					function hasToBeNumberOrLetter(evt)
					{
						var charCode = (evt.which) ? evt.which : event.keycode
						if  ((charCode > 31 && (charCode < 48 || charCode > 57)) && (charCode > 31 && (charCode < 65 || charCode > 90)) && (charCode > 31 && (charCode < 97 || charCode > 122)))
							return false;
						return true;
					}

					function isTime(evt)
					{
						var charCode = (evt.which) ? evt.which : event.keycode
						if ((charCode > 31 && (charCode < 58 || charCode > 58)) && (charCode > 31 && (charCode < 48 || charCode > 57)) && (charCode > 31 && (charCode < 65 || charCode > 90)) &&
							(charCode > 31 && (charCode < 97 || charCode > 122)))
							return false;
						return true;
					}

					function isTextNameKey(evt)
					{
						var charCode = (evt.which) ? evt.which : event.keycode
						if  ((charCode > 31 && (charCode < 65 || charCode > 90)) && (charCode > 31 && (charCode < 97 || charCode > 122)) && (charCode > 31 && (charCode < 45 || charCode > 45)) &&
						(charCode > 31 && (charCode < 39 && charCode > 39)) && (charCode > 31 && (charCode < 92 && charCode > 92)))
							return false;
						return true;
					}

					function isTextCityOrPersonKey(evt)
					{
						var charCode = (evt.which) ? evt.which : event.keycode
						if  ((charCode > 31 && (charCode < 65 || charCode > 90)) && (charCode > 31 && (charCode < 97 || charCode > 122)) && (charCode > 31 && (charCode < 45 || charCode > 45)) && (charCode > 31 && (charCode < 32 || charCode > 32)) &&
						(charCode > 31 && (charCode < 39 || charCode > 39)) && (charCode > 31 && (charCode < 92 || charCode > 92)))
							return false;
						return true;
					}

					function isKey(evt)
					{
						var charCode = (evt.which) ? evt.which : event.keycode
						if ((charCode > 31 && (charCode < 65 || charCode > 90)) && (charCode > 31 && (charCode < 97 || charCode > 122)) && (charCode > 31 && (charCode < 48 || charCode > 58)) &&
						(charCode > 31 && (charCode < 45 || charCode > 45)) && (charCode > 31 && (charCode < 46 || charCode > 46)) && (charCode > 31 && (charCode < 95 || charCode > 95)))
							return false;
						return true;
					}

					function isEmail(evt)
					{
						var charCode = (evt.which) ? evt.which : event.keycode
						if ((charCode > 31 && (charCode < 47 || charCode > 47)) && (charCode > 31 && (charCode < 39 || charCode > 39)) && (charCode > 31 && (charCode < 92 || charCode > 92)))
							return true;
						return false;
					}

					function isPhoneNumber1()
					{
						var phonenumber = document.getElementById("phone1").value;
						if (phonenumber != "")
						{
							var pattern = /^\d{3}-\d{3}-\d{4}$/;
							if (phonenumber.match(pattern))
								return;
							else
							{
								alert("Invalid Phone Number, must be in the format ###-###-####");
								document.getElementById("phone1").value = "";
							}
						}
					}

					function isPhoneNumber2()
					{
						var phonenumber = document.getElementById("phone2").value;
						if (phonenumber != "")
						{
							var pattern = /^\d{3}-\d{3}-\d{4}$/;
							if (phonenumber.match(pattern))
								return;
							else
							{
								alert("Invalid Phone Number, must be in the format ###-###-####");
								document.getElementById("phone2").value = "";
							}
						}
					}

					function hasToBeDate()
					{
						var mydate = document.getElementById("date").value;
						var pattern = /^\d{4}-\d{2}-\d{2}$/;
						if (mydate.match(pattern))
							return;
						else
						{
							alert("Invalid Date Format, must be in the format YYYY-MM-DD");
							document.getElementById("date").value = "";
						}
					}

					function checkpwds()//checks to make sure passwords are identical
					{
						var pwd1 = document.getElementById("pwd").value;
						var pwd2 = document.getElementById("pwdcheck").value;
						if (pwd2 != "")
						{
							if (pwd1 != pwd2)
							{
								document.getElementById("pwdcheck").value = "";
								document.getElementById("pwdcheck").focus();
								alert("Passwords do not match");
							}
						}
					}

		</script>
</head>
<body bgcolor="#F5F5F5">

		<!-- ====================== Begin Page Header ====================== -->

	    <img src="src/ForecastingLogo.png" alt="Brockport Forecasting Logo" align="left" style="width:;height:128px;">

   		<img src="src/Ellsworth.png" alt="Ellisworth Logo" align="right" style="width:;height:128px;">


		<h1 align="center" style="text-shadow: 0 0 4px #FFD405;"><font color='#002B21'>Brockport Golden Eagle Forecast</font></h1>
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
														$netID = (string)$_SESSION['uid'];
                            if (isset($_SESSION['id']))
														{
																echo "<a href='index.php'>$firstName $lastName's $access dashboard</a> </li><li>";
																echo "<a href='changepassword.php'>Change Password</a> </li><li>";
																echo "<a href='login/logout.php'>Logout</a> </li><li>";
                            }
														else
														{
																echo "<a href='index.php'>Please Login with Your Username and Password</a></li><li>";
																//echo "<center><h4 style='color:white;'>Please Login with Your Username and Password</h4></center>";
                            }
                        ?>
                    </li>
                </ul>
            </div>
        </div>
				<br>
				<!-- =========================End of Header======================== -->
