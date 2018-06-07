<?php

/**
 * Class Cookie
 */
class Cookie
{
	/**
	 * @param string $name
	 * @param mixed $value
	 * @param int $expire
	 * @param string $path
	 * @param null|string $domain
	 * @param bool $security
	 */
	public function create($name, $value, $expire, $path = '/', $domain = null, $security = false)
	{
		setcookie($name, $value, $expire, $path, $domain, $security);
	}

	/**
	 * @param string $name
	 * @return null|string|array
	 */
	public function read($name = '')
	{
		if ($name) {
			return isset($_COOKIE[$name]) ? $_COOKIE[$name] : null;
		}
		return $_COOKIE;
	}

	/**
	 * @param string $name
	 * @param mixed $value
	 * @param int $expire
	 * @param string $path
	 * @param null|string $domain
	 * @param bool $security
	 */
	public function update($name, $value, $expire, $path = '/', $domain = null, $security = false)
	{
		setcookie($name, $value, $expire, $path, $domain, $security);
	}

	/**
	 * @param string $name
	 * @param string $path
	 * @param null|string $domain
	 */
	public function delete($name, $path = '/', $domain = null)
	{
		setcookie($name, null, time() - 3600, $path, $domain);
	}
}