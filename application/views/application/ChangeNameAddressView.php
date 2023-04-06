

    <div class="content p-4">
        

        <!--<h2 class="mb-4">Cards</h2>-->
		
        <div class="card mb-4" >
        
            <div class="card-header bg-white font-weight-bold">
                Change Name/ Address of the Connection
                 
            </div>
            <div class="card-body">
                <div class="col-md-12 col-md-auto">
                   
                    
                     <form id="form_application" method="post" action="<?php if($form_valid){ echo base_url().'index.php/application/ChangeNameAddress/printApplication'; }
																				else {echo base_url().'index.php/application/ChangeNameAddress/saveRecord';}?>"  >
                    
                    	<div class="form-row mb-3 ">
                         	<div class="col-md-4 ">
                         		<strong><u>Current Owner Information</u></strong>
                                <input type="hidden" id="txtReadOnly" name="txtReadOnly" value="<?php echo set_value('txtReadOnly'); ?>" />
                                </div>
                         </div>
                    
                     <div class="form-row">
                     
                     	<div class="col-md-4 ">
                                <?php /*?><label for="validationServer02">Account Number</label><?php */?>
                                <div class="input-group ">
                                <strong class="text-danger">*</strong>
                                <input type="text" class="form-control <?php if(form_error('txtAccount')) echo "is-invalid";  ?>" id="txtAccount" name="txtAccount" placeholder="-- Account Number --" value="<?php echo set_value('txtAccount'); ?>" maxlength="10" minlength="10" required data-toggle="tooltip" data-original-title=" Account Number ">
                                <div class="input-group-append ">
                                        <span class="input-group-text " id="basic-addon2"><i class="fa  fa-edit"></i></span>
                                    </div>
                                </div>
                                <?php echo form_error('txtAccount');  ?>
                         </div>
                            
                            <div class="col-md-6 mb-4 ">
                            	
                                    <?php /*?><label >Current Owner Name</label><?php */?>
                                    <div class="input-group ">
                                    <strong class="text-danger">*</strong>
                                    <input type="text" class="form-control <?php if(form_error('txtOwnerName')) echo "is-invalid";  ?>" id="txtOwnerName" name="txtOwnerName" placeholder="-- Current Owner Name --" value="<?php echo set_value('txtOwnerName'); ?>" maxlength="50"  required data-toggle="tooltip" data-original-title=" Current Owner Name ">
                                        <div class="input-group-append ">
                                        <span class="input-group-text " id="basic-addon2"><i class="fa  fa-user"></i></span>
                                    </div>
                                </div>
                                	<?php echo form_error('txtOwnerName');  ?>
                            </div>
                           
 
                            
                        </div>
                         
                         
                         <div class="form-row">
                            
                            <div class="col-md-4 mb-3">
                            	
                                    
                                    <div class="input-group ">
                                    <strong class="text-danger">*</strong>
                                    <input type="text" class="form-control <?php if(form_error('txtComAddress1')) echo "is-invalid";  ?>" id="txtComAddress1" name="txtComAddress1" placeholder="-- Current Billing Address Line 1 --" value="<?php echo set_value('txtComAddress1');  ?>" maxlength="40"  required data-toggle="tooltip" data-original-title=" Current Billing Address Line 1 ">
                                        <div class="input-group-append">
                                        <span class="input-group-text " id="basic-addon2"><i class="fa  fa-envelope"></i></span>
                                    </div>
                                </div>
                                	<?php echo form_error('txtComAddress1');  ?>
                            </div>
                            <div class="col-md-4 ">
                                
                                <div class="input-group ">
                                <input type="text" class="form-control " id="txtComAddress2" name="txtComAddress2" placeholder="-- Current Billing Address Line 2 --" value="<?php echo set_value('txtComAddress2'); ?>" maxlength="40" data-toggle="tooltip" data-original-title=" Current Billing Address Line 2 ">
                                <div class="input-group-append ">
                                        <span class="input-group-text " id="basic-addon2"><i class="fa  fa-envelope"></i></span>
                                    </div>
                                </div>
                                <?php echo form_error('txtComAddress2');  ?>
                            </div>
                            <div class="col-md-4 ">
                                
                                <div class="input-group ">
                                <input type="text" class="form-control " id="txtComAddress3" name="txtComAddress3" placeholder="-- Current Billing Address Line 3 --" value="<?php echo set_value('txtComAddress3'); ?>" maxlength="40" data-toggle="tooltip" data-original-title=" Current Billing Address Line 3 ">
                                <div class="input-group-append ">
                                        <span class="input-group-text " id="basic-addon2"><i class="fa  fa-envelope"></i></span>
                                    </div>
                                </div>
                                <?php echo form_error('txtComAddress3');  ?>
                            </div>
                        </div>                      
                        
                       
                     
                        
                         <hr style="margin-top: 5px; margin-bottom:0px; border: 0; height: 1px; background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));" class="mb-3">
                        
                        <div class="form-row mb-3 ">
                         	<div class="col-md-4 ">
                         		<strong><u>New Consumer Information</u></strong>
                                </div>
                         </div>
                    
                        <div class="form-row">
                        
                        	<div class=" col-md-3 mb-4 ">
                               <?php /*?> <label >NIC</label><?php */?>
                                <div class="input-group">
                                <input type="text" class="form-control " id="txtNIC" name="txtNIC" placeholder="-- Customer NIC --" value="<?php echo set_value('txtNIC'); ?>"  maxlength="12" minlength= "10" data-toggle="tooltip" data-original-title=" Customer NIC ">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2"><i class="far  fa-id-badge"></i></span>
                                </div>
                                
                                </div>
                                
                                <?php echo form_error('txtNIC');  ?>
                            </div>
                            
                            <div class="col-md-6 mb-4 ">
                                <?php /*?><label for="validationServer01">New Customer Name</label><?php */?>
                                <div class="input-group">
                                <input type="text" class="form-control " id="txtCustomerName" name="txtCustomerName" placeholder="-- New Consumer Name with Initials --" value="<?php echo set_value('txtCustomerName'); ?>"  maxlength="50" data-toggle="tooltip" data-original-title=" New Consumer Name with Initials ">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2"><i class="far  fa-user"></i></span>
                                </div>
                                </div>
                                <?php echo form_error('txtCustomerName');  ?>
                            </div>
                            
                            
                            
                            
                            
                          
                        </div>
                        
                        
                        <?php /*?><div class="form-row ">
                         	<div class="col-md-4">
                         		<label >New Address</label>
                                </div>
                         </div><?php */?>
                         
                        <div class="form-row ">
                        
                        	<div class=" col-md-3 mb-4 ">
                                <?php /*?><label >Phone No</label><?php */?>
                                <div class="input-group">
                                	<input type="text" class="form-control <?php if(form_error('txtMobileNo')) echo "is-invalid";  ?>" id="txtMobileNo" name="txtMobileNo" placeholder="-- Contact No --" value="<?php echo set_value('txtMobileNo'); ?>" maxlength="10" minlength= "10" data-toggle="tooltip" data-original-title=" Contact No ">
                                    <div class="input-group-append ">
                                        <span class="input-group-text " id="basic-addon2"><i class="fas  fa-mobile-alt"></i></span>
                                    </div>
                                </div>
                                
                                <?php echo form_error('txtMobileNo');  ?>
                            </div>
                            
                            <div class="col-md-8 mb-3">
                            	
                                   
                                    <div class="input-group ">
                                    <input type="text" class="form-control " id="txtPemAddress1" name="txtPemAddress1" placeholder="-- New Consumer Address  --" value="<?php echo set_value('txtPemAddress1'); ?>"  maxlength="75" data-toggle="tooltip" data-original-title="  New Consumer Address ">
                                        <div class="input-group-append ">
                                        <span class="input-group-text " id="basic-addon2"><i class="fa  fa-envelope"></i></span>
                                    </div>
                                </div>
                                	<?php echo form_error('txtPemAddress1');  ?>
                            </div>
                            <?php /*?><div class="col-md-4 mb-3">
                                
                                <div class="input-group ">
                                <input type="text" class="form-control " id="txtPemAddress2" name="txtPemAddress2" placeholder="-- New Address Line 2 --" value="<?php echo set_value('txtPemAddress2'); ?>" maxlength="40">
                                <div class="input-group-append ">
                                        <span class="input-group-text " id="basic-addon2"><i class="fa  fa-envelope"></i></span>
                                    </div>
                                </div>
                                <?php echo form_error('txtPemAddress2');  ?>
                            </div>
                            <div class="col-md-4 mb-3">
                                
                                <div class="input-group ">
                                <input type="text" class="form-control " id="txtPemAddress3" name="txtPemAddress3" placeholder="-- New Address Line 3 --" value="<?php echo set_value('txtPemAddress3'); ?>"maxlength="40" >
                                <div class="input-group-append ">
                                        <span class="input-group-text " id="basic-addon2"><i class="fa  fa-envelope"></i></span>
                                    </div>
                                </div>
                                <?php echo form_error('txtPemAddress3');  ?>
                            </div><?php */?>
                        </div>
                        
                        
               
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
		 
		 if($('#txtReadOnly').val()==1) {
		  $('#txtOwnerName').attr('readonly', true);
		   $('#txtComAddress1').attr('readonly', true);
		 	$('#txtComAddress2').attr('readonly', true);
			 $('#txtComAddress3').attr('readonly', true);
	   }
	   
	    $( "#txtAccount").keyup(function( event ) {
			if($("#txtAccount").val().length ==10 ){
			getConsumer(); }
		});
		 
		<?php if($form_valid){?>
			setTimeout(function(){ 
				$("#form_application").attr("target", "_blank");
				$('#form_application').submit( );
				$("#form_application").attr("target", "_self");
				$("#form_application").attr("action", "index.php/application/ChangeNameAddress/saveRecord");
				history.replaceState("", "", "index.php/application/ChangeNameAddress");
			 }, 0);
		<?php }else {?>
				history.replaceState("", "", "index.php/application/ChangeNameAddress");
		<?php } ?>
		
		
		$( "#btnClear" ).click(function() {
		  	clearData();
		});
 });
 
 function clearData()
 {
	$('#form_application input[type="text"],select').val('');
	$('input').attr("readonly",false);
	$('#form_application input[type="text"]').attr("value", "");
	$('.invalid-feedback').html("");
	$(".form-control").removeClass("is-invalid"); 
	$("#form_application option[selected]").removeAttr("selected");  
	$("#form_application").attr("action", "index.php/application/ChangeNameAddress/saveRecord");
 }
 
 function getConsumer()
 {
	 var CIF = $("#txtAccount").val();
	 clearData();
	 
	$.ajax({type: 'POST',  dataType:"JSON", 	url: 'index.php/CustomerDB/CustomerDB/getCustomer',data:{'CIF':CIF},	async : false,	success: function (data) {
		 if(data.consumer==""){
			  $("#successMsg").html("Account No : "+ CIF+"<br>No Consumer Details.");
				$('.bd-success-modal-sm').modal('show'); 
		 }
		 else
		 {
			 $('#txtAccount').val(data.consumer.account);
			 $('#txtOwnerName').val(data.consumer.firstname+" "+data.consumer.lastname);			 
			 $('#txtComAddress1').val(data.consumer.addr1+",");
			 $('#txtComAddress2').val(data.consumer.addr2+",");
			 $('#txtComAddress3').val(data.consumer.addr3);
			 $('#txtOwnerName').attr('readonly', true);
			 $('#txtComAddress1').attr('readonly', true);
			 $('#txtComAddress2').attr('readonly', true);
			 $('#txtComAddress3').attr('readonly', true);
			  $('#txtReadOnly').val("1");
		 }
	 },    error: function(html){  }	});	 
 }	
	
	
</script>



