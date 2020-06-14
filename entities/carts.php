<?php 
class carts{
	private $cart_id;
	private $details;


	function __construct($cart_id,$details){
		$this->cart_id=$cart_id;
		$this->details=$details;
	}
		
	

	function getCart_id(){
		return $this->cart_id;
	}
	
	function getDetails(){
		return $this->details;
	}

	function setCart_id(){
		return $this->cart_id=$cart_id;
	}
	
function setDetails(){
		return $this->details=$details;
	}

}
 ?>