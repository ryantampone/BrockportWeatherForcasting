<?php

function show_result($message, $result, $forecastid, $statusFlag)
{
  //----------------------------------------------------------
  // Start the html page
  echo "<HTML>";
  echo "<HEAD>";
  echo "</HEAD>";
  echo "<BODY>";

  if ((isset($_SESSION['id'])) && ((string)$_SESSION['access'] == 'admin'))
  {
    if ($statusFlag == 'Success')
    {
        while ($row = mysql_fetch_assoc($result))
        {
          $dateofgame = $row['dateofgame'];
          $timeofgame = $row['timeofgame'];
          $sport = $row['sport'];
          $location = $row['location'];
          $forecast = $row['forecast'];
          $temphigh = $row['temphigh'];
          $templow = $row['templow'];
          $windspeed = $row['windspeed'];
          $winddirection = $row['winddirection'];
          $chanceofrain = $row['chanceofrain'];
          $discussion = $row['discussion'];
          $forecasterfn = $row['forecasterfn'];
          $forecasterln = $row['forecasterln'];
          $datesubmitted = $row['datesubmitted'];
          $status = $row['status'];
        }

        echo "
          <center><h2>Please review the forecast information below</h2></center>
            <form action='admin_submit_approved_forecast.php' method='post'>
                <table align='center'>
                    <tr>
                        <td><span align='right'>Sport:</span></td>
                        <td><input name='sport' id='sport' TYPE='text' SIZE='50' placeholder='e.g. Golf' onKeyPress='isTextCityOrPersonKey(event)' onpaste='return false' maxlength='48' value='$sport' required/></td>
                    </tr>
                    <tr>
                        <td><span align='right'>Date of Game:</span></td>
                        <td><input name='date' id='date' TYPE='text' SIZE='50' placeholder='YYYY-MM-DD' onblur='hasToBeDate()' onpaste='return false' maxlength='10' value='$dateofgame' required/></td>
                    </tr>
                    <tr>
                        <td><span align='right'>Time of Game:</span></td>
                        <td><input name='gametime' id='gametime' TYPE='text' SIZE='50' placeholder='e.g. 1PM' onpaste='return false' maxlength='12' value='$timeofgame' required/></td>
                    </tr>
                    <tr>
                        <td><span align='right'>Location:</span></td>
                        <td><input name='location' id='location' TYPE='text' SIZE='50' isTextCityOrPersonKey(event)' onpaste='return false' maxlength='100' value='$location' required/></td>
                    </tr>
                    <tr>
                        <td><span align='right'>Forecast:</span></td>
                        <td><input name='forecast' id='forecast' TYPE='text' SIZE='50' onKeyPress='isTextCityOrPersonKey(event)' onpaste='return false' maxlength=100' value='$forecast' required/></td>
                    </tr>
                    <tr>
                        <td><span align='right'>Temperature High (°F):</span></td>
                        <td><input name='temperaturehigh' id='temperaturehigh' TYPE='text' SIZE='50' placeholder='e.g. 50 (°F will be added automatically)' onKeyPress='hasToBeNumber(event)' onpaste='return false' maxlength='3' value='$temphigh' required/></td>
                    </tr>
                    <tr>
                        <td><span align='right'>Temperature Low (°F): </span></td>
                        <td><input name='temperaturelow' id='temperaturelow' TYPE='text' SIZE='50' placeholder='e.g. 48 (°F will be added automatically)' onKeyPress='hasToBeNumber(event)' onpaste='return false' maxlength='3' value='$templow' required/></td>
                    </tr>
                    <tr>
                        <td><span align='right'>Wind Speed (MPH):</span></td>
                        <td><input name='windspeed' id='windspeed' TYPE='text' SIZE='50' placeholder='e.g. 3 (MPH will be added automatically)' isTextCityOrPersonKey(event)' onpaste='return false' maxlength='15' value='$windspeed' required/></td>
                    </tr>
                    <tr>
                        <td><span align='right'>Wind Direction:</span></td>
                        <td><input name='winddirection' id='winddirection' TYPE='text' SIZE='50' isTextCityOrPersonKey(event)' onpaste='return false' maxlength='15' value='$winddirection' required/></td>
                    </tr>
                    <tr>
                        <td><span align='right'>Chance of Rain:</span></td>
                        <td><input name='chanceofrain' id='chanceofrain' TYPE='text' placeholder='e.g. 50 (% will be added automatically)' SIZE='50' maxlength='3' onKeyPress='hasToBeNumber(event)' onpaste='return false' value='$chanceofrain' required/></td>
                    </tr>
                    <tr>
                        <td><span align='right'>Forecast Discussion:</span></td>
                        <td><textarea rows='8' cols='48' name='discussion' id='discussion'>$discussion</textarea></td>
                    </tr>
                    <tr>
                        <td><span align='right'>Forecaster First Name:</span></td>
                        <td><input name='forecasterfn' id='forecasterfn' TYPE='text' SIZE='50' placeholder='e.g. Jane' isTextCityOrPersonKey(event)' onpaste='return false' maxlength='25' value='$forecasterfn' required/></td>
                    </tr>
                    <tr>
                        <td><span align='right'>Forecaster Last Name:</span></td>
                        <td><input name='forecasterln' id='forecasterln' TYPE='text' SIZE='50' placeholder='e.g. Doe' isTextCityOrPersonKey(event)' onpaste='return false' maxlength='25' value='$forecasterln' required/></td>
                    </tr>
                </table>
                <input TYPE='hidden' name='forecastid' id='forecastid' value='$forecastid'>
                <p align='center'>
                    <input type='submit' value='Approve Forecast'/>
                    <input type='reset' value='Reset'/>
                </p>
            </form>
            </body>
            </html>
          ";
      }
      else if ($statusFlag == 'Error')
      {
        echo "<SCRIPT LANGUAGE='JavaScript'>
           window.alert('$message')
           window.location.href='index.php';
           </SCRIPT>";
      }
  }
  else
  {
    session_destroy();
    echo "<SCRIPT LANGUAGE='JavaScript'>
       window.alert('Please Login as an Admin to View This Page')
       window.location.href='index.php';
       </SCRIPT>";
  }
}
?>
