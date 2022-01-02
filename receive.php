<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>出力結果</title>
</head>
  <body>
    <?php
      print_r($_POST);
      echo '<br>';
      // 悪意ある入力を防ぐ
      echo htmlspecialchars($_POST['recipe_name'], ENT_QUOTES);
      echo '<br>';
      echo match ($_POST['category']) {
        '1' => '和食',
        '2' => '洋食',
        '3' => '中華',
      } . '<br>';
      echo match ($_POST['difficulty']) {
        '1' => '簡単',
        '2' => '普通',
        '3' => '難しい',
      } . '<br>';
      if (is_numeric($_POST['budget'])) {
        echo number_format($_POST['budget']);
      };
      echo '<br>';
      //改行を実現する
      echo nl2br(htmlspecialchars($_POST['howto'], ENT_QUOTES));
      echo '<br>';
    ?>
  </body>
</html>
