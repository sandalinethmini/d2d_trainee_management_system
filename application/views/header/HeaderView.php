
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
    <base href="<?php echo base_url(); ?>">
	<?php include 'headerincludes/head_includes.php'; ?>

    <title>RDB | Network</title>
    

		
</head>
<body class="bg-light">

<nav class="navbar navbar-expand navbar-dark bg-primary" >
    <a class="sidebar-toggle mr-3" href="#"><i class="fa fa-bars"></i></a>
    <a class="navbar-brand" href="index.php/Home"> Application Manager</a>

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
            <li><a href="index.php/Home"><i class="fa fa-fw fa-tachometer-alt"></i> Home</a></li>
           <?php if($master_data){?> <li>
                <a href="#sm_base" data-toggle="collapse">
                    <i class="fa fa-fw fa-cube"></i> Administrator
                </a>
                
        
                <ul id="sm_base" class="list-unstyled collapse">
               		<?php if($user_details){?><li><a href="index.php/masterData/UserDetails">User Management</a></li><?php }?>
                   <?php /*?> <?php if($area_code){?><li><a href="index.php/masterData/AreaDetails">Area Details</a></li><?php }?><?php */?>
                    
                </ul>
            </li><?php }?>
           
            
            <?php if($application){?><li>
                <a href="#sm_application" data-toggle="collapse" aria-expanded="true">
                    <i class="fa fa-fw fa-table"></i> Application
                </a>
                <ul id="sm_application" class="list-unstyled collapse">
       
                      <?php if($circuit_details){?><li><a href="index.php/application/Site">Circuit Details</a></li><?php }?>
                      <?php if($sdwan_details){?><li><a href="index.php/application/SDWANSite">SD WAN Accounts</a></li><?php }?>
                      <?php if($officer_details){?><li><a href="index.php/application/OfficerDetails">Officer Details</a></li><?php }?>  
					  <?php if($job_details){?><li><a href="index.php/application/Jobs">Job Details</a></li><?php }?>
                      <?php if($sdwan_job_details){?><li><a href="index.php/application/SDWANJobs">SD WAN Details</a></li><?php }?>
					                       
                </ul>
            </li><?php }?>
			
		 	<?php if($reports){?><li>
                <a href="#sm_report" data-toggle="collapse" aria-expanded="true">
                    <i class="fa fa-fw fa-table"></i> Reports
                </a>
                <ul id="sm_report" class="list-unstyled collapse">

                      <?php if($history_reports){?><li><a href="index.php/application/HistoryReports">History Reports</a></li><?php }?>
					  <?php if($officer_details){?><li><a href="index.php/application/OfficerDetailsReport">Officer Details Report</a></li><?php }?>
					  <?php if($job_report){?><li><a href="index.php/application/JobReports">Job Details Report</a></li><?php }?>
                      <?php if($sdwan_job_report){?><li><a href="index.php/application/SDWANJobReports">SD WAN Job Report</a></li><?php }?>
					  
                                 
                </ul>
            </li><?php }?>

           
        </ul>
    </div>        