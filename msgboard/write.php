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
                        if($_POST["write_nick"]==""){
                            echo "請輸入暱稱";
                            header("refresh:2;url='/index.php'");
                            exit;
                            
                            }else{
                                $sql="select * from msgboard where nick='".$_POST["write_nick"]."';";
                                $result=$conn->query($sql);
                                $row=$result->fetch_assoc();
                                if($_POST["id"]!=$row["id"]&&$row["id"]==""){
                                echo "暱稱錯誤".$row["id"];
                                header("refresh:2;url='/index.php'");
                                exit;
                            } else if($_POST["write_msg"]==""){
                                echo "請輸入修改內容";
                                header("refresh:2;url='/index.php'");
                                exit;
                                }else {

                                $sql ="UPDATE msgboard set msg='".$_POST["write_msg"]."' where id=".$_POST["id"].";";
                                if ($conn->query($sql) === TRUE) { 

                                    header('Location: /index.php');
                                    exit;
                                } else { 
                                    echo "Error: " . $sql . "<br>" . $conn->error; 
                                } }
                            }$conn->close();

                  
                    
  ?>