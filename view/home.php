<?php
// check for sort URL parameter
if (isset($_GET['sort']) && $_GET['sort'] === 'asc') {
    include("../service/ascending-order-service.php");
} elseif (isset($_GET['email'])) {
    include("../service/getbyemail-service.php");
} elseif (isset($_GET['status']) && $_GET['status'] !== 'all') {
    include("../service/getbystatus-service.php");
} elseif (isset($_GET['status']) == 'all') {
    include("../service/all-user-service.php");
} else {
    include("../service/all-user-service.php");
}
// check for success status URL parameter
if (isset($_GET['success'])) {
    $success = $_GET['success'];
} else {
    $success = '';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Users</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">

    <!-- Add Bootstrap JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/js/bootstrap.min.js"></script>

</head>

<body>
    <div class="container">
        <h1>All Categories</h1>
        <a href="create-user.php" class="btn btn-sm btn-primary">Create Category</a>
        <a href="?sort=asc" class="btn btn-sm btn-secondary">Get All Users (Ascending Order)</a>
        <button id="email-button" class="btn btn-sm btn-secondary">Filter by Email</button>

        <input class="form-check-input" type="radio" name="status" value="all" id="all" <?php echo (!isset($_GET['status']) || $_GET['status'] === 'all') ? 'checked' : ''; ?>>
        <label class="form-check-label" for="all">
            All
        </label>
        <input class="form-check-input" type="radio" name="status" value="active" id="active" <?php echo (isset($_GET['status']) && $_GET['status'] === 'active') ? 'checked' : ''; ?>>
        <label class="form-check-label" for="active">
            Active
        </label>
        <input class="form-check-input" type="radio" name="status" value="deactive" id="deactive" <?php echo (isset($_GET['status']) && $_GET['status'] === 'deactive') ? 'checked' : ''; ?>>
        <label class="form-check-label" for="deactive">
            Deactive
        </label>
        <div id="email-input" style="display: none;">
            <input type="email" id="filter-email" class="form-control" placeholder="Enter email...">
            <button id="filter-button" class="btn btn-sm btn-primary mt-2">Filter</button>
        </div>

        <?php if ($success === 'created') { ?>
            <div id="alert-success" class="alert alert-success alert-dismissible fade show" role="alert">
                Category Created successfully.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } ?>
        <?php if ($success === 'update') { ?>
            <div id="alert-info" class="alert alert-info alert-dismissible fade show" role="alert">
                Category updated successfully.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } ?>
        <?php if ($success === 'delete') { ?>
            <div id="alert-danger" class="alert alert-danger alert-dismissible fade show" role="alert">
                Category deleted successfully.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } ?>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($users) > 0) { ?>
                    <?php foreach ($users as $user) { ?>
                        <tr>
                            <td><?php echo $user->getId(); ?></td>
                            <td><?php echo $user->getName(); ?></td>
                            <td><?php echo $user->getEmail(); ?></td>
                            <td><?php echo $user->getMobile(); ?></td>
                            <td><?php echo $user->getStatus(); ?></td>
                            <td>
                                <a href="update-user.php?id=<?php echo $user->getId(); ?>" class="btn btn-sm btn-primary">Update</a>
                                <a href="../service/delete-service.php?id=<?php echo $user->getId(); ?>" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                <?php } else { ?>
                    <tr>
                        <td colspan="4">No categories found</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

    </div>
    <script>
        var allRadio = document.getElementById('all');
        var activeRadio = document.getElementById('active');
        var deactiveRadio = document.getElementById('deactive');

        allRadio.addEventListener('change', function(event) {
            if (event.target.checked) {
                window.location.href = '?status=all';
            }
        });

        activeRadio.addEventListener('change', function(event) {
            if (event.target.checked) {
                window.location.href = '?status=active';
            }
        });

        deactiveRadio.addEventListener('change', function(event) {
            if (event.target.checked) {
                window.location.href = '?status=deactive';
            }
        });
    </script>

    <script>
        var emailButton = document.getElementById('email-button');
        var emailInput = document.getElementById('email-input');
        var filterButton = document.getElementById('filter-button');

        emailButton.addEventListener('click', function() {
            if (emailInput.style.display === 'block') {
                emailInput.style.display = 'none'; // hide the email input
                filterButton.style.display = 'none'; // hide the filter button
            } else {
                emailInput.style.display = 'block'; // show the email input
                filterButton.style.display = 'block'; // show the filter button
            }
        });

        filterButton.addEventListener('click', function(event) {
            event.preventDefault(); // prevent the default form submission behavior

            var email = document.getElementById('filter-email').value;
            if (email) {
                window.location.href = '?email=' + email;
            }
        });
    </script>


    <script>
        // Remove the success alert after 3 seconds
        setTimeout(function() {
            var alertSuccess = document.getElementById('alert-success');
            if (alertSuccess) {
                alertSuccess.remove();
            }
        }, 3000);

        // Remove the info alert after 3 seconds
        setTimeout(function() {
            var alertInfo = document.getElementById('alert-info');
            if (alertInfo) {
                alertInfo.remove();
            }
        }, 3000);

        // Remove the danger alert after 3 seconds
        setTimeout(function() {
            var alertDanger = document.getElementById('alert-danger');
            if (alertDanger) {
                alertDanger.remove();
            }
        }, 3000);
    </script>
</body>

</html>