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
</head>
<body>

<div id="container">
	<h1><strong>Trainee Application Form</strong></h1>

	<id="body">

  <?php if ($success): ?>
    <div class="container mt-5">
        <div class="alert alert-success">
            <strong>
            <?php echo $success; ?></strong>
        </div>
      
    </div>
            
        
    <?php endif; ?>
    <form onsubmit="btnSubmit.disabled = true; return true;" id="form_application" method="post" action="index.php/newstaff/SaveRecord" enctype="multipart/form-data" >
    
    
    	<div class="row" style="margin-top:10px;">
            <div class="col-md-4"><strong style='color:#00F'><u>Employee Details</u></strong></div>
  </div>

         <div class="row col-md-12">
         <div class="col-md-3" style="padding-right: 5px;">
                <label class="form-label">Trainee Type</label>
            </div>
         <div class="col-md-4">
    <select id="Type" name="Type" class="form-control">
    <option value="" <?php echo set_value('Type') == '' ? 'selected' : ''; ?>></option>
      <option value="Cashier" <?php echo set_value('Type') == 'Cashier' ? 'selected' : ''; ?> class="col-md-3">Cashier</option>
      <option value="Normal" <?php echo set_value('Type') == 'Normal' ? 'selected' : ''; ?>>Normal</option>
    </select><br></div>
    <div class="col-md-3"><span id="typeValidationMsg"></span><?php echo form_error('Type'); ?></div>
</div> 

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
                <label class="form-label">Full Name :</label>
            </div>
            <div class="col-md-9">
                <input type="text" class="form-control" id="fullNameInput" name="fullNameInput" required  value="<?php echo set_value('fullNameInput')?>">
            </div>
            <div class="col-md-5"><?php echo form_error('fullNameInput'); ?></div>
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
                <label class="form-label">NIC No :</label>
            </div>
            <div class="col-md-4">
                <input type="text" class="form-control" id="nicInput" name="nicInput"  required value="">
            </div>
            <div class="col-md-3"><span id="nicValidationMsg"></span><?php echo form_error('nicInput'); ?></div>
        </div>

        <div class="row col-md-12">
            <div class="col-md-3">
                <label class="form-label">Account Number:</label>
            </div>
            <div class="col-md-4">
                <input type="text" class="form-control" id="accountNumberInput" name="accountNumberInput"  required value="">
            </div>
            <div class="col-md-3"><span id="accountNumberValidationMsg"></span><?php echo form_error('accountNumberInput'); ?></div>
        </div>

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
                <div class="col-md-4"><strong style='color:#00F'><u>Education</u></strong></div>
            </div>

            <div class="col-md-4">
                <?php foreach ($educations as $education): ?>
                    <label>
                        <input type="checkbox" name="educations[]" value="<?php echo $education['education_id']; ?>" class="form-label">
                        <?php echo $education['education_name']; ?>
                    </label><br>
                <?php endforeach; ?>
            </div>

            <div class="row" style="margin-top:10px;">
                <div class="col-md-4"><strong style='color:#00F'><u>Received Documents</u></strong></div>
            </div>

            <div class="col-md-4">
                <?php foreach ($options as $option): ?>
                    <label>
                        <input type="checkbox" name="options[]" value="<?php echo $option['document_id']; ?>" class="form-label">
                        <?php echo $option['document_name']; ?>
                    </label><br>
                <?php endforeach; ?>
            </div>

            <div class="row col-md-12">
                <div class="col-md-9"></div>
                <div class="col-md-1">
                    <button id="btnSubmit" class="btn btn-success" type="submit" style="cursor:pointer">Save</button>
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-danger" style="cursor:pointer">Clear</button>
                </div>
            </div>
        </form>

        <p class="footer"></p>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('#Type').change(function() {
            var type = $(this).val();
            if (type !== '') {
                $.ajax({
                    url: '<?php echo site_url("newstaff/checkAllocation"); ?>',
                    type: 'post',
                    data: { type: type },
                    dataType: 'json',
                    success: function(response) {
                        if (response.error) {
                            $('#typeValidationMsg').text(response.message).show();
                        } else {
                            $('#typeValidationMsg').text('').hide();
                        }
                    }
                });
            }
        });

        function validateNIC(nicNumber) {
            var nicRegex10 = /^\d{9}[VX]$/i;
            var nicRegex12 = /^\d{12}$/;
            return nicRegex10.test(nicNumber) || nicRegex12.test(nicNumber);
        }

        var nicInput = document.getElementById('nicInput');
        var nicValidationMsg = document.getElementById('nicValidationMsg');
        nicInput.addEventListener('input', function() {
            var enteredNIC = nicInput.value;
            if (validateNIC(enteredNIC)) {
                nicValidationMsg.textContent = 'Valid NIC';
                nicValidationMsg.style.color = 'green';
            } else {
                nicValidationMsg.textContent = 'Invalid NIC';
                nicValidationMsg.style.color = 'red';
            }
        });

        function validatePhoneNumber(phoneNumber) {
            var phoneRegex = /^\d{10}$/; // Matches a 10-digit number
            return phoneRegex.test(phoneNumber);
        }

        var phoneInput = document.getElementById('phoneInput');
        var phoneValidationMsg = document.getElementById('phoneValidationMsg');
        phoneInput.addEventListener('input', function() {
            var enteredPhone = phoneInput.value;
            if (validatePhoneNumber(enteredPhone)) {
                phoneValidationMsg.textContent = 'Valid Number';
                phoneValidationMsg.style.color = 'green';
            } else {
                phoneValidationMsg.textContent = 'Invalid Number';
                phoneValidationMsg.style.color = 'red';
            }
        });

        $('#provinceInput').change(function() {
            var provinceCode = $(this).val();
            if(provinceCode != '') {
                $.ajax({
                    url: '<?php echo site_url("newstaff/getDistricts"); ?>',
                    type: 'post',
                    data: {provinceCode: provinceCode},
                    dataType: 'json',
                    success:function(response) {
                        var options = '<option value="">Select District</option>';
                        $.each(response, function(key, value) {
                            options += '<option value="' + key + '">' + value + '</option>';
                        });
                        $('#districtInput').html(options);
                    }
                });
            } else {
                $('#districtInput').html('<option value="">Select District</option>');
            }
        });
    });
</script>

</body>
</html>
