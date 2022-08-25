<?php
    // headers
    
    header("Content-Type: application/json");
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Origin,Access-Control-Allow-Methods,Authorization,X-Requested-With");
    

    $data = json_decode(file_get_contents("php://input"),true);
    
    $name = $data['name'];
    $email = $data['email'];

        include "database.php";
        $sql = "INSERT INTO `data` (`name`, `email`) VALUES ('{$name}', '{$email}');";
        if($result = mysqli_query($conn,$sql)){
            $arr = array("message" => "Data Inserted Successfully.", "Status" => true);
            echo json_encode($arr);
        }else{
            $arr = array("message" => "Data Not Inserted.", "Status" => false);
            echo json_encode($arr);
        }
?>