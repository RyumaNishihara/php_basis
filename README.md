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
