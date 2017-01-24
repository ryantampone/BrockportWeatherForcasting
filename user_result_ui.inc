<?php
include 'header.php';
echo "
  <link href='/brockportforecasting/css/cardStyles.css' type='text/css' rel='stylesheet' />
  <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
";

function show_result($message, $result, $page)
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


  // If message is null, then determine source page and redirect to appropriate page
  if ($page == 'userModifySearch')
  {
      while ($row = mysql_fetch_assoc($result))
      {
         $id = $row['id'];
         $firstname = $row['first'];
         $lastname = $row['last'];
         $uid = $row['uid'];
         $pwd = $row['pwd'];//This is the encrypted form
         $registrationKey = $row['registrationKey'];
         $access = $row['access'];
      }

         //Takes the values from the databse row and puts them as default values in the form
         echo"
         <center><h2>Please modify the desired user information below</h2></center>
           <div id='userdataform'>
                 <form action='user_modify.php' method='post'>
                     <input name='id' id='id' TYPE='hidden' value='$id'/>
                     <table align='center'>
                         <tr>
                             <td><span align='right'>First Name:</span></td>
                             <td><input name='firstname' id='firstname' TYPE='text' SIZE='50' value=\"$firstname\" onKeyPress='return isTextCityOrPersonKey(event) onpaste='return false' required/></td>
                         </tr>
                         <tr>
                             <td><span align='right'>Last Name:</span></td>
                             <td><input name='lastname' id='lastname' TYPE='text' SIZE='50' value=\"$lastname\" onKeyPress='return isTextCityOrPersonKey(event) onpaste='return false' required/></td>
                         </tr>
                         <tr>
                             <td><span align='right'>Username:</span></td>
                             <td><input name='uid' id='uid' TYPE='text' SIZE='50' value=\"$uid\" onKeyPress='return isTextCityOrPersonKey(event)' style=\"background-color: #d6dbdf;\" readonly required/></td>
                         </tr>
                         <tr>
                             <td><span align='right'>Password:</span></td>
                             <td><input name='pwd' id='pwd' TYPE='password' SIZE='50' value='$pwd' required/></td>
                         </tr>
                         <tr>
                             <td><span align='right'>Access Group:</span></td>
                             <td><select name='access' id='access' required>";
                                  if ($access == 'student')
                                  {
                                    echo "
                                      <option value='student' selected>Student</option>
                                      <option value='coach'>Coach</option>
                                      <option value='admin'>Admin</option>
                                    ";
                                  }
                                  else if ($access == 'coach')
                                  {
                                    echo "
                                      <option value='student'>Student</option>
                                      <option value='coach' selected>Coach</option>
                                      <option value='admin'>Admin</option>
                                    ";
                                  }
                                  else if ($access == 'admin')
                                  {
                                    echo "
                                      <option value='student'>Student</option>
                                      <option value='coach'>Coach</option>
                                      <option value='admin' selected>Admin</option>
                                    ";
                                  }

                                  echo "
                                 </select>
                         </tr>
                     </table>
                     <input TYPE='hidden' name='registrationKey' id='registrationKey' value='$registrationKey'/>
                     <p align='center'>
                         <input type='submit' value='Submit'/>
                         <input type='reset' value='Reset'/>
                     </p>
                 </form>
             </div>

         </form> ";

      //finishes the html body
      echo "</BODY>";
      echo "</HTML>";

  }
  else if ($page == 'userRemoveSearch')
  {
    while ($row = mysql_fetch_assoc($result))
    {
       $id = $row['id'];
       $firstname = $row['first'];
       $lastname = $row['last'];
       $uid = $row['uid'];
       $pwd = $row['pwd'];
       $registrationKey = $row['registrationKey'];
       $access = $row['access'];

       //Takes the values from the databse row and puts them as default values in the form
       echo"
       <center><h2>Are you sure you would like to remove this user?</h2></center>
         <div id='userdataform'>
               <form action='user_remove.php' method='post'>
                   <input name='id' id='id' TYPE='hidden' value='$id'/>
                   <table align='center'>
                       <tr>
                           <td><span align='right'>First Name:</span></td>
                           <td><span align='right'>$firstname</span></td>
                           <td><input TYPE='hidden' name='firstname' id='firstname' TYPE='text' SIZE='50' value='$firstname' style=\"background-color: #d6dbdf;\" readonly required/></td>
                       </tr>
                       <tr>
                           <td><span align='right'>Last Name:</span></td>
                           <td><span align='right'>$lastname</span></td>
                           <td><input TYPE='hidden' name='lastname' id='lastname' TYPE='text' SIZE='50' value='$lastname' style=\"background-color: #d6dbdf;\" readonly required/></td>
                       </tr>
                       <tr>
                           <td><span align='right'>Username:</span></td>
                           <td><span align='right'>$uid</span></td>
                           <td><input TYPE='hidden' name='uid' id='uid' TYPE='text' SIZE='50' value='$uid' style=\"background-color: #d6dbdf;\" readonly required/></td>
                       </tr>
                       <tr>
                           <td><span align='right'>Password:</span></td>
                           <td><span align='right'>$pwd</span></td>
                           <td><input TYPE='hidden' name='pwd' id='pwd' TYPE='password' SIZE='50' value='$pwd' style=\"background-color: #d6dbdf;\" readonly required/></td>
                       </tr>
                       <tr>
                           <td><span align='right'>Access Group:</span></td>
                           <td><span align='right'>$access</span></td>
                           <td><input TYPE='hidden' name='access' id='access' TYPE='password' SIZE='50' value='$access' style=\"background-color: #d6dbdf;\" readonly required/></td>
                       </tr>
                   </table>
                   <input TYPE='hidden' name='registrationKey' id='registrationKey' value='$registrationKey'/>
                   <p align='center'>
                       <input type='submit' value='Confirm Removal'/>
                   </p>
               </form>
           </div>

       </form> ";
    }

    //finishes the html body
    echo "</BODY>";
    echo "</HTML>";
  }
  else
  {
    echo "<SCRIPT LANGUAGE='JavaScript'>
       window.alert('$page')
       window.location.href='index.php';
       </SCRIPT>";
  }

}
?>
