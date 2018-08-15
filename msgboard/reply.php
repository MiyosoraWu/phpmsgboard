<?php
header("Content-Type:text/html; charset=utf-8");
date_default_timezone_set("Asia/taipei");
require_once "config/config.php";
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
$isDevMode = false;
$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/src"), $isDevMode);
$entityManager = EntityManager::create($conn, $config);
if ($_POST["reply_nick"] == "" || $_POST["reply_msg"] == "") {
    echo "請輸入暱稱或是內容~";
    header("refresh:2;url='/index.php'");
    exit;
} else {
    $reply = new reply();
    $reply->setMsgid($_POST["reply_id"]);
    $reply->setMsg($_POST["reply_msg"]);
    $reply->setNick($_POST["reply_nick"]);
    $reply->setReplytime(date("Y/m/d H:i:s"));
    $entityManager->persist($reply);
    $entityManager->flush();
    header("refresh:0;url='/index.php'");
    exit;
}
?>