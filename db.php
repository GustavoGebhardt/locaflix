<?php
    $host = 'localhost';
    $port = '5432';
    $dbname = 'meuBanco';
    $user = 'postgres';
    $password = 'Mudar@123!';

    try {
        $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
?>