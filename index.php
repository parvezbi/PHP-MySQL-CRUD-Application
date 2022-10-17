<?php 
    include 'header.php'; 
    include 'config.php';
?>
<div id="main-content">
    <h2>All Records</h2>
    <table cellpadding="7px">
        <thead>
            <th>Id</th>
            <th>Name</th>
            <th>Address</th>
            <th>Class</th>
            <th>Phone</th>
            <th>Action</th>
        </thead>
        <tbody>
            <?php
                $seclectSql = "SELECT * FROM student JOIN studentclass WHERE student.sclass = studentclass.cid ORDER BY  sid  ASC";
                $selectResult = mysqli_query($conn,$seclectSql) or die("Select Query Unsuccesful.");
                if (mysqli_num_rows($selectResult)>0) {
                    while ( $student = mysqli_fetch_assoc($selectResult)) { ?>
                    <tr>
                        <td><?php echo $student['sid']; ?></td>
                        <td><?php echo $student['sname']; ?></td>
                        <td><?php echo $student['saddress']; ?></td>
                        <td><?php echo $student['cname']; ?></td>
                        <td><?php echo $student['sphone']; ?></td>
                        <td>
                            <a href='edit.php?id=<?php echo $student["sid"]; ?>'>Edit</a>
                            <a href='confirm-delete.php?id=<?php echo $student["sid"]; ?>'>Delete</a>
                        </td>
                    </tr>
                    <?php }
                } else{
                    echo "<p>No Data Found!<p>";
                }
                mysqli_close($conn);
            ?>
        </tbody>
    </table>
</div>
</div>
</body>
</html>
