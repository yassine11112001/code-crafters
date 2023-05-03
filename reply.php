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

if (isset($_REQUEST['n_cmd_reply'])) {
  $n_cmd_rep = $_REQUEST['n_cmd_reply'];
  $reply = $_REQUEST['reply'];
  $stmt = $pdo->prepare("SELECT n_cmd FROM reclam WHERE n_cmd=:n_cmd_rep");
  $stmt->bindParam(':n_cmd_rep', $n_cmd_rep, PDO::PARAM_INT);
  if ($stmt->execute()) {
    echo $stmt->rowCount() . " rows returned.";
    $stmt = $pdo->prepare("INSERT INTO reply(n_cmd, rep) VALUES(:n_cmd_rep, :reply)");
     $stmt->bindParam(':n_cmd_rep', $n_cmd_rep);
 	 $stmt->bindParam(':reply', $reply);
 	 $stmt->execute();
  } else {
    echo "Error executing SQL statement: " . $stmt->errorInfo()[2];
  }
} else {
  echo "Missing parameter 'n_cmd_reply'.";
}
?>
