# php_basis

PHP 基礎学習

$a = 5;
$b = 2;
$answer = $a + $b;
echo $answer;

$c = "いちばんわかりやすい";
$d = "PHP";
// 文字列結合演算子
echo $c . $d;

// ダブクエとシンクエの違い
$f = "サンプル";
  echo "ダブルクオテーション$f";
echo 'シングルクオテーション$f';

// 配列
$fruits = ['りんご', "メロン$f", 'オレンジ'];
echo $fruits[1];

$home = ['addres' => '沖縄県', 'addres2' => '大阪' ];
echo $home['addres'];

      if ($_POST['category'] == '1') echo '和食';
      if ($_POST['category'] == '2') echo '洋食';
      if ($_POST['category'] == '3') echo '中華';
      echo '<br>';
      if ($_POST['difficulty'] == '1') {
        echo '簡単';
      } elseif ($_POST['difficulty'] == '2') {
        echo '普通';
      } else {
        echo '難しい';
      }
