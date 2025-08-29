<?php
error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE);
ini_set('display_errors', 1);

// Chemins
define('ROOT', rtrim(str_replace('index.php','', $_SERVER['SCRIPT_FILENAME']), '/\\').'/');

// Base URL (sous-dossier éventuel)
$base = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\'); // ex: "" ou "/dashboard"
define('BASE_URL', $base === '/' ? '' : $base);

// Récupère le PATH SANS la query (évite "index?x=1")
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);       // ex: /accueil/index
$relative = substr($path, strlen(BASE_URL));                    // enlève le base path
$segments = array_values(array_filter(explode('/', $relative))); // ["accueil","index", "..."]

$controller = $segments[0] ?? 'accueil';
$action     = $segments[1] ?? 'index';
$params     = array_slice($segments, 2);

// Charges
require ROOT.'config/config.php';
require ROOT.'core/model.php';
require ROOT.'core/controller.php';
require ROOT.'core/session.php';
session_start();

// Dispatch
$ctrlFile = ROOT.'controller/'.$controller.'.php';
if (!is_file($ctrlFile)) { http_response_code(404); exit('404'); }
require $ctrlFile;

$controllerObj = new $controller();
if (!method_exists($controllerObj, $action)) { http_response_code(404); exit('404'); }
call_user_func_array([$controllerObj, $action], $params);
