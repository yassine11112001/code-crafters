<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "reclamation";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

        $name =  $_REQUEST['name'];
        $first_name = $_REQUEST['first_name'];
        $email =  $_REQUEST['email'];
        $phone = $_REQUEST['phone'];
        $n_cmd = $_REQUEST['cnumber'];
        $details = $_REQUEST['details'];
        $sql = "INSERT INTO reclam  VALUES ('$name','$first_name','$email','$phone','$n_cmd','$details')";

                if(mysqli_query($conn, $sql)){
            echo "<h3>YOUR RECLAMATION HAS BEEN SENT SUCCESFULY</h3>.";
 
            echo nl2br("\n$name\n $first_name\n "
                . "$email\n $phone\n $n_cmd \n $details");
        } else{
            echo "ERROR: $sql. "
                . mysqli_error($conn);
        }
?>