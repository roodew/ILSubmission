<?php
 
$title = '株式会社インフィニットループのオリジナルキャラクターあいえるたんの好きな飲み物はどれ？';
 
$question = array();
$question = array('コーラ','お茶','スポーツ飲料','りんごジュース');
 
$answer = $question[0];
 
shuffle($question);
 
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>簡易クイズプログラム</title>
</head>
<body>
 
<h2><?php echo $title ?></h2>
<form method="POST" action="answer.php">
   <?php foreach($question as $value){ ?>
   <input type="radio" name="question" value="<?php echo $value; ?>" /> <?php echo $value; ?><br>
   <?php } ?>
   <input type="hidden" name="answer" value="<?php echo $answer ?>">
   <input type="submit" value="回答する">
</form>
 
</body>
</html>