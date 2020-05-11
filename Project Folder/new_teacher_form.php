<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Create Teacher Account</title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<style><?php include 'stylesheet.css'; ?></style>
</head>
<body>
		<center>
		<div style="border:3px; border-style:solid; border-color: #7E57C2; border-radius: 5px; padding: 5px; width: 500px; height: 275px">
			<form action="create_teacher.php" method="post" id="form_id">
				<h2>New Teacher Account</h2>
				First Name:
				<input type="text" name="firstname" id="firstname" placeholder="First Name" /><br/><br/>
				Last Name:
				<input type="text" name="lastname" id="lastname" placeholder="Last Name" /><br/><br/>
				Password:
				<input type="text" name="password" id="password" placeholder="Password" /><br/><br/>
				Class number:
				<input type="text" name="class" id="class" placeholder="Class name"/><br/><br/>
				<input type="submit" name="submit_id" id="login" value="Create" /><br/>
			</form>
		</div>
</center>
</body>
</html>