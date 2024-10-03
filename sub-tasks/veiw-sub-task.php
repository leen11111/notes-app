<?php
include "../connect.php";
include "../auth/functions.php";


$subTaskID = filtterRequest('sub-task-id');


$stmt = $con ->prepare("SELECT * FROM `sub-tasks` WHERE `sub-task-id` = ? ");


$stmt-> execute(array($subTaskID));
$count = $stmt ->rowCount();
$data = $stmt -> fetchAll(PDO::FETCH_ASSOC);

    if ($count >0){
            echo json_encode(array("status"=>"seccess" ,"data"=>$data)) ;
         }else {
            echo json_encode(array("status"=>"fail"));
         }
?>