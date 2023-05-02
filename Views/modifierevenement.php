<?php
    include_once '../Model/evenement.php';
    include_once '../Controller/evenementC.php';

    $error = "";

    // create evenement
     $evenement = null;

    // create an instance of the controller
     $evenementC = new evenementC();
    if (
        isset($_POST["id"]) &&
        isset($_POST["data_depart"]) &&        
        isset($_POST["data_depart"]) &&
        isset($_POST["description"]) 
        
    ) {
        if (
            !empty($_POST["id"]) && 
            !empty($_POST['nom']) &&
            !empty($_POST["data_depart"]) && 
            !empty($_POST["description"]) 
            
        ) {
             $evenement = new evenement(
                $_POST['id'],
                $_POST['nom'],
                $_POST['data_depart'], 
                $_POST['description']
                
            );
             $evenementC->modifier_evenement( $evenement, $_POST["id"]);
            header('Location:afficherevenement.php');
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
    <button><a href="afficherevenement.php">Retour  des evenement</a></button>
    <hr>
        
    <div id="error">
        <?php echo $error; ?>
    </div>
            
    <?php
        if (isset($_POST['id'])){
            $id = $_POST['id'];
             $evenement =  $evenementC->recupererevenement($id);
            
    ?>
        
    <form action="" method="POST">
        <table border="1" align="center">
            <tr>
                <td>
                    <label for="id">identifiant evenement:
                    </label>
                </td>
                <td><input type="text" name="id" id="id" value="<?php echo  $evenement['id']; ?>" maxlength="20"></td>
            </tr>
            <tr>
                <td>
                    <label for="nom">date de evenement:
                    </label>
                </td>
                <td><input type="text" name="nom" id="nom" value="<?php echo  $evenement['nom']; ?>" maxlength="20"></td>
            </tr>
            <tr>
                <td>
                    <label for="data_depart">date de depart:
                    </label>
                </td>
                <td><input type="text" name="data_depart" id="data_depart" value="<?php echo  $evenement['data_depart']; ?>" maxlength="20"></td>
            </tr>
            <tr>
                <td>
                    <label for="description">description de l'evenement:
                    </label>
                </td>
                <td>
                        <input type="text" name="description" value="<?php echo  $evenement['description']; ?>" id="description">
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