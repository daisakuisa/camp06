<?php
// 1.POSTでid,bookname,bookURL,booktextを取得
$id  = $_GET["id"];


// 2.DB接続
try {
    // mampの場合は注意です！違います！別途後ほど確認します！
    $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
    } catch (PDOException $e) {
      exit('データベースに接続できませんでした。'.$e->getMessage());
    }

// UPDATE gs_bm_table SET...;で更新(bindValue)
$sql = 'DELETE FROM gs_bm_table WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id',$id,PDO::PARAM_INT);  //更新したいidを渡す
$status = $stmt->execute();

// 4.データ登録処理後
if($status==false){
    // SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);

}else{
    // へリダイレクト
    header("Location: bm_list_view.php");
    exit;
}