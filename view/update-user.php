<?php
include("../service/getbyid-service.php");

?>

<!DOCTYPE html>
<html>

<head>
    <title>User update form</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1>User update form</h1>
        <form action="../service/update-service.php" method="post">
            <!-- display error message if it exists -->
            <?php if (!empty($error)) : ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>
            <input type="hidden" name="id" value="<?php echo $id; ?>">

                <label for="name" class="col-sm-2 col-form-label"><strong>Name</strong></label>
                <div class="col-sm-4">
                    <input type="text" class="form-control form-control-sm p-1" id="name" name="name" value="<?php echo $name; ?>" required>
                </div>
         
            <label for="email" class="col-sm-2 col-form-label"><strong>Email</strong></label>
                <div class="col-sm-4">
                    <input type="email" class="form-control form-control-sm p-1" id="email" name="email" value="<?php echo $email; ?>" required>
                </div>
                <label for="mobile" class="col-sm-2 col-form-label"><strong>Mobile</strong></label>
                <div class="col-sm-4">
                    <input type="phone" class="form-control form-control-sm p-1" id="mobile" name="mobile" value="<?php echo $mobile; ?>" required>
                </div>

            <div class="form-group">
                <label for="status"><strong>Status</strong></label>
                <div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="active" value="active" <?php if ($status == 'active' || $status == 'Active') echo 'checked'; ?>>
                        <label class="form-check-label" for="active">Active</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="deactive" value="deactive" <?php if ($status == 'deactive' || $status == 'Deactive') echo 'checked'; ?>>
                        <label class="form-check-label" for="deactive">Deactive</label>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-sm px-4 py-2">Update Category</button>
            <a href="home.php" class="btn btn-secondary btn-sm px-4 py-2">Cancel</a>
        </form>
    </div>

    <!-- Add Bootstrap JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/js/bootstrap.min.js"></script>
</body>

</html>