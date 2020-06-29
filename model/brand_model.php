<?php

include_once '../commons/dbConnection.php';
        $dbConnObj= new dbConnection();


class Brand{
    
    
   public function addBrand($brandName)
   {
        $con=$GLOBALS['con'];
           $sql="INSERT INTO brand(brand_name)VALUES('$brandName')";
           $con->query($sql);
           if($con->insert_id>0){
                   return $con->insert_id;
           }else{
                   return false;
           }
   }

   public function getAllBrands()
   {
        $con=$GLOBALS['con'];
        $sql = "SELECT * FROM brand";
        $result = $con->query($sql);
        return $result;    
   }

   public function getBrand($brand_id)
   {
        $con=$GLOBALS['con'];
        $sql = "SELECT * FROM brand WHERE brand_id='$brand_id'";
        $result = $con->query($sql);
        return $result;   
   }

   public function updateBrand($brand_id, $brand_name)
   {
        $con=$GLOBALS['con'];
        $sql="UPDATE brand SET brand_name='$brand_name' WHERE brand_id='$brand_id'";
        $result = $con->query($sql);
   }

        

      

    
}