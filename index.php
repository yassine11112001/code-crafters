<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Reclamation</title>
	<style>
	/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
</style>
</head>
<body>
	<form method="POST" action="insert.php">
<table border="1px">
<tr>
	<td>
		send us your reclamation
	</td>
</tr>	
<tr>
	<td>Nom:</td>
	<td>
		<input type="text" name="name" placeholder="Your Name">
	</td>
</tr>
<tr>
	<td>Prenom:</td>
	<td>
		<input type="text" name="first_name" placeholder="Your First Name">
	</td>
</tr>
<tr>
	<td>email:</td>
	<td>
		<input type="text" name="email" placeholder="Your email">
	</td>
</tr>
<tr>
	<td>phone :</td>
	<td>
		<input type="text" name="phone" placeholder="Your phone">
	</td>
</tr>
<tr>
	<td>command number:</td>
	<td>
		<input type="number" name="cnumber" placeholder="Your command number">
	</td>
</tr>
<tr>
	<td>details:</td>
	<td>
		<textarea rows="4" cols="50" name="details">eneter your reclamation here ...</textarea>
	</td>
</tr>
<tr>
	<td>
		<input type="submit" name="sumbit">
	</td>
</tr>
</table>
</body>
</html>
