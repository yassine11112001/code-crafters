<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "lina");
$searchQuery = $_POST['search'];
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 

    // Prepare a select statement
    $sql = "SELECT * FROM livraison WHERE description LIKE ? OR adresse LIKE ? OR id_commande LIKE ? OR  date LIKE ?  ";
    
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "ssss" , $param_term, $param_term, $param_term, $param_term);
   

        // Set parameters
        $param_term =  '%'. $searchQuery . '%';
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
            
            // Check number of rows in the result set
            if(mysqli_num_rows($result) > 0){
                // Fetch result rows as an associative array
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                 
              
              
                    echo "   <tr> ";
                    echo " <td> " .$row['id']  . "  </td>";
                    echo " <td> ". $row['description']. "</td>";
                    echo " <td> " .$row['adresse']." </td>";
                    echo " <td> ". $row['id_commande']."</td>";
                    echo "  <td> ". $row['date'] ." </td>";
                    echo "  <td>";
                    echo '       <a href="modifierlivraison.php?id=" ' .  $row['id'] . '>modifier</a>';
                    echo "   </td>";
                    
            
                    echo "    <td> ";
                    echo "       <a href='supprimerlivraison.php?id='". $row['id'] .">Supprimer</a>";
                    echo "   </td>";
    
                    echo "  </tr>";
              
              
              
              
              
                }
            } else{
                echo "<p>No matches found</p>";
            }
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);

 
// close connection
mysqli_close($link);
?>