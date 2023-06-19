<?php
session_start();
include('includes/config.php');
if(isset($_POST['signin']))
{
	$email=$_POST['email'];
	$password=md5($_POST['password']);

	$sql ="SELECT * FROM user where email ='$email' AND password ='$password'";
	$query= mysqli_query($conn, $sql);
	$count = mysqli_num_rows($query);
	if($count > 0)
	{
		while ($row = mysqli_fetch_assoc($query)) {
		   $_SESSION['alogin']=$row['user_ID'];
		   echo "<script type='text/javascript'> document.location = 'notebook.php'; </script>";
		}

	} 
	else{
	  
	  echo "<script>alert('Invalid Details');</script>";

	}

}

if(isset($_POST['signup']))
{
	$name=$_POST['name'];
	$email=$_POST['email'];
	$password=md5($_POST['password']);

	$query = mysqli_query($conn,"select * from user where email = '$email'")or die(mysqli_error());
	$count = mysqli_num_rows($query);

	if ($count > 0){ ?>
	 <script>
	 alert('Data Already Exist');
	</script>
	<?php
      }else{
        mysqli_query($conn,"INSERT INTO user(fullName, email, password) VALUES('$name','$email','$password')         
		") or die(mysqli_error()); ?>
		<script>alert('Records Successfully  Added');</script>;
		<script>
		window.location = "notebook.php"; 
		</script>
		<?php   }

}

?>


<!DOCTYPE html>
<html>

<head>
	<title>Notes App</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">

</head>

<body>
	<header class="header">
		<h2 class="u-name">Notes <b>App</b></h2>
	</header>

	<div class="main">	
		<!-- Login Form -->
		<section class="section-1">
			<form id="loginFormContainer" name="signin" method="post">
				<h2>Login</h2>
				<div class="container">
					<input name="email" type="email" placeholder="abcd@example.com" required>
					<input name="password" type="password" id="inputPassword" placeholder="Password" required>
					<button type="submit" name="signin" id="loginSignup-btn">Login</button>
				</div>
				<div class="member">
					Not a member? <a href="#" id="signupLink">Sign up</a>
				</div>
			</form>

			<form id="signupFormContainer" name="signup" method="POST">
				<h2>Sign Up</h2>
				<div class="container">
					<input name="name" type="text" placeholder="Enter FullName" required>
					<input name="email" type="email" placeholder="abcd@example.com" required>
					<input name="password" type="password" id="inputPassword" placeholder="Enter password" required>
					<button type="submit" name="signup" id="loginSignup-btn">Sign Up</button>
				</div>
				<div class="member">
					Already Have an Acoount? <a href="#" id="loginlink">Login</a>
				</div>
			</form>
		</section>
	</div>
	<script src="script/app.js"></script>
</body>

</html>
