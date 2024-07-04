<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Trainee</title>
    
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-left">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-left">
                        <h4>CHECK TRAINEE</h4>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo site_url('check_trainee/check'); ?>" method="post">
                            <div class="form-group">
                                <label for="nic">Enter NIC:</label>
                                <div class="col-md-6">
                                <input type="text" class="form-control" id="nic" name="nic" required>
                                </div>
                            </div>
                            <div class="col-md-2">
                            <button type="submit" class="btn btn-dark btn-block">Check</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>
