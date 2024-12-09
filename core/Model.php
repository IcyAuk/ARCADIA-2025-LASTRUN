<?php

class Model
{
    private static $pdo = null;

    public static function openDatabaseConnection()
    {
        if (self::$pdo === null)
        {
            $host = $_ENV['DATABASE_HOST'];
            $port = $_ENV['DATABASE_PORT'];
            $dbname = $_ENV['DATABASE_NAME'];
            $username = $_ENV['DATABASE_USERNAME'];
            $password = $_ENV['DATABASE_PASSWORD'];
            $charset = $_ENV['DATABASE_CHARSET'] ?? 'utf8'; // Character set
            $dsn = "pgsql:host=$host;port=$port;dbname=$dbname;user=$username;password=$password"; //Data Source Name
            try
            {
                self::$pdo = new PDO($dsn);
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

                return self::$pdo;
            }
            catch (PDOException $e)
            {
                //append error message to log file
                error_log("[" . date('Y-m-d H:i:s') . "] " . $e->getMessage() . "\n", 3, __DIR__ . '/../logs/db_error.log');
                http_response_code(500);
                die();
            }
            
        }

    }

    public static function closeDatabaseConnection()
    {
        self::$pdo = null;
    }
}

?>
