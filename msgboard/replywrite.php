<?php
header("Content-Type:text/html; charset=utf-8");
date_default_timezone_set("Asia/taipei");
require_once "config/config.php";
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
$isDevMode = false;
$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/src"), $isDevMode);
$entityManager = EntityManager::create($conn, $config);

if ($_POST["reply_nick"] == "") {
    echo "請輸入暱稱";
    header("refresh:2;url='/index.php'");
    exit;
} else {
    $dql = "SELECT r.replyid FROM reply r where r.replyid = " . $_POST["reply_id"];
    $query = $entityManager->createQuery($dql);
    $replys = $query->getResult();
    $nick = $replys[0]->getNick;
    if($nick == $_POST["reply_write_nick"] && $_POST["reply_write_msg"] !="") {
        $dql = "UPDATE reply r SET r.msg = '" . $_POST["reply_write_msg"] . "' WHERE r.replyid = ". $_POST["reply_id"];
        $query = $entityManager->createQuery($dql);
        $Update = $query->execute();
        header('Location: /index.php');
        exit;
    }
    echo "暱稱錯誤或者未輸入修改文字";
    header("refresh:2;url='/index.php'");
    exit;
}
?>