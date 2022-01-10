<?php
  $user = 'suzuki';
  $pass = '8(,8Q^6xFfEVmix';

  try {
    $dbh = new PDO('mysql:host=localhost;dbname=db1;charset=utf8', $user, $pass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
    $sql = 'SELECT * FROM recipes';
    $stmt = $dbh->query($sql);
  
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // print_r($result);
    echo '<table>' . PHP_EOL;
      echo '<tr>' . PHP_EOL;
        echo '<th>料理名</th><th>予算</th><th>難易度</th>' . PHP_EOL;
      echo '</tr>' . PHP_EOL;
      foreach ($result as $row) {
        print_r($row);
        echo '<tr>' . PHP_EOL;
          echo '<td>' . htmlspecialchars($row['recipe_name'], ENT_QUOTES) . '</td>' . PHP_EOL;
          echo '<td>' . htmlspecialchars($row['budget'], ENT_QUOTES) . '</td>' . PHP_EOL;
          echo '<td>' . match($row['difficulty']) {
            '1' => '簡単',
            '2' => '普通',
            '3' => '難しい',
          } .'</td>' . PHP_EOL;
        echo '</tr>' . PHP_EOL;
      }
    echo '</table>' . PHP_EOL;
  
    //データベースとの接続を切る。
    $dbh = null;

  } catch (PDOException $e) {
    // PDOExceptionを指定するとtry内で発生した全てのデータベース関連のエラーに対応できます。
    echo 'エラー発生: ' . htmlspecialchars($e->getMessage(), ENT_QUOTES) . '<br>';

    exit;
  }
?>