<?php

    include 'connection/connection.php';
    include "models/functions.php";

    $title="Home";
    $users = get_partners();
   // print_r($users);
    
    
?>
<!DOCTYPE html>
<html>
     <?php include 'head.php'; ?>
   <body>
   <div class="row">
          <div class="col-4 margins" id="form-wrapper" >

            <button class='btn btn-primary'><a class="text-white text-decoration-none" href="add_new.php">Add User</a></button>
            <button class='btn btn-primary'><a class="text-white text-decoration-none"  href="add_position.php">Add Positions</a></button>
          </div>

          <div class="col-8 margins" >

          <table class="table">
          <thead>
               <tr>
                    <th scope="col">#</th>
                    <th scope="col">Firstname</th>
                    <th scope="col">Lastname</th>
                    <th scope="col">Position</th>
                    <th scope="col">Action</th>
               </tr>
          </thead>
          <tbody>
               <?php foreach($users as $u):?>
               <tr>
                    <th scope="row"><?= $u['id']?></th>
                    <td><?= $u['firstname']?></td>
                    <td><?= $u['lastname']?></td>
                    <td><?= $u['position']?></td>
                    <td><button class="btn btn-primary" > <a class="text-white text-decoration-none" href="view_single.php?id=<?=$u['id']?>"> View </a></button></td>
               </tr>
               
               <?php endforeach; ?>

              
              
          </tbody>
          </table>
          </div>
           
          
     </div>
       

     
        


   </body> 
</html>


