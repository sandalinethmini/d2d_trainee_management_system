<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Recent Trainees</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
  <style>
    /* Custom styles to remove borders */
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
    /* Remove border from search input and length select box */
    .dataTables_length select,
    .dataTables_filter input {
      border: none !important;
      box-shadow: none !important;
    }
    /* Remove the outer box shadow and border */
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
        <h4>Recent Trainees</h4>
        <table id="traineeTable" class="table table-striped table-bordered no-border">
          <thead>
            <tr>
              <th>No</th>
              <th>NIC</th>
              <th>Branch</th>
              <th>District</th>
              <th>Name</th>
              <th>Registration No</th>
              <th>Start Date</th>
              <th>Effective Date</th>
            </tr>
          </thead>
          <tbody></tbody>
        </table>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#traineeTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
          url: '<?= base_url("index.php/recent_trainee/fetch_trainees") ?>',
          type: 'POST'
        },
        columns: [
          { data: 0 },
          { data: 1 },
          { data: 2 },
          { data: 3 },
          { data: 4 },
          { data: 5 },
          { data: 6 },
          { data: 7 }
        ],
        order: [[1, 'asc']],
        searching: true
      });
    });
  </script>
</body>
</html>
