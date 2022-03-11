<?php 
	session_start();
	include('includes/config.php');
	// variable declaration
	$username = "";
	$email    = "";
	$errors = array(); 
	$_SESSION['success'] = "";



	// REGISTER USER
	if (isset($_POST['sign'])) {
		// receive all input values from the form
		$name= mysqli_real_escape_string($con, $_POST['name']);
		$username = mysqli_real_escape_string($con, $_POST['username']);
		$email = mysqli_real_escape_string($con, $_POST['email']);
		$contact = mysqli_real_escape_string($con, $_POST['contact']);
		$password_1 = mysqli_real_escape_string($con, $_POST['password1']);
		$password_2 = mysqli_real_escape_string($con, $_POST['password2']);

		// form validation: ensure that the form is correctly filled
		if (empty($password_1)) { array_push($errors, "Name is required"); }
		if (empty($username)) { array_push($errors, "Username is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($email)) { array_push($errors, "Contact Number is required"); }

		if (empty($password_1)) { array_push($errors, "Password is required"); }
		//Validate passwords
		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
			echo "<script>alert('Password mismatch');</script>";
		}
		$user_check_query = "SELECT * FROM users WHERE username='$username' 
								OR email='$email' LIMIT 1";

		$result = mysqli_query($con, $user_check_query);
		$user = mysqli_fetch_assoc($result);

		if ($user) { // if user exists
			if ($user['username'] === $username) {
			  array_push($errors, "Username already exists");
			   echo "<script>alert('Username aldready exists');</script>";
			}

			if ($user['email'] === $email) {
			  array_push($errors, "Email already exists");
			  echo "<script>alert('Email aldready exists');</script>";
			}
		}
		//Validate Email
		if (!filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			 array_push($errors, "Invalid email id");
			  echo "<script>alert('Invalid Email ID');</script>";
		}
		//Validate name
		if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
			array_push($errors, "Invalid name");
			  echo "<script>alert('Only letters and white space allowed in Name');</script>";
  			}

  		//Validate contact number
  			if(!preg_match('/^[0-9]{10}+$/',$contact))
  			{
  				array_push($errors, "Invalid contact number");
			  echo "<script>alert('Invalid Contact Number');</script>";

  			}
		

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password=md5($password_1);
			$active=1;
			//encrypt the password before saving in the database
			$sql =mysqli_query($con,"INSERT INTO users (username,email,password,name,contact_no,active) VALUES ('$username', '$email','$password','$name','$contact',$active)");

			$_SESSION['login'] = $username;
			$user_id = mysqli_insert_id($con); 

			// put logged in user into session array
			$_SESSION['user'] = getUserById($user_id);

			$_SESSION['success'] = "You are now logged in";

			echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
			
		}

	}

	// ... 

	// LOGIN USER
	if (isset($_POST['login'])) {
		$username = mysqli_real_escape_string($con, $_POST['username']);
		$password= mysqli_real_escape_string($con, $_POST['password']);
		

		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}


		if (count($errors) == 0) {
			
			$password=md5($password);
			$query = "SELECT * FROM users WHERE email='$username' AND password='$password' AND active=1";
			$results = mysqli_query($con, $query);

			if (mysqli_num_rows($results) == 1) {
				$user_id = mysqli_fetch_assoc($results)['id']; 

				
				$_SESSION['user'] = getUserById($user_id); 

				$_SESSION['login'] = $username;
				
				$_SESSION['success'] = "You are now logged in";
				echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
			}else {
				 echo "<script>alert('Wrong Username/Password or You may be blocked by the Admin');</script>";
			}
		}
	}
	function getUserById($id)
	{
		global $con;
		$sql = "SELECT * FROM users WHERE id=$id LIMIT 1";

		$result = mysqli_query($con, $sql);
		$user = mysqli_fetch_assoc($result);

		
		return $user; 
	}

?>