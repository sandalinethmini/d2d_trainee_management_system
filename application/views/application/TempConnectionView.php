

    <div class="content p-4">
        

        <!--<h2 class="mb-4">Cards</h2>-->
		
        <div class="card mb-4" >
        
            <div class="card-header bg-white font-weight-bold">
                Temperary Connection Application
            </div>
            <div class="card-body">
                <div class="col-md-12 col-md-auto">

                    <form id="form_application" method="post" action="<?php if($form_valid){ echo base_url().'index.php/application/TempConnection/printApplication'; }
																				else {echo base_url().'index.php/application/TempConnection/saveRecord';}?>"  >
                    
                     <div class="form-row mb-2 ">
                        <div class="col-md-4 ">
                            <strong><u>Requester Information</u></strong>
                            </div>
                     </div>
                    
                    <div class="form-row">
                            <div class=" col-md-2 mb-3 ">
                               <?php /*?> <label >NIC</label><?php */?>
                                <div class="input-group">
                                <strong class="text-danger">* </strong>
                                <input type="text" class="form-control <?php if(form_error('txtNIC')) echo "is-invalid";  ?>" id="txtNIC" name="txtNIC" placeholder="-- NIC --" value="<?php echo set_value('txtNIC'); ?>"  maxlength="12" minlength="10"  required data-toggle="tooltip" data-original-title=" NIC ">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2"><i class="far  fa-id-badge"></i></span>
                                </div>
                                
                                </div>
                                
                                <?php echo form_error('txtNIC');  ?>
                            </div>
                            
                            <div class="col-md-4 mb-3 ">
                               
                                <div class="input-group">
                                <strong class="text-danger">* </strong>
                                <input type="text" class="form-control <?php if(form_error('txtCustomerName')) echo "is-invalid";  ?>" id="txtCustomerName" name="txtCustomerName" placeholder="-- Requester  Name --" value="<?php echo set_value('txtCustomerName'); ?>"   maxlength="45" required data-toggle="tooltip" data-original-title=" Requester  Name ">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2"><i class="far  fa-user"></i></span>
                                </div>
                                </div>
                                <?php echo form_error('txtCustomerName');  ?>
                            </div>
                            
                            <div class="col-md-6 mb-3">

                                    <div class="input-group ">
                                    <strong class="text-danger">* </strong>
                                    <input type="text" class="form-control <?php if(form_error('txtComAddress')) echo "is-invalid";  ?>" id="txtComAddress" name="txtComAddress" placeholder="-- Communication Address --" value="<?php echo set_value('txtComAddress');  ?>" maxlength="75"   required data-toggle="tooltip" data-original-title=" Communication Address ">
                                        <div class="input-group-append">
                                        <span class="input-group-text " id="basic-addon2"><i class="fa  fa-envelope"></i></span>
                                    </div>
                                </div>
                                	<?php echo form_error('txtComAddress');  ?>
                            </div>
                     </div>
                     
                     <hr style="margin-top: 5px; margin-bottom:0px; border: 0; height: 1px; background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));" class="mb-3">
                     
                      <div class="form-row mb-2 ">
                         	<div class="col-md-4 ">
                         		<strong><u>Temporary Connection Details</u></strong>
                                </div>
                         </div>
                         
                          
                    
                    
                     <div class="form-row">
                     
                     		<div class="col-md-3 mb-3 ">
                                <div class="input-group ">
                                <strong class="text-danger">* </strong>
                                <select  class="form-control custom-select <?php if(form_error('cmbReason')) echo "is-invalid";  ?>"  name="cmbReason" id="cmbReason" required data-toggle="tooltip" data-original-title=" Reason ">
                                  <option value="" >-- Reason --</option>
                                  <option value=",xld" <?php echo set_select('cmbReason',',xld'); ?> >Kegalle Regional Office</option>
                                  <option value=" ;djld,sl" <?php echo set_select('cmbReason',' ;djld,sl'); ?> >Three Phase 30A</option>
                                </select>
                                <?php echo form_error('cmbReason');  ?>
                              </div> 
                            </div>
                            
                            <div class="col-md-3 mb-3 ">
                                
                                
                                <select  class="form-control custom-select"  name="cmbCenter" id="cmbCenter" data-toggle="tooltip" data-original-title=" Nearest Conumser Center ">
                                  <option value="" >-- Nearest Conumser Center --</option>
                                  <option value=",xld" <?php echo set_select('cmbCenter',',xld'); ?> >Kegalle Regional Office</option>
                                  <option value=" ;djld,sl" <?php echo set_select('cmbCenter',' ;djld,sl'); ?> >Three Phase 30A</option>
                                </select>
                                <?php echo form_error('cmbCenter');  ?>
                               
                            </div>
                            
                             <div class="col-md-6 mb-3">
                            	
                                   <?php /*?><label >Consumer Address</label><?php */?>
                                    <div class="input-group ">
                                    <input type="text" class="form-control " id="txtPemAddress1" name="txtPemAddress1" placeholder="-- Premises Address  --" value="<?php echo set_value('txtPemAddress1'); ?>" maxlength="65" data-toggle="tooltip" data-original-title=" Premises Address ">
                                        <div class="input-group-append ">
                                        <span class="input-group-text " id="basic-addon2"><i class="fa  fa-envelope"></i></span>
                                    </div>
                                </div>
                                	<?php echo form_error('txtPemAddress1');  ?>
                            </div>
                            
                             <div class="col-md-3 ">
                                <?php /*?><label for="validationServer02">Account Number</label><?php */?>
                                <div class="input-group ">
                                <input type="text" class="form-control " id="txtAccount" name="txtAccount" placeholder="-- Account Number --" value="<?php echo set_value('txtAccount'); ?>" maxlength="10" minlength="10" data-toggle="tooltip" data-original-title=" Account Number ">
                                <div class="input-group-append ">
                                        <span class="input-group-text " id="basic-addon2"><i class="fa  fa-edit"></i></span>
                                    </div>
                                </div>
                                <?php echo form_error('txtAccount');  ?>
                            </div>
                            
                            <div class="col-md-3 mb-3">
                            	
                                    <?php /*?><label >Current Owner Name</label><?php */?>
                                    <div class="input-group ">
                                    <input type="text" class="form-control " id="txtPeriod" name="txtPeriod" placeholder="-- Connection Duration --" value="<?php echo set_value('txtPeriod'); ?>" maxlength="50"  data-toggle="tooltip" data-original-title=" Connection Duration " >
                                        <div class="input-group-append ">
                                        <span class="input-group-text " id="basic-addon2"><i class="fa  fa-clock"></i></span>
                                    </div>
                                </div>
                                	<?php echo form_error('txtPeriod');  ?>
                            </div>
                            
                            <div class="col-md-3 mb-3">
                            	
                                    <?php /*?><label >Current Owner Name</label><?php */?>
                                    <div class="input-group ">
                                    <input type="text" class="form-control " id="txtPoleDistance" name="txtPoleDistance" placeholder="-- Distance Form Pole --" value="<?php echo set_value('txtPoleDistance'); ?>" maxlength="50"  data-toggle="tooltip" data-original-title=" Distance Form Pole " >
                                        <div class="input-group-append ">
                                        <span class="input-group-text " id="basic-addon2"><strong>m</strong></span>
                                    </div>
                                </div>
                                	<?php echo form_error('txtPoleDistance');  ?>
                            </div>
                            
                            <div class="col-md-3 mb-3">
                            	
                                    <?php /*?><label >Current Owner Name</label><?php */?>
                                    <div class="input-group ">
                                    <input type="text" class="form-control " id="txtCenterDistance" name="txtCenterDistance" placeholder="-- Distance From Center --" value="<?php echo set_value('txtCenterDistance'); ?>" maxlength="50" data-toggle="tooltip" data-original-title=" Distance From Center "  >
                                        <div class="input-group-append ">
                                        <span class="input-group-text " id="basic-addon2"><strong>Km</strong></span>
                                    </div>
                                </div>
                                	<?php echo form_error('txtCenterDistance');  ?>
                            </div>
                           
                            
                        </div>
                        
                       <?php /*?> <hr style="margin-top: 5px; margin-bottom:0px; border: 0; height: 1px; background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));" class="mb-3"><?php */?>
                        
                       
                        
                    
                        <?php /*?><div class="form-row mb-2 ">
                        <div class="col-md-4 ">
                            <strong><u>Other Information</u></strong>
                            </div>
                     </div>
                    
                    <div class="form-row">
                    
                    		<div class="col-md-3 mb-3 ">
                               
                                <div class="input-group">
                                        <input type="text" class="form-control " id="txtLamp" name="txtLamp" placeholder="Lamps" value="<?php echo set_value('txtLamp'); ?>" >
                                        <div class="input-group-append ">
                                            <span class="input-group-text " id="basic-addon2"><i class="fa fa-lightbulb"></i></span>
                                        </div>
                                    </div>
                            	
                                <?php echo form_error('txtLamp');  ?>
                            </div>
                            
                            <div class="col-md-3 mb-3 ">
                               
                                <div class="input-group">
                                        <input type="text" class="form-control " id="txtOther" name="txtOther" placeholder="Other Appliance" value="<?php echo set_value('txtOther'); ?>" >
                                        <div class="input-group-append ">
                                            <span class="input-group-text " id="basic-addon2"><i class="fa fa-plug"></i></span>
                                        </div>
                                    </div>
                         
                                <?php echo form_error('txtOther');  ?>
                            </div>
                            <div class="col-md-3 mb-3 ">
                               
                                <div class="input-group">
                                        <input type="text" class="form-control " id="txtWatts" name="txtWatts" placeholder="Total Watts" value="<?php echo set_value('txtWatts'); ?>" >
                                        <div class="input-group-append ">
                                            <span class="input-group-text " id="basic-addon2"><i> # </i></span>
                                        </div>
                                    </div>
                         
                                <?php echo form_error('txtWatts');  ?>
                            </div>
                            
   
                     </div><?php */?>
                         
                          
                        
                       
                        
               
            <div class="card-footer bg-white card-auto button-right">
            	<div class="float-right">
                	 <button class="btn btn-success" type="submit">Print</button> <button class="btn btn-info" id="btnClear" type="button">Clear</button>
                </div>
               
            </div>
            </form>
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

    $(document).ready(function () {
		
		<?php if($form_valid){?>
			setTimeout(function(){ 
				$("#form_application").attr("target", "_blank");
				$('#form_application').submit( );
				$("#form_application").attr("target", "_self");
				$("#form_application").attr("action", "index.php/application/TempConnection/saveRecord");
				history.replaceState("", "", "index.php/application/TempConnection");
			 }, 0);
		<?php }?>
		
		
		$( "#btnClear" ).click(function() {
		  	$('#form_application input[type="text"],select').val('');
			$('#form_application input[type="text"]').attr("value", "");
			$('.invalid-feedback').html("");
			$(".form-control").removeClass("is-invalid"); 
			$("#form_application option[selected]").removeAttr("selected");  
		});
      
    });
	
	
</script>