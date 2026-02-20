<?php
$host = 'localhost';
$port = 3306;
$username = 'root';
$password = '';
$database = 'curemolecules';

echo "Testing MySQL connection to $host:$port...\n";

try {
    $dsn = "mysql:host=$host;port=$port;dbname=$database";
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "✅ Connection successful! Database '$database' is accessible.\n";
}
catch (PDOException $e) {
    echo "ERROR: " . $e->getMessage() . "\n";
}
