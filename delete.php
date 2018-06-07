<?php
$id = $_GET["id"];
//1.  DB接続します
include("functions.php");
$pdo = db_conn();

//２．データ登録SQL作成
$stmt = $pdo->prepare("DELETE FROM gs_bm_table WHERE id =:id");
$stmt ->bindValue(":id",$id,PDO::PARAM_INT);
$status = $stmt->execute();


//４．データ登録処理後
if($status==false){
    errorMsg($stmt);
  }else{
  
    header("Location: select.php");
    exit;
  }
  ?>

?>
