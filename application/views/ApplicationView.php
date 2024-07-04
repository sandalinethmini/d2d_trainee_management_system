<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Regional Development Bank</title>
    <base href="<?php echo base_url(); ?>">


	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
		
		margin: 10px auto;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
		text-decoration: none;
	}

	a:hover {
		color: #97310e;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 15px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 10px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
		min-height: 96px;
	}

	p {
		margin: 0 0 10px;
		padding:0;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	.row {
    display: flex;
    flex-wrap: wrap;
    margin-right: -15px;
    margin-left: -15px;
	padding-bottom: 5px;
}



.col-md-2 {
    flex: 0 0 16.66667%; /* Equivalent to Bootstrap col-md-2 */
    max-width: 16.66667%; /* Equivalent to Bootstrap col-md-2 */
    padding-right: 15px;
    padding-left: 15px;
    box-sizing: border-box;
}

.col-md-3 {
    flex: 0 0 25%; /* Equivalent to Bootstrap col-md-2 */
    max-width: 25%; /* Equivalent to Bootstrap col-md-2 */
    padding-right: 15px;
    padding-left: 15px;
    box-sizing: border-box;
}
.col-md-4 {
    flex: 0 0 33.33333%; /* Equivalent to Bootstrap col-md-4 */
    max-width: 33.33333%; /* Equivalent to Bootstrap col-md-4 */
    padding-right: 15px;
    padding-left: 15px;
    box-sizing: border-box;
}

.col-md-5 {
    flex: 0 0 41.66666%; /* Equivalent to Bootstrap col-md-4 */
    max-width: 41.66666%; /* Equivalent to Bootstrap col-md-4 */
    padding-right: 15px;
    padding-left: 15px;
    box-sizing: border-box;
}

.col-md-6 {
    flex: 0 0 50%; /* Equivalent to Bootstrap col-md-4 */
    max-width: 50%; /* Equivalent to Bootstrap col-md-4 */
    padding-right: 15px;
    padding-left: 15px;
    box-sizing: border-box;
}

.col-md-8 {
    flex: 0 0 66.66667%; /* Equivalent to Bootstrap col-md-8 */
    max-width: 66.66667%; /* Equivalent to Bootstrap col-md-8 */
    padding-right: 15px;
    padding-left: 15px;
    box-sizing: border-box;
}

.col-md-9 {
    flex: 0 0 75%; /* Equivalent to Bootstrap col-md-8 */
    max-width: 75%; /* Equivalent to Bootstrap col-md-8 */
    padding-right: 15px;
    padding-left: 15px;
    box-sizing: border-box;
}

.col-md-10 {
    flex: 0 0 83.33333%; /* Equivalent to Bootstrap col-md-10 */
    max-width: 83.33333%; /* Equivalent to Bootstrap col-md-10 */
    padding-right: 15px;
    padding-left: 15px;
    box-sizing: border-box;
}

.col-md-12 {
    flex: 0 0 100%; /* Equivalent to Bootstrap col-md-12 */
    max-width: 100%; /* Equivalent to Bootstrap col-md-12 */
    padding-right: 15px;
    padding-left: 15px;
    box-sizing: border-box;
}

/* Custom form-control styles */
.form-control {
    display: block;
    width: 100%;
    
    font-size: 14px;
    line-height: .75;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

/* Adjust focus styles */
.form-control:focus {
    color: #495057;
    background-color: #fff;
    border-color: #80bdff;
    outline: 0;
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
}

/* Custom form-label styles */
.form-label {
    display: inline-block;
    margin-bottom: 2px;
    font-weight: 600;
	font-size:13px;
	
}

.form-label-data {
    display: inline-block;
    margin-bottom: 5px;
    font-weight: 500;
	font-size:14px;
}

.btn.btn-success {
  /* Your custom background color */
  background-color: #28a745;
  /* Your custom text color */
  color: #fff;
  /* Additional styling, like padding and border */
  padding: 0px 16px;
  border: none;
  border-radius: 4px;
  height:24px; font-size:13px;
  font-weight:bold;
}

/* Hover effect for the button */
.btn.btn-success:hover {
  /* Your custom hover background color */
  background-color: #218838;
  /* Your custom hover text color */
  color: #fff;
}

/* CSS for a btn-danger class */
.btn.btn-danger {
  /* Your custom background color for danger buttons */
  background-color: #dc3545;
  /* Your custom text color */
  color: #fff;
  /* Additional styling, like padding and border */
  padding: 0px 16px;
  border: none;
  border-radius: 4px;
  height:24px; font-size:13px;
  font-weight:bold;
}

/* Hover effect for the button */
.btn.btn-danger:hover {
  /* Your custom hover background color */
  background-color: #c82333;
  /* Your custom hover text color */
  color: #fff;
}
	</style>
</head>
<body>

<div id="container">
	<h1><strong>Trainee Application Confirmation</strong></h1>

	<div id="body">
		
      <div class="row" style="margin-top:10px;">
            <div class="col-md-4"><strong style='color:#00F'><u>Employee Details</u></strong></div>
         </div>
        

         <div class="row col-md-12">
            <div class="col-md-3">
                <label class="form-label">Registration Number:</label>
            </div>
            <div class="col-md-2">
                <label class="form-label-data"><?php echo $recordData->emp_code; ?></label>
            </div>
        </div>

        <div class="row col-md-12">
            <div class="col-md-3">
                <label class="form-label">Branch / Office :</label>
            </div>
            <div class="col-md-4">
                 <label class="form-label-data"><?php echo $recordData->emp_branch; ?></label>
            </div>
        </div>
        <div class="row col-md-12">
            <div class="col-md-3">
                <label class="form-label">District :</label>
            </div>
            <div class="col-md-4">
               <label class="form-label-data"><?php echo $recordData->district_name; ?></label>
            </div>
        </div>
        
        <div class="row col-md-12">
            <div class="col-md-3">
                <label class="form-label">Province :</label>
            </div>
            <div class="col-md-4">
               <label class="form-label-data"><?php echo $recordData->province_name; ?></label>
            </div>
        </div>
        


        <div class="row col-md-12">
            <div class="col-md-3">
                <label class="form-label">Full Name :</label>
            </div>
            <div class="col-md-9">
                <label class="form-label-data"><?php echo $recordData->emp_full_name; ?></label>
            </div>
        </div>

        <div class="row col-md-12">
            <div class="col-md-3">
                <label class="form-label">Permanent Address :</label>
            </div>
            <div class="col-md-9">
                <label class="form-label-data"><?php echo $recordData->emp_address; ?></label>
            </div>
        </div>

        <div class="row col-md-12">
            <div class="col-md-3">
                <label class="form-label">Phone No :</label>
            </div>
            <div class="col-md-4">
                <label class="form-label-data"><?php echo $recordData->emp_phone; ?></label>
            </div>
        </div>

        <div class="row col-md-12">
            <div class="col-md-3">
                <label class="form-label">Date Of Birth :</label>
            </div>
            <div class="col-md-4">
                <label class="form-label-data"><?php echo $recordData->emp_dob; ?></label>
            </div>
        </div>
        
        
        
        
        
        <div class="row col-md-12">
            <div class="col-md-3">
                <label class="form-label">NIC No :</label>
            </div>
            <div class="col-md-4">
                <label class="form-label-data"><?php echo $recordData->emp_nic; ?></label>
            </div>
        </div>

        <div class="row col-md-12">
            <div class="col-md-3">
                <label class="form-label">Account No :</label>
            </div>
            <div class="col-md-4">
                <label class="form-label-data"><?php echo $recordData->emp_ac; ?></label>
            </div>
        </div>

        <div class="row col-md-12">
            <div class="col-md-3">
                <label class="form-label">Start Date :</label>
            </div>
            <div class="col-md-4">
                <label class="form-label-data"><?php echo $recordData->emp_sd; ?></label>
            </div>
        </div>

        <div class="row col-md-12">
            <div class="col-md-3">
                <label class="form-label">Effective Date :</label>
            </div>
            <div class="col-md-4">
                <label class="form-label-data"><?php echo $recordData->emp_ed; ?></label>
            </div>
        </div>

        <div class="row col-md-12">
            <div class="col-md-3">
                <label class="form-label">A/L :</label>
            </div>
            <div class="col-md-4">
                <label class="form-label-data"><?php if($recordData->emp_image != ""){echo "<img class='img-responsive img-rounded' src='images/ok.png' >"; }?></label>
            </div>
        </div>

        <div class="row col-md-12">
            <div class="col-md-3">
                <label class="form-label">University :</label>
            </div>
            <div class="col-md-4">
                <label class="form-label-data"><?php if($recordData->emp_image != ""){echo "<img class='img-responsive img-rounded' src='images/ok.png' >"; }?></label>
            </div>
        </div>

        <div class="row col-md-12">
            <div class="col-md-3">
                <label class="form-label">Other:</label>
            </div>
            <div class="col-md-4">
                <label class="form-label-data"><?php if($recordData->emp_image != ""){echo "<img class='img-responsive img-rounded' src='images/ok.png' >"; }?></label>
            </div>
        </div>
        
        
        
    
        
       <!-- <div class="row" style="margin-top:10px;">
            <div class="col-md-4"><strong style='color:#00F'><u>Reporting Person's Details</u></strong></div>
         </div>
        
        
        <div class="row col-md-12">
            <div class="col-md-4">
                <label class="form-label">Reporing Person's Service ID :</label>
            </div>
            <div class="col-md-2">
                <label class="form-label-data"><?php echo $recordData->emp_reporting_id; ?></label>
            </div>
        </div>
        
        <div class="row col-md-12">
            <div class="col-md-4">
                <label class="form-label">Reporting Person's Name :</label>
            </div>
            <div class="col-md-4">
                <label class="form-label-data"><?php echo $recordData->emp_reporting_name; ?></label>
            </div>
        </div>
        
        <div class="row col-md-12">
            <div class="col-md-4">
                <label class="form-label">Reporting Person's Designation:</label>
            </div>
            <div class="col-md-4">
                <label class="form-label-data"><?php echo $recordData->grade_description; ?></label>
            </div>
        </div>-->
      <form id="form_application" method="post" action="index.php/newstaff/printApplication" > 
        <div class="row col-md-12">
            <div class="col-md-8" >
            </div>
            
            <div class="col-md-1" >
                <button class="btn btn-success" type="submit" >Print</button>
            </div>
            <div class="col-md-2" >
                <button type="button" class="btn btn-danger" >Close</button>
            </div>
        </div>
		</form>
		
	</div>

	
</div>

</body>
</html>
<script>

	function handleFormSubmission(event) {
            event.preventDefault(); // Prevent the default form submission
            
            var form = document.getElementById('form_application');
            
           
                form.setAttribute('target', '_blank');
                form.submit();
                form.setAttribute('target', '_self');
                form.setAttribute('action', '<?php echo base_url('newstaff/Hello'); ?>');
                history.replaceState('', '', '<?php echo base_url('newstaff/viewData'); ?>');
           
        }



</script>