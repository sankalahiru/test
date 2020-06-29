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
                <h3 align="center">Brands</h3>
                <div class="row">
                    <div class="col-md-12">
                        <ul class="nav nav-pills">
                            <li><a href="add-brands.php">Add Brands</a> </li>    
                            <li><a href="categories.php">Add Categories</a> </li>    
                            <li><a href="sub-categories.php">Add Sub Categories</a> </li>    
                        </ul>
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