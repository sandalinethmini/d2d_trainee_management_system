<style>
.row-double-space{	padding-top:20px;	}
.row-space{	padding-top:7px;	}
.field-height{	padding-top:0px;height:22px; font-size:12px	}
#recordTable > thead > tr > th {padding:3px;font-size:13px}
#recordTable > tbody > tr > td{padding:2px; font-size:13px}


	.form-row>.col, .form-row>[class*=col-] {
    padding-right: 15px;
}
.lblStrong {
    font-weight:bold;
	
}
</style>

    <div class="content p-4">
        

        <!--<h2 class="mb-4">Cards</h2>-->
		
        <div class="card mb-4" >
        
            <div class="card-header bg-white font-weight-bold">
                SD WAN Job Details
            </div>
            <div class="card-body">
                <div class="col-md-12 col-md-auto">
                    <form id="form_application" method="post" action="index.php/application/SDWANJobs/saveRecord"  >
					
					<br />
                      <div class="row col-md-12">   
                            <div class="col-md-2 ">
                                <label class="lblStrong">Branch : </label>
                            </div>
                            <div class="col-md-3">
                                <?php echo form_dropdown('cmbBranchCode', $branchList,set_value('cmbBranchCode'), 'class="form-control field-height"    id="cmbBranchCode" required data-toggle="tooltip" data-original-title=" Branch"');  ?>
                                <?php echo form_error('cmbBranchCode'); ?>
                                <input type="hidden" id="txtsiteID" name="txtsiteID" value="<?php echo set_value('txtsiteID'); ?>" />
                                <input type="hidden" id="txtJobID" name="txtJobID" value="<?php echo set_value('txtJobID'); ?>" />
                            </div>	

                            <div class="col-md-2 " style="text-align:right">
                                <label class="lblStrong" >Category:</label>
                            </div>
                            <div class="col-md-3">
                             <?php echo form_dropdown('cmbCategory', $categoryList,set_value('cmbCategory'), 'class="form-control field-height "   id="cmbCategory" required');  ?>
                             <?php echo form_error('cmbCategory');  ?>
                             </div>
                      </div>
					  
					   <div class="row col-md-12 row-space">   
                            <div class="col-md-2 ">   
                                <label class="lblStrong">Provider Name : </label>
                            </div>
                            <div class="col-md-3">
                            <?php echo form_dropdown('cmbProvider', $providerList,set_value('cmbProvider'), 'class="form-control field-height "   id="cmbProvider" required');  ?>
                            <?php echo form_error('cmbProvider');  ?>
                            </div>
                        
                             <div class="col-md-2" style="text-align:right">   
                                <label for="" class="lblStrong" >A/C No : </label>
                            </div>
                            <div class="col-md-3">
                                <label id="lblCircuitID" class="lblValue"></label>
                            </div> 
                      </div>
					  
					  
												  
					  
                   	 <div style="width: 100%; height: 12px; border-bottom: ; text-align: left; margin-bottom: 20px;margin-top: 20px;"> <span style="font-size: 14px; background-color: ; padding: 0 10px;"><strong style="color:#ff2530">*</strong> <strong style="color:blue"><u>Complain Details</u></strong></span> </div>
					   
					   
                    <div class="row col-md-12">   
                        <div class="col-md-2 ">
                            <label class="lblStrong">Down Date & Time:</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control field-height"  name="cmbDownDate" id="cmbDownDate" maxlength="10" placeholder="" <?php  if(isset($customer['cmbDownDate'])) 
echo 'value="'.$customer['cmbDownDate'].'"'; ?>  value="<?php echo set_value('cmbDownDate'); ?>"  required>
                            <?php echo form_error('cmbDownDate');  ?>
                        </div>	
                    
                        <div class="col-md-2 ">
                            <label class="lblStrong">Up Date & Time : </label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control field-height"  name="cmbUpDate" id="cmbUpDate" maxlength="10" placeholder="" <?php  if(isset($customer['cmbUpDate'])) echo 'value="'.$customer['cmbUpDate'].'"'; ?>  value="<?php echo set_value('cmbUpDate'); ?>"  required>
                            <?php echo form_error('cmbUpDate');  ?>
                        </div>	
                    </div>
					  
					  <div class="row col-md-12 row-space">   
                            <div class="col-md-2">   
                                <label class="lblStrong">Complaint ID : </label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control field-height" name="txtComplaintID" id="txtComplaintID" placeholder="" <?php  if (isset($customer['txtComplaintID']))echo 'value='.strtoupper($customer['txtComplaintID']).'"'; ?>  value="<?php echo set_value('txtComplaintID'); ?>"  required>
                                <?php echo form_error('txtComplaintID');  ?>   
                            </div>
                        
                            <div class="col-md-2">   
                                <label class="lblStrong">Remark : </label>
                            </div>
                            <div class="col-md-3">
                                <?php echo form_dropdown('cmbRemark', $remarkList,set_value('cmbRemark'), 'class="form-control field-height"    id="cmbRemark" required data-toggle="tooltip" data-original-title="Service Provider"');  ?> <?php echo form_error('cmbRemark');  ?>
                        </div>
                        
                      </div>
					  
					  
	 
						</br>
							<div class="form-group col-md-12 offset-md-8" 	>
                            <div class="row pull-right">
                                <button type="submit" class="btn btn-primary field-height">Save</button>&nbsp;&nbsp;
                            	<button type="button" class="btn btn-warning field-height" onclick="clearData()">Clear</button>
                            </div>
                        </div> 
							
				  </form>
   </div>
	  </div>
     <div class="card mb-4">
            <div class="card-body">
                <table id="recordTable" class="table table-hover table-striped table-sm" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Branch</th>
					    <th>Category</th>
                        <th>Provider</th>   
                        <th>Circuit ID</th>
						<th>IP Range</th>
						
                        <th class="action">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    
                   
                    </tbody>
                </table>
            </div>
        </div>
	
                        
                     
			 <hr style=" border: 0; height: 1px; background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));">		   
                 
                     <div class="form-row">
                     <hr style="margin-top: 5px; margin-bottom:0px; border: 0; height: 1px; background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));" class="mb-3">
          
        </div>

<div class="modal fade bd-success-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"  aria-hidden="true">
  <div class="modal-dialog modal-sm modal-dialog-centered">
    <div class="modal-content"> 
      <div class="modal-header" style="background-color: #00a8b8;border-radius: 5px;padding: 10px;color:#fff">
        <h5 class="modal-title">Information !</h5>
      </div>
      <div class="modal-body">
        <p id="successMsg"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-bule" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<script>

function hello(){
	alert();	
}

 <?php 

		if($this->session->flashdata('fail'))
		{?>	
			 $("#successMsg").html("<?php echo $this->session->flashdata('fail');?>");
			 $(".bd-success-modal-sm").modal("show");
						
	 <?php	}?>	
		
	 <?php 
		if($this->session->flashdata('success'))
		{?>	
			 $("#successMsg").html("<?php echo $this->session->flashdata('success');?>");
			 $(".bd-success-modal-sm").modal("show");
						
	 <?php	}?>	
	

    $(document).ready(function () {
		
		flatpickr("#cmbDownDate,#cmbUpDate", { enableTime: true, dateFormat: "Y-m-d H:i"});
		DataTable();

		
		$( "#btnClear" ).click(function() {
		clearData();
		});
		
		$("#cmbBranchCode").change(function () {
		var branchCode = $('#cmbBranchCode').val();
		loadCategory(branchCode);
		
		});
		
		$("#cmbCategory").change(function () {
		var categoryList = $('#cmbCategory').val();
		var branchCode = $('#cmbBranchCode').val();
		loadProvider(branchCode,categoryList);
		});
		
		$("#cmbProvider").change(function () {
			$('#txtsiteID').val($('#cmbProvider').val());
		});

    });
	
	//loading categories using branch code
	function loadCategory(branchCode)
	   {
			$('#cmbCategory').html('');
			$('#cmbProvider').html('');
			$('#lblCircuitID').html('');
			$('#txtsiteID').val('');
			
			$.ajax({type: "POST",  async : false,  dataType: "json",	url: "index.php/application/SDWANJobs/getCategoryDetails",data:{'branchCode':branchCode},	success: function (html) {	
				$.each(html, function(i, option) {
					
				 $('#cmbCategory').append($('<option/>').attr("value", option.sdwan_category).text(option.category_name));}); 
			 },  error: function(html){  }	});	 
			 
			 loadProvider(branchCode,"");  
	   }
	   
	  //loading providers using branch code & category
	 function loadProvider(branchCode,categoryList)
	   {
			$('#cmbProvider').html('');
			//$('#lblIP').html('');
			$('#lblCircuitID').html('');
			$('#txtsiteID').val('');
			
			$.ajax({type: "POST",  async : false,  dataType: "json",	url: "index.php/application/SDWANJobs/getProviderDetails",data:{'categoryList':categoryList, 'branchCode':branchCode},	success: function (html) {	
				$.each(html, function(i, option) {
					
				 $('#cmbProvider').append($('<option/>').attr("value", option.sdwan_id).text(option.provider_description));}); 
			 },  error: function(html){  }	});	   
	   }
	   

	function DataTable()
		{
			 $('#recordTable').DataTable({ 
			
			"processing": true, //Feature control the processing indicator.
			"serverSide": true, //Feature control DataTables' server-side processing mode.
			"order": [], //Initial no order.
	
			// Load data for the table's content from an Ajax source
			"ajax": {
				"url": 'index.php/application/SDWANJobs/recordlist',
				"type": "POST"
			},
	
			
			"columnDefs": 
			[
			{
				"targets": [0,1,2,3,4,5,6],
				"orderable": false
				},
				
			{
				"targets": 6,
				"data": "status",
				"render": function (data, type, row, meta) {

					
						return '<button  onclick="editRecord(\''+row[6]+'\',\''+row[1]+'\',\''+row[8]+'\');" class="btn btn-icon btn-pill btn-primary btn-sm"  title="Edit"><i class="fa fa-fw fa-edit"></i></button>';
					
					
	}
			}
			 
			]// end of columnDefs
			});// end of Datatable
		}	
	
	
	//Edit saved data
	function editRecord(job_id,branch,category)
		{
			clearData();
			
			loadCategory(branch);
			loadProvider(branch,category);
			
			$.ajax({type: 'POST',dataType:"JSON",	url: 'index.php/application/SDWANJobs/editRecord',data:{'job_id':job_id},	async : false,	success: function (html) 
			{	
				$('#cmbBranchCode').val(html.jsonData.sdwan_branch_id);
				$('#cmbCategory').val(html.jsonData.sdwan_category);
				$('#cmbProvider').val(html.jsonData.sdwan_job_site_id);
				$('#lblCircuitID').html(html.jsonData.site_circuit_id);
				
				$('#cmbDownDate').val(html.jsonData.sdwan_job_down_time);
				$('#cmbUpDate').val(html.jsonData.sdwan_job_up_time);
				$('#txtComplaintID').val(html.jsonData.sdwan_job_complaint_id);
				$('#cmbRemark').val(html.jsonData.sdwan_job_remark); 
				
				$('#txtsiteID').val(html.jsonData.sdwan_job_site_id); 
				$('#txtJobID').val(html.jsonData.sdwan_job_id); 

				
				
				
				
			 },    error: function(html){  }	});	 
	}	
	
	
	function clearData()
 	{
		$('#cmbBranchCode').val('');
		$('#cmbCategory').html('');
		$('#cmbCategory').append($('<option/>').attr("value", "").text("-- Select Category --"));
		$('#cmbProvider').html('');
		$('#cmbProvider').append($('<option/>').attr("value", "").text("-- Select Provider ---"));
		//$('#lblIP').html('');
		$('#lblCircuitID').html('');
		
		$('#cmbDownDate').val('');
		$('#cmbUpDate').val('');
		$('#txtComplaintID').val('');
		$('#cmbRemark').val('');
		
		$('#txtJobID').val('');
		$('#txtsiteID').val('');
	 }	
		 
	
	
</script>