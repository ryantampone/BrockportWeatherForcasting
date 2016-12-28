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

					function checkZipCode()
					{
						var myZip = document.getElementById("zip").value;
						if (myZip.length < 5)
						{
							document.getElementById("zip").value = "";
							//alert("ERROR: The Zip Code field must contain 5 numbers. Please try again.");
						}

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
						(charCode > 31 && (charCode < 39 && charCode > 39)) && (charCode > 31 && (charCode < 92 && charCode > 92)))
							return false;
						return true;
					}

					function isPhoneNumber()
					{
						var phonenumber = document.getElementById("phone").value;
						var pattern = /^\d{3}-\d{3}-\d{4}$/;
						if (phonenumber.match(pattern))
							return;
						else
						{
							alert("Invalid Phone Number, must be in the format ###-###-####");
							document.getElementById("phone").value = "";
						}
					}

					// Do not need this function - recent update allows user to enter backslash and apostrophe
					/*function anythingButQuotesOrSlash(evt)
					{
					var charCode = (evt.which) ? evt.which : event.keycode

					// Allows: anything but single quote (') and backslash (\)
					if (charCode > 31 && (charCode < 39 || charCode > 39) && (charCode > 31 && (charCode < 92 || charCode > 92)))
						return true;
					return false;

				}*/

					// Do not need password function - user can type any character in password field
					/*function isPasswordKey(evt)
					{
						var charCode = (evt.which) ? evt.which : event.keycode

						// Allows: anything but single quote (') and backslash (\)
						if (charCode > 31 && (charCode < 39 || charCode > 39) && (charCode > 31 && (charCode < 92 || charCode > 92)))
							 return true;
						return false;

					}*/

					function isAddressKey(evt)
					{
						var charCode = (evt.which) ? evt.which : event.keycode

						// Allows: A-Z, a-z, space, numbers, hyphens, apostrophe/backslash
						if ((charCode > 31 && (charCode < 48 || charCode > 57)) && (charCode > 31 && (charCode < 65 || charCode > 90)) && (charCode > 31 && (charCode < 97 || charCode > 122)) && (charCode > 31 && (charCode < 32 || charCode > 32)) &&
						(charCode > 31 && (charCode < 45 || charCode > 45)) && (charCode > 31 && (charCode < 39 && charCode > 39)) && (charCode > 31 && (charCode < 92 && charCode > 92)))
							return false;
						return true;
					}

					// item
					function isOnlyCharacter(evt)
					{
						var charCode= (evt.which) ? evt.which: event.keycode
							if(charCode > 65 || charCode < 91 || charCode > 96 || charCode < 123)
								return true;
							return false;
					}

					function isItemCost()
					{
						var itemcost = document.getElementById("ItemCost").value;
						var pattern = /^\d+.\d{2}$/;
						if (itemcost.match(pattern))
							return;
						else
						{
							alert("Invalid Item Cost");
							document.getElementById("ItemCost").value = "";
						}

					}


					function isItemRetail()
					{
						var itemretail = document.getElementById("ItemRetail").value;
						var pattern = /^\d+.\d{2}$/;
						if (itemretail.match(pattern) || itemretail == "")
							return;
						else
						{
							alert("Invalid Item Retail");
							document.getElementById("ItemRetail").value = "";
						}
					}

					function isImageFileName(evt)
					{
						var charCode = document.getElementById("ImageFileName").value;
						if(charCode.match(/[\d\D_.\/-]*/))
									return true;
							return false;
					}


					function check_dept(o) {
				 /*switch(document.getElementById('Department').value){
						case 'Meat Department':
							document.getElementById('Category_1').innerHTML = 'Beef';
							document.getElementById('Category_2').innerHTML = 'Chicken';
							document.getElementById('Category_3').innerHTML = 'Turkey';
							document.getElementById('Category_4').innerHTML = 'Other';
							break;

						case 'Candy Department':
							document.getElementById('Category_1').innerHTML = 'Chocolate';
							document.getElementById('Category_2').innerHTML = 'Gummy & Chewy Candy';
							document.getElementById('Category_3').innerHTML = 'Other';
							break;

						case 'Cookies/Crackers Department':
							document.getElementById('Category_1').innerHTML = 'Crackers';
							document.getElementById('Category_2').innerHTML = 'Cookies';
							document.getElementById('Category_3').innerHTML = 'Other';
							break;

						case 'Baked Goods':
							document.getElementById('Category_1').innerHTML = 'Donuts';
							document.getElementById('Category_2').innerHTML = 'Pie';
							document.getElementById('Category_3').innerHTML = 'Other';
							break;

						case 'Dairy Department':
							document.getElementById('Category_1').innerHTML = 'Beverage';
							document.getElementById('Category_2').innerHTML = 'Food';
							break;

						default:
							document.getElementById('Category_1').innerHTML = 'Alcohol';
							document.getElementById('Category_2').innerHTML = 'Soda';
							document.getElementById('Category_3').innerHTML = 'Water';
							document.getElementById('Category_4').innerHTML = 'Other';

						}*/

							myDoc = document.getElementById('Category');

							if(!myDoc)
								return;

							var myCategoryItems = new Array();
							myCategoryItems['Baked Goods']=['Donuts','Pie','Other'];
							myCategoryItems['Beverages Department']=['Alcohol','Soda','Water','Other'];
							myCategoryItems['Candy Department']=['Chocolate','Gummy & Chewy Candy','Other'];
							myCategoryItems['Cookies/Crackers Department']=['Crackers','Cookies','Other'];
							myCategoryItems['Dairy Department']=['Beverage','Food'];
							myCategoryItems['Meat Department']=['Beef','Chicken','Turkey','Other'];

							myDoc.options.length = 0;
							cur = myCategoryItems[o.options[o.selectedIndex].value];

							if(!cur)
								return;

							myDoc.options.length = cur.length;
							for(var i = 0; i < cur.length; i++)
							{
								myDoc.options[i].text = cur[i];
								myDoc.options[i].value = cur[i];
							}
				}

				function checkQty(count)
				{
					var stockid = 'stock'.concat(count);
					var returnid = 'return'.concat(count);
					var stocknum = Number(document.getElementById(stockid).value);
					var returnnum = Number(document.getElementById(returnid).value);

					if (returnnum > stocknum)
					{
						alert("ERROR: Cannot return more items than are in stock. Please enter a number less than or equal to the quantity in stock.");
						document.getElementById(returnid).value = "";
					}
				}

		</script>
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
																echo "<a href='index.php'>$firstName $lastName's $access dashboard</a> </li><li>";
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
				<br><br>

				<!-- ====================== End Page Header ====================== -->
