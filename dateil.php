<?php
  $user = 'suzuki';
  $pass = '8(,8Q^6xFfEVmix';
  
  if(empty($_GET['id'])) {
    echo 'IDを正しく入力してください';
    exit;
  }

  try {
    $id = (int)$_GET['id'];
    // vardump()で、$idの型と中身を確認することができる。
    // var_dump($id);
    // データベースへの接続
    $dbh = new PDO('mysql:host=localhost;dbname=db1;charset=utf8', $user, $pass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //特定のレシピデータを取り出すためのプレースホルダーを使う。
    $sql = 'SELECT * FROM recipes WHERE id = ?';
    $stmt = $dbh->prepare($sql);
    // プレースホルダの値を指定する。bindValue(何番目の？か, 当てはめる変数, 値の型)
    $stmt->bindValue(1, $id, PDO::PARAM_INT);
    // $stmtを実行する
    $stmt->execute();
    // データベースの値を配列で格納する
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    // print_r($result);
    //
    echo '料理名: ' . htmlspecialchars($result['recipe_name'], ENT_QUOTES) . '<br>' . PHP_EOL;
    echo 'カテゴリ: ' . match($result['category']) {
      '1' => '和食',
      '2' => '洋食',
      '3' => '中華',
    } . '<br>' . PHP_EOL;
    echo '予算: ' . htmlspecialchars($result['budget'], ENT_QUOTES) . '<br>' . PHP_EOL;
    echo '難易度: ' . match($result['difficulty']) {
      '1' => '簡単',
      '2' => '普通',
      '3' => '難しい',
    } . '<br>' . PHP_EOL;
    echo '作り方:<br>' . nl2br(htmlspecialchars($result['howto'], ENT_QUOTES)) . '<br>' . PHP_EOL;
    // ・PHP_EOLは、改行コード。 ・nl2brは、テキスト内の改行を表現してくれる。
    // データベースとの切断
    $dbh = null;
  } catch(PDOException $e) {
    echo 'エラー発生: ' . htmlspecialchars($e->getMessage(), ENT_QUOTES) . '<br>';
    // $e にエラー発生時の情報が格納される。
    // $e->getMessage()とすることで、エラーメッセージを取得できる。
    exit;
  }