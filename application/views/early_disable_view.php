<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search NIC</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
<?php if ($this->session->flashdata('success_message')) { ?>
        <div class="alert alert-success"><?php echo $this->session->flashdata('success_message'); ?></div>
    <?php } ?>

    <?php if ($this->session->flashdata('error_message')) { ?>
        <div class="alert alert-danger"><?php echo $this->session->flashdata('error_message'); ?></div>
    <?php } ?>
<div class="card">
<div class="card-header text-left">
    <h4 class="mb-4">SEARCH NIC</h4>
    </div>
    <div class="card-body">
    <div class="container mt-5">
    <form action="<?php echo base_url('index.php/early_disable/search_nic'); ?>" method="post">
        <div class="form-group mb-4">
            <label for="nic">NIC:</label>
            <div class="col-sm-6">
            <input type="text" class="form-control mb-4" id="nic" name="nic" required>
            </div>
        </div>
        <button type="submit" class="btn btn-dark">Disable</button>
    </form>
    </div>
    </div>
    </div>
</div>

</body>
</html>

