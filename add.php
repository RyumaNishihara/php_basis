<?php
  $user = 'suzuki';
  $pass = '8(,8Q^6xFfEVmix';

  $recipe_name = $_POST['recipe_name'];
  $howto = $_POST['howto'];
  $category = (int)$_POST['category'];
  $difficulty = (int)$_POST['difficulty'];
  $budget = (int)$_POST['budget'];

  try {
    //データベースに接続
    $dbh = new PDO('mysql:host=localhost;dbname=db1;charset=utf8', $user, $pass);
    //setAttributeは、PDOの挙動を制御する。
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //データベースにSQLをセット(挿入)する
    $sql = "INSERT INTO recipes (recipe_name, category, difficulty, budget, howto) VALUES (?, ?, ?, ?, ?)";
    // $stmtに、$sqlの実行を格納
    $stmt = $dbh->prepare($sql);
    //プレースホルダの値を指定（セット）する
    $stmt->bindValue(1, $recipe_name, PDO::PARAM_STR);
    $stmt->bindValue(2, $category, PDO::PARAM_INT);
    $stmt->bindValue(3, $difficulty, PDO::PARAM_INT);
    $stmt->bindValue(4, $budget, PDO::PARAM_INT);
    $stmt->bindValue(5, $howto, PDO::PARAM_STR);
    //セットしたSQLを実行
    $stmt->execute();
    //データベースとの接続を終了
    $dbh = null;
    //ブラウザに登録完了の表示をする
    echo 'レシピの登録が完了しました。';
  } catch(PDOException $e) {
    echo 'エラー発生: ' . htmlspecialchars($e->getMessage(), ENT_QUOTES) . '<br>';
    exit;
  }
?>