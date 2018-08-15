<?php
header("Content-Type:text/html; charset=utf-8");
date_default_timezone_set("Asia/taipei");
require_once "config/config.php";
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
$isDevMode = false;
$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/src"), $isDevMode);
$entityManager = EntityManager::create($conn, $config);

if ($_POST["reply_id"] != ""){
    $dql="DELETE FROM reply r WHERE r.replyid=" . $_POST["reply_id"];
    $q = $entityManager->createQuery($dql);
    $Deleted = $q->execute();
    header('Location: /index.php');
    exit;
}
?>