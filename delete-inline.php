<?php  
    include 'config.php';

    // data update start (end.php)---------------------
    $stu_id = $_POST['sid'];
    $deleteData = "DELETE FROM student WHERE sid = {$stu_id}";
    $deleteDataQuery = mysqli_query($conn,$deleteData);
    header('Location:index.php');
    // data update end (end.php)---------------------

    mysqli_close($conn);
?>