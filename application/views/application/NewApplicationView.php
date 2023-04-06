

    <div class="content p-4">
        

        <!--<h2 class="mb-4">Cards</h2>-->
		
        <div class="card mb-4" >
        
            <div class="card-header bg-white font-weight-bold">
                New Connection
            </div>
            <div class="card-body">
                <div class="col-md-12 col-md-auto">
                    
                    
                    <form id="form_application" method="post" action="<?php if($form_valid){ echo base_url().'index.php/application/NewApplication/printApplication'; }
																				else {echo base_url().'index.php/application/NewApplication/saveRecord';}?>"  >
                    
                    	<div class="form-row mb-2">
                         	<div class="col-md-4">
                         		<strong><u>New Customer Information</u></strong>
                                </div>
                         </div>
                    
                        <div class="form-row">
                            
                            <div class="col-md-6 mb-3 ">
                                <?php /*?><label for="validationServer01">Customer Name</label><?php */?>
                                <div class="input-group">
                                <strong class="text-danger">* </strong>
                                <input type="text" class="form-control <?php if(form_error('txtCustomerName')) echo "is-invalid";  ?>" id="txtCustomerName" name="txtCustomerName" placeholder="-- Consumer Full Name --" value="<?php echo set_value('txtCustomerName'); ?>" required maxlength="75" data-toggle="tooltip" data-original-title=" Consumer Full Name">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2"><i class="far  fa-user"></i></span>
                                </div>
                                </div>
                                <?php echo form_error('txtCustomerName');  ?>
                            </div>
                            
                            <div class=" col-md-4 mb-3  ">
                                <?php /*?><label >NIC</label><?php */?>
                                <div class="input-group">
                                <strong class="text-danger">* </strong>
                                <input type="text" class="form-control <?php if(form_error('txtNIC')) echo "is-invalid";  ?>" id="txtNIC" name="txtNIC" placeholder="-- Consumer NIC --" value="<?php echo set_value('txtNIC'); ?>" minlength= "10" maxlength="12" required data-toggle="tooltip" data-original-title="NIC">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2"><i class="far  fa-id-badge"></i></span>
                                </div>
                                
                                </div>
                                
                                <?php echo form_error('txtNIC');  ?>
                            </div>
                          
                        </div>
                        
                        <?php /*?><div class="form-row">
                        	<div class="col-md-9">
                        		<label >Contact Details</label>
                            </div>
                            <div class="col-md-3">
                            	<label for="validationServer01">Contact Numbers </label>
                            </div>
                        </div><?php */?>
                        <div class="form-row">
                            
                            <div class="col-md-6 mb-3">
                            	
                                    
                                    <div class="input-group ">
                                    <input type="text" class="form-control <?php if(form_error('txtComAddress1')) echo "is-invalid";  ?>" id="txtComAddress1" name="txtComAddress1" placeholder="--  Communication Address --" value="<?php echo set_value('txtComAddress1'); ?>" data-toggle="tooltip" data-original-title=" Communication Address">
                                        <div class="input-group-append">
                                        <span class="input-group-text " id="basic-addon2"><i class="fa  fa-envelope"></i></span>
                                    </div>
                                </div>
                                	<?php echo form_error('txtComAddress1');  ?>
                            </div>
                           <?php /*?> <div class="col-md-3 ">
                                
                                <div class="input-group ">
                                <input type="text" class="form-control " id="txtComAddress2" name="txtComAddress2" placeholder="--  Address Line 2 --" value="<?php echo set_value('txtComAddress2'); ?>" >
                                <div class="input-group-append ">
                                        <span class="input-group-text " id="basic-addon2"><i class="fa  fa-envelope"></i></span>
                                    </div>
                                </div>
                                <?php echo form_error('txtComAddress2');  ?>
                            </div>
                            <div class="col-md-3 ">
                                
                                <div class="input-group ">
                                <input type="text" class="form-control " id="txtComAddress3" name="txtComAddress3" placeholder="--  Address Line 3 --" value="<?php echo set_value('txtComAddress3'); ?>" >
                                <div class="input-group-append ">
                                        <span class="input-group-text " id="basic-addon2"><i class="fa  fa-envelope"></i></span>
                                    </div>
                                </div>
                                <?php echo form_error('txtComAddress3');  ?>
                            </div><?php */?>
                           <?php /*?> <div class="col-md-4 mb-3 "><?php */?>
                            
                           <?php /*?> <div class="form-row"><?php */?> 
                           <div class="col-md-3">
                            	<div class=" input-group">
                                <strong class="text-danger">* </strong>
                                	<input type="text" class="form-control <?php if(form_error('txtMobileNo')) echo "is-invalid";  ?>" id="txtMobileNo" name="txtMobileNo" placeholder="-- Mobile No --" value="<?php echo set_value('txtMobileNo'); ?>" minlength= "10" maxlength="10" required data-toggle="tooltip" data-original-title=" Mobile No">
                                    <div class="input-group-append ">
                                        <span class="input-group-text " id="basic-addon2"><i class="fas  fa-mobile-alt"></i></span>
                                    </div>
                                    
                                </div>
                                <?php echo form_error('txtMobileNo');  ?> 
                              </div>
                              <div class="col-md-3">  
                                <div class=" input-group">
                                	<input type="text" class="form-control <?php if(form_error('txtPhoneNo')) echo "is-invalid";  ?>" id="txtPhoneNo" name="txtPhoneNo" placeholder=" Residence No -" value="<?php echo set_value('txtPhoneNo'); ?>" data-toggle="tooltip" data-original-title=" Residence Phone No">
                                    <div class="input-group-append ">
                                        <span class="input-group-text " id="basic-addon2"><i class="fa  fa-phone"></i></span>
                                    </div>
                                    
                                </div>
                                 <?php echo form_error('txtPhoneNo');  ?>
                            </div>
                            
                             </div>   
                               
                               
                                
                           
                        
                        
                        
                        
                         <hr style="margin-top: 5px; margin-bottom:0px; border: 0; height: 1px; background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));" class="mb-3">
                         
                         <div class="form-row mb-2">
                         	<div class="col-md-4">
                         		<strong><u>Details of the Premises</u></strong>
                                </div>
                         </div>
                         
                         
                         
                         <div class="form-row mb-2">
                         
                         	 <div class="col-md-3 mb-3 ">
                                <?php /*?><label for="validationServer01">Purpose</label><?php */?>
                                 <div class="input-group">
                                <strong class="text-danger">* </strong>
                                <select  class="form-control <?php if(form_error('cmbPurposeType')) echo "is-invalid";  ?>" required name="cmbPurposeType" id="cmbPurposeType" data-toggle="tooltip" data-original-title=" Purpose" >
                                  <option value="" >-- Select Purpose --</option>
                                  <option value="1" <?php echo set_select('cmbPurposeType','1'); ?> >House</option>
                                  <option value="2" <?php echo set_select('cmbPurposeType','2'); ?> >Apartment</option>
                                   <option value="3" <?php echo set_select('cmbPurposeType','3'); ?> > Adjoining House</option>
                                   <option value="4" <?php echo set_select('cmbPurposeType','4'); ?> >Hotels</option>
                                    <option value="5" <?php echo set_select('cmbPurposeType','5'); ?> >Shops</option>
                                     <option value="6" <?php echo set_select('cmbPurposeType','6'); ?> >Office</option>
                                   <option value="7" <?php echo set_select('cmbPurposeType','7'); ?> >Saw Mill/ Metal Crusher</option>
                                   <option value="8" <?php echo set_select('cmbPurposeType','8'); ?> >Welding Work Shop</option>
                                   <option value="9" <?php echo set_select('cmbPurposeType','9'); ?> >Rice Mill/ Grinding Mill</option>
                                   <option value="10" <?php echo set_select('cmbPurposeType','10'); ?> >Pump House</option>
                                   <option value="11" <?php echo set_select('cmbPurposeType','11'); ?> >Industrial</option>
                                   <option value="12" <?php echo set_select('cmbPurposeType','12'); ?> >Religious</option>
                                   <option value="13" <?php echo set_select('cmbPurposeType','13'); ?> >Other</option>
                                </select>
                                <?php echo form_error('cmbPurposeType');  ?>
                               </div>
                            </div>
                         
                         	<div class="col-md-3 mb-3 ">
                                <?php /*?><label for="validationServer01">Possession</label><?php */?>
                                <div class="input-group">
                               
                                <select  class="form-control <?php if(form_error('cmbStatusType')) echo "is-invalid";  ?>"  name="cmbStatusType" id="cmbStatusType" data-toggle="tooltip" data-original-title=" Possession" >
                                  <option value="" >-- Select Possession --</option>
                                  <option value="1" <?php echo set_select('cmbStatusType','1'); ?> >Owner</option>
                                  <option value="2" <?php echo set_select('cmbStatusType','2'); ?> >Leaser</option>
                                   <option value="3" <?php echo set_select('cmbStatusType','3'); ?> >Lawful Occupant</option>
                                </select>
                                <?php echo form_error('cmbStatusType');  ?>
                               </div>
                            </div>
                            
                           
                            
                             <div class="col-md-6 mb-3">
                            	<?php /*?><label >Address of the Premises</label><?php */?>
                                   
                                    <div class="input-group ">
                                    <strong class="text-danger">* </strong>
                                    <input type="text" class="form-control <?php if(form_error('txtPemAddress1')) echo "is-invalid";  ?>" id="txtPemAddress1" name="txtPemAddress1" placeholder="-- Premises Address --" value="<?php echo set_value('txtPemAddress1'); ?>" maxlength = "75"  required data-toggle="tooltip" data-original-title=" Premises Address" >
                                        <div class="input-group-append ">
                                        <span class="input-group-text " id="basic-addon2"><i class="fa  fa-envelope"></i></span>
                                    </div>
                                </div>
                                	<?php echo form_error('txtPemAddress1');  ?>
                            </div>
                            
                            
                         </div>
                         
                         <?php /*?><div class="form-row ">
                         	<div class="col-md-4">
                         		<label >Address of the Premises</label>
                                </div>
                         </div><?php */?>
                         
                        <?php /*?><div class="form-row ">
                            
                            <div class="col-md-4 mb-3">
                            	
                                   
                                    <div class="input-group ">
                                    <input type="text" class="form-control " id="txtPemAddress1" name="txtPemAddress1" placeholder="-- Premises Address Line 1 --" value="<?php echo set_value('txtPemAddress1'); ?>" >
                                        <div class="input-group-append ">
                                        <span class="input-group-text " id="basic-addon2"><i class="fa  fa-envelope"></i></span>
                                    </div>
                                </div>
                                	<?php echo form_error('txtPemAddress1');  ?>
                            </div>
                            <div class="col-md-4 ">
                                
                                <div class="input-group ">
                                <input type="text" class="form-control " id="txtPemAddress2" name="txtPemAddress2" placeholder="-- Premises Address Line 2 --" value="<?php echo set_value('txtPemAddress2'); ?>" >
                                <div class="input-group-append ">
                                        <span class="input-group-text " id="basic-addon2"><i class="fa  fa-envelope"></i></span>
                                    </div>
                                </div>
                                <?php echo form_error('txtPemAddress2');  ?>
                            </div>
                            <div class="col-md-4 ">
                                
                                <div class="input-group ">
                                <input type="text" class="form-control " id="txtPemAddress3" name="txtPemAddress3" placeholder="-- Premises Address Line 3 --" value="<?php echo set_value('txtPemAddress3'); ?>" >
                                <div class="input-group-append ">
                                        <span class="input-group-text " id="basic-addon2"><i class="fa  fa-envelope"></i></span>
                                    </div>
                                </div>
                                <?php echo form_error('txtPemAddress3');  ?>
                            </div>
                        </div><?php */?>
                        
                        
                        <div class="form-row">
                            
                            <div class="col-md-3 mb-3">
                            	
                                <?php /*?>    <label >Neighbouring House A/C No</label><?php */?>
                                    <div class="input-group ">
                                   
                                    <input type="text" class="form-control <?php if(form_error('txtNebAccount')) echo "is-invalid";  ?>" id="txtNebAccount" name="txtNebAccount" placeholder="-- Neighbouring A/C No--" value="<?php echo set_value('txtNebAccount'); ?>"  minlength= "10" maxlength="10" data-toggle="tooltip" data-original-title=" Neighbouring House A/C No ">
                                        <div class="input-group-append ">
                                        <span class="input-group-text " id="basic-addon2"><i class="fa  fa-edit"></i></span>
                                    </div>
                                </div>
                                	<?php echo form_error('txtNebAccount');  ?>
                            </div>
                            
                            <div class="col-md-3 ">
                                <?php /*?><label for="validationServer02"> Previous A/C No of the Premises</label><?php */?>
                                <div class="input-group ">
                                <input type="text" class="form-control <?php if(form_error('txtPrvAccount')) echo "is-invalid";  ?>" id="txtPrvAccount" name="txtPrvAccount" placeholder="-- Previous A/C No --" value="<?php echo set_value('txtPrvAccount'); ?>" minlength= "10" maxlength="10" data-toggle="tooltip" data-original-title=" Previous A/C No of the Premises">
                                <div class="input-group-append ">
                                        <span class="input-group-text " id="basic-addon2"><i class="fa  fa-edit"></i></span>
                                    </div>
                                </div>
                                <?php echo form_error('txtPrvAccount');  ?>
                            </div>
                            <div class="col-md-3 ">
                                <?php /*?><label for="validationServer02">Account No's Under Applicant Name</label><?php */?>
                                
                               <?php /*?> <div class="form-row"> <?php */?>
                                    <div class=" input-group ">
                                        <input type="text" class="form-control <?php if(form_error('txtOwnAccount1')) echo "is-invalid";  ?>" id="txtOwnAccount1" name="txtOwnAccount1" placeholder="-- Applicant A/C No 1 --" value="<?php echo set_value('txtOwnAccount1'); ?>" minlength= "10" maxlength="10" data-toggle="tooltip" data-original-title=" Applicant A/C No 1">
                                        <div class="input-group-append ">
                                            <span class="input-group-text " id="basic-addon2"><i class="fa fa-edit"></i></span>
                                        </div>
                                       
                                    </div>
                                     <?php echo form_error('txtOwnAccount1');  ?>
                               </div>
                               <div class="col-md-3 ">     
                                    <div class=" input-group ">
                                        <input type="text" class="form-control <?php if(form_error('txtOwnAccount2')) echo "is-invalid";  ?>" id="txtOwnAccount2" name="txtOwnAccount2" placeholder="-- Applicant A/C No 2 --" value="<?php echo set_value('txtOwnAccount2'); ?>" minlength= "10" maxlength="10" data-toggle="tooltip" data-original-title=" Applicant A/C No 2">
                                        <div class="input-group-append ">
                                            <span class="input-group-text " id="basic-addon2"><i class="fa fa-edit"></i></span>
                                        </div>
                                        
                                    </div>
                                    <?php echo form_error('txtOwnAccount2');  ?>
                                </div>    
                                <?php /*?></div>
                                
                                
                            </div><?php */?>
                        </div>
                        
                        <hr style="margin-top: 5px; margin-bottom:0px; border: 0; height: 1px; background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));" class="mb-3">
                        
                        <div class="form-row mb-2">
                         	<div class="col-md-4">
                         		<strong><u>Details of Installation</u></strong>
                                </div>
                         </div>
                         
                         <div class="form-row">
                             <div class="col-md-3 mb-3 ">
                             
                                    <label>Wiring Installation</label>
                                    <div class="input-group">
                                    <strong class="text-danger">* </strong>
                                    <select  class="form-control <?php if(form_error('cmbPhaseType')) echo "is-invalid";  ?>"  name="cmbPhaseType" id="cmbPhaseType" required>
                                      <option value="" >-- Select Phase --</option>
                                      <option value="1" <?php echo set_select('cmbPhaseType','1'); ?> >Single Phase</option>
                                      <option value="2" <?php echo set_select('cmbPhaseType','2'); ?> >Three Phase</option>
                                    </select>
                                    <?php echo form_error('cmbPhaseType');  ?>
                                   </div>
                                </div>
                                
                                <div class="col-md-3 mb-3 offset-md-1 ">
                                    <label>&nbsp;</label>
                                    
                                    <label>Required AMP</label>
                                    <div class="input-group" >
                                    <strong class="text-danger">* </strong>
                                    <select  class="form-control <?php if(form_error('cmbAmpType')) echo "is-invalid";  ?> "  name="cmbAmpType" id="cmbAmpType" required>
                                      <option value="" >-- Select AMP --</option>
                                      <option value="1" <?php echo set_select('cmbAmpType','1'); ?> >30A</option>
                                      <option value="2" <?php echo set_select('cmbAmpType','2'); ?> >60A</option>
                                      
                                    </select>
                                    <?php echo form_error('cmbAmpType');  ?>
                                   
                                </div>
                                
                           </div>
                           
                          </div>
                          <hr style="margin-top: 5px; margin-bottom:0px; border: 0; height: 1px; background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));" class="mb-3">
                        
                        
                        
                        <div class="form-row">
                        
                        	<?php /*?><div class="col-md-2 mb-3">
                                <label >Lamp Points</label>
                                    <div class="input-group ">
                                    <input type="text" class="form-control " id="txtLamp" name="txtLamp" placeholder="-- Lamps --" value="<?php echo set_value('txtLamp'); ?>" >
                                        <div class="input-group-append ">
                                        <span class="input-group-text " id="basic-addon2"><i class="fa  fa-light"></i></span>
                                    </div>
                                </div>
                                	<?php echo form_error('txtLamp');  ?>
                               
                            </div>
                            
                            <div class="col-md-2 mb-3">
                                <label >Fans</label>
                                    <div class="input-group ">
                                    <input type="text" class="form-control " id="txtFans" name="txtFans" placeholder="-- Fans --" value="<?php echo set_value('txtFans'); ?>" >
                                        <div class="input-group-append ">
                                        <span class="input-group-text " id="basic-addon2"><i class="fa  fa-envelope"></i></span>
                                    </div>
                                </div>
                                	<?php echo form_error('txtFans');  ?>
                               
                            </div><?php */?>
                            
                            
                            <div class="col-md-3 mb-3 ">
                            <div class="form-row">
                            	<div class="col-md-6"><label>Lamp Point</label></div>
                                <div class="col-md-6"><label>Fans</label></div>
                            </div>
                            
                            <div class="form-row"> 
                            	<div class="col-md-6 input-group">
                                	<input type="text" class="form-control <?php if(form_error('txtLamp')) echo "is-invalid";  ?>" id="txtLamp" name="txtLamp" placeholder="Lamps" value="<?php echo set_value('txtLamp'); ?>" >
                                    <div class="input-group-append ">
                                        <span class="input-group-text " id="basic-addon2"><i class="fa fa-lightbulb"></i></span>
                                    </div>
                                </div>
                                
                                <div class="col-md-6 input-group">
                                	<input type="text" class="form-control <?php if(form_error('txtFans')) echo "is-invalid";  ?>" id="txtFans" name="txtFans" placeholder="Fans" value="<?php echo set_value('txtFans'); ?>" >
                                    <div class="input-group-append ">
                                        <span class="input-group-text " id="basic-addon2"><i class="fa fa-cog"></i></span>
                                    </div>
                                </div>
                                
                            </div>
                            <?php echo form_error('txtFans');  ?>
                            <?php echo form_error('txtLamp');  ?>
                            </div>
                           
                            
                             
                            
                            <div class="col-md-3 mb-3 offset-md-1">
                            <label for="validationServer01">Socket Outlets</label>
                            <div class="form-row"> 
                            	<div class="col-md-6 input-group">
                                	<input type="text" class="form-control <?php if(form_error('txtSocket5')) echo "is-invalid";  ?>" id="txtSocket5" name="txtSocket5" placeholder="5 Amp" value="<?php echo set_value('txtSocket5'); ?>" >
                                    <div class="input-group-append ">
                                        <span class="input-group-text " id="basic-addon2"><i class="fa fa-plug"> 5A</i></span>
                                    </div>
                                </div>
                                
                                <div class="col-md-6 input-group">
                                	<input type="text" class="form-control <?php if(form_error('txtSocket15')) echo "is-invalid";  ?>" id="txtSocket15" name="txtSocket15" placeholder="15 Amp" value="<?php echo set_value('txtSocket15'); ?>" >
                                    <div class="input-group-append ">
                                        <span style="padding:5px" class="input-group-text " id="basic-addon2"><i class="fa fa-plug"> 15A</i></span>
                                    </div>
                                </div>
                                
                            </div>
                               <?php echo form_error('txtSocket5');  ?> 
                                <?php echo form_error('txtSocket15');  ?>
                                
                                
                            </div>
                            
                            <div class="col-md-3 mb-3 offset-md-1">
                            <label for="validationServer01">Air Conditioning</label>
                            <div class="form-row"> 
                            	<div class="col-md-8 input-group">
                                	<input type="text" class="form-control <?php if(form_error('txtAirCapacity')) echo "is-invalid";  ?>" id="txtAirCapacity" name="txtAirCapacity" placeholder="Capacity" value="<?php echo set_value('txtAirCapacity'); ?>" >
                                    <div class="input-group-append ">
                                        <span    class="input-group-text " id="basic-addon2">BTU</span>
                                    </div>
                                </div>
                                
                                <div class="col-md-4 input-group">
                                	<input type="text" class="form-control <?php if(form_error('txtAirNo')) echo "is-invalid";  ?>" id="txtAirNo" name="txtAirNo" placeholder="" value="<?php echo set_value('txtAirNo'); ?>" >
                                    <div class="input-group-append ">
                                        <span class="input-group-text " id="basic-addon2">#</i></span>
                                    </div>
                                </div>
                                
                            </div>
                                
                                <?php echo form_error('txtAirCapacity');  ?>
                                <?php echo form_error('txtAirNo');  ?>
                                
                            </div>
                            
                           </div>
                            <!--------------------------------->
                            
                            <div class="form-row">
                                <div class="col-md-3 mb-3">
                                <label for="validationServer01">Motor - 1</label>
                                <div class="form-row"> 
                                    <div class="col-md-8 input-group">
                                        <input type="text" class="form-control <?php if(form_error('txtMotor1Capacity')) echo "is-invalid";  ?>" id="txtMotor1Capacity" name="txtMotor1Capacity" placeholder="Capacity" value="<?php echo set_value('txtMotor1Capacity'); ?>" >
                                        <div class="input-group-append ">
                                            <span class="input-group-text " id="basic-addon2">HP/kW</span>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4 input-group">
                                        <input type="text" class="form-control <?php if(form_error('txtMotor1No')) echo "is-invalid";  ?>" id="txtMotor1No" name="txtMotor1No" placeholder="" value="<?php echo set_value('txtMotor1No'); ?>" >
                                        <div class="input-group-append ">
                                            <span class="input-group-text " id="basic-addon2">#</span>
                                        </div>
                                    </div>
                                    
                                </div>
									<?php echo form_error('txtMotor1Capacity');  ?>
                                    <?php echo form_error('txtMotor1No');  ?>
                                </div>
                           
                            
                             
                            
                            <div class="col-md-3 mb-3 offset-md-1">
                            
                                <label for="validationServer01">Motor - 2</label>
                                <div class="form-row"> 
                                    <div class="col-md-8 input-group">
                                        <input type="text" class="form-control <?php if(form_error('txtMotor2Capacity')) echo "is-invalid";  ?>" id="txtMotor2Capacity" name="txtMotor2Capacity" placeholder="Capacity" value="<?php echo set_value('txtMotor2Capacity'); ?>" >
                                        <div class="input-group-append ">
                                            <span class="input-group-text " id="basic-addon2">HP/kW</span>
                                        </div>
                                    </div>
                                   
                                    <div class="col-md-4 input-group">
                                        <input type="text" class="form-control <?php if(form_error('txtMotor2No')) echo "is-invalid";  ?>" id="txtMotor2No" name="txtMotor2No" placeholder="" value="<?php echo set_value('txtMotor2No'); ?>" >
                                        <div class="input-group-append ">
                                            <span class="input-group-text " id="basic-addon2">#</span>
                                        </div>
                                    </div>
                                    
                                </div>
							 <?php echo form_error('txtMotor2Capacity');  ?>
                             <?php echo form_error('txtMotor2No');  ?>
                            </div>
                            
                            <div class="col-md-3 mb-3 offset-md-1">
                            
                                <label for="validationServer01">Motor - 3</label>
                                <div class="form-row"> 
                                    <div class="col-md-8 input-group">
                                        <input type="text" class="form-control <?php if(form_error('txtMotor3Capacity')) echo "is-invalid";  ?>" id="txtMotor3Capacity" name="txtMotor3Capacity" placeholder="Capacity" value="<?php echo set_value('txtMotor3Capacity'); ?>" >
                                        <div class="input-group-append ">
                                            <span class="input-group-text " id="basic-addon2">HP/kW</span>
                                        </div>
                                    </div>
                                     
                                    <div class="col-md-4 input-group">
                                        <input type="text" class="form-control <?php if(form_error('txtMotor3No')) echo "is-invalid";  ?>" id="txtMotor3No" name="txtMotor3No" placeholder="" value="<?php echo set_value('txtMotor3No'); ?>" >
                                        <div class="input-group-append ">
                                            <span class="input-group-text " id="basic-addon2">#</span>
                                        </div>
                                    </div>
                                    
                                </div>
								 <?php echo form_error('txtMotor3Capacity');  ?>
                                 <?php echo form_error('txtMotor3No');  ?>
                                </div>
                            
                           </div>
                             
                        <!--------------------------------->
                            
                            <div class="form-row">
                            <div class="col-md-3 mb-3">
                            <label for="validationServer01">Water Pump</label>
                            <div class="form-row"> 
                            	<div class="col-md-8 input-group">
                                	<input type="text" class="form-control <?php if(form_error('txtPumpCapacity')) echo "is-invalid";  ?>" id="txtPumpCapacity" name="txtPumpCapacity" placeholder="Capacity" value="<?php echo set_value('txtPumpCapacity'); ?>" >
                                    <div class="input-group-append ">
                                        <span class="input-group-text " id="basic-addon2">HP/kW</span>
                                    </div>
                                </div>
                                
                                <div class="col-md-4 input-group">
                                	<input type="text" class="form-control <?php if(form_error('txtPumpNo')) echo "is-invalid";  ?>" id="txtPumpNo" name="txtPumpNo" placeholder="" value="<?php echo set_value('txtPumpNo'); ?>" >
                                    <div class="input-group-append ">
                                        <span class="input-group-text " id="basic-addon2">#</span>
                                    </div>
                                </div>
                                
                            </div>
                                <?php echo form_error('txtPumpCapacity');  ?>
                                <?php echo form_error('txtPumpNo');  ?>
                                
                                
                            </div>
                           
                            
                             
                            
                            <div class="col-md-3 mb-3 offset-md-1">
                            
                            <label for="validationServer01">Electric Welding Plant</label>
                            <div class="form-row"> 
                            	<div class="col-md-8 input-group">
                                	<input type="text" class="form-control <?php if(form_error('txtWeldingCapacity')) echo "is-invalid";  ?>" id="txtWeldingCapacity" name="txtWeldingCapacity" placeholder="Capacity" value="<?php echo set_value('txtWeldingCapacity'); ?>" >
                                    <div class="input-group-append ">
                                        <span class="input-group-text " id="basic-addon2">HP/kW</span>
                                    </div>
                                </div>
                                 
                                <div class="col-md-4 input-group">
                                	<input type="text" class="form-control <?php if(form_error('txtWeldingNo')) echo "is-invalid";  ?>" id="txtWeldingNo" name="txtWeldingNo" placeholder="" value="<?php echo set_value('txtWeldingNo'); ?>" >
                                    <div class="input-group-append ">
                                        <span class="input-group-text " id="basic-addon2">#</span>
                                    </div>
                                </div>
                                 
                            </div>
                                
                                <?php echo form_error('txtWeldingCapacity');  ?>
                                <?php echo form_error('txtWeldingNo');  ?>
                               
                            </div>
                            
                            <div class="col-md-3 mb-3 offset-md-1">
                            
                            <label for="validationServer01">Other</label>
                            <div class="form-row"> 
                            	<div class="col-md-8 input-group">
                                	<input type="text" class="form-control " id="txtOther" name="txtOther" placeholder="-- Specify --" value="<?php echo set_value('txtOther'); ?>" >
                                    <div class="input-group-append ">
                                        <span class="input-group-text " id="basic-addon2"></span>
                                    </div>
                                </div>
                                 
                                <div class="col-md-4 input-group">
                                	<input type="text" class="form-control " id="txtOtherNo" name="txtOtherNo" placeholder="" value="<?php echo set_value('txtOtherNo'); ?>" >
                                    <div class="input-group-append ">
                                        <span class="input-group-text " id="basic-addon2">#</span>
                                    </div>
                                </div>
                                 
                            </div>
                                <?php echo form_error('txtOther');  ?>
                                <?php echo form_error('txtOtherNo');  ?>
                                
                               
                            </div>
                            
                           </div>
                        
                        

                    
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
				$("#form_application").attr("action", "index.php/application/NewApplication/saveRecord");
				history.replaceState("", "", "index.php/application/NewApplication");
			 }, 0);
		<?php }else {?>
				history.replaceState("", "", "index.php/application/NewApplication");
		<?php } ?>
		
		
		$( "#btnClear" ).click(function() {
		  	$('#form_application input[type="text"],select').val('');
			$('#form_application input[type="text"]').attr("value", "");
			$('.invalid-feedback').html("");
			$(".form-control").removeClass("is-invalid"); 
			$("#form_application option[selected]").removeAttr("selected");  
			$("#form_application").attr("action", "index.php/application/NewApplication/saveRecord");
		});
	});
	
</script>