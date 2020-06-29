<?php

if(isset($_REQUEST["status"]))
{
    include '../model/user_model.php';
    $userObj = new User();
    
    $status=$_REQUEST["status"];
    switch ($status)
    {
        case "getfunctions":
       $roleId=$_POST["role_id"] ;
       
       $moduleResult=$userObj->getModulesByRole($roleId);   
       ?>
        <div class="row">
       <?php
       $mCounter=0;
       while($mRow=  $moduleResult->fetch_assoc())
       {
           $moduleId=$mRow["module_id"];
           
           $functionResult=$userObj->getModuleFunctions($moduleId);
           
           $mCounter++;
          ?> 
        <div class="col-md-3">
            <label class="control-label"><?php echo $mRow["module_name"];  ?></label>
            <br/>
            <?php
                while($funRow=$functionResult->fetch_assoc())
                {
                 ?>
            <input type="checkbox" class="chkbx"  name="myfunctions[]" value="<?php  echo $funRow["function_id"]; ?>" checked="checked"/>
                <?php 
                    echo $funRow["function_name"];
                    
                ?>
                <br/>
                <?php
                }
            ?>
        </div>
            <?php  
                if($mCounter%4==0)
                {
                    ?>
        </div>
        <div class="row">
            <?php
                }
            
            ?>
            
            
           <?php
       }
       ?>
        </div>
       <?php   
            
            break;
        
        case "add_user":
            
            
            
            echo  $firstName=$_POST["fname"];
            echo "<br/>";
            
            echo $lastName=$_POST["lname"];
            echo "<br/>";
            echo $email=$_POST["user_email"];
            echo "<br/>";
            
            echo $dob=$_POST["dob"];
            
            echo "<br/>";
            
            echo $gender=$_POST["gender"];
            
            echo "<br/>";
            
            echo $nic=$_POST["nic"];
            
            echo "<br/>";
            
            echo $cno1=$_POST["cno1"];
            
            echo "<br/>";
            
            echo $cno2=$_POST["cno2"];
            
            echo "<br/>";
            
            echo $userRole=$_POST["user_role"];
            
            echo "<br/>";
            $userFunctions=array();
            
            $userFunctions=$_POST["myfunctions"]; // contains selected function ids
            
          
            
            try{
                
                if($firstName=="")
                {
                    throw  new Exception("FirstName is Empty!!!");
                
                }
                if($lastName=="")
                {
                    throw  new Exception("lastName is Empty!!!");
                }
                if($email=="")
                {
                    throw  new Exception("Email is Empty!!!");
                }
                if($dob=="")
                {
                    throw  new Exception("Dob is Empty!!!");
                
                }
                if($nic=="")
                {
                     throw  new Exception("NIC is Empty!!!");
                }
                if($userRole=="")
                {
                    throw  new Exception("User Role is Empty!!!");
                    
                }
                
                
                $patnic="/^[0-9]{9}[vVxX]$/";
                $patemail="/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z]{2,6})+$/";
                
                
               if(!preg_match($patnic, $nic))
               {
                   throw  new Exception("NIC is Invalid");
                   
               }
               if(!preg_match($patemail, $email))
               {
                   throw  new Exception("Email is Invalid");
                   
                   
               }
               //////   image upload   
               
               if($_FILES["user_img"]["name"]!="")  // if an image is uploaded
               {
                   $img=$_FILES["user_img"]["name"];
                   $img="".time()."_".$img;
                   
                   ///  tempory storage location
                   $tmp_location=$_FILES["user_img"]["tmp_name"];
                   $destination="../images/user_image/$img";
                   // to move from tempory to permanant
                   move_uploaded_file($tmp_location,$destination);
                   
               }else{

                $img="defaultImage.jpg";
            }


                 //// Email is existing validation //////////

            // we have to ensure that no two users have the same email
            $isValid = $userObj->validateEmailAddress($email);

            if($isValid==false)
            {
                throw new Exception("Email Address  is already taken");
            }

               
            /// 

            $userId=$userObj->addUser($firstName,$lastName,$img,$email,$nic,$dob,$gender,$userRole,$cno1,$cno2,"1");
            echo "<hr/>";
            //echo "User id is:".$userId;

            if($userId>0)
            {
                $login_pw = sha1($nic);
                $userObj->addLogin($email, $login_pw, $userId, 1);  /// add login
           


               //// add priviledges

            foreach($userFunctions as $f)
            {
                $userObj->addUserFunction($userId, $f);
            }
                       
            


            $msg=   "Successfully Inserted!";
            $msg=  base64_encode($msg);
            
         
            
            ?>
            
          <script> window.location="../view/view-user.php?msg=<?php echo $msg;  ?>"</script>

          <?php

            }
 
            } catch (Exception $ex) {
  
              $msg=   $ex->getMessage(); 
              $msg=  base64_encode($msg);
              
           
              
              ?>
              
            <script> window.location="../view/add-user.php?msg=<?php echo $msg;  ?>"</script>
              <?php
                
            }
            
            
            
            
            
            
            
            
            
            break;

            case "deactivateUser":

                $userId =  $_REQUEST["user_id"];

                ///Decide the encoded user id to the normal numeric form
                $userId = base64_decode($userId);

                $userObj->deActivateUser($userId);

                $msg="User Succesfully Deactivated";

                $msg = base64_encode($msg);
                ?>
              
                <script> window.location="../view/view-user.php?msg=<?php echo $msg;  ?>"</script>
                  <?php


               // echo $userId;
            break;




            case "activateUser":

                $userId =  $_REQUEST["user_id"];

                ///Decide the encoded user id to the normal numeric form
                $userId = base64_decode($userId);

                $userObj->activateUser($userId);

                $msg="User Succesfully Activated";

                $msg = base64_encode($msg);
                ?>
              
                <script> window.location="../view/view-user.php?msg=<?php echo $msg;  ?>"</script>
                  <?php


               // echo $userId;
            break;




            case "edit_user":
            
            
            echo  $userId=$_POST["user_id"];
            echo "<br/>";

            echo  $firstName=$_POST["fname"];
            echo "<br/>";
            
            echo $lastName=$_POST["lname"];
            echo "<br/>";
            echo $email=$_POST["user_email"];
            echo "<br/>";
            
            echo $dob=$_POST["dob"];
            
            echo "<br/>";
            
            echo $gender=$_POST["gender"];
            
            echo "<br/>";
            
            echo $nic=$_POST["nic"];
            
            echo "<br/>";
            
            echo $cno1=$_POST["cno1"];
            
            echo "<br/>";
            
            echo $cno2=$_POST["cno2"];
            
            echo "<br/>";
            
            echo $userRole=$_POST["user_role"];
            
            echo "<br/>";
            $userFunctions=array();
            
            $userFunctions=$_POST["myfunctions"]; // contains selected function ids
            
               // die();
            
            try{
                
                if($firstName=="")
                {
                    throw  new Exception("FirstName is Empty!!!");
                
                }
                if($lastName=="")
                {
                    throw  new Exception("lastName is Empty!!!");
                }
                if($email=="")
                {
                    throw  new Exception("Email is Empty!!!");
                }
                if($dob=="")
                {
                    throw  new Exception("Dob is Empty!!!");
                
                }
                if($nic=="")
                {
                     throw  new Exception("NIC is Empty!!!");
                }
                if($userRole=="")
                {
                    throw  new Exception("User Role is Empty!!!");
                    
                }
                
                
                $patnic="/^[0-9]{9}[vVxX]$/";
                $patemail="/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z]{2,6})+$/";
                
                
               if(!preg_match($patnic, $nic))
               {
                   throw  new Exception("NIC is Invalid");
                   
               }
               if(!preg_match($patemail, $email))
               {
                   throw  new Exception("Email is Invalid");
                   
                   
               }
               //////   image upload   
               
               if($_FILES["user_img"]["name"]!="")  // if an image is uploaded
               {
                   $img=$_FILES["user_img"]["name"];
                   $img="".time()."_".$img;
                   
                   ///  tempory storage location
                   $tmp_location=$_FILES["user_img"]["tmp_name"];
                   $destination="../images/user_image/$img";
                   // to move from tempory to permanant
                   move_uploaded_file($tmp_location,$destination);
                   
               }else{

                $img="defaultImage.jpg";
            }


                 //// Email is existing validation //////////

            // we have to ensure that no two users have the same email
            $isValid = $userObj->updateEmailValidation($userId,$email);

            if($isValid==false)
            {
                throw new Exception("Email Address  is already taken");
            }

               
            /// 

            $userObj->updateUser($userId, $firstName,$lastName,$img,$email,$nic,$dob,$gender,$userRole,$cno1,$cno2,"1");
            echo "<hr/>";
            //echo "User id is:".$userId;

            if($userId>0)
            {
              


               /// Remove all user functions for that user
               
               $userObj->removeUserFunctions($userId);

               // Assign user functions

            foreach($userFunctions as $f)
            {
                $userObj->addUserFunction($userId, $f);
            }
                       
            


            $msg=   "Successfully updated the user! $firstName"." "."$lastName";
            $msg=  base64_encode($msg);
            
         
            
            ?>
            
          <script> window.location="../view/view-user.php?msg=<?php echo $msg;  ?>"</script>

          <?php
            }
                
 
            } catch (Exception $ex) {
  
              $msg=   $ex->getMessage(); 
              $msg=  base64_encode($msg);
              
           
              
              ?>
              
            <script> window.location="../view/add-user.php?msg=<?php echo $msg;  ?>"</script>
              <?php
                
            }
            
            
            
            
            
            
            
            
            
            break;




          




            

        
    }
    
    
    
    
}
