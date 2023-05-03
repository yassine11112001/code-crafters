<?php
$host = '127.0.0.1'; // Host name
$db_name = 'reclamation'; // Database name
$username = 'root'; // Database username
$password = ''; // Database password

try {
  $pdo = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully!";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

$n_cmd_a = $_REQUEST['n_cmd_a'];

// First delete related rows from the reply table
$sql = "DELETE FROM reply WHERE n_cmd=:n_cmd_a";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':n_cmd_a', $n_cmd_a, PDO::PARAM_INT);
$stmt->execute();

// Then delete the row from the reclam table
$sql = "DELETE FROM reclam WHERE n_cmd=:n_cmd_a";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':n_cmd_a', $n_cmd_a, PDO::PARAM_INT);

if ($stmt->execute()) {
  echo "<h3>YOUR RECLAMATION HAS BEEN DELETED SUCCESSFULLY</h3>";
} else {
  echo "Error deleting record: " . $stmt->errorInfo()[2];
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