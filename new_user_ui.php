<!-- new_teacher_ui.php -->
<?php

//------------------------------------------------------------
// Main Control Logic: It just calls a function
ui_show_new_fac_form();	

//------------------------------------------------------------
function ui_show_new_fac_form()
{
  //Create an HTML document using the ECHO statements
  echo "<HTML>";
  echo "<HEAD>";
	echo"<title>Register User/title>";
    echo"<link href="css/headerStyles.css" type="text/css" rel="stylesheet" />";
    echo"<script language="javascript">";
  echo "</HEAD>";
  echo "<BODY>";
  
  echo"<img src="src/ForecastingLogo.png" alt="Brockport Forecasting Logo" align="left" style="width:;height:128px;">";
    
   		echo"<img src="src/Ellsworth.png" alt="Ellisworth Logo" align="right" style="width:;height:128px;">";


		echo"<h1 align="center">Brockport Forecasting System</h1>";
        echo"<p id="dateToDisplay" align="center"  style="font-size:25px; color:#00533E"></p>";
        echo"<script>";
			echo"var date = new Date();";
			echo"document.getElementById("dateToDisplay").innerHTML = date.toDateString();";
		echo"</script>";
              
        echo"<div id="nav">";
            echo"<div id="nav_wrapper">";
                echo"<ul>";
                    echo"<li><a href="link goes here">PageName</a></li>";
                echo"</ul>";
            echo"</div>";
        <echo"/div>";
    
        echo"<div id="callToAction">";
            echo"<h3 align="center">Select an Option</h3>";
        echo"</div>";
  
  
    echo "<BR/>";
    echo "<FORM action='insert_user.php' method='post'>";
    echo "<table>";

	  echo '<tr>';  //
      echo '<TD><SPAN ALIGN=RIGHT>First Name:</SPAN></TD>';
      echo '<TD><INPUT NAME="firstname" TYPE="text" SIZE=50/></TD>';
      echo '</tr>';
	  
      echo '<tr>';  //
      echo '<TD><SPAN ALIGN=RIGHT>Last Name:</SPAN></TD>';
      echo '<TD><INPUT NAME="lastname" TYPE="text" SIZE=50/></TD>';
      echo '</tr>';

      echo '<tr>';  //
      echo '<TD><SPAN ALIGN=RIGHT>Username:</SPAN></TD>';
      echo '<TD><INPUT NAME="uid" TYPE="text" SIZE=50/></TD>';
      echo '</tr>';
      
      echo '<tr>';  //
      echo '<TD><SPAN ALIGN=RIGHT>Password:</SPAN></TD>';
      echo '<TD><INPUT NAME="pwd" TYPE="password" SIZE=50/></TD>';
      echo '</tr>';
	  
  echo "</table>";
  echo '<input type="reset" value="Reset" />';
  echo '<input type="submit" value="Submit New Faculty Data" />';
 
  echo "</FORM>";
  echo "</BODY>";
  echo "</HTML>";
}
