<style>
.button-style{	padding-top:1px;height:25px;	}

.spanError {
      color: red;
      font-size: 14px;
  }
  .field-height{padding-top:0px;height:24px; font-size:12px	}
</style>
<div class="content p-4">
      
		
        <div class="card-header bg-white font-weight-bold">
           Search Trainee
        </div>
       
                    <form id="form_application" method="post"  action="<?php echo base_url().'index.php/trainee_pdf/printReport'?>" >
                                                             
        <div class="card-body bg-white">
                <div class="col-md-12 col-md-auto">
               <div class="row col-md-12">
    <label>Enter NIC :</label><br>
    <div class="col-md-5">
        <input type="text" class="form-control field-height" id="txtSelectedNIC" placeholder="" name="txtSelectedNIC" value="<?php echo set_value('txtSelectedNIC')?>">
        <span id="searchError" class="invalid-feedback" style="display:block;"></span><?php echo form_error('txtSelectedNIC'); ?>
    </div></br>
</div>
        
                        
                                	<input type="hidden" name="print_type" id="print_type"  value="<?php echo $print_type;?>" />

                                    
                                    <div class="col-md-3">
                                    </div>
                                    <div class="col-md-3">
                                    </div>
                                    <div class="col-md-3">
                                    </div>
                                    <div class="col-md-3">
                                    </div>
                                    <div class="col-md-3">
                                    </div>
                                    <div class="col-md-3">
                                    </div>
                                    <div class="container">
        <div class="row">
            <div class="col-md-12 text-right">
                                        
                                    <button type="submit" class="btn btn-info" name="action" value="view_PDF"   style="width: 85px;  ">Download</button>&nbsp;&nbsp;
                                   <button type="button" class="btn btn-primary"  value="confirm" id="clearBtn" onClick="" style="width:75px;margin-right:77px; ">Clear</button>&nbsp;&nbsp;
                        </div> 
                        
                                    </div>
                    </form>
                
</div>


<div class="modal fade bd-success-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" style="z-index:1200" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #00a8b8;border-radius: 5px;padding: 10px;color:#fff">
                <h5 class="modal-title">Information !</h5>
            </div>
            <div class="modal-body">
                <p id="successMsg">Branch or Insurance Company Should be Selected.
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-bule" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

  <script>
    $(document).ready(function() {
        // Remove any initialization related to datepicker since we're not dealing with dates
    });

    $("#clearBtn").click(function() {
        // Modify this function if you need to clear the txtSelectedNIC field
        $('#txtSelectedNIC').val("");
    });

    $("#form_application").submit(function() {
        // Retrieve the value of txtSelectedNIC field
        var txtSelectedNICValue = $('#txtSelectedNIC').val();

        var action = $("button[name='action']").val();
        if (action == 'view_PDF') {
            // Set the action URL to match the printReport function for searching by NIC
            $(this).attr("action", "<?php echo base_url().'index.php/trainee_pdf/printReport'; ?>");
            // Append the value of txtSelectedNIC to the action URL as a query parameter
            $(this).attr("action", $(this).attr("action") + "?txtSelectedNIC=" + encodeURIComponent(txtSelectedNICValue));
        }
        // Ensure proper handling for other actions if needed

        // Returning true to allow form submission
        return true;
    });
</script>

