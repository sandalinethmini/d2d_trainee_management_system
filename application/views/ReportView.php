<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Regional Development Bank</title>
	<base href="<?php echo base_url(); ?>">
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
	

	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.bundle.min.js"></script>
	<script src="js/datatables.min.js"></script>
	<script src="js/bootadmin.min.js"></script>
    
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" href="css/datatables.min.css">  
    <link rel="stylesheet" href="css/bootadmin.min.css">
    
    <style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	
	.field-height{	padding-top:0px;height:24px; font-size:12px	}
	
	table#recordTable tbody td{
	font-size:13px;
	}
	
	table#recordTable thead th
	{
		font-size:14px;
	}

.btn-circle{
	width: 22px;
  height: 22px;
  padding: 1px 0;
  border-radius: 15px;
  text-align: center;
  font-size: 12px;
  line-height: 1.428571429;
}
	
</style>
</head>
<body style="margin:  auto; width:85%;">



<div class="content p-4" >

	<nav class="navbar navbar-expand navbar-dark bg-primary" >
    <a class="sidebar-toggle mr-3" href="#"><i class="fa fa-bars"></i></a>
    <a class="navbar-brand" href="index.php/Report">RDB ID Card Data Collection</a>

    <div class="navbar-collapse collapse">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a href="#" id="dd_user" class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $this->session->userdata('user_full_name'). " / ". $this->session->userdata('user_area') ; ?></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd_user">
                    <?php if(true){?><a href="index.php/passwordReset" class="dropdown-item">Change Password</a><?php }?>
                    <a href="index.php/LogoutPage" class="dropdown-item ">Logout</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
 
        <!--<h2 class="mb-4">Cards</h2>-->
		
        <div class="card mb-4" style="margin-top:5px;">
        
            <div class="card-header bg-white font-weight-bold">
                Employee ID Card Details
            </div>
			
			
            <div class="card-body">
                <div class="col-md-12 col-md-auto">
                    <form id="form_application" method="post" action="index.php/Report/getReport"  >
                   	 
                   	 
                   	
                            <div class="row col-md-12">
                                
                                    <div class="col-md-1">   
                                        <label class="lblStrong">Province:</label>
                                    </div>
                                    <div class="col-md-2">
                                        <?php echo form_dropdown('provinceInput', $provinceList,set_value('provinceInput'), 'class="form-control"  style= "padding-top:0px;height:25px; font-size:13px"     id="provinceInput" ');  ?>
                                    </div>
                                
                                    <div class="col-md-1 offset-md-1">
                                        <label class="lblStrong">Branch : </label>
                                    </div>
                                    <div class="col-md-3">
                                       <?php echo form_dropdown('cmbBranchCodeInput', $branchList,set_value('cmbBranchCodeInput'), 'class="form-control" style="padding-top:0px;height:25px; font-size:13px"      id="cmbBranchCodeInput" ');  ?>
                                    </div>
                                    
                                    <div class="col-md-1 offset-md-1">
                                        <button class="btn btn-success field-height" type="submit">Report</button>
                                    </div>
                                    <div class="col-md-1">
                                        
                                        <button type="button" id="btnDownload" class="btn btn-warning button-style field-height" disabled>Download Images</button>
                                    </div>
                                
                            </div>
							
							

	 
                   	
                            
							
							
							
							
							
							
							
							
							
		 <!-- <br/>
		
	 <hr style=" border: 0; height: 1px; background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));">-->
	
	<div style="width: 100%; height: 12px; border-bottom: ; text-align: left; margin-bottom: 20px;margin-top: 20px;"> <span style="font-size: 14px; background-color: ; padding: 0 10px;">		
	<strong style="color:#ff2530">*</strong> <strong style="color:blue"><u> ID Card Collection Details</u>
                             <!--Padding is optional-->
                 	   </strong></span> </div>	
							
						
			  
			  
							
						 </form>
          </div>
                        
       
    
     <div class="card mb-4">
            <div class="card-body">
                <table id="recordTable" class="table table-hover table-striped table-sm" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Code</th>
                        <th>Name</th>
						<th>NIC</th> 
                        <th>Designation</th>
                        <th>Province</th>
                        <th>Branch</th>
						
                        <th class="action">Actions</th>
                    </tr>
                    </thead>

                    </tbody>
                </table>
            </div>
        </div>
    
</div>


<div class="modal fade bd-confirm-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"  aria-hidden="true" id="modal_download">
  <div class="modal-dialog modal-sm modal-dialog-centered">
    <div class="modal-content">
      <form action="index.php/Report/downloadFiles" method="post" id="form_download">
      <div class="modal-header" style="background-color: #00a8b8;border-radius: 5px;padding: 10px;color:#fff">
        <h5 class="modal-title">Download Files</h5>
      </div>
      <div class="modal-body">
        <p>Do you want to Download Images?</p>
        <input type="hidden" id="hiddenProvince" name="hiddenProvince" >	
      </div>
      
      
      
      <div class="modal-footer">
        <button type="button" id="downloadBtn" name="downloadBtn" class="btn btn-success button-style" style="cursor:pointer"">Yes</button>
        <button type="button"  class="btn btn-warning button-style" data-dismiss="modal" style="cursor:pointer" >No</button>
      </div>
      </form>
      
    </div>
  </div>
</div>

</body>
</html>

<script>

 $(document).ready(function () {
		
		DataTable();
		
		
	$( "#provinceInput" ).change(function() {
			$("#cmbBranchCodeInput").val("");
			if($("#provinceInput").val()!=""){
				$("#hiddenProvince").val($("#provinceInput").val());
				$('#btnDownload').prop('disabled', false);
			}
			else{
				$("#hiddenProvince").val("");
				$('#btnDownload').prop('disabled', true);
			}
	});
	
	$( "#cmbBranchCodeInput" ).change(function() {
			$("#provinceInput").val("");
			$('#btnDownload').prop('disabled', true);
	});
	
	$( "#btnDownload" ).click(function() {
		$("#modal_download").modal(("show"));
    });
	
	$('#downloadBtn').click(function(e) {
			e.preventDefault(); // Prevents the default form submission behavior
			$('#form_download').submit();
			$('#modal_download').modal('hide');     
		});
		
		

    });
	
	
	function DataTable()
	{
		$('#recordTable').DataTable({ 
		
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
           // "url": '',
			 "url": 'index.php/Report/recordlist',
            "type": "POST"
        },

		
		"columnDefs": 
		[
		{
			"targets": [0,2,3,4,7],
			"orderable": false
		},
		{ 
			className: 'text-center', targets: [0,7] },	
		{
			"targets": 7,
			"data": "status",
			"render": function (data, type, row, meta) {
					return '<a href="<?php echo 'index.php/Report/printApplication/'?>'+row[7]+'\" target="_blank"><i class="fa fa-fw fa-download"></i></a>'	;		
}
		}
         
        ]// end of columnDefs
		});// end of Datatable
	}



</script>
