<?php

$json_string = file_get_contents('db.json');

$list = json_decode($json_string);

header('Content-Type: application/json');

echo json_encode($list);