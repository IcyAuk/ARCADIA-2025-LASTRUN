<?php 

namespace App\Core;

defined('ROOTPATH') OR exit('Access Denied!');

use Exception;
use MongoDB\Client;

Trait Database
{

    private static $pdo = null; //static is accessible without creating an object of the class

    public static function openDatabaseConnection(): \PDO
    {
        if (self::$pdo === null)
        {
            $host = DBHOST;
            $port = DBPORT ?? '';
            $dbname = DBNAME;
            $username = DBUSER;
            $password = DBPASS;
            $charset = DBCHARSET ?? 'utf8'; // Character set

            if(IS_DOMAIN_DEPLOYED)
            {
                //mind the pgsql dsn
                $dsn = "pgsql:host=$host;port=$port;dbname=$dbname;user=$username;password=$password;options='--client_encoding=$charset";
            }else
            {
                $dsn = "mysql:host=$host;dbname=$dbname;user=$username;password=$password";
            }

            try
            {
                self::$pdo = new \PDO($dsn);
                self::$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
                self::$pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);

                return self::$pdo;
            }
            catch (\PDOException $e)
            {
                //echo($dsn);
                die($e->getMessage());
            }
            
        }
        return self::$pdo;
    }

    public function openMongoDBDatabaseConnection()
    {
        $uri = $_ENV['DATABASE_MONGODB_URI'];
        $client = new Client($uri);
        try {
            
            $client->selectDatabase('admin')->command(['ping' => 1]);
        } catch (Exception $e) {
            printf($e->getMessage());
        }
    }

    public static function closeDatabaseConnection(): void
    {
        self::$pdo = null;
    }

	public function query($query, $data = [])
	{

		$con = $this->openDatabaseConnection();
		$stm = $con->prepare($query);

		$check = $stm->execute($data);
		if($check)
		{
			$result = $stm->fetchAll(\PDO::FETCH_OBJ);
			if(is_array($result) && count($result))
			{
				return $result;
			}
		}

		return false;
	}

	public function get_row($query, $data = [])
	{

		$con = $this->openDatabaseConnection();
		$stm = $con->prepare($query);

		$check = $stm->execute($data);
		if($check)
		{
			$result = $stm->fetchAll(\PDO::FETCH_OBJ);
			if(is_array($result) && count($result))
			{
				return $result[0];
			}
		}

		return false;
	}

	
}