<?php 
class orders{
	private $card_id;
	private $cart;
	private $order_id;



	function __construct($card_id,$cart,$order_id){
		$this->card_id=$card_id;
		$this->cart=$cart;
		$this->order_id=$order_id;
	}
		
	function getCard_id(){
		return $this->card_id;
	}

	function getCart(){
		return $this->cart;
	}
		
    function getOrder_id(){
		return $this->order_id;
	}

	function setCard_id(){
		return $this->card_id=$card_id;
	}
	
	function setCart(){
		return $this->cart=$cart;
	}

	function setOrder_id(){
		return $this->order_id=$order_id;
	}

}
 ?>