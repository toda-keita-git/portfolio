<?php

require_once './func.php';

$msg='';
if(!empty($_GET)){
    $ramen=[];
    if($_GET['ramen']=='pistol'){
        $ramen[]=$_GET['ramen'];
    }
    elseif($_GET['ramen']=='rusted_blade'){
        $ramen[]=$_GET['ramen'];
    }
    elseif($_GET['ramen']=='peace'){    
        $ramen[]=$_GET['ramen'];
    }
    elseif($_GET['ramen']=='freedom'){    
        $ramen[]=$_GET['ramen'];
    }

create_csv('umeda.csv',$ramen);
$msg='投票完了';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>梅田店 人気投票</title>
</head>
<body>
    <p><?php echo $msg;?></p>
</body>
</html>