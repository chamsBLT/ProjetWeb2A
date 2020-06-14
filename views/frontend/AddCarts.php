<?PHP
include "../../entities/carts.php";
include "../../core/CartsCore.php";


if (isset($_POST['ConfirmCart'])){
	sleep(1);
	    $cart_id0=file_get_contents("cartid.txt");
        $cart_id=intval($cart_id0);
        $details=file_get_contents("fichier.txt");
$carts1=new carts($cart_id,$details);
$carts1C=new CartsCore();
$carts1C->AddCart($carts1);
header('Location: placeorder.php');
}else{
	
	echo "Erreur!";
}


?>