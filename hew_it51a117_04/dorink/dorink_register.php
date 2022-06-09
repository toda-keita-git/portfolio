<?php
$fp=fopen('dorink.csv','r');
$id=0;
while($row=fgets($fp)){
  $row=explode(',',$row);
  if($id<$row[0]){
    $id=$row[0];
  }
}
fclose($fp);

$id++;
if(isset($_GET['register']) && $_GET['name'] && $_GET['price'] && $_GET['setumei']){

  $fp=fopen('dorink.csv','a');
  $user=[];
  $user['id']=$id;
  $user['name']=$_GET['name'];
  $user['price']=$_GET['price'];
  $user['setumei']=$_GET['setumei'];
  fputs($fp,implode(',',$user)."\n");
  fclose($fp);

  header('location:dorink.php');
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/table.css">
    <title>登録画面</title>
</head>
<body>
<form method="get">
  <h1>登録</h1>
<table class="table01">
  <tbody>
    <tr><th>名前</th><td><input type="text"name="name" ></td></tr>
    <tr><th>価格</th><td><input type="text"name="price" >円</td></tr>
    <tr><th>詳細</th><td><textarea type="text"name="setumei" rows=”3″ cols=”50″ wrap=”hard”></textarea></td></tr>
  </tbody>
</table>
    <div class="button_tab">
    <button type="button"><a href="dorink.php"><span>戻る</span></a><div class="liquid1"></div></button>
    <button type="submit" name="register"><span>登録</span><div class="liquid"></div></button>
    </div>    
</form>
</body>
</html>