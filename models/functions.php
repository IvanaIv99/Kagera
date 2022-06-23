<?php
    
    function add_position($position,$date_added){
        global $conn;
       
        $query = "INSERT INTO positions(position,date_added) VALUES ('$position','$date_added');";

        $result = mysqli_query($conn,$query);

        if($result){
            return $result;
        }else{
            return mysqli_error($conn);
        }
        
    }

    function get_positions(){
        global $conn;
       
        $query = "SELECT * FROM positions;";

        $result = mysqli_query($conn,$query);
        $data = [];

        if($result){
            
           if(mysqli_num_rows($result)){
                while($row = mysqli_fetch_assoc($result)){
                    $data[]=$row;
                }
           }
            return $data;

        }else{
            return mysqli_error($conn);
        }
    }

    function add_users($firstname,$lastname,$gender,$position,$img,$cv,$date_added){
        global $conn;
       
        $query_u = "INSERT INTO users(firstname,lastname,id_type,gender,date_added) VALUES ('$firstname','$lastname',1,'$gender','$date_added');";

        $result_u = mysqli_query($conn,$query_u);

        if($result_u){

            $lastid = mysqli_insert_id($conn);

            $query_p = "INSERT INTO partners(user_id,position_id,cv,photo,date_added) VALUES ('$lastid','$position','$cv','$img','$date_added');";
            $result_p = mysqli_query($conn,$query_p);

            if($result_p){
                return $result_p;
            }else{
                return mysqli_error($conn);
            }
        }else{
            return mysqli_error($conn);
        }
        
    }

    function get_partners(){
        global $conn;
       
        $query = "SELECT p.*,pos.position as position,u.firstname,u.lastname,u.gender FROM users u INNER JOIN partners p ON u.id = p.user_id INNER JOIN positions pos ON pos.id = p.position_id ORDER BY p.date_added DESC ;";

        $result = mysqli_query($conn,$query);
        $data = [];

        if($result){
            
           if(mysqli_num_rows($result)){
                while($row = mysqli_fetch_assoc($result)){
                    $data[]=$row;
                }
           }
            return $data;

        }else{
            return mysqli_error($conn);
        }
    }


    function get_one_partner($id){
        global $conn;
       
        $query = "SELECT p.*,pos.position as position,u.firstname,u.lastname,u.gender FROM users u INNER JOIN partners p ON u.id = p.user_id INNER JOIN 
        positions pos ON pos.id = p.position_id WHERE p.id  = $id ;";

        $result = mysqli_query($conn,$query);
        $data = [];

        if($result){
            
           if(mysqli_num_rows($result)){
                while($row = mysqli_fetch_assoc($result)){
                    $data[]=$row;
                }
           }
            return $data;

        }else{
            return mysqli_error($conn);
        }
    }
?>