<?php
$host = "localhost"; // or your server's IP address
$user = "root";
$pass = "410072";
$db = "movies";
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

// Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
// if ($pdo->connect_error) {
//     die("Connection failed: " . $pdo->connect_error);
// }
// echo "Connected successfully";
?>
