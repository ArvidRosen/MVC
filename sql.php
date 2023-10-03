<?php 
$pdo = new PDO("mysql:host=localhost;dbname=mvc;charset=utf8", "root", ""); /*create a new POD instance to connect to my SQL database*/ 
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); /*set POD attributes to eanble errror reporting and exceptions*/
function sql($sql, $values = []) { /*defines a costume function named "sql" that makes an sql query and optional values as parameters*/
    global $pdo;/*access to PDO istance de clared outside of this function*/
    $queue = $pdo->prepare($sql); /*prapare the sql statemet using the PDO connection  and the sql query provided*/
    foreach($values as $konstant => $val) { /*loop through the values array*/
        $queue->bindParam($konstant, $values[$konstant]); /* bind the values to the placeholders in the prepared sql statement*/
    }
    $queue->execute(); /* execute the prepared sql statement with the bound values*/
    return $queue->fetchAll(PDO::FETCH_ASSOC); /*fetch all rows from the result as an associative array and return them*/
}
?>