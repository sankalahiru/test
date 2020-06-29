<?php
 include '../commons/session.php';
?>
<html>

<head>
    <?php
    include '../includes/bootstrap_includes_css.php';


    include '../model/user_model.php';




    $userObj = new User();

    $roleResult = $userObj->getUserRoles();




    if (!isset($_REQUEST["user_id"])) {
        ?>
            <script>
                window.location = "../index.php"
            </script>
        <?php
        } else {
            $userId =  $_REQUEST["user_id"];
            $userId = base64_decode($userId);
            //$userResult = $userObj->getUserRoles();
            $userResult = $userObj->viewUser($userId);
    
            // print_r( $userResult) ;
    
            //convert resurlt to associatve 
            $userRow =  $userResult->fetch_assoc();

            ////////////get user functions
    
            $functionResult = $userObj->getUserFunctions($userId);
    
            $userFunctions = array();
    
            while ($fRow = $functionResult->fetch_assoc()) {
                array_push($userFunctions, $fRow["function_id"]);
            }
    
            //print_r($userFunctions);
            // echo $userRow["user_fname"];
    
    
    
        }








    ?>

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">&nbsp;</div>
        </div>
        <?php

         include '../includes/top_row.php';
        ?>
        <div class="row">
            <div class="col-md-12">&nbsp;</div>
        </div>

        <div class="row">

            <div class="col-md-3">
                
            </div>
        </div>
    </div>

    <div class="container">
        <div class="col-md-12">
            <div class="col-md-2">
                <h4>
                    <ul class="list-group">
                        <a class="list-group-item" href="add-user.php"><span class="glyphicon glyphicon-plus"></span> Add User</a>
                        <a class="list-group-item" href="view-user.php"><span class="glyphicon glyphicon-search"></span> View User</a>
                    </ul>
                </h4>

            </div>
            <div class="col-md-10">
                <div class="row">
                    <h3 align="center"><?php echo strtoupper("Edit User"); ?></h3>
                </div>

            </div>
                
        <?php

            if(isset($_REQUEST["msg"]))
            {

                ?>


<div class="col-md-12">
                    <div id="" class="alert alert-danger"  >
                    <?php
                         
                        $msg =$_REQUEST["msg"];
                        $msg = base64_decode($msg);
                        echo $msg;

                    ?>
                    </div>
                    

                    </div>


<?php



            }

        ?>








            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                    <div id="alertDiv" ></div>
                    </div>
                
                </div>
                <form id="addUser" enctype="multipart/form-data" method="post" action="../controller/usercontroller.php?status=edit_user">
                <input type="hidden" name="user_id" value="<?php echo $userId ?>">
                    <div class="row">
                        <div class="col-md-6">

                            <div class="col-md-6">
                                <h4><label class="control-label">First Name</label></h4>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="fname" id="fname" placeholder="Employee Name" class="form-control" value="<?php echo ucwords($userRow["user_fname"]) ?>"> 
                            </div>
                            <div id="alertmsg">

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="col-md-6">
                                <h4><label class="control-label">Last Name</label></h4>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="lname" id="lname" placeholder="Last Name" class="form-control" value="<?php echo ucwords($userRow["user_lname"]) ?>">
                            </div>
                        </div>
                    </div>




                    <div class="row">
                        <div class="col-md-6">

                            <div class="col-md-6">
                                <h4><label class="control-label">User Email</label></h4>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="user_email" id="user_email" placeholder="Employee Email" class="form-control" value="<?php echo $userRow["user_email"] ?>" readonly="readonly">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="col-md-6">
                                <h4><label class="control-label">User Gender </label></h4>
                            </div>
                            <div class="col-md-6">

                            
                                <h4 class=""><label class="control-label">Male &nbsp;</label>
                                <input type="radio" name="gender" id="gender" value="0" <?php
                                if($userRow["user_gender"] == 0)
                                {

                                    ?>

                                    checked="checked"
                                    <?php
                                    
                                }
                            ?>> 
                                <label class="control-label"> Female &nbsp;</label>
                                <input type="radio" name="gender" id="gender" value="1"<?php
                                if($userRow["user_gender"] == 1)
                                {

                                    ?>

                                    checked="checked"
                                    <?php
                                    
                                }
                            ?>></h4>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">

                            <div class="col-md-6">
                                <h4><label class="control-label">DOB</label></h4>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">


                                    <input type="date" name="dob" id="dob" placeholder="Date of birth" class="form-control" value="<?php echo $userRow["user_dob"] ?>">
                                    <span class="input-group-addon">
                                        <i class="glyphicon glyphicon-calendar"></i>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="col-md-6">
                                <h4><label class="control-label">NIC</label></h4>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="nic" id="nic" laceholder="Ex: 882350568V " class="form-control" value="<?php echo $userRow["user_nic"] ?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">

                            <div class="col-md-6">
                                <h4><label class="control-label">Contact Number 1</label></h4>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="cno1" id="cno1" placeholder="07778388344" class="form-control" value="<?php echo $userRow["user_cno1"] ?>">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="col-md-6">
                                <h4><label class="control-label">Contact Number 2</label></h4>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="cno2" id="cno2" placeholder="07778388344" class="form-control" value="<?php echo $userRow["user_cno2"] ?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">

                            <div class="col-md-6">
                                <h4><label class="control-label">User Role</label></h4>
                            </div>
                            <div class="col-md-6">
                            <select name="user_role"  class="form-control" id="user_role">
                                    <option value="">---</option>

                                    <?php
                                     while($role_row=$roleResult->fetch_assoc())
                                     {

                                     
                                    ?>
                                    <option value="<?php echo $role_row["role_id"];  ?>"
                                    
                                    <?php
                                    if($role_row["role_id"] == $userRow["role_id"])
                                    {

                                    ?>
                                    selected="selected" 
                                    <?php
                                    }
                                    ?>
                                    >
                                   
                                    
                                    <?php echo $role_row["role_name"]; ?></option>
                                    <?php
                                     }
                                    ?>


                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="col-md-6">
                            
                               
                            
                                <h4><label class="control-label">User Image</label></h4>
                                
                            </div>
                            <div class="col-md-6">
                                <input type="file" name="user_img" id="user_img" onchange="readURL(this)" class="form-control">
                                <br>
                                <img src="../images/user_image/<?php echo  $userRow["user_image"] ?>" alt="" width="50" height="40" id="prev_img" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        &nbsp;
                    </div>
                    <div class="row">
                        <div class="col-md-8">

                        </div>
                        <div class="col-md-2">


                            <button type="submit" class="form-control btn btn-primary"> <span class="glyphicon glyphicon-floppy-disk"></span> Update</button>

                        </div>
                        <div class="col-md-2">


                            <button type="reset" class="form-control btn btn-danger"><span class="glyphicon glyphicon-refresh"></span> RESET</button>
                        </div>


                    </div>
                    <div class="row">
                    &nbsp;
                    </div>
                    <div class="row">
                        <div class="container" id="myfunctions">

                            <!-- Load the functions -->

                            <?php





                            //$roleId = $_POST["user_role"];
                            $roleId = $userRow["user_role"];

                            $moduleResult = $userObj->getModulesByRole($roleId);
                            ?>
                            <div class="row">
                                <?php
                                $mCounter = 0;
                                while ($mRow =  $moduleResult->fetch_assoc()) {
                                    $moduleId = $mRow["module_id"];

                                    $functionResult = $userObj->getModuleFunctions($moduleId);

                                    $mCounter++;
                                ?>
                                    <div class="col-md-3">
                                        <label class="control-label"><?php echo $mRow["module_name"];  ?></label>
                                        <br />
                                        <?php
                                        while ($funRow = $functionResult->fetch_assoc()) {
                                        ?>
                                            <input type="checkbox" class="chkbx" name="myfunctions[]" value="<?php echo $funRow["function_id"]; ?>" <?php

                                             if (in_array($funRow["function_id"], $userFunctions)) //inn
                                                        {
                                                         ?> checked="checked" <?php
                                                                                                                                                    }

                                                         ?> />
                                            <?php
                                            echo $funRow["function_name"];

                                            ?>
                                            <br />
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <?php
                                    if ($mCounter % 4 == 0) {
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







                            ?>

                        </div>
                    </div>



                </form>
            </div>


        </div>
    </div>




</body>
<?php
include '../includes/bootstrap_script_includes.php';

?>

<script type="text/javascript" src="../js/user_validation.js"></script>
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#prev_img')
                    .attr('src', e.target.result)
                    .height(70)
                    .width(80);


            };
        }
        reader.readAsDataURL(input.files[0]);

    }
</script>


</html>