<div class="row">
            <div class="col-md-3">
                <h4> <span class="glyphicon glyphicon-user"></span><span><?php echo $_SESSION["user"]['firstname']." ".$_SESSION["user"]['lastname'];;    ?></span></h4>
            </div>
            <div class="col-md-8">
                <h4 align="center">ESOFT CLOTHES MANAGEMENT SYSTEM</h4>
            </div>
            <div class="col-md-1">

                <a href="../controller/logincontroller.php?status=logout" class="btn btn-primary">Logout</a>
            </div>
        </div>