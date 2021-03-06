<?php 
session_start();
if(!isset($_SESSION['sess_email'])) {
    header('location: login.php');
}  
  
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/dashboard.css">
    <link rel = "icon" href = "img/favicon.png" type = "image/x-icon">
</head>

<body>

    <!-- Side navigation -->

    <!-- The sidebar -->
    <div class="sidebar">
        <a class="active" href="dashboard_home.php">Home</a>
        <a href="publication/publication_index.php">Publication</a>
        <a href="project/project_index.php">Project</a>
        <a href="research/research_index.php">Research</a>
        <a href="setting.php">Change Password</a>
        <a href="logout.php">Log Out</a>
    </div>

    <!-- Page content -->
    <div class="content">
        <div class="header">
            <h1>Academic Publications Management System</h1>
            <h3 style="color: #1e1f1f;">College of Technology, Pantnagar</h3>
        </div>
        <hr>

        <div class="container">
            <h1><b> Welcome <?php echo $_SESSION['sess_name']; ?>!</b></h1>
            <p>Select below buttons to explore your work.<br>To add data, select the type from the left sidebar and then
                click Add.</p>
        </div>

        <div class="home_display">
            <!-- boxes of research, project and project with details start here -->
            <div class="row">
                <h1>Here's Your Work!<br><br></h1>
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-header">Publication</div>
                        <div class="card-body">
                            <h5 class="card-title"><b>My Publications</b></h5>
                            <p class="card-text">Click below to Explore.</p>
                            <a href="publication/publication_index.php" class="btn btn-primary">Explore</a>
                        </div>
                    </div>
                </div><br>

                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-header">Research</div>
                        <div class="card-body">
                            <h5 class="card-title"><b>My Research</b></h5>
                            <p class="card-text">Click below to Explore.</p>
                            <a href="research/research_index.php" class="btn btn-primary">Explore</a>
                        </div>
                    </div>
                </div><br>

                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-header">Project</div>
                        <div class="card-body">
                            <h5 class="card-title"><b>My Projects</b></h5>
                            <p class="card-text">Click below to Explore.</p>
                            <a href="project/project_index.php" class="btn btn-primary">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include "components/footer.html" ?>
</body>

</html>