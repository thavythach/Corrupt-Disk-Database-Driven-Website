$db_file = './myDB/airport.db';

try {
	// open connection to the database
	$db = new PDO('sqlite:' . $db_file);

	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$query_str = $db->prepare("INSERT into passengers (ssn, f_name, m_name, l_name) VALUES (:ssn, :f_name, :m_name, :l_name);");

	$query_str->bindParam("ssn", $passenger_ssn);
	$query_str->bindParam("f_name", $f_name);
	$query_str->bindParam("m_name", $m_name);
	$query_str->bindParam("l_name", $l_name);

	// execute the insertion
	$query_str->execute();
}