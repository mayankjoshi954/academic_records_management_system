<?php 
session_start();
if(!isset($_SESSION['sess_email'])) {
    header('location: ../login.php');
}  
  
?>


<?php
// include database connection file
include("../components/connection.php");

if(isset($_POST['update']))  //update form is below on same file
{
// Get the project_id
$project_id=intval($_GET['p_id']);
// Posted Values  
$title=$_POST['title'];
$date=$_POST['date'];
$weblink=$_POST['weblink'];
$description=$_POST['description'];
$budget=$_POST['budget'];


$sql="update project set title=:title,date_of_project=:date,weblink=:weblink,description=:description ,budget=:budget where project_id=$project_id";

$query = $con->prepare($sql);

$query->bindParam(':title',$title,PDO::PARAM_STR);
$query->bindParam(':date',$date,PDO::PARAM_STR);
$query->bindParam(':weblink',$weblink,PDO::PARAM_STR);

$query->bindParam(':description',$description,PDO::PARAM_STR);
$query->bindParam(':budget',$budget,PDO::PARAM_STR);

$query->execute();

echo "<script>alert('Record successfully updated!');</script>";

echo "<script>window.location.href='project_index.php'</script>"; 
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Project</title>
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
        <h1>Academic Publications Management System</h1>
        <h3 style="color: #1e1f1f;">College of Technology, Pantnagar</h3>
    </div><hr>

        <?php 
        // Get the project_id
        $project_id=intval($_GET['p_id']);
        $sql = "SELECT * from project where project_id=$project_id";
   
        $query = $con->prepare($sql);
     
        $query->execute();
        
        $results=$query->fetchAll(PDO::FETCH_OBJ);
        
        $cnt=1;
        if($query->rowCount() > 0)
        {

            foreach($results as $result)
        {               
        ?>



            <div class="container"> 
            <div class="add-form" >
            <h3>Update Project</h3><hr>
                <form name="insertrecord" method="post" id="fileForm" role="form">

                    <div class="form-group">   
                        <label for="title"><span class="req"></span>Project Title: </label>
                        <input type="text" name="title" value="<?php echo htmlentities($result->title);?>" class="form-control" required>
                    </div>

                    <div class="form-group">   
                        <label for="Date"><span class="req"></span> Date: </label>
                        <input type="date" name="date" value="<?php echo htmlentities($result->date_of_project);?>" class="form-control" required>
                    </div>

                    <div class="form-group">   
                        <label for="Weblink"><span class="req"></span> Weblink: </label>
                        <input type="url" name="weblink" value="<?php echo htmlentities($result->weblink);?>" class="form-control" placeholder="http://" >
                    </div>

                    <div class="form-group">   
                        <label for="Description"><span class="req">Description</span> </label>
                        <textarea class="form-control" name="description" required><?php echo htmlentities($result->description);?></textarea>
                    </div>

                    <div class="form-group">   
                        <label for="title"><span class="req"></span>Budget: </label>
                        <input name="budget" value="<?php echo htmlentities($result->budget);?>" class="form-control" placeholder="in ₹" required>
                    </div>
                    
                    <div class="form-group">
                        <hr>
                        <input class="btn btn-success" type="submit" name="update" value="Update">
                    </div>
                </form>
            <hr>
        </div>




        
        <?php }} ?>
        </div>
 </div>
<?php include "../components/footer.html"; ?>
</body>
</html>



