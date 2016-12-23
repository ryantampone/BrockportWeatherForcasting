<?php

function show_result($message, $lastname, $firstname)
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
	 		 		//echo '<center><font color="blue">'.$message.'</font></center><br />';
					echo "<SCRIPT LANGUAGE='JavaScript'>
						 window.alert('$message')
						 window.location.href='index.php';
						 </SCRIPT>";
       }
  }

 echo "</BODY>";
 echo "</HTML>";
}
?>
