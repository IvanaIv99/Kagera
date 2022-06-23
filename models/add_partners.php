<?php

    $uploadDirImg='../uploads/images/';
    $uploadDirCv='../uploads/cv/';

    if(isset($_POST['firstname']) || isset($_POST['lastname']) ){

        include "../connection/connection.php";
        include "functions.php";

        $firstname=$_POST['firstname'];
        $lastname=$_POST['lastname'];
        $gender = $_POST['gender'];
        $position = $_POST['select_position'];
        $date_added=date('d-m-y h:i:s');

        $img_file= $_FILES['photo'];
        $cv_file= $_FILES['cv'];
        //print_r($img_file['tmp_name']);exit;
       
        $ext_img = array('jpg','jpeg','png');
        $ext_cv=array('pdf');
        $ext_error=false;

        $img_ext_ = explode('.',$img_file['name']);
        $img_ext_end = end( $img_ext_);
        if( !in_array($img_ext_end,$ext_img)){
            $ext_error = true;
        }else{
           
            $new_img_filename = time().".".$img_ext_end;
            
            $img_path="$uploadDirImg".$new_img_filename;
            move_uploaded_file($img_file['tmp_name'],$img_path);
        }

        $cv_ext_=explode('.',$cv_file['name']);
        $cv_ext_end = end( $cv_ext_);
        if( !in_array($cv_ext_end,$ext_cv)){
            $ext_error = true;
        }else{
            
            $new_cv_filename = time().".".$cv_ext_end;
            $cv_path="$uploadDirCv".$new_cv_filename;
            move_uploaded_file($cv_file['tmp_name'], $cv_path);
        }


        if(!$ext_error){
            $qry = add_users($firstname,$lastname,$gender,$position,$new_img_filename,$new_cv_filename,$date_added);
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
