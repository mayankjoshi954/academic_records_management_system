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
$research_id=intval($_GET['r_id']);
// Posted Values  
$title=$_POST['title'];
$date=$_POST['date'];
$weblink=$_POST['weblink'];
$description=$_POST['description'];

// Query for Query for Updation
$sql="update research set title=:title,date_of_research=:date,weblink=:weblink,description=:description where research_id=$research_id";
//Prepare Query for Execution
$query = $con->prepare($sql);
// Bind the parameters
$query->bindParam(':title',$title,PDO::PARAM_STR);
$query->bindParam(':date',$date,PDO::PARAM_STR);
$query->bindParam(':weblink',$weblink,PDO::PARAM_STR);
$query->bindParam(':description',$description,PDO::PARAM_STR);
// Query Execution
$query->execute();
// Mesage after updation
echo "<script>alert('Record successfully updated!');</script>";
// Code for redirection
echo "<script>window.location.href='research_index.php'</script>"; 
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Research</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
 
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
        <?php 
        // Get the project_id
        $research_id=intval($_GET['r_id']);
        $sql = "SELECT * from research where research_id=$research_id";
        //Prepare the query:
        $query = $con->prepare($sql);

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


            <div class="add-form" >
            <div class="container"> 
            
            <h3>Update Research</h3><hr>
                <form name="insertrecord" method="post" id="fileForm" role="form">

                    <div class="form-group">   
                        <label for="title"><span class="req"></span>Project Title: </label>
                        <input type="text" name="title" value="<?php echo htmlentities($result->title);?>" class="form-control" required>
                    </div>

                    <div class="form-group">   
                        <label for="Date"><span class="req"></span> Date: </label>
                        <input type="date" name="date" value="<?php echo htmlentities($result->date_of_research);?>" class="form-control" required>
                    </div>

                    <div class="form-group">   
                        <label for="Weblink"><span class="req"></span> Weblink: </label>
                        <input type="url" name="weblink" value="<?php echo htmlentities($result->weblink);?>" class="form-control"placeholder="http://" >
                    </div>

                    <div class="form-group">   
                        <label for="Description"><span class="req">Description</span> </label>
                        <textarea class="form-control" name="description" required><?php echo htmlentities($result->description);?></textarea>
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



