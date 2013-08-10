<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>TC 472 Lab 03</title>
	<link rel="stylesheet" href="../stylesheets/samplePHP.css" type="text/css" media="screen" title="no title" charset="utf-8">
</head>
<body>
	<form method="post" action="samplePHP.php">
		<fieldset>
			<legend>Lab 03 Form</legend>
			<label for="firstname">First Name:</label><br/><input type="text" name="firstname" id="firstname" value="<?php echo $_POST['firstname'];?>" /><br/>
			<label for="lastname">Last Name:</label><br/><input type="text" name="lastname" id="lastname" value="<?php echo $_POST['lastname'];?>" /><br/>
			<label>Gender:</label><div class="gender">
				<label for="male">Male</label><input type="radio" name="gender" id="male" value="male" <?php if($_POST['gender'] == "male"){echo "checked = \"checked\"";}?> />
				<label for="female">Female</label><input type="radio" name="gender" id="female" value="female" <?php if($_POST['gender'] == "female"){echo "checked = \"checked\"";}?> />/><br/>
			</div>
			<label>Address:</label><div class="address">
				<label for="street"># Street:</label><input type="text"  name="street" id="street" value="<?php echo $_POST['street'];?>" /><br/>
				<label for="city">City:</label><input type="text"  name="city"  id="city" value="<?php echo $_POST['city'];?>"/>
				<label for="state">State:</label><input type="text"  name="state" id="state" size="2" maxlength="2" value="<?php echo $_POST['state'];?>"/><br/>
				<label for="zipcode">Zip Code:</label><input type="text" name="zipcode" id="zipcode" size="5" maxlength="5" value="<?php echo $_POST['zipcode'];?>"/><br/>
			</div>
			<label for="email">Email:</label><input type="text" name="email" id="email" value="<?php echo $_POST['email'];?>"><br/>
			<label for="question1">In which department did you shop?</label>
			<select name="q1options" id="question1" >
				<option></option>
				<option value="Basketball"<?php if($_POST['q1options'] == "Basketball"){echo "selected = \"selected\"";}?>>Basketball</option>
				<option value="Football" <?php if($_POST['q1options'] == "Football"){echo "selected = \"selected\"";}?>>Football</option>
				<option value="Soccer" <?php if($_POST['q1options'] == "Soccer"){echo "selected = \"selected\"";}?>>Soccer</option>
				<option value="Hockey" <?php if($_POST['q1options'] == "Hockey"){echo "selected = \"selected\"";}?>>Hockey</option>
				<option value="Golf" <?php if($_POST['q1options'] == "Golf"){echo "selected = \"selected\"";}?>>Golf</option>
				<option value="Running" <?php if($_POST['q1options'] == "Running"){echo "selected = \"selected\"";}?>>Running</option>
				<option value="Weight Training" <?php if($_POST['q1options'] == "Weight Training"){echo "selected = \"selected\"";}?>>Weight Training</option>
				<option value="Winter Sports" <?php if($_POST['q1options'] == "Winter Sports"){echo "selected = \"selected\"";}?>>Winter Sports</option>
			</select><br/>
			<label for="question2">How was the service in the store?</label><br/>
			<select size="4" name="q2options" id="question2">
				<option value="Satisfactory" <?php if($_POST['q2options'] == "Satisfactory"){echo "selected = \"selected\"";}?>>Satisfactory</option>
				<option value="Average" <?php if($_POST['q2options'] == "Average"){echo "selected = \"selected\"";}?>>Average</option>
				<option value="Dissatisfactory" <?php if($_POST['q2options'] == "Dissatisfactory"){echo "selected = \"selected\"";}?>>Dissatisfactory</option>
				<option value="No Service" <?php if($_POST['q2options'] == "No Service"){echo "selected = \"selected\"";}?>>No Service</option>
			</select><br/>
			<label for="comment">Comment:</label><br/><textarea name="comment" id="comment" rows="10" cols="90" placeholder="Leave a comment if possible for further evaluation on your service." ><?php if(isset($_POST['comment'])) echo $_POST['comment'];?></textarea><br/>
			<input type="submit" name="submit" value="Submit" />
			<input type="reset" name="clear" value="Clear" />
		</fieldset>
	</form>
<?php
	if (isset($_POST['submit']))
	{
		$firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_STRING);
		$lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_STRING);
		$gender = $_POST['gender'];
		$street = $_POST['street'];
		$city = filter_var($_POST['city'], FILTER_SANITIZE_STRING);
		$state = filter_var($_POST['state'], FILTER_SANITIZE_STRING);
		$zipcode = filter_var($_POST['zipcode'], FILTER_SANITIZE_NUMBER_INT);
		$email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
		$department = $_POST['q1options'];
		$satisfaction = $_POST['q2options'];
		$errors = 0;

		if (!$firstname) {
			echo "<p>Please enter your first name</p>";
			$errors++;
		}
		if (!$lastname) {
			echo "<p>Please enter your last name</p>";
			$errors++;
		}
		if (!$gender) {
			echo "<p>Please choose a gender</p>";
			$errors++;
		}
		if (!$street) {
			echo "<p>Please enter your street address</p>";
			$errors++;
		}
		if (!$city) {
			echo "<p>Please enter your city</p>";
			$errors++;
		}
		if (!$state) {
			echo "<p>Please enter your state</p>";
			$errors++;
		}
		else {
			if(preg_match("%^[A-Z]{2}$%", $state)){
				echo "<p></p>";
			}
			else {
				echo "<p>Please enter a valid state abbreviation, capital letters only.</p>";
				$errors++;
			}
		}
		if (!$zipcode) {
			echo "<p>Please enter your zip code</p>";
			$errors++;
		}
		else {
			if (preg_match("%^[0-9]{5}$%", $zipcode)){
				echo "<p></p>";
			}
			else {
				echo "<p>Please enter a valid zip code.</p>";
				$errors++;
			}
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
		
		if (!$department) {
			echo "<p>Please choose a department</p>";
			$errors++;
		}
		if (!$satisfaction) {
			echo "<p>Please choose a satisfaction level</p>";
			$errors++;
		}
		if ($errors == 0)
		{
			echo "<h2>Your Results</h2>";
			if( $gender == "male"){
				echo "<p>Thank You, Mr.<b>$firstname</b> <b>$lastname</b>, for shopping with us.</p>";
			}
			else {
				echo "<p>Thank You, <b>Ms.$firstname $lastname</b>, for shopping with us.</p>";
			}
			echo "<p>In the <b>$department</b> department, your service was 	<b>$satisfaction</b>.</p>";
			echo "<p><a href=\"samplePHP.php\">Start Over!</a></p>";
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