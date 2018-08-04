<?php
require_once('../_includes.php');

// print_r($_SERVER);

$obj_store = new \GDS\Store('User');

$id = $_GET['id'];

//get the record :
$obj = $obj_store->fetchById($id);
//delete the record
$obj_store->delete($obj);

if ($obj->getKeyId()){
    echo json_encode ($obj->getKeyId());
}
else {
    echo 'gagal';
}