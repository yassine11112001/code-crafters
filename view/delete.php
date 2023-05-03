<?php
$dsn = 'mysql:host=localhost;dbname=article';
$username = 'root';
$password = '';

try {
    $connection = new PDO($dsn, $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
require_once(__DIR__ . '/../config.php');

$id = $_GET['id'];

$sql = 'DELETE FROM article WHERE id=:id';

try {
    $pdo = new PDO("mysql:host=localhost;dbname=article", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $statement = $pdo->prepare($sql);
    $statement->execute([':id' => $id]);

    echo '<script>alert("Record deleted successfully!"); window.location.href="afficherarticle.php";</script>';
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>