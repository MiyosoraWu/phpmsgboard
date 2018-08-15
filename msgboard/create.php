<?php
header("Content-Type:text/html; charset=utf-8");
date_default_timezone_set("Asia/taipei");
require_once "config/config.php";
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
$isDevMode = false;
$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/src"), $isDevMode);
$entityManager = EntityManager::create($conn, $config);
if ($_POST["nick"] == "" || $_POST["msg"] == "") {
    echo "請輸入暱稱或是內容~";
    header("refresh:2;url='/index.php'");
    exit;
} else {
    $msgboard = new msgboard();
    $msgboard->setNick($_POST["nick"]);
    $msgboard->setMsg($_POST["msg"]);
    $msgboard->setMsgtime(date("Y/m/d H:i:s"));
    $entityManager->persist($msgboard);
    $entityManager->flush();
    header("refresh:0;url='/index.php'");
    exit;
}
?>