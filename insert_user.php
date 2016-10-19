
<!-- insert_user.php
   A PHP script to insert a new user into the test database
  -->
<?php

require('db_cn.inc');

//This file contains php code that will be executed after the
//insert operation is done.
require('user_insert_result_ui.inc');

// Main control logic
insert_user();

//-------------------------------------------------------------
function insert_user()
{

	// Connect to the 'test' database 
        // The parameters are defined in the teach_cn.inc file
        // These are global constants
	connect_and_select_db(DB_SERVER, DB_UN, DB_PWD,DB_NAME);

	// Get the information entered into the webpage by the user
        // These are available in the super global variable $_POST
	// This is actually an associative array, indexed by a string
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$uid = $_POST['uid'];
	$pwd = $_POST['pwd'];
	$privilege = $_POST['privilege'];
        
	// Create a String consisting of the SQL command. Remember that
        // . is the concatenation operator. $varname within double quotes
 	// will be evaluated by PHP
	$insertStmt = "INSERT INTO user (first, last, 
		       uid, pwd, privilege) values ( '$firstname', '$lastname',
                      '$uid', '$pwd', '$privilege')";

	//Execute the query. The result will just be true or false
	$result = mysql_query($insertStmt);
	echo $result;
	$message = "";

	if (!$result) 
	{
  	  $message = "Error in inserting User: $lastname , $firstname: ". mysql_error();
	}
	else
	{
	  $message = "Data for User: $lastname , $firstname inserted successfully.";
	  
	}

	ui_show_user_insert_result($message, $lastname, $firstname, 
		$uid, $pwd);
			   
}

function connect_and_select_db($server, $username, $pwd, $dbname)
{
	// Connect to db server
	$conn = mysql_connect($server, $username, $pwd);

	if (!$conn) {
	    echo "Unable to connect to DB: " . mysql_error();
    	    exit;
	}

	// Select the database	
	$dbh = mysql_select_db($dbname);
	if (!$dbh){
    		echo "Unable to select ".$dbname.": " . mysql_error();
		exit;
	}
}

?>
