<?php 
namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

/**
 * class final pois ninguem vai herdar essa classe
 */
final class ProductController{

	public function getProducts(Request $request, Response $response, array $args): Response{
		//$response->getBody()->write("hello world");
		//já retorna um json na api
		$response = $response->withJson([
			"message" => "Hello world"
		]);
		return $response;
	}
}