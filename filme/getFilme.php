<?php
    include '../db.php';

    if(isset($_GET)){
        $stmt = $pdo->query('SELECT * FROM filme');
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($rows as $row) {
            echo $row['nome'] ." ";
        }
    }
?>