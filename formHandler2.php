

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
		header('Location: insertPass.php?error='.$error);
		exit();
	}

	// check m_name
	if ( strlen($m_name) == 0 ){
		$m_name = "";
	}

	// check ssn
	if (!preg_match('#^(\d{3})-(\d{2})-(\d{4})$#', $ssn, $matches)){
		$error = "Social Security Doesn't Match Pattern: (###-##-####).";
		header('Location: insertPass.php?error='.$error);
		exit();
	}

	if (!preg_match('^([A-Za-z])+$', $f_name, $matches)){
		$error = $f_name . " is not a valid first name.";
                header('Location: insertPass.php?error='.$error);
                exit();
	}

	if (strlen($m_name) >0 and !preg_match('^([A-Za-z])+$', $m_name, $matches)){
                $error = $m_name . " is not a valid middle name.";
                header('Location: insertPass.php?error='.$error);
                exit();
        }

	if (!preg_match('^([A-Za-z])+$', $l_name, $matches)){
                $error = $l_name . " is not a valid last name.";
                header('Location: insertPass.php?error='.$error);
                exit();
        }

	header('Location: insertPass.php?error='.$error);
	exit();

?>
