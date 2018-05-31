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
<head><meta charset="UTF-8"><title>kobato prpr</title></head>
<body>
<style>body { overflow-x : hidden ; height:100%; width:100%; background-image:url("KBI.svg"); background-size:cover; } </style>
<form method="post"><input id="int" name="count" type="number" value="<?= $count ?>"><input type="submit" id="btn" value="set"></form>
</body>
</html>
