
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
    <base href="<?php echo base_url(); ?>">
	<?php include 'headerincludes/head_includes.php'; ?>

    <title>RDB</title>
    

		
</head>
<body class="bg-light">

<nav class="navbar navbar-expand navbar-dark bg-dark" >
    <a class="sidebar-toggle mr-3" href="#"><i class="fa fa-bars"></i></a>
    <a class="navbar-brand" href="index.php/Home">D2D & Trainee Management System</a>

  <div class="navbar-collapse collapse">
        <ul class="navbar-nav ml-auto">
           <!-- <li class="nav-item"><a href="#" class="nav-link"><i class="fa fa-envelope"></i> 5</a></li>
            <li class="nav-item"><a href="#" class="nav-link"><i class="fa fa-bell"></i> 3</a></li>-->
            <li class="nav-item dropdown">
                <a href="#" id="dd_user" class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $this->session->userdata('user_full_name'); ?></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd_user">
                    <?php if($password_reset){?><a href="index.php/userSettings/passwordReset" class="dropdown-item">Change Password</a><?php }?>
                    <a href="index.php/logout/logout_page" class="dropdown-item ">Logout</a>
                </div>
            </li>
        </ul>
    </div>
</nav>

<div class="d-flex">
    <div class="sidebar sidebar-dark bg-dark">
        <ul class="list-unstyled">
            <li><a href="index.php/Home"><i class="fa fa-university" aria-hidden="true"></i> Home</a></li>
           <?php if($administration || $user_accounts || $set_time){?> <li>
                <a href="#sm_base" data-toggle="collapse"><i class="fa fa-user" aria-hidden="true"></i> Administrator</a>

                <ul id="sm_base" class="list-unstyled collapse">
                    <?php if($user_accounts){?><li><a href="index.php/masterData/UserDetails"><i class="fa fa-user"></i> User Details</a></li><?php }?> 
                    <?php if($set_time){?><li><a href="index.php/SetTimeController"><i class="fa fa-clock"></i> Set Report Time</a></li><?php }?>  
                </ul>
            </li><?php }?>
          
          	<?php if($upload_file || $atm_switch_file){?> <li>
                <a href="#sm_base1" data-toggle="collapse"><i class="fa fa-file" aria-hidden="true"></i> Employee</a>
                
                <ul id="sm_base1" class="list-unstyled collapse">
                    <l>
          
                <?php if($account_search){?><li><a href="index.php/newd2d"><i class="fa fa-search" aria-hidden="true"></i></i> D2D</a></li><?php }?>
                
                </li>
                

               <li>
          
                <?php if($account_search){?><li><a href="index.php/check_trainee"><i class="fa fa-search" aria-hidden="true"></i></i> Trainee</a></li><?php }?>
                
                
                </ul>
            </li><?php }?> 
            <?php if($account_search){?><li><a href="index.php/register_trainee/"><i class="fa fa-search" aria-hidden="true"></i></i> Register Trainee</a></li><?php }?>
                      

			<?php if($account_search){?><li><a href="index.php/all_trainee"><i class="fa fa-search" aria-hidden="true"></i></i>Active Trainees</a></li><?php }?>
            <?php if($account_search){?><li><a href="index.php/alltrainee"><i class="fa fa-search" aria-hidden="true"></i></i> Full Training History</a></li><?php }?>
            <?php if($account_search){?><li><a href="index.php/recent_trainee"><i class="fa fa-search" aria-hidden="true"></i></i> Recent Trainees</a></li><?php }?>
            

            <?php if($account_search){?><li><a href="index.php/early_disable"><i class="fa fa-search" aria-hidden="true"></i></i> Early Disable Page</a></li><?php }?>

			<?php if($download_status_file || $settlement_file){?> <li>
                <a href="#sm_base2" data-toggle="collapse"><i class="fa fa-file" aria-hidden="true"></i> Reports</a>
                
                <ul id="sm_base2" class="list-unstyled collapse">
          			<?php if($download_status_file){?><li><a href="index.php/trainee_pdf"><i class="fa fa-fw fa-download"></i> pdf</a></li><?php }?>
					
					<?php if($settlement_file){?><li><a href="index.php/PdfReport"><i class="fa fa-fw fa-download"></i> Download Settlement File</a></li><?php }?>
                    
                </ul>
            </li><?php }?> 
        </ul>
    </div>        


    