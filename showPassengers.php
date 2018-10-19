<!DOCTYPE html>
<html>
<body>
<h2>List of all passengers</h2>
<p>
    <?php

        //path to the SQLite database file
        $db_file = './myDB/airport.db';

        try {
            //open connection to the airport database file
            $db = new PDO('sqlite:' . $db_file);

            //set errormode to use exceptions
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 	    //return all passengers, and store the result set
            $query_str = $db->prepare("select * from passengers where ssn=:passenger_ssn;");
	    // prepare gives back an object, calling bindParam lets it identify the target parts
	    // of the statement to replace
            $query_str->bindParam("passenger_ssn", $_POST['passenger_ssn']);
	    $query_str->execute();
            //loop through each tuple in result set and print out the data
            //ssn will be shown in blue (see below)
            foreach($query_str as $tuple) {
                 echo "<font color='blue'>$tuple[ssn]</font> $tuple[f_name] $tuple[m_name] $tuple[l_name]<br/>\n";
            }

            //disconnect from db
            $db = null;
        }
        catch(PDOException $e) {
            die('Exception : '.$e->getMessage());
        }
    ?>

</p>
</body>
</html>
