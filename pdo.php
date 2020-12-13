<?php
$username = 'ets6';
$password = '9287744Ethan!';
$dsn = "mysql:host=sql1.njit.edu;dbname=$username";
try {
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    include('../errors/pdo.php');
    exit();
}

?>