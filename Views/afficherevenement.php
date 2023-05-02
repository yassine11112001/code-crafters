<?php
	include '../Controller/evenementC.php';
	$evenementC=new evenementC();
	$evenement=$evenementC->afficherevenement(); 
?>
<html>
	<head></head>
	<body>
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
	</body>
</html>
