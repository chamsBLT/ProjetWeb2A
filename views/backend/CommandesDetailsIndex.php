
<!DOCTYPE html>
<html>
<head>
	<style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
  background-color: #FF5733;
  color: white;
}
input[type=submit] {
  background-color: #FF5733;
  border: none;
  color: white;
  padding: 10px 32px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
}
.DsC {
  background-color: white; 
  color: black; 
  border: 2px solid #f44336;
}

.Dsc:hover {
  background-color: #f44336;
  color: white;
}
input[type=text] {
	padding: 10px 32px;
  border: 2px solid red;
  border-radius: 4px;
}
.rcommande{font-size: 150%;}
</style>
</head>
<body>
	<form method="post">
		<label class="rcommande">Chercher par numero de commande : </label>
		<input type="text" name="search" >
		<input type="submit" name="submit" value="Chercher">

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
				<th><button class="button DsC" onclick="displayIframe()">Détails sur client</button></th>
			</tr>
			<tr>
				<td><?php echo $row->details; ?></td>
				<td><?php echo $row->DaT; ?></td>
			</tr>
		</table>
		<div id="iframeDisplay">

            <script>
             function displayIframe() {
              document.getElementById("iframeDisplay").innerHTML = "<iframe src=\"DetailsClient.php\" height=\"150\" width=\"700\" \"border:none\" ></iframe>";

              }
              </script></div>
<?php
	}

	else{
		echo"Cette commande n'existe pas";
	}
}
?>