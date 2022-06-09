<?php
require_once '../func.php';
if(isset($_GET['update']) && $_GET['name'] && $_GET['price']){
    $fail=read_csv('taste.csv');
    foreach($fail as $key => $fail1){
        if($fail[$key][0] == $_GET['id']){
            $fail4=$fail1;
        }
    }
    foreach($fail4 as $fail5){
        update_csv('taste.csv',$fail4[0],1,$_GET['name']);
        update_csv('taste.csv',$fail4[0],2,$_GET['price']);
    }
}
if(isset($_GET['delete'])){
    delete_csv('taste.csv',$_GET['delete']);
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/table.css">
    <title>味変一覧</title>
</head>
<body>
<form method="get">
<h1>味変一覧</h1>
<table class="table01">
  <tbody>
    <tr>
    <th></th>
    <td>名前</td>
    <td>価格</td>
    <td class="up">変更・削除</td>
    </tr>
    <?php
    $msg=read_csv('taste.csv');
    foreach($msg as $key => $list){
    ?>
    <tr>
    <th><?php echo $list[0]; ?></th>
    <td><?php echo $list[1]; ?></td>
    <td><?php echo $list[2],'円'; ?></td>
    <td> <div class="button008"><a class="date" href="taste_update.php?id=<?php echo $list[0];?>">変更</a> </div><div class="button008"><a class="date1" href="taste_delete.php?id=<?php echo $list[0];?>">削除</a></div> </td>
    </tr>
    <?php } ?> 
  </tbody>
</table>
    <div class="button_tab">
    <button type="button" ><a href="../manager/manager.php" class="manager"><span>管理者画面</span></a><div class="liquid1"></div></button>
    <button type="button" ><a href="taste_register.php" class="register"><span>登録画面</span></a><div class="liquid"></div></button>
    </div>
</form>
</body>
</html>