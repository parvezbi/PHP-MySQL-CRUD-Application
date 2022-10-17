<?php 
    include 'header.php'; 
    include 'config.php';
?>
<div id="main-content">
    <h2>Edit Record</h2>
    <form class="post-form" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="form-group">
            <label>Id</label>
            <input type="text" name="sid"/>
        </div>
        <input class="submit" type="submit" name="showbtn" value="Show" />
    </form>
    <?php 
        if (isset($_POST['showbtn'])) {
            $stu_id = $_POST['sid'];
            $readForUpdate = "SELECT * FROM student WHERE sid = '{$stu_id}'";
            $readForUpdateResult = mysqli_query($conn, $readForUpdate);
            if (mysqli_num_rows($readForUpdateResult)>0) {
                while ($readUp = mysqli_fetch_assoc($readForUpdateResult)) { ?>
                    <form class="post-form" action="updatedata.php" method="post">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="hidden" name="sid"  value="<?php echo $readUp['sid']; ?>" />
                            <input type="text" name="sname" value="<?php echo $readUp['sname']; ?>" />
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="saddress" value="<?php echo $readUp['saddress']; ?>" />
                        </div>
                        <div class="form-group">
                        <label>Class</label>
                        <select name="sclass">
                            <?php 
                                $selectbQuery = "SELECT * FROM studentclass";
                                $selectbQueryResult = mysqli_query($conn,$selectbQuery);
                                if (mysqli_num_rows($selectbQueryResult)>0) {
                                    while ($class = mysqli_fetch_assoc($selectbQueryResult)) {
                                        if ($readUp['sclass'] == $class['cid']) { ?>
                                            <option selected value="<?php echo $class['cid']; ?>"><?php echo $class['cname']; ?></option>
                                        <?php }else{ ?>
                                            <option value="<?php echo $class['cid']; ?>"><?php echo $class['cname']; ?></option>
                                        <?php }
                                    }
                                }
                            ?>
                        </select>
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" name="sphone" value="<?php echo $readUp['sphone']; ?>" />
                        </div>
                    <input class="submit" type="submit" value="Update"  />
                    </form>
                <?php }
            }
        }
    ?>
</div>
</div>
</body>
</html>
