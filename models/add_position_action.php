<?php
if(isset($_REQUEST['add_positions'])){
    include "../connection/connection.php";
    include "functions.php";

    $name = $_REQUEST["name"];
    $date_added=date('d-m-y h:i:s');

    $reName = "/\b([A-ZÀ-ÿ][-,A-z. ']+[ ]*)+$/";
        
    $errors = array();

    if(!preg_match($reName, $name)){
        array_push($errors, "Position Name is not in format!");
    }


  
    if(count($errors)==0){
        
        $qry = add_position($name,$date_added);
        if($qry){
            $success=true;
            $message="Successfuly added!";
        }else{
            $success=false;
            $message="Eror! Please try again." ;
        }
        $response['success']=$success;
        $response['message']=$message;
        echo json_encode($response);
    }
}
?>