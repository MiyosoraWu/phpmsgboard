<?php
header("Content-Type:text/html; charset=utf-8");
date_default_timezone_set("Asia/taipei");
$servername = "localhost";
$username = "root";
$password = "MIYOsora0000????";
$dbname = "phpdb";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die ("Connection failed: " . $conn->connect_error);
}
if ($_POST["reply_nick"] == "") {
    echo "請輸入暱稱";
    header("refresh:2;url='/index.php'");
    exit;
} else {
    if ($_POST["reply_msg"]=="" ) {
    echo "請輸入回覆內容";
    header("refresh:2;url='/index.php'");
    exit;
    } else {
        $sql = "INSERT INTO reply (id,msg, nick, replytime)VALUES(" . "'" . $_POST["reply_id"] . "','" . $_POST["reply_msg"] . "','" . $_POST["reply_nick"] . "','" . date("Y/m/d H:i:s") . "');";
        if ($conn->query($sql) === true) { 
            header('Location: /index.php');
            exit;
        } else { 
            echo "Error: " . $sql . "<br>" . $conn->error; 
        }
    }
}
?>