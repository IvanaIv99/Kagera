
<?php

    include 'connection/connection.php';
    include "models/functions.php";

    $positions = get_positions();
    $title="Form";
    
    
?>

<!DOCTYPE html>
<html>
    <?php include 'head.php'; ?>
   <body>
       

        <div class="row">
            <div class="col-4 margins"> 
                <h1>Add Candidate</h1>
                <button class='btn btn-primary'><a class="text-white text-decoration-none" href="index.php">Back</a></button>
            </div>
            

            <div class="col-12" id="form-wrapper" style="margin-left: 7%; margin-top:5%;">
            <form method="post" id="user_form" enctype="multipart/form-data">
            <div class="form-row">
                <div class="col-md-4 mb-3">
                <label for="firstname">First name</label>
                <input type="text" class="form-control" id="firstname" name="firstname" placeholder="" required value="" >
                <span id="regex_name" class="text-danger"></span>
                </div>
                <div class="col-md-4 mb-3">
                <label for="lastname">Last name</label>
                <input type="text" class="form-control " id="lastname"  name="lastname" placeholder="" value="" >
                <span id="regex_lname" class="text-danger"></span>
                </div>
                
            </div>
            
            <div class="form-row">
                <div class="col-md-4 mb-3">
                     <div class="custom-control custom-radio">
                    <input type="radio" id="male" name="gender" class="custom-control-input" checked>
                    <label class="custom-control-label" for="male" value="m" >Male</label>
                    </div>
                    <div class="custom-control custom-radio">
                    <input type="radio" id="female" name="gender" value="f" class="custom-control-input">
                    <label class="custom-control-label" for="female">Female</label>
                    </div>
                </div>
                
            </div>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="select_position">Choose Position</label>
                    <select class="form-control" name="select_position" id="select_position">
                        <option value="0">Select</option>
                        <?php
                        foreach($positions as $p):
                        ?>
                            <option value="<?= $p['id']?>"><?=  $p['position'] ?></option>
                        <?php
                            endforeach;
                        ?>
                    </select>
                    <span id="err-sel" class="text-danger"></span>
                </div>
                
            </div>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="photo">Upload photo</label>
                    <input type="file" class="form-control-file" name="photo" id="photo" required>
                    <span id="err-img" class="text-danger"></span>
                </div>
               
            </div>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="cv">Upload CV</label>
                    <input type="file" class="form-control-file" name="cv" id="cv" required>
                    <span id="err-cv" class="text-danger"></span>
                </div>
                
            </div>
           
            <button class="btn btn-primary" id="add_partners" type="button">Add</button>
            <span class="text-danger" id="success"></span>
            <span class="text-success" id="success_err"></span>
        </form>

        </div>
        </div>
   </body> 
</html>


