<?php
	include 'header.php';
?>

<?php
	echo "
		<br>
			<center>
				<form action='includes/signup.inc.php' method='POST'>
					<input type='text' name='first' placeholder='FirstName'><br>
					<input type='text' name='last' placeholder='LastName'><br>
					<input type='text' name='uid' placeholder='Username'><br>
					<input type='password' name='pwd' placeholder='Password'><br>
					<select name='access' id='access' required>
						<option value='student'>Student</option>
						<option value='coach'>Coach</option>
						<option value='admin'>Admin</option>
					</select><br>
					<button type='submit'>Register User</button>
				</form>
			</center>
		";
?>
				
</body>
</html>
