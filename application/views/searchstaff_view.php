<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Search Employee</title>
  <style>
    label {
        font-weight: bold;
    }
  </style>
</head>
<body>
  <main class="container mt-5">
    <?php if ($this->session->flashdata('success_message')): ?>
      <div class="alert alert-success" role="alert">
        <?php echo $this->session->flashdata('success_message'); ?>
      </div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('error_message')): ?>
      <div class="alert alert-danger" role="alert">
        <?php echo $this->session->flashdata('error_message'); ?>
      </div>
    <?php endif; ?>

    <div class="row justify-content-center">
      <div class="col-md-10">
        <div class="card shadow-sm">
          <div class="card-header">
            <h5>SEARCH EMPLOYEE</h5>
          </div>
          <div class="card-body">
            <?php echo form_open('newstaff/search'); ?>
              <div class="form-row">
                <div class="form-group col-md-2">
                  <label for="employee_no">Employee No:</label>
                </div>
                <div class="form-group col-md-3">
                  <input type="text" name="employee_no" class="form-control" id="employee_no" required>
                </div>
              </div>
              <button type="submit" class="btn btn-primary">Search</button>
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>
    </div>
  </main>
</body>
</html>
