<style>

.row-double-space{	padding-top:20px;	}
.row-space{	padding-top:7px;	}
.field-height{	padding-top:0px;height:22px; font-size:12px	}
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
                SD WAN Job Details Report
            </div>
            <div class="card-body">
                <div class="col-md-12 col-md-auto">
                    <form id="form_application" method="post" action="index.php/application/SDWANJobReports/getJobDetails"  >
					
					<br />
					<div class="row col-md-12">   
                                    <div class="col-md-2">   
                                        <label class="lblStrong">Report Type : </label>
                                    </div>
                                    <div class="col-md-3">
                                        <select class="form-control field-height" name="cmbReportType" id="cmbReportType" required>
                                               		<option value="" <?php echo set_Select('cmbReportType',''); ?>>-- Select Report Type -- </option>
                                                    <option value="1" <?php echo set_Select('cmbReportType','2'); ?>>Job Details Report</option>
													<option value="2" <?php echo set_Select('cmbReportType','1'); ?>>Down Time Report</option>
                                                </select>
									<?php echo form_error('cmbReportType'); ?>
                                    </div>
					</div>
					
					
                      <div class="row col-md-12 row-space">   
                                    <div class="col-md-2">   
                                        <label class="lblStrong">Down Time From : </label>
                                    </div>
                                    <div class="col-md-3">
                                         <input type="text" class="form-control field-height" name="txtstartDate" id="txtstartDate" placeholder="" <?php  if (isset($customer['txtstartDate']))echo 				'value="'.strtoupper($customer['txtstartDate']).'"'; ?>  value="<?php echo set_value('txtstartDate'); ?>"  required>
										 <input type="hidden" id="txtJobDownTime" name="txtJobDownTime" value="<?php echo set_value('txtJobDownTime'); ?>" />
                                       	 <?php echo form_error('txtstartDate');  ?>
                                    </div>
                                
                                    <div class="col-md-2 offset-md-1">
                                        <label class="lblStrong">Down Time to : </label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="tel" class="form-control field-height" name="txtendDate" id="txtendDate"  maxlength="10" minlength="10" onkeypress="return isNumber(event)" placeholder="" <?php  if (isset($customer['txtendDate']))echo 'value="'.strtoupper($customer['txtendDate']).'"'; ?>  value="<?php echo set_value('txtendDate'); ?>"  required>
                                        <?php echo form_error('txtendDate');  ?>
                                    </div>	
                      </div>
					  <br />
					   <hr style=" border: 0; height: 1px; background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));">	
					  <br />
					  	 
					  <div class="row col-md-12">   
                                    <div class="col-md-2">   
                                        <label class="lblStrong">Provider : </label>
                                    </div>
                                    <div class="col-md-3">
                                        <?php echo form_dropdown('cmbProvider', $providerList,set_value('cmbProvider'), 'class="form-control field-height"    id="cmbProvider"  data-original-title=" Provider "');  ?>
										<?php echo form_error('cmbProvider'); ?>
                                    </div>
                                
                                    <div class="col-md-2 offset-md-1">
                                        <label class="lblStrong">Category : </label>
                                    </div>
                                    <div class="col-md-3">
                                        <?php echo form_dropdown('cmbCategory', $categoryList,set_value('cmbCategory'), 'class="form-control field-height"    id="cmbCategory"  data-original-title=" Category "');  ?>
										<?php echo form_error('cmbCategory'); ?>
                                    </div>	
                      </div>
					  
					   <div class="row col-md-12 row-space">   
                                    <div class="col-md-2">   
                                        <label class="lblStrong">Branch : </label>
                                    </div>
                                    <div class="col-md-3">
                                        <?php echo form_dropdown('cmbBranch', $branchCodeList,set_value('cmbBranch'), 'class="form-control field-height"    id="cmbBranch"  data-original-title=" Branch "');  ?>
										<?php echo form_error('cmbBranch'); ?>
                                    </div>
                      </div>
									
						</br>
							 <div class="form-group col-md-12 offset-md-10">
                            <div class="row pull-right">
                                <button type="submit" class="btn btn-primary field-height">Download PDF</button>&nbsp;&nbsp;&nbsp;
                                <button type="button" class="btn btn-warning field-height" onclick="clearData()">Clear</button>
                            </div>
                        </div> 
							
				  </form>
    </div>  
                 
                     <div class="form-row">
                     <hr style="margin-top: 5px; margin-bottom:0px; border: 0; height: 1px; background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));" class="mb-3">
          
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
		
		flatpickr("#txtstartDate,#txtendDate", {  dateFormat: "Y-m-d"});	
		
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
	
	
function clearData()
 {
	$('#txtstartDate').val('');
	$('#txtendDate').val('');
	$('#cmbProvider').val('');
	$('#cmbCategory').val('');
	$('#cmbBranch').val('');
 }	
	
</script>