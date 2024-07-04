<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trainee Management</title>
</head>
<body>

  <main class="container mt-5">
  <?php if(isset($error_message)) : ?>
    <div class="alert alert-danger" role="alert"><?= $error_message ?></div>
<?php endif; ?>
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card shadow-sm">
          <div class="card-header">
            <h3>Register Trainee</h3>
          </div>
          <div class="card-body">
            <p>Enter the NIC number of the trainee to register them.</p>
            <form action="<?= site_url('trainee/check') ?>" method="post" id="checkTraineeForm">
              <div class="mb-3">
                <label for="traineeNic" class="form-label">Trainee NIC Number</label>
                <input type="text" class="form-control" name="traineeNic" id="traineeNic" aria-describedby="traineeNicHelp" required>
                <div id="traineeNicHelp" class="form-text">Enter the trainee's National Identity Card (NIC) number.</div>
              </div>
              <button type="submit" class="btn btn-primary">Check Trainee</button>
            </form>
            <div id="messageContainer" class="mt-3"></div>
          </div>
        </div>
      </div>
    </div>
  </main>
  
</body>
</html>
