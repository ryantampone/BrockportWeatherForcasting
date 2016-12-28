<?php
include 'header.php';

function show_result($message)
{
  //----------------------------------------------------------
  // Start the html page
  echo "<HTML>";
  echo "<HEAD>";
  echo "</HEAD>";
  echo "<BODY>";

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

    //finishes the html body
    echo "</BODY>";
    echo "</HTML>";
}
?>
