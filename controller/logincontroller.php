<?php
include '../commons/session.php';
include '../model/login_model.php';
include '../model/user_model.php';

$userObj = new User();

$loginObj= new Login();
$status=$_REQUEST["status"];
 
 switch ($status){
     
     case "login":
        
        
         
         $uname=$_POST["username"];
        echo "<br/>";
         $pw=$_POST["password"];
        echo "<br/>";
        $pw=  sha1($pw);
        /// convert the pw to uppercase
        $pw=  strtoupper($pw);
        
       $result= $loginObj->validateLogin($uname, $pw);

       $userRow=$result->fetch_assoc();

      
       


       
       
        if($result->num_rows==1) // valid user in the system
        {
            $role_id = $userRow["user_role"];  // get role id
            $firstname = $userRow["user_fname"];
            $lastname = $userRow["user_lname"];

            $moduleResult = $userObj->getModulesByRole($role_id);

            $moduleArray = array();

            while($mrow = $moduleResult->fetch_assoc())
            {
                array_push($moduleArray,$mrow["module_id"]);
            }

            $_SESSION["user_modules"] = $moduleArray;


            
            $userArray = array(

                "firstname"=>$firstname,
                "lastname"=>$lastname,
                "role_id"=>$role_id
            );

            $_SESSION["user"] = $userArray;

            //die();
     
          


            echo "SUCCESS";
            ?>
                 <script> window.location="../view/dashboard.php"</script>
            <?php
            
        }
        else
         {
            $msg="The Credentials: username and the password does not match!";
            
            $msg=base64_encode($msg);
            ?>
   <script> window.location="../view/login.php?msg=<?php echo $msg;  ?>"</script>

           <?php
         }
         
     break;
     
     case "logout":

        session_destroy();


        ?>
        <script> window.location="../index.php"</script>
     
                <?php

         
     break;
 
    default:
     echo "Invalid Parameters";
     
 }
?>

