<?php
//Данные, необходимые для подключения к базе данных
$db = 'login_db';
$host = '127.0.0.1';
$user = 'root';
$pass = '';
$charset = 'utf8';
//Data source name
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
//Опции
$opt = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];
//Пытаемся подключиться к базе данных
try {
    $conn = new PDO($dsn, $user, $pass, $opt);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
return $conn;
