<?PHP
include "../../core/OrdersCore.php";
$orders1C=new OrdersCore();
$orderslist=$orders1C->ShowOrders();

?>
<table>
<tr>
<td>Numero de fidelité</td>
<td>Numero de pannier</td>
<td>Numero de la commande</td>
</tr>

<?PHP
foreach($orderslist as $row){
	?>
	<tr>
	<td><?PHP echo $row['card_id']; ?></td>
	<td><?PHP echo $row['cart']; ?></td>
	<td><?PHP echo $row['order_id']; ?></td>
  
	<td><form method="POST" 
	action="DeleteOrder.php">
	<input type="submit" name="supprimer" 
	value="supprimer">
	<input type="hidden" value="<?PHP echo $row['order_id']; ?>" name="order_id">
	</form>
	</td>
	
	</tr>
	<?PHP

}


?>
<?php 
$con=mysqli_connect("localhost","root","chams5","new_test");

$sql="SELECT * FROM orders";

if ($result=mysqli_query($con,$sql))
  {

  $rowcount=mysqli_num_rows($result);
  printf("%d commandes sont en attente.\n",$rowcount);

  mysqli_free_result($result);
  }

mysqli_close($con);
?> 
</table>


