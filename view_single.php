<?php
    //global $title;
    $title = "View";
    include 'connection/connection.php';
    include "models/functions.php";

    $id = $_GET['id'];
    $partner = get_one_partner($id)[0];

    
    
?>
<!DOCTYPE html>
<html>
   <?php include 'head.php'; ?>
   <body>
   <div class="row">
    <div class="col-4 margins" id="form-wrapper" >

          <button class='btn btn-primary'><a class="text-white text-decoration-none" href="index.php">Back</a></button>

    </div>

    <div class="col-7 margins"  >
      <div class="card" style="width:40%;">
        <img class="card-img-top"  src="uploads/images/<?=$partner['photo']?>" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title"><?=$partner['firstname'] . " " . $partner['lastname'] ?></h5>
              <p class="card-text"><?=$partner['position'] ?></p>
              <p class="card-text"><?=$partner['gender'] == 'f' ? "Female"  : "Male" ?></p>
              <button class="btn btn-primary"><a class="text-white text-decoration-none" href="show_pdf.php?name=<?=$partner['cv']?>">Show CV</a></button>
            </div>
            <div class="card-footer">
              <small class="text-muted"><?=date("d/m/Y h:i",strtotime($partner['date_added'])) ?></small>
            </div>
      </div>
         
    </div>
           
          
    
       
  </div>
     
        

  
  </body> 

   
</html>


