<?php  
    include 'config.php';

    // data submit start (index.php)---------------------
    $stu_name = $_POST['sname'];
    $stu_address = $_POST['saddress'];
    $stu_class = $_POST['sclass'];
    $stu_phone = $_POST['sphone'];
    $saveData = "INSERT INTO student(sname,saddress,sclass,sphone) VALUES ('{$stu_name}','{$stu_address}','{$stu_class}','{$stu_phone}')";
    $saveDataQuery = mysqli_query($conn,$saveData);
    header('Location:index.php');
    // data submit end (index.php)---------------------

    mysql_close($conn);
?>