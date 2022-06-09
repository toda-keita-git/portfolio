<?php
//（2）$_FILEに情報があれば（formタグからpost送信されていれば）以下の処理を実行する
if(!empty($_FILES)){
 
  //（3）$_FILESからファイル名を取得する
  $filename = $_FILES['image']['name'];
   
  //（4）$_FILESから保存先を取得して、images_after（ローカルフォルダ）に移す
  //move_uploaded_file（第1引数：ファイル名,第2引数：格納後のディレクトリ/ファイル名）
  $uploaded_path = '../img/'.$filename;
  //echo $uploaded_path.'<br>';
   
  move_uploaded_file($_FILES['image']['tmp_name'],$uploaded_path);
}

$fp=fopen('ramen.csv','r');
$id=0;
while($row=fgets($fp)){
  $row=explode(',',$row);
  if($id<$row[0]){
    $id=$row[0];
  }
}
fclose($fp);

$id++;
if(isset($_POST['register']) && $_POST['title'] && $_POST['name'] && $_POST['price'] && $_POST['setumei']){

  $fp=fopen('ramen.csv','a');
  $user=[];
  $user['id']=$id;
  $user['img']=$filename;
  $user['title']=$_POST['title'];
  $user['name']=$_POST['name'];
  $user['price']=$_POST['price'];
  $user['setumei']=$_POST['setumei'];
  fputs($fp,implode(',',$user)."\n");
  fclose($fp);

  header('location:ramen.php');
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
<form method="post" enctype="multipart/form-data">
  <h1>登録</h1>
<table class="table01">
  <tbody>
    <tr><th>商品画像</th>
    <td><input type="file" name="image" accept="image/*"></td></tr>
    <tr><th>商品種類</th><td><input type="text"name="title" ></td></tr>
    <tr><th>商品名</th><td><input type="text"name="name" ></td></tr>
    <tr><th>価格</th><td><input type="text"name="price" >円</td></tr>
    <tr><th>詳細</th><td><textarea type="text"name="setumei" rows=”3″ cols=”50″ wrap=”hard”></textarea></td></tr>
  </tbody>
</table>
    <div class="button_tab">
    <button type="button"><a href="ramen.php"><span>戻る</span></a><div class="liquid1"></div></button>
    <button type="submit" name="register"><span>登録</span><div class="liquid"></div></button>
    </div>    
</form>
</body>
</html>