<?php
	include_once 'C:\xampp\htdocs\LINA\Config.php';
	include_once 'C:\xampp\htdocs\LINA\Model\Commande.php';
	class CommandeC {
	
		function affichecommande(){
			$sql="SELECT * FROM commande";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}


		function supprimercommande($id){
			$sql="DELETE FROM commande WHERE id=:id ";
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

		function ajoutercommande($Commande){
			$sql="INSERT INTO commande (total, id_user) 
			VALUES ( :total, :id_user)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'total' => $Commande->gettotal(),
                    'id_user' => $Commande->getid_user()
                    
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}

		function recuperercommande($id){
			$sql="SELECT * from commande where id=$id";
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
		
		function modifiercommande($Commande, $id){
         
    
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE commande SET 
		           
                   total= :total
					WHERE id= :id'
				);
				$query->execute([
                 
                    'total' => $Commande->gettotal(),
                    'id' => $id
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
          
		}


        
		function recupererlastcommande(){
			$sql="SELECT max(id) as nb FROM commande GROUP BY id";
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

		function count(){
			$sql="SELECT COUNT(*) as nb FROM commande";
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