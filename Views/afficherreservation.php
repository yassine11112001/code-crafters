<?php
	include '../Controller/reservationC.php';
	$reservationC=new reservationC();
	$reservation=$reservationC->afficherreservation(); 
?>
<html>
	<head></head>
	<body>
	    <button><a href="ajouterreservation.php">Ajouter un reservation</a></button>
		<center><h1>Liste des reservations</h1></center>
		<table border="1" align="center">
			<tr>
				<th>id</th>
				<th>nom</th>
				<th>etat</th>
				<th>date</th>
                <th>nbp</th>
				
				<th>Modifier</th>
				<th>Supprimer</th>
			</tr>
			<?php
				foreach($reservation as $reservation){
			?>
			<tr>
				<td><?php echo $reservation['id']; ?></td>
				<td><?php echo $reservation['nom']; ?></td>
				<td><?php echo $reservation['etat']; ?></td>
				<td><?php echo $reservation['date']; ?></td>
                <td><?php echo $reservation['nbp']; ?></td>
				<td><?php echo $reservation['id_event']; ?></td>
				<td>
					<form method="POST" action="modifierreservation.php">
						<input type="submit" name="Modifier" value="Modifier">
						<input type="hidden" value=<?PHP echo $reservation['id']; ?> name="id">
					</form>
				</td>
				<td>
					<a href="supprimerreservation.php?id=<?php echo $reservation['id']; ?>">Supprimer</a>
				</td>
			</tr>
			<?php
				}
			?>
		</table>
	</body>
</html>
