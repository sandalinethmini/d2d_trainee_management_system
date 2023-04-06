<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>


<!doctype html>
<html lang="en">

<!-- Mirrored from bootadmin.net/demo/examples/login by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 15 Aug 2018 09:17:14 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<base href="<?php echo base_url(); ?>">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" href="css/bootadmin.min.css">

    <title>Login | RDB | Network</title>
</head>
<body class="bg-light">

        <div class="container h-100">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-md-4">
                <h1 class="text-center mb-4">_______________ </h1>
                <div class="card">
                    <div class="card-body">
                        <form class="form-signin" action="<?php echo base_url().'index.php/session/SessionDataCon'?>" method="post">
                        	<div class="input-group mb-3">
                                 <?php 
									if($this->session->flashdata('fail'))
									{
										echo '<span class="text-center spanError" style="color: #FF2331">'.$this->session->flashdata('fail').'</span>';					
									}		
								?>
                            </div>
                        
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Username" required id="txtUserId" name="txtUserId">
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-key"></i></span>
                                </div>
                                <input type="password" class="form-control" placeholder="Password" id="txtPassword" name="txtPassword">
                            </div>

                           

                            <div class="row">
                                
                                <div class="col pl-2">
                                    <!--<a class="btn btn-block btn-link" href="#">Forgot Password</a>-->
                                </div>
                                <div class="col pr-2">
                                    <button type="submit" class="btn btn-block btn-primary">Login</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>

<script src="js/bootadmin.min.js"></script>


</body>

<!-- Mirrored from bootadmin.net/demo/examples/login by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 15 Aug 2018 09:17:14 GMT -->
</html>



















