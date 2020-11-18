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

# Llamando a Config
require_once "config.php";

# Incluir libreriá carbon
require 'Carbon.php';

# Incluir clase User
require 'User.php';

use Carbon\Carbon;

setlocale(LC_ALL, 'es_MX');

# Conectando a la base de datos
$db = mysqli_connect($conexion['server'], $conexion['user'], $conexion['pass'], $conexion['db']);

# Empezar sesion
session_start();

# Verificar sessión
# Si está logeado, crear $myuser (object User)
if ( isset( $_SESSION[ 'loginuser' ] ) )
{
	# Buscar usuario en la base de datos
	$search = mysqli_query( $db, "SELECT * FROM users WHERE username='$_SESSION[loginuser]'" );

	# Verificar si se encontró usuario.
	if ( mysqli_num_rows( $search ) )
	{
		# Obtener los datos encontrados en un objeto
		$find = mysqli_fetch_assoc( $search );

		# Crear myuser
		$myuser = new User( $find );
	}
}
else
	$myuser = new User();

# Sacar IP De usuarios
function SacarIP() {
	if($_SERVER) {
		if(isset($_SERVER["HTTP_X_FORWARDED_FOR"])) {
		$realip = $_SERVER["HTTP_X_FORWARDED_FOR"];
		} elseif (isset($_SERVER["HTTP_CLIENT_IP"])) {
		$realip = $_SERVER["HTTP_CLIENT_IP"];
		} else {
		$realip = $_SERVER["REMOTE_ADDR"];
		}
	} else {
				if(getenv("HTTP_X_FORWARDED_FOR")) {
					$realip = getenv("HTTP_X_FORWARDED_FOR");
				} elseif(getenv("HTTP_CLIENT_IP")) {
					$realip = getenv("HTTP_CLIENT_IP");
				} else {
					$realip = getenv("REMOTE_ADDR");
				}
			}
	return $realip;
}

$ip = SacarIP();

# Formato Tiempo

function diff_for_humans( int $date )
{
	$diff =  Carbon::parse( date( 'd-M-Y H:i:s ', $date ) )->diffForHumans();

	$eng = [
		'day', 'month', 'year', 'second', 'minute', 'week', 'hour'
	];

	$esp = [
		'día', 'mes', 'año', 'segundo', 'minuto', 'semana', 'hora'	
	];

	return str_replace( 'ago', '', str_replace( $eng, $esp, $diff ) );
}
