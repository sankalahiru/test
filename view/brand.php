<?php
include '../commons/session.php';
?>

<html>

<head>
    <?php

    include '../includes/bootstrap_includes_css.php';



    include '../model/module_model.php';
    $moduleObj = new Module();
    $moduleResult = $moduleObj->getAllModules();

    include '../model/user_model.php';
    $userObj = new User();

    include '../model/brand_model.php';
    $brandObj = new Brand();
    $brandResult = $brandObj->getAllBrands();


    

   


    include '../model/category_model.php';
    $categoryObj = new Category();
    $categoryResult = $categoryObj->getAllCategories();
    $categoryResult2 = $categoryObj->getAllCategories();


    include '../model/sub_category_model.php';
    $subCategoryObj = new SubCategory();
    $subCategoryResult = $subCategoryObj->getAllSubCategories();


  
   
    

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
            <div class="col-md-2">
                <ul class="list-group">

                    <a href="brand.php" class="list-group-item">
                        <span class="glyphicon glyphicon-plus">

                        </span>&nbsp;
                        Brand</a>
                    <a href="view-user.php" class="list-group-item">
                        <span class="glyphicon glyphicon-search">

                        </span>&nbsp;
                        Categories and Sub Categories</a>
                    <a href="view-user.php" class="list-group-item">
                        <span class="glyphicon glyphicon-search">

                        </span>&nbsp;
                        Manage Products</a>
                </ul>
            </div>
            <div class="col-md-10">
                <div class="row">
                    <h1 align="center">Brand</h1>
                </div>
                <div class="col-md-12">
                    <ul class="nav nav-pills">
                        <li><a href="#" data-toggle="modal" data-target="#myModal">Add Brands</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#categoryModal">Add Catogories</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#subCatModal">Add Sub-categories</a></li>

                    </ul>
                </div>
                <?php
                if (isset($_REQUEST["msg"]) || (isset($_REQUEST["error"]))) {
                ?>
                    <div class="row">
                        <div class="col-md-12">
                            <?php
                            if (isset($_REQUEST["msg"])) {
                            ?>
                                <div class="alert alert-success">
                                    <?php echo base64_decode($_REQUEST["msg"]) ?>
                                </div>
                            <?php
                            } else {
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

                <div class="row">

                    <div class="row">
                        <div class="col-md-3">&nbsp;</div>
                    </div>

                    <!-- Table -->

                    <div class="col-md-12">
                        <table class="table table-responsive" id="example">
                            <thead>
                                <tr style="background-color: #297c87;color: #FFF">
                                    <th>&nbsp;</th>
                                    <th>BID</th>
                                    <th>Brand Name</th>
                                    <th>Status</th>
                                    <th>&nbsp;</th>
                                </tr>


                            </thead>
                            <tr>
                                <tbody>

                                    <?php
                                    while ($brow = $brandResult->fetch_assoc()) {

                                    ?>
                                        <td>&nbsp</td>
                                        <td><?php echo $brow["brand_id"]; ?></td>
                                        <td><?php echo $brow["brand_name"]; ?></td>
                                        <td><?php

                                            if ($brow["brand_status"] == 1) {
                                                echo "Active";
                                            } else {
                                                echo "Deactive";
                                            }

                                            ?>
                                        </td>
                                        <td>
                                            <button onclick="loadData(<?php echo $brow["brand_id"]; ?>);" class="btn btn-primary" href="#" data-toggle="modal" data-target="#editBrand">

                                                <span class="glyphicon glyphicon-pencil"></span>
                                                Edit


                                            </button>
                                        </td>



                                </tbody>
                            </tr>

                        <?php
                                    }
                        ?>
                        </table>
                    </div>

                    <!-- TAble end-->

                </div>



            </div>



        </div>
        <div class="row">

            <div class="col-md-3">&nbsp;</div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h2>Categories</h2>
                <table class="table table-responsive" id="example">
                    <thead>
                        <tr style="background-color: #297c87;color: #FFF">
                            <th>&nbsp;</th>
                            <th>Cat ID</th>
                            <th>Cat Name</th>
                            <th>Status</th>
                            <th>&nbsp;</th>
                        </tr>


                    </thead>
                    <tr>
                        <tbody>

                            <?php
                            while ($catrow = $categoryResult->fetch_assoc()) {

                            ?>
                                <td>&nbsp</td>
                                <td><?php echo $catrow["cat_id"]; ?></td>
                                <td><?php echo $catrow["cat_name"]; ?></td>
                                <td><?php

                                    if ($catrow["status"] == 1) {
                                        echo "Active";
                                    } else {
                                        echo "Deactive";
                                    }

                                    ?>
                                </td>
                                <td>
                                    <button onclick="loadCategory(<?php echo $catrow["cat_id"]; ?>);" class="btn btn-primary" href="#" data-toggle="modal" data-target="#editBrand">

                                        <span class="glyphicon glyphicon-pencil"></span>
                                        Edit


                                    </button>
                                </td>



                        </tbody>
                    </tr>

                <?php
                            }
                ?>
                </table>

            </div>
            <div class="col-md-6">
                <h2>Sub Categories</h2>
                <table class="table table-responsive" id="example">
                    <thead>
                        <tr style="background-color: #297c87;color: #FFF">
                            <th>&nbsp;</th>
                            <th>Sub Cat ID</th>
                            <th>Sub Cat Name</th>
                            <th>Cat Name</th>
                            <th>Status</th>
                            <th>&nbsp;</th>
                        </tr>


                    </thead>
                    <tr>
                        <tbody>

                            <?php
                            while ($subcatrow = $subCategoryResult ->fetch_assoc()) {

                            ?>
                                <td>&nbsp</td>
                                <td><?php echo $subcatrow["sub_cat_id"]; ?></td>
                                <td><?php echo $subcatrow["sub_cat_name"]; ?></td>
                                <td><?php echo $subcatrow["cat_name"]; ?></td>
                                <td><?php

                                    if ($subcatrow["status"] == 1) {
                                        echo "Active";
                                    } else {
                                        echo "Deactive";
                                    }

                                    ?>
                                </td>
                                <td>
                                    <button onclick="loadCategory(<?php echo $catrow["subcatrow"]; ?>);" class="btn btn-primary" href="#" data-toggle="modal" data-target="#editBrand">

                                        <span class="glyphicon glyphicon-pencil"></span>
                                        Edit


                                    </button>
                                </td>



                        </tbody>
                    </tr>

                <?php
                            }
                ?>
                </table>
            </div>
        </div>
    </div>



    <!-- Creating a Modal-->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <form action="../controller/productcontroller.php?status=add_brand" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3>Create Brand</h3>
                    </div>

                    <!-- Modal Body-->
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label class="control-label">Brand Name</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="brand_name" />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-success" value="save" />
                    </div>
                </div>
            </form>
        </div>
    </div>


    <!--EDIT BRand Modal-->

    <div class="modal fade" id="editBrand" role="dialog">
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
                        <input type="submit" class="btn btn-success" value="Update" />
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Creating a category-->
    <div class="modal fade" id="categoryModal" role="dialog">
        <div class="modal-dialog">
            <form action="../controller/productcontroller.php?status=add_category" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3>Create Category</h3>
                    </div>

                    <!-- Modal Body-->
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label class="control-label">Category Name</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="category_name" />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-success" value="save" />
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!--EDIT Category Modal-->

    <div class="modal fade" id="editCategory" role="dialog">
        <div class="modal-dialog">
            <form action="../controller/productcontroller.php?status=update_category" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3>Edit Category</h3>
                    </div>

                    <!-- Modal Body-->
                    <div class="modal-body">
                        <div id="categorycont">


                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-success" value="Update" />
                    </div>
                </div>
            </form>
        </div>
    </div>


    <!--ADD SubCat Modal-->
    <div class="modal fade" id="subCatModal" role="dialog">
        <div class="modal-dialog">
            <form action="../controller/productcontroller.php?status=add_sub_category" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3>ADD Sub Category</h3>
                    </div>

                    <!-- Modal Body-->
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label class="control-label">Sub Category Name</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="sub_category_name" />
                            </div>
                            <div class="row">
                                &nbsp;
                            </div>

                            <div class="col-md-6">
                                <label class="control-label">Category</label>
                            </div>
                            <div class="col-md-6">
                           <select class="form-control" name="cat_id">
                                <?php
                            while ($catrow2 = $categoryResult2->fetch_assoc()) {

                            ?>
                            <option value="<?php echo $catrow2["cat_id"]; ?>">
                                    
                            <?php echo $catrow2["cat_name"]; ?>
                            </option>
                              
                                <?php
                            }

                            ?>
                             </select>
                             </div>
                            </div>
                        </div>
                    
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-success" value="save" />
                    </div>
                </div>
            </form>
        </div>
    </div>


</body>



<?php
include '../includes/bootstrap_script_includes.php';
?>

<script>
    function loadData(x) {



        var url = "../controller/productcontroller.php?status=edit_brand";
        $.post(url, {
            brand_id: x
        }, function(data) {
            $("#brandcont").html(data).show();
        })


    }





    function loadCategory(x) {

        //alert(x)

        var url = "../controller/productcontroller.php?status=edit_category";
        $.post(url, {
            brand_id: x
        }, function(data) {
            $("#brandcont").html(data).show();
        })


    }
</script>

</html>