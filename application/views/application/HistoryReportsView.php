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
                Circuit Details Report
            </div>
			
			
            <div class="card-body">
                <div class="col-md-12 col-md-auto">
                    <form id="form_application" method="post" action="index.php/application/HistoryReports/saveRecord"  >
                   	 
                   	 <div style="width: 100%; height: 12px; border-bottom: ; text-align: left; margin-bottom: 20px;margin-top: 20px;"> <span style="font-size: 14px; background-color: ; padding: 0 10px;"><strong style="color:#ff2530">*</strong> <strong style="color:blue"><u> Branch Information</u>
                             <!--Padding is optional-->
                 	   </strong></span> </div>
					   
                   	
                            <div class="row col-md-12">
                                
                                    <div class="col-md-2">   
                                        <label class="lblStrong">Branch Code :</label>
                                    </div>
                                    <div class="col-md-3">
                                        <label id="lblBranchCode" class="lblValue"></label>
                                    </div>
                                
                                    <div class="col-md-2 offset-md-1">
                                        <label class="lblStrong">Catagory : </label>
                                    </div>
                                    <div class="col-md-3">
                                       <label id="lblCatagory" class="lblValue"></label>
                                    </div>
                                
                            </div>
							
							
							
							<div class="row col-md-12">
                                
                                    <div class="col-md-2">   
                                       <label class="lblStrong">Support IT Officer : </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label id="lblOfficer" class="lblValue"></label>
                                    </div>
                                
                                    <div class="col-md-2 offset-md-1">
                                        <label class="lblStrong">Contact Number : </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label id="lblContact" class="lblValue"></label>
									</div>
                            </div>
							
							

	 
                   	 <div style="width: 100%; height: 12px; border-bottom: ; text-align: left; margin-bottom: 20px;margin-top: 20px;"> <span style="font-size: 14px; background-color: ; padding: 0 10px;"><strong style="color:#ff2530">*</strong> <strong style="color:blue"><u> Provider Information</u>
                             <!--Padding is optional-->
                 	   </strong></span> </div>
					   
                   	
                            <div class="row col-md-12">
                                
                                    <div class="col-md-2">   
                                        <label class="lblStrong">Circuit ID : </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label id="lblCircuitID" class="lblValue"></label>
                                    </div>
                                
                                    <div class="col-md-2 offset-md-1">
                                        <label class="lblStrong">Account No : </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label id="lblAccountNo" class="lblValue"></label>
                                    </div>
                                
                            </div>
							
							
							
							<div class="row col-md-12">
                                
                                    <div class="col-md-2">   
                                        <label class="lblStrong">Provider Name : </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label id="lblProviderName" class="lblValue"></label>
                                   </div>
                                
                                    <div class="col-md-2 offset-md-1">
                                        <label class="lblStrong">IP Range : </label>
                                    </div>
									<div class="col-md-3">
                                       <label id="lblIprange" class="lblValue"></label>
                                    </div>
                                
                            </div>
							
							
							<div class="row col-md-12">
                                
                                    <div class="col-md-2">   
                                        <label class="lblStrong">Connection Type : </label>
                                    </div>
                                    <div class="col-md-3">
                                         <label id="lblConnectionType" class="lblValue"></label>
                                    </div>
                                
                                                                
                            </div>
							
							<div class="row col-md-12">
                                
                                    <div class="col-md-2">   
                                        <label class="lblStrong">Started Date : </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label id="lblStartedDate" class="lblValue"></label>
                                    </div>
                                
                                    <div class="col-md-2 offset-md-1">
                                         <label class="lblStrong">Current Bandwidth : </label>
                                    </div>
                                    <div class="col-md-2">
                                    <label id="lblCurrentBandwidth" class="lblValue"></label>
									<label id="lblBandwidthType" class="lblValue"></label>
									</div>
									 
									 
                          </div>
		 <!-- <br/>
		
	 <hr style=" border: 0; height: 1px; background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));">-->
	
	<div style="width: 100%; height: 12px; border-bottom: ; text-align: left; margin-bottom: 20px;margin-top: 20px;"> <span style="font-size: 14px; background-color: ; padding: 0 10px;">		
	<strong style="color:#ff2530">*</strong> <strong style="color:blue"><u> Bandwidth History Details</u>
                             <!--Padding is optional-->
                 	   </strong></span> </div>	
							
		<div class="card mb-4">
            <div class="card-body">
                <table id="recordTable2" class="table table-hover table-striped table-sm" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Bandwidth Type</th>
						<th>Bandwidth</th> 
                        <th>Bandwidth Start Date</th>
                        <th>Bandwidth Close Date</th>
						
                    </tr>
                    </thead>
                    <tbody id="history_bandwidth_data" style="font-size:15px;" class="lblValue">
                    
                   
                    </tbody>
                </table>
            </div>
        </div>					
			  
			   <div class="form-group col-md-12 offset-md-10">
                            <div class="row pull-right">
                               <!-- <button type="submit" class="btn btn-primary">Save</button>-->
                                <button type="button" class="btn btn-primary" onclick="clearData()">Clear</button>
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
                        <th>Branch Code</th>
                        <th>Provider</th>
						<th>Category</th> 
                        <th>Acc No.</th>
                        <th>Circuit ID</th>
                        <th>Current BandWidth</th>
						
                        <th class="action">Actions</th>
                    </tr>
                    </thead>
                    
                    
                   
                    </tbody>
                </table>
            </div>
        </div>
    
</div>
</div>
    <p>&nbsp;</p>
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

function clearData()
{
	$('.lblValue').html('');
	$('#txtCircuitID').val('');
		
}	

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
		
		flatpickr("#cmbStartDate, #cmbBandwidthUpgradeDate,#cmbConDeactivateDate", { });
		DataTable();
		
		
		
		$( "#btnClear" ).click(function() {
		  	clearData();
		});

    });

	
function DataTable()
	{
		$('#recordTable').DataTable({ 
		
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": 'index.php/application/HistoryReports/recordlist',
            "type": "POST"
        },

		
		"columnDefs": 
		[
		{
			"targets": [0,1,2,3,4,5,6],
			"orderable": false
			},
			
		{
			"targets": 7,
			"data": "status",
			"render": function (data, type, row, meta) {
				
				if(row[8]== 1)
				{
					return '<button  onclick="editRecord(\''+row[7]+'\');" class="btn btn-icon btn-pill btn-primary btn-sm"  title="Edit"><i class="fa fa-eye"></i></button>';	
				}
				else
				{
					return '<button  onclick="editRecord(\''+row[7]+'\');" class="btn btn-icon btn-pill btn-primary btn-sm"  title="Edit"><i class="fa fa-eye"></i></button>';
				}	
				
}
		}
         
        ]// end of columnDefs
		});// end of Datatable
	}	

				
				
/*function changeStatus(site_id,site_status)
	{
		$.ajax({type: 'POST',	url: 'index.php/application/HistoryReports/changeStatus',data:{'site_id':site_id,'site_status':site_status},	async : false,	success: function (html) {	$('#recordTable').dataTable().fnDestroy();DataTable(); $("#successMsg").html(html);
			 $(".bd-success-modal-sm").modal("show");   },    error: function(html){  }	});
	}	*/
		
		
	
	
	function editRecord(site_id)
	{
		clearData();
		
		var locationCode = "";
		
		$.ajax({type: 'POST',dataType:"JSON",	url: 'index.php/application/HistoryReports/editRecord',data:{'site_id':site_id},	async : false,	success: function (data) 
		{	
		//$('#lblBranchCode').html(1234);
		
			$('#lblSiteID').html(data.jsonData.site_id);
			$('#lblBranchCode').html(data.jsonData.branch_code+' - '+data.jsonData.branch_description);
			$('#lblCatagory').html(data.jsonData.category_name);
		    $('#lblOfficer').html(data.jsonData.officer_name);  
			$('#lblContact').html(data.jsonData.officer_contact_number);
			$('#lblCircuitID').html(data.jsonData.site_circuit_id);
			$('#lblAccountNo').html(data.jsonData.site_account_no);
			$('#lblProviderName').html(data.jsonData.provider_description);
			$('#lblIprange').html(data.jsonData.site_iprange);
			$('#lblConnectionType').html(data.jsonData.connection_name);
			$('#lblStartedDate').html(data.jsonData.site_connection_started_date);
			$('#lblBandwidthType').html(data.jsonData.bandwidth_name+' -- '+data.jsonData.bandwidth_type);
			//$('#lblCurrentBandwidth').html(data.jsonData.bandwidth_name+' -- '+);
			
			$("#history_bandwidth_data").html("");
                var tble = "";
                for (var i = 0; i < data.jsonBandwidthData.length; i++) 
				{
                    tble = tble + "<tr>"
                    tble = tble + "<td>" + data.jsonBandwidthData[i].bandwidth_type + "</td>";
					tble = tble + "<td>" + data.jsonBandwidthData[i].bandwidth_name + "</td>";
                    tble = tble + "<td>" + data.jsonBandwidthData[i].history_bandwidth_start_date + "</td>";
				    tble = tble + "<td>" + data.jsonBandwidthData[i].history_bandwidth_close_date + "</td>";
                    tble = tble + "</tr>"
                }
				
                $("#history_bandwidth_data").append(tble);
			
		 },    error: function(html){  }	});	
	
		 
		 
	}	
	
	
	function clearData()
	{
		$('.lblValue').html('');
	}	

	
</script>