<?php
require_once('_includes.php');

$obj_store = new \GDS\Store('User');

$data = json_decode(file_get_contents('php://input'), true);
// print_r($data);
// echo $data["id"];


//eg the ID : 
$id = $data["id"];
$nama = $data["nama"];
$alamat = $data["alamat"];
$nomorHp = $data["nomorHp"]

//get the record :
$obj = $obj_store->fetchById($id);
		
//assign new datastore value;
//or choose custom field
$obj->nama = $nama;

// Insert into the Datastore
$obj_store->upsert($obj);

if ($obj->getKeyId()){
    echo json_encode ($obj->getKeyId());
}
else {
    echo 'gagal';
}