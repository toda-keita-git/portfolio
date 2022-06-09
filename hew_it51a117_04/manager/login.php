<?php
$fp=fopen('login.csv','r');

while($msg=fgets($fp)){
    $msg=str_replace("\r",'',$msg);
    $msg=str_replace("\n",'',$msg);
    $list[]=explode(',',$msg);
}

fclose($fp);

$msg1='';
$msg2='';
$msg3='';
if(isset($_GET['state']) && $_GET['state']=='input'){
  if($_GET['id']==''){
    $msg1='未入力です';
  }else{
  }
}
if(isset($_GET['state']) && $_GET['state']=='input'){
  if($_GET['password']==''){
    $msg2='未入力です';
  }else{
  }
}
if(isset($_GET['state']) && $_GET['state']=='input'){
foreach($list as $msg){
  if($msg[0]===$_GET['id'] && $msg[1]===$_GET['password']){
    echo header('location:manager.php');
    exit;
  }else{
  }}$msg3='ログインできません';}
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/login.css">
    <title>ログイン画面</title>
</head>
<body>
<form method="get">
<div class="login">
<h1>ログイン画面</h1>
    <p class="error"><?php echo $msg1; ?></p>
    <p>ログインID</p><input type="text"name="id" placeholder="4文字">
    <p class="error"><?php echo $msg2; ?></p>
    <p>パスワード</p><input type="password"name="password" placeholder="8文字">
    <p class="error" id="error_login"><?php echo $msg3; ?></p>
    <button type="submit" name="state" value="input" class="btn btn-primary btn-block btn-large">ログイン</button><br>
    <button type="submit" class="btn btn-primary btn-block btn-large"><a href="../index.php">ホームページへ</a></button>
</form>
</div>
</body>
</html>