<!--Header Section-->
<?php include_once 'views/template/header.php' ?>

<div class="row">
    <div class="col-md-6 m-auto">
        <div class="card">
            <div class="card-body">
                <form class="form" action="../process.php?module=auth&action=login" method="post">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" id="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" required>
                    </div>
                    <div class="form-group">
                        <label for="start_date">Start Date:</label>
                        <input type="date" class="form-control" name="start_date" id="start_date" required
                               pattern="\d{4}-\d{2}-\d{2}">
                    </div>
                    <div class="form-group">
                        <label for="end_date">End Date:</label>
                        <input type="date" class="form-control" name="end_date" id="end_date" required
                               pattern="\d{4}-\d{2}-\d{2}">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!--Footer Section-->
<?php include_once 'views/template/footer.php' ?>