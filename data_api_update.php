<?php
    // headers
    
    header("Content-Type: application/json");
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: PUT");
    header("Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Origin,Access-Control-Allow-Methods,Authorization,X-Requested-With");
    

    $data = json_decode(file_get_contents("php://input"),true);
    
    $id = $data['id'];
    $name = $data['name'];
    $email = $data['email'];

    include "../database.php";
    $sql = "UPDATE `data` SET `name` = '{$name}', `email` = '{$email}' WHERE `data`.`id` = {$id};
    ";
    if($result = mysqli_query($conn,$sql)){
        $arr = array("message" => "Data Updated Successfully.", "Status" => true);
        echo json_encode($arr);
    }else{
        $arr = array("message" => "Data Not Updated.", "Status" => false);
        echo json_encode($arr);
    }
?>