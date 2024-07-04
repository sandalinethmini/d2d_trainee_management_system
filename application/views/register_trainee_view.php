<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pending Registrations</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
  <style>
    .lblStrong {
      font-weight: bold;
    }
    .field-height {
      height: 24px;
      font-size: 12px;
    }
    table.dataTable.no-border th, 
    table.dataTable.no-border td {
      border: none !important;
    }
    table.dataTable.no-border thead th, 
    table.dataTable.no-border thead td {
      border-bottom: none !important;
    }
    table.dataTable.no-border {
      border: none !important;
    }
    .dataTables_length select,
    .dataTables_filter input {
      border: none !important;
      box-shadow: none !important;
    }
    .dataTables_wrapper .dataTables_length,
    .dataTables_wrapper .dataTables_filter {
      border: none !important;
      box-shadow: none !important;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h4>PENDING REGISTRATIONS</h4>
        <table id="pendingRegistrationsTable" class="table table-striped table-bordered no-border">
          <thead>
            <tr>
            <th>No</th>
              <th>NIC</th>
              <th>Name</th>
              <th>Registration No</th>
              
              <th>Branch</th>
              <th>District</th>
              <th>Province</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody></tbody>
        </table>
      </div>
    </div>
  </div>

  <div class="modal fade" id="updateRegistrationModal" tabindex="-1" role="dialog" aria-labelledby="updateRegistrationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="updateRegistrationModalLabel">Update Registration Number</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="updateRegistrationForm" method="post">
          <div class="modal-body">
            <div class="form-group">
              <label for="emp_nic">NIC</label>
              <input type="text" class="form-control" id="emp_nic" name="emp_nic" readonly>
            </div>
            <div class="form-group">
              <label for="emp_full_name">Name</label>
              <input type="text" class="form-control" id="emp_full_name" name="emp_full_name" readonly>
            </div>
            
            <div class="form-group">
              <label for="branch_description">Branch</label>
              <input type="text" class="form-control" id="branch_description" name="branch_description" readonly>
            </div>
            <div class="form-group">
              <label for="district_description">District</label>
              <input type="text" class="form-control" id="district_description" name="district_description" readonly>
            </div>
            <div class="form-group">
              <label for="province_description">Province</label>
              <input type="text" class="form-control" id="province_description" name="province_description" readonly>
            </div>
            <div class="form-group">
              <label for="new_registration_no">New Registration Number</label>
              <input type="text" class="form-control" id="new_registration_no" name="new_registration_no" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Update Registration</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script>
    $(document).ready(function() {
      var table = $('#pendingRegistrationsTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
          url: '<?= base_url("index.php/register_trainee/fetch_pending_registrations") ?>',
          type: 'POST'
        },
        columns: [
          { data: ''},
          { data: 'emp_nic' },
          { data: 'emp_full_name' },
          { data: 'emp_reg_no' },
          
          { data: 'branch_description' },
          { data: 'district_description' },
          { data: 'province_description' },
          {
            data: 'emp_nic',
            render: function(data, type, row) {
              return '<button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#updateRegistrationModal" data-nic="' + data + '">Register</button>';
            }
          }
        ],
        order: [[0, 'asc']],
        searching: true
      });

      $('#updateRegistrationModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var emp_nic = button.data('nic');

        $.ajax({
          url: '<?= base_url("index.php/register_trainee/get_trainee_details") ?>/' + emp_nic,
          type: 'GET',
          dataType: 'json',
          success: function(data) {
            $('#updateRegistrationForm #emp_nic').val(data.emp_nic);
            $('#updateRegistrationForm #emp_full_name').val(data.emp_full_name);
            $('#updateRegistrationForm #district_description').val(data.district_description);
            $('#updateRegistrationForm #branch_description').val(data.branch_description);
            $('#updateRegistrationForm #province_description').val(data.province_description);
          }
        });

        $('#updateRegistrationForm').attr('action', '<?= base_url("index.php/register_trainee/update_registration/") ?>' + emp_nic);
      });
    });
  </script>
</body>
</html>
