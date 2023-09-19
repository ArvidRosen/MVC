<?php 
$pdo = new PDO("mysql:host=localhost;dbname=mvc;charset=utf8", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
function sql($sql, $values = []) { 
    global $pdo; 
    $queue = $pdo->prepare($sql); 
    foreach($values as $konstant => $val) { 
        $queue->bindParam($konstant, $values[$konstant]); 
    }
    $queue->execute();
    return $queue->fetchAll(PDO::FETCH_ASSOC); 
}
?>