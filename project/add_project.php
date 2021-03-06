<?php 
session_start();
if(!isset($_SESSION['sess_email'])) {
    header('location: ../login.php');
}  
  
?>


<?php
// include database connection file
include("../components/connection.php");
if(isset($_POST['add']))
{
// Posted Values  
$project_by=$_SESSION['sess_name'];   //$_SESSION['sess_name']
$title=$_POST['title'];
$date=$_POST['date'];
$weblink=$_POST['weblink'];
$budget=$_POST['budget'];
$description=$_POST['description'];
$user_id=$_SESSION['sess_id'];

try{
    
    $sql="INSERT INTO project(title,description,date_of_project,project_by,weblink,budget,user_id) VALUES(:title,:description,:date,:project_by,:weblink,:budget,:user_id)";
    
    
    $query = $con->prepare($sql);
    
    $query->bindParam(':title',$title,PDO::PARAM_STR);
    $query->bindParam(':description',$description,PDO::PARAM_STR);
    $query->bindParam(':date',$date,PDO::PARAM_STR);
    $query->bindParam(':project_by',$project_by,PDO::PARAM_STR);
    $query->bindParam(':weblink',$weblink,PDO::PARAM_STR);
    $query->bindParam(':budget',$budget,PDO::PARAM_STR);
    $query->bindParam(':user_id',$user_id,PDO::PARAM_STR);
    
    $query->execute();
    
    echo "<script>alert('Record successfully inserted!');</script>";
    echo "<script>window.location.href='project_index.php'</script>"; 
}
catch(PDOException $e){
    echo "<script>alert('Something went wrong. Please try again.');</script>";
    echo "<script>window.location.href='project_index.php'</script>"; 
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/dashboard.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel = "icon" href = "../img/favicon.png" type = "image/x-icon">
</head>
<body>
    
    <!-- Side navigation -->

<!-- The sidebar -->
<div class="sidebar">
  <a class="active" href="home.php">Home</a>
  <a href="../publication/publication_index.php">Publication</a>
  <a href="project_index.php"><b>Project</b></a>
  <a href="../research/research_index.php">Research</a>
  <a href="../setting.php">Change Password</a>
  <a href="../logout.php">Log Out</a>
</div>

<!-- Page content -->
<div class="content">
    <div class="header">
        <h2>Academic Publications Management System</h2>
        <h4 style="color: #1e1f1f;">College of Technology, Pantnagar</h4>
    </div><hr>

    <div class="container"> 
        <div class="add-form" >
            <h3>Add Project</h3><hr>
                <form action="add_project.php" method="post" id="fileForm" role="form">

                    <div class="form-group">   
                        <label for="title"><span class="req"></span>Project Title: </label>
                        <input class="form-control" type="text" name="title" id = "txt" required />
                    </div>

                    <div class="form-group">   
                        <label for="Date"><span class="req"></span> Date: </label>
                        <input class="form-control" type="date" name="date" id = "txt" required />
                    </div>

                    <div class="form-group">   
                        <label for="Weblink"><span class="req"></span> Weblink: </label>
                        <input class="form-control" type="url" name="weblink" id = "txt" placeholder="http://"/>
                    </div>

                    <div class="form-group">   
                        <label for="Description"><span class="req"></span> </label>
                        <textarea rows = "5" cols = "100" name = "description" placeholder="Description about project" required></textarea>
                    </div>

                    <div class="form-group">   
                        <label for="title"><span class="req"></span>Budget: </label>
                        <input class="form-control" type="text" name="budget" id = "txt" required />
                    </div>
                    
                    <div class="form-group">
                        <hr>
                        <input class="btn btn-success" type="submit" name="add" value="Add Project">
                    </div>
                </form>
            <hr>
        </div>
    </div> 
</div>
<?php include "../components/footer.html"; ?>
</body>
</html>