<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "reclamation";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $n_cmd_b = $_REQUEST['n_cmd_b'];
  $to_modify = $_REQUEST['select_liste'];
  $new_value = $_REQUEST['new_value'];

  $sql = "UPDATE reclam SET $to_modify=:new_value WHERE n_cmd=:n_cmd_b";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':new_value', $new_value);
  $stmt->bindParam(':n_cmd_b', $n_cmd_b);

  if ($stmt->execute()) {
    echo "<h3>YOUR RECLAMATION HAS BEEN MODIFIED SUCCESSFULLY</h3>";
  }
} catch (PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
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
<a href="affichageClient.php">GO BACK TO RECLAMATION</a>
</body>
</html>