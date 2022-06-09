<?php
require_once '../func.php';
if(isset($_POST['update']) && $_POST['title'] && $_POST['name'] && $_POST['price'] && $_POST['setumei']){
    $fail=read_csv('ramen.csv');
    foreach($fail as $key => $fail1){
        if($fail[$key][0] == $_POST['id']){
            $fail4=$fail1;
        }
    }
    if(!empty($_FILES)){
        //（3）$_FILESからファイル名を取得する
        $filename = $_FILES['img']['name'];
         
        //（4）$_FILESから保存先を取得して、images_after（ローカルフォルダ）に移す
        //move_uploaded_file（第1引数：ファイル名,第2引数：格納後のディレクトリ/ファイル名）
        $uploaded_path = '../img/'.$filename;
        //echo $uploaded_path.'<br>';
         
        move_uploaded_file($_FILES['img']['tmp_name'],$uploaded_path);
    }
    foreach($fail4 as $fail5){
        update_csv('ramen.csv',$fail4[0],1,$filename);
        update_csv('ramen.csv',$fail4[0],2,$_POST['title']);
        update_csv('ramen.csv',$fail4[0],3,$_POST['name']);
        update_csv('ramen.csv',$fail4[0],4,$_POST['price']);
        update_csv('ramen.csv',$fail4[0],5,$_POST['setumei']);
    }
}
if(isset($_GET['delete'])){
    delete_csv('ramen.csv',$_GET['delete']);
}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/table.css">
    <title>ラーメン一覧</title>
</head>
<body>
<form method="get">
<h1>ラーメン一覧</h1>
<table class="table01">
  <tbody>
    <?php
    $msg=read_csv('ramen.csv');
    foreach($msg as $key => $list){
    ?>
    <tr>
    <th><?php echo $list[0]; ?></th>
    <td class="table01-img"><image src="../img/<?php echo $list[1]; ?>"  class="separator" width=200px></td>
    <td class="td">
    <ul>    
    <li>商品種類：<?php echo $list[2]; ?></li>
    <li>商品名：<?php echo $list[3]; ?></li>
    <li>価格：<?php echo $list[4],'円'; ?></li>
    <li>詳細：<?php echo $list[5]; ?></li>
    </ul>
    </td>
    <td><div class="button008"> <a class="date" href="ramen_update.php?id=<?php echo $list[0];?>"><span>変更</span></a></div> <div class="button008"><a class="date1" href="ramen_delete.php?id=<?php echo $list[0];?>"><span>削除</span></a></div></td>
    </tr>
    <?php } ?> 
  </tbody>
</table>
    <div class="button_tab">
    <button type="button" ><a href="../manager/manager.php" class="manager"><span>管理者画面</span></a><div class="liquid1"></div></button>
    <button type="button" ><a href="ramen_register.php" class="register"><span>登録画面</span></a><div class="liquid"></div></button>    
    </div>
</form>
</body>
</html>