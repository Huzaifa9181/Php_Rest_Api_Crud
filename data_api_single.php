<?php

// headers

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

$data = json_decode(file_get_contents("php://input"),true);

$id = $data['id'];
    include "database.php";
    $sql = "SELECT * FROM `data` Where id = {$id}";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) > 0){
        $data = mysqli_fetch_all($result,MYSQLI_ASSOC);
        echo $json = json_encode($data,JSON_PRETTY_PRINT);
    }else{
        $arr = array("message" => "No result found.", "Status" => false);
        echo json_encode($arr);
    }
?>