<?php 
include "../../config.php";
$cart_id0="";
$cart_id=0;
class CartsCore {

	function AddCart($carts){
		$sql="insert into cart (cart_id,details) values (:cart_id,:details)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
		$cart_id0=file_get_contents("cartid.txt");
        $cart_id=intval($cart_id0);
        $details=file_get_contents("fichier.txt");

		$req->bindValue(':cart_id',$cart_id);
		$req->bindValue(':details',$details);
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
}

 ?>
