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

if (isset($_REQUEST['search_number'])) {
  $n_cmd_search = $_REQUEST['search_number'];
  $stmt = $pdo->prepare("SELECT * FROM reclam WHERE n_cmd=:n_cmd_search");
  $stmt->bindParam(':n_cmd_search', $n_cmd_search, PDO::PARAM_INT);
  if ($stmt->execute()) {
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row) {
      echo "<p>First Name: " . $row['name'] . "</p>";
      echo "<p>Last Name: " . $row['first_name'] . "</p>";
      echo "<p>Email: " . $row['email'] . "</p>";
      echo "<p>phone: " . $row['phone'] . "</p>";
      echo "<p>N COMMAND: " . $row['n_cmd'] . "</p>";
      echo "<p>details: " . $row['details'] . "</p>";
    } else {
      echo "<p> THIS N COMMAND NIOT FOUND IN YOU RECLAMATION </p>";
    }
  } else {
    echo "Error executing SQL statement: " . $stmt->errorInfo()[2];
  }
} else {
  echo "Missing parameter 'search_number'.";
}
?>
