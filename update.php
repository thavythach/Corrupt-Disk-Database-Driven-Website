

<?php
        // Make sure all elements are nonempty.
$ssn = $_POST['passenger_ssn'];
$f_name = $_POST['f_name'];
$m_name = $_POST['m_name'];
$l_name = $_POST['l_name'];
$ossn = $_GET['oldSSN'];
$of = $_GET['of'];
$om = $_GET['om'];
$ol = $_GET['ol'];

$error = "Success!";
$ssnCond = $ossn == $ssn;

//header('Location: updatePass.php?."&ssn=".$ossn."&f_name=".$of."&m_name=".$om."&l_name=".$ol);
//exit();


//$hdloc = 'Location: updatePass.php?error='.$error."&ssn=".$ossn."&f_name=".$of."&m_name=".$om."&l_name=".$ol;
if ( strlen($ssn) == 0 or strlen($f_name) == 0 or strlen($l_name) == 0){
    // tuple is empty.
  $error = "Social Security Number, First Name, or Last Name has nothing inside the fields.";

  header('Location: updatePass.php?error='.$error."&ssn=".$ossn."&f_name=".$of."&m_name=".$om."&l_name=".$ol);
  exit();
}

  // check m_name
if ( strlen($m_name) == 0 ){
  $m_name = "";
}

$pattern = '/^[A-Za-z]+/';

  // check ssn
if (!preg_match('^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]\d{2}[\s.-]\d{4}$', $ssn, $matches)){
  $error = "Social Security Doesn't Match Pattern: (yyy-yy-yyyy).";
  header('Location: updatePass.php?error='.$error."&ssn=".$ossn."&f_name=".$of."&m_name=".$om."&l_name=".$ol);
  exit();
}

if (!preg_match($pattern, $f_name)){
  $error = $f_name . " is not a valid first name.";
  header('Location: updatePass.php?error='.$error."&ssn=".$ossn."&f_name=".$of."&m_name=".$om."&l_name=".$ol);
  exit();
}

if (strlen($m_name) >0){
  if(!preg_match($pattern, $m_name)){
   $error = $m_name . " is not a valid middle name.";
   header('Location: updatePass.php?error='.$error."&ssn=".$ossn."&f_name=".$of."&m_name=".$om."&l_name=".$ol);
   exit();
 }
}

if (!preg_match($pattern, $l_name)){
  $error = $l_name . " is not a valid last name.";
  header('Location: updatePass.php?error='.$error."&ssn=".$ossn."&f_name=".$of."&m_name=".$om."&l_name=".$ol);
  exit();
}

  // insert cool query stuff here rip
$db_file = './myDB/airport.db';

try {
    // open connection to the database
  $db = new PDO('sqlite:' . $db_file);

  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  //if ($ssnCond != 1){
  //	$ssnDiffQuery = $db->prepare("DELETE FROM passengers where (ssn = :ssn);");
       // $ssnDiffQuery->bindParam("ssn", $oldSSN);
     //   $ssnDiffQuery->execute();
   //     $ssnDiffQuery = $db->prepare("
 // }

  $query_str = $db->prepare("UPDATE passengers set ssn = :newssn, f_name = :f_name, m_name = :m_name, l_name = :l_name  where ssn = :oldssn;"); //, f_name = :f_name, m_name = :m_name, l_name = :l_name);");

  $query_str->bindParam("newssn", $ssn);
  $query_str->bindParam("oldssn", $ossn);
  $query_str->bindParam("f_name", $f_name);
  $query_str->bindParam("m_name", $m_name);
  $query_str->bindParam("l_name", $l_name);

    // execute the update
  $query_str->execute();
} catch(PDOException $e) {
  $error = "Social Security Number Exists! Failed to add ssn!";
  header('Location: updatePass.php?error='.$error."&ssn=".$ossn."&f_name=".$of."&m_name=".$om."&l_name=".$ol);
  exit();
}

header('Location: showPassengers.php?success='.$error);
exit();

?>
