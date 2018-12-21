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

                    <h3>Register Cousre</h3>

                    <form action="" method="POST">


                        <div class="form-group">
                            <label for="sname">Course name</label>
                            <input type="text" class="form-control" id="" name="cname" placeholder="eg.Bachelor in Information Technology">
                        </div>

                        <div class="form-group">
                            <label for="reg">Fee to be paid</label>
                            <input type="number" placeholder="" class="form-control" id="email" name="fee">
                        </div>
                     
                        

                        <div class="form-group">
                            <label for="">Lec name</label>
                            <input type="text" class="form-control" name="lname">
                        </div>
                        <button type="submit" name="submit" class="btn btn-default">Submit</button>

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

    $cname=$_POST['cname'];
    $fee=$_POST['fee'];
    $lecname=$_POST['lname'];

    $check="SELECT *FROM Course WHERE Course_name = '$cname'";
    $checkq=mysqli_query($conn,$check);

    if(mysqli_num_rows($checkq)){
        echo '
    
        <script>
    alert("Duplicate courses detected")
    
        </script>
        ';

        exit();
    }

    $sql = "INSERT INTO Course
VALUES (DEFAULT, '$cname', '$fee','$lecname',NOW())";

if (mysqli_query($conn, $sql)) {
       echo '
    
    <script>
alert("Course has been registered to the system")

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