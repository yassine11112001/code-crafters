<?php
namespace MyNamespace;

use \PDO;
$user = 'root';
$password = '';
$database = 'reclamation';
$servername='127.0.0.1';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once 'C:\xampp\htdocs\reclamation\PHPMailer-master (1)\PHPMailer-master\src\Exception.php';
require_once 'C:\xampp\htdocs\reclamation\PHPMailer-master (1)\PHPMailer-master\src\PHPMailer.php';
require_once 'C:\xampp\htdocs\reclamation\PHPMailer-master (1)\PHPMailer-master\src\SMTP.php';

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$database", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

if(isset($_POST['submit'])) {
    $n_cmd_reply = $_POST['n_cmd_reply'];
    $reply = $_POST['reply'];

// get user email from N Command
$sql = "SELECT email FROM reclam WHERE n_cmd = n_cmd";
$stmt = $pdo->prepare($sql);
if ($stmt->execute(['n_cmd' => $n_cmd_reply])) {
    $user_email = $stmt->fetchColumn();
if ($user_email){
    // send email
	$mail = new PHPMailer(true);
	$mail->isSMTP();
	$mail->Host = 'smtp.gmail.com';
	$mail->SMTPAuth = true;
	$mail->Username = 'yassinekassar2001@gmail.com';
	$mail->Password = 'odwwjwryquvsxhzb';
	$mail->SMTPSecure = 'tls';
	$mail->Port = 587;
	$mail->setFrom('yassinekassar2001@gmail.com');
	$mail->addAddress('mouhamedyassine.kassar@esprit.tn');
	$mail->isHTML(true);
	$mail->Subject = 'Reclamation';
	$mail->Body = 'Hello, '.$user_email.'! '.$reply; 
	$mail->send();
	$mail->SMTPDebug = 2;
	echo "Mail envoyé";
}}
else {
    echo "Unable to fetch user email.";
}
}
$sql = "SELECT reclam.*, reply.rep FROM reclam LEFT JOIN reply ON reclam.n_cmd = reply.n_cmd";
$result = $pdo->query($sql);

if(isset($_POST['order_high'])) {
    $sql = "SELECT reclam.*, reply.rep FROM reclam LEFT JOIN reply ON reclam.n_cmd = reply.n_cmd ORDER BY reclam.n_cmd DESC";
    $result = $pdo->query($sql);
}

if(isset($_POST['order_low'])) {
    $sql = "SELECT reclam.*, reply.rep FROM reclam LEFT JOIN reply ON reclam.n_cmd = reply.n_cmd ORDER BY reclam.n_cmd ASC";
    $result = $pdo->query($sql);
}
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
		<iframe src="https://www.facebook.com/plugins/share_button.php?href=https%3A%2F%2Fa34c-197-240-136-131.ngrok-free.app%2Freclamation%2Fview%2Fback%2Freclamation.php&layout&size&width=91&height=20&appId" width="91" height="20" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
		<form method="POST">
			<table border="1px">
				<tr>
					<td>
						<input type="submit" name="order_high" value="ORDER HIGH">
						<input type="submit" name="order_low" value="ORDER LOW">
					</td>
				</tr>
				<tr>
					<th>NAME</th>
					<th>FIRST NAME</th>
					<th>EMAIL</th>
					<th>PHONE</th>
					<th>N COMMAND</th>
					<th>details</th>
					<th>Reponse</th>*
					<th>Send Mail</th>
				</tr>
				<?php
				 while($rows=$result->fetch(PDO::FETCH_ASSOC)) { 
					?>

					<tr>
						<td><?php echo $rows['name'];?></td>
						<td><?php echo $rows['first_name'];?></td>
						<td><?php echo $rows['email'];?></td>
						<td><?php echo $rows['phone'];?></td>
						<td><?php echo $rows['n_cmd'];?></td>
						<td><?php echo $rows['details'];?></td>
						<td><?php echo $rows['rep'];?></td>
						<td><a href="mail.php?n_cmd=<?=$rows['n_cmd']?>"> Send Mail</a></td>
					</tr>
				<?php } ?>
			</table>
		</form>
	</section>
	<hr>
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

	<section>
		<form action="search.php">
			<table>
				<tr>
					<td>
						RECHERCHE PAR NUMERO DE COMMANDE:
					</td>
					<td>
						<input type="number" name="search_number" placeholder="N COMMANDE">
					</td>
					<td>
						<input type="submit" name="submit" value="SEARCH">
					</td>
				</tr>
			</table>
		</form>
	</section>
	<hr>
	<section>
		<form action="reply.php">
			<table>
				<th>reply to reclamation</th>
				<tr>
					<td>
						N COMMAND:
					</td>
					<td>
						<input type="number" name="n_cmd_reply" placeholder="n command">
					</td>
					<tr>
						<td>
							REPONSE : 
						</td>
						<td>
							<textarea rows="4" cols="50" name="reply">eneter your reply here ...</textarea>
						</td>
					</tr>
					<tr>
						<td>
							
							<input type="submit" name="submit" value="Send">
						</td>
					</tr>
				</tr>
			</table>
			
		</form>
	</section>
</body>

</html>
