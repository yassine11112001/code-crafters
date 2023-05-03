<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "reclamation";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $name = $_REQUEST['name'];
  $first_name = $_REQUEST['first_name'];
  $email = $_REQUEST['email'];
  $phone = $_REQUEST['phone'];
  $n_cmd = $_REQUEST['cnumber'];
  $details = $_REQUEST['details'];
  $stmt = $conn->prepare("INSERT INTO reclam (name, first_name, email, phone, n_cmd, details)
                          VALUES (:name, :first_name, :email, :phone, :cnumber, :details)");
  $stmt->bindParam(':name', $name);
  $stmt->bindParam(':first_name', $first_name);
  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':phone', $phone);
  $stmt->bindParam(':cnumber', $n_cmd);
  $stmt->bindParam(':details', $details);

  $stmt->execute();

  echo "<h3>YOUR RECLAMATION HAS BEEN SENT SUCCESSFULLY</h3>.";
  echo nl2br("\n$name\n $first_name\n $email\n $phone\n $n_cmd \n $details");
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;
?>