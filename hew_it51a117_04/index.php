<?php
require_once './func.php';

$fp=fopen('./inquiry/inquiry1.csv','r');
$id=0;
while($row=fgets($fp)){
  $row=explode(',',$row);
  if($id<$row[0]){
    $id=$row[0];
  }
}
fclose($fp);

$id++;
$num='送信できませんでした';
if(isset($_GET['register']) && $_GET['naiyou'] == 'syuzai'  && $_GET['name'] && $_GET['mail'] && $_GET['contents']){
  $num='送信完了しました';

  $fp=fopen('./inquiry/inquiry1.csv','a');
  $user=[];
  $user['id']=$id;
  $user['num']=$_GET['num'];
  $user['name']=$_GET['name'];
  $user['mail']=$_GET['mail'];
  $user['number']=$_GET['number'];
  $user['address']=$_GET['address'];
  $user['contents']=$_GET['contents'];
  fputs($fp,implode(',',$user)."\n");
  fclose($fp);

}elseif(isset($_GET['register']) && $_GET['naiyou'] == 'syuzai'){
  $num='送信できませんでした';
}

$fp=fopen('./inquiry/inquiry.csv','r');
$id=0;
while($row=fgets($fp)){
  $row=explode(',',$row);
  if($id<$row[0]){
    $id=$row[0];
  }
}
fclose($fp);

$id++;
if(isset($_GET['register']) && $_GET['naiyou'] == 'ippan'  && $_GET['name'] && $_GET['mail'] && $_GET['contents']){
  $num='送信完了しました';

  $fp=fopen('./inquiry/inquiry.csv','a');
  $user=[];
  $user['id']=$id;
  $user['num']=$_GET['num'];
  $user['name']=$_GET['name'];
  $user['mail']=$_GET['mail'];
  $user['number']=$_GET['number'];
  $user['address']=$_GET['address'];
  $user['contents']=$_GET['contents'];
  fputs($fp,implode(',',$user)."\n");
  fclose($fp);

}elseif(isset($_GET['register']) && $_GET['naiyou'] == 'ippan'){
  $num='送信できませんでした';
}

//人気投票グラフ
$fp=fopen('umeda.csv','r');
while($msg=fgets($fp)){
    $msg=str_replace("\r",'',$msg);
    $msg=str_replace("\n",'',$msg);
    $name[]=explode(',',$msg);
}
foreach($name as $value){
    foreach($value as $value1){
        if($value1=='pistol'){
            $pistol[]=$value1;
        }elseif($value1=='rusted_blade'){
            $rusted_blade[]=$value1;
        }elseif($value1=='peace'){
            $peace[]=$value1;
        }elseif($value1=='freedom'){
            $freedom[]=$value1;
        }
    }
}
$pistol_count=count($pistol);
$rusted_blade_count=count($rusted_blade);
$peace_count=count($peace);
$freedom_count=count($freedom);

$sum = array($pistol_count,$rusted_blade_count,$peace_count,$freedom_count);

$sum1 = array_sum($sum);

$pistol_count=array("ピストル" => $pistol_count);
$rusted_blade_count=array("錆びた刀" => $rusted_blade_count);
$peace_count=array("平和" => $peace_count);
$freedom_count=array("自由" => $freedom_count);

$ramen=[$pistol_count,$rusted_blade_count,$peace_count,$freedom_count];
foreach($ramen as $ramen1){
  foreach($ramen1 as $ramen2){
    $ramen3[]=$ramen2;
  }
}
$max=max($ramen3);
fclose($fp);

foreach($pistol_count as $pistol_count1){
  $pistol_count2=$pistol_count1;
}
foreach($rusted_blade_count as $rusted_blade_count1){
  $rusted_blade_count2=$rusted_blade_count1;
}
foreach($peace_count as $peace_count1){
  $peace_count2=$peace_count1;
}
foreach($freedom_count as $freedom_count1){
  $freedom_count2=$freedom_count1;
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/destyle.css">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Modaal/0.4.4/css/modaal.min.css">
    <link rel="stylesheet" type="text/css" href="css/umeda_vote.css">
    <title>ラーメン大戦争 梅田店</title>
</head>
<body>
    <header id="header">
        <nav class="nav">
            <ul class="ul">
                <li class="li"><a href="#kodawari">3つのこだわり</a></li>
                <li class="li"><a href="#menu">メニュー</a></li>
                <li class="li"><a href="#news">NEWS</a></li>
                <li class="logo"  class="li"><a href="#top"><img src="./img/logo.png" class="logo1"></a></li>
                <li class="li"><a href="#ninki">人気投票</a></li>
                <li class="li"><a href="#acess">アクセス</a></li>
                <li class="li"><a href="#otoiawase">お問い合わせ</a></li>
            </ul>
        </nav>
    </header>
  <main>
  <div class="title"><span class="wrap-img"><img src="./img/ramen1.png" class="title_ramen"></span></div>
  <div data-aos="fade-up" data-aos-offset="400" data-aos-duration="12000">    
  <h1><img src="./img/logo1.jpg" class="logo_h1"></h1>
  </div>
      <div id="kodawari" data-aos="fade-up" data-aos-offset="400" data-aos-duration="20000" class="left">
      <article>
      <h2>3つのこだわり</h2>
        <div class="kodawari">
          <section class="kodawari1">
          <h3>チャーシュー</h3>
            <p>「イタリアにて松村（UNCHI株式会社代表）が一目惚れしたチャーシュー」を、どんぶりが隠れるほど贅沢にトッピング。
            産地より瞬間冷凍で直送しているお肉は、トロリと柔らかい上に濃厚な旨味が溢れ出します。</p>
            <p class="hexclip"><img src="./img/yume_chashu.png"></p>
          </section>
          <section class="kodawari1">
          <h3>鶏ガラスープ</h3>
            <p>日本三大地鶏の一つである「名古屋コーチン」。
            そんな日本最高級とも言える鶏ガラから、じっくりと旨味成分を引き出したスープを提供します。</p>
            <p class="hexclip"><img src="./img/torigara.png"></p>
          </section>
          <section class="kodawari1">
          <h3>店舗デザイン</h3>
            <p>内外装のデザインは、店舗ごとに異なるコンセプトで設計。
            いずれの店舗も男女問わずゆっくりと過ごすことが出来ます。</p>
            <p class="hexclip"><img src="./img/display_umeda.png"></p>
          </section>
        </div>
      </article>
      </div>
      <div data-aos="fade-up" data-aos-offset="400" data-aos-duration="12000" class="menuran">
      <article>
      <h2 id="menu" class="menu">メニュー</h2>
      <ul class="tab">
        <li><a href="#ramen">ラーメン</a></li>
        <li><a href="#arakaruto">アラカルト</a></li>
        <li><a href="#otumami">おつまみ</a></li>
        <li><a href="#topping">トッピング・替え玉</a></li>
        <li><a href="#dorink">ドリンク</a></li>
      </ul>
      <div id="ramen" class="area">
        <h3>ラーメン</h3>
        <div class="ramen_ul">
        <?php
        $msg=read_csv('./ramen/ramen.csv');
        foreach($msg as $key => $list){ 
        ?>
        <ul>
        <li><?php echo $list[2]; ?></li>
        <li><?php echo $list[3]; ?> <span class="money"><?php echo $list[4];?><span id="money">円</span></span></span></li>
        <li class="bgDU"><a href="#"><span class="mask"><img src="img/<?php echo $list[1];?>" ><span class="cap"><?php echo $list[5]; ?></span></span></a></li>
        </ul>
        <?php
        }
        ?>
        </div>
        </div>
        <div id="arakaruto" class="area">
        <h3>アラカルト</h3>
        <ul>
        <span>
        <?php
        $msg=read_csv('./arakaruto/arakaruto.csv');
        foreach($msg as $key => $list){ 
        ?>
        <li><?php echo $list[1]; ?> <span class="money"> <?php echo $list[2],'円'; ?></span></li>
        <?php
        }
        ?>
        </span>
        <li><img src="img/gyouza.jpg" alt=""></li>
        </ul>
        </div>
      <div id="otumami" class="area">
        <h3>おつまみ</h3>
        <ul>
        <span>
        <?php $msg=read_csv('./otumami/otumami.csv');
        foreach($msg as $key => $list){ 
        ?>
        <li><?php echo $list[1]; ?> <span class="money"> <?php echo $list[2],'円'; ?></span></li>
        <?php
        }
        ?>
        </span>
        <li><img src="img/nitamago.jpg"></li>
        </ul>
        </div>
      <div id="topping" class="area">
        <h3>トッピング・替玉</h3>
        <ul>
        <span>
        <?php 
        $msg=read_csv('./topping/topping.csv');
        foreach($msg as $key => $list){
        ?>
        <li><?php echo $list[1]; ?> <span class="money"> <?php echo $list[2],'円'; ?></span></li>
        <?php
        }
        ?>
        <?php 
        $msg=read_csv('./taste/taste.csv');
        foreach($msg as $key => $list){
        ?>
        <li><?php echo $list[1]; ?> <span class="money"> <?php echo $list[2],'円'; ?></span></li>
        <?php
        }
        ?>
        </span>
        <li><img src="img/kaedama.jpg"></li>
        </ul>
        </div>
      <div id="dorink" class="area">
        <h3>ドリンク</h3>
        <ul>
          <span>
          <?php
          $msg=read_csv('./dorink/dorink.csv');
          foreach($msg as $key => $list){
          ?>
          <li class="dorink_setumei"><?php echo $list[1]; ?> <span class="money"> <?php echo $list[2],'円'; ?></span></li>
          <li class="dorink_setumei"><?php echo $list[3]; ?></li><br>
          <?php
          }
          ?>
          </span>
          <li><img src="img/sutera.jpg"></li>
        </ul>
        </div>
      </div>
      </article>
      <div data-aos="fade-up" data-aos-offset="400" data-aos-duration="12000" >
      <article>
      <h2 id="news" class="news">NEWS</h2>
      <div class="info">  
      <?php
      $msg=read_csv('./news/news.csv');
      rsort($msg);
      foreach($msg as $key => $list){
      ?>
      <dl class="info-list1">
        <dt class="exampleClass_dt"><a href="#info<?php echo $key; ?>" class="info2" id="osirase<?php echo $key; ?>"><?php echo $list[2]; ?><span><?php echo $list[3]; ?></span></a></dt>
      </dl>
      <?php
      }
      ?>
      </div>
      <?php
      $msg=read_csv('./news/news.csv');
      rsort($msg);
      foreach($msg as $key => $list){
      ?>
      <section id="info<?php echo $key; ?>" class="hide-area">
      <h3><?php echo $list[2]; ?> <?php echo $list[3]; ?></h3>
      <?php if($list[1]!==''){ ?><image src="img/<?php echo $list[1]; ?>" width=500  class="news_img"><?php } ?>
      <p><?php echo $list[4]; ?></p>
      </section>
      <?php
      }
      ?>
      </article>
      </div>
      <div data-aos="fade-up" data-aos-offset="400" data-aos-duration="12000" >
      <article>
      <h2 id="ninki">人気投票</h2>
      <p class="ninki">4つのラーメンの中から1つ、美味しいと思ったラーメンを店内で投票していただきます。(投票は自由です。)<br>投票期間が1ヶ月間で季節ごとに、春は4月・夏は7月・秋は10月・冬は1月の計4回イベントをしています。<br>投票の合計が1ヶ月で3000回以上、投票されたラーメンの中で<span class="hangaku">1位になったラーメンが200円引き</span>になります。<br>開催月の次月の10日～15日に来店して頂いたお客様が上記の対象になります。<br><br>※投票の合計が1ヶ月で3000回未満なら200円引きされない。</p>
      <div class="box_step05">
        <ul>
          <li class="active">
            <span>お店でラーメン注文</span>
          </li>
          <li>
            <span>会計時にQRコードをかざす</span>
          </li>
          <li>
            <span>投票完了</span>
          </li>
        </ul>
      </div>
      <ul class="nagare">
        <li>
        <img src="img/QR1.jpg">
        <p>ラーメンを注文して美味しいと思って頂けたら、お会計に行く前にテーブル上にある食べたラーメンと同じ名前のQRコードが書かれた紙を取って頂きます。</p>
        </li>
        <li>
        <img src="img/QR2.jpg">
        <p>レジの前にある上記のようなQRコード読み取り機に先ほど取ったQRコードが書かれた紙をかざして頂きます。</p>
        </li>
        <li>
        <img src="img/QR3.jpg">
        <p>QRコードが正しく読み取れていたら上記のような画面が出ます。読み取れない場合は店員にお申し付けください。</p>
        </li>
      </ul>
      <ul class="info-list">
      <li><button class="exampleClass"><a href="#info-1" class="info1">現在の状況はこちら</a></button><!--リンク先は表示させたいエリアのid名を指定-->
      </ul>
      <section id="info-1" class="hide-area"><!--表示エリアのHTML。id名にリンク先と同じ名前を指定。非表示にするためhide-areaというクラス名も指定。-->
      <h3 class="sum">合計票数:<?php echo $sum1; ?></h3>
    <div class="chart-container">
    <div class="base"></div>
    <p class="meter"></p>
    <table>
      <tr class="num_max">
      <th <?php if($pistol_count2 == $max){ echo "class='confetti'"; } ?>><?php if($pistol_count2 == $max){ echo "1位"; } ?></th>
      <th <?php if($rusted_blade_count2 == $max){ echo "class='confetti'"; } ?>><?php if($rusted_blade_count2 == $max){ echo "1位"; } ?></th>
      <th <?php if($peace_count2 == $max){ echo "class='confetti'"; } ?>><?php if($peace_count2 == $max){ echo "1位"; } ?></th>
      <th <?php if($freedom_count2 == $max){ echo "class='confetti'"; } ?>><?php if($freedom_count2 == $max){ echo "1位"; } ?></th>
        <?php
        foreach($ramen as $key => $ramen1){
            foreach($ramen1 as $key1 => $ramen2){
        ?>
    <td class="bar_one"  height="<?php  echo num2per($ramen1["ピストル"], $sum1, 1); ?>%"></td>   
    <td class="bar_two"  height="<?php  echo num2per($ramen1["錆びた刀"], $sum1, 1); ?>%"></td>   
    <td class="bar_three"  height="<?php  echo num2per($ramen1["平和"], $sum1, 1); ?>%"></td>
    <td class="bar_four"  height="<?php  echo num2per($ramen1["自由"], $sum1, 1); ?>%"></td>
        <?php
            }
        }
        ?>
      </tr>
    </table>
    </div>
    <div class="ramen">
    <p class="ramen_one_num"><?php echo $ramen[0]["ピストル"]; ?></p>
    <p class="ramen_two_num"><?php echo $ramen[1]["錆びた刀"]; ?></p>
    <p class="ramen_three_num"><?php echo $ramen[2]["平和"]; ?></p>
    <p class="ramen_four_num"><?php echo $ramen[3]["自由"]; ?></p>
    </div>
    <div class="ramen">
    <p class="ramen_one">
    <?php
    foreach($ramen as $key => $ramen1){
        foreach($ramen1 as $key1 => $ramen2){
    ?>
    <?php if($key1=="ピストル"){ echo $key1;} ?>
    <?php
        }
    }
    ?>
    </p>
    <p class="ramen_two">
    <?php
    foreach($ramen as $key => $ramen1){
        foreach($ramen1 as $key1 => $ramen2){
    ?>
    <?php if($key1=="錆びた刀"){ echo $key1;} ?>
    <?php
        }
    }
    ?>
    </p>
    <p class="ramen_three">
    <?php
    foreach($ramen as $key => $ramen1){
        foreach($ramen1 as $key1 => $ramen2){
    ?>
    <?php if($key1=="平和"){ echo $key1;} ?>
    <?php
        }
    }
    ?>
    </p>
    <p class="ramen_four">
    <?php
    foreach($ramen as $key => $ramen1){
        foreach($ramen1 as $key1 => $ramen2){
    ?>
    <?php if($key1=="自由"){ echo $key1;} ?>
    <?php
        }
    }
    ?>
    </p>
    </div>
      </section>
      </article>
      </div>
      <div data-aos="fade-up" data-aos-offset="400" data-aos-duration="12000" >
      <article>
      <h2 id="acess">アクセス</h2>
      <div class="acess">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3280.0219628495206!2d135.50052291508322!3d34.70462598043355!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6000e7423e9558eb%3A0x8889d9f063233f5b!2z44Op44O844Oh44Oz5aSn5oim5LqJIOaiheeUsOW6lw!5e0!3m2!1sja!2sjp!4v1645059567201!5m2!1sja!2sjp"  class="tizu" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
      <dl class="acess_dl">
        <div class="acess_risuto" id="acess_risuto"><dt class="risuto">住所</dt><dd class="acess_dd">〒530-0027<br>
        大阪市北区堂山町15番14号</dd></div>
        <div class="acess_risuto"><dt class="risuto">アクセス</dt><dd class="acess_dd">阪急線 梅田駅 徒歩8分<br>
        阪神 梅田駅 徒歩10分<br>
        JR 大阪駅 徒歩10分<br>
        地下鉄御堂筋線 梅田駅 徒歩10分<br>
        地下鉄谷町線 中崎町駅「4番出口」 徒歩3分</dd></div>
        <div class="acess_risuto"><dt class="risuto">電話番号</dt><dd class="acess_dd">06-6241-3030</dd></div>
        <div class="acess_risuto"><dt class="risuto">営業時間</dt><dd class="acess_dd">11:00～23:00（LO 22:30）</dd></div>
        <div class="acess_risuto"><dt class="risuto">定休日</dt><dd class="acess_dd">なし（臨時休業する場合がございます）</dd></div>
      </dl>
      </div>
      </article>
      </div>
      <div data-aos="fade-up" data-aos-offset="400" data-aos-duration="12000">
      <article>
      <h2 id="otoiawase">お問い合わせ</h2>
      <div class="otoiawase">
      <form method="get">
      <dl class="otoiawase_dl">
        <div class="otoiawase_div">
          <dt class="otoiawase_dt_syurui">ご用件</dt><dd class="otoiawase_dd_syurui"><input type="radio" name="naiyou" value="syuzai" id="naiyou_syuzai"><label for="naiyou_syuzai">取材・メディア掲載</label><input type="radio" name="naiyou" value="ippan" id="naiyou_ippan" checked><label for="naiyou_ippan">その他</label></dd>
        </div>
        <input name="num" class="date" type="date" value="<?php echo date('Y-m-d'); ?>"></input>
        <div class="otoiawase_div_name">
          <dt class="otoiawase_dt_name">名前<span class="otoiawase_tagu">必須</span></dt><dd class="otoiawase_dd"><input type="text"name="name"><?php if(isset($_GET['register']) && $_GET['name'] == ''){ ?><br><span class="error"><?php echo '入力されていません';}?></span></dd>
        </div>
        <div class="otoiawase_div">
          <dt class="otoiawase_dt">メールアドレス<span class="otoiawase_tagu">必須</span></dt><dd class="otoiawase_dd"><input type="text"name="mail"><?php if(isset($_GET['register']) && $_GET['mail'] == ''){?><br><span class="error"><?php echo '入力されていません';}?></span></dd>
        </div>
        <div class="otoiawase_div">
          <dt class="otoiawase_dt">電話番号<span class="otoiawase_tagu1">任意</span></dt><dd class="otoiawase_dd"><input type="text"name="number"></dd>
        </div>
        <div class="otoiawase_div">
          <dt class="otoiawase_dt">住所<span class="otoiawase_tagu1">任意</span></dt><dd class="otoiawase_dd"><input type="text"name="address"></dd>
        </div>
        <div class="otoiawase_div_naiyou">
          <dt class="otoiawase_dt_contens">お問い合わせ内容<span class="otoiawase_tagu">必須</span></dt><dd class="otoiawase_dd"><textarea type="text"name="contents" class="otoiawase_input" rows=”3″ cols=”50″ wrap=”hard”></textarea><br><span class="error1"><?php if(isset($_GET['register']) && $_GET['contents'] == ''){ echo '入力されていません';}?></span></dd>
        </div>
      </dl>
      <p class="button"><button type="submit" name="register" class="button1" width="300"><a  name="register" class="btn btn--orange btn--cubic btn--shadow">送信</a></button></p>
      <p class="num_error"><?php if(isset($_GET['register'])){ echo $num;}?></p>
      </form>
      </div>
      </article>
      </div>
</main>
<footer>
  <form class="sns">
  <p><input type="image" class="icon" src="./img/Twitter.png" width=50px formaction="https://twitter.com/daisensou_umeda?s=20&t=nnEUDji4H4caU-_OtcaUNg"></p>
  <p><input type="image" class="icon" src="./img/facebook.png" width=50px formaction="https://www.facebook.com/daisenso.umeda/"></p>
  <p><input type="image" class="icon" src="./img/instagram.png" width=50px formaction="https://www.instagram.com/daisensou_umeda/"></p>
  <p class="porisi">プライバシーポリシー</p>
  </form>
</footer>
</body>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Modaal/0.4.4/js/modaal.min.js"></script>
<script src="./js/add.js"></script>
<script src="./js/bdd.js"></script>
<script>
  AOS.init();
</script>
</html>