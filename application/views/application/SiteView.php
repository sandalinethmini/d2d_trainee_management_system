<style>
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
                Circuit Details
            </div>
            <div class="card-body">
                <div class="col-md-12 col-md-auto">
                    <form id="form_application" method="post" action="index.php/application/Site/saveRecord"  >
                   	 
					 
                   	 <div style="width: 100%; height: 12px; border-bottom: ; text-align: left; margin-bottom: 20px;margin-top: 20px;"> <span style="font-size: 14px; background-color: ; padding: 0 10px;"><strong style="color:#ff2530">*</strong> <strong style="color:blue"><u> Branch Information</u>
                             <!--Padding is optional-->
                 	   </strong></span> </div>
					   
                   	
                            <div class="row col-md-12">
                                
                                    <div class="col-md-2">   
                                        <label class="lblStrong">Branch Code : </label>
                                    </div>
                                    <div class="col-md-3">
                                        <?php echo form_dropdown('cmbBranchCode', $branchList,set_value('cmbBranchCode'), 'class="form-control"    id="cmbBranchCode" required data-toggle="tooltip" data-original-title=" Branch"');  ?>
                                    </div>
									
									 <?php echo form_error('cmbBranchCode');  ?>
                                
                                    <div class="col-md-2 offset-md-1">
                                        <label class="lblStrong">Catagory : </label>
                                   </div>
                                    <div class="col-md-3">
                                        <?php echo form_dropdown('cmbCategory', $categoryList,set_value('cmbCategory'), 'class="form-control"    id="cmbCategory" required data-toggle="tooltip" data-original-title=" Category"');  ?>
                                    </div>
									 <?php echo form_error('cmbCategory');  ?>
                                
                            </div>
							
							
							
							<div class="row col-md-12">
                                
                                    <div class="col-md-2">   
                                       <label class="lblStrong">Support IT Officer : </label>
                                    </div>
                                    <div class="col-md-3">
                                        <?php echo form_dropdown('cmbOfficer', $officerList,set_value('cmbOfficer'), 'class="form-control"    id="cmbOfficer" required data-toggle="tooltip" data-original-title=" IT Officer"');  ?>
                                    </div>
                                  <?php echo form_error('cmbOfficer');  ?>
                                
                                <?php /*?>    <div class="col-md-2 offset-md-1">
                                        <label class="lblStrong">Contact Number : </label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control " name="txtContact" id="txtContact" maxlength="10" minlength="10" onkeypress="return isNumber(event)" placeholder="" <?php  if (isset($customer['txtContact']))echo 'value="'.strtoupper($customer['txtContact']).'"'; ?>  value="<?php echo set_value('txtContact'); ?>"  required>
                                        <?php echo form_error('txtContact');  ?><?php */?>
                            </div>
							<br />
							
							
						
	                     <hr style=" border: 0; height: 1px; background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));">

	 
                   	 <div style="width: 100%; height: 12px; border-bottom: ; text-align: left; margin-bottom: 20px;margin-top: 20px;"> <span style="font-size: 14px; background-color: ; padding: 0 10px;"><strong style="color:#ff2530">*</strong> <strong style="color:blue"><u> Provider Information</u>
                             <!--Padding is optional-->
                 	   </strong></span> </div>
					   
                   	
                            <div class="row col-md-12">
                                
                                    <div class="col-md-2">   
                                        <label class="lblStrong">Circuit ID : </label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control " name="txtCircuitID" id="txtCircuitID" placeholder="" <?php  if (isset($customer['txtCircuitID']))echo 'value="'.strtoupper($customer['txtCircuitID']).'"'; ?>  value="<?php echo set_value('txtCircuitID'); ?>"  required>
										
                                        <?php echo form_error('txtCircuitID');  ?>
                                    </div>
                                
                                    <div class="col-md-2 offset-md-1">
                                        <label class="lblStrong">Account No : </label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control " name="txtAccno" id="txtAccno" placeholder="" <?php  if (isset($customer['txtAccno']))echo 'value="'.strtoupper($customer['txtAccno']).'"'; ?>  value="<?php echo set_value('txtAccno'); ?>"  required>
										<input type="hidden" id="txtSiteID" name="txtSiteID" value="<?php echo set_value('txtSiteID'); ?>" />
                                        <?php echo form_error('txtAccno');  ?>
                                    </div>
                                
                            </div>
							
							
							
							<div class="row col-md-12">
                                
                                    <div class="col-md-2">   
                                        <label class="lblStrong">Provider Name : </label>
                                    </div>
                                    <div class="col-md-3">
                                        <?php echo form_dropdown('cmbProvider', $providerList,set_value('cmbProvider'), 'class="form-control"    id="cmbProvider" required data-toggle="tooltip" data-original-title="Service Provider"');  ?> 
                                </div>
                                <?php echo form_error('cmbProvider');  ?>
                                
                                    <div class="col-md-2 offset-md-1">
                                        <label class="lblStrong">IP Range : </label>
                                    </div>
									<div class="col-md-3">
                                        <input type="text" class="form-control " name="txtIprange" id="txtIprange" placeholder="" <?php  if (isset($customer['txtIprange']))echo 'value="'.strtoupper($customer['txtIprange']).'"'; ?>  value="<?php echo set_value('txtIprange'); ?>"  required>
                                        <?php echo form_error('txtIprange');  ?>
                                    </div>
                                
                            </div>
							
							
							<div class="row col-md-12">
                                
                                    <div class="col-md-2">   
                                        <label class="lblStrong">Connection Type : </label>
                                    </div>
                                    <div class="col-md-3">
                                         <?php echo form_dropdown('cmbConnectionType', $connectionList,set_value('cmbConnectionType'), 'class="form-control"    id="cmbConnectionType" required
data-toggle="tooltip" data-original-title="Connection Type"');  ?>
                                    </div>
									 <?php echo form_error('cmbConnectionType');  ?>
                                
                                                              
                            </div>
							
							<div class="row col-md-12">
                                
                                    <div class="col-md-2">   
                                        <label class="lblStrong">Started Date : </label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control "  name="cmbStartDate" id="cmbStartDate" maxlength="10" placeholder="" <?php  if(isset($customer['cmbStartDate'])) echo 'value="'.$customer['cmbStartDate'].'"'; ?>  value="<?php echo set_value('cmbStartDate'); ?>"  required>
                                        <?php echo form_error('cmbStartDate');  ?>
                                    </div>
                                
                                     <div class="col-md-2 offset-md-1">
                                         <label class="lblStrong">Current Bandwidth : </label>
                                    </div>
                                    <div class="col-md-2.3">
                                    <?php echo form_dropdown('cmbBandwidthType', $bandwidthTypeList,set_value('cmbBandwidthType'), 'class="form-control"    id="cmbBandwidthType" required data-toggle="tooltip" data-original-title="Bandwidth Type"');  ?>
									</div>
									 <?php echo form_error('cmbBandwidthType');  ?>
									 
									 <div class="col-md-2">
										<?php echo form_dropdown('cmbCurrentBandwidth', $bandwidthList,set_value('cmbCurrentBandwidth'), 'class="form-control"    id="cmbCurrentBandwidth" required data-toggle="tooltip" data-original-title="Current Bandwidth"');  ?>
                                    </div>
									  <?php echo form_error('cmbCurrentBandwidth'); ?>                                
                            </div>
			 <div class="form-group col-md-12 offset-md-10">
			  </div> 
							 <div class="form-group col-md-12 offset-md-10">
                            <div class="row pull-right">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <button type="button" class="btn btn-bule" onclick="clearData()">Clear</button>
                            </div>
                        </div> 
							
						 </form>
                        </div>
                        
                     
			 <hr style=" border: 0; height: 1px; background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));">		   
					   
     <form id="form_application" method="post" action="index.php/application/Site/saveLinkDetails"  >
		
    <div style="width: 100%; height: 12px; border-bottom: ; text-align: left; margin-bottom: 20px;margin-top: 20px;"> <span style="font-size: 14px; background-color: ; padding: 0 10px;">	
	<strong style="color:#ff2530">*</strong> <strong style="color:blue"><u>Update Link Details</u>
                             <!--Padding is optional-->
                 	   </strong></span> </div>
					   <div class="row col-md-12">
                                
                                    <div class="col-md-2">   
                                        <label class="lblStrong">Start Date : </label>
                                    </div>
                                    <div class="col-md-3">
                                          <input type="text" class="form-control "  name="cmbNewStartDate" id="cmbNewStartDate" maxlength="10" placeholder="" <?php  if(isset($customer['cmbNewStartDate'])) echo 'value="'.$customer['cmbNewStartDate'].'"'; ?>  value="<?php echo set_value('cmbNewStartDate'); ?>"  required>
										  <input type="hidden" id="txtLinkSiteID" name="txtLinkSiteID" value="<?php echo set_value('txtLinkSiteID'); ?>" />
                                        <?php echo form_error('cmbNewStartDate');  ?><?php echo form_error('txtLinkSiteID');  ?>
                                    </div>
                                
                                    <div class="col-md-2 offset-md-1">
                                         <label class="lblStrong">New Bandwidth : </label>
                                    </div>
                                    <div class="col-md-2">
                                    <?php echo form_dropdown('cmbNewBandwidthType', $bandwidthTypeList,set_value('cmbNewBandwidthType'), 'class="form-control"    id="cmbNewBandwidthType" required data-toggle="tooltip" data-original-title="Bandwidth Type"');  ?>
									</div>
									 <?php echo form_error('cmbNewBandwidthType');  ?>
									 
									 <div class="col-md-2">
										<?php echo form_dropdown('cmbNewBandwidth', $bandwidthList,set_value('cmbNewBandwidth'), 'class="form-control"    id="cmbNewBandwidth" required data-toggle="tooltip" data-original-title="New Bandwidth"');  ?>
                                    </div>
									  <?php echo form_error('cmbNewBandwidth'); ?>                               
                            </div>
                       <div class="form-group col-md-12 offset-md-10">
			  </div> 
						<div class="form-group col-md-12 offset-md-10">
                            <div class="row pull-right">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <button type="button" class="btn btn-bule" onclick="clearData()">Clear</button>
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
                        <th>Branch Code</th>
                        <th>Provider</th>
						<th>Category</th> 
                        <th>Acc No.</th>
                        <th>Circuit ID</th>
                        <th>Current BandWidth</th>
						
                        <th class="action">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    
                   
                    </tbody>
                </table>
            </div>
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
		
		flatpickr("#cmbStartDate, #cmbNewStartDate, #cmbLinkStartDate", { });
		DataTable();

		
		$( "#btnClear" ).click(function() {
		  	clearData();
		});

    });
	
	
function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
	}


	
function DataTable()
	{
		 $('#recordTable').DataTable({ 
		
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": 'index.php/application/Site/recordlist',
            "type": "POST"
        },

		
		"columnDefs": 
		[
		{
			"targets": [0,1,2,3,4,5,6],
			"orderable": false
			},
			
		{
			"targets": 7,
			"data": "status",
			"render": function (data, type, row, meta) {
				/*return '<button  type="button" onClick="confim(\''+row[7]+'\',\''+row[8]+'\',\''+row[6]+'\')" class="btn btn-success table-btn-sm">Confim</button>' +
				 '<button  type="button" onClick="views(\''+row[5]+'\',\''+row[6]+'\',\''+row[7]+'\',\''+row[8]+'\')"class="btn btn-warning table-btn-sm">View</button>' +
				 '<button  type="button" onClick="editContent(\''+row[5]+'\',\''+row[4]+'\',\''+row[3]+'\',\''+row[6]+'\')"class="btn btn-danger table-btn-sm">Rejiect</button>';*/
				
					//return '<button  onclick="updateRecord();" class="btn btn-icon btn-pill btn-primary btn-sm"  title="Edit"><i class="fa fa-fw fa-edit"></i></button> ';
				if(row[8]== 1)
				{
					return '<button  onclick="editRecord(\''+row[7]+'\');" class="btn btn-icon btn-pill btn-primary btn-sm"  title="Edit"><i class="fa fa-fw fa-edit"></i></button>' + 
					'&nbsp;&nbsp; <button  onclick="changeStatus(\''+row[7]+'\',0);" class="btn btn-icon btn-pill btn-success btn-sm"  title="Edit"><i class="fa fa-fw fa-check"></i></button>';	
				}
				else
				{
				return '<button  onclick="editRecord(\''+row[7]+'\');" class="btn btn-icon btn-pill btn-primary btn-sm"  title="Edit"><i class="fa fa-fw fa-edit"></i></button>' + 
					'&nbsp;&nbsp; <button  onclick="changeStatus(\''+row[7]+'\',1);" class="btn btn-icon btn-pill btn-danger btn-sm"  title="Edit"><i class="fa fa-fw fa-lock"></i></button>';
				}	
				
}
		}
         
        ]// end of columnDefs
		});// end of Datatable
	}	



				
function changeStatus(site_id,site_status)
	{
		$.ajax({type: 'POST',	url: 'index.php/application/Site/changeStatus',data:{'site_id':site_id,'site_status':site_status},	async : false,	success: function (html) {	$('#recordTable').dataTable().fnDestroy();DataTable(); $("#successMsg").html(html);
			 $(".bd-success-modal-sm").modal("show");   },    error: function(html){  }	});
	}	
		
		
	
	
	function editRecord(site_id)
	{
		clearData();
		
		var locationCode = "";
		
		$.ajax({type: 'POST',dataType:"JSON",	url: 'index.php/application/Site/editRecord',data:{'site_id':site_id},	async : false,	success: function (html) 
		{	
			$('#txtSiteID').val(html.jsonData.site_id);
			
			$('#cmbBranchCode').val(html.jsonData.branch_code,html.jsonData.branch_description);
			$('#cmbCategory').val(html.jsonData.category_id);
		    $('#cmbOfficer').val(html.jsonData.officer_id);  
			$('#txtCircuitID').val(html.jsonData.site_circuit_id);
			$('#txtAccno').val(html.jsonData.site_account_no);
			$('#cmbProvider').val(html.jsonData.provider_id);
			$('#txtIprange').val(html.jsonData.site_iprange);
			$('#cmbConnectionType').val(html.jsonData.connection_id);
			$('#cmbStartDate').val(html.jsonData.site_connection_started_date);
			$('#cmbBandwidthType').val(html.jsonData.site_bandwidth_type);
			$('#cmbCurrentBandwidth').val(html.jsonData.site_current_bandwidth);

			$('#txtLinkSiteID').val(html.jsonData.site_id);
			
			<!--update link details-->
			$('#cmbNewStartDate').val(html.jsonData.site_connection_started_date); 
			$('#cmbNewBandwidth').val(html.jsonData.site_current_bandwidth);
			$('#cmbNewBandwidthType').val(html.jsonData.site_bandwidth_type);
		 },    error: function(html){  }	});	
	
		 
		 
	}	
	
	
	function clearData()
	 {
		$('#form_application input[type="text"],select').val('');
		$('input').attr("readonly",false);
		$('#form_application input[type="text"]').attr("value", "");
		$('.invalid-feedback').html("");
		$(".form-control").removeClass("is-invalid"); 
		$("#form_application option[selected]").removeAttr("selected");  
		$("#form_application").attr("action", "index.php/application/Site/saveRecord");
	 }
 
	
	
	
	
</script>