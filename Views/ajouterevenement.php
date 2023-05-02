<?php
    include_once '../Model/evenement.php';
    include_once '../Controller/evenementC.php';

    $error = "";

    // create evenement$evenement
    $evenement = null;


    // create an instance of the controller
    $evenementC = new evenementC();
    if (
        isset($_POST["id"]) &&
        isset($_POST["nom"]) &&
        isset($_POST["data_depart"]) &&
        isset($_POST["description"]) 
       
    ) {
        if (
            !empty($_POST["id"]) &&
            !empty($_POST["nom"]) &&
            !empty($_POST["data_depart"]) &&
            !empty($_POST["description"]) 
          
        ) {
           
            $evenement = new evenement(
                $_POST['id'],
                $_POST['nom'],
                $_POST['data_depart'],
                $_POST['description']
            
            );
            $evenementC->ajouterevenement($evenement);
            header('Location: afficherevenement.php');
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
    <button><a href="afficherevenement$evenement.php">Retour a lades evenement$evenements</a></button>
    <hr>
        
    <div id="error">
        <?php echo $error; ?>
    </div>
        
    <form action="" method="POST">
        <table border="1" align="center">
            <tr>
                <td>
                    <label for="id">identifiant evenement:</label>
                </td>
                <td><input type="text" name="id" id="id" maxlength="20"></td>
            </tr>
            <tr>
                <td>
                    <label for="nom">nom d'evenement:</label>
                </td>
                <td><input type="text" name="nom" id="nom" maxlength="20"></td>
            </tr>
            <tr>
                <td>
                    <label for="data_depart">date de depart:</label>
                </td>
                <td><input type="date" name="data_depart" id="data_depart" maxlength="20"></td>
            </tr>
          
            <tr>
                <td>
                    <label for="description">description:</label>
                </td>
                <td>
                        <input type="text" name="description" id="description">
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