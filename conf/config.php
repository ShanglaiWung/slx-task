<?php
function slx_db_connection() {
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "slx-assignment";

	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	  die("Database Connection failed: " . $conn->connect_error);
	}
	return $conn;
}

function insert_slx_user($f_name, $l_name, $email, $phone_number, $password, $gender) {
	$db = slx_db_connection();
	$sql = "INSERT INTO users (f_name, l_name, email, phone, pass, gender) VALUES ('$f_name', '$l_name', '$email', '$phone_number', '$password', '$gender')";

	if ($db->query($sql) === TRUE) {
		header('Location: /pages/details.php');
		exit();
	} else {
		echo "<script>alert('Error: " . $sql . "<br>" . $db->error . "');</script>";
	}

	$db->close();
}

function update_slx_user($f_name, $l_name, $email, $phone_number, $gender, $id) {
	$db = slx_db_connection();
	$sql = "UPDATE users SET f_name='$f_name', l_name='$l_name', email='$email', phone='$phone_number', gender='$gender' WHERE id=".$id;

	if ($db->query($sql) === TRUE) {
		header('Location: /pages/details.php');
		exit();
	} else {
		echo "<script>alert('Error updating record: " . $db->error . "');</script>";
	}

	$db->close();
}

function get_all_slx_user() {
	$db = slx_db_connection();
	$sql = "SELECT id, f_name, l_name, email, phone, gender FROM users ORDER BY id DESC";
	$result = $db->query($sql);

	if ($result->num_rows > 0) {
		return $result;
	} else {
		echo "<script>alert('0 results');</script>";
	}
	$db->close();
}

function get_specific_slx_user($id) {
	$db = slx_db_connection();
	$sql = "SELECT f_name, l_name, email, phone, gender FROM users WHERE id=".$id;
	$result = $db->query($sql);

	if ($result->num_rows > 0) {
		return mysqli_fetch_assoc($result);
	} else {
		echo "<script>alert('0 results');</script>";
	}
	$db->close();
}
?>