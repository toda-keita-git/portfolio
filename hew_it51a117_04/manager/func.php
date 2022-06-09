<?php
//引数で指定されたファイル(csv)から取得した値を二次元配列で戻す。
function read_csv($fail_name){
    $list=[];
    $fp=fopen($fail_name,'r');
    while($msg = fgets($fp)){
    $msg=str_replace("\r",'',$msg);
    $msg=str_replace("\n",'',$msg);
    $list[]=explode(',',$msg);
    }
    fclose($fp);
    return $list;
}

//引数２の内容を引数１のファイルに改行コードをつけて書き込む。
function create_csv($fail_name,$msg){
    $fp=fopen($fail_name,'a');
    fputs($fp,implode(',',$msg)."\n");
        fclose($fp);
}

//引数１のファイルからレコードを削除する。
//引数２で指定されたIDのレコードを削除。
function delete_csv($fail_name,$num){
    $fail2=[];
    $fail=read_csv($fail_name);
    foreach($fail as $key => $fail1){
    if($fail[$key][0] != $num){
    $fail2[]=$fail1;
    }else{
}}  $fp=fopen($fail_name,'w');
    if($fail2==''){
    }else{
    foreach($fail2 as $fail3){
    fputs($fp,implode(',',$fail3)."\n");
}}
    fclose($fp);
}
//引数１のファイルの内容を更新する。
//対象のデータは引数２で指定されたIDのレコードで、引数３で指定されたカラム。
//そのデータを引数４のデータで上書きする。
function update_csv($fail_name,$id,$num,$msg){
    $fail=read_csv($fail_name);
    foreach($fail as $key => $fail1){
    if($fail[$key][0] == $id){
        $fail[$key][$num] = "$msg";
    }else{
}}  $fp=fopen($fail_name,'w');
    foreach($fail as $fail2){
    fputs($fp,implode(',',$fail2)."\n");
}
    fclose($fp);
}

?>