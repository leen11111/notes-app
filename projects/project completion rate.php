<?php

include "../connect.php";
include "../auth/functions.php";



$projectID = filtterRequest('project-id'); 


// Query to count the total number of sub-tasks for the project
$stmt = $con->prepare("SELECT COUNT(*) as total FROM `sub-tasks`    WHERE `projectSubTasks ID` = ? ");
$stmt->execute(array( $projectID));
$totalSubTasks = $stmt->fetch(PDO::FETCH_ASSOC)['total'];


// Query to count the number of completed sub-tasks for the project
$stmt = $con->prepare("SELECT COUNT(*) as completed FROM `sub-tasks` WHERE `projectSubTasks ID` = ? AND `sub-task-Status` = 'completed'");
$stmt->execute(array( $projectID));
$completedSubTasks = $stmt->fetch(PDO::FETCH_ASSOC)['completed'];

// Calculate the completion rate
if ($totalSubTasks > 0) {
    $completionRate = ($completedSubTasks / $totalSubTasks) * 100;
} else {
    $completionRate = 0; // If there are no sub-tasks, the completion rate is 0
}

// Update the completion rate in the projects table
$stmt = $con->prepare("UPDATE projects SET `completionProject_rate` = ? WHERE `project-id` = ?");
$stmt->execute(array( $completionRate ,$projectID));
$count = $stmt ->rowCount();



if ($count >0){
    echo json_encode(array("status"=>"success " )) ;
    echo "Project Completion Rate Updated: " . round($completionRate, 2) . "%";
 }else {
    echo json_encode(array("status"=>"fail"));
 }


?>