<?php
include '../model/brand_model.php';
$brandObj = new Brand();

if(!isset($_REQUEST["status"]))
{
    ?>
    <script> window.location="../index.php"</script>
 
            <?php

}else
{
  $status = $_REQUEST["status"];
  

  switch($status)
  {
      case "add_brand":
        

        try{
        $brand_name = $_POST["brand_name"];
        $brand_id=$brandObj->addBrand($brand_name);

        if($brand_id>0)
        {
            $msg="Brand $brand_name Successfully Added";
            $msg = base64_encode($msg);
            ?>
            <script> window.location="../view/brand.php?msg=<?php echo $msg;?>"</script>
         
                    <?php
        }else
        {
            throw new Exception("Brand Addition Error");
        }
    }catch (Exception $ex)
    {
        $msg = $ex->getMessage();
        $msg= base64_encode($msg);
        ?>
            <script> window.location="../view/brand.php?msg=<?php echo $msg;?>"</script>
         
                    <?php
    }
       
      break;

      case "editbrand":
                
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
            
        $brand_id=$_POST["brand_id"];
        $brand_name=$_POST["brand_name"];
        die();
        $brandObj->updateBrand($brand_id,$brand_name);
        
        $msg="Brand $brand_name updated Successfully";
        $msg= base64_encode($msg);
        
        ?>
            <script> window.location="../view/brand.php?msg=<?php echo $msg; ?>"</script>
        <?php
         
        
    
    
    default:
        break;
  }
}
?>