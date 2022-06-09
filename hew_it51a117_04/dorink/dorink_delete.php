<?php
require_once '../func.php';
$file=read_csv('dorink.csv');
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
<form action="dorink.php" method="get">
    <h1>削除</h1>
<table class="table01">
  <tbody>
    <h2>※以下のデータを削除します。</h2>
    <tr><th>名前</th><td><?php echo $file2[1]; ?></td></tr>
    <tr><th>価格</th><td><?php echo $file2[2]; ?>円</td></tr>
    <tr><th>詳細</th><td><?php echo $file2[3]; ?></td></tr>
  </tbody>
</table>
    <input type="hidden" name="delete" value="<?php echo $file2[0]; ?>">
    <div class="button_tab">
    <button type="button"><a href="dorink.php"><span>戻る</span></a><div class="liquid1"></div></button>
    <button type="submit" ><span>削除</span><div class="liquid"></div></button>
    </div>
</form>
</body>
</html>