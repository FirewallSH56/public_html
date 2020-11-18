<?php
/**
 * Clase user
 */

class User
{
	// Private es para que no se pueda acceder a esta propiedad desde fuera de la clase.
	// Solo se puede acceder con $this.
	private $user;
	private static $auth = false;

	public function __construct( $user = false )
	{
		if ( $user )
			self::$auth = true;

		$this->user = $user;
	}

	/**
	 * Obtener nombre de usuario
	 */
	public function name()
	{
		return $this->user[ 'username' ];
	}

	/**
	 * Obtiene datos del usuario dinámicamente en forma de variable.
	 * @return mixed
	 */
	public function __get( $key )
	{
		# Verifica si el campo existe.
		if ( !isset( $this->user[ $key ] ) )
			return null;

		# retorna el campo deseado
		return $this->user[ $key ];
	}

	/**
	 * Verifica si el usuario está logeado.
	 */
	public static function is_auth()
	{
		return self::$auth;
	}
}