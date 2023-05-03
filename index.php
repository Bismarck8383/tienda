<?php 
	require_once "Config/configuracion.php";

	$url = !empty($_GET['url']) ? $_GET['url'] : 'home/home';
	$arrayUrl =  explode("/", $url);
	$controller = $arrayUrl[0];
	$method = $arrayUrl[0];
	$params ="";

	if (!empty($arrayUrl[1])) {
		if ($arrayUrl[1] != "") {
			$method = $arrayUrl[1];
		}
	}

	if (!empty($arrayUrl[2])) {
		if ($arrayUrl[2] != "") {
			for($i=2; $i < count($arrayUrl); $i++){
				$params .= $arrayUrl[$i].',';
			}
			$params = trim($params, ',');
					
		}
	}

	spl_autoload_register(function($class){
		if (file_exists(LIBS.'Core/'.$class.".php")) {
			require_once(LIBS.'Core/'.$class.".php");
		}
	});

	$controllerFile = "Controllers/".$controller.".php";
	if (file_exists($controllerFile)) {
		require_once($controllerFile);
		$controller = New $controller();
		if (method_exists($controller, $method)) {
			$controller->{$method}($params);

			}else{
				require_once("Controllers/error.php");
			}
		
	}else{
		require_once("Controllers/error.php");
	}


	/*
	echo "<br>";
	echo "Controlador : ".$controller. "<br> Metodo : ".$method."<br> Parametros : ".$params;
	*/
	?>




<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tienda Virtual</title>
</head>
<body>
	
</body>
</html>