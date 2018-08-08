<?php
header("Content-Type:text/html; charset=utf-8");
        date_default_timezone_set("Asia/taipei");
                        $servername = "localhost";
                        $username = "root";
                        $password = "MIYOsora0000????";
                        $dbname = "phpdb";
                        $conn = new mysqli($servername, $username, $password, $dbname);

                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }
                        if($_POST["reply_nick"]==""){
                            echo "請輸入暱稱";
                            header("refresh:2;url='/index.php'");
                            exit;
                            
                            }else{
                                $sql="select * from reply where nick='".$_POST["reply_nick"]."';";
                                $result=$conn->query($sql);
                                $row=$result->fetch_assoc();
                                if($_POST["reply_id"]!=$row["replyid"]&&$row["replyid"]==""){
                                echo "暱稱錯誤".$row["replyid"];
                                header("refresh:2;url='/index.php'");
                                exit;
                            } else if($_POST["reply_write_msg"]==""){
                                echo "請輸入修改內容";
                                header("refresh:2;url='/index.php'");
                                exit;
                                }else {

                                $sql ="UPDATE reply set msg='".$_POST["reply_write_msg"]."' where replyid=".$_POST["reply_id"].";";
                                if ($conn->query($sql) === TRUE) { 

                                    header('Location: /index.php');
                                    exit;
                                } else { 
                                    echo "Error: " . $sql . "<br>" . $conn->error; 
                                } }
                            }$conn->close();

                  
                    
  ?>