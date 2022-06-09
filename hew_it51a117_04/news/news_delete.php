<?php
require_once '../func.php';
$file=read_csv('news.csv');
foreach($file as $key => $file1){
    if($file[$key][0] == $_GET['id']){
        $file2=$file1;
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
    <title>削除画面</title>
</head>
<body>
<form action="news.php" method="get">
    <h1>削除</h1>
<table class="table01">
  <tbody>
    <h2>※以下のデータを削除します。</h2>
    <input type="hidden" name="id" value="<?php echo $fail2[0]; ?>">
    <tr><th>画像</th><td><image src="../img/<?php echo $file2[1]; ?>"></td></tr>
    <tr><th>年月日</th><td><?php echo $file2[2]; ?></td></tr>
    <tr><th width="100px">タイトル</th><td><?php echo $file2[3]; ?></td></tr>
    <tr><th>詳細</th><td><?php echo $file2[4]; ?></td></tr>
  </tbody>
</table>
    <input type="hidden" name="delete" value="<?php echo $file2[0]; ?>">
    <div class="button_tab">
    <button type="button"><a href="news.php"><span>戻る</spa></a><div class="liquid1"></div></button>
    <button type="submit" ><span>削除</span><div class="liquid"></div></button>
    </div>
</form>
</body>
</html>