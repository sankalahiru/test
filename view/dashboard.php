<?php
 include '../commons/session.php';
?>

<html>

<head>
    <?php
   

    include '../includes/bootstrap_includes_css.php';
    include '../model/module_model.php';

    include '../model/user_model.php';
    $userObj = new User();




    $moduleObj = new User();
    


   // print_r($_SESSION['user']);

    $role_id = $_SESSION["user"]['role_id'];

    //$moduleResult = $moduleObj->getAllModules();
    $moduleResult = $moduleObj->getModulesByRole($role_id);

  
   // print_r($moduleResult);

   

    
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

            <?php
            $counter = 0;
            while ($row = $moduleResult->fetch_assoc()) {

                

            ?>
                <a href="<?php echo strtolower($row["module_url"]) ;?>">
                <div class="col-md-3 col-md-offset-1" style="height: 200px;background-color:#33C1FF ">

                    
                        <h4 style="color: #FFF;" align="center">
                            <?php
                            echo ucfirst($row["module_name"]);

                            ?>
                        
                   
                    <br>
                     <img  src="../images/iconset/<?php echo $row["module_image"] ?>" alt="" width="100px" height="100px" >
                    
                    </h4>

                </div>
                </a>

                <?php
                $counter++;

                if ($counter % 3 == 0) {
                ?>
        </div>
        <div class="row">
            <div class="col-md-12">&nbsp;</div>
        </div>
        <div class="row">
    <?php
                }
            }

    ?>
        </div>
        <div class="row">

            <div class="col-md-3">&nbsp;</div>
        </div>
    </div>


</body>
<?php
include '../includes/bootstrap_script_includes.php';

?>
<script src="../js/login_validation.js"></script>

</html>