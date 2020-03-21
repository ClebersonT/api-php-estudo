<?php 
require_once 'vendor/autoload.php';
//indução de tipos -> interessante pra quem está com ide
//não precisa caso não queira
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

//error handler slim
//exibirá os detalhes do erro
$configuration = [
    'settings' => [
        'displayErrorDetails' => true,
    ],
];
$configuration = new \Slim\Container($configuration);
/*error handler slim*/

//o next é o proximo item a ser executado
//exemplo mid01 -> mid02 -> app (nesse fluxo)
$mid01 = function(Request $request, Response $response, $next){
	$response->getBody()->write("DENTRO DO MIDDLEWARE 1");
	$response = $next($request, $response);
	$response->getBody()->write("DENTRO DO MIDDLEWARE 2");
	return $response;
};

//objeto do slim
$app = new \Slim\App();

//podemos agrupar varias rotas tbm utilizando $app->group() e passando o mid01

//requisição com metodo get
//limite de 255 caracteres
//feito exatamente para ser simples(não usarei get em caso de autenticação é claro!)
/*$app->get('/', function($request, $response, $args){
	return $response-> getBody()->write('Bem vindo ao slim');
});*/
//Response, Request -> injeção de dependencias
/*$app->get('/produtos', function(Request $request, Response $response, array $args){
	//passando parâmetros
	//$limit = $_GET['limit']; PADRÃO PHP
	$limit = $request->getQueryParams()['limit'];
	return $response->getBody()->write("{$limit} produtos");
});*/

$app->post('/produto', function(Request $request, Response $response, array $args){
	//getParsedBody me retorna um array com todos os dados que estou passando
	$data = $request->getParsedBody();

	$nome = $data['nome'] ?? 'teste';
	return $response->getBody()->write("Produto {$nome} (POST))");
})->add($mid01);

$app->put('/produto', function(Request $request, Response $response, array $args){
	//getParsedBody me retorna um array com todos os dados que estou passando
	$data = $request->getParsedBody();

	$nome = $data['nome'] ?? 'teste';
	return $response->getBody()->write("Produto {$nome} (PUT)");
});

$app->delete('/produto', function(Request $request, Response $response, array $args){
	//getParsedBody me retorna um array com todos os dados que estou passando
	$data = $request->getParsedBody();

	$nome = $data['nome'] ?? 'teste';
	return $response->getBody()->write("Produto {$nome} (DELETE)");
});

//executando aplicação
$app->run();
 ?>