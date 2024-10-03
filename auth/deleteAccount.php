<?php 
include "../connect.php";
include "functions.php";

$userID =filtterRequest('id');
$imageName =filtterRequest('userImgName');

function deleteFile($file_path){

    if (file_exists($file_path)) {
        // Check if the file exists
        if (unlink($file_path)) {
            // Attempt to delete the file
            echo "The file has been deleted successfully.";
        } else {
            echo "Error: The file could not be deleted.";
        }
    } else {
        echo "Error: The file does not exist.";
    }}


$stmt = $con ->prepare("DELETE FROM `users` WHERE `id`=? ");

$stmt-> execute(array($userID));
$count = $stmt ->rowCount();
//deleteFile("upload-image/" , $imageName);

if ($count >0){
    deleteFile("upload-image/".$imageName);
    echo json_encode(array("status"=>"success")) ;
   }else {
      echo json_encode(array("status"=>"fail"));
   }
?>