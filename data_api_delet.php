<?php
    // headers
    
    header("Content-Type: application/json");
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: DELETE");
    header("Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Origin,Access-Control-Allow-Methods,Authorization,X-Requested-With");
    

    $data = json_decode(file_get_contents("php://input"),true);
    
    $id = $data['id'];
    
    include "database.php";
    $sql = "DELETE FROM `data` WHERE `data`.`id` = {$id};
    ";
    if($result = mysqli_query($conn,$sql)){
        $arr = array("message" => "Data Deleted Successfully.", "Status" => true);
        echo json_encode($arr);
    }else{
        $arr = array("message" => "Data Not Deleted.", "Status" => false);
        echo json_encode($arr);
    }
?>