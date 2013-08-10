<!DOCTYPE html>
<html>
	<head>
    	<title>Sample Form with MySQL</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="../stylesheets/phpMySQL.css" />
	</head>
	<body>
    <?php
	session_start();
	    require("connect.php");
	    $SQL = "SELECT * FROM sampleForm";
	    $result = mysql_query($SQL) or die("could not complete your query");
	    echo "<table>";
	    echo "<tr><th>ID</th><th>Name</th><th>Age</th><th>Email</th><th>Username</th><th>Password</th></tr>";
	        while($row = mysql_fetch_array($result)) {
	            $ID = $row['ID'];
				$firstname = $row['firstname'];
				$middlename = $row['middlename'];
				$lastname = $row['lastname'];
				$age = $row['age'];
				$email = $row['email'];
				$username = $row['username'];
				$password = $row['password'];
	            echo "<tr><td>$ID</td><td>$firstname $lastname</td><td>$age</td><td>$email</td><td>$username</td><td>$password</td></tr>";
	        }  
	    echo "</table>";
	    mysql_close($connect);
	?>
    <form method="post" action="phpMySQL.php">
		<fieldset>
			<legend>Lab 5 Form</legend>
			<label for="firstname">First Name: </label><input type="text" name="firstname" id="firstname" value="<?php echo $_POST['firstname'];?>" />
            <label for="middlename">Middle Name: </label><input type="text" name="middlename" id="middlename" value="<?php echo $_POST['middlename'];?>" ?>
			<label for="lastname">Last Name:</label><input type="text" name="lastname" id="lastname" value="<?php echo $_POST['lastname'];?>" /><br/>
            <label for="age">Age: </label>:</label><input type="text" name="age" id="age" value="<?php echo $_POST['age'];?>" /><br/>
			<label for="email">Email:</label><input type="text" name="email" id="email" value="<?php echo $_POST['email'];?>"><br/>
			<label for="username1">Username:</label><input type="text" name="username1" id="username1" value="<?php echo $_POST['username1'];?>" /><br/>
			<label for="password1">Password:</label><input type="password" name="password1" id="password1" value="<?php echo $_POST['password1'];?>" /><br/>
            <label for="password2">Verify Password: </label><input type="password" name="password2" id="password2" value="<?php echo $_POST['password2'];?>" /><br/>
			<input type="submit" name="submit" value="Submit" />
			<input type="reset" name="clear" value="Clear" />
			<p>Please complete the form above and click "submit"</p>
		</fieldset>
	</form>
    <?php
		if (isset($_POST['submit']))
		{
			$firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_STRING);
			$middlename = filter_var($_POST['middlename'], FILTER_SANITIZE_STRING);
			$lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_STRING);
			$age = filter_var($_POST['age'], FILTER_VALIDATE_INT);
			$email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
			$username1 = $_POST['username1'];
			$password1 = $_POST['password1'];
			$password2 = $_POST['password2'];
			$errors = 0;
			if (!$firstname) {
				echo "<p>Please enter your first name</p>";
				$errors++;
			}
			if (!$middlename) {
				echo "<p>Please enter your middle name</p>";
				$errors++;
			}
			if (!$lastname) {
				echo "<p>Please enter your last name</p>";
				$errors++;
			}
			if (!$age) {
				echo "<p>Please enter your age</p>";
				$errors++;
			}
			if (!$email) {
				echo "<p><strong>Please enter your email</strong></p>";
				$errors++;
			} 
			else {
				if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
					echo "<p></p>";
				} 
				else {
					echo "<p>$email is <strong>NOT</strong> a valid email address.</p>";
					$errors++;
				}
			}
			if (!$username1) {
				echo "<p>Please enter a username</p>";
				$errors++;
			}
			if(!$password1) {
				echo "<p>Please enter a password</p>";
				$errors++;
			}
			if(!$password2) {
				echo "<p>Please verify your password</p>";
				$errprs++;
			}
			if ($errors == 0)
			{
				if($password1 === $password2){
				require("connect.php");
				
				$SQL = "INSERT INTO sampleForm (firstname, middlename, lastname, email, username, password, age) values('$firstname','middlename','$lastname','$email','$username1','$password1','$age')";
				if (mysql_query($SQL)){
					echo"<p>Thank you! You have been added to our database.</p>";
				}
				else{
					echo"<p>We could not add you at this time. Please try again later.</p>";
				}
				mysql_close($connect);
				echo "<p><a href=\"phpMySQL.php\">Start Over!</a></p>";
				}
				else{
					echo "<p>Please verify your password!<p>";	
				}
			}
			else {
				if ($errors == 1) {
					echo "<p>Your form is incomplete.  You have <b>$errors</b> error. Please review and correct the error.</p>";
				}
				else {
					echo "<p>Your form is incomplete.  You have <b>$errors</b> errors. Please review and correct the errors.</p>";
				}
			}
		}
		else
		{ 
			echo "<p>Please complete the form above and click \"submit\"</p>";
		}
	?>
    </body>
</html>