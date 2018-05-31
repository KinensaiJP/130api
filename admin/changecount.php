<?php
require_once  __DIR__ .  '/../resource/mysql.php';

try {
    $pdo = new PDO($db_host_super, $db_user, $db_password, [PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
} catch(PDOException $e) {
  //todo
    die($e->getMessage());
}

if(isset($_POST['count'])) {
    $stmt = $pdo->prepare('UPDATE `count` SET `count` = ?');
    $stmt->bindValue(1,$_POST['count'],PDO::PARAM_INT);
    $stmt->execute();
}

$stmt = $pdo->query('SELECT * FROM `count`');

foreach($stmt as $row) {
	$count = $row['count'];
}

?>
<!DOCTYPE html>
<html>
  <head><meta charset="UTF-8"><title>来場数変更</title></head>
  <body>
    <form method="post"><input name="count" type="number" value="<?= $count ?>"><input type="submit" value="set"></form>
  </body>
</html>
