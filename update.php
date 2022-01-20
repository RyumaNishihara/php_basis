<?php
  $user = 'suzuki';
  $pass = '8(,8Q^6xFfEVmix';

  if(empty($_GET['id'])) {
    echo 'IDを正しく入力してください';
    exit;
  }

  $id = (int)$_GET['id'];
  $recipe_name = $_POST['recipe_name'];
  $howto = $_POST['howto'];
  $category = (int)$_POST['category'];
  $difficulty = (int)$_POST['difficulty'];
  $budget = (int)$_POST['budget'];

  try {
    //データベースに接続
    $dbh = new PDO('mysql:host=localhost;dbname=db1;charset=utf8', $user, $pass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //データベースに与える操作
    $sql = 'UPDATE recipes SET recipe_name = ?, category = ?, 
    difficulty = ?, budget = ?, howto = ? WHERE id = ?';
    //データベースにセット
    $stmt = $dbh->prepare($sql);

    //プレースホルダにどんな値が入るのか指定
    $stmt->bindValue(1, $recipe_name, PDO::PARAM_STR);
    $stmt->bindValue(2, $category, PDO::PARAM_INT);
    $stmt->bindValue(3, $difficulty, PDO::PARAM_INT);
    $stmt->bindValue(4, $budget, PDO::PARAM_INT);
    $stmt->bindValue(5, $howto, PDO::PARAM_STR);
    $stmt->bindValue(6, $id, PDO::PARAM_INT);
    //データベースの操作を実行する [execute：エグゼキュート：果たす]
    $stmt->execute();
    //データベースとの接続を切断
    $dbh = null;

    //更新されたことが分かるように画面上にメッセージを表示
    echo 'ID: ' . htmlspecialchars($id, ENT_QUOTES) . 'レシピの更新が完了しました。';

  } catch(PDOException $e) {
    //Exception：例外
    echo 'エラー発生: ' . htmlspecialchars($e->getMessage(), ENT_QUOTES) . '<br>';
    exit;
  }