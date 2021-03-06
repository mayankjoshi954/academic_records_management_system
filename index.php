<?php $pagename='HOME'; ?>

<?php
require('components/connection.php');

$user = $con->query('SELECT COUNT(*) FROM user')->fetchColumn();
$publication = $con->query('SELECT COUNT(*) FROM publication')->fetchColumn();
$project = $con->query('SELECT COUNT(*) FROM project')->fetchColumn();
$research = $con->query('SELECT COUNT(*) FROM research')->fetchColumn();

$con = null;
?>


<!doctype html>
<html lang="en">

<head>
  <?php include 'components/head.html'; ?>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/egg.js/1.0/egg.min.js"></script>
  <title>Home</title>
</head>

<body>
  <?php include('components/header.php'); ?>
  <!-- <div class="container-fluid" id="main-para"> -->
  <div id="main-para" style="padding-left: 7%; padding-right: 7%;">
    <h2><b> Welcome!</b></h2>
    <p>This is a CRUD based CMS project.<br><br>To view all publications, research or
      projects, click the cards below or navigate through the navigation bar.<br>To add
      your data, first signup and then login to add.</p>

    <!-- boxes of research, project and project with details start here -->
    <div class="row">
      <div class="col-sm-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><b>Publications</b></h5>
            <p class="card-text">Papers published by the faculty and students of the college.</p>
            <a href="display_publication.php" class="btn btn-primary">Explore</a>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><b>Research</b></h5>
            <p class="card-text">Research papers published by the faculty and students of the college.</p>
            <a href="display_research.php" class="btn btn-primary">Explore</a>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><b>Projects</b></h5>
            <p class="card-text">Projects done by the faculty and students of the college.</p>
            <a href="display_project.php" class="btn btn-primary">Explore</a>
          </div>
        </div>
      </div>
    </div>


  </div>


  <!-- boxes describing stats of the data in database -->
  <div class="container-fluid" id="container-stats">
    <div class="row">

      <div class="col stats-box">
        <div>
          <h3>Total Users</h3>
        </div>
        <div>
          <h3><?php echo $user ?></h3>
        </div>
      </div>

      <div class="col stats-box">
        <div>
          <h3>Total Publications</h3>
        </div>
        <div>
          <h3><?php echo $publication ?></h3>
        </div>
      </div>

      <div class="col stats-box">
        <div>
          <h3>Total Projects</h3>
        </div>
        <div>
          <h3><?php echo $project ?></h3>
        </div>
      </div>

      <div class="col stats-box">
        <div>
          <h3>Total Research</h3>
        </div>
        <div>
          <h3><?php echo $research ?></h3>
        </div>
      </div>

    </div>
  </div>


  <?php include('components/footer.html'); ?>


</body>

</html>