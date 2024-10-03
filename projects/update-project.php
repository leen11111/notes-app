<?php
include "../connect.php";
include "../auth/functions.php";

$title =filtterRequest('project-title');
$content =filtterRequest ('project-content');
$date =filtterRequest ('project-date');
$ProjectStartTime =filtterRequest ('project-start-time');
$ProjectEndTime =filtterRequest ('project-end-time');
$ReminderProjectDate =filtterRequest ('Reminder-project-date');
$ProjectImportance =filtterRequest ('project-importance');
$projectStatus = filtterRequest ('project-Status');
$projectID = filtterRequest ('project-id');




$stmt = $con ->prepare("UPDATE `projects` SET 
`project-title`         =  ?  ,
`project-content`       =  ?  ,
`project-date`          =  ?  ,
`project-start-time`    =  ?  ,
`project-end-time`      =  ?  ,
`Reminder-project-date` =  ?  ,
`project-importance`    =  ?  ,
`project-Status`        =  ?     WHERE `project-id`= ?");



$stmt-> execute(array(  
   $title ,   
   $content ,  
   $date,   
   $ProjectStartTime,   
   $ProjectEndTime,  
   $ReminderProjectDate,   
   $ProjectImportance   ,
   $projectStatus,  
   $projectID));
$count = $stmt ->rowCount();


if ($count >0){
      echo json_encode(array("status"=>"success")) ;
   }else {
      echo json_encode(array("status"=>"fail"));
   }



?>
