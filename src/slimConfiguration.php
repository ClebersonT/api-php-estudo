<?php 
namespace src;
/**
 * [slimConfiguration description]
 * @return [type] [description]
 */
function slimConfiguration(): \Slim\Container{
	/*getenv() -> vai pegar o nome da variavel que foi definida no arquivo env.php(variaveis globais eu consigo usar de qualquer lugar do meu codigo)*/
	$configuration = [
		'settings' => [
			'displayErrorDetails' => getenv('DISPLAY_ERROR_DETAILS'),
		],
	];
	return new \Slim\Container($configuration);
}