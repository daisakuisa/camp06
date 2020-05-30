<!-- SQL SELECT -->

<!-- 1,SELECT分を使って'id'「1,3,5」だけ抽出するSQLを作る。 -->
SELECT * FROM `gs_bm_table` WHERE id = 1 AND id = 3 AND id = 5 ;

<!-- 2,SELECT分を使って'id'「4~8」だけ抽出するSQLを作る。 -->
SELECT * FROM `gs_bm_table` WHERE id  >= 4 AND id <= 8 ;

<!-- 3,SELECT分を使って'bookname'「PHP本」を抽出する曖昧検索分を作る。 -->
SELECT * FROM `gs_bm_table` WHERE `bookname`LIKE '%PHP本%' ;

<!-- 4,SELECT分を使って'datetimeが'「新しい日付順」にそーとするSQLを作る。 -->
SELECT * FROM `gs_bm_table` ORDER BY `datetime` DESC ;

<!-- 5,SELECT分を使って'datetime'が現在「月」データのみ抽出するSQLを作る。 -->
SELECT * FROM `gs_bm_table`WHERE DATE_FORMAT(`datetime`, '%m') = 5

<!-- 6,SELECT分を使って'新しい日付順'で「5個」だけ抽出するSQLを作る。 -->
SELECT* FROM `gs_bm_table` ORDER BY `datetime`DESC LIMIT 5 ;

<!-- 7,(難問題)'bookname'に'PHP'の文字が含まれる「総数」を抽出するSQLを作る。 -->
SELECT COUNT(`bookname`) FROM `gs_bm_table` WHERE `bookname` LIKE '%PHP%'

<!-- SQL　UPDATE -->

<!-- 1,UPDATEを使って'ユニーク値'「7」の書籍名を'RB'に変更するSQL -->
UPDATE `gs_bm_table` SET`bookname`= 'RB'  WHERE  `id`=7 

<!-- 2,UPDATEを使って'ユニーク値'「3,9」の書籍名を'PY'に変更するSQL -->
UPDATE `gs_bm_table` SET`bookname`= 'PY'  WHERE  `id`=3  OR `id` =9 

<!-- 3,UPDATEを使って'ユニーク値'「6~8」の登録日時を現在時刻に変更するSQL -->
UPDATE `gs_bm_table` SET datetime = CURRENT_TIMESTAMP  WHERE  `id`>= 6  AND `id` <= 8 

<!-- 4,UPDATEを使って'書籍名'「js本」を「PHP＆JS」に変更するSQL -->
UPDATE `gs_bm_table` SET `bookname` = 'PHP＆JS' WHERE `bookname` LIKE '%JS本%'

<!-- 5,UPDATEを使って'書籍コメント'が入って無いレコードがあれば
　　　　'書籍コメント'に「未入力」と変更するSQL -->
UPDATE `gs_bm_table` SET `booktext`= '未入力' WHERE  `booktext`= ''