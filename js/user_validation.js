$(document).ready(function (){
    
    $("#user_role").change(function(){
        var url="../controller/usercontroller.php?status=getfunctions";
       
        var x= $("#user_role").val();
     $.post(url,{role_id:x},function(data){
            $("#myfunctions").html(data).show();
        });
        
        
        
    });
    
     
    
    
    
    
    
    
    
   $("#addUser").submit(function (){
        
        var fname=$("#fname").val();
        var lname=$("#lname").val();
        var user_email=$("#user_email").val();
        var dob=$("#dob").val();
        var nic=$("#nic").val();
        var cno1=$("#cno1").val();
        var cno2=$("#cno2").val();
        var user_role=$("#user_role").val();
        
       
      
      if(fname=="")
      {
          $("#alertDiv").html("First Name Cannot be Empty!!!");
          $("#alertDiv").addClass("alert alert-danger");
          $("#fname").focus();
          return false;
      }
      if(lname=="")
      {
          $("#alertDiv").html("Last Name Cannot be Empty!!!");
          $("#alertDiv").addClass("alert alert-danger");
          $("#lname").focus();
          return false;
      }
      if(user_email=="")
      {
          $("#alertDiv").html("Email Cannot be Empty!!!");
          $("#alertDiv").addClass("alert alert-danger");
          $("#user_email").focus();
          return false;
      }
      if(dob=="")
      {
          $("#alertDiv").html("Date of Birth Cannot be Empty!!!");
          $("#alertDiv").addClass("alert alert-danger");
          $("#dob").focus();
          return false;
      }
      if(nic=="")
      {
          $("#alertDiv").html("NIC Cannot be Empty!!!");
          $("#alertDiv").addClass("alert alert-danger");
          $("#nic").focus();
          return false;
      }
      if(user_role=="")
      {
          $("#alertDiv").html("User Role Cannot be Empty!!!");
          $("#alertDiv").addClass("alert alert-danger");
          $("#user_role").focus();
          return false;
      }
       if(cno1=="")
      {
          $("#alertDiv").html("Contact Number 1 Cannot be Empty!!!");
          $("#alertDiv").addClass("alert alert-danger");
          $("#cno1").focus();
          return false;
      }
      var patnic=/^[0-9]{9}[vVxX]$/;
      
      var patcno=/^\+94[0-9]{9}$/;
      
      var patmob=/^\+947[0-9]{8}$/;
      
      var patemail=/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z]{2,6})+$/;

      if(!nic.match(patnic))
      {
          $("#alertDiv").html("NIC is Invalid");
          $("#alertDiv").addClass("alert alert-danger");
          $("#nic").focus();
          return false;
      }
       if(!cno1.match(patcno))
      {
          $("#alertDiv").html("Contact Number 1 is Invalid");
          $("#alertDiv").addClass("alert alert-danger");
          $("#cno1").focus();
          return false;
      }
       if((cno2!="")&&(!cno2.match(patmob)))
      {
          $("#alertDiv").html("Contact Number 2(Mobile) is Invalid");
          $("#alertDiv").addClass("alert alert-danger");
          $("#cno2").focus();
          return false;
      }
      
        var selectCount=0;
      
       $(".chkbx").each(function(index){
           
           if($(this).is(":checked"))
           {
              selectCount++;
               
           }
       });
       
       if(selectCount==0)   /// none of the checkboxes are selected
       {
          $("#alertDiv").html("At least one function must be selected!!!");
          $("#alertDiv").addClass("alert alert-danger");
          $("#cno2").focus();
          return false;
       }
       
       
       if(!user_email.match(patemail))
       {
          $("#alertDiv").html("The Email is Invalid!");
          $("#alertDiv").addClass("alert alert-danger");
          $("#cno2").focus();
          return false;
           
       }
      
   
      
   
      
   });
    
});