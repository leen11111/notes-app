<?php
include "../connect.php";
include "../auth/functions.php";


$projectID = filtterRequest('project-id');


$stmt = $con ->prepare("SELECT * FROM `projects` WHERE `project-id` = ? ");


$stmt-> execute(array($projectID));
$count = $stmt ->rowCount();
$data = $stmt -> fetchAll(PDO::FETCH_ASSOC);

    if ($count >0){
            echo json_encode(array("status"=>"seccess" ,"data"=>$data)) ;
         }else {
            echo json_encode(array("status"=>"fail"));
         }
?>