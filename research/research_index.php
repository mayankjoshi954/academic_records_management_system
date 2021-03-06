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
$r_id=intval($_GET['del']);
//Query for deletion
$sql = "delete from research WHERE  research_id=:research_id";
// Prepare query for execution
$query = $con->prepare($sql);
// bind the parameters
$query-> bindParam(':research_id',$r_id, PDO::PARAM_STR);
// Query Execution
$query -> execute();
// Mesage after updation
echo "<script>alert('Record deleted!');</script>";
// Code for redirection
echo "<script>window.location.href='research_index.php'</script>"; 
}


?>









<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Research</title>
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
  <a href="../project/project_index.php">Project</a>
  <a href="research_index.php"><b>Research</b></a>
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
                    <h3>Research</h3> <hr />
                    <a href="add_research.php"><button class="btn btn-primary">Add Research</button></a>
                <div class="table-responsive"><br>              
                <table id="mytable" class="table table-bordred table-striped">                 
                    <thead>
                        <th>#</th>
                        <th>Title</th>
                        <th>Date</th>
                        <th>Weblink</th>
                        <th>Description</th>
                        <th style="text-align: center;">Update</th>
                        <th style="text-align: center;">Delete</th>
                    </thead>

                    <tbody>
    
                <?php 
                $user_id=$_SESSION['sess_id'];
                $sql = "SELECT * from research where user_id=:user_id";
                //Prepare the query:
                $query = $con->prepare($sql);
                $query->bindParam('user_id', $user_id, PDO::PARAM_STR);
                //Execute the query:
                $query->execute();
                //Assign the data which you pulled from the database (in the preceding step) to a variable.
                $results=$query->fetchAll(PDO::FETCH_OBJ);
                // For serial number initialization
                $cnt=1;
                if($query->rowCount() > 0)
                {
                //In case that the query returned at least one record, we can echo the records within a foreach loop:
                foreach($results as $result)
                {               
                ?>  
                <tr>
                    <td><?php echo htmlentities($cnt);?></td>
                    <td><?php echo htmlentities($result->title);?></td>
                    <td><?php echo htmlentities($result->date_of_research);?></td>
                    <td><?php echo htmlentities($result->weblink);?></td>
                    <td><?php echo htmlentities($result->description);?></td>
                    <td style="text-align: center;"><a href="r_update.php?r_id=<?php echo htmlentities($result->research_id);?>"><img src="..\img\update.svg" height="20px" width="20px"></a></td>
                    <td style="text-align: center;"><a href="research_index.php?del=<?php echo htmlentities($result->research_id);?>"><img src="..\img\remove.svg" height="20px" width="20px" onClick="return confirm('Do you really want to delete?');" ></a></td>
                </tr>
                <?php 
                // for serial number increment
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
