<?php
    include_once '../Model/reservation.php';
    include_once '../Controller/reservationC.php';

    $error = "";

    // create reservation
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
            !empty($_POST['nom']) &&
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
             $reservationC->modifier_reservation( $reservation, $_POST["id"]);
            header('Location:afficherreservation.php');
        }
        else
            $error = "Missing information";
    }    
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>
<body>
    <button><a href="afficherreservation.php">Retour  des reservation</a></button>
    <hr>
        
    <div id="error">
        <?php echo $error; ?>
    </div>
            
    <?php
        if (isset($_POST['id'])){
            $id = $_POST['id'];
             $reservation =  $reservationC->recupererreservation($id);
            
    ?>
        
    <form action="" method="POST">
        <table border="1" align="center">
            <tr>
                <td>
                    <label for="id">identifiant reservation:
                    </label>
                </td>
                <td><input type="text" name="id" id="id" value="<?php echo  $reservation['id']; ?>" maxlength="20"></td>
            </tr>
            <tr>
                <td>
                    <label for="nom">date de reservation:
                    </label>
                </td>
                <td><input type="text" name="nom" id="nom" value="<?php echo  $reservation['nom']; ?>" maxlength="20"></td>
            </tr>
            <tr>
                <td>
                    <label for="etat">date de depart:
                    </label>
                </td>
                <td><input type="text" name="etat" id="etat" value="<?php echo  $reservation['etat']; ?>" maxlength="20"></td>
            </tr>
            <tr>
                <td>
                    <label for="date">date de l'reservation:
                    </label>
                </td>
                <td>
                        <input type="text" name="date" value="<?php echo  $reservation['date']; ?>" id="date">
                    </td>
                </tr>
                <tr>
                <td>
                    <label for="nbp">nombre de personne:
                    </label>
                </td>
                <td>
                        <input type="text" name="nbp" value="<?php echo  $reservation['nbp']; ?>" id="nbp">
                    </td>
                </tr>
               
                   
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Modifier"> 
                    </td>
                    <td>
                        <input type="reset" value="Annuler" >
                    </td>
                </tr>
            </table>
        </form>
		<?php
		}
		?>
    </body>
</html>