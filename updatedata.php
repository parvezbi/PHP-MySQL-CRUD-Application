<?php  
    include 'config.php';

    // data update start (end.php)---------------------
    $stu_id = $_POST['sid'];
    $stu_name = $_POST['sname'];
    $stu_address = $_POST['saddress'];
    $stu_class = $_POST['sclass'];
    $stu_phone = $_POST['sphone'];
    $updateData = "UPDATE student SET sname = '{$stu_name}', saddress = '{$stu_address}', sclass = '{$stu_class}', sphone = '{$stu_phone}' WHERE sid = '{$stu_id}'";
    $updateDataQuery = mysqli_query($conn,$updateData);
    header('Location:index.php');
    // data update end (end.php)---------------------

    mysql_close($conn);
?>