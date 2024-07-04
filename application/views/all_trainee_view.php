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
                    
                    <label class="lblStrong">Province:</label>
                    <select name="province" id="province" class="form-control" onchange="loadDistricts()">
                        <option value="">All Provinces</option>
                        <?php foreach ($provinces as $province) { ?>
                            <option value="<?= $province->province_code ?>"><?= $province->province_description ?></option>
                        <?php } ?>
                    </select>

                    <label class="lblStrong">District:</label>
                    <select name="district" id="district" class="form-control" onchange="loadBranches()">
                        <option value="">All Districts</option>
                    </select>

                    <label class="lblStrong">Branch:</label>
                    <select name="branch" id="branch" class="form-control">
                        <option value="">All Branches</option>
                    </select>
                    
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
        var branch = $("#branch").val();
        var district = $("#district").val();
        var province = $("#province").val();

        if (!startDate || !endDate) {
            alert("Please select both From Date and To Date.");
            return;
        }
        
        loadTableWithDate(startDate, endDate, branch, district, province);
    }

    function loadTableWithDate(startDate, endDate, branch, district, province) {
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
                    endDate: endDate,
                    branch: branch,
                    district: district,
                    province: province
                }
            },
        });
    }

    function loadDistricts() {
        var provinceCode = $("#province").val();
        $.ajax({
            url: 'index.php/all_trainee/get_districts_by_province',
            type: 'POST',
            data: { province_code: provinceCode },
            success: function(response) {
                var districts = JSON.parse(response);
                var districtSelect = $("#district");
                districtSelect.empty();
                districtSelect.append('<option value="">All Districts</option>');
                $.each(districts, function(index, district) {
                    districtSelect.append('<option value="'+district.district_code+'">'+district.district_description+'</option>');
                });
            }
        });
    }

    function loadBranches() {
        var districtCode = $("#district").val();
        $.ajax({
            url: 'index.php/all_trainee/get_branches_by_district',
            type: 'POST',
            data: { district_code: districtCode },
            success: function(response) {
                var branches = JSON.parse(response);
                var branchSelect = $("#branch");
                branchSelect.empty();
                branchSelect.append('<option value="">All Branches</option>');
                $.each(branches, function(index, branch) {
                    branchSelect.append('<option value="'+branch.branch_code+'">'+branch.branch_description+'</option>');
                });
            }
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

        var branchInput = document.createElement("input");
        branchInput.type = "hidden";
        branchInput.name = "branch";
        branchInput.value = $("#branch").val();

        var districtInput = document.createElement("input");
        districtInput.type = "hidden";
        districtInput.name = "district";
        districtInput.value = $("#district").val();

        var provinceInput = document.createElement("input");
        provinceInput.type = "hidden";
        provinceInput.name = "province";
        provinceInput.value = $("#province").val();

        form.appendChild(fromDateInput);
        form.appendChild(toDateInput);
        form.appendChild(branchInput);
        form.appendChild(districtInput);
        form.appendChild(provinceInput);

        document.body.appendChild(form);
        form.submit();
    }
</script>
