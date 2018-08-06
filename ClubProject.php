<?php
require_once __DIR__ . '/resource/mysql.php';

try {
    $pdo = new PDO($db_host_super, $db_user, $db_password, [PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
} catch(PDOException $e) {
  //todo  
    die($e->getMessage());
}

$ClubProject = $pdo->query('SELECT ID, Name, Place, Description, Time FROM `ClubProject`');


header("Content-Type: application/json; charset=utf-8");

$cnt = 0;
foreach($ClubProject as $row) {
    $cnt++;
    echo json_encode($row);
    if (count($ClubProject) == $cnt) echo ",";
}

exit();
?>

