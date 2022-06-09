<?php
require_once '../func.php';
$file=read_csv('ramen.csv');
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
<form action="ramen.php" method="get">
    <h1>削除</h1>
    <h2>※以下のデータを削除します。</h2>
<table class="table01">
  <tbody>
    <p><input type="hidden" name="id" value="<?php echo $file2[0]; ?>"></p>
    <tr>
    <th><?php echo $file2[0]; ?></th>
    <td class="table01-img"><image src="../img/<?php echo $file2[1]; ?>"  class="separator" width=200px></td>
    <td class="td">
    <ul>    
    <li>商品種類：<?php echo $file2[2]; ?></li>
    <li>商品名：<?php echo $file2[3]; ?></li>
    <li>価格：<?php echo $file2[4],'円'; ?></li>
    <li>詳細：<?php echo $file2[5]; ?></li>
    </ul>
    </td>
    </tr>
  </tbody>
</table>
    <input type="hidden" name="delete" value="<?php echo $file2[0]; ?>">
    <div class="button_tab">
    <button type="button"><a href="ramen.php"><span>戻る</span></a><div class="liquid1"></div></button>
    <button type="submit" ><span>削除</span><div class="liquid"></div></button>
    </div>
</form>
</body>
</html>