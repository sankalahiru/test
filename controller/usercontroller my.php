<?php

if (isset($_REQUEST["status"])) {
    $status = $_REQUEST["status"];
    switch ($status) {
        case "getfunctions":
            // echo "happy";
            $roleID = $_POST["role_id"];
            include '../model/user_model.php';
            $userObj = new User();
            $moduleResulat = $userObj->getModulesByRole($roleID);
            $count = 1;
            while ($mRow = $moduleResulat->fetch_assoc()) {
                $moduleId = $mRow["module_id"];
                $functionResult = $userObj->getModuleFunctions($moduleId);
?>
                <div class="col-md-3">
                    <label class="form-control">
                        <?php
                        echo $mRow["module_name"];
                        ?>
                    </label>
                    <br />
                    <?php
                    while ($fun_row = $functionResult->fetch_assoc()) {

                    ?>
                        <input type="checkbox" class="chkbx" name="myfunctions[]" value="<?php echo $fun_row["function_id"];   ?>" checked="checked">


                        <?php
                        echo $fun_row["function_name"];
                        ?>
                        <br />

                    <?php



                    }
                    ?>

                </div>

                <?php
                $count++;
                if ($count % 4 == 0) {
                ?>
                    <div class="row">&nbsp</div>
<?php
                }
            }

        break;

        case "add_user":

            
            echo "user adding function";

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
            
            $userFunctions=$_POST["myfunctions"];
            
           print_r($userFunctions);

           //$firstName="";
            
            try{

                if($firstName=="")
                {
                    throw new Exception("FirstName is Empty!");
                }

                if($lastName=="")
                {
                    throw new Exception("LastName is Empty!");
                }

                if($email=="")
                {
                    throw new Exception("Email is Empty!");
                }

                if($dob=="")
                {
                    throw new Exception("Dob is Empty!");
                }

                if($nic=="")
                {
                    throw new Exception("NIC is Empty!");
                }

                if($cno1=="")
                {
                    throw new Exception("CNO1 is Empty!");
                }

                if($cno2=="")
                {
                    throw new Exception("CNO2 is Empty!");
                }

                if($userRole=="")
                {
                    throw new Exception("UserROle is Empty!");
                }


               
                

                $patnic = "/^[0-9]{9}[vVxX]$/";

                if(!preg_match($patnic,$nic))
                {
                    throw new Exception("NIC is invalid!");
                }
                



               // $email = "568";
                $patemail="/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z]{2,6})+$/";


                if(!preg_match($patemail,$email))
                {
                    throw new Exception("Email is invalid!");
                }



            } catch (Exception $ex)
            {
                $msg =  $ex->getMessage();
                $msg = base64_encode($msg);
                echo $msg;

                ?>

<script> window.location="../view/add-user.php?msg=<?php echo $msg; ?>"</script>
                <?php
            }

            ///// image upload
            

            if($_FILES["user_img"]["name"]!="")  // if an image is uploaded
            {
                $img = $_FILES["user_img"]["name"];
                $img = "".time()."_".$img; 
                
                $tmp_location = $_FILES["user_img"]["tmp_name"];
                $permanant = "../images/user_image/$img";

                //to move from temp to permanant

                move_uploaded_file($tmp_location,$permanant);
            }else{

                $destination="../images/user_image/defaultImage.jpg";
            }


            //// Email is existing validation //////////

            // we have to ensure that no two users have the same email
            $isValid = $userObj->validateEmailAddress($email);

            if($isValid==false)
            {
                throw new Exception("Email Address  is already taken");
            }




            
        break;
    }


}
?>