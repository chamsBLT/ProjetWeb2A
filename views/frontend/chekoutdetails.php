<?php
session_cache_limiter('private_no_expire, must-revalidate');
session_start();
$status="";
$output="";
if (isset($_POST['action']) && $_POST['action']=="remove"){
if(!empty($_SESSION["shopping_cart"])) {
	foreach($_SESSION["shopping_cart"] as $key => $value) {
		if($_POST["code"] == $key){
		unset($_SESSION["shopping_cart"][$key]);
		$status = "<div class='box' style='color:red;'>
		Product is removed from your cart!</div>";
		}
		if(empty($_SESSION["shopping_cart"]))
		unset($_SESSION["shopping_cart"]);
			}		
		}
}

if (isset($_POST['action']) && $_POST['action']=="change"){
  foreach($_SESSION["shopping_cart"] as &$value){
    if($value['code'] === $_POST["code"]){
        $value['quantity'] = $_POST["quantity"];
        break; 
    }
} 	
}
?>
<html>
<head>
<link rel='stylesheet' href='css/styleMenu.css' type='text/css' media='all' />
</head>
<body>

 


<div class="cart">
<?php
if(isset($_SESSION["shopping_cart"])){
    $total_price = 0;
?>	
<table class="table">
<tbody>
<tr>
<td></td>
<td>PLAT</td>
<td></td>
<td>PRIX UNITAIRE</td>
<td>TOTALE</td>

</tr>	
<?php		
foreach ($_SESSION["shopping_cart"] as $product){
?>
<tr>
<td></td>
<td><?php echo $product["name"]; ?><br />
<form method='post' action=''>
<input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
</form>
</td>
<td>
</td>
<td><?php echo $product["price"]."  Tnd"; ?></td>
<td></td>
</tr>
<?php
$total_price += ($product["price"]*$product["quantity"]);

$output .= $product["name"] . "    " . $product["quantity"] . "     " . $product["price"] .  " Tnd". "\n" ;
       file_put_contents("fichier.txt",$output );
}
?>
<tr>
<td colspan="5" align="right">
<strong>TOTALE: <?php echo $total_price." Tnd"; ?></strong> 
</td>
</tr>
</tbody>
</table>
<?php
file_put_contents("fichier.txt","TOTALE  : ". $total_price,FILE_APPEND);
?>

  <?php
}else{
	echo "<h3>Votre panier est vide!</h3>";
	}
?>
</div>


</body>
</html>