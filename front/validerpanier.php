
<?php
	include_once 'C:\xampp\htdocs\LINA\Controller\ProduitC.php';
    include_once 'C:\xampp\htdocs\LINA\Controller\CommandeC.php';
    include_once 'C:\xampp\htdocs\LINA\Controller\Ligne_commandeC.php';
    include_once 'C:\xampp\htdocs\LINA\Model\Ligne_commande.php';
    include_once 'C:\xampp\htdocs\LINA\Model\Commande.php';

    session_start();
 
	$ProduitC=new ProduitC();

$CommandeC=new CommandeC();
$Ligne_commandeC=new Ligne_commandeC();
$Commande=null;
$Ligne_commande=null;
$total=null;

$p=null;
if( isset($_POST['btnSubmit1']))
{
    foreach($_SESSION["panier"] as $produit){
        $p=$ProduitC->recupererproduit($produit);
        echo($p['prix']);
        $total+= (float)$p['prix'] *  (float)$_POST[$p['id']];
    }
    $p=null;



    $CommandeC->ajoutercommande(new Commande(1,$total,"",1));
    foreach($_SESSION["panier"] as $produit){
        $p=$ProduitC->recupererproduit($produit);
        $id_comm=$CommandeC->recupererlastcommande()['nb'];
        $Ligne_commandeC->ajouterligne_commande( new Ligne_commande( $id_comm,$p['id'],$p['prix'],$_POST[$p['id']],$_POST[$p['id']] * $p['prix']));
    }

session_destroy();
    header("Location:afficherproduit.php");
}




	

?>
            <!-- Navbar End -->
	
            








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
                        <li class="nav-item"><a class="nav-link" href="afficherproduit.php">Produit</a></li>
                        <li class="nav-item"><a class="nav-link" href="lamainverte1.html">News</a></li>
                        <li class="nav-item"><a class="nav-link" href="validerpanier.php">panier</a></li>
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

       
  

		<center><h1>panier</h1></center>
        <?php
            if (isset($_SESSION["panier"]))
            {
                ?>
		<div class="row">
                           
								<div class="col-md-11">
                                  
								 
		<div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
			<tr>
			<th>id</th>
				<th>nom</th>
				<th>description</th>
                <th>prix</th>
                <th>quantite</th>
                <th>delete</th>
                
			</tr>
			<?php
        

       
				foreach($_SESSION["panier"] as $produit){
                 

                   $p= $ProduitC->recupererproduit($produit);
			?>
			<tr>
				<td><?php echo $p['id']; ?></td>
				<td><?php echo $p['nom']; ?></td>
				<td><?php echo $p['description']; ?></td>
				<td><?php echo $p['prix']; ?></td>
                <td>
                    <?php
               
                    
                    ?>
                    <form id="" method="POST">
				<div class="input-group w-auto justify-content-end align-items-center">
         <input type="button" value="-" class="button-minus border rounded-circle  icon-shape icon-sm mx-1 " data-field="<?php echo $p['id']; ?>">
         <input type="number" step="1" max="10" value="1" id="<?php echo $p['id']; ?>"  name="<?php echo $p['id']; ?>" class="quantity-field border-0 text-center w-25">
         <input type="button" value="+" class="button-plus border rounded-circle icon-shape icon-sm "   data-field="<?php echo $p['id']; ?>">
       
        </div>
      </td>
	
      <td>   <a href="supprimerpanier.php?idproduit=<?php echo $p['id']; ?>">   <img src="assets/img/delete1.png"  height="50px" width="50px" >    </td>
			</tr>
			<?php
				}     
			?>
		</table>
			</div>
		</div>
	      <!-- Footer End -->
		  </div>
          <input type="submit" class="btn btn-primary"  name="btnSubmit1" value="valider panier">

      <?php
				}     
                else 
                {

               
			?>
        <h1>  panier is empty   </h1>

            <?php
             
    
            
            }
            
            ?>
            

        <!-- Contact-->
        <section class="contact-section bg-black">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5">
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-map-marked-alt text-primary mb-2"></i>
                                <h4 class="text-uppercase m-0">Address</h4>
                                <hr class="my-4 mx-auto" />
                                <div class="small text-black-50">2081 Tunisie, Ariana Essoughra</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-envelope text-primary mb-2"></i>
                                <h4 class="text-uppercase m-0">Email</h4>
                                <hr class="my-4 mx-auto" />
                                <div class="small text-black-50"><a href="#!">la.main.verte@esprit.tn</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-mobile-alt text-primary mb-2"></i>
                                <h4 class="text-uppercase m-0">Phone</h4>
                                <hr class="my-4 mx-auto" />
                                <div class="small text-black-50">+(216) 58125684</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="social d-flex justify-content-center">
                    <a class="mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                    <a class="mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                    <a class="mx-2" href="#!"><i class="fab fa-github"></i></a>
                </div>
            </div>
        </section>
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

        <!-- Content End -->

		
    <!-- JavaScript Libraries -->


    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script> 
function incrementValue(e) {
        e.preventDefault();
        var fieldName = $(e.target).data('field');
        var parent = $(e.target).closest('div');
        var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);

        if (!isNaN(currentVal)) {
            parent.find('input[name=' + fieldName + ']').val(currentVal + 1);
        } else {
            parent.find('input[name=' + fieldName + ']').val(0);
        }
    }

    function decrementValue(e) {
        e.preventDefault();
        var fieldName = $(e.target).data('field');
        var parent = $(e.target).closest('div');
        var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);

        if (!isNaN(currentVal) && currentVal > 0) {
            parent.find('input[name=' + fieldName + ']').val(currentVal - 1);
        } else {
            parent.find('input[name=' + fieldName + ']').val(0);
        }
    }

    $('.input-group').on('click', '.button-plus', function(e) {
        incrementValue(e);
    });

    $('.input-group').on('click', '.button-minus', function(e) {
        decrementValue(e);
    });


</script>
</body>

</html>