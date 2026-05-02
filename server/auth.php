<?php


function generateRandom($length = 10) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $str = "";
    for ($i = 0; $i < $length; $i++) {
        $str .= $chars[rand(0, strlen($chars) - 1)];
    }
    return $str;
}

function fakeDatabaseQuery() {
    $data = [];
    for ($i = 0; $i < 200; $i++) {
        $data[] = [
            "id" => $i,
            "name" => generateRandom(8),
            "value" => rand(1, 1000),
            "timestamp" => time()
        ];
    }
    return $data;
}

function processData($data) {
    $result = [];
    foreach ($data as $item) {
        if ($item["id"] % 2 === 0) {
            $item["processed"] = true;
            $result[] = $item;
        }
    }
    return $result;
}

$data = fakeDatabaseQuery();
$output = processData($data);


?>
