<?php
	include 'header.php';
?>


<?php
	if ((isset($_SESSION['id'])) && ((string)$_SESSION['access'] == 'student' || (string)$_SESSION['access'] == 'admin'))
	{
		echo "
			<center><h2>Please enter your forecast data</h2></center>
				<form action='student_submit_forecast.php' method='post'>
						<table align='center'>
								<tr>
										<td><span align='right'>Sport:</span></td>
										<td><input name='sport' id='sport' TYPE='text' SIZE='50' placeholder='e.g. Golf' onKeyPress='return isTextCityOrPersonKey(event)' onpaste='return false' maxlength='48' required/></td>
								</tr>
								<tr>
										<td><span align='right'>Date of Game:</span></td>
										<td><input name='date' id='date' TYPE='text' SIZE='50' placeholder='YYYY-MM-DD' onblur='hasToBeDate()' onpaste='return false' maxlength='10' required/></td>
								</tr>
								<tr>
										<td><span align='right'>Time of Game:</span></td>
										<td><input name='gametime' id='gametime' TYPE='text' SIZE='50' placeholder='e.g. 1PM' onKeyPress='return isTime(event)' onpaste='return false' maxlength='12' required/></td>
								</tr>
								<tr>
										<td><span align='right'>Location:</span></td>
										<td><input name='location' id='location' TYPE='text' SIZE='50' onKeyPress='return isTextCityOrPersonKey(event)' onpaste='return false' maxlength='100' required/></td>
								</tr>
								<tr>
										<td><span align='right'>Forecast:</span></td>
										<td><input name='forecast' id='forecast' TYPE='text' SIZE='50' onKeyPress='return isTextCityOrPersonKey(event)' onpaste='return false' maxlength=100' required/></td>
								</tr>
								<tr>
										<td><span align='right'>Temperature High (&deg;F):</span></td>
										<td><input name='temperaturehigh' id='temperaturehigh' TYPE='text' SIZE='50' placeholder='e.g. 50 (&deg;F will be added automatically)' onKeyPress='return hasToBeNumber(event)' onpaste='return false' maxlength='3' required/></td>
								</tr>
								<tr>
										<td><span align='right'>Temperature Low (&deg;F): </span></td>
										<td><input name='temperaturelow' id='temperaturelow' TYPE='text' SIZE='50' placeholder='e.g. 48 (&deg;F will be added automatically)' onKeyPress='return hasToBeNumber(event)' onpaste='return false' maxlength='3' required/></td>
								</tr>
								<tr>
										<td><span align='right'>Wind Speed (MPH):</span></td>
										<td><input name='windspeed' id='windspeed' TYPE='text' SIZE='50' placeholder='e.g. 3 (MPH will be added automatically)' onKeyPress='return hasToBeNumber(event)' onpaste='return false' maxlength='15' required/></td>
								</tr>
								<tr>
										<td><span align='right'>Wind Direction:</span></td>
								</tr>
							</table>
							<table align='center' style='padding-top: 10px; padding-bottom: 10px;'>
								<tr>
										<td style='padding-right: 20px;'>
												<input TYPE='radio' name='winddirection' id='winddirection' value='North' checked='checked'>North<br>
												<input TYPE='radio' name='winddirection' id='winddirection' value='North Northeast'>North Northeast<br>
												<input TYPE='radio' name='winddirection' id='winddirection' value='Northeast'>Northeast<br>
												<input TYPE='radio' name='winddirection' id='winddirection' value='East Northeast'>East Northeast<br>
										</td>
										<td style='padding-right: 20px;'>
												<input TYPE='radio' name='winddirection' id='winddirection' value='East'>East<br>
												<input TYPE='radio' name='winddirection' id='winddirection' value='East Southeast'>East Southeast<br>
												<input TYPE='radio' name='winddirection' id='winddirection' value='Southeast'>Southeast<br>
												<input TYPE='radio' name='winddirection' id='winddirection' value='South Southeast'>South Southeast<br>
										</td>
										<td style='padding-right: 20px;'>
												<input TYPE='radio' name='winddirection' id='winddirection' value='South'>South<br>
												<input TYPE='radio' name='winddirection' id='winddirection' value='South Southwest'>South Southwest<br>
												<input TYPE='radio' name='winddirection' id='winddirection' value='Southwest'>Southwest<br>
												<input TYPE='radio' name='winddirection' id='winddirection' value='West Southwest'>West Southwest<br>
										</td>
										<td>
												<input TYPE='radio' name='winddirection' id='winddirection' value='West'>West<br>
												<input TYPE='radio' name='winddirection' id='winddirection' value='West Northwest'>West Northwest<br>
												<input TYPE='radio' name='winddirection' id='winddirection' value='Northwest'>Northwest<br>
												<input TYPE='radio' name='winddirection' id='winddirection' value='North Northwest'>North Northwest<br>
										</td>
								</tr>
							</table>
							<table align='center'>
								<tr>
										<td><span align='right'>Chance of Precipitation:</span></td>
										<td><input name='chanceofprecipitation' id='chanceofprecipitation' TYPE='text' placeholder='e.g. 50 (% will be added automatically)' SIZE='50' maxlength='3' onKeyPress='return hasToBeNumber(event)' onpaste='return false' required/></td>
								</tr>
								<tr>
										<td><span align='right'>Amount of Precipitation:</span></td>
										<td><input name='amountofprecipitation' id='amountofprecipitation' TYPE='text' placeholder='e.g. 2 (need to automatically add inches unit)' onKeyPress='return isEmail()' TYPE='text' SIZE='50' required/></td>
								</tr>
								<tr>
										<td><span align='right'>Forecast Discussion:</span></td>
										<td><textarea rows='8' cols='46' name='discussion' id='discussion'></textarea></td>
								</tr>
								<tr>
										<td><span align='right'>Forecaster First Name:</span></td>
										<td><input name='forecasterfn' id='forecasterfn' TYPE='text' SIZE='50' placeholder='e.g. Jane' onKeyPress='return isTextCityOrPersonKey(event)' onpaste='return false' maxlength='25' value='$firstName' required/></td>
								</tr>
								<tr>
										<td><span align='right'>Forecaster Last Name:</span></td>
										<td><input name='forecasterln' id='forecasterln' TYPE='text' SIZE='50' placeholder='e.g. Doe' onKreyPress='return isTextCityOrPersonKey(event)' onpaste='return false' maxlength='25' value='$lastName' required/></td>
								</tr>
						</table>
						<input name='netID' id='netID' TYPE='hidden' value='$netID'/>
						<p align='center'>
								<input type='submit' value='Submit'/>
								<input type='reset' value='Reset'/>
						</p>
				</form>
			";
	}
	else
	{
		//echo "<script type='text/javascript'>alert('Please login to view this page')</script>";
		session_destroy();
		echo "<SCRIPT LANGUAGE='JavaScript'>
			 window.alert('Please Login as an Student to View This Page')
			 window.location.href='index.php';
			 </SCRIPT>";
	}
?>

</body>
</html>
