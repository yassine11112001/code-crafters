<?php
    include_once '../Model/reservation.php';
    include_once '../Controller/reservationC.php';
    include_once '../Controller/evenementC.php';

    $evenementC=new evenementC();
	$evenement=$evenementC->afficherevenement(); 

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
        isset($_POST["nbp"]) &&
        isset($_POST["event"])
        
    ) {
        if (
            !empty($_POST["id"]) && 
            !empty($_POST['nom']) &&
            !empty($_POST["etat"]) && 
            !empty($_POST["date"]) &&
            !empty($_POST["nbp"]) &&
            !empty($_POST["event"])
            
        ) {
             $reservation = new reservation(
                $_POST['id'],
                $_POST['nom'],
                $_POST['etat'], 
                $_POST['date'],
                $_POST['nbp'],
                $_POST["event"]
            );
             $reservationC->modifier_reservation( $reservation, $_POST["id"]);
            header('Location:afficherreservation.php');
        }
        else
            $error = "Missing information";
    }    
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>LA MAIN VERTE</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container px-4 px-lg-5">
               <!-- <a class="navbar-brand" href="#page-top">Start Bootstrap</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button> -->
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="#projects">Projects</a></li>
                        <li class="nav-item"><a class="nav-link" href="#signup">Contact</a></li>
                        <li class="nav-item"><a class="nav-link" href="/user/view/Front/login.php">Inscription</a></li>
                        <li class="nav-item"><a class="nav-link" href="lamainverte.html">evenement</a></li>
                        <li class="nav-item"><a class="nav-link" href="lamainverte1.html">Reservation</a></li>
                        <li class="nav-item"><a class="nav-link" href="/user/view/Back/affichageClient.php">Parametres</a></li>
                        </div>
                        <a class="btn btn-primary py-2 px-4" href="logout.php" >Log Out</a>
                        </div>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
                <div class="d-flex justify-content-center">
                    <div class="text-center">
                        <h1 class="mx-auto my-0 text-uppercase">Lets go green</h1>
                        <h2 class="text-white-50 mx-auto mt-2 mb-5">Be a part of the solution not part of the pollution.</h2>
                        <a class="btn btn-primary" href="#about">Get Started</a>
                    </div>
                </div>
            </div>
        </header>
        <!-- About-->
        <section class="about-section text-center" id="about">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8">
                        <!--<h2 class="text-white mb-4">Built with Bootstrap 5</h2> -->
                        <pre class="text-white-50">
L'objectif de ce projet est de créer une entreprise de pépinière écologique qui se concentre sur la vente de plantes et de produits
  liés à l'environnement.La pépinièresera conçue pour offrir une expérience utilisateur agréable et intuitive, ainsi que pour
       mettre en valeur les produits écologiques disponibles à la vente.Les produits vendus par la pépinière écologique
           pourront inclure des plantes d'intérieur, des plantes d'extérieur, des plantes comestibles, des graines,
            des pots de fleurs, des outils de jardinage, etc. La pépinière se concentrera sur la vente de produits
               écologiques qui sont fabriqués à partir de matériaux durables et qui ont un impact minimal sur
               l'environnement.
                        </pre>
                    </div>
                </div>
                <img class="img-fluid" src="assets/img/ipad.png" alt="..." />
            </div>
        </section>
        <!-- Projects-->
        <section class="projects-section bg-light" id="projects">
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
                
                <td>
                        <label for="cout_personne">nom evenement :
                        </label>
                    </td>
                    <td>

                    <select name="event">
                        <?php foreach($evenement as $e) { ?>
                            
                            
                            <option value=<?php echo $e['id'] ?>> <?php echo $e['nom'] ?> </option>
                            

                        <?php }?>
                    </select>
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
        </section>
        <!-- Signup-->
        
        <!-- Footer-->
        <footer class="footer bg-black small text-center text-white-50"><div class="container px-4 px-lg-5">Copyright &copy; Your Website 2022</div></footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>

