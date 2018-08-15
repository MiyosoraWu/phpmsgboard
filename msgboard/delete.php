<?php
header("Content-Type:text/html; charset=utf-8");
date_default_timezone_set("Asia/taipei");
require_once "config/config.php";
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
$isDevMode = false;
$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/src"), $isDevMode);
$entityManager = EntityManager::create($conn, $config);

if ($_POST["id"] != "") {
    $dql="DELETE FROM reply r WHERE r.msgid=" . $_POST["id"];
    $query = $entityManager->createQuery($dql);
    $Deleted = $query->execute();
    $dql="DELETE FROM msgboard m WHERE m.id=" . $_POST["id"];
    $query = $entityManager->createQuery($dql);
    $Deleted = $query->execute();
    header('Location: /index.php');
    exit;
}
?>