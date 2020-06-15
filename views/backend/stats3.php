<?php  
 $connect = mysqli_connect("localhost","root","chams5","new_test");  
 $query = "SELECT substring_index(substring_index(r.details, ' ', n.n), ' ', -1) as produit, count(*) AS nombre from cart r join (select 1 as n union all select 2 union all select 3 UNION all SELECT 4 UNION all select 5 ) n on n.n <= length(details) - length(replace(details, ' ', '')) + 1 group by produit order by nombre ASC LIMIT 5";  
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
                          ['produit', 'nombre'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["produit"]."', ".$row["nombre"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'Produits / Commandes',  
                      //is3D:true,  
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