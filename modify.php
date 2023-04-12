<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "reclamation";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$n_cmd_b = $_REQUEST['n_cmd_b'];
$to_modify = $_REQUEST['select_liste'];
$new_value = $_REQUEST['new_value'];
$sql= "UPDATE reclam SET $to_modify='$new_value' WHERE n_cmd=$n_cmd_b";
if(mysqli_query($conn, $sql)){
            echo "<h3>YOUR RECLAMATION HAS BEEN MODIFIED SUCCESFULY</h3>.";
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>DELETED</title>
</head>
<body>
<a href="reclamation.php">GO BACK TO RECLAMATION</a>
</body>
</html>