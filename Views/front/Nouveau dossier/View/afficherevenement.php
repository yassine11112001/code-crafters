<?php
	include '../Controller/evenementC.php';
	$evenementC=new evenementC();
	$evenement=$evenementC->afficherevenement(); 
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
                        <li class="nav-item"><a class="nav-link" href="./afficherevenement.php">evenement</a></li>
                        <li class="nav-item"><a class="nav-link" href="./afficherreservation.php">Reservation</a></li>
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
		<button><a href="ajouterevenement.php">Ajouter un evenement</a></button>
		<center><h1>Liste des evenements</h1></center>
		<table border="1" align="center">
			<tr>
				<th>id</th>
				<th>nom</th>
				<th>data_depart</th>
				<th>description</th>
				
				<th>Modifier</th>
				<th>Supprimer</th>
			</tr>
			<?php
				foreach($evenement as $evenement){
			?>
			<tr>
				<td><?php echo $evenement['id']; ?></td>
				<td><?php echo $evenement['nom']; ?></td>
				<td><?php echo $evenement['data_depart']; ?></td>
				<td><?php echo $evenement['description']; ?></td>
				
				<td>
					<form method="POST" action="modifierevenement.php">
						<input type="submit" name="Modifier" value="Modifier">
						<input type="hidden" value=<?PHP echo $evenement['id']; ?> name="id">
					</form>
				</td>
				<td>
					<a href="supprimerevenement.php?id=<?php echo $evenement['id']; ?>">Supprimer</a>
				</td>
			</tr>
			<?php
				}
			?>
		</table>
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

