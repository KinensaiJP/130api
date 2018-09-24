<?php
require_once __DIR__ . '/resource/mysql.php';
$from = $_POST['from'];
if ($from == 'app'){
    try {
        $pdo = new PDO($db_host_super, $db_user, $db_password, [PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
    } catch(PDOException $e) {
      //todo  
        die($e->getMessage());
    }
    
    $tmp = $pdo->query('SELECT COUNT(*) FROM user');
    
    header("Content-Type: application/json; charset=utf-8");
    
    foreach($tmp as $row) {
        $user_length = $row['COUNT(*)'];
        echo json_encode($row);
    }
    $user_length += 1;

    $te = $pdo->prepare("INSERT INTO user (ID, AddedDate) VALUES ( ?, now())");
    $te->bindValue(1,$user_length,PDO::PARAM_INT);
    $te->execute();
}
exit();
