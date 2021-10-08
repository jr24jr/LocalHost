<!DOCTYPE html>  
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://www.flaticon.es/premium-icon/icons/svg/3115/3115458.svg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
</head>
<body>
<div class="container-fluid">
<div class="container m-auto">
<div class="row">
<?php
$dato=array();
$pos=0;
$directorio = opendir(".");
while ($archivo = readdir($directorio)){
	if($archivo!="." && $archivo!=".."){
		$separa=explode(".",$archivo);
		if(count($separa)==1){
			$dato[$pos]=[
				'tipo'=>'carpeta',
				'ruta'=>$archivo
			];
		}
		else{
			if(count($separa)==2){
				$dato[$pos]=[
					'tipo'=>$separa[1],
					'ruta'=>$archivo
				];
			}
			else{
				$dato[$pos]=[
					'tipo'=>$separa[count($separa)-1],
					'ruta'=>$archivo
				];
			}
		}
		$pos++;
	}
}
foreach ($dato as  $valor) {
	if($valor['tipo']=='carpeta'){
		echo "<div class='col-4 mt-3 mb-3'><div class='card bg-transparent'>";
		echo '<div class="align-self-center">
			<a href="/'.$valor['ruta'].'">
				<img class="card-img-top" src="svg/folder.svg" style="width: 10rem;">
			</a>
		</div><br>';
		echo "<span class='text-center text-white'><a href='/".$valor['ruta']."'>".$valor['ruta']."</a></span>";
		echo "</div></div>";
	}
	else{
		if($valor['ruta']!='index.php'){
			echo "<div class='col-4 mt-3 mb-3'><div class='card bg-transparent'>";
			echo '<div class="align-self-center">
				<a href="/'.$valor['ruta'].'">
					<img class="card-img-top" src="svg/'.$valor['tipo'].'.svg" style="width: 10rem;">
				</a>
			</div><br>';
			echo "<span class='text-center text-white'><a href='/".$valor['ruta']."'>".$valor['ruta']."</a></span>";
			echo "</div></div>";
		}
	}
} 
?>
</div>
</div>
</div>
<style>
	body{
		background-color: black;
	}

	.container-fluid{
		background-image: url("svg/capitan-marvel.svg");
		background-position: center;
		background-repeat: no-repeat;
		background-size: cover;
		position: relative;
	}

	a{
		text-decoration:none;
		color: white;
	}

	a:hover{
		color: #E0E0E0;
		--text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;
	}

	.card{
		backdrop-filter: blur(5px);
	}

	.card:hover{
		backdrop-filter: blur(0px);
	}

</style>
</body>
</html>