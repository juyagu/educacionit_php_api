<?php
	$url = "https://jsonplaceholder.typicode.com/posts/";
	$headers = array (
		'Accept: application/json',
		'Content-Type: application/json'
	);
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($curl, CURLOPT_VERBOSE, 1);
	curl_setopt($curl,CURLOPT_HTTPHEADER, $headers);

	$issue_list = (curl_exec($curl));
	//$rest = json_decode($issue_list);
	
   	$requestUser= file_get_contents('https://jsonplaceholder.typicode.com/users');
	
   	$requestFotos= file_get_contents('https://jsonplaceholder.typicode.com/photos');
	$request =$issue_list;
	//var_dump($rest);
	//exit;
   	//$request =file_get_contents('https://jsonplaceholder.typicode.com/posts/');
			  //.then(response => response.json())
			  //.then(json => console.log(json));
    $recent = json_decode($request);
	
	
	$primeros10= array_slice($recent,0,10);
	

	$recentFotos= json_decode($requestFotos);
	$primeras5= array_slice($recentFotos,0,5);

	$requestUser= json_decode($requestUser);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
		.color{
			background-color: #cca
		}
	</style>
</head>
<body >
	<div><h2 style ="text-align: center;">- Posteos -</h2>
	<table style ="margin-left:15px; margin-right: 15px; border: 1px solid; padding: 4px;">
		<th>Id</th>
		<th>Titulo</th>
		<th>Mensaje</th>
		 <?php foreach ($primeros10 as $valor) { ?>
		<tr>
			<td style="background-color: #ccc;"><?= $valor->id?></td>
			<td style="background-color: #cca;"><?= $valor->title?></td>
			<td style="background-color: #ccc;"><?= $valor->body?></td>
		</tr>
	<?php }?>
	</table>
	</div>


	<div><h2 style ="text-align: center;">- Fotos -</h2>
	<table style ="margin-left:15px; margin-right: 15px; border: 1px solid; padding: 4px;">
		<?php foreach ($primeras5 as $valor) { ?>
		<tr>
			
			<td style="background-color: #cca;"><?= $valor->title?></td>
			<td style="background-color: #ccc;"><a href="<?= $valor->url?>"><img src="<?= $valor->thumbnailUrl?>" alt=""></a></td>
		</tr>
	<?php }?>
	</table>
	</div>


	<div><h2 style ="text-align: center;">- Usuarios -</h2>
	<table style ="margin-left:15px; margin-right: 15px; border: 1px solid; padding: 4px;">
		<th>Nombre</th>
		<th>Usuario</th>
		<th>Mail</th>
		<th>Direccion</th>
		<th>Geolocalizacion</th>
		<th>Telefono</th>
		<th>Sitio Web</th>
		<th>Trabajo</th>
		<?php foreach ($requestUser as $valor) { ?>
		<tr>
			<td class="color"><?= $valor->name?></td>
			<td class="color"><?= $valor->username?></td>
			<td class="color"><?= $valor->email?></td>
			
			<td class="color">
				<?= $valor->address->street?><br>
				<?= $valor->address->suite?><br>
				<?= $valor->address->city?><br>
				<?= $valor->address->zipcode?><br>
			</td>
			<td class="color">
				<?= $valor->address->geo->lat?><br>
				<?= $valor->address->geo->lng?><br>
			</td>
			<td class="color"><?= $valor->phone?></td>
			<td class="color"><?= $valor->website?></td>
			<td class="color">
				<?= $valor->company->name?><br>
				<?= $valor->company->catchPhrase?><br>
				<?= $valor->company->bs?><br>
			</td>
			
			
			<!--td style="background-color: #ccc;"><a href="<?= $valor->url?>"><img src="<?= $valor->thumbnailUrl?>" alt=""></a></td-->
		</tr>
	<?php }?>
	</table>
	</div>


</body>
</html>