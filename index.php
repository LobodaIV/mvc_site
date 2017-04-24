<?php
session_start();
require 'include/functions.php';
$link = db_connect('localhost','root','','mvc');

define('ROOT',__DIR__.'/');

$page = requestGet('page','homepage');
$controllerPath = ROOT . '/page/' . $page . '.php';

if(!file_exists($controllerPath)) 
{
	http_response_code(404);
	$page='error';
	$controllerPath = ROOT . '/page/' . $page . '.php';
}

require $controllerPath;
$template = 'templates/' . $page . '.php';

ob_start();
require $template;
$content = ob_get_clean();


$date = date("Y");
require 'templates/layout.php';