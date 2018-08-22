<?php
require_once __DIR__ . '/resource/mysql.php';
header("Content-Type: text/plain; charset=utf-8");
$from = $_POST['from'];
$ID = $_POST['ID'];
$a1 = $_POST['a1'];
$a1_5 = $_POST['a1_5'];
$a2 = $_POST['a2'];
$a3 = $_POST['a3'];
$a4 = $_POST['a4'];
if ($from == 'app'){
    try {
        $pdo = new PDO($db_host_super, $db_user, $db_password, [PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
    } catch(PDOException $e) {
      //todo  
        die($e->getMessage());
    }

    $tmp = $pdo->prepare("UPDATE user SET Anke1 = ?, Anke1_5 = ?, Anke2 = ?, Anke3 =  ?, Anke4 = ? WHERE ID = ?");
    $tmp->bindValue(1,$a1,PDO::PARAM_INT);
    $tmp->bindValue(2,$a1_5,PDO::PARAM_STR);
    $tmp->bindValue(3,$a2,PDO::PARAM_STR);
    $tmp->bindValue(4,$a3,PDO::PARAM_STR);
    $tmp->bindValue(5,$a4,PDO::PARAM_INT);
    $tmp->bindValue(6,$ID,PDO::PARAM_STR);
    $tmp->execute();

    echo "UPDATE user SET Anke1 = $a1, Anke1_5 = \'$a1_5\', Anke2 = \'$a2\', Anke3 = \'$a3\', Anke4 = $a4 WHERE ID = $ID";
    }
exit();
