<?php
// 1.GETでid値を取得
$id = $_GET["id"];


// 2.DB接続
try{
    $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e->getMessage());
}
// 3.SELECT * FROM gs_bm_table WHERE id =:id;
$sql = "SELECT * FROM gs_bm_table WHERE id =:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id',$id, PDO::PARAM_INT);
$status = $stmt->execute();

// 4.データ表示
$viwe="";
if($status==false){
// execute(SQL実行時にエラーがある場合)
$error = $stmt->errorInfo();
exit("ErrorQuery:".$error[2]);

}else{
    // データのみ抽出の場合はwhileループで取り出さない
    $row = $stmt->fetch();
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>データ更新</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<!-- <body id="main"> -->
<body>
  
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="bm_list_view.php">データ一覧</a>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] $view-->
<form method="post" action="update.php">
  <div class="jumbotron">
    <filelset>
    <legend>ブックアプリ</legend>
     <label>ブックネーム：<input type="text" name="bookname" value="<?=$row["bookname"]?>"></label><br>
     <label>ブックURL：<input type="text" name="bookURL" value="<?=$row["bookURL"]?>"></label><br>
     <label><textArea name="booktext" rows="4" cols="40"><?=$row["booktext"]?></textArea></label><br>
     <input type="hidden" name="id" value="<?=$row["id"]?>">
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>

