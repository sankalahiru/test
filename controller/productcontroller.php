<?php

include '../model/brand_model.php';
    $brandObj = new Brand(); // create Brand Object

    include '../model/category_model.php';
    $categoryObj = new Category(); // create Category Object

    include '../model/sub_category_model.php';  // create sub Category Object
    $subCategoryObj = new SubCategory();


if(!isset($_REQUEST["status"]))
{
    ?>
<script> window.location="index.php"</script>

<?php
}
else{
   $status = $_REQUEST["status"];
 
    switch ($status) {
        case "add_brand":
            
            try{
            
                $brand_name= $_POST["brand_name"];

                $brand_id = $brandObj->addBrand($brand_name);

                if($brand_id>0)
                    {
                        $msg="Brand $brand_name successfully added";
                        $msg= base64_encode($msg);
                        ?>
                        <script> window.location="../view/brand.php?msg=<?php echo $msg; ?>"</script>
                        <?php
                    }
                else {
                        throw new Exception("Brand Addition Error");
                     }
            }
            catch (Exception $ex)
            {
                $msg=$ex->getMessage();
                $msg= base64_encode($msg);
                ?>
                    <script> window.location="../view/brand.php?error=<?php echo $msg; ?>"</script>
                <?php
            }

            break;

            
            case "edit_brand":
                
                $brand_id= $_POST["brand_id"];
                
                $brandResult = $brandObj->getBrand($brand_id);
                
                $bRow= $brandResult->fetch_assoc();
                
                ?>
                    
                    <div class="row">
                                <div class="col-md-6">
                                    <label class="control-label">Brand Name</label>
                                </div>
                        
                        <input type="hidden" name="brand_id" value="<?php echo $bRow["brand_id"];?>"/>
                        
                                <div class="col-md-6">
                                    <input type="text" class="form-control" value="<?php echo $bRow["brand_name"]?>" name="brand_name"/>
                                </div>
                     </div>
            
                    
                    <?php
            
            break;    
            
            
        case "update_brand":
            
           echo $brand_id=$_POST["brand_id"];
          echo   $brand_name=$_POST["brand_name"];
            

          //  
            $brandObj->updateBrand($brand_id,$brand_name);
            
            $msg="Brand $brand_name updated Successfully";
            $msg= base64_encode($msg);

            //die();
            
            ?>
                <script> window.location="../view/brand.php?msg=<?php echo $msg; ?>"</script>
            <?php
             
            
        
        
        
            break;

            case "add_category":
            
                $catName= $_POST["category_name"];
                $catst = $categoryObj->addCategory($catName);

                if($catst)
                {
                    $msg = "Successfuly added category";
                    $msg = base64_encode($msg);
                    ?>
                    <script> window.location="../view/brand.php?msg=<?php echo $msg; ?>"</script>
                <?php
                }else
                {
                    $msg = "Failed adding category";
                    $msg = base64_encode($msg);
                    ?>
                    <script> window.location="../view/brand.php?error=<?php echo $msg; ?>"</script>
                <?php
                }

    
                break;


                case "edit_category":
                
                    $cat_id= $_POST["cat_id"];
                    
                    $categoryResult = $categoryObj->getCategory($cat_id);
                    
                    $bRow= $brandResult->fetch_assoc();
                    
                    ?>
                        
                        <div class="row">
                                    <div class="col-md-6">
                                        <label class="control-label">Category Name</label>
                                    </div>
                            
                            <input type="hidden" name="brand_id" value="<?php echo $bRow["getCategory"];?>"/>
                            
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" value="<?php echo $bRow["brand_name"]?>" name="brand_name"/>
                                    </div>
                         </div>
                
                        
                        <?php
                
                break; 

                case "update_category":
            
                    echo $cat_id=$_POST["cat_id"];
                   echo   $category_name=$_POST["category_name"];
                     
         
                   //  
                     $categoryObj->updateCategory($cat_id,$category_name);
                     
                     $msg="Category $brand_name updated Successfully";
                     $msg= base64_encode($msg);
         
                     //die();
                     
                     ?>
                         <script> window.location="../view/brand.php?msg=<?php echo $msg; ?>"</script>
                     <?php
                      
                     
                 
                 
                 
                     break;

                     case "add_sub_category":

                        $sub_cat_name = $_POST["sub_category_name"];
                        $cat_id = $_POST["cat_id"];

                       // die();
                        $subCategoryResult = $subCategoryObj->addSubCategory($sub_cat_name,$cat_id);
                        if($subCategoryResult)
                        {
                            $msg = "Successfuly added sub category";
                            $msg = base64_encode($msg);
                            ?>
                            <script> window.location="../view/brand.php?msg=<?php echo $msg; ?>"</script>
                        <?php
                        }else
                        {
                            $msg = "Failed adding sub category";
                            $msg = base64_encode($msg);
                            ?>
                            <script> window.location="../view/brand.php?error=<?php echo $msg; ?>"</script>
                        <?php
                        }

                     break;
    }
    
    
}
