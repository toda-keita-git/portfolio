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


$fp=fopen('news.csv','r');
$id=0;
while($row=fgets($fp)){
  $row=explode(',',$row);
  if($id<$row[0]){
    $id=$row[0];
  }
}
fclose($fp);

$id++;
if(isset($_POST['register']) && $_POST['title'] && $_POST['num'] && $_POST['setumei']){

  $fp=fopen('news.csv','a');
  $user=[];
  $user['id']=$id;
  $user['img']=$filename;
  $user['num']=$_POST['num'];
  $user['title']=$_POST['title'];
  $user['setumei']=$_POST['setumei'];
  fputs($fp,implode(',',$user)."\n");
  fclose($fp);

  header('location:news.php');
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
    <tr><th>画像
    </th><td><input type="file" name="image" accept="image/*"></td></tr>
    <tr><th>年月日</th><td><input name="num" size="100" type="date" value="<?php echo date('Y-m-d'); ?>"></input></td></tr>
    <tr><th>タイトル</th><td><input type="text"name="title"></td></tr>
    <tr><th>詳細</th><td><textarea type="text"name="setumei" rows=”3″ cols=”50″ wrap=”hard”></textarea></td></tr>
  </tbody>
</table>
    <div class="button_tab">
    <button type="button"><a href="news.php"><span>戻る</span><div class="liquid1"></div></button>
    <button type="submit" name="register"><span>登録</span><div class="liquid"></div></button>
    </div>    
</form>
</body>
</html>