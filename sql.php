<?php
require('db.php');


// sql to create table
$sql = "CREATE TABLE Student (
    id INT(6) AUTO_INCREMENT PRIMARY KEY, 
    Student_Reg VARCHAR(100), 
    fullname VARCHAR(30) NOT NULL,
    gender VARCHAR(30) NOT NULL,
    DOB VARCHAR(50),
    Course_id INT(6),
    reg_date TIMESTAMP,
    FOREIGN KEY (Course_id) REFERENCES Course(Course_id)

    )";
    
    if (mysqli_query($conn, $sql)) {
        echo "Table Students created successfully";
    } else {
        echo "Error creating table: " . mysqli_error($conn);
    }


//     // sql to create table
// $sql2 = "CREATE TABLE Fee (
//     id INT(6) id AUTO_INCREMENT PRIMARY KEY, 
//     Student_Reg TEXT,
//     Fee_paid VARCHAR(30) NOT NULL,
//     pay_date TIMESTAMP,
//     FOREIGN KEY (Student_Reg) REFERENCES Student(Student_Reg)
//     )";
    
//     if (mysqli_query($conn, $sql2)) {
//         echo "Table Fee created successfully";
//     } else {
//         echo "Error creating table: " . mysqli_error($conn);
//     }

//     $sql2 = "CREATE TABLE Lecturer (
//         Lec_id INT(6) id AUTO_INCREMENT PRIMARY KEY, 
//         Fee_paid VARCHAR(30) NOT NULL,
//         pay_date TIMESTAMP,
//         FOREIGN KEY (Student_Reg) REFERENCES Student(Student_Reg)
//         )";
        
//         if (mysqli_query($conn, $sql2)) {
//             echo "Table Fee created successfully";
//         } else {
//             echo "Error creating table: " . mysqli_error($conn);
//         }
    



    $sql3 = "CREATE TABLE Course (
        Course_id INT(6) AUTO_INCREMENT PRIMARY KEY, 
        Course_name TEXT,
        Fee_to_paid INT(6),
        Lec_name TEXT,
        date_created TIMESTAMP
        )";
        
        if (mysqli_query($conn, $sql3)) {
            echo "Table Course created successfully";
        } else {
            echo "Error creating table: " . mysqli_error($conn);
        }
    

?>