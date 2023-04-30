<?php
	include_once 'C:\xampp\htdocs\LINA\Config.php';
	include_once 'C:\xampp\htdocs\LINA\Model\Ligne_commande.php';
	class Ligne_commandeC {
	
		function afficheligne_commande(){
			$sql="SELECT * FROM ligne_commande";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
		function supprimerligne_commande($id,$idp){
			$sql="DELETE FROM ligne_commande WHERE id_comm=:id and id_produit=:idp";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id', $id);
			$req->bindValue(':idp', $idp);

			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}

		function ajouterligne_commande($Ligne_commande){
			$sql="INSERT INTO ligne_commande (id_comm , id_produit , prix, quantite, total) 
			VALUES ( :id_comm, :id_produit, :prix, :quantite, :total)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'id_comm' => $Ligne_commande->getid_comm(),
                    'id_produit' => $Ligne_commande->getid_produit(),
					'prix' => $Ligne_commande->getprix(),
					'quantite' => $Ligne_commande->getquantite(),
                    'total' => $Ligne_commande->gettotal()
                    
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}

		function recupererLigne_commande($idproduit,$id_comm ){
			$sql="SELECT * from ligne_commande where id_produit =$idproduit and  id=$id_comm";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$avis=$query->fetch();
				return $avis;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifierligne_commande($ligne_commande, $id_comm, $id_produit){
         
    
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE ligne_commande SET 
		           
                   prix= :prix,
				   quantite= :quantite
					WHERE id_comm= :id_comm and id_produit= :id_produit'
				);
				$query->execute([
                 
                    'prix' => $ligne_commande->getnom(),
					'quantite' => $ligne_commande->getnom(),
					'id_comm' => $id_comm,
                    'id_produit' => $id_produit
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
          
		}

		function count(){
			$sql="SELECT COUNT(*) as nb FROM ligne_commande";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$avis=$query->fetch();
				return $avis;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}

		
	}
?>