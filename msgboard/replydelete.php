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
if ($_POST["reply_id"] == ""){
    header("refresh:2;url='/index.php'");
    exit;
} else {
    $sql = "DELETE FROM reply where replyid=" . $_POST["reply_id"] . ";";
    if ($conn->query($sql) === true){ 
        header('Location: /index.php');
        exit;
    } else { 
        echo "Error: " . $sql . "<br>" . $conn->error; 
    }
}
?>