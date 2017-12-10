<?php
	$val=1;
	setcookie('Patti_Cookie', $val , time() + (86400 * 7), "/"); //setto nome_cookies a valore (val) e il tempo per il quale deve esistere il cookie

	$citta= $_POST["citta"];    	$riferimento= $_POST["cosa"];  	$max=$_POST["max"];
	$url= "http://api.foursquare.com/v2/venues/search?client_id=CPPL11HVOLM5I1ADDBYBDFKZHZZPEYRX2DXF5I21AS5Q5JWF&client_secret=20RY1A0ASCAWHYKXK4EYYDWDKLMUFJVIDMA45IAHWJ0L23SX&v=20170801&near=$citta&query=$riferimento&limit=$max";
	$file= file_get_contents ($url);
	$file=json_decode($file,true);

?>

<!DOCTYPE html>
<head>
	<title>Personal Website</title>
	<link href="stile1.css" rel="stylesheet" type="text/css">
</head>

<body>

	<div class="header">
		<h1>Ricerca tramite Api Esterne!</h1>
	</div>
    
    <div class="colonna_sx">
    <br>
    	<table>
    		<caption>
       		 <p><?php  echo "<h2>Categoria : ".ucfirst($riferimento) ."		 situate a  ".ucfirst($citta) ."</h2>";  ?></p>
   			</caption>
            
    <br><br>
    	<thead>
     	   <tr>	<th>Nome</th>	<th>Indirizzo</th>	<th>Latitudine</th>	<th>Longitudine</th>	</tr>
    	</thead>
    
    <?php
    	foreach($file['response']['venues'] as $item) {
   		 $lat=$item['location']['lat'];
   		 $lon=$item['location']['lng'];
   		 $add= $item['location']['address'];
   		 $nome = $item['name'];
   		 echo "<tr>	<td>".$nome."</td>	<td>". $add."</td>	<td>".$lat."</td>	<td>".$lon."</td>	</tr>";
		}
    ?>
    </table>
   </div>
    
    
    
    
	<div class="footer">
	<?php
		if(!isset($_COOKIE['Patti_Cookie'])) {
		{
			echo "Primo accesso dell'utente!";
			$val++;
		}
		} else {
			$val= ++ $_COOKIE['Patti_Cookie'];
			setcookie('Patti_Cookie',$val,time() + (86400 * 7), "/");
			echo "Cookie settato!<br>";
			echo "Numero degli accessi: " .$_COOKIE['Patti_Cookie'];
		}
	?>
	</div>	
</body>