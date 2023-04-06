

    <div class="content p-4">
        <?php 
												if($this->session->flashdata('success'))
												{
													echo '<h4 class="text-center spanError" style="color: #51a328">'.$this->session->flashdata('success').'</h4><br>';	
												}
												if($this->session->flashdata('fail'))
												{
													echo '<h4 class="text-center spanError" style="color: #FF2331">'.$this->session->flashdata('fail').'</h4><br>';					
												}
												
											?>

        <!--<h2 class="mb-4">Cards</h2>-->
		<form method="post" action="<?php echo base_url().'index.php/userSettings/PasswordReset/saveRecord'?>">
        <div class="card mb-4">
            <div class="card-header bg-white font-weight-bold">
                Password Reset
            </div>
            <div class="card-body">
                <div class="col-md-12 col-md-auto">
                    
                        <div class="form-row">
                           
                            <div class="col-md-4 mb-3">
                                <label for="validationServer01">User Name</label>
                                <input type="text" class="form-control is-valid" id="txtUserName" name="txtUserName" placeholder="" value="<?php echo $this->session->userdata('user_name');?>" required readonly="readonly">
                                <input type="hidden" id="txtUserId" name="txtUserId" value="<?php echo $this->session->userdata('user_id');?>" />
                                <?php echo form_error('txtUserName');  ?>
                            </div>
                            
                            <div class="col-md-4 mb-3">
                                <label for="validationServer02">Current Password</label>
                                 <input type="password" class="form-control" placeholder="" id="txtCurrentPassword" name="txtCurrentPassword" value="<?php echo set_value('txtCurrentPassword'); ?>" required >
                                <?php echo form_error('txtCurrentPassword');  ?>
                            </div>
                          
                        </div>
                        
                        <div class="form-row">
                           
                            <div class="col-md-4 mb-3">
                                <label for="validationServer01">New Password</label>
                                <input type="password" class="form-control" placeholder="" id="txtPassword" name="txtPassword" value="<?php echo set_value('txtPassword'); ?>" required maxlength="6">
                                <?php echo form_error('txtPassword');  ?>
                            </div>
                            
                            <div class="col-md-4 mb-3">
                                <label for="validationServer02">Re Type New Password</label>
                                 <input type="password" class="form-control" placeholder="" id="txtRePassword" name="txtRePassword" value="<?php echo set_value('txtRePassword'); ?>" required maxlength="6">
                                <?php echo form_error('txtRePassword');  ?>
                            </div>
                          
                        </div>
                        

                    
                </div>

            </div>
            <div class="card-footer bg-white card-auto button-right">
            	<div class="float-right">
                	 <button class="btn btn-success" type="submit">Save</button> <button class="btn btn-info" id="btnClear" type="button">Clear</button>
                </div>
               
            </div>
            </form>
        </div>
       
    </div>
</div>

<script>
    $(document).ready(function () {
       $( "#btnClear" ).click(function() {
			$('#txtPassword').val("");
			$('#txtRePassword').html("");
			$('#txtCurrentPassword').val("");
		});
    });
	

	
</script>



