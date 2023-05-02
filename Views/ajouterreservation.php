<?php
    include_once '../Model/reservation.php';
    include_once '../Controller/reservationC.php';

    $error = "";

    // create reservation$reservation
    $reservation = null;


    // create an instance of the controller
    $reservationC = new reservationC();
    if (
        isset($_POST["id"]) &&
        isset($_POST["nom"]) &&
        isset($_POST["etat"]) &&
        isset($_POST["date"]) &&
        isset($_POST["nbp"]) 
       
    ) {
        if (
            !empty($_POST["id"]) &&
            !empty($_POST["nom"]) &&
            !empty($_POST["etat"]) &&
            !empty($_POST["date"]) &&
            !empty($_POST["nbp"]) 
          
        ) {
           
            $reservation = new reservation(
                $_POST['id'],
                $_POST['nom'],
                $_POST['etat'],
                $_POST['date'],
                $_POST['nbp']
              
               
              
            
            );
            $reservationC->ajouterreservation($reservation);
            header('Location: afficherreservation.php');
            exit();
        } else {
            $error = "Missing information";
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>
<body>
    <button><a href="afficherreservation$reservation.php">Retour a lades reservation$reservations</a></button>
    <hr>
        
    <div id="error">
        <?php echo $error; ?>
    </div>
        
    <form action="" method="POST">
        <table border="1" align="center">
            <tr>
                <td>
                    <label for="id">identifiant reservation:</label>
                </td>
                <td><input type="text" name="id" id="id" maxlength="20"></td>
            </tr>
            <tr>
                <td>
                    <label for="nom">nom d'reservation:</label>
                </td>
                <td><input type="text" name="nom" id="nom" maxlength="20"></td>
            </tr>
            <tr>
                <td>
                    <label for="etat">etat:</label>
                </td>
                <td><input type="text" name="etat" id="etat" maxlength="20"></td>
            </tr>

            <tr>
                <td>
                    <label for="date">date:</label>
                </td>
                <td><input type="date" name="date" id="date" maxlength="20"></td>
            </tr>
          
            <tr>
                <td>
                    <label for="nbp">nbp:</label>
                </td>
                <td>
                        <input type="text" name="nbp" id="nbp">
                    </td>
                </tr>
               
                    
                   
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Envoyer"> 
                    </td>
                    <td>
                        <input type="reset" value="Annuler" >
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>