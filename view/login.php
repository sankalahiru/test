<html>
    <head>
      <?php
        include '../includes/bootstrap_includes_css.php';
       
      ?>
        
    </head>
    
    <body >
        <div class="container-fluid" style="background-color: #000;height:100%">
            <div class="row">
                <div class="col-md-12"><h1 align="center" style="color: #FFF">ESOFT CLOTHES MANAGEMENT SYSTEM</h1></div>
            </div>
            <div class="row">
                <div class="col-md-12"><p style="color: #FFF;" align="center">Taking Clothes to a New Dimension</p></div>
            </div>
            <div class="row">
                <div class="col-md-12">&nbsp;</div>
            </div>
            <?php
            if(isset($_GET["msg"]))
            {
                $msg=  base64_decode($_GET["msg"]);
            ?>
          
            <div class="row">
                <div class="col-md-3">&nbsp;</div>
                <div class="col-md-6">
                    <div class="alert alert-danger">
                        <h6><?php
                        echo $msg;
                        ?>
                        </h6>
                    </div>
                </div>
                <div class="col-md-3">&nbsp;</div>
            </div>
            <?php
            }
            ?>
            <div class="row">
                     <div class="col-md-3">&nbsp;</div>
                <div class="col-md-6">
                        <div id="alertmsg">

                         </div>
                </div>
                       <div class="col-md-3">&nbsp;</div>
            </div>    
            <div class="row">
                <div class="col-md-3">&nbsp;</div>
                <div class="col-md-6">
                    <form method="post" action="../controller/logincontroller.php?status=login" id="loginform">
                        <div class="panel panel-default" style="height:250px">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-10 col-sm-10 col-xs-10">
                                        <h4>Login</h4>
                                        <p>Enter your username and Password</p>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-2">
                                        <h1 class="h1"><span class="glyphicon glyphicon-lock" ></span></h1>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <input type="text" class="form-control" placeholder="Username" name="username" id="username" required="required"/> 
                                    </div>

                                </div>
                                <br/>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <input type="password" class="form-control" name="password" placeholder="password" id="password" required="required"/>
                                    </div>

                                </div>
                                <br/>
                                <div class="row">
                                    <div class="col-md-12 col-xs-12 col-sm-12">
                                        <input type="submit" class="btn btn-block btn-success" value="Sign-In"/>
                                    </div>

                                </div>

                            </div>  
                        </div> 
                    </form>
                </div>
                <div class="col-md-3">&nbsp;</div>
            </div>
        </div>
        
        
    </body>
   <?php
 include '../includes/bootstrap_script_includes.php';
   
   ?>
    <script src="../js/login_validation.js"></script>
</html>
