<?php
$title="Form";
?>
<!DOCTYPE html>
<html>
<?php include 'head.php'; ?>
   <body>
        

        <div class="row">
        <div class="col-4 margins" id="form-wrapper">
                <h1>Add Position</h1>
                <button class='btn btn-primary'><a class="text-white text-decoration-none" href="index.php">Back</a></button>
            </div>
            <div class="col-12 margins" id="form-wrapper" >
            <form method="post" >
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="validationServer01">Position Name</label>
                        <input type="text" class="form-control " id="name" name="name" placeholder="" value="" required>
                        <span class="text-danger" id="nameError"></span>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationServer01">Description</label>
                        <input type="text" class="form-control " id="desc" name="desc" placeholder="" value="" required>
                        <span class="text-danger" id="descError"></span>
                    </div>
                    
                </div>
            <button class="btn btn-primary" type="click" id="add_position">Add</button>
            <span class="text-success" id="success"></span>
            <span class="text-danger" id="success_err"></span>
        </form>

        </div>
        </div>

   </body> 
</html>


