<style>
    .form-row > .col, .form-row > [class*=col-] {
        padding-right: 15px;
    }
    .lblStrong {
        font-weight: bold;
    }
    table#recordTable tbody td {
        font-size: 13px;
    }
    table#recordTable thead th {
        font-size: 14px;
    }
    .field-height {
        padding-top: 0px;
        height: 24px;
        font-size: 12px;
    }
</style>

<div class="content p-4">
    <div class="card mb-4">
        <div class="card-header bg-white font-weight-bold">
            All Trainees
        </div>
        <div class="card-body">
            <div class="col-md-12 col-md-auto">
                <div class="row col-md-4">
                    <label class="lblStrong">From Date:</label>
                    <input type="text" name="txtFromDate" id="txtFromDate" class="form-control" value="" placeholder="">
                    <label class="lblStrong">To Date:</label>
                    <input type="text" name="txtToDate" id="txtToDate" class="form-control" value="" placeholder="">
                    
                    <div class="row col-md-12"></div>
                    <button class="btn btn-dark field-height" type="button" onclick="validateAndLoadTableWithDate()">Search</button>
                    <div class="row col-md-2"></div>
                    
                    <button class="btn btn-dark field-height" type="button" onclick="downloadExcel()">Export to Excel</button>
                </div>
            </div>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-body">
            <table id="recordTable" class="table table-hover table-striped table-sm" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Registration Number</th>
                        <th>Branch</th>
                        <th>District</th>
                        <th>Province</th>
                        <th>Name</th>
                        <th>NIC</th>
                        <th>Phone Number</th>
                        <th>Start Date</th>
                        <th>Effective Date</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        flatpickr("#txtFromDate", {});
        flatpickr("#txtToDate", {});
        loadTable();
    });

    function validateAndLoadTableWithDate() {
        var startDate = $("#txtFromDate").val();
        var endDate = $("#txtToDate").val();
        
        if (!startDate || !endDate) {
            alert("Please select both From Date and To Date.");
            return;
        }
        
        loadTableWithDate(startDate, endDate);
    }

    function loadTableWithDate(startDate, endDate) {
        $('#recordTable').DataTable({
            destroy: true,
            paging: false,
            searching: false,
            info: false,
            processing: true,
            serverSide: true,
            ajax: {
                url: 'index.php/all_trainee/recordlist',
                type: 'POST',
                data: {
                    startDate: startDate,
                    endDate: endDate
                }
            },
            // columns: [
            //     { data: 'no' },
            //     { data: 'emp_reg_no' },
            //     { data: 'emp_branch' },
            //     { data: 'emp_district' },
            //     { data: 'emp_province' },
            //     { data: 'emp_full_name' },
            //     { data: 'emp_nic' },
            //     { data: 'emp_phone' }
            // ]
        });
    }


    function downloadExcel() {
        var form = document.createElement("form");
        form.method = "post";
        form.action = "index.php/all_trainee/download_excel";

        var fromDateInput = document.createElement("input");
        fromDateInput.type = "hidden";
        fromDateInput.name = "txtFromDate";
        fromDateInput.value = $("#txtFromDate").val();

        var toDateInput = document.createElement("input");
        toDateInput.type = "hidden";
        toDateInput.name = "txtToDate";
        toDateInput.value = $("#txtToDate").val();

        form.appendChild(fromDateInput);
        form.appendChild(toDateInput);

        document.body.appendChild(form);
        form.submit();
    }
</script>
