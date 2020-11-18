<?php
/**
*
*
*
* @package RiseWeb
* @author Onekeko
* @copyright (c) 2020 - All rights reserved.
* @version 3.0
*
*
*
**/

# Configuración a la base de datos

$conexion = [
	"server" => "localhost",
	"user" => "root",
	"pass" => "56484652",
	"db" => "cms",
];

# Configuración del Hotel

$rise_settings = [
	"name" => "HFantasy", // Nombre del Hotel
	"weblink" => "http://localhost", // Link del Hotel
	"twitter" => "http://twitter.com", // Link de tu Pagina de Twitter
	"theme" => "horange", // Tema Principal del Hotel (Se encuentra en la carpeta /themes)
	"swf" => "http://localhost/swfs", // Link de la carpeta swf
	"slogan" => "¡Haz amig@s, únete a la diversion, pásalo en grande!", 
	"motto" => "¡HFantasy lo mejor!", // Mision para nuevos usuarios
	"credits" => 50000,
	"diamonds" => 0,
	"duckets" => 10,
	"max_rank" => 9
];

?>