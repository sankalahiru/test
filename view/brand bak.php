<?php
 include '../commons/session.php';
 
?>
<html>

<head>

    <?php
   include '../includes/bootstrap_includes_css.php';
   
    include '../model/module_model.php';
    include '../model/user_model.php';
    include '../model/brand_model.php';


    $moduleObj = new Module();
    $moduleResult = $moduleObj->getAllModules();

    $userObj = new User();
    $brandObj = new Brand();
    $brandResult=$brandObj->getAllBrands();

    







    ?>
<script src="../js/jquery-1.12.4.js"></script>

 
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
                            <li><a href="#" data-toggle="modal" data-target="#myModal">Add Brands</a></li>
                            <li><a href="categories.php" >Add Categories</a></li>
                            <li><a href="sub-categories.php" >Add Sub Categories</a></li>

                        </ul>
                        
                    </div>
                </div>
                <?php
                if(isset($_REQUEST["msg"]) ||isset($_REQUEST["error"])){

               
                ?>
                <div class="row">
                    <div class="col-md-12">
                        <?php
                            if(isset($_REQUEST["msg"]))
                            {

                            
                        ?>
                            <div class="alert alert-success">
                                <?php echo base64_decode($_REQUEST["msg"]) ?>
                            </div>

                        <?php
                        }else
                        {
                        ?>
                                <div class="alert alert-danger">
                                <?php echo base64_decode($_REQUEST["error"]) ?>
                            </div>
                        <?php
                        }
                        ?>

                    </div>
                </div>
                <?php
                 }
                ?>

            </div>
            <div>
            <table class="table table-responsive" id="example" >
                    <thead>
                    <tr style="background-color: #bbebed;">
                        
                        <th>BID</th>
                        <th>Brand Name</th>
                        <th>Status</th>
                        <th>&nbsp</th>
                        
                    </thead>
                    <tr>
                    <tbody>
                        <?php
                         while ($userRow = $brandResult->fetch_assoc()) {
                        ?>
                        <td><?php echo $userRow["brand_id"] ?></td>
                        <td><?php echo $userRow["brand_name"] ?></td>
                        <td><?php
                        
                        if( $userRow["brand_status"] =="1")
                        {
                            echo "Active";
                        }else{
                            echo "Deactive";
                        }
                        
                        
                        ?></td>
                        <td>
                        <button href="#" onclick="loadData(<?php echo $userRow["brand_id"] ?>);" data-toggle="modal" data-target="#editbrand" class="btn btn-info">
                        <span class="glyphicon glyphicon-pencil"></span> Edit
                        </button>
                    
                    
                    </td>
                        </tbody>
                        </tr>
                        <?php
                         }
                        ?>

                    
            </div>
        </div>
    </div>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <form action="../controller/productcontroller.php?status=add_brand" method="post">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Create Brand</h3>

            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <label class="control-label" >Brand Name</label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="brand_name">
                        
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-success" value="Save" >

            </div>
        </div>
        </form>
    </div>
</div>



<!-- edit modal -->

<div class="modal fade" id="editbrand" role="dialog">
    <div class="modal-dialog">
    <form action="../controller/productcontroller.php?status=update_brand" method="post">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3>Edit Brand</h3>
                        </div>

                        <!-- Modal Body-->
                        <div class="modal-body">
                            <div id="brandcont">
                                
                                
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-success" value="Update"/>
                        </div>
                    </div>
                </form>    
    </div>
</div>
</body>
<?php

include '../includes/bootstrap_script_includes.php';
?>
<script >
    function loadData(x)
    {
        //alert($x);

        var url="../controller/productcontroller.php?status=editbrand";

      


          $.post(url, {brand_id:x},function( data ) {
            $("#brandcont").html(data).show();
          });
          //alert($x);
    }

</script>

</html>