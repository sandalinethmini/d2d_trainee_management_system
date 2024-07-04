<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Regional Development Bank</title>
    <base href="<?php echo base_url(); ?>">
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		width: 100%;
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
		margin: 10px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
    width: 100%;
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
    max-width: 100%; /* Equivalent to Bootstrap col-md-2 */
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
    margin-bottom: 5px;
    font-weight: 600;
	font-size:13px;
}

/* Targeting the button with class btn-success */
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

span.validationError {
  color: #ff2530;
  font-size: 11px;
}
	
	</style>

<script>
        function addRow() {
            var table = document.getElementById('jobTable');
            var rowCount = table.rows.length;
            var row = table.insertRow(rowCount);
            
            var cell1 = row.insertCell(0);
            var timeRange = document.createElement('input');
            timeRange.type = 'text';
            timeRange.name = 'job_details[' + rowCount + '][time_range]';
            cell1.appendChild(timeRange);

            var cell2 = row.insertCell(1);
            var employerName = document.createElement('input');
            employerName.type = 'text';
            employerName.name = 'job_details[' + rowCount + '][employer_name]';
            cell2.appendChild(employerName);

            var cell3 = row.insertCell(2);
            var position = document.createElement('input');
            position.type = 'text';
            position.name = 'job_details[' + rowCount + '][position]';
            cell3.appendChild(position);

            var cell4 = row.insertCell(3);
            var noOfYears = document.createElement('input');
            noOfYears.type = 'number';
            noOfYears.name = 'job_details[' + rowCount + '][no_of_years]';
            cell4.appendChild(noOfYears);

            var cell5 = row.insertCell(4);
            var reasonToResign = document.createElement('input');
            reasonToResign.type = 'text';
            reasonToResign.name = 'job_details[' + rowCount + '][reason_to_resign]';
            cell5.appendChild(reasonToResign);
        }

        function addRow1() {
            var table = document.getElementById('relationTable');
            var rowCount = table.rows.length;
            var row = table.insertRow(rowCount);
            
            var cell1 = row.insertCell(0);
            var name = document.createElement('input');
            name.type = 'text';
            name.name = 'relation_details[' + rowCount + '][name]';
            cell1.appendChild(name);

            var cell2 = row.insertCell(1);
            var position = document.createElement('input');
            position.type = 'text';
            position.name = 'relation_details[' + rowCount + '][position]';
            cell2.appendChild(position);

            var cell3 = row.insertCell(2);
            var employer = document.createElement('input');
            employer.type = 'text';
            employer.name = 'relation_details[' + rowCount + '][employer]';
            cell3.appendChild(employer);

            
        }

        function addRow2() {
            var table = document.getElementById('nonrelativeTable1');
            var rowCount = table.rows.length;
            var row = table.insertRow(rowCount);
            
            var cell1 = row.insertCell(0);
            var name = document.createElement('input');
            name.type = 'text';
            name.name = 'nonrelative_details[' + rowCount + '][name]';
            cell1.appendChild(name);

            var cell2 = row.insertCell(1);
            var address = document.createElement('input');
            address.type = 'text';
            address.name = 'nonrelative_details[' + rowCount + '][address]';
            cell2.appendChild(address);

            var cell3 = row.insertCell(2);
            var position = document.createElement('input');
            position.type = 'text';
            position.name = 'nonrelative_details[' + rowCount + '][position]';
            cell3.appendChild(position);

            var cell4 = row.insertCell(3);
            var employerAddress = document.createElement('input');
            employerAddress.type = 'number';
            employerAddress.name = 'nonrelative_details[' + rowCount + '][employer_address]';
            cell4.appendChild(nemployerAddress);

            var cell5 = row.insertCell(4);
            var phoneNo = document.createElement('input');
            phoneNo.type = 'text';
            phoneNo.name = 'nonrelative_details[' + rowCount + '][phone_no]';
            cell5.appendChild(phoneNo);

            var cell5 = row.insertCell(4);
            var employerPhoneNo = document.createElement('input');
            employerPhoneNo.type = 'text';
            employerPhoneNo.name = 'nonrelative_details[' + rowCount + '][employer_phone_no]';
            cell5.appendChild(employerPhoneNo);
        }

        function addRow3() {
            var table = document.getElementById('nonrelativeTable2');
            var rowCount = table.rows.length;
            var row = table.insertRow(rowCount);
            
            var cell1 = row.insertCell(0);
            var name1 = document.createElement('input');
            name1.type = 'text';
            name1.name = 'nonrelative_details1[' + rowCount + '][name1]';
            cell1.appendChild(name1);

            var cell2 = row.insertCell(1);
            var address1 = document.createElement('input');
            address1.type = 'text';
            address1.name = 'nonrelative_details1[' + rowCount + '][address1]';
            cell2.appendChild(address1);

            var cell3 = row.insertCell(2);
            var position1 = document.createElement('input');
            position1.type = 'text';
            position1.name = 'nonrelative_details1[' + rowCount + '][position1]';
            cell3.appendChild(position1);

            var cell4 = row.insertCell(3);
            var employerAddress1 = document.createElement('input');
            employerAddress1.type = 'number';
            employerAddress1.name = 'nonrelative_details1[' + rowCount + '][employer_address1]';
            cell4.appendChild(nemployerAddress1);

            var cell5 = row.insertCell(4);
            var phoneNo1 = document.createElement('input');
            phoneNo1.type = 'text';
            phoneNo1.name = 'nonrelative_details1[' + rowCount + '][phone_no1]';
            cell5.appendChild(phoneNo1);

            var cell5 = row.insertCell(4);
            var employerPhoneNo1 = document.createElement('input');
            employerPhoneNo1.type = 'text';
            employerPhoneNo1.name = 'nonrelative_details1[' + rowCount + '][employer_phone_no1]';
            cell5.appendChild(employerPhoneNo1);
        }
    </script>
</head>
<body>

<div id="container">
	<h1><strong>D2D Application Form</strong></h1>

	<div id="body">

  <?php if ($success): ?>
    <div class="container mt-5">
        <div class="alert alert-success">
            <strong>
            <?php echo $success; ?></strong>
        </div>
      
    </div>
            
        
    <?php endif; ?>
    <form onsubmit="btnSubmit.disabled = true; return true;" id="form_application" method="post" action="index.php/newd2d/SaveRecord" enctype="multipart/form-data" >
    
    
    	<div class="row" style="margin-top:10px;">
            <div class="col-md-4"><strong style='color:#00F'><u>Employee Details</u></strong></div>
         </div>


         <!--<div class="row col-md-12">
            <div class="col-md-3" style="padding-right: 5px;">
                <label class="form-label">Registration Number</label>
            </div>
            <div class="col-md-2">
                <input type="text" class="form-control" id="serviceIdInput" name="serviceIdInput" maxlength="4" minlength="4" required  value="<?php echo set_value('serviceIdInput')?>">
            </div>
            <div class="col-md-5"><span id="serviceIdValidationMsg"></span> <?php echo form_error('serviceIdInput'); ?></div>
        </div>-->
    
		

        <div class="row col-md-12">
            <div class="col-md-3">
                <label class="form-label">Branch / Office :</label>
            </div>
            <div class="col-md-4">
                 <?php echo form_dropdown('cmbBranchCodeInput', $branchList,set_value('cmbBranchCodeInput'), 'class="form-control"   required   id="cmbBranchCodeInput" ');  ?>
            </div>
            <div class="col-md-5"><?php echo form_error('cmbBranchCodeInput'); ?></div>
        </div>

        <div class="row col-md-12">
            <div class="col-md-3">
                <label class="form-label">District :</label>
            </div>
            <div class="col-md-4">
                 <?php echo form_dropdown('districtInput', $districtList,set_value('districtInput'), 'class="form-control"   required   id="districtInput" ');  ?>
            </div>
            <div class="col-md-5"><?php echo form_error('districtInput'); ?></div>
        </div>

        <div class="row col-md-12">
            <div class="col-md-3">
                <label class="form-label">Province :</label>
            </div>
            <div class="col-md-4">
            	<?php echo form_dropdown('provinceInput', $provinceList,set_value('provinceInput'), 'class="form-control"   required   id="provinceInput" ');  ?>               
            </div>
            <div class="col-md-5"><?php echo form_error('provinceInput'); ?></div>
        </div>

        <div class="row col-md-12">
            <div class="col-md-3">
                <label class="form-label">EPF No :</label>
            </div>
            <div class="col-md-9">
                <input type="text" class="form-control" id="epfNo" name="epfNo" required  value="<?php echo set_value('epfNo')?>">
            </div>
            <div class="col-md-5"><?php echo form_error('epfNo'); ?></div>
        </div>

        

        <div class="row col-md-12">
            <div class="col-md-3">
                <label class="form-label">Full Name :</label>
            </div>
            <div class="col-md-9">
                <input type="text" class="form-control" id="fullNameInput" name="fullNameInput" required  value="<?php echo set_value('fullNameInput')?>">
            </div>
            <div class="col-md-5"><?php echo form_error('fullNameInput'); ?></div>
        </div>

        <div class="row col-md-12">
            <div class="col-md-3">
                <label class="form-label">Name With Initials :</label>
            </div>
            <div class="col-md-9">
                <input type="text" class="form-control" id="nameWithInitials" name="nameWithInitials" required  value="<?php echo set_value('nameWithInitials')?>">
            </div>
            <div class="col-md-5"><?php echo form_error('nameWithInitials'); ?></div>
        </div>

        <div class="row col-md-12">
            <div class="col-md-3">
                <label class="form-label">NIC No :</label>
            </div>
            <div class="col-md-4">
                <input type="text" class="form-control" id="nicInput" name="nicInput"  required value="">
            </div>
            <div class="col-md-3"><span id="nicValidationMsg"></span><?php echo form_error('nicInput'); ?></div>
        </div>

        <div class="row col-md-12">
            <div class="col-md-3">
                <label class="form-label">Date of Birth:</label>
            </div>
            <div class="col-md-4">
                <input type="date" class="form-control" id="dateOfBirthInput" name="dateOfBirthInput" required  value="">
            </div>
            <div class="col-md-3"><span id="dateOfBirthValidationMsg"></span><?php echo form_error('dateOfBirthInput'); ?></div>
        </div>

        <div class="row col-md-12">
  <div class="col-md-3">
    <label for="gender" class="form-label">Gender:</label>
  </div>
  <div class="col-md-4">
    <select id="gender" name="gender" class="form-control">
    <option value="" <?php echo set_value('gender') == '' ? 'selected' : ''; ?>></option>
      <option value="Yes" <?php echo set_value('gender') == 'Male' ? 'selected' : ''; ?>>Male</option>
      <option value="No" <?php echo set_value('gender') == 'Female' ? 'selected' : ''; ?>>Female</option>
    </select><br>
  </div>
</div>

<div class="row col-md-12">
  <div class="col-md-3">
    <label for="maritalStatus" class="form-label">Marital Status:</label>
  </div>
  <div class="col-md-4">
    <select id="maritalStatus" name="maritalStatus" class="form-control">
    <option value="" <?php echo set_value('maritalStatus') == '' ? 'selected' : ''; ?>></option>
      <option value="Yes" <?php echo set_value('maritalStatus') == 'Married' ? 'selected' : ''; ?>>Married</option>
      <option value="No" <?php echo set_value('maritalStatus') == 'Unmarried' ? 'selected' : ''; ?>>Unmarried</option>
    </select><br>
  </div>
</div>
        
        <div class="row col-md-12">
            <div class="col-md-3">
                <label class="form-label">Permanent Address :</label>
            </div>
            <div class="col-md-9">
                <input type="text" class="form-control" id="addressInput" name="addressInput"  required  value="<?php echo set_value('addressInput')?>">
            </div>
            <div class="col-md-5"><?php echo form_error('addressInput'); ?></div>
        </div>

        <div class="row col-md-12">
            <div class="col-md-3">
                <label class="form-label">Phone No :</label>
            </div>
            <div class="col-md-4">
                <input type="text" class="form-control" id="phoneInput" name="phoneInput" required  value="">
            </div>
            <div class="col-md-3"><span id="phoneValidationMsg"></span><?php echo form_error('phoneInput'); ?></div>
        </div>

       
        
        
        
        

        <!--<div class="row col-md-12">
            <div class="col-md-3">
                <label class="form-label">Account Number:</label>
            </div>
            <div class="col-md-4">
                <input type="text" class="form-control" id="accountNumberInput" name="accountNumberInput"  required value="">
            </div>
            <div class="col-md-3"><span id="accountNumberValidationMsg"></span><?php echo form_error('accountNumberInput'); ?></div>
        </div>-->

        <div class="row col-md-12">
         <div class="col-md-3">
    <label for="AL" class="form-label">O/L:</label></div>
   
    <div class="col-md-4">
    <select id="OL" name="OL" class="form-control">
      <option value="" <?php echo set_value('OL') == 'Yes' ? 'selected' : ''; ?>></option>
      <option value="Yes" <?php echo set_value('OL') == 'Yes' ? 'selected' : ''; ?>>Yes</option>
      <option value="No" <?php echo set_value('OL') == 'No' ? 'selected' : ''; ?>>No</option>
    </select><br></div> </div>


        <div class="row col-md-12">
         <div class="col-md-3">
    <label for="AL" class="form-label">A/L:</label></div>
   
    <div class="col-md-4">
    <select id="AL" name="AL" class="form-control">
      <option value="" <?php echo set_value('AL') == 'Yes' ? 'selected' : ''; ?>></option>
      <option value="Yes" <?php echo set_value('AL') == 'Yes' ? 'selected' : ''; ?>>Yes</option>
      <option value="No" <?php echo set_value('AL') == 'No' ? 'selected' : ''; ?>>No</option>
    </select><br></div> </div>

    <div class="row col-md-12">
    <div class="col-md-3">
    <label for="University" class="form-label">University:</label></div>
    
    <div class="col-md-4">
    <select id="University" name="University" class="form-control">
    <option value="" <?php echo set_value('University') == 'Yes' ? 'selected' : ''; ?>></option>
      <option value="Yes" <?php echo set_value('University') == 'Yes' ? 'selected' : ''; ?> class="col-md-3">Yes</option>
      <option value="No" <?php echo set_value('University') == 'No' ? 'selected' : ''; ?>>No</option>
    </select><br></div></div>
  
    <div class="row col-md-12">
    <div class="col-md-3">
    <label for="Other" class="form-label">Other:</label></div>
    
    <div class="col-md-4">
    <select id="Other" name="Other" class="form-control">
    <option value="" <?php echo set_value('Other') == 'Yes' ? 'selected' : ''; ?>></option>
      <option value="Yes" <?php echo set_value('Other') == 'Yes' ? 'selected' : ''; ?>>Yes</option>
      <option value="No" <?php echo set_value('Other') == 'No' ? 'selected' : ''; ?>>No</option>
    </select><br></div>
  </div>

  <div class="row col-md-12">
            <div class="col-md-3">
                <label class="form-label">Experience :</label>
            </div>
            <div class="col-md-4">
                <input type="text" class="form-control" id="experience" name="experience"  value="">
            </div>
            <div class="col-md-3"><?php echo form_error('experience'); ?></div>
        </div>


        <div class="row" style="margin-top:10px;">
            <div class="col-md-4"><strong style='color:#00F'><u>Current and Past Job Details</u></strong></div>
         </div>


         <div class="row col-md-12">
            <div class="col-md-3">
                <label class="form-label">Current Position :</label>
            </div>
            <div class="col-md-4">
                <input type="text" class="form-control" id="currentPosition" name="currentPosition"  value="">
            </div>
            <div class="col-md-3"><?php echo form_error('currentPosition'); ?></div>
        </div>

        <div class="row col-md-12">
            <div class="col-md-3">
                <label class="form-label">Current Employer :</label>
            </div>
            <div class="col-md-4">
                <input type="text" class="form-control" id="currentEmployer" name="currentEmployer"  value="">
            </div>
            <div class="col-md-3"><?php echo form_error('currentEmployer'); ?></div>
        </div>

        <div class="row" style="margin-top:10px;">
            <div class="col-md-4"><strong style='color:#00F'><u>Job details from the date of completion of education till today</u></strong></div>
         </div>
         <div class="row col-md-12">
         <table id="jobTable">
        <tr>
            <th>Time Range</th>
            <th>Employer Name</th>
            <th>Position</th>
            <th>No of Years</th>
            <th>Reason to Resign</th>
        </tr>
        <tr>
            <td><input type="text" name="job_details[0][time_range]"></td>
            <td><input type="text" name="job_details[0][employer_name]"></td>
            <td><input type="text" name="job_details[0][position]"></td>
            <td><input type="number" name="job_details[0][no_of_years]"></td>
            <td><input type="text" name="job_details[0][reason_to_resign]"></td>
        </tr>
    </table>
    <button type="button" onclick="addRow()">Add Job</button><br><br></div>

    <div class="row" style="margin-top:10px;">
            <div class="col-md-4"><strong style='color:#00F'><u>Partner's Details</u></strong></div>
         </div>

         <div class="row col-md-12">
            <div class="col-md-3">
                <label class="form-label">Full Name :</label>
            </div>
            <div class="col-md-4">
                <input type="text" class="form-control" id="partnerFullName" name="partnerFullName"  value="">
            </div>
            <div class="col-md-3"><?php echo form_error('partnerFullName'); ?></div>
        </div>

        <div class="row col-md-12">
            <div class="col-md-3">
                <label class="form-label">Employer's Name :</label>
            </div>
            <div class="col-md-4">
                <input type="text" class="form-control" id="partnerEmployerName" name="partnerEmployerName"  value="">
            </div>
            <div class="col-md-3"><?php echo form_error('partnerEmployerName'); ?></div>
        </div>

        <div class="row col-md-12">
            <div class="col-md-3">
                <label class="form-label">Employer's Address :</label>
            </div>
            <div class="col-md-4">
                <input type="text" class="form-control" id="partnerEmployerAddress" name="partnerEmployerAddress"  value="">
            </div>
            <div class="col-md-3"><?php echo form_error('partnerEmployerAddress'); ?></div>
        </div>

        <div class="row col-md-12">
            <div class="col-md-3">
                <label class="form-label">Service Period :</label>
            </div>
            <div class="col-md-4">
                <input type="text" class="form-control" id="partnerServicePeriod" name="partnerServicePeriod"  value="">
            </div>
            <div class="col-md-3"><?php echo form_error('partnerServicePeriod'); ?></div>
        </div>

        <div class="row col-md-12">
            <div class="col-md-3">
                <label class="form-label">Position :</label>
            </div>
            <div class="col-md-4">
                <input type="text" class="form-control" id="partnerPosition" name="partnerPosition"  value="">
            </div>
            <div class="col-md-3"><?php echo form_error('partnerPosition'); ?></div>
        </div>

        <div class="row col-md-12">
            <div class="col-md-3">
                <label class="form-label">Phone No :</label>
            </div>
            <div class="col-md-4">
                <input type="text" class="form-control" id="partnerPhoneNo" name="partnerPhoneNo"  value="">
            </div>
            <div class="col-md-3"><?php echo form_error('partnerPhoneNo'); ?></div>
        </div>

        <div class="row" style="margin-top:10px;">
            <div class="col-md-4"><strong style='color:#00F'><u>Mentions the details, if your or your partner's child, siblings, parents are working on RDB bank</u></strong></div>
         </div>

         <div class="row col-md-12">
         <table id="relationTable">
        <tr>
            <th>Name</th>
            <th>Position</th>
            <th>Employer</th>
            
        </tr>
        <tr>
            <td><input type="text" name="relation_details[0][name]"></td>
            <td><input type="text" name="relation_details[0][position]"></td>
            <td><input type="text" name="relation_details[0][employer]"></td>
            
        </tr>
    </table>
    <button type="button" onclick="addRow1()">Add New</button><br><br></div>

    <div class="row col-md-12">
            <div class="col-md-3">
                <label class="form-label">If you have been subjected to a judicial or diciplinary investigation, give details:</label>
            </div>
            <div class="col-md-4">
                <input type="text" class="form-control" id="judicialDetails" name="judicialDetails" required  value="">
            </div>
            <div class="col-md-3"><?php echo form_error('judicialDetails'); ?></div>
        </div>

    <div class="row col-md-12">
            <div class="col-md-3">
                <label class="form-label">Mother's Name:</label>
            </div>
            <div class="col-md-4">
                <input type="text" class="form-control" id="motherName" name="motherName" required  value="">
            </div>
            <div class="col-md-3"><?php echo form_error('motherName'); ?></div>
        </div>

        <div class="row col-md-12">
            <div class="col-md-3">
                <label class="form-label">Mother's Address:</label>
            </div>
            <div class="col-md-4">
                <input type="text" class="form-control" id="motherAddress" name="motherAddress" required  value="">
            </div>
            <div class="col-md-3"><?php echo form_error('motherAddress'); ?></div>
        </div>

        <div class="row col-md-12">
            <div class="col-md-3">
                <label class="form-label">Mother's Job:</label>
            </div>
            <div class="col-md-4">
                <input type="text" class="form-control" id="motherJob" name="motherJob" required  value="">
            </div>
            <div class="col-md-3"><?php echo form_error('motherJob'); ?></div>
        </div>

        <div class="row col-md-12">
            <div class="col-md-3">
                <label class="form-label">Farther's Name:</label>
            </div>
            <div class="col-md-4">
                <input type="text" class="form-control" id="fartherName" name="fartherName" required  value="">
            </div>
            <div class="col-md-3"><?php echo form_error('fartherName'); ?></div>
        </div>

        <div class="row col-md-12">
            <div class="col-md-3">
                <label class="form-label">Farther's Address:</label>
            </div>
            <div class="col-md-4">
                <input type="text" class="form-control" id="fartherAddress" name="fartherAddress" required  value="">
            </div>
            <div class="col-md-3"><?php echo form_error('fartherAddress'); ?></div>
        </div>

        <div class="row col-md-12">
            <div class="col-md-3">
                <label class="form-label">Farther's Job:</label>
            </div>
            <div class="col-md-4">
                <input type="text" class="form-control" id="fartherJob" name="fartherJob" required  value="">
            </div>
            <div class="col-md-3"><?php echo form_error('fartherJob'); ?></div>
        </div>

        <div class="col-md-3">
                <label class="form-label">Non Relatives:</label>
            </div>

            <div class="row col-md-12">
         <table id="nonrelativeTable1">
        <tr>
            <th>Name</th>
            <th>Address</th>
            <th>Position</th>
            <th>Employer's Address</th>
            <th>Phone No</th>
            <th>Employer Phone No</th>
        </tr>
        <tr>
            <td><input type="text" name="nonrelative_details[0][name]"></td>
            <td><input type="text" name="nonrelative_details[0][address]"></td>
            <td><input type="text" name="nonrelative_details[0][position]"></td>
            <td><input type="number" name="nonrelative_details[0][employer_address]"></td>
            <td><input type="text" name="nonrelative_details[0][phone_no]"></td>
            <td><input type="text" name="nonrelative_details[0][employer_phone_no]"></td>
        </tr>
    </table>
    <button type="button" onclick="addRow2()">Add New</button><br><br></div>

    <div class="row col-md-12">
         <table id="nonrelativeTable2">
        <tr>
            <th>Name</th>
            <th>Address</th>
            <th>Position</th>
            <th>Employer's Address</th>
            <th>Phone No</th>
            <th>Employer Phone No</th>
        </tr>
        <tr>
            <td><input type="text" name="nonrelative_details1[0][name1]"></td>
            <td><input type="text" name="nonrelative_details1[0][address1]"></td>
            <td><input type="text" name="nonrelative_details1[0][position1]"></td>
            <td><input type="number" name="nonrelative_details1[0][employer_address1]"></td>
            <td><input type="text" name="nonrelative_details1[0][phone_no1]"></td>
            <td><input type="text" name="nonrelative_details1[0][employer_phone_no1]"></td>
        </tr>
    </table>
    <button type="button" onclick="addRow3()">Add New</button><br><br></div>



        <div class="row col-md-12">
            <div class="col-md-3">
                <label class="form-label">Start Date:</label>
            </div>
            <div class="col-md-4">
                <input type="date" class="form-control" id="startDateInput" name="startDateInput" required  value="">
            </div>
            <div class="col-md-3"><span id="startDateValidationMsg"></span><?php echo form_error('startDateInput'); ?></div>
        </div>

        <div class="row col-md-12">
            <div class="col-md-3">
                <label class="form-label">Effective Date:</label>
            </div>
            <div class="col-md-4">
                <input type="date" class="form-control" id="endDateInput" name="endDateInput" required  value="">
            </div>
            <div class="col-md-3"><span id="endDateValidationMsg"></span><?php echo form_error('endDateInput'); ?></div>
        </div>
        
        
            
         



  <div class="row" style="margin-top:10px;">
            <div class="col-md-4"><strong style='color:#00F'><u>Received Documents</u></strong></div>
         </div>



         <div class="row col-md-12">
  <div class="col-md-3">
    <label for="ALCopy" class="form-label">A/L Copy:</label>
  </div>
  <div class="col-md-4">
    <select id="ALCopy" name="ALCopy" class="form-control">
    <option value="" <?php echo set_value('ALCopy') == 'Yes' ? 'selected' : ''; ?>></option>
      <option value="Yes" <?php echo set_value('ALCopy') == 'Yes' ? 'selected' : ''; ?>>Yes</option>
      <option value="No" <?php echo set_value('ALCopy') == 'No' ? 'selected' : ''; ?>>No</option>
    </select><br>
  </div>
</div>

<div class="row col-md-12">
  <div class="col-md-3">
    <label for="OLCopy" class="form-label">O/L Copy:</label>
  </div>
  <div class="col-md-4">
    <select id="OLCopy" name="OLCopy" class="form-control">
    <option value="" <?php echo set_value('OLCopy') == 'Yes' ? 'selected' : ''; ?>></option>
      <option value="Yes" <?php echo set_value('OLCopy') == 'Yes' ? 'selected' : ''; ?>>Yes</option>
      <option value="No" <?php echo set_value('OLCopy') == 'No' ? 'selected' : ''; ?>>No</option>
    </select><br>
  </div>
</div>

<div class="row col-md-12">
  <div class="col-md-3">
    <label for="universityRequestCopy" class="form-label">University Request Letter Copy:</label>
  </div>
  <div class="col-md-4">
    <select id="universityRequestCopy" name="universityRequestCopy" class="form-control">
    <option value="" <?php echo set_value('universityRequestCopy') == 'Yes' ? 'selected' : ''; ?>></option>
      <option value="Yes" <?php echo set_value('universityRequestCopy') == 'Yes' ? 'selected' : ''; ?>>Yes</option>
      <option value="No" <?php echo set_value('universityRequestCopy') == 'No' ? 'selected' : ''; ?>>No</option>
    </select><br>
  </div>
</div>

<div class="row col-md-12">
  <div class="col-md-3">
    <label for="NICCopy" class="form-label">NIC Copy:</label>
  </div>
  <div class="col-md-4">
    <select id="NICCopy" name="NICCopy" class="form-control">
    <option value="" <?php echo set_value('NICCopy') == 'Yes' ? 'selected' : ''; ?>></option>
      <option value="Yes" <?php echo set_value('NICCopy') == 'Yes' ? 'selected' : ''; ?>>Yes</option>
      <option value="No" <?php echo set_value('NICCopy') == 'No' ? 'selected' : ''; ?>>No</option>
    </select><br>
  </div>
</div>

<div class="row col-md-12">
  <div class="col-md-3">
    <label for="GSCopy" class="form-label">GS Copy:</label>
  </div>
  <div class="col-md-4">
    <select id="GSCopy" name="GSCopy" class="form-control">
    <option value="" <?php echo set_value('GSCopy') == 'Yes' ? 'selected' : ''; ?>></option>
      <option value="Yes" <?php echo set_value('GSCopy') == 'Yes' ? 'selected' : ''; ?>>Yes</option>
      <option value="No" <?php echo set_value('GSCopy') == 'No' ? 'selected' : ''; ?>>No</option>
    </select><br>
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
                <input type="text" class="form-control" id="reportingPersonServiceIdInput" name="reportingPersonServiceIdInput"  required value="">
            </div>
            <div class="col-md-6"><span id="reportingPersonServiceIdValidationMsg"></span><?php echo form_error('reportingPersonServiceIdInput'); ?></div>
        </div>
        
        <div class="row col-md-12">
            <div class="col-md-4">
                <label class="form-label">Reporting Person's Name :</label>
            </div>
            <div class="col-md-4">
                <input type="text" class="form-control" id="reportingNameInput" name="reportingNameInput" required  value="">
            </div>
            <div class="col-md-4"><?php echo form_error('reportingNameInput'); ?></div>
        </div>
        
        <div class="row col-md-12">
            <div class="col-md-4">
                <label class="form-label">Reporting Person's Designation:</label>
            </div>
            <div class="col-md-4">
                <?php echo form_dropdown('cmbGrade', $gradeList,set_value('cmbGrade'), 'class="form-control button-style"  required  id="cmbGrade"');  ?>
            </div>
            <div class="col-md-4"><?php echo form_error('cmbGrade'); ?></div>
        </div> -->
        
        
            
         <div class="row col-md-12">
            <div class="col-md-9" >
            </div>
            
            <div class="col-md-1" >
                <button id="btnSubmit" class="btn btn-success" type="submit" style="cursor:pointer">Save</button>
            </div>
            <div class="col-md-2" >
                <button type="button" class="btn btn-danger" style="cursor:pointer">Clear<?php echo form_close(); ?></button>
            </div>
        </div>

	</div>
    
    </form>

	<p class="footer"></p>
</div>

</body>
</html>

<script>

document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('form_application').addEventListener('submit', function() {
        // Disable the submit button once it's clicked
        document.getElementById('btnSubmit').setAttribute('disabled', 'disabled');
    });
});
	// Function to validate email
// function validateEmail(email) {
//     var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
//     return emailRegex.test(email);
// }



// Add event listener for 'input' event
//emailInput.addEventListener('input', function() {
	
	// Get the input element and validation message element
// 	var emailInput 	= document.getElementById('emailInput');
// 	var validationMsg = document.getElementById('emailValidationMsg');
	
//     var enteredEmail = emailInput.value;
//     if (validateEmail(enteredEmail)) {
//         validationMsg.textContent = 'Valid Format';
//         validationMsg.style.color = 'green';
//     } else {
//         validationMsg.textContent = 'Invalid Format';
//         validationMsg.style.color = 'red';
//     }
// });

function validateNIC(nicNumber) {
    var nicRegex10 = /^\d{9}[VX]$/i;
    var nicRegex12 = /^\d{12}$/;
    return nicRegex10.test(nicNumber) || nicRegex12.test(nicNumber);
}



// Add event listener for 'blur' event (when focus leaves the input)
nicInput.addEventListener('input', function() {
	
	// Get the input element and validation message element
var nicInput = document.getElementById('nicInput');
var nicValidationMsg = document.getElementById('nicValidationMsg');
	
    var enteredNIC = nicInput.value;
    if (validateNIC(enteredNIC)) {
        nicValidationMsg.textContent = 'Valid NIC';
        nicValidationMsg.style.color = 'green';
    } else {
        nicValidationMsg.textContent = 'Invalid NIC';
        nicValidationMsg.style.color = 'red';
    }
});

// Function to validate phone number (for a 10-digit number)
function validatePhoneNumber(phoneNumber) {
    var phoneRegex = /^\d{10}$/; // Matches a 10-digit number
    
    return phoneRegex.test(phoneNumber);
}



// Add event listener for 'blur' event (when focus leaves the input)
phoneInput.addEventListener('input', function() {
	
		// Get the input element and validation message element
	var phoneInput = document.getElementById('phoneInput');
	var phoneValidationMsg = document.getElementById('phoneValidationMsg');
	
    var enteredPhone = phoneInput.value;
    if (validatePhoneNumber(enteredPhone)) {
        phoneValidationMsg.textContent = 'Valid Number';
        phoneValidationMsg.style.color = 'green';
    } else {
        phoneValidationMsg.textContent = 'Invalid Number';
        phoneValidationMsg.style.color = 'red';
    }
});

function validateServiceId(serviceId) {
    var serviceIdRegex = /^\d{4}$/; // Matches a 4-digit number
    
    return serviceIdRegex.test(serviceId);
}



// Add event listener for 'blur' event (when focus leaves the input)
serviceIdInput.addEventListener('input', function() {
	
	// Get the input element and validation message element
	var serviceIdInput = document.getElementById('serviceIdInput');
	var serviceIdValidationMsg = document.getElementById('serviceIdValidationMsg');
	
    var enteredServiceId = serviceIdInput.value;
    if (validateServiceId(enteredServiceId)) {
        serviceIdValidationMsg.textContent = 'Valid service ID';
        serviceIdValidationMsg.style.color = 'green';
    } else {
        serviceIdValidationMsg.textContent = 'Invalid service ID (should be 4 digits)';
        serviceIdValidationMsg.style.color = 'red';
    }
});

// Function to validate reporting person's service ID (4-digit number)
function validateReportingPersonServiceId(reportingServiceId) {
    var reportingServiceIdRegex = /^\d{4}$/; // Matches a 4-digit number
    
    return reportingServiceIdRegex.test(reportingServiceId);
}



// Add event listener for 'blur' event (when focus leaves the input)
reportingPersonServiceIdInput.addEventListener('input', function() {
	
	
	// Get the input element and validation message element
	var reportingPersonServiceIdInput = document.getElementById('reportingPersonServiceIdInput');
	var reportingPersonServiceIdValidationMsg = document.getElementById('reportingPersonServiceIdValidationMsg');
	
    var enteredReportingServiceId = reportingPersonServiceIdInput.value;
    if (validateReportingPersonServiceId(enteredReportingServiceId)) {
        reportingPersonServiceIdValidationMsg.textContent = 'Valid service ID';
        reportingPersonServiceIdValidationMsg.style.color = 'green';
    } else {
        reportingPersonServiceIdValidationMsg.textContent = 'Invalid service ID (should be 4 digits)';
        reportingPersonServiceIdValidationMsg.style.color = 'red';
    }
});





</script>

