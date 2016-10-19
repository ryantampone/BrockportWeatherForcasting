<?php

function ui_show_user_login_result($message, $result)
{
  //----------------------------------------------------------
  // Start the html page
  echo "<HTML>";
  echo "<HEAD>";
  echo "</HEAD>";
  echo "<BODY>";

  // If the message is non-null and not an empty string print it
  // message contains the lastname and firstname
  if ($message)
  {
    if ($message != "")
       {
	 echo '<center><font color="blue">'.$message.'</font></center><br />';
       }
  }
	
	
while ($row = mysql_fetch_assoc($result)) 
   {
     $uid = $row['uid']; 
     $pwd = $row['pwd']; 
 
      //Put these in a table row. The htmlentities function converts any
      //special chars in the string to a html-displayable form.
      echo '<tr>'; 
      echo '<TD><SPAN ALIGN=CENTER>'.htmlentities($uid).'</SPAN></TD>'; 
      echo '<TD><SPAN ALIGN=CENTER>'.htmlentities($pwd).'</SPAN></TD>'; 
      echo '</tr>'; 
   } 
//finish up the html code, and put the return button to go back to main menu
echo <<<UPTOEND
  <BR/><BR/>
  <center>
  <input type="button" value="Return to Main Menu"
	onClick="window.location='forecastoptions.html'"/>
  </center>
UPTOEND;

 echo "</BODY>";
 echo "</HTML>";
}

?>
