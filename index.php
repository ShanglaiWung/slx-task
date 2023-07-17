<?php
require_once 'conf/config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration Form - Swiss Learning Exchange</title>
	<link rel="icon" href="../assets/images/slx-logo-16x16-1.png" sizes="32x32">
	<link rel="icon" href="../assets/images/slx-logo-16x16-1.png" sizes="192x192">
	<link rel="apple-touch-icon" href="../assets/images/slx-logo-16x16-1.png">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/styles.min.css">
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="../assets/js/slx-events.js"></script>
</head>
<body class="gradient-custom">
	<div class="container py-4 text-center">
		<div class="align-items-center ">
			<div class="col-md-5 card">
				<div class="align-items-center mb-3 pb-2 pb-md-0 mb-md-2">
					<a href="/"><img width="289" height="80" src="../assets/images/logo.png"></a>
				</div>
				<form id="regForm" method="post" action="">
					<div class="position-relative mt-3">
						<input type="text" id="fname" class="outside form-control form-control-lg" name="first_name" required />
						<span class="floating-label-outside">First name</span>
						<i class="fa fa-user-o input-icon-outside"></i>
					</div>
					<div class="position-relative mt-3">
						<input type="text" id="lname" class="outside" name="last_name" required />
						<span class="floating-label-outside">Last name</span>
						<i class="fa fa-user-o input-icon"></i>
					</div>
					<div class="position-relative mt-3">
						<input type="email" id="email-id" class="outside" name="email_id" required />
						<span class="floating-label-outside">Email ID</span>
						<i class="fa fa-envelope-o input-icon"></i>
					</div>
					<div class="position-relative mt-3">
						<input type="text" id="ph_number" class="outside" name="phone_number" onkeypress="return onlyNumberKey(event)" maxlength="10" required />
						<span class="floating-label-outside">Phone Number</span>
						<i class="fa fa-phone input-icon"></i>
					</div>
					<div class="position-relative mt-3">
						<input type="password" id="psw" class="outside" name="password" required />
						<span class="floating-label-outside">Password</span>
						<i class="fa fa-key input-icon"></i>
					</div>
					<div class="position-relative mt-3">
						<div class="mb-2 pb-1 float-left" >Gender: </div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="gender" id="femaleGender"
							  value="Female" />
							<label class="form-check-label" for="femaleGender">Female</label>
						</div>

						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="gender" id="maleGender"
							  value="Male" />
							<label class="form-check-label" for="maleGender">Male</label>
						</div>
					</div>
					<div class="position-relative mt-3">
						<input type="submit" id="submit-btn" class="btn btn-primary btn-lg" name="submit" value="Submit">
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
<?php
if (isset($_POST['submit'])) {
	$f_name = isset($_POST['first_name']) ? $_POST['first_name'] : "";
	$l_name = isset($_POST['last_name']) ? $_POST['last_name'] : "";
	$email = isset($_POST['email_id']) ? $_POST['email_id'] : "";
	$phone_number = isset($_POST['phone_number']) ? $_POST['phone_number'] : "";
	$password = isset($_POST['password']) ? $_POST['password'] : "";
	$gender = isset($_POST['gender']) ? $_POST['gender'] : "";
	$f_name = filter_var($f_name, FILTER_SANITIZE_STRING);
	$l_name = filter_var($l_name, FILTER_SANITIZE_STRING);
	$email = filter_var($email, FILTER_SANITIZE_EMAIL);
	$phone_number = filter_var($phone_number, FILTER_SANITIZE_STRING);
	$password = password_hash(filter_var($password, FILTER_SANITIZE_STRING), PASSWORD_DEFAULT);
	$gender = filter_var($gender, FILTER_SANITIZE_STRING);

	insert_slx_user($f_name, $l_name, $email, $phone_number, $password, $gender);
}
?>