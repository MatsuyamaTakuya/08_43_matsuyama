<?php
//1. POSTデータ取得
//$name = filter_input( INPUT_GET, ","name" ); //こういうのもあるよ
//$email = filter_input( INPUT_POST, "email" ); //こういうのもあるよ
if(
  !isset($_POST["title"])||$_POST["title"] ==""||
  !isset($_POST["url"])||$_POST["url"] ==""||
  !isset($_POST["review"])||$_POST["review"] ==""
){
  exit("ParemError");
}
$id     = $_POST["id"];
$title  = $_POST["title"];
$url    = $_POST["url"];
$review = $_POST["review"];

//2. DB接続します
include("functions.php");
$pdo = db_conn();


//３．データ登録SQL作成
$sql = "UPDATE gs_bm_table SET title =:a1, url =:a2, review=:a3 WHERE id =:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':a1', $title, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a2', $url, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a3', $review, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id', $id, PDO::PARAM_INT); 
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
    errorMsg($stmt);
}else{
  header("Location: select.php");
  exit;
}
?>
