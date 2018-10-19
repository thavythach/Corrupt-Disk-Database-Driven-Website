

<?php
        // Make sure all elements are nonempty.
	$ssn = $_POST['passenger_ssn'];
	$f_name = $_POST['f_name'];
	$m_name = $_POST['m_name'];
	$l_name = $_POST['l_name'];
	$error = "Success!";

	if ( strlen($ssn) == 0 or strlen($f_name) == 0 or strlen($l_name) == 0){
		// tuple is empty.
		$error = "Social Security Number, First Name, or Last Name has nothing inside the fields.";
		header('Location: insertPass.php?error=$error');
		exit();
	}

	// check m_name
	if ( strlen($m_name) == 0 ){
		$m_name = "";
	}

	// check ssn
	if (!preg_match('#^(\d{3})-(\d{2})-(\d{4})$#', $ssn, $matches)){
		$error = "Social Security Doesn't Match Pattern: 123-45-7890 (xxx-xx-xxxx).";
		header('Location: insertPass.php?error=$error');
		exit();
	}

	header('Location: insertPass.php?error=$error');
	exit();

?>
