<?php

include_once '../commons/dbConnection.php';
        $dbConnObj= new dbConnection();
class User{
    
    
    public function getUserRoles()
    {
       
        
     
        $con=$GLOBALS['con'];
        
        $sql="SELECT * FROM role WHERE role_status='1'";
                $result= $con->query($sql);
                
                return $result;
                
                
    } 
      
    public function getModulesByRole($roleId)
    {
        $con=$GLOBALS['con'];

        $sql="SELECT * FROM module m, module_role r WHERE m.module_id=r.module_id AND r.role_id='$roleId'";
                $result= $con->query($sql);
                
                return $result;
    }

    function getModuleFunctions($moduleId)
    {
        $con=$GLOBALS['con'];

        $sql="SELECT * FROM function WHERE module_id='$moduleId'";

        $result= $con->query($sql);
                
                return $result;

    }

    function validateEmailAddress($email)
    {
        $con=$GLOBALS['con'];
        $sql="SELECT 1 FROM user WHERE user_email = '$email'";
        $result=$con->query($sql);
        if($result->num_rows>0)
        {
            return false;
        }else{
            return true;
        }

    }

    function addUser($user_fname, $user_lname, $user_image, $user_email, $user_nic, $user_dob, $user_gender, $user_role, $user_cno1, $user_cno2, $user_status)
    {

        $con=$GLOBALS['con'];
        $sql = "INSERT INTO user(user_fname,
        user_lname,
        user_image,
        user_email,
        user_nic,
        user_dob,
        user_gender,
        user_role,
        user_cno1,
        user_cno2,
        user_status
        )VALUES('$user_fname', '$user_lname', '$user_image', '$user_email', '$user_nic', '$user_dob', '$user_gender', '$user_role', '$user_cno1', '$user_cno2', '1')";

        $result=$con->query($sql)or die($con->error); //executing the query
        $insertId=$con->insert_id; // last auto incremented value if successful

        return $insertId;       //return it to the controller



    }

    function addLogin($login_username, $login_password, $user_id, $login_status){

        $con=$GLOBALS['con'];
        $sql = "INSERT INTO login(login_username,
        login_password,
        user_id,
        login_status)VALUES('$login_username', '$login_password', '$user_id', '$login_status')";

        $con->query($sql);
        $loginId=$con->insert_id;

        return $loginId;
        

    }

    function addUserFunction($user_id, $function_id){

        $con=$GLOBALS['con'];
        $sql = "INSERT INTO function_user(user_id,
        function_id)VALUES('$user_id', '$function_id')";

        $con->query($sql);



    }

    function viewUsers()
    {
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM user u, role r WHERE u.user_role = r.role_id";
        $result = $con->query($sql);

        return $result;



    }

    function getPriviledges($userId)
    {
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM function_user u, function f WHERE f.function_id = u.function_id AND u.user_id ='$userId'";

        $result = $con->query($sql);
        return $result;

    }

    function getAllUsers()
    {
        
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM user u, role r WHERE u.user_role=r.role_id";

        $result = $con->query($sql);
        return $result;
        
    }

    function deActivateUser($userId)
    {
        $con=$GLOBALS['con'];
        $sql="UPDATE user SET user_status='0' WHERE user_id='$userId'";
        $result = $con->query($sql);


    }


    function activateUser($userId)
    {
        $con=$GLOBALS['con'];
        $sql="UPDATE user SET user_status='1' WHERE user_id='$userId'";
        $result = $con->query($sql);


    }

    function viewUser($userId)
    {
        $con=$GLOBALS['con'];
      
        $sql="SELECT * FROM user u, role r WHERE u.user_role =r.role_id AND u.user_id='$userId'";
        $result = $con->query($sql);
        return $result;
    }



    function getUserFunctions($userId)
    {
        $con=$GLOBALS['con'];
      
        $sql="SELECT * FROM function_user WHERE user_id='$userId'";
        $result = $con->query($sql);
        return $result;


    }

    function updateEmailValidation($userId,$email)
    {
        $con=$GLOBALS['con'];
        $sql="SELECT 1 FROM user WHERE user_email = '$email' AND user_id!=$userId";
        


        $result=$con->query($sql);

        if($result->num_rows>0)
        {
            return false;
            

        }else{
            return true;
        }



    }


  
    function updateUser($userId, $user_fname, $user_lname, $user_image, $user_email, $user_nic, $user_dob, $user_gender, $user_role, $user_cno1, $user_cno2, $user_status)
    {
        $con=$GLOBALS['con'];

        if($user_image!="defaultImage.jpg")
        {

       

        $sql="UPDATE user SET "
                 ."user_fname='$user_fname',"
                 ."user_lname='$user_lname',"
                 ."user_image='$user_image',"
                 ."user_email='$user_email',"
                 ."user_nic='$user_nic',"
                 ."user_dob='$user_dob',"
                 ."user_gender='$user_gender',"
                 ."user_cno1='$user_cno1',"
                 ."user_cno2='$user_cno2',"
                 ."user_role='$user_role'"
                 ."WHERE user_id='$userId'";

        }else
        {
            $sql="UPDATE user SET "
            ."user_fname='$user_fname',"
            ."user_image='$user_image',"
            ."user_email='$user_email',"
            ."user_nic='$user_nic',"
            ."user_dob='$user_dob',"
            ."user_gender='$user_gender',"
            ."user_cno1='$user_cno1',"
            ."user_cno2='$user_cno2',"
            ."user_role='$user_role'"
            ."WHERE user_id='$userId'";

        }

               //  echo $sql;
        $result=$con->query($sql) or die($con->error);


    }


    function removeUserFunctions($userId)
    {
        $con=$GLOBALS['con'];
        $sql="DELETE FROM function_user WHERE user_id='$userId'";
        $result=$con->query($sql) or die($con->error);


    }

    function getActiveUserCount()
    {
        $con=$GLOBALS['con'];
        $sql="SELECT COUNT(user_id) as countactiveuser FROM user WHERE user_status='1'";
        $result=$con->query($sql) or die($con->error);

        $row=$result->fetch_assoc();

        $activeUserCount = $row["countactiveuser"];

        return $activeUserCount;


    }


    function getDeactiveUserCount()
    {

        
        $con=$GLOBALS['con'];
        $sql="SELECT COUNT(user_id) as countdeactiveuser FROM user WHERE user_status='0'";
        $result=$con->query($sql) or die($con->error);

        $row=$result->fetch_assoc();

        $deactiveUserCount = $row["countdeactiveuser"];

        return $deactiveUserCount;

        




    }
      
      

    
}