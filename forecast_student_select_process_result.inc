<?php
include 'header.php';

function show_result($message, $result)
{
  // If the message is non-null and not an empty string print it
  if ($message)
  {
    if ($message != "")
       {
					echo "<SCRIPT LANGUAGE='JavaScript'>
						 window.alert('$message')
             window.location.href='index.php';
						 </SCRIPT>";
       }
  }

  if ((isset($_SESSION['id'])) && (string)$_SESSION['access'] == 'admin')
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
          $chanceofprecipitation = $row['chanceofprecipitation'];
          $amountofprecipitation = $row['amountofprecipitation'];
          $discussion = $row['discussion'];
          $forecasterfn = $row['forecasterfn'];
          $forecasterln = $row['forecasterln'];
          $datesubmitted = $row['datesubmitted'];
          $status = $row['status'];
        //}

        echo "
          <center><h2><font color='#00543F'><strong>For Our $sport Team</strong></font></h2></center>
                <table align='center' cellpadding='10px'>
                    <tr>
                      <td><span align='right'><u>Game Time:</u></span></td>
                      <td><span align='right'><strong><font color='#00543F'>$timeofgame</font></strong></span></td>
                    </tr>
                    <tr>
                      <td><span align='right'><u>Location:</u></span></td>
                      <td><span align='right'><strong><font color='#00543F'>$location</font></strong></span></td>
                    </tr>
                    <tr>
                      <td><span align='right'><u>Temperature:</u></span></td>
                      <td><span align='right'><strong><font color='#00543F'>$temphigh °F - $templow °F</font></strong></span></td>
                    </tr>
                    <tr>
                      <td><span align='right'><u>Wind:</u></span></td>
                      <td><span align='right'><strong><font color='#00543F'>From the $winddirection at $windspeed MPH</font></strong></span></td>
                    </tr>
                    <tr>
                      <td><span align='right'><u>Chance of Precipitation:</u></span></td>
                      <td><span align='right'><strong><font color='#00543F'>$chanceofprecipitation %</font></strong></span></td>
                    </tr>
                    <tr>
                      <td><span align='right'><u>Amount of Precipitation:</u></span></td>
                      <td><span align='right'><strong><font color='#00543F'>$amountofprecipitation</font></strong></span></td>
                    </tr>
                    <tr>
                      <td><span align='right'><u>Forecast Discussion:</u></span></td>
                      <td style='max-width:500px'><span align='right'><strong><font color='#00543F'>$discussion</font></strong></span></td>
                    </tr>
                    <tr>
                      <td><span align='right'><u>Forecaster:</u></span></td>
                      <td><span align='right'><strong><font color='#00543F'>$forecasterfn $forecasterln</font></strong></span></td>
                    </tr>
                </table>
                <br><hr style='width:50%'><br>
          ";
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


  //finishes the html body
  echo "</BODY>";
  echo "</HTML>";

?>
