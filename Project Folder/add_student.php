<?php
	
	require_once 'files.php';
	require_once 'config.php';
	echo "<pre>";

	extract($_POST);

	createStudentAccount($username, $password);
	echo "Student ".$username." ".$password." added";

	function createStudentAccount($username, $password){
		$student_info = array($username, $password, "student", "0", "1");

		save_data(USERFILE, $student_info);
	}

	header("Location: mainMenu.php");
?>