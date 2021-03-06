<?php
	
	require_once 'files.php';
	require_once 'config.php';
	echo "<pre>";

	session_start();

	extract($_POST);

	createTeacherAccount($firstname, $lastname, $password, $cPassword, $class);
	echo "Teacher ".$firstname." ".$lastname." added";

	function createTeacherAccount($firstname, $lastname, $password, $cPassword, $class){
		// must not be a teacher account that already exists
		$all_users = get_user_info(USERFILE);
		foreach($all_users as $user){
			if($user["first"] === strtolower($firstname) && $user["last"] === strtolower($lastname) && $user["type"] == "teacher"){
				inputError("user exists already");
			}
			if($user["enrolledClass"] === $class){
				inputError("class name already exists");
			}
		}

		// inputs must not contain spaces
		if(strpos($firstname, ' ') !== false){ inputError("inputs must not contain spaces"); }
		if(strpos($lastname, ' ') !== false){ inputError("inputs must not contain spaces"); }
		if(strpos($class, ' ') !== false){ inputError("inputs must not contain spaces"); }

		if($cPassword === $password && $firstname != '' && $lastname != '' && $password != '' && $class != ''){
			$teacher_info = array(strtolower($firstname), strtolower($lastname), "teacher", password_hash($password, PASSWORD_DEFAULT), "4", $class, "0", "0", "0", "0", "#");

			save_data(USERFILE, $teacher_info);
			$_SESSION["accountSuccess"] = "account successfully created";
			$_SESSION["accountError"] = null;
			createClass($class);
			header("Location: teacher_login.php");
		}
		else{
			inputError("passwords must match and every field must be filled");
		}
	}

	function inputError($errormessage){
		$_SESSION["accountSuccess"] = null;
		$_SESSION["accountError"] = $errormessage;
		// we should add something to this function to inform the user what went wrong
		header("Location: new_teacher_form.php");
		exit;
	}

	function createClass($newClassName){
		$class_info = array($newClassName, "1", "20", "39", "0", "19", "15", "#");
		save_data(CLASSFILE, $class_info);
	}
?>