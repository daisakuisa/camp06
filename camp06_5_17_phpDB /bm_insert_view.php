<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>ブックアプリ</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header">
    <a class="navbar-brand" href="bm_list_view.php">データ一覧</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<!-- ここからinsert.phpにデータを送ります -->
<form method="post" action="bm_insert.php">
  <div class="jumbotron">
   <fieldset>
    <legend>ブックアプリ</legend>
     <label>ブックネーム：<input type="text" name="bookname"></label><br>
     <label>ブックURL：<input type="text" name="bookURL"></label><br>
     <label><textArea name="booktext" rows="4" cols="40"></textArea></label><br>
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
