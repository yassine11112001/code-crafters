<?php
$host = '127.0.0.1'; // Host name
$db_name = 'reclamation'; // Database name
$username = 'root'; // Database username
$password = ''; // Database password

try {
  $pdo = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "HERE IS YOUR RECLAMATION REPLY";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
if (isset($_REQUEST['n_cmd_client'])) {
  $n_cmd_client = $_REQUEST['n_cmd_client'];
  $stmt = $pdo->prepare("SELECT * FROM reply WHERE n_cmd=:n_cmd_client");
  $stmt->bindParam(':n_cmd_client', $n_cmd_client, PDO::PARAM_INT);
  if ($stmt->execute()) {
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row) {
      echo "<p>Numero de ticket: " . $row['id'] . "</p>";
      echo "<p>Numero de commande: " . $row['n_cmd'] . "</p>";
      echo "<p>Notre reponse: <p> " . $row['rep'] . "</p>";
    } else {
      echo "<p> THIS N COMMAND NIOT FOUND IN YOU RECLAMATION </p>";
    }
  } else {
    echo "Error executing SQL statement: " . $stmt->errorInfo()[2];
  }
} else {
  echo "Missing parameter 'n_cmd_client'.";
}
?>
