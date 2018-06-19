<?php
require_once __DIR__ . '/resource/mysql.php';
$from = $_POST['from'];
$date = date('Y/m/d H:i:s');
if ($from == 'app'){
    try {
        $pdo = new PDO($db_host_super, $db_user, $db_password, [PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
    } catch(PDOException $e) {
      //todo  
        die($e->getMessage());
    }
    
    $tmp = $pdo->query('SELECT COUNT(*) FROM User');
    
    header("Content-Type: application/json; charset=utf-8");
    
    foreach($tmp as $row) {
        $user_length = $row['COUNT(*)'];
        echo json_encode($row);
    }
    $user_length += 1;
    $pdo->query("INSERT INTO User (ID, AddedDate) VALUES ($user_length, '$date')");

}
exit();
