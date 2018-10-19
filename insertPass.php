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

    <title>Add Passenger</title>
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
<form action="formHandler2.php", method="post">
Social Security #: <input type="text" name="passenger_ssn" required/><br/>
First Name: <input type="text" name="f_name" required/><br/>
Middle Name: <input type="text" name="m_name"/><br/>
Last Name: <input type="text" name="l_name" required/><br/>

<input class="btn btn-lg btn-primary" type="submit"/>

<?php

if (isset($_GET['error'])) {
	$result = $_GET['error'];

	echo "<br> <h1>Result:</h1>".$result;
}

?>
</form>
</div>
</main>
</body>
</form>
</html>
