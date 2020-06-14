<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel='stylesheet' href='css/styleMenu.css' type='text/css' media='all' />
<script type="text/javascript" src="JsNot.js"></script>
<style>
body {
  font-family: Arial;
  font-size: 17px;
  padding: 8px;
}

* {
  box-sizing: border-box;
}

.row {
  display: flex;
  -ms-flex-wrap: wrap; 
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; 
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; 
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; 
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #4CAF50;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}


@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
</style>
</head>
<body>

  <script>
    function disableCCfield() {
    document.getElementById("ccnum").disabled = true;
    document.getElementById("CCdate").disabled = true;
    document.getElementById("cvv").disabled = true;
    document.getElementById("CCtype").disabled = true;
   }
    
    function EnableCCfield() {
    document.getElementById("ccnum").disabled = false;
    document.getElementById("CCdate").disabled = false;
    document.getElementById("cvv").disabled = false;
    document.getElementById("CCtype").disabled = false;
   }
    

</script>

  <form method="POST" action="AddCart.php"><input type="hidden" name="ajouter"></form>
<div class="row">
  <div class="col-50">
    <div class="container">
      <form method="POST" action="AddOrder.php">
      
        <div class="row">
          <div class="col-50">
                   <br></br>
                        <label for="card_id">Numero de la carte de fidelité</label>            
                           <input type="text" id="card_id" name="card_id" placeholder="12462839">

            <label>Mode de paiement : </label>
             <div style="font-size: 14px;">
                <input type="radio" id="CC" name="ModePaiement" value="CC" onclick="EnableCCfield()">
                <label for="CC"> Par carte </label><br>
                <input type="radio" id="llivraison" name="ModePaiement" value="llivraison" onclick="disableCCfield()">
                <label for="llivraison">Lors de la livraison </label><br>
            </div>

            <div class="row">
              <div class="col-50">
                
              </div>
              <div class="col-50">
                
              </div>
            </div>
          </div>

          <div class="col-50">      
            <br></br>     
            <label for="ccnum">Numero de carte :</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">

            
            <div class="row">
              <div class="col-50">
             
            <label for="expmonth">Date :</label>
            <input type="month" id="CCdate" name="CCdate">
            <br></br>
            <label for="cvv">CVV</label>
            <input type="text" id="cvv" name="cvv" placeholder="352">

              </div>
              <div class="col-50">
                <label for="CCtype">Type of card :</label>
                  <input list="cards" name="CCtype" id="CCtype">
                   <datalist id="cards">
                    <option value="MasterCard">
                    <option value="Visa">
                  </datalist>
              </div>
            </div>
          </div>
          
        </div>
        <input type="submit" name="ConfirmerCommande" value="Confirmer la commande" class="btn" onclick="Jscommand()">
      </form>
    </div>
  </div>
  <div class="col-25">
    <div class="container">
      <iframe src="chekoutdetails.php" style="height:300px;width:500px;border:none;"></iframe>
    </div>
  </div>
</div>

</body>
</html>