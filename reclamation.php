
<?php

$user = 'root';
$password = '';
$database = 'reclamation';
$servername='127.0.0.1:3306';
$mysqli = new mysqli($servername, $user,$password, $database);

if ($mysqli->connect_error) {
	die('Connect Error (' .
	$mysqli->connect_errno . ') '.
	$mysqli->connect_error);
}


$sql = " SELECT * FROM reclam";
$result = $mysqli->query($sql);
$mysqli->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>ADMIN RECLAMATION PAGE</title>

</head>

<body>
	<section>
		<h1>les reclamations</h1>
	
		<table border="1px">
			<tr>
				<th>NAME</th>
				<th>FIRST NAME</th>
				<th>EMAIL</th>
				<th>PHONE</th>
				<th>N COMMAND</th>
				<th>details</th>
			</tr>
			
			<?php
				while($rows=$result->fetch_assoc())
				{
			?>
			<tr>
				
				<td><?php echo $rows['name'];?></td>
				<td><?php echo $rows['first_name'];?></td>
				<td><?php echo $rows['email'];?></td>
				<td><?php echo $rows['phone'];?></td>
				<td><?php echo $rows['n_cmd'];?></td>
				<td><?php echo $rows['details'];?></td>
			</tr>
			<?php
				}
			?>
		</table>
	</section>
	<section>
		<h1>MANAGE RECLAMATIONS</h1>
		<form method="POST" action="delete.php">
		<table>
			<tr>
				<td>DELETE RECLAMATION</td>
				<td>
					<input type="number" name="n_cmd_a" placeholder="enter the n cmd to delete">
				</td>
				<td>
					<input type="submit" name="submit" value="DELETE">
				</td>
			</tr>
		</table>
	</form>
	<p></p>
	<form method="POST" action="modify.php">
		<table>
			<tr>
				<td>modify RECLAMATION</td>
				<td>
					<input type="number" name="n_cmd_b" placeholder="enter the n cmd to modify">
				</td>
				<td>
					SELECT WHAT TO MODIFY :<select name="select_liste">
						 <option value="" disabled selected>Choose option</option>
						<option value="name">name</option>
						<option value="first_name">first name</option>
						<option value="email">email</option>
						<option value="phone">phone</option>
						<option value="details">details</option>
					</select>
				</td>
				<td>
					NEW VALUE:<input type="text" name="new_value">
				</td>
				<td>
					<input type="submit" name="submit" value="MODIFY">
				</td>
			</tr>
		</table>
	</form>
	</section>
</body>

</html>
