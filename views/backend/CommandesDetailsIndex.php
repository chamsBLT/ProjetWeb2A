
<!DOCTYPE html>
<html>
<head>
	
</head>
<body>
	<form method="post">
		<label>Chercher</label>
		<input type="text" name="search" >
		<input type="submit" name="submit">

	</form>

</body>
</html>
<?php 
$con = new PDO ("mysql:host=localhost;dbname=new_test",'root','chams5');
if (isset($_POST['submit'])) {
	$mycode = $_POST['search'];
	file_put_contents("orderid.txt",$mycode);
	$sth= $con->prepare("SELECT c.details ,c.DaT FROM cart c INNER JOIN orders o ON o.cart=c.cart_id WHERE o.order_id='$mycode'");
	$sth->setFetchMode(PDO:: FETCH_OBJ);
	$sth-> execute();
	if ($row = $sth ->fetch()) {
		?>
		<br><br><br>
		<table>
			<tr>
				<th>Détails du commande :</th>
				<th>Date et heure :</th>
				<th><button onclick="displayIframe()">Click me</button></th>
			</tr>
			<tr>
				<td><?php echo $row->details; ?></td>
				<td><?php echo $row->DaT; ?></td>
			</tr>
		</table>
		<div id="iframeDisplay">

            <script>
             function displayIframe() {
              document.getElementById("iframeDisplay").innerHTML = "<iframe src=\"DetailsClient.php\" height=\"90\" width=\"700\" \"border:none\" ></iframe>";

              }
              </script></div>
<?php
	}

	else{
		echo"Cette commande n'existe pas";
	}
}
?>