$(function() {


    //ADDING POSITIONS 

    $("#add_position").click(function(e){
        e.preventDefault();
      
        add_position();

    });


    //ADDING PARTNERS

    $("#add_partners").click(function(e){
        e.preventDefault();
        
        add_partners();
    });

    //VIEW

    

    function add_position(){
        let name = $('#name').val();
        let desc = $('#desc').val();
        let rex = new RegExp(/\b([A-ZÀ-ÿ][-,A-z. ']+[ ]*)+/);
        let rexDesc = new RegExp(/\b([A-ZÀ-ÿ][0-9,-,A-z. ']+[ ]*)+/);
        let errors = new Array();
        let data = new Array();

        if(!rex.test(name)){
            errors.push("Position name not in format!");
            $('#nameError').text("Position name not in format!")
        }else{
            data['name'] = name;
            $('#nameError').text("")
        }

        if(!rexDesc.test(desc)){
            errors.push("Position name not in format!");
            $('#descError').text("Position name not in format!")
        }else{
            data['desc'] = desc;
            $('#descError').text("")
        }
            	
        if(errors.length == 0){
           
        
        $.ajax({
            url : "models/add_position_action.php",
            method : "POST",
            dataType : "json",
            data : {
                name : data['name'],
                desc: data['desc'],
                add_positions:1
            },
            success : function(data) {
                
                if(data.success == true){
                    $('#success').text(data.message);
                }else{
                    $('#success_err').text(data.message);
                }

                setTimeout(function() {
                    location.reload();
                }, 2000);
                
            }
        });
        
            
        }
    }


    function add_partners(){

        let firstname = $('#firstname').val();
        let lastname = $('#lastname').val();
        let gender = $('input[name=gender]:checked').val();
        let position = $('#select_position').find(":selected").val();
        
         let form = document.getElementById("user_form");
         let form_data = new FormData(form);


        let error=[];
        let regex =  new RegExp(/\b([A-ZÀ-ÿ][-,a-z. ']+[ ]*)+/);
       
        
            if(!regex.test(firstname)){
                $("#regex_name").text("Invalid firstname format.");
                error.push("Invalid firstname format");
            }else{
                $("#regex_name").text("");
                form_data.append("firstname",firstname);
            }

            if(!regex.test(lastname)){
                $("#regex_lname").text("Invalid lastname format.");
                error.push("Invalid lastname format");
            }else{
                $("#regex_lname").text("");
                form_data.append("lastname",lastname);
            }

            if(position == 0){
                
                $("#err-sel").text("Please select position");
                error.push("Please select position");
                console.log("D");
            }else{
                
                $("#err-sel").text("");
                form_data.append("position",position);
            }
            

            form_data.append("gender",gender);
        

        let img_file_data = $("#photo").prop('files')[0];
        let cv_file_data = $("#cv").prop('files')[0];

        let allowedType=['image/png','image/jpeg','image/jpg']
        let allowedCv = ['application/pdf'];

        if(img_file_data != undefined){
            if(!allowedType.includes(img_file_data['type'])){
                $("#err-img").text("Allowed are jpeg,jpg,png");
                error.push("Allowed are jpeg,jpg,png");
               
            }else{
                $("#err-img").text("");
                form_data.append("img_file",img_file_data);
            }
        }else{
            $("#err-img").text("Image is required.");
            error.push("Image is required");
        }

        if(cv_file_data != undefined){
            if(!allowedCv.includes(cv_file_data['type'])){
                $("#err-cv").text("Allowed are pdf");
                error.push("Allowed are pdf");
            }else{
                $("#err-cv").text("");
                form_data.append("cv_file",cv_file_data);
            }
        }else{
            $("#err-cv").text("Cv is required.");
            error.push("Cv is required");
        }



       if(error.length == 0){
        $.ajax({
            url : "models/add_partners.php",
            method : "POST",
            dataType : "json",
            data : form_data,
            contentType:false,
            cache:false,
            processData:false,
            success : function(data) {
                if(data.success == true){
                    $('#success').text(data.message);
                }else{
                    $('#success_err').text(data.message);
                }

                setTimeout(function() {
                    location.reload();
                }, 2000);
                
                
            }
        });
       }

        
    }


    


});