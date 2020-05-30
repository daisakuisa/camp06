<?php
//1. POSTデータ取得
// if(
//   ! isset($_POS["bookname"])   || $_POST["bookname"]=="" ||
//   ! isset($_POS["bookURL"])  || $_POST["bookURL"]=="" ||
//   ! isset($_POS["booktext"]) || $_POST["booktext"]=="" 
// ){
//    exit('paramError');
// }



//まず前のphpからデーターを受け取る（この受け取ったデータをもとにbindValueと結びつけるため）
$bookname = $_POST["bookname"];
$bookURL  = $_POST["bookURL"];
$booktext = $_POST["booktext"];

//2. DB接続します xxxにDB名を入力する
//ここから作成したDBに接続をしてデータを登録します xxxxに作成したデータベース名を書きます
try {
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}


//３．データ登録SQL作成 //ここにカラム名を入力する
//xxx_table(テーブル名)はテーブル名を入力します
$stmt = $pdo->prepare("INSERT INTO gs_bm_table(id, bookname, bookURL, booktext,
indate )VALUES(NULL, :a1, :a2, :a3, sysdate())");

$stmt->bindValue(':a1', $bookname, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a2', $bookURL, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a3', $booktext, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}else{
  //５．index.phpへリダイレクト 書くときにLocation: in この:　のあとは半角スペースがいるので注意！！
  header("Location: bm_list_view.php");
  exit;

}
?>
