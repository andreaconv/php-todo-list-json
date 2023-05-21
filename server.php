<?php

$json_string = file_get_contents('db.json');

$list = json_decode($json_string, true);

//aggiunta elemento alla lista
if(isset($_POST['item'])){
  $new_item = [
    'text' => $_POST['item'],
    'done' => false
  ];
  $list[] = $new_item;
  // mi serve con l'invio senza formdata
  // $json_string = json_encode($list, true);
  filePut($list);
}
//aggiunta elemento alla lista
function filePut($list){
  file_put_contents('db.json', json_encode($list, JSON_PRETTY_PRINT));
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