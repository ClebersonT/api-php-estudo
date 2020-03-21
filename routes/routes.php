<?php 
/**
 * retorna um container, acessa a função de dentro do namespace src
 */
use function src\slimConfiguration;
use App\Controllers\ProductController;

$app = new \Slim\App(slimConfiguration());
// ========================================
//rotas
//$app->get('/', App\Controller\ProductController:getProducts'); porem o ProductController::class retorna a string inteira já com o namespace
$app->get('/', ProductController::class . ':getProducts');
// ========================================

$app->run();