<?php

/**
 * Class Session
 */
class Session
{
	/**
	 * Session constructor.
	 */
	public function __construct()
	{
		if(empty(session_id())) {
			session_start();
		}
	}

	/**
	 * @param string $name
	 * @param mixed $value
	 */
	public function create($name, $value)
	{
		$_SESSION[$name] = $value;
	}

	/**
	 * @param string $name
	 * @return null|string|array
	 */
	public function read($name = '')
	{
		if ($name) {
			return isset($_SESSION[$name]) ? $_SESSION[$name] : null;
		}
		return $_SESSION;
	}

	/**
	 * @param string $name
	 * @param mixed $value
	 */
	public function update($name, $value)
	{
		$_SESSION[$name] = $value;
	}

	/**
	 * @param string $name
	 */
	public function delete($name)
	{
		if (isset($_SESSION[$name])) {
			unset($_SESSION[$name]);
		}
	}
}
