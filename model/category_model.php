<?php

include_once '../commons/dbConnection.php';
        $dbConnObj= new dbConnection();


class Category{
    
    
   public function addCategory($catName)
   {
        $con=$GLOBALS['con'];
           $sql="INSERT INTO category(cat_name)VALUES('$catName')";
           $con->query($sql);
           if($con->insert_id>0){
                   return $con->insert_id;
           }else{
                   return false;
           }
   }

   public function getAllCategories()
   {
        $con=$GLOBALS['con'];
        $sql = "SELECT * FROM category";
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