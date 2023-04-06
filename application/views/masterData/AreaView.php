

    <div class="content p-4" >
        

        <!--<h2 class="mb-4">Cards</h2>-->

        <div class="card mb-4" <?php if($this->session->userdata('user_area')==1){ echo "style='display:none'";} ?> >
            <div class="card-header bg-white font-weight-bold" >
                Area Management
            </div>
            <div class="card-body">
                <div class="col-md-10 col-md-auto">
                    <form method="post" action="<?php echo base_url().'index.php/masterData/areaDetails/saveRecord'?>">
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label for="validationServer01">Area Code</label>
                                <input type="text" class="form-control is-valid" id="txtAreaCode" name="txtAreaCode" placeholder="-- Code --" value="<?php echo set_value('txtAreaCode'); ?>" required>
                                <input type="hidden" id="txtAreaId" name="txtAreaId" value="<?php echo set_value('txtAreaId'); ?>" />
                                <?php echo form_error('txtAreaCode');  ?>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationServer02">Area Description</label>
                                <input type="text" class="form-control is-valid" id="txtAreaDescription" name="txtAreaDescription" placeholder="-- Description --" value="<?php echo set_value('txtAreaDescription'); ?>" required>
                                <?php echo form_error('txtAreaDescription');  ?>
                            </div>
                        </div>

                    
                </div>

            </div>
            <div class="card-footer bg-white card-auto button-right">
            	<div class="float-right">
                	 <button class="btn btn-primary" type="submit">Save</button> <button class="btn btn-primary" id="btnClear" type="button">Clear</button>
                </div>
               
            </div>
            </form>
        </div>
        
        <div class="card mb-4">
            <div class="card-body">
                <table id="recordTable" class="table table-hover table-striped table-sm" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Area Code</th>
                        <th>Area Description</th>
                        <th>Factory</th>
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
       DataTable();
    });
	
	$("#btnClear").click(function(){
		$("#txtAreaCode").val("");
		$("#txtAreaId").val("");
		$("#txtAreaDescription").val("");
	});
	
	
	function DataTable()
	{
		 $('#recordTable').DataTable({ 
		
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": 'index.php/masterData/areaDetails/recordlist',
            "type": "POST"
        },
		
		
		"columnDefs": 
		[
			{
			"targets": 4,
			"orderable": false
			},
		
         { 
			"targets": 4,
			"data": "cstatus",
			"render": function ( data, type, row, meta ) 
			{
				
				if(row[4]=='0')
				{
					if(<?php echo $this->session->userdata('user_area')?>!=1){
					return '<button  onclick="updateRecord('+row[5]+');" class="btn btn-icon btn-pill btn-primary btn-sm" data-toggle="tooltip" title="Edit"><i class="fa fa-fw fa-edit"></i></button> <button  onclick="changeStatus(\''+row[5]+'\',1);" class="btn btn-icon btn-pill btn-danger btn-sm" data-toggle="tooltip" title="Activate"><i class="fa fa-fw fa-times"></i></button>';
					}
					else
					{
						return '<button  onclick="changeStatus(\''+row[5]+'\',1);" class="btn btn-icon btn-pill btn-danger btn-sm" data-toggle="tooltip" title="Activate"><i class="fa fa-fw fa-times"></i></button>';
					}
				}
				else
				{
					if(<?php echo $this->session->userdata('user_area')?>!=1){
					return '<button  onclick="updateRecord(\''+row[5]+'\');" class="btn btn-icon btn-pill btn-primary btn-sm" data-toggle="tooltip" title="Edit"><i class="fa fa-fw fa-edit"></i></button> <button onclick="changeStatus('+row[5]+',0);" class="btn btn-icon btn-pill btn-success btn-sm" data-toggle="tooltip" title="De-Activate"><i class="fa fa-fw fa-check"></i></button>';
					}
					else
					{
						return '<button onclick="changeStatus('+row[5]+',0);" class="btn btn-icon btn-pill btn-success btn-sm" data-toggle="tooltip" title="De-Activate"><i class="fa fa-fw fa-check"></i></button>';
					}
				}
				 
			}// end of rendr function
		 }
        ]// end of columnDefs
		});// end of Datatable
	}
	
	function updateRecord(recordId)
	{
		$.ajax({type: 'POST',dataType:"JSON",	url: 'index.php/masterData/areaDetails/editRecord',data:{'recordId':recordId},	async : false,	success: function (html) 
		{	
			$('#txtAreaId').val(html.jsonData.area_id);
			$('#txtAreaCode').val(html.jsonData.area_code);  
			$('#txtAreaDescription').val(html.jsonData.area_description);
		 },    error: function(html){  }	});	
	}
	
	function changeStatus(recordId,status)
	{
		$.ajax({type: 'POST',	url: 'index.php/masterData/areaDetails/changeStatus',data:{'recordId':recordId,'status':status},	async : false,	success: function (html) {	$('#recordTable').dataTable().fnDestroy();DataTable(); $("#successMsg").html(html); $(".bd-success-modal-sm").modal("show");  },    error: function(html){  }	});
	}
</script>



