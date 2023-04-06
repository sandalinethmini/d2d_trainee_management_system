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
                Officer Details Report
            </div>
            <div class="card-body">
                <div class="col-md-12 col-md-auto">
                    <form id="form_application" method="post" action="index.php/application/OfficerDetailsReport/getOfficerDetails"  >
					
					<br />
	 
					  <div class="row col-md-12">   
                                    <div class="col-md-2">   
                                        <label class="lblStrong">District : </label>
                                    </div>
                                    <div class="col-md-3">
                                      <?php echo form_dropdown('cmbDistrict', $districtList,set_value('cmbDistrict'), 'class="form-control"    id="cmbDistrict" required 
									  data-toggle="tooltip" data-original-title=" District"');  ?>
										<?php echo form_error('cmbDistrict'); ?>
										<input type="hidden" id="txtofficer" name="txtofficer" value="<?php echo set_value('txtofficer'); ?>" />
                                    </div>	
                      </div>
						
						</br>
							 <div class="form-group col-md-12 offset-md-10">
                            <div class="row pull-right">
                                <button type="submit" class="btn btn-primary">Download PDF</button>
                                <button type="button" class="btn btn-bule" onclick="clearData()">Clear</button>
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
	$('#cmbDistrict').val('');
 }	
	
</script>