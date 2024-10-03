<?php
include "../connect.php";
include "../auth/functions.php";


$taskID = filtterRequest('taskID');


$stmt = $con ->prepare("SELECT * FROM `tasks` WHERE `taskID` = ? ");


$stmt-> execute(array($taskID));
$count = $stmt ->rowCount();
$data = $stmt -> fetchAll(PDO::FETCH_ASSOC);

    if ($count >0){
            echo json_encode(array("status"=>"seccess" ,"data"=>$data)) ;
         }else {
            echo json_encode(array("status"=>"fail"));
         }
?>