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

                    <h3>Register Student</h3>

                    <form action="" method="POST">


                        <div class="form-group">
                            <label for="sname">Student name</label>
                            <input type="text" class="form-control" id="" name="sname" placeholder="eg.John doe">
                        </div>

                        <div class="form-group">
                            <label for="reg">Student Reg_number</label>
                            <input type="text" placeholder="JKC-B01-0395/2018" class="form-control" id="email" name="sreg">
                        </div>
                        <div class="form-group">
                            <label for="sel1">Gender:</label>
                            <select class="form-control" id="sel1" name="sgender">
                                <option>Male</option>
                                <option>Female</option>
                               
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="date">DOB</label>
                            <input type="date" class="form-control" name="sdob">
                        </div>

                        
                     

                        
                        <div class="form-group">

                            <label for="sel1">Course:</label>
                            <select class="form-control" id="sel1" name="scourse">
                            <?php
                               require('./database/db.php');


                            $csql="SELECT *FROM `Course`";
                            $csqlq=mysqli_query($conn,$csql);
                            while($row=mysqli_fetch_array($csqlq)){
                                $cname=$row['Course_name'];
                                $cid=$row['Course_id'];
                                $cfee=$row['Fee_to_paid'];

                                echo "
                                <option value='$cid'>$cname</option>
                            
                                ";
                            }

                            ?>
                                
                               
                            </select>
                        </div>
                        <button type="submit" name="submit" class="btn btn-default">Register</button>

                    </form>
                </div>
                <div class="col-sm-2"></div>
            </div>
        </div>
    </div>
</body>

</html>



<?php
if(isset($_POST['submit'])){

    require('./database/db.php');

    $sname=$_POST['sname'];
    $sreg=$_POST['sreg'];
    $sgender=$_POST['sgender'];
    $sdob=$_POST['sdob'];
    $scourse=$_POST['scourse'];

    $check="SELECT *FROM Student WHERE Student_reg = '$sreg'";
    $checkq=mysqli_query($conn,$check);

    if(mysqli_num_rows($checkq)){
        echo '
    
        <script>
    alert("Duplicate student detected")
    
        </script>
        ';

        exit();
    }

    $sql = "INSERT INTO Student
VALUES (DEFAULT, '$sreg', '$sname','$sgender','$sdob',$scourse,NOW())";

if (mysqli_query($conn, $sql)) {
       echo '
    
    <script>
alert("Student has been registered to the system")

    </script>
    ';
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

//     echo '
    
//     <script>
// alert("Button clicked")

//     </script>
//     ';
}



?>