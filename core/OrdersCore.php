<?php 
include "../../config.php";
$order_id=0;
$cart1="";
$cart=0;

class OrdersCore {
    
    function AddOrder($orders){
		$sql="insert into orders (card_id,cart,order_id) values (:card_id,:cart,:order_id)";
		$db = config::getConnexion();

		try{

        $req=$db->prepare($sql);
		$card_id=$orders->getCard_id();
        $cart1=file_get_contents("cartid.txt");
        $cart=intval($cart1);
        $order_id=rand(0,99999);
        
        $req->bindValue(':card_id',$card_id);
        $req->bindValue(':cart',$cart);
		$req->bindValue(':order_id',$order_id);
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}

    function ShowOrders(){
        $sql="select * From orders";
        $db = config::getConnexion();
        try{
        $liste=$db->query($sql);
        return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }   
    }
    function DeleteOrder($order_id){
        $sql="DELETE FROM orders where order_id= :order_id";
        $db = config::getConnexion();
        $req=$db->prepare($sql);
        $req->bindValue(':order_id',$order_id);
        try{
            $req->execute();
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    function ShowClientdetails(){
        $sql="SELECT c.name ,c.email,c.tel,c.adress FROM client c JOIN fidelite f ON c.client_id = f.client_id JOIN orders o   ON o.card_id=f.card_id WHERE o.order_id='$myvalue'";
        $db = config::getConnexion();
        try{
        $liste=$db->query($sql);
        return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }   
    }

}

 ?>
