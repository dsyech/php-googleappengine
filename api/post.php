<?php
require_once('../_includes.php');

$obj_store = new \GDS\Store('User');


$data = json_decode(file_get_contents('php://input'), true);
// print_r($data);
// echo $data["nama"];


$resp= array (
    'result'=>false,
    'msg'=>'posting data'
);

$obj_user = $obj_store->createEntity([
    'nama' => $data["nama"],
    'alamat' => $data["alamat"],
    'email' => $data["email"],
    'nomorHp' => $data["nomorHp"]
]);

// // Insert into the Datastore
$obj_store->upsert($obj_user);

if ($obj_user->getKeyId()){
    echo json_encode ($obj_user->getKeyId());
}
else {
    echo 'gagal';
}