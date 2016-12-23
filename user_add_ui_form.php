<?php
	include 'header.php';
?>

<?php
	echo"
		<br>
    	<div id='userdataform'>
            <form action='user_insert.php' method='post'>
                <table align='center'>
                    <tr>
                        <td><span align='right'>First Name:</span></td>
                        <td><input name='firstname' id='firstname' TYPE='text' SIZE='50' required/></td>
                    </tr>
                    <tr>
                        <td><span align='right'>Last Name:</span></td>
                        <td><input name='lastname' id='lastname' TYPE='text' SIZE='50' required/></td>
                    </tr>
                    <tr>
                        <td><span align='right'>Username:</span></td>
                        <td><input name='uid' id='uid' TYPE='text' SIZE='50' required/></td>
                    </tr>
                    <tr>
                        <td><span align='right'>Password:</span></td>
                        <td><input name='pwd' id='pwd' TYPE='password' SIZE='50' required/></td>
                    </tr>
					<tr>
                        <td><span align='right'>Access Group:</span></td>
                        <td><select name='access' id='access' required>
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
