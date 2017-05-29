index.php

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
</head>
<body>
  <form method="POST" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>">
  <input type="text" name="name" placeholder="名前"><br>
  <input type="text" name="comment" placeholder="コメント">
  <input type="hidden" name="otp" value="<?PHP print md5(microtime());?>">
  <input type="submit" value="投稿">
  </form>

<?php

ini_set( 'display_errors', 1 );
$user = '';//ユーザ名
$password = '';//パスワード
$dbName = '';//データベース名
$host = '';//ホスト名

$dsn = "mysql:host={$host};dbname={$dbName};charset=utf8";

$otp = filter_input(INPUT_POST,"otp");
$name = filter_input(INPUT_POST,"name");
$comment = filter_input(INPUT_POST,"comment");

try {
  $pdo = new PDO($dsn, $user, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
  if(!is_null($otp)){
    $sql = "INSERT INTO テーブル名 (name,comment,otp) VALUES (?,?,?)";
    $stm = $pdo->prepare($sql);
    $data=[$name,$comment,$otp];
    if($stm->execute($data)){
      echo 'データ追加にエラーがありました';
    }
  }
  $sql = "SELECT * FROM テーブル名 ORDER BY id DESC LIMIT 10";
  $stm = $pdo->query($sql);
  $result = $stm->fetchAll();
  foreach ($result as $row) {
    echo "<div>";
    echo $row['id'].")";
    echo htmlspecialchars($row['name']);
    echo htmlspecialchars($row['comment']);
    echo "<form method='POST' action=''>
          <input type='submit' value''>
          </form>";
    echo "</div>";
  }
} catch (Exception $e) {
  echo '表示にエラーがありました。<br>';
  echo $e->getMessage();
}

?>
</body>
</html>

