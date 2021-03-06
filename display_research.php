
<?php
require('components/connection.php');
if(isset($_POST['clear']))
{
$sql = "SELECT user.name as researcher,user.category,user.department,title,YEAR(date_of_research) as Year,weblink,description from research INNER JOIN user ON user.user_id = research.user_id";
// Prepare the query:
$query = $con->prepare($sql);
//Execute the query:
$query->execute();
//Assign the data which you pulled from the database (in the preceding step) to a variable.
$results=$query->fetchAll(PDO::FETCH_OBJ);
}

else if(isset($_POST['submit']))
{
  $category=$_POST['category'];
  $department=$_POST['department'];
  $year=$_POST['year'];

  if($category=='none' || $department == 'none' || $year == 'none')
  {
    $sql = "SELECT user.name as researcher,user.category,user.department,title,YEAR(date_of_research) as Year,weblink,description from research INNER JOIN user ON user.user_id = research.user_id";
// Prepare the query:
$query = $con->prepare($sql);
//Execute the query:
$query->execute();
//Assign the data which you pulled from the database (in the preceding step) to a variable.
$results=$query->fetchAll(PDO::FETCH_OBJ);

  }
  else
  {
    
  $sql = "SELECT user.name as researcher,user.category,user.department,title,YEAR(date_of_research) as Year,weblink,description from research INNER JOIN user ON user.user_id = research.user_id where user.category=".':category'." and user.department=".':department'." and YEAR(date_of_research)=".':year';
//Prepare the query:
$query = $con->prepare($sql);

$query->bindParam('category', $category, PDO::PARAM_STR);
$query->bindParam('department', $department, PDO::PARAM_STR);
$query->bindParam('year', $year, PDO::PARAM_STR);
//Execute the query:
$query->execute();
//Assign the data which you pulled from the database (in the preceding step) to a variable.
$results=$query->fetchAll(PDO::FETCH_OBJ);

  }



}

else
{
  
    $sql = "SELECT user.name as researcher,user.category,user.department,title,YEAR(date_of_research) as Year,weblink,description from research INNER JOIN user ON user.user_id = research.user_id";
    // Prepare the query:
    $query = $con->prepare($sql);
    //Execute the query:
    $query->execute();
    //Assign the data which you pulled from the database (in the preceding step) to a variable.
    $results=$query->fetchAll(PDO::FETCH_OBJ);
}

?>






<!DOCTYPE html>
<html lang="en">
<head>
  <title>Research</title>
 <!-- Required meta tags -->
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- css -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/tableDisplay.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
     <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">
    <!-- favicon link -->
    <link rel = "icon" href = "img/favicon.png" type = "image/x-icon">
</head>



<body>

      <!-- navigation bar -->
<?php include "components/header.php" ?>

             <div class="search">

                          <form name="display_research.php" method="post" id="fileForm" role="form" class="row gy-2 gx-3 align-items-center">

                                    <div class="col-md-3 col-md-offset-2">
                                    <label class="visually-hidden" for="category">Preference</label>
                                    <select name="category" class="form-select" id="category">
                                      <option selected value="none">Category</option>
                                      <option value="student">Student</option>
                                      <option value="faculty">Faculty</option>
                                      <option value="alumni">Alumni</option>
                                    </select>
                                  </div>

                                  <div class="col-md-3 col-md-offset-2">
                                    <label class="visually-hidden" for="department">Preference</label>
                                    <select name="department" class="form-select" id="department">
                                      <option selected value="none">Department</option>
                                      <option value="SWCE">Soil & Water Conservation Engg.</option>
                                      <option value="IDE">Irrigation and Drainage Engg.</option>
                                      <option value="FMPE">Farm Machinery and Power Engg.</option>
                                      <option value="PHPFE">Post-Harvest Process & Food Engg.</option>
                                      <option value="EE">Electrical Engineering</option>
                                      <option value="IT">Information Technology</option>
                                      <option value="ECE">Electronics and Communication Engg.</option>
                                      <option value="IPE">Industrial & Production Engg.</option>
                                      <option value="CE">Civil Engineering</option>
                                      <option value="CSE">Computer Engineering</option>
                                      <option value="ME">Mechanical Engineering</option>
                                    </select>
                                  </div>

                                  <div class="col-md-3 col-md-offset-2">
                                    <label class="visually-hidden" for="year">Preference</label>
                                    <select name="year" class="form-select" id="year">
                                      <option selected value="none">Year</option>
                                      <option value="2021">2021</option>
                                      <option value="2020">2020</option>
                                      <option value="2019">2019</option>
                                      <option value="2018">2018</option>
                                      <option value="2017">2017</option>
                                      <option value="2016">2016</option>
                                      <option value="2015">2015</option>
                                      <option value="2014">2014</option>
                                      <option value="2013">2013</option>
                                      <option value="2012">2012</option>
                                      <option value="2011">2011</option>
                                    </select>                                   
                                  </div>

                                  <div class="col-md-3 col-md-offset-2">
                                  <input class="btn btn-success" type="submit" name="submit" value="Search">
                                  <input class="btn btn-success" type="submit" name="clear" value="Clear">
                                  </div>

                            </form>
            </div><br><hr><br>

<div class="container">
  <div  class= "home_display">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3><b>Research</b></h3> <hr />
                <div class="table-responsive"><br>               
                <table id="mytable" class="table table-bordred table-striped">                 
                    <thead>
                        <th>#</th>
                        <th>Researcher</th>
                        <th>Category</th>
                        <th>Department</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Year</th>
                        <th>Weblink</th>
                    </thead>

                    <tbody>
    
                <?php 
                $cnt=1;

                if($query->rowCount() > 0)
                {
                //In case that the query returned at least one record, we can echo the records within a foreach loop:
                foreach($results as $result)
                {               
                ?>  
                <tr>
                    <td><?php echo htmlentities($cnt);?></td>
                    <td><?php echo htmlentities($result->researcher);?></td>
                    <td><?php echo htmlentities($result->category);?></td>
                    <td><?php echo htmlentities($result->department);?></td>
                    <td><?php echo htmlentities($result->title);?></td>
                    <td><?php echo htmlentities($result->description);?></td>
                    <td><?php echo htmlentities($result->Year);?></td>
                    <td><a target="_blank" href="<?php echo htmlentities($result->weblink);?>">Go</a></td>
                </tr>
                <?php    $cnt++;
                }}

                else{
                  echo "No record found!"; }
              ?>


                </tbody>     
            </table>
            
            </div>
            
            </div>
        </div>
    </div>
</div>
</div>
  <?php include 'components/footer.html'; ?>  
</body>
</html>