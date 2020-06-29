<?php
 include '../commons/session.php';
?>
<html>

<head>

    <link rel="stylesheet" href="../css/dataTables.bootstrap.min.css">
    <?php
    include '../includes/bootstrap_includes_css.php';
    // include '../model/module_model.php';

    include '../model/user_model.php';  // crash

    $userObj = new User(); // creating the object of the class
    $userResult = $userObj->getAllUsers();

    //$moduleObj = new Module();





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
                        <a class="list-group-item" href="add-user.php"><span class="glyphicon glyphicon-plus"></span> Add User</a>
                        <a class="list-group-item" href="view-user.php"><span class="glyphicon glyphicon-search"></span> View User</a>
                    </ul>
                </h4>

            </div>
            <div class="col-md-10">
                <?php

                if (isset($_REQUEST["msg"])) {

                ?>


                    <div class="col-md-12">
                        <div id="" class="alert alert-success">
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
                <table class="table table-responsive" id="example" >
                    <thead>
                    <tr style="background-color: #bbebed;">
                        <th>&nbsp</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>User Role</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>&nbsp</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($userRow = $userResult->fetch_assoc()) {

                            $userId = $userRow["user_id"];
                            $userId = base64_encode($userId);

                        ?>

                            <tr>
                                <td><img src="../images/user_image/<?php echo  $userRow["user_image"] ?>" alt="" width="50" height="40"></td>
                                <td><?php echo $userRow["user_fname"] ?></td>
                                <td><?php echo $userRow["user_lname"] ?></td>
                                <td><?php echo $userRow["role_name"] ?></td>
                                <td><?php echo $userRow["user_email"] ?></td>
                                <td><?php


                                    if ($userRow["user_status"] == "1") {
                                        echo "Active";
                                    } else {
                                        echo "Deactive";
                                    }

                                    ?></td>
                                <td>
                                <a href="display-user.php?user_id=<?php echo $userId; ?>" class="btn btn-default">
                                    <span class="glyphicon glyphicon-search"></span>
                                  
                                    &nbsp;View
                                </a>
                                &nbsp;

                                <?php

                            if ($userRow["user_status"] == "0") {
                                ?>

                                <a href="../controller/usercontroller.php?status=activateUser&user_id=<?php echo $userId; ?>"class="btn btn-success">
                                    <span class="glyphicon glyphicon-refresh"></span>
                                  
                                    &nbsp;Activate
                                </a>
                                &nbsp;

                                <?php
                            }else{
                                ?>
                                <a href="../controller/usercontroller.php?status=deactivateUser&user_id=<?php echo $userId; ?>" class="btn btn-danger">
                                    <span class="glyphicon glyphicon-remove"></span>
                                    &nbsp;Deactivate
                                
                                </a>

                                <?php
                            }
                                ?>
                               
                        </td>
                            </tr>

                        <?php

                        }

                        ?>
                    </tbody>

                </table>

            </div>
        </div>
    </div>


</body>
<?php
//include '../includes/bootstrap_script_includes.php';


?>
<script src="../js/datatable/jquery-3.5.1.js"></script>
<script src="../js/datatable/jquery.dataTables.min.js"></script>
<script src="../js/datatable/dataTables.bootstrap.min.js"></script>

<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>


</html>