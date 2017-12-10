<?php
	$val=1;
	setcookie('Patti_Cookie', $val , time() + (86400 * 7), "/"); //setto nome_cookies a valore (val) e il tempo per il quale deve esistere il cookie
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
    <br><br>
    
    <form action="./app.php" method="post">
    
		<label for="pwd">Seleziona Luogo : </label>
    	<select name="citta" class="form-control" id="sel1">
			<option value="bergamo">Bergamo</option>
  			<option value="brescia">Brescia</option>
  			<option value="mantova">Mantova</option>
  			<option value="milano">Milano</option>
 		</select>
        
        <br><br>
        
 		<label for="pwd">Che stai cercando ? </label>
 		<select name="cosa" class="form-control" id="sel1">
    		<option value="pizza">Pizzeria</option>
  			<option value="coffe">Caffé</option>
  			<option value="sushi">Sushi</option>
  			<option value="pub">Pub</option>
            <option value="shops">Shopping</option>
            <option value="drinks">Vita Notturna</option>
            <option value="arts">Divertimento</option>
 		</select>
        
        <br><br>
        
 		<label for="pwd">Numero Risultati Max : </label>
 		<input name="max" type="number" step="1" min="1" max="20" value=10 class="form-control">
        
        <br><br>
        
  		<input type="submit" value="Vai">
	</form>
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