<?php
require_once '../func.php';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/inquiry.css">
    <title>お問い合わせ</title>
</head>
<body>
<h1>お問い合わせ</h1>
<div class="div">
    <div>
    <h2>その他</h2>
<table class="table01">
  <tbody>
    <tr>
    <th></th>
    <th></th>
    <td>年月日</td>
    <td>名前</td>
    <td>メールアドレス</td>
    <td>電話番号</td>
    <td>住所</td>
    <td>お問い合わせ内容</td>
    <td></td>
    </tr>
    <?php
    $msg=read_csv('inquiry.csv');
    foreach($msg as $key => $list){
    ?>
    <tr>
    <th>既読</th>
    <th><?php echo $list[0]; ?></th>
    <td><?php echo $list[1]; ?></td>
    <td><?php echo $list[2]; ?></td>
    <td><?php echo $list[3]; ?></td>
    <td><?php echo $list[4]; ?></td>
    <td><?php echo $list[5]; ?></td>
    <td><?php echo $list[6]; ?></td>
    <td>📩</td>
    </tr>
    <?php } ?>
  </tbody>
</table>
    </div>
    <div>
    <h2>取材・メディア掲載</h2>
<table class="table01">
  <tbody>
    <tr>
    <th></th>
    <th></th>
    <td>年月日</td>
    <td>名前</td>
    <td>メールアドレス</td>
    <td>電話番号</td>
    <td>住所</td>
    <td>お問い合わせ内容</td>
    <td></td>
    </tr>
    <?php
    $msg=read_csv('inquiry1.csv');
    foreach($msg as $key => $list){
    ?>
    <tr>
    <th>未読</th>
    <th><?php echo $list[0]; ?></th>
    <td><?php echo $list[1]; ?></td>
    <td><?php echo $list[2]; ?></td>
    <td><?php echo $list[3]; ?></td>
    <td><?php echo $list[4]; ?></td>
    <td><?php echo $list[5]; ?></td>
    <td><?php echo $list[6]; ?></td>
    <td>📩</td>
    </tr>
    <?php } ?>
  </tbody>
</table>
    </div>
    </div> 
    <button ><a href="../manager/manager.php" class="manager"><span>管理者画面</span></a><div class="liquid"></div></button>
</body>
</html>