<?php 
//A ARQUITETURA DARÁ ATRAVES SO ATOR ACESSANDO A API
//PARA CADA ROTA UM METODO DE UMA CLASSE SERÁ EXECUTADO
//MVC - MODEL - VIEW - CONTROLLER
//DAO - DATA ACCESS OBJECT
/*CRIAR UM ARQUIVO ENV.PHP NA RAIZ*/
/*APOS ISSO, CRIAR PASTA SRC, ONDE FICARÃO ALGUMAS CONFIGURAÇÕES
DENTRO UM ARQUIVO CHAMADO SLIMCONFIGURATION.PHP 
*/
//criar pasta routes e arquivos de rotas usando o slimConfiguration que esta na namespace src
//importa o autoload
require_once './vendor/autoload.php';
//pega o env que tem as variaveis de ambiente
require_once './env.php';
//todas as configurações do slim
require_once './src/slimConfiguration.php';
//rotas
require_once './routes/routes.php';


