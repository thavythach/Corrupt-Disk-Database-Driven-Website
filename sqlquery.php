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

    <title>Databases Home Page</title>
  </head>
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
