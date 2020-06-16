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
  padding: 16px 32px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
}
a:link, a:visited {
  background-color: #f44336;
  color: white;
  padding: 14px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}

a:hover, a:active {
  background-color: red;
}
</style>	
</head>
<body>
	<form>
	</form>

</body>
</html>
<?php 
$con = new PDO ("mysql:host=localhost;dbname=new_test",'root','chams5');
$mycode=intval(file_get_contents("orderid.txt"));
$sth= $con->prepare("SELECT c.name ,c.email,c.tel,c.adress FROM client c JOIN fidelite f ON c.client_id = f.client_id JOIN orders o  ON o.card_id=f.card_id WHERE o.order_id='$mycode'");
	$sth->setFetchMode(PDO:: FETCH_OBJ);
	$sth-> execute();
	if ($row = $sth ->fetch()) {
		?>
		<br>
		<table>
			<th>Nom et Prenom :</th>
            <th>Email :</th>
            <th>Tel :</th>
            <th>Adress :</th>
            </tr>
			<tr>
				<td><?php echo $row->name; ?></td>
				<td><?php echo $row->email; ?></td>
				<td><?php echo $row->tel; ?></td>
				<td><?php echo $row->adress; ?></td>
				<td><a href="test2.php" target="_blank" onClick="window.open('mailing.php','pagename','resizable,height=360,width=220'); return false;">Contacter</a></td>        
          </td>
	 	
			</tr>
		</table>
<?php
	}

 

?>
