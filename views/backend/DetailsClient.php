<!DOCTYPE html>
<html>
<head>
	
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
			<td>Nom et Prenom :</td>
            <td>Email :</td>
            <td>Tel :</td>
            <td>Adress :</td>
            </tr>
			<tr>
				<td><?php echo $row->name; ?></td>
				<td><?php echo $row->email; ?></td>
				<td><?php echo $row->tel; ?></td>
				<td><?php echo $row->adress; ?></td>
				

            
          </td>
	                 
	
	
	
			</tr>
		</table>
<?php
	}

	

?>
