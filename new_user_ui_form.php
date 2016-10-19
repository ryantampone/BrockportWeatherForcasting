<?php
	include 'header.php';
?>

<?php
	echo"
		<br>
    	<div id='userdataform'>
            <form action='insert_user.php' method='post'>
                <table align='center'>
                    <tr>
                        <td><span align='right'>First Name:</span></td>
                        <td><input NAME='firstname' TYPE='text' SIZE='50' required/></td>
                    </tr>
                    <tr>
                        <td><span align='right'>Last Name:</span></td>
                        <td><input NAME='lastname' TYPE='text' SIZE='50' required/></td>
                    </tr>
                    <tr>
                        <td><span align='right'>Username:</span></td>
                        <td><input NAME='uid' TYPE='text' SIZE='50' required/></td>
                    </tr>
                    <tr>
                        <td><span align='right'>Password:</span></td>
                        <td><input NAME='pwd' TYPE='password' SIZE='50' required/></td>
                    </tr>
					<tr>
                        <td><span align='right'>Privilege:</span></td>
                        <td><select name='privilege' id='privilege' required>
                                <option value='student'>Student</option>
                                <option value='coach'>Coach</option>
                                <option value='admin'>Admin</option>
                            </select>
                    </tr>
                </table>
                <p align='center'>
                    <input type='submit' value='Submit'/>
                    <input type='reset' value='Reset'/>
                </p>
            </form>
        </div>
	";
?>
</body>
</html>
