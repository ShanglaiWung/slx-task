<?php
require_once '../conf/config.php';

if (!isset($_GET['list'])) {
	die("Cannot edit null users");
}
$id = $_GET['list'];
$user_data = get_specific_slx_user($id);
if (isset($_POST['Update'])) {
	$f_name = isset($_POST['first_name']) ? $_POST['first_name'] : "";
	$l_name = isset($_POST['last_name']) ? $_POST['last_name'] : "";
	$email = isset($_POST['email_id']) ? $_POST['email_id'] : "";
	$phone_number = isset($_POST['phone_number']) ? $_POST['phone_number'] : "";
	$gender = isset($_POST['gender']) ? $_POST['gender'] : "";
	$f_name = filter_var($f_name, FILTER_SANITIZE_STRING);
	$l_name = filter_var($l_name, FILTER_SANITIZE_STRING);
	$email = filter_var($email, FILTER_SANITIZE_EMAIL);
	$phone_number = filter_var($phone_number, FILTER_SANITIZE_STRING);
	$gender = filter_var($gender, FILTER_SANITIZE_STRING);

	update_slx_user($f_name, $l_name, $email, $phone_number, $gender, $id);
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Update - Swiss Learning Exchange</title>
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
	<div class="container py-5 text-center h-100">
		<div class="align-items-center ">
			<div class="col-md-5 card">
				<div class="align-items-center mb-4 pb-2 pb-md-0 mb-md-3">
					<a href="/"><img width="289" height="80" src="../assets/images/logo.png"></a>
				</div>
				<form id="updForm" method="post" action="">
					<div class="position-relative mt-3">
						<input type="text" id="fname" class="outside form-control form-control-lg" name="first_name" value="<?php echo $user_data['f_name'];?>" required />
						<span class="floating-label-outside">First name</span>
						<i class="fa fa-user-o input-icon-outside"></i>
					</div>
					<div class="position-relative mt-3">
						<input type="text" id="lname" class="outside" name="last_name" value="<?php echo $user_data['l_name'];?>" required />
						<span class="floating-label-outside">Last name</span>
						<i class="fa fa-user-o input-icon"></i>
					</div>
					<div class="position-relative mt-3">
						<input type="email" id="email-id" class="outside" name="email_id" value="<?php echo $user_data['email'];?>" required />
						<span class="floating-label-outside">Email ID</span>
						<i class="fa fa-envelope-o input-icon"></i>
					</div>
					<div class="position-relative mt-3">
						<input type="text" id="ph_number" class="outside" name="phone_number" onkeypress="return onlyNumberKey(event)" maxlength="10" value="<?php echo $user_data['phone'];?>" required />
						<span class="floating-label-outside">Phone Number</span>
						<i class="fa fa-phone input-icon"></i>
					</div>
					<div class="position-relative mt-3">
						<div class="mb-2 pb-1 float-left" >Gender: </div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="gender" id="femaleGender" 
							  value="Female" <?php if ($user_data['gender'] == 'Female'){echo 'checked';}?> />
							<label class="form-check-label" for="femaleGender">Female</label>
						</div>

						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="gender" id="maleGender"
							  value="Male" <?php if ($user_data['gender'] == 'Male'){echo 'checked';}?> />
							<label class="form-check-label" for="maleGender">Male</label>
						</div>
					</div>
					<div class="position-relative mt-3">
						<input type="submit" id="update-btn" class="btn btn-primary btn-lg" name="Update">
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>