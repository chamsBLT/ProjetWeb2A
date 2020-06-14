<?PHP
include "../../core/OrdersCore.php";
$orders1=new OrdersCore();
if (isset($_POST["submit"])){
	$mycardid = $_POST['chercher']
	$orders1->DeleteOrder($_POST["order_id"]);
}

?>