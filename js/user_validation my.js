$(document).ready(function (){
    
    $("#user_role").change(function(){

       // alert("aaa")

        var url = "../controller/usercontroller.php?status=getfunctions";
        var x=$("#user_role").val();

        //alert(user_role)

        
        $.post(url, {role_id:x},function( data ) {
            $("#myfunctions").html(data).show();
          });

       // $("#myfunctions").html("<h6>Username Cannot be Empty!!!</h6>");

    });





        










    
    $("#addUser").submit(function (){
        
        var fname=$("#fname").val();
        var lname=$("#lname").val();
        var user_email=$("#user_email").val();
        //var gender=$("#gender").val();
        var dob=$("#dob").val();
        var nic=$("#nic").val();
        var cno1=$("#cno1").val();
        var cno2=$("#cno2").val();
        var user_role=$("#user_role").val();
      
        //alert(cno2);
        
        var patnic = /^[0-9]{9}[vVxX]$/;
        var patcon1 = /^[0-9]{9}$/;
        var patnic2 = /^[0-9] {9} [vVxX] $/;
        var patmob =   /^\+947[0-9]{8} $/;

        var patemail=/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z]{2,6})+$/;
       

        //alert("abc");


        if(fname=="")
        {
            //$("#fname").html("<h6>Username Cannot be Empty!!!</h6>");
            
            $("#userAlert").html("Please Enter your First Name");
            $("#userAlert").addClass("alert alert-danger");
               // $("#fname").addClass("alert alert-danger");
               // $("#fname").focus();
                return false;
        }

        if(lname=="")
        {
            //$("#fname").html("<h6>Username Cannot be Empty!!!</h6>");
            
            $("#userAlert").html("Please Enter your Last Name");
            $("#userAlert").addClass("alert alert-danger");
               
                return false;
        }

        if(user_email=="")
        {
            //$("#fname").html("<h6>Username Cannot be Empty!!!</h6>");
            
            $("#userAlert").html("Please Enter your user email");
            $("#userAlert").addClass("alert alert-danger");
            $("#user_email").focus(); 
                return false;
        }


      

        if(!user_email.match(patemail))
        {
            $("#userAlert").html("The EMail is Invalid!");
            $("#userAlert").addClass("alert alert-danger");
           // $("#cno2").focus();
               
           return false;
        }

        if(dob=="")
        {
            //$("#fname").html("<h6>Username Cannot be Empty!!!</h6>");
            
            $("#userAlert").html("Please Enter your user date of birth");
            $("#userAlert").addClass("alert alert-danger");
               
                return false;
        }


        if(nic=="")
        {
            //$("#fname").html("<h6>Username Cannot be Empty!!!</h6>");
            
            $("#userAlert").html("Please Enter your nic");
            $("#userAlert").addClass("alert alert-danger");
               
                return false;
        }

        if(!nic.match(patnic))
        {
            //$("#fname").html("<h6>Username Cannot be Empty!!!</h6>");
            
            $("#userAlert").html("Your Nic is not valid please enter valid nic");
            $("#userAlert").addClass("alert alert-danger");
               
                return false;
        }


        if(cno1=="")
        {
            //$("#fname").html("<h6>Username Cannot be Empty!!!</h6>");
            
            $("#userAlert").html("Please Enter your user contact number");
            $("#userAlert").addClass("alert alert-danger");
               
                return false;
        }

        /*
        if(!con1.match(patcon1))
        {
            //$("#fname").html("<h6>Username Cannot be Empty!!!</h6>");
            
            $("#userAlert").html("Enter valid phone number");
            $("#userAlert").addClass("alert alert-danger");
               
                return false;
        }
        */
       
        /*
        if((con2!="")&&(!con2.match(patmob)))
        {
            //$("#fname").html("<h6>Username Cannot be Empty!!!</h6>");
            
            $("#userAlert").html("Enter valid phone number");
            $("#userAlert").addClass("alert alert-danger");
           // $("#cno2").focus();
               
           alert("con2")
                return false;
        }

        */


      
        

        var selectCount = 0;


        $(".chkbx").each(function(index){

           if( $(this).is(":checked"))
           {
               // console.log(index);
               //alert(index);
               selectCount++;
           }
        });

        if(selectCount == 0) // none of the checkboxes are slected
        {
            $("#userAlert").html("At least one of the functions must be slected");
            $("#userAlert").addClass("alert alert-danger");
           // $("#cno2").focus();
               
          
                return false;


        }
       

        
    
        
    });
    
    
});

