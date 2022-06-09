<?php
require_once '../func.php';
$fail=read_csv('otumami.csv');
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
<form action="otumami.php" method="get">
<h1>変更</h1>
<table class="table01">
  <tbody>
    <input type="hidden" name="id" value="<?php echo $fail2[0]; ?>">
    <tr><th>名前</th><td><input type="text" name="name" value="<?php echo $fail2[1]; ?>" ></td></tr>
    <tr><th>価格</th><td><input type="text" name="price" value="<?php echo $fail2[2]; ?>" >円</td></tr>
  </tbody>
</table>
    <div class="button_tab">
    <button type="submit"><a href="otumami.php"><span>戻る</span></a><div class="liquid1"></div></button>
    <button type="submit" name="update"><span>変更</span><div class="liquid"></div></button>
    </div>
</form>
</body>
</html>