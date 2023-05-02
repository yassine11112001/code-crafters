<?php
	include_once '../config.php';
	include_once '../Model/evenement.php';
	class evenementC {
		function afficherevenement(){
			$sql="SELECT * FROM evenement";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
		function supprimerevenement($id){
			$sql="DELETE FROM evenement WHERE id=:id";
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
		function ajouterevenement($evenement){
	        
			$sql="INSERT INTO evenement (id, nom, data_depart,description) 
			VALUES (:id,:nom, :data_depart,:description)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'id' => $evenement->getid(),
					'nom' => $evenement->getnom(),
					'data_depart' =>  $evenement->getdata_depart(),
					'description' => $evenement->getdescription()

				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		function recupererevenement($id){
			$sql="SELECT * from evenement where id=$id";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$evenement=$query->fetch();
				return $evenement;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifier_evenement($evenement, $id){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE evenement SET 
					    nom= :nom,
						data_depart= :data_depart, 
						descriptions= :descriptions 
					WHERE id=:id'
				);
				$query->execute([
					'nom' => $evenement->getnom(),
					'data_depart' => $evenement->getdata_depart(),
					'descriptions' => $evenement->getdescription(),
					'id' => intval($id,10)
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				echo $e->getMessage(); // afficher l'erreur pour déboguer
			}
		}
	}
		
?>