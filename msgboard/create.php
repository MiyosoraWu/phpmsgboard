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
                        if($_POST["nick"]==""|| $_POST["msg"]==""){
                            echo "請輸入暱稱或是內容~";
                            header("refresh:2;url='/index.php'");
                            exit;
                            }else{
                            $sql = "INSERT INTO msgboard (nick, msg, msgtime)VALUES("."'".$_POST["nick"]."','".$_POST["msg"]."','".date("Y/m/d H:i:s")."');";
                                if ($conn->query($sql) === TRUE) {
                                    $sql="select * from msgboard where nick='".$_POST["nick"]."' ORDER BY id DESC;";
                                    if($conn->query($sql)){  
                                        header("refresh:0;url='/index.php'");
                                        exit;
                                    echo "Error: " . $sql . "<br>" . $conn->error; 
                                    }
                                } else { 
                                    echo "Error: 請勿輸入特殊符號" ; 
                                    header("refresh:2;url='/index.php'");
                                    exit;
                                } 
                            }$conn->close();

                  
                    
  ?>