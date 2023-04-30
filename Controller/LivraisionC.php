<?php
	include_once 'C:\xampp\htdocs\LINA\Config.php';
	include_once 'C:\xampp\htdocs\LINA\Model\Livraison.php';
	class LivraisonC {
	
		function afficherlivraison(){
			$sql="SELECT * FROM livraison";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
		function supprimerlivraison($id){
			$sql="DELETE FROM livraison WHERE id=:id ";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id', $id);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
	


		function getEmailByCommandeId($id_commande){
			$sql="SELECT user.email 
				  FROM commande 
				  INNER JOIN user ON commande.id_user = user.id 
				  WHERE commande.id=:id_commande";
		
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->bindParam(':id_commande', $id_commande);
				$query->execute();
				$email=$query->fetchColumn();
				return $email;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		

		function ajouterlivraison($livraison){
			$sql="INSERT INTO livraison (description, adresse, id_commande) 
			VALUES ( :description, :adresse, :id_commande)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'description' => $livraison->getdescription(),
                    'adresse' => $livraison->getadresse(),
                    'id_commande' => $livraison->getid_commande()
                    
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}

		function recupererlivraison($id){
			$sql="SELECT * from livraison where id=$id";
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
		
		function modifierlivraison($livraison, $id){
         
    
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE livraison SET 
		           
                   description= :description,
                   adresse= :adresse
					WHERE id= :id'
				);
				$query->execute([
                 
                    'description' => $livraison->getdescription(),
                    'adresse' => $livraison->getadresse(),
                    'id' => $id
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
          
		}

	}
?>