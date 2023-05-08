<!DOCTYPE html>
<html>
<head>
    <title>User create form</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1>User create form</h1>
        <form action="../service/insert-service.php" method="post">
            
                <label for="name" class="col-sm-2 col-form-label"><strong>Name</strong></label>
                <div class="col-sm-4">
                    <input type="text" class="form-control form-control-sm p-1" id="name" name="name" required>
                </div>
            <label for="email" class="col-sm-2 col-form-label"><strong>Email</strong></label>
                <div class="col-sm-4">
                    <input type="email" class="form-control form-control-sm p-1" id="email" name="email" required>
                </div>
                <label for="mobile" class="col-sm-2 col-form-label"><strong>Mobile</strong></label>
                <div class="col-sm-4">
                    <input type="phone" class="form-control form-control-sm p-1" id="mobile" name="mobile" required>
                </div>
                <label for="password" class="col-sm-2 col-form-label"><strong>Password</strong></label>
                <div class="col-sm-4">
                    <input type="password" class="form-control form-control-sm p-1" id="password" name="password" required>
                </div>

            <div class="form-group">
                <label for="status"><strong>Status</strong></label>
                <div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="active" value="active" checked>
                        <label class="form-check-label" for="active">Active</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="deactive" value="deactive">
                        <label class="form-check-label" for="deactive">Deactive</label>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-sm px-4 py-2">Add New Scale</button>
            <a href="home.php" class="btn btn-secondary btn-sm px-4 py-2">Cancel</a>
        </form>
    </div>

    <!-- Add Bootstrap JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/js/bootstrap.min.js"></script>
</body>
</html>
