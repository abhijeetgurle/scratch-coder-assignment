<?php

	$servername = "localhost";
	$username = "root";
	$password = "password";
	$dbname = "students";

	$link = mysqli_connect($servername, $username, $password, $dbname);

	if($link === false){
    	die("ERROR: Could not connect. " . mysqli_connect_error());
	}


	$sql = "CREATE TABLE IF NOT EXISTS students_data(
			student_roll_no INT AUTO_INCREMENT PRIMARY KEY,
			student_name varchar(255) NOT NULL,
			student_course varchar(255) NOT NULL
			)";

	if(!mysqli_query($link, $sql)) {
	    die("ERROR: Could not create table students_data. " . mysqli_connect_error());
	}

	//take input from form
	$fullName = mysqli_real_escape_string($link, $_REQUEST['fullName']);
	$selectedCourse = mysqli_real_escape_string($link, $_REQUEST['selectedCourse']);

	echo "Full Name: " . $fullName;
	echo "Selected Course: " . $selectedCourse;

	$sql = "INSERT INTO students_data (student_name, student_course) VALUES ('$fullName', '$selectedCourse')";

	if(mysqli_query($link, $sql)){
	    echo "Records added successfully.";
	} 
	else{
	    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
	}

	// Close connection
	mysqli_close($link);
?>