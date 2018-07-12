<?php
	use \Psr\Http\Message\ServerRequestInterface as Request;
	use \Psr\Http\Message\ResponseInterface as Response;

	require '../vendor/autoload.php';

	$app = new \Slim\App;

	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Methods: GET, SELECT, POST, PUT, OPTIONS');
	header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');
	header('Content-Type: application/x-www-form-urlencoded');

	//lixo
	require_once('../app/api/books.php');
	require_once('../app/api/genres.php');
	//API para inserir
	require_once('../app/api/formEst.php');
	require_once('../app/api/formKit.php');
	require_once('../app/api/formGroup.php');
	require_once('../app/api/formItem.php');
	require_once('../app/api/formCat.php');
	//API para editar
	require_once('../app/api/formUserEdit.php');
	require_once('../app/api/formMessageEdit.php');
	require_once('../app/api/formKitEdit.php');
	require_once('../app/api/formGroupEdit.php');
	require_once('../app/api/formResEdit.php');
	require_once('../app/api/formCatEdit.php');
	require_once('../app/api/formEstEdit.php');
	require_once('../app/api/formItemEdit.php');
	//Etc
	require_once('../app/api/formMsg.php');
	require_once('../app/api/reserva.php');




$app->run();