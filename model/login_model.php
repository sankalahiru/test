<?php

include_once '../commons/dbConnection.php';
        $dbConnObj= new dbConnection();
class Login{
    
    
    public function validateLogin($username,$password)
    {
       
        
     
        $con=$GLOBALS['con'];
        
       $sql="SELECT * FROM user u , login l"
                . " WHERE u.user_id=l.user_id "
                . "AND l.login_username='$username' "
                . "AND l.login_password='$password'";
                $result= $con->query($sql);
                
                return $result;
                
                
    }
       


    
}