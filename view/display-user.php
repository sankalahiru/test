<?php
 include '../commons/session.php';
?>
<html>

<head>
    <?php
    include '../includes/bootstrap_includes_css.php';


    include '../model/user_model.php';



    $userObj = new User();



    //echo  $userId;

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

        $functionResult = $userObj->getUserFunctions($userId);

        $userFunctions = array();

        while ($fRow = $functionResult->fetch_assoc()) {
            array_push($userFunctions, $fRow["function_id"]);
        }

        // print_r($userFunctions);
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
                    <h3 align="center"><?php echo strtoupper("View User"); ?></h3>
                </div>

            </div>

            <?php

            if (isset($_REQUEST["msg"])) {

            ?>


                <div class="col-md-12">
                    <div id="" class="alert alert-danger">
                        <?php

                        $msg = $_REQUEST["msg"];
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
                        <div id="alertDiv"></div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-3">
                        <a href="edit-user.php?user_id=<?php echo base64_encode($userRow["user_id"]); ?>" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span>Edit</a>
                    </div>
                </div>
                <form id="addUser" enctype="multipart/form-data" method="post" action="../controller/usercontroller.php?status=add_user">
                    <div class="row">
                        <div class="col-md-6">

                            <div class="col-md-6">
                                <h4><label class="control-label">First Name</label></h4>
                            </div>
                            <div class="col-md-6">
                                <label class="control-label"><?php echo ucwords($userRow["user_fname"]) ?></label>
                            </div>
                            <div id="alertmsg">

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="col-md-6">
                                <h4><label class="control-label">Last Name</label></h4>
                            </div>
                            <div class="col-md-6">
                                <label class="control-label"><?php echo ucwords($userRow["user_lname"]) ?></label>
                            </div>
                        </div>
                    </div>




                    <div class="row">
                        <div class="col-md-6">

                            <div class="col-md-6">
                                <h4><label class="control-label">User Email</label></h4>
                            </div>
                            <div class="col-md-6">
                                <label class="control-label"><?php echo $userRow["user_email"] ?></label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="col-md-6">
                                <h4><label class="control-label">User Gender </label></h4>
                            </div>
                            <div class="col-md-6">
                                <label class="label label-primary">

                                    <?php
                                    echo $gender = ($userRow["user_gender"] == 0) ? "Male" : "Female";
                                    ?>

                                </label>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">

                            <div class="col-md-6">
                                <h4><label class="control-label">DOB</label></h4>
                            </div>
                            <div class="col-md-6">
                                <label class="control-label"><?php echo $userRow["user_dob"] ?></label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="col-md-6">
                                <h4><label class="control-label">NIC</label></h4>
                            </div>
                            <div class="col-md-6">
                                <label class="control-label"><?php echo $userRow["user_nic"] ?></label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">

                            <div class="col-md-6">
                                <h4><label class="control-label">Contact Number 1</label></h4>
                            </div>
                            <div class="col-md-6">
                                <label class="control-label"><?php echo $userRow["user_cno1"] ?></label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="col-md-6">
                                <h4><label class="control-label">Contact Number 2</label></h4>
                            </div>
                            <div class="col-md-6">
                                <label class="control-label"><?php echo $userRow["user_cno2"] ?></label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">

                            <div class="col-md-6">
                                <h4><label class="control-label">User Role</label></h4>
                            </div>
                            <div class="col-md-6">
                                <label class="control-label"><?php echo $userRow["role_name"] ?></label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="col-md-6">
                                <h4><label class="control-label">User Image</label></h4>
                            </div>
                            <div class="col-md-6">
                                <img src="../images/user_image/<?php echo  $userRow["user_image"] ?>" alt="" width="50" height="40">
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


                            

                        </div>
                        <div class="col-md-2">


                          
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