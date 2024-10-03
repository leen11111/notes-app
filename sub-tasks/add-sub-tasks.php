<?php
include "../connect.php";
include "../auth/functions.php";



$projectSubTasksID = filtterRequest('PROJECT-SubTasks-ID');
$subTaskUserID = filtterRequest('USER-SubTask-ID');
$subTsakTitle =filtterRequest('sub-task-title');
$subTaskContent =filtterRequest ('sub-task-content');
$subTaskDate =filtterRequest ('sub-task-date');
$subTaskStartTime =filtterRequest ('sub-task-start-time');
$subTaskEndTime =filtterRequest ('sub-task-end-time');
$ReminderSubTaskDate =filtterRequest ('Reminder-sub-task-date');
$subTaskImportance =filtterRequest ('sub-task-importance');
$subTaskStatus = filtterRequest ('sub-task-Status');


$stmt = $con->prepare("INSERT INTO `sub-tasks`(
   `PROJECT-SubTasks-ID`, 
   `USER-SubTask-ID`, 
   `sub-task-title`, 
   `sub-task-content`, 
   `sub-task-date`, 
   `sub-task-start-time`, 
   `sub-task-end-time`, 
   `Reminder-sub-task-date`, 
   `sub-task-importance`, 
   `sub-task-Status`) 
VALUES  (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");


$stmt-> execute(array(
   $projectSubTasksID ,
   $subTaskUserID,
   $subTsakTitle,
   $subTaskContent,
   $subTaskDate,
   $subTaskStartTime,
   $subTaskEndTime ,
   $ReminderSubTaskDate,
   $subTaskImportance,
   $subTaskStatus));
$count = $stmt ->rowCount();


if ($count >0){
       echo json_encode(array("status"=>"success")) ;
   }else {
      echo json_encode(array("status"=>"fail"));
   }
?>