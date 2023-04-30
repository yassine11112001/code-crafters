<?php
	include_once 'C:\xampp\htdocs\LINA\Config.php';
	include_once 'C:\xampp\htdocs\LINA\Model\Produit.php';
	class ProduitC {
	
		function afficheproduit(){
			$sql="SELECT * FROM produit";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
		function supprimerproduit($id){
			$sql="DELETE FROM produit WHERE id=:id ";
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

		function ajouterproduit($Produit){
			$sql="INSERT INTO produit (nom, description, prix) 
			VALUES ( :nom, :description, :prix)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'nom' => $Produit->getnom(),
                    'description' => $Produit->getdescription(),
                    'prix' => $Produit->getprix()
                    
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}

		function recupererproduit($idproduit){
			$sql="SELECT * from produit where id=$idproduit";
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
		
		function modifierproduit($produit, $id){
         
    
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE produit SET 
		           
                   nom= :nom
					WHERE id= :id'
				);
				$query->execute([
                 
                    'nom' => $produit->getnom(),
                    'id' => $id
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
          
		}

	}
?>