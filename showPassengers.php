<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="../../../../favicon.ico">

    <!-- CSS -->
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <style>
       body { padding-top: 70px; }
    </style>

    <title>Show Passengers</title>
    </head>
<body>
<header>
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">TeamCorruptDisk</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="/~ubuntu">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="showPassengers.php">Show All Passengers <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="insertPass.php">Create Passenger <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="sqlquery.php">SQL Form <span class="sr-only">(current)</span></a>
            </li>
          </ul>
          <form class="form-inline mt-2 mt-md-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
      </nav>
    </header>


<main role="main">
<div class="container">
<h2>List of all passengers</h2>
<p>
    <?php
	if (isset($_GET['success'])) {
        	$success = $_GET['success'];
	}
        //path to the SQLite database file
        $db_file = './myDB/airport.db';

        try {
            //open connection to the airport database file
            $db = new PDO('sqlite:' . $db_file);

            //set errormode to use exceptions
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 	    //return all passengers, and store the result set
            $query_str = $db->prepare("select * from passengers;"); //where ssn=:passenger_ssn;");
	    // prepare gives back an object, calling bindParam lets it identify the target parts
	    // of the statement to replace
            //$query_str->bindParam("passenger_ssn", $_POST['passenger_ssn']);
	    $query_str->execute();
	    $result = $query_str->fetchAll();
            //loop through each tuple in result set and print out the data
            //ssn will be shown in blue (see below)
	    $res = "";
            foreach($result as $tuple) {
                 echo "<font color='blue'>$tuple[ssn]</font> $tuple[f_name] $tuple[m_name] $tuple[l_name]<br/>\n";
		 if (isset($_GET['success'])) {
                	$success = $_GET['success']; 
			$res = "SUCCESS! Added: <font color='blue'>$tuple[ssn]</font> $tuple[f_name] $tuple[m_name] $tuple[l_name]<br/>\n";
        	}
	    }
	    echo "<p> $res </p>";

            //disconnect from db
            $db = null;
        }
        catch(PDOException $e) {
            die('Exception : '.$e->getMessage());
        }
    ?>

</p>
</div>



</main>
</body>
</html>
