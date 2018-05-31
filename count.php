<?php
require_once __DIR__ . '/resource/mysql.php';

try {
    $pdo = new PDO($db_host_super, $db_user, $db_password, [PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);

} catch(PDOException $e) {
    
  //todo  
    die($e->getMessage());

}

$count = $pdo->query('SELECT * FROM `count`');

header("Content-Type: application/json; charset=utf-8");

foreach($count as $row) {
    echo json_encode($row);
}


//var_dump($count);

//header("Content-Type: application/json; charset=utf-8");
//echo "a-prpr kobatoprpr";i
