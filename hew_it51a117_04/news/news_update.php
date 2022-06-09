<?php
require_once '../func.php';
$fail=read_csv('news.csv');
foreach($fail as $key => $fail1){
    if($fail[$key][0] == $_GET['id']){
        $fail2=$fail1;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/table.css">
    <title>変更画面</title>
</head>
<body>
<form action="news.php" method="post" enctype="multipart/form-data">
    <h1>変更</h1>
<table class="table01">
  <tbody>
    <p><input type="hidden" name="id" value="<?php echo $fail2[0]; ?>"></p>
    <tr><th>画像</th><td>
    <input type="file" name="img" accept="image/*">
    <image src="../img/<?php echo $fail2[1]; ?>"></td></tr>
    <tr><th>年月日</th><td><input name="num" size="100" type="date" value="<?php echo $fail2[2]; ?>"></input></td></tr>
    <tr><th>タイトル</th><td><input type="text" name="title"value="<?php echo $fail2[3]; ?>" ></td></tr>
    <tr><th>詳細</th><td><textarea type="text"name="setumei" rows=”3″ cols=”50″ wrap=”hard”><?php echo $fail2[4]; ?></textarea></td></tr>
  </tbody>
</table>
    <div class="button_tab">
    <button type="submit"><a href="news.php"><span>戻る</span></a><div class="liquid1"></div></button>
    <button type="submit" name="update"><span>変更</span><div class="liquid"></div></button>
    </div>
</form>
</body>
</html>