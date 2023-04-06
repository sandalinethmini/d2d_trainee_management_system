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
                IT Officer Details
            </div>
            <div class="card-body">
                <div class="col-md-12 col-md-auto">
                    <form id="form_application" method="post" action="index.php/application/OfficerDetails/saveRecord"  >
					
					<br />
                      <div class="row col-md-12">   
                                    <div class="col-md-2">   
                                        <label class="lblStrong">Support IT Officer : </label>
                                    </div>
                                    <div class="col-md-3">
                                         <input type="text" class="form-control " name="txtITofficer" id="txtITofficer" placeholder="" <?php  if (isset($customer['txtITofficer']))echo 				'value="'.strtoupper($customer['txtITofficer']).'"'; ?>  value="<?php echo set_value('txtITofficer'); ?>"  required>
										 <input type="hidden" id="txtOfficerID" name="txtOfficerID" value="<?php echo set_value('txtOfficerID'); ?>" />
                                       	 <?php echo form_error('txtITofficer');  ?>
                                    </div>
                                
                                    <div class="col-md-2 offset-md-1">
                                        <label class="lblStrong">Contact Number: </label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="tel" class="form-control " name="txtContact" id="txtContact"  maxlength="10" minlength="10" onkeypress="return isNumber(event)" placeholder="" <?php  if (isset($customer['txtContact']))echo 'value="'.strtoupper($customer['txtContact']).'"'; ?>  value="<?php echo set_value('txtContact'); ?>"  required>
                                        <?php echo form_error('txtContact');  ?>
                                    </div>	
                      </div>
					  
					  <div class="row col-md-12">   
                                    <div class="col-md-2">   
                                        <label class="lblStrong">District : </label>
                                    </div>
                                    <div class="col-md-3">
                                       <?php echo form_dropdown('cmbDistrict', $districtList,set_value('cmbDistrict'), 'class="form-control"    id="cmbDistrict" required data-toggle="tooltip" data-original-title="District"');  ?>
                                    </div>
									   <?php echo form_error('cmbNewBandwidthType');  ?>
                                
                                   <?php /*?> <div class="col-md-2 offset-md-1">
                                        <label class="lblStrong">Contact Number: </label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="tel" class="form-control " name="txtContact" id="txtContact"  maxlength="10" minlength="10" onkeypress="return isNumber(event)" placeholder="" <?php  if (isset($customer['txtContact']))echo 'value="'.strtoupper($customer['txtContact']).'"'; ?>  value="<?php echo set_value('txtContact'); ?>"  required>
                                        <?php echo form_error('txtContact');  ?>
                                    </div>	<?php */?>
                      </div>
									
						</br>
							 <div class="form-group col-md-12 offset-md-10">
                            <div class="row pull-right">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <button type="button" class="btn btn-bule" onclick="clearData()">Clear</button>
                            </div>
                        </div> 
							
				  </form>
    </div>
                        
                     
			 <hr style=" border: 0; height: 1px; background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));">		   
                 
                     <div class="form-row">
                     <hr style="margin-top: 5px; margin-bottom:0px; border: 0; height: 1px; background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));" class="mb-3">
          
        </div>
        
 <div class="card mb-4">
            <div class="card-body">
                <table id="recordTable" class="table table-hover table-striped table-sm" cellspacing="0" width="100%">
                    <thead>
                    <tr>
						<th>No</th>
                        <th>IT Officer Name</th>
                        <th>Contact Number</th>
						<th>District</th>
                        <th class="action">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    
                   
                    </tbody>
                </table>
            </div>
        </div>
</div>
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
		
		flatpickr("#txtDOB", {  dateFormat: "d-m-Y"});
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
            "url": 'index.php/application/OfficerDetails/recordlist',
            "type": "POST"
        },

		
		"columnDefs": 
		[
		{
			"targets": [0,1,2,3,4],
			"orderable": false
			},
			
		{
			"targets": 4,
			"data": "status",
			"render": function (data, type, row, meta) {
				/*return '<button  type="button" onClick="confim(\''+row[7]+'\',\''+row[8]+'\',\''+row[6]+'\')" class="btn btn-success table-btn-sm">Confim</button>' +
				 '<button  type="button" onClick="views(\''+row[5]+'\',\''+row[6]+'\',\''+row[7]+'\',\''+row[8]+'\')"class="btn btn-warning table-btn-sm">View</button>' +
				 '<button  type="button" onClick="editContent(\''+row[5]+'\',\''+row[4]+'\',\''+row[3]+'\',\''+row[6]+'\')"class="btn btn-danger table-btn-sm">Rejiect</button>';*/
				if(row[5]== 1)
				{
					return '<button  onclick="editRecord(\''+row[4]+'\');" class="btn btn-icon btn-pill btn-primary btn-sm"  title="Edit"><i class="fa fa-fw fa-edit"></i></button>' + 
					'&nbsp;&nbsp; <button  onclick="changeStatus(\''+row[4]+'\',0);" class="btn btn-icon btn-pill btn-success btn-sm"  title="Edit"><i class="fa fa-fw fa-check"></i></button>';	
				}
				else
				{
				return '<button  onclick="editRecord(\''+row[4]+'\');" class="btn btn-icon btn-pill btn-primary btn-sm"  title="Edit"><i class="fa fa-fw fa-edit"></i></button>' + 
					'&nbsp;&nbsp; <button  onclick="changeStatus(\''+row[4]+'\',1);" class="btn btn-icon btn-pill btn-danger btn-sm"  title="Edit"><i class="fa fa-fw fa-lock"></i></button>';
				}	
			}
		}
         
        ]// end of columnDefs
		});// end of Datatable
	}	
	
	
function clearData()
 {
	//$('#txtITofficer').val('');
	//$('#txtContact').val('');
	$('#form_application input[type="text"],select').val('');
 }	
	
function changeStatus(officer_ID,officer_status)
	{
		$.ajax({type: 'POST',	url: 'index.php/application/OfficerDetails/changeStatus',data:{'officer_ID':officer_ID,'officer_status':officer_status},	async : false,	success: function (html) {	$('#recordTable').dataTable().fnDestroy();DataTable(); $("#successMsg").html(html);
			 $(".bd-success-modal-sm").modal("show");   },    error: function(html){  }	});
	}	
	
	
function editRecord(officer_id)
	{
		clearData();
		
		var locationCode = "";
		
		$.ajax({type: 'POST',dataType:"JSON",	url: 'index.php/application/OfficerDetails/editRecord',data:{'officer_id':officer_id},	async : false,	success: function (html) 
		{	
			$('#txtITofficer').val(html.jsonData.officer_name);
			$('#txtContact').val(html.jsonData.officer_contact_number);
			$('#cmbDistrict').val(html.jsonData.officer_district);
			
		    $('#txtOfficerID').val(html.jsonData.officer_id);  
		 },    error: function(html){  }	});	
	
		 
		 
	}	
	
</script>