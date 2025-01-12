<?php

/**
 * Session class
 * Save or read data to the current session
 */

namespace App\Model;

defined('ROOTPATH') OR exit('Access Denied!');

class Session
{
	private const MAIN_KEY = 'APP';
	private const USER_KEY = 'USER';

    public function getMainKey()
    {
        return self::MAIN_KEY;
    }
    public function getUserKey()
    {
        return self::USER_KEY;
    }

	/** activate session if not yet started **/
	private function start_session():int
	{
		if (session_status() === PHP_SESSION_NONE)
        {
            session_start();
		}

		return 1;
	}

	/** put data into the session **/
	public function set(mixed $keyOrArray, mixed $value = ''):int
	{
		$this->start_session();

		if(is_array($keyOrArray))
		{
			foreach ($keyOrArray as $key => $value) {
				
				$_SESSION[self::MAIN_KEY][$key] = $value;
			}

			return 1;
		}

		$_SESSION[self::MAIN_KEY][$keyOrArray] = $value;

		return 1;
	}

	/** get data from the session. default is return if data not found **/
	public function get(string $key, mixed $default = ''):mixed
	{
		
		$this->start_session();

		if(isset($_SESSION[self::MAIN_KEY][$key]))
		{
			return $_SESSION[self::MAIN_KEY][$key];
		}

		return $default;
	}

	/** saves the user row data into the session after a login **/
	public function auth(mixed $user_row):int
	{
		$this->start_session();

		$_SESSION[self::USER_KEY] = $user_row;

		return 0;
	}

	/** removes user data from the session **/
	public function logout():int
	{
		$this->start_session();

		if(!empty($_SESSION[self::USER_KEY])){
			
			unset($_SESSION[self::USER_KEY]);
		}

		return 0;
	}

	/** checks if user is logged in **/
	public function is_logged_in():bool
	{
		$this->start_session();

		if(!empty($_SESSION[self::USER_KEY])){
			
			return true;
		}

		return false;
	}

	/** gets data from a column in the session user data **/
	public function user(string $key = '', mixed $default = ''):mixed
	{
		$this->start_session();

		if(empty($key) && !empty($_SESSION[self::USER_KEY])){

			return $_SESSION[self::USER_KEY];
		}else

		if(!empty($_SESSION[self::USER_KEY]->$key)){
			
			return $_SESSION[self::USER_KEY]->$key;
		}

		return $default;
	}

	/** returns data from a key and deletes it **/
	public function pop(string $key, mixed $default = ''):mixed
	{
		$this->start_session();
		
		if(!empty($_SESSION[self::MAIN_KEY][$key])){
			
			$value = $_SESSION[self::MAIN_KEY][$key];
			unset($_SESSION[self::MAIN_KEY][$key]);
			return $value;
		}

		return $default;
	}

	/** returns all data from the APP array **/
	public function all():mixed
	{
		$this->start_session();

		if(isset($_SESSION[self::MAIN_KEY]))
		{
			return $_SESSION[self::MAIN_KEY];
		}

		return [];
	}

	public function checkLevel(array $data): bool
	{
		$currentLevel = $this->user('level');

        if (!empty($data) && is_array($data))
        {
            foreach ($data as $role)
            {
                if ($role === $currentLevel)
                {
                    return true;
                }
            }
        }
		return false;
	}
	
	public function destroy(): void
	{
		$this->start_session();
		session_unset();
		session_destroy();
	}
}