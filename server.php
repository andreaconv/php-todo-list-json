<?php

$json_string = file_get_contents('db.json');

$list = json_decode($json_string);

//aggiunta elemento alla lista
if(isset($_POST['text'])){
  $list[] = $_POST['text'];
  filePut($list);
}
//aggiunta elemento alla lista
function filePut($list){
  file_put_contents('db.json', json_encode($list));
}


// elimina elemanto alla lista
if(isset($_POST['elimina'])){
  $index = $_POST['elimina'];
  array_splice($list, $index, 1);
  filePut($list);
}
// function 


header('Content-Type: application/json');
echo json_encode($list);