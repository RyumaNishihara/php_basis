<?php
  //データベースのユーザーとパスワードを変数に格納する
  $user = 'suzuki';
  $pass = '8(,8Q^6xFfEVmix';

  //GET変数でIDを受け取る
  if(empty($_GET['id'])) {
    //入力した値が数値じゃなかったり空だったら
    echo 'IDを正しく入力してください。';
    exit;
  }
  try {
    //$_GETで取得したidを数値型に変換して$id変数に格納
    $id = (int)$_GET['id'];

    //データベースに接続する
    $dbh = new PDO('mysql:host=localhost;dbname=db1;charset=utf8', $user, $pass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //DELETEのSQLを入力する
    //受け取るidは毎回変わるのでidを指定するところはプレースホルダにする。
    $sql = 'DELETE FROM recipes WHERE id = ?';
    //$stmtに、prepare()メソッドでデータベースにセットを格納
    $stmt = $dbh->prepare($sql);

    //プレースホルダの値を指定して、データベースへの操作を実行する
    $stmt->bindValue(1, $id, PDO::PARAM_INT);
    $stmt->execute();
    //データベースとの接続を終了
    $dbh = null;

    //画面に削除完了のメッセージを表示する
    echo 'ID: ' . htmlspecialchars($id, ENT_QUOTES) . 'の削除が完了しました。';

  } catch(PDOException $e) {
    //エラー時の表示を入力する
    echo 'エラー発生: ' . htmlspecialchars($e->getMessage(), ENT_QUOTES) . '<br>';
    exit;
  }