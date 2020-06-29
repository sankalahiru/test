<?php

include_once '../commons/dbConnection.php';
        $dbConnObj= new dbConnection();


class SubCategory{
    
    
   public function addSubCategory($subcatName,$cat_id)
   {
        $con=$GLOBALS['con'];
           $sql="INSERT INTO sub_category(sub_cat_name,cat_id)VALUES('$subcatName','$cat_id')";
           $con->query($sql);
           if($con->insert_id>0){
                   return $con->insert_id;
           }else{
                   return false;
           }
   }

   public function getAllSubCategories()
   {
        $con=$GLOBALS['con'];
        $sql = "SELECT * FROM sub_category s, category c WHERE s.cat_id=c.cat_id";
        $result = $con->query($sql);
        return $result;    
   }

   public function getCategory($cat_id)
   {
        $con=$GLOBALS['con'];
        $sql = "SELECT * FROM category WHERE brand_id='$cat_id'";
        $result = $con->query($sql);
        return $result;   
   }


}