<?php
//共通で使うものを別ファイルにしておきましょう。
function db_conn(){
try {
    return new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
  } catch (PDOException $e) {
    exit('DbConnectError:'.$e->getMessage());
  }
}


function errorMsg($stmt){
    $error = $stmt->errorInfo();
    exit("ErrorQuery:".$error[2]);
  } 
  
?>