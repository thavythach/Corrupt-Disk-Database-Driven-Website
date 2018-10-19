<html>
<body>
<form action="formHandler2.php", method="post">
Social Security #: <input type="text" name="passenger_ssn" required/><br/>
First Name: <input type="text" name="f_name" required/><br/>
Middle Name: <input type="text" name="m_name"/><br/>
Last Name: <input type="text" name="l_name" required/><br/>

<input type="submit"/>

<?php

if (isset($_GET['error'])) {
	$result = $_GET['error'];

	echo $result;
	echo "swag";
}

?>

</body>
</form>
</html>
