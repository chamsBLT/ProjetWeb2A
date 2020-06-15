<?PHP
include "../../core/OrdersCore.php";
$orders1C=new OrdersCore();
$orderslist=$orders1C->ShowOrders();

?>
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
.NumberC{font-size: 150%;color: firebrick;}
</style>
<table>
<tr>
<th>Numero de fidelité</th>
<th>Numero de pannier</th>
<th>Numero de la commande</th>
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
	value="Annuler">
	<input type="hidden" value="<?PHP echo $row['order_id']; ?>" name="order_id">
	</form>
	</td>
	
	</tr>
	<?PHP

}


?>
<label class="NumberC"><?php 
$con=mysqli_connect("localhost","root","chams5","new_test");

$sql="SELECT * FROM orders";

if ($result=mysqli_query($con,$sql))
  {

  $rowcount=mysqli_num_rows($result);
   printf("%d commandes sont en attente.\n",$rowcount);

  mysqli_free_result($result);
  }

mysqli_close($con);
?> </label>

</table>


