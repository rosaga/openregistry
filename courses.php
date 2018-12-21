<?php
require('database/db.php');

error_reporting(0);
?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Register</title>
</head>

<body>

    <?php
include('nav.php')

?>

    <div class="container-fluid">
        <div class="row">

            <div class="col-sm-12">



                <div class="col-sm-2"></div>
                <div class="col-sm-8">

                    <h3>Search course here</h3>

                    <form action="" method="POST">


                        <div class="form-group">
                            <label for="sname">Search course</label>
                            <input type="text" class="form-control" id="" name="course" placeholder="Search...">
                        </div>

                        <button type="submit" name="submit" class="btn btn-default">Search</button>

                    </form>
                    <table class='table' style='background:grey'>
            <thead>
              <tr>
                <th>CID</th>
                <th>Cname</th>
                <th>Cfee</th>
                <th>Lec name</th>
                <th>Date</th>
              </tr>
            </thead>
            <tbody>
                    <?php

                   if(isset($_POST['submit'])){
                      
                    $searchname=$_POST['course'];

                    $search="SELECT *FROM `Course` WHERE Course_name LIKE '%$searchname%'";
                    $searchq=mysqli_query($conn,$search);
                    if(mysqli_num_rows($searchq)>0){
                        echo "<h3>Nice!!!Results found...</h3>";

                        while($row=mysqli_fetch_array($searchq)){
                            $cid=$row[0];
                            $cname=$row[1];
                            $fee=$row[2];
                            $lname=$row[3];
                            $date=$row[4];
        
                            echo "
                 
              <tr>
                <td>$cid</td>
                <td>$cname</td>
                <td>$fee</td>
                <td>$lname</td>
                <td>$date</td>
                
              </tr>
             
            
                            
                            ";
                        }
                        
                    }

                    else{
                        echo "<h3>Results not found</h4>";
                    }
                   }



?>

</tbody>
          </table>
                </div>
                <div class="col-sm-2"></div>
            </div>

            <div class="col-sm-12">
                <div class="col-sm-2"></div>
                <div class="col-sm-8">
<h1>All courses</h1>

<table class='table'>
    <thead>
      <tr>
        <th>CID</th>
        <th>Cname</th>
        <th>Cfee</th>
        <th>Lec name</th>
        <th>Date</th>
      </tr>
    </thead>
    <tbody>
                <?php

                $all="SELECT *FROM `Course`";
                $allq=mysqli_query($conn,$all);

                while($row=mysqli_fetch_array($allq)){
                    $cid=$row[0];
                    $cname=$row[1];
                    $fee=$row[2];
                    $lname=$row[3];
                    $date=$row[4];

                    echo "
                   
      <tr>
        <td>$cid</td>
        <td>$cname</td>
        <td>$fee</td>
        <td>$lname</td>
        <td>$date</td>
        
      </tr>
     
    
                    
                    ";
                }



?>

</tbody>
  </table>
                </div>
                <div class="col-sm-2"></div>
            </div>
        </div>
    </div>
</body>

</html>


