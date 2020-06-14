<?PHP
include "../../core/OrdersCore.php";
$orders1=new OrdersCore();
if (isset($_POST["order_id"])){
	$orders1->DeleteOrder($_POST["order_id"]);
}

?>