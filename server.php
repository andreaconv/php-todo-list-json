<?php

$json_string = file_get_contents('db.json');

$list = json_decode($json_string);

if(isset($_POST['text'])){
  $list[] = $_POST['text'];
  filePut($list);
}

function filePut($list){
  file_put_contents('db.json', json_encode($list));
}


header('Content-Type: application/json');

echo json_encode($list);