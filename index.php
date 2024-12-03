<?php

echo("Hello World (dev) </br>");
echo($_SERVER['REQUEST_URI'] . "</br>");
echo(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) . "</br>");

// Database configuration
$host = 'c3l5o0rb2a6o4l.cluster-czz5s0kz4scl.eu-west-1.rds.amazonaws.com'; // Database host
$port = 5432; // Database port
$dbname = 'dafh0vcjis1ed8'; // Database name
$username = 'udmjdtgjjs0jnn'; // Database username
$password = 'p3df65259f67c7819aed051ef7c3121a7502e37f5b24c62979d818ab5dcd42cb2'; // Database password
$charset = 'utf8mb4'; // Character set

// DSN (Data Source Name) for PDO
$dsn = "pgsql:host=$host;port=$port;dbname=$dbname;user=$username;password=$password";

try {
    // Create a PDO instance (Database connection)
    $pdo = new PDO($dsn, $username, $password);

    // Set PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Set PDO default fetch mode to associative array
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    echo "Database connection successful. </br>";
} catch (PDOException $e) {
    // Handle connection error
    echo "Database connection failed: " . $e->getMessage();
    exit; // Stop script execution on failure
}

// QUERY
try {
    // Prepare the SQL query
    $stmt = $pdo->query("SELECT * FROM test1");

    // Fetch all rows as an associative array
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Loop through and display results
    foreach ($rows as $row) {
        echo "Name: " . $row['name'] . ", Price: " . $row['price'] . "<br>";
    }
} catch (PDOException $e) {
    // Handle exceptions
    echo "Error: " . $e->getMessage();
}

?>
