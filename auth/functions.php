<?php

 function filtterRequest ($ii){
     return htmlspecialchars(strip_tags($_POST [$ii]));
}


function validatePassword($password) {
    // Check for at least one capital letter
    if (!preg_match('/[A-Z]/', $password)) {
        return "Password must include at least one capital letter.";
    }
    // Check for at least one small letter
    if (!preg_match('/[a-z]/', $password)) {
        return "Password must include at least one small letter.";
    }
    // Check for at least one number
    if (!preg_match('/\d/', $password)) {
        return "Password must include at least one number.";
    }
    // Check for at least one punctuation mark
    if (!preg_match('/[\W]/', $password)) {
        return "Password must include at least one punctuation mark.";
    }
    return true; // All checks passed
 }
 

 define('MB',1048576);
 function personalImageUpload($ImageRequest){
   

    global $ErrorMassege ;

    if (!isset($_FILES[$ImageRequest])) {
        $ErrorMassege[] = "No file uploaded.";
        return false;
    }
    $imageName  = rand (1,1000).$_FILES [$ImageRequest]['name'];
    $imageTmp   = $_FILES [$ImageRequest]['tmp_name'];
    $imageSize  = $_FILES [$ImageRequest]['size'];
    $imageDimensions = getimagesize($imageTmp);
    $AllowExt   = array ("png" ,"jpg");
    $strToAray  = explode(".", $imageName);
    $ext        = end($strToAray);
    $ext        = strtolower($ext);


    if ( !empty($imageName) && !in_array($ext ,$AllowExt)){
        $ErrorMassege[]= "The extention should be png or jpg" ;
    }
    if ($imageSize > 2* MB){
        $ErrorMassege[] = "The size is wrong";
    }
    if ($imageDimensions[0] !==$imageDimensions[1]) {
        $ErrorMassege[] = "The image is not square.";
    }
    
    if (empty($ErrorMassege)){
        move_uploaded_file($imageTmp , "upload-image/".$imageName);
        return $imageName;
     
 
    }else{
        echo json_encode(array("statusImage" => "fail" , "reason" => $ErrorMassege));
    }






    
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
    }
    // if (file_exists($dir."/".$imageName )){
    //     unlink($dir."/".$imageName);
    // }
}

}
   
    
    
?>