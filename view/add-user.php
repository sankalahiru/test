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
                    <h3 align="center"><?php echo strtoupper("ADD User"); ?></h3>
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
                <form id="addUser" enctype="multipart/form-data" method="post" action="../controller/usercontroller.php?status=add_user">
                    <div class="row">
                        <div class="col-md-6">

                            <div class="col-md-6">
                                <h4><label class="control-label">First Name</label></h4>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="fname" id="fname" placeholder="Employee Name" class="form-control">
                            </div>
                            <div id="alertmsg">

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="col-md-6">
                                <h4><label class="control-label">Last Name</label></h4>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="lname" id="lname" placeholder="Last Name" class="form-control">
                            </div>
                        </div>
                    </div>




                    <div class="row">
                        <div class="col-md-6">

                            <div class="col-md-6">
                                <h4><label class="control-label">User Email</label></h4>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="user_email" id="user_email" placeholder="Employee Email" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="col-md-6">
                                <h4><label class="control-label">User Gender </label></h4>
                            </div>
                            <div class="col-md-6">
                                <h4 class=""><label class="control-label">Male &nbsp;</label>
                                <input type="radio" name="gender" id="gender" value="0" checked> 
                                <label class="control-label"> Female &nbsp;</label>
                                <input type="radio" name="gender" id="gender" value="1"></h4>
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


                                    <input type="date" name="dob" id="dob" placeholder="Date of birth" class="form-control">
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
                                <input type="text" name="nic" id="nic" laceholder="Ex: 882350568V " class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">

                            <div class="col-md-6">
                                <h4><label class="control-label">Contact Number 1</label></h4>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="cno1" id="cno1" placeholder="07778388344" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="col-md-6">
                                <h4><label class="control-label">Contact Number 2</label></h4>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="cno2" id="cno2" placeholder="07778388344" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">

                            <div class="col-md-6">
                                <h4><label class="control-label">User Role</label></h4>
                            </div>
                            <div class="col-md-6">
                                <select name="user_role" id="user_role" class="form-control">
                                    <option value=""></option>
                                    <?php while ($row = $roleResult->fetch_assoc()) { ?>
                                        <option value="<?php echo $row["role_id"] ?>"><?php echo $row["role_name"] ?></option>
                                    <?php } ?>
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
                                <img id="prev_img" />
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


                            <button type="submit" class="form-control btn btn-primary"> <span class="glyphicon glyphicon-floppy-disk"></span> SUBMIT</button>

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