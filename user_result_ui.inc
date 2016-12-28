<?php
include 'header.php';

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
  if ($page = 'userModifySearch')
  {
      while ($row = mysql_fetch_assoc($result))
      {
         $id = $row['id'];
         $firstname = $row['first'];
         $lastname = $row['last'];
         $uid = $row['uid'];
         $pwd = $row['pwd'];
         $access = $row['access'];

         //Takes the values from the databse row and puts them as default values in the form
         echo"
         <center><h2>Please modify the desired user information below</h2></center>
           <div id='userdataform'>
                 <form action='user_modify.php' method='post'>
                     <input name='id' id='id' TYPE='hidden' value='$id'/>
                     <table align='center'>
                         <tr>
                             <td><span align='right'>First Name:</span></td>
                             <td><input name='firstname' id='firstname' TYPE='text' SIZE='50' value='$firstname' isTextCityOrPersonKey(event)' onpaste='return false' required/></td>
                         </tr>
                         <tr>
                             <td><span align='right'>Last Name:</span></td>
                             <td><input name='lastname' id='lastname' TYPE='text' SIZE='50' value='$lastname' isTextCityOrPersonKey(event)' onpaste='return false' required/></td>
                         </tr>
                         <tr>
                             <td><span align='right'>Username:</span></td>
                             <td><input name='uid' id='uid' TYPE='text' SIZE='50' value='$uid' style=\"background-color: #d6dbdf;\" readonly required/></td>
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
                     <p align='center'>
                         <input type='submit' value='Submit'/>
                         <input type='reset' value='Reset'/>
                     </p>
                 </form>
             </div>

         </form> ";
      }

      //finishes the html body
      echo "</BODY>";
      echo "</HTML>";

  }
  else if ($page = 'userRemoveSearch')
  {
    while ($row = mysql_fetch_assoc($result))
    {
       $id = $row['id'];
       $firstname = $row['first'];
       $lastname = $row['last'];
       $uid = $row['uid'];
       $pwd = $row['pwd'];
       $access = $row['access'];

       //Takes the values from the databse row and puts them as default values in the form
       echo"
       <center><h2>Would you like to delete this user?</h2></center>
         <div id='userdataform'>
               <form action='user_modify.php' method='post'>
                   <input name='id' id='id' TYPE='hidden' value='$id'/>
                   <table align='center'>
                       <tr>
                           <td><span align='right'>First Name:</span></td>
                           <td><input name='firstname' id='firstname' TYPE='text' SIZE='50' value='$firstname' style=\"background-color: #d6dbdf;\" readonly required/></td>
                       </tr>
                       <tr>
                           <td><span align='right'>Last Name:</span></td>
                           <td><input name='lastname' id='lastname' TYPE='text' SIZE='50' value='$lastname' style=\"background-color: #d6dbdf;\" readonly required/></td>
                       </tr>
                       <tr>
                           <td><span align='right'>Username:</span></td>
                           <td><input name='uid' id='uid' TYPE='text' SIZE='50' value='$uid' style=\"background-color: #d6dbdf;\" readonly required/></td>
                       </tr>
                       <tr>
                           <td><span align='right'>Password:</span></td>
                           <td><input name='pwd' id='pwd' TYPE='password' SIZE='50' value='$pwd' style=\"background-color: #d6dbdf;\" readonly required/></td>
                       </tr>
                       <tr>
                           <td><span align='right'>Access Group:</span></td>
                           <td><select name='access' id='access' style=\"background-color: #d6dbdf;\" readonly required>";
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
                   <p align='center'>
                       <input type='submit' value='Submit'/>
                       <input type='reset' value='Reset'/>
                   </p>
               </form>
           </div>

       </form> ";
    }

    //finishes the html body
    echo "</BODY>";
    echo "</HTML>";
  }


}
?>
