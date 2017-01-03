<?php
	include 'header.php';
?>


<?php
	if ((isset($_SESSION['id'])) && ((string)$_SESSION['access'] == 'student' || (string)$_SESSION['access'] == 'admin'))
	{
		echo
			"
			<center><h2>Please enter your forecast data</h2></center>
				<form action='student_submit_forecast.php' method='post'>
						<table align='center'>
								<tr>
										<td><span align='right'>Sport:</span></td>
										<td><input name='sport' id='sport' TYPE='text' SIZE='50' placeholder='e.g. Golf' onKeyPress='isTextCityOrPersonKey(event)' onpaste='return false' maxlength='48' required/></td>
								</tr>
								<tr>
										<td><span align='right'>Date of Game:</span></td>
										<td><input name='date' id='date' TYPE='text' SIZE='50' placeholder='YYYY-MM-DD' onblur='hasToBeDate()' onpaste='return false' maxlength='10' required/></td>
								</tr>
								<tr>
										<td><span align='right'>Time of Game:</span></td>
										<td><input name='gametime' id='gametime' TYPE='text' SIZE='50' placeholder='e.g. 1PM' onpaste='return false' maxlength='12' required/></td>
								</tr>
								<tr>
										<td><span align='right'>Location:</span></td>
										<td><input name='location' id='location' TYPE='text' SIZE='50' isTextCityOrPersonKey(event)' onpaste='return false' maxlength='100' required/></td>
								</tr>
								<tr>
										<td><span align='right'>Forecast:</span></td>
										<td><input name='forecast' id='forecast' TYPE='text' SIZE='50' onKeyPress='isTextCityOrPersonKey(event)' onpaste='return false' maxlength=100' required/></td>
								</tr>
								<tr>
										<td><span align='right'>Temperature High (°F):</span></td>
										<td><input name='temperaturehigh' id='temperaturehigh' TYPE='text' SIZE='50' placeholder='e.g. 50 (°F will be added automatically)' onKeyPress='hasToBeNumber(event)' onpaste='return false' maxlength='3' required/></td>
								</tr>
								<tr>
										<td><span align='right'>Temperature Low (°F): </span></td>
										<td><input name='temperaturelow' id='temperaturelow' TYPE='text' SIZE='50' placeholder='e.g. 48 (°F will be added automatically)' onKeyPress='hasToBeNumber(event)' onpaste='return false' maxlength='3' required/></td>
								</tr>
								<tr>
										<td><span align='right'>Wind Speed (MPH):</span></td>
										<td><input name='windspeed' id='windspeed' TYPE='text' SIZE='50' placeholder='e.g. 3 (MPH will be added automatically)' onKeyPress='hasToBeNumber(event)' onpaste='return false' maxlength='15' required/></td>
								</tr>
								<tr>
										<td><span align='right'>Wind Direction:</span></td>
										<td><input TYPE='radio' name='winddirection' id='winddirection' value='North' checked='checked'>North<br>
												<input TYPE='radio' name='winddirection' id='winddirection' value='North East'>North East<br>
												<input TYPE='radio' name='winddirection' id='winddirection' value='East'>East<br>
												<input TYPE='radio' name='winddirection' id='winddirection' value='South East'>South East<br>
												<input TYPE='radio' name='winddirection' id='winddirection' value='South'>South<br>
												<input TYPE='radio' name='winddirection' id='winddirection' value='South West'>South West<br>
												<input TYPE='radio' name='winddirection' id='winddirection' value='West'>West<br>
												<input TYPE='radio' name='winddirection' id='winddirection' value='North West'>North West
										</td>
								</tr>
								<tr>
										<td><span align='right'>Chance of Precipitation:</span></td>
										<td><input name='chanceofrain' id='chanceofrain' TYPE='text' placeholder='e.g. 50 (% will be added automatically)' SIZE='50' maxlength='3' onKeyPress='hasToBeNumber(event)' onpaste='return false' required/></td>
								</tr>
								<tr>
										<td><span align='right'>Forecast Discussion:</span></td>
										<td><textarea rows='8' cols='48' name='discussion' id='discussion'></textarea></td>
								</tr>
								<tr>
										<td><span align='right'>Forecaster First Name:</span></td>
										<td><input name='forecasterfn' id='forecasterfn' TYPE='text' SIZE='50' placeholder='e.g. Jane' isTextCityOrPersonKey(event)' onpaste='return false' maxlength='25' required/></td>
								</tr>
								<tr>
										<td><span align='right'>Forecaster Last Name:</span></td>
										<td><input name='forecasterln' id='forecasterln' TYPE='text' SIZE='50' placeholder='e.g. Doe' isTextCityOrPersonKey(event)' onpaste='return false' maxlength='25' required/></td>
								</tr>
						</table>
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
