<?php
    // headers
    
    header("Content-Type: application/json");
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET");
    header("Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Origin,Access-Control-Allow-Methods,Authorization,X-Requested-With");
    

    $data = json_decode(file_get_contents("php://input"),true);
    
    if(isset($_GET['search'])){
        $search = $_GET['search'];
    }else{
        die();
    }
    
    include "../database.php";
    $sql = "Select * FROM `data` WHERE name LIKE '%{$search}%';";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) > 0){
        $fetch = mysqli_fetch_all($result,MYSQLI_ASSOC);
        echo $json = json_encode($fetch);
    }else{
        $arr = array("message" => "Data Search No Found.", "Status" => false);
        echo json_encode($arr);
    }
?>