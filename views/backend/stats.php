<?php  
 $connect = mysqli_connect("localhost","root","chams5","new_test");  
 $query = "SELECT sexe, count(*) as nombre FROM client GROUP BY sexe";  
 $result = mysqli_query($connect, $query);  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>    
           <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Sexe', 'Nombre'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["sexe"]."', ".$row["nombre"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'Sexe / Livraison',  
                      //is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           }  
           </script>  
      </head>  
      <body>  
           <br /><br />  
           <div style="width:500;">   
                <br />  
                <div id="piechart" style="width: 700px; height: 400px;"></div>  
           </div>  
      </body>  
 </html>  