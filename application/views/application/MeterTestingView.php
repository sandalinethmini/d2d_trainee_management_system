

    <div class="content p-4">
        

        <!--<h2 class="mb-4">Cards</h2>-->
		
        <div class="card mb-4" >
        
            <div class="card-header bg-white font-weight-bold">
                Meter Testing Application
            </div>
            <div class="card-body">
                <div class="col-md-12 col-md-auto">
                     <form id="form_application" method="post" action="<?php if($form_valid){ echo base_url().'index.php/application/MeterTesting/printApplication'; }
																				else {echo base_url().'index.php/application/MeterTesting/saveRecord';}?>"  >
                     <div class=" ">
                         	<div class="">
                         		<strong><u>Account Details</u></strong>
                                 <input type="hidden" id="txtReadOnly" name="txtReadOnly" value="<?php echo set_value('txtReadOnly'); ?>" />
                                </div>
                         </div>
                         <br />
                     <div class="form-row">
                            <div class="col-md-3 ">
                                <?php /*?><label for="validationServer02">Account Number</label><?php */?>
                                <div class="input-group ">
                                 <strong class="text-danger">*</strong>
                                <input type="text" class="form-control <?php if(form_error('txtAccount')) echo "is-invalid";  ?> " id="txtAccount" name="txtAccount" placeholder="-- Account Number --" value="<?php echo set_value('txtAccount'); ?>" maxlength="10" minlength="10" required data-toggle="tooltip" data-original-title="Account Number">
                                <div class="input-group-append ">
                                        <span class="input-group-text " id="basic-addon2"><i class="fa  fa-edit"></i></span>
                                    </div>
                                </div>
                                <?php echo form_error('txtAccount');  ?>
                            </div>
                            
                            <div class="col-md-5 mb-3 offset-md-1">
                            	
                                    <?php /*?><label >Current Owner Name</label><?php */?>
                                    <div class="input-group ">
                                     <strong class="text-danger">*</strong>
                                    <input type="text" class="form-control <?php if(form_error('txtOwnerName')) echo "is-invalid";  ?>" id="txtOwnerName" name="txtOwnerName" placeholder="-- Current Owner Name --" value="<?php echo set_value('txtOwnerName'); ?>" required maxlength="50" data-toggle="tooltip" data-original-title="  Current Owner Name">
                                        <div class="input-group-append ">
                                        <span class="input-group-text " id="basic-addon2"><i class="fa  fa-user"></i></span>
                                    </div>
                                </div>
                                	<?php echo form_error('txtOwnerName');  ?>
                            </div>
                            
                            
                           
                            
                        </div>
                        
                        <hr style="margin-top: 5px; margin-bottom:0px; border: 0; height: 2px; background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));" class="mb-3">
                        
                        <div class="form-row ">
                         	<div class="col-md-4">
                         		<strong><u>Contact Details</u></strong>
                                </div>
                         </div>
                         
                          <br />
                        
                       
                        
                        <div class="form-row ">
                        
                         <div class=" col-md-3 mb-3 ">
                                <?php /*?><label >Phone No</label><?php */?>
                                <div class="input-group">
                                	<input type="text" class="form-control <?php if(form_error('txtMobileNo')) echo "is-invalid";  ?>" id="txtMobileNo" name="txtMobileNo" placeholder="-- Mobile --" value="<?php echo set_value('txtMobileNo'); ?>" maxlength="10" minlength="10" data-toggle="tooltip" data-original-title=" Mobile">
                                    <div class="input-group-append ">
                                        <span class="input-group-text " id="basic-addon2"><i class="fas  fa-mobile-alt"></i></span>
                                    </div>
                                </div>
                                
                                <?php echo form_error('txtMobileNo');  ?>
                            </div>
                            
                            
                            <div class="col-md-8 mb-3">
                            	
                                   <?php /*?><label >Consumer Address</label><?php */?>
                                    <div class="input-group ">
                                    <input type="text" class="form-control " id="txtPemAddress1" name="txtPemAddress1" placeholder="-- Premises Address --" value="<?php echo set_value('txtPemAddress1'); ?>" maxlength="60" data-toggle="tooltip" data-original-title=" Premises Address">
                                        <div class="input-group-append ">
                                        <span class="input-group-text " id="basic-addon2"><i class="fa  fa-envelope"></i></span>
                                    </div>
                                </div>
                                	<?php echo form_error('txtPemAddress1');  ?>
                            </div>
                            
                           
                            
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
        <p class="modal-title"><strong>Information !</strong></p>
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
	   if($('#txtReadOnly').val()==1)
	   {
		  $('#txtOwnerName').attr('readonly', true);
		  $('#txtPemAddress1').attr('readonly', true); 
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
				$("#form_application").attr("action", "index.php/application/MeterTesting/saveRecord");
				history.replaceState("", "", "index.php/application/MeterTesting");
				
				
			 }, 0);
		<?php }else {?>
				history.replaceState("", "", "index.php/application/MeterTesting");
		<?php } ?>
		
		
		$( "#btnClear" ).click(function() {
		  	clearData();
		});
 });
 
 function clearData()
 {
	$('#form_application input[type="text"],select').val('');
	$('#form_application input[type="text"]').attr("value", "");
	$('#txtReadOnly').val("");
	$('input').attr("readonly",false);
	$('.invalid-feedback').html("");
	$(".form-control").removeClass("is-invalid"); 
	$("#form_application option[selected]").removeAttr("selected"); 
	$("#form_application").attr("action", "index.php/application/MeterTesting/saveRecord"); 
			
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
			 $('#txtPemAddress1').val(data.consumer.addr1+", "+data.consumer.addr2+", "+data.consumer.addr3);
			 $('#txtOwnerName').attr('readonly', true);
			 $('#txtPemAddress1').attr('readonly', true);
			 $('#txtReadOnly').val("1");
		 }
	 },    error: function(html){  }	});	 
 }	
</script>