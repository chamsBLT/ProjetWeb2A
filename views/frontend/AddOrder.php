<?PHP
include "../../entities/orders.php";
include "../../core/OrdersCore.php";

if ((null !==$_POST['card_id']) and isset($_POST['ConfirmerCommande'])){
	    sleep(1);
        $cart1=file_get_contents("cartid.txt");
        $cart=intval($cart1);
        $order_id=rand(0,99999);
$orders1=new orders($_POST['card_id'],$cart,$order_id);
$orders1C=new OrdersCore();
$orders1C->AddOrder($orders1);

  echo"<script language='javascript'>window.top.location = 'http://localhost:1234/projet/views/frontend/orderplaced.php'; </script>";

}else{
	echo "vérifier les champs";
}


?>