<?php 
session_start();
if(!isset($_SESSION['sess_email'])) {
    header('location: ../login.php');
}  
  
?>



<?php
// include database connection file
include("../components/connection.php");

// Code for record deletion
if(isset($_REQUEST['del']))
{
//Get row id
$project_id=intval($_GET['del']);
//Query for deletion
$sql = "delete from project WHERE  project_id=:project_id";
// Prepare query for execution
$query = $con->prepare($sql);
// bind the parameters
$query-> bindParam(':project_id',$project_id, PDO::PARAM_STR);
// Query Execution
$query -> execute();
// Mesage after updation
echo "<script>alert('Record deleted!');</script>";
// Code for redirection
echo "<script>window.location.href='project_index.php'</script>"; 
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
     <!-- Optional JavaScript; choose one of the two! -->
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://getbootstrap.com/dist/js/bootstrap.min.js"></script>
    <link rel = "icon" href = "../img/favicon.png" type = "image/x-icon">
    <link rel="stylesheet" type="text/css" href="../css/dashboard.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
    
    <!-- Side navigation -->

<!-- The sidebar -->
<div class="sidebar">
  <a class="active" href="../dashboard_home.php">Home</a>
  <a href="../publication/publication_index.php">Publication</a>
  <a href="project_index.php"><b>Project</b></a>
  <a href="../research/research_index.php">Research</a>
  <a href="../setting.php">Change Password</a>
  <a href="../logout.php">Log Out</a>
</div>
<!-- Page content -->
<div class="content">
    <div class="header">
        <h1>Academic Publications Management System</h1>
        <h3 style="color: #1e1f1f;">College of Technology, Pantnagar</h3>
    </div><hr>


    <div  class= "home_display">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3>Project</h3> <hr />
                    <a href="add_project.php"><button class="btn btn-primary">Add Project</button></a>
                <div class="table-responsive"><br>               
                <table id="mytable" class="table table-bordred table-striped">                 
                    <thead>
                        <th>#</th>
                        <th>Title</th>
                        <th>Date</th>
                        <th>Weblink</th>
                        <th>Description</th>
                        <th>Budget</th>
                        <th style="text-align: center;">Update</th>
                        <th style="text-align: center;">Delete</th>
                    </thead>

                    <tbody>
    
                <?php 
                $user_id=$_SESSION['sess_id'];
                $sql = "SELECT * from project where user_id=:user_id";
                //Prepare the query:
                $query = $con->prepare($sql);
                $query->bindParam('user_id', $user_id, PDO::PARAM_STR);
                //Execute the query:
                $query->execute();
                
                $results=$query->fetchAll(PDO::FETCH_OBJ);
                // For serial number initialization
                $cnt=1;

                if($query->rowCount() > 0)
                {
                
                foreach($results as $result)
                {               
                ?>  
                <tr>
                    <td><?php echo htmlentities($cnt);?></td>
                    <td><?php echo htmlentities($result->title);?></td>
                    <td><?php echo htmlentities($result->date_of_project);?></td>
                    <td><?php echo htmlentities($result->weblink);?></td>
                    <td><?php echo htmlentities($result->description);?></td>
                    <td><?php echo htmlentities($result->budget);?></td>

                    <td class="table-image" style="text-align: center;">                        
                            <a href="update.php?p_id=<?php echo htmlentities($result->project_id);?>"><img src="..\img\update.svg" height="20px" width="20px"></a>  
                    </td>

                    <td style="text-align: center;">
                        <a href="project_index.php?del=<?php echo htmlentities($result->project_id);?>"><img src="..\img\remove.svg" height="20px" width="20px" onClick="return confirm('Do you really want to delete?');" ></a>
                    </td>

                </tr>
                <?php 
                // for increment
                $cnt++;
                }} ?>
                </tbody>      
            </table>
            </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php include "../components/footer.html"; ?>
</body>
</html>
