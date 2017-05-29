<?php
 
$question = $_POST['question'];
$answer = $_POST['answer'];

if($question == $answer){
	$result = "正解！";
}else{
	$result = "不正解･･･";
}
 
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>簡易クイズプログラム - 結果</title>
</head>
<body>
 
<h2>クイズの結果</h2>
<?php echo $result ?>
 
</body>
</html>