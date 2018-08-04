<?php
require_once('../_includes.php');

$obj_store = new \GDS\Store('User');
$sql = "SELECT * FROM User";
$arr_posts = $obj_store->query($sql)->fetchAll();

header('Content-Type:application/json;');
// print_r($arr_posts);
$res=array();$i=0;
foreach($arr_posts as $data){
    $res[$i]['id']=$data->getKeyId();
    $res[$i]['nama']=$data->nama;
    $res[$i]['alamat']=$data->alamat;
    $res[$i]['email']=$data->email;
    $res[$i]['nomorHp']=$data->nomorHp;
    $i++;
}


echo json_encode ($res);