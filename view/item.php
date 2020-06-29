<?php
 include '../commons/session.php';
?>
<html>

<head>
    <?php
    include '../includes/bootstrap_includes_css.php';
    include '../model/module_model.php';
    include '../model/user_model.php';
    $moduleObj = new Module();
    $moduleResult = $moduleObj->getAllModules();

    $userObj = new User();

    







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

            <div class="col-md-3">&nbsp;</div>
        </div>
    </div>

    <div class="container">
        <div class="col-md-12">
            <div class="col-md-2">
                <h4>
                <ul class="list-group">
                   <a class="list-group-item" href="brand.php"><span class="glyphicon glyphicon-plus"></span>  Brand</a> 
                    <a class="list-group-item" href="view-user.php"><span class="glyphicon glyphicon-search"></span>  Categories and Sub Categories</a> 
                    <a class="list-group-item" href="view-user.php"><span class="glyphicon glyphicon-search"></span>  Manage Products</a> 
                </ul>
                </h4>

            </div>
            <div class="col-md-10">
                <h3 align="center">Your Product Digest</h3>
                <div class="col-md-6">
                    <div class="col-md-12 col-md-offset-1" style="height: 200px;background-color:#dfe8da ">


                        <h4 style="color: #767a73;" align="center">

                            Active users
                        </h4>
                        <div class="row">
                            <h1 align="center" style="font-size:100px"><?php echo  $userObj->getActiveUserCount(); ?></h1>
                        </div>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="col-md-12 col-md-offset-1" style="height: 200px;background-color:#bbebed">


                        <h4 style="color: #767a73;" align="center">

                            Deactivated
                        </h4>
                        <div class="row">
                            <h1 align="center" style="font-size:100px"><?php echo  $userObj->getDeactiveUserCount(); ?></h1>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>


</body>
<?php
include '../includes/bootstrap_script_includes.php';

?>
<script src="../js/login_validation.js"></script>

</html>