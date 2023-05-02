<?php
	include_once '../config.php';
	include_once '../Model/reservation.php';
	class reservationC {
		function afficherreservation(){
			$sql="SELECT * FROM reservation";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function supprimerreservation($id){
			$sql="DELETE FROM reservation WHERE id=:id";
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
		function ajouterreservation($reservation){
	        
			$sql="INSERT INTO reservation (id, nom, etat,date,nbp,id_event) 
			VALUES (:id,:nom, :etat,:date,:nbp,:id_event)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'id' => $reservation->getid(),
					'nom' => $reservation->getnom(),
					'etat' =>  $reservation->getetat(),
					'date' => $reservation->getdate(),
                    'nbp' => $reservation->getnbp(),
					'id_event' => $reservation->getIdEvent(),
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		function recupererreservation($id){
			$sql="SELECT * from reservation where id=$id";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$reservation=$query->fetch();
				return $reservation;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifier_reservation($reservation, $id){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE reservation SET 
					    nom= :nom,
						etat= :etat, 
						date= :date ,
                        nbp= :nbp,
						id_event = :id_event
					WHERE id=:id'
				);
				$query->execute([
					'nom' => $reservation->getnom(),
					'etat' => $reservation->getetat(),
					'date' => $reservation->getdate(),
                    'nbp' => $reservation->getnbp(),
					'id' => intval($id,10),
					'id_event' => $reservation->getIdEvent()
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				echo $e->getMessage(); // afficher l'erreur pour déboguer
			}
		}
	}
		
?>