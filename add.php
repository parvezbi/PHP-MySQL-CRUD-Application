<?php 
    include 'header.php'; 
    include 'config.php';
?>
<div id="main-content">
    <h2>Add New Record</h2>
    <form class="post-form" action="savedata.php" method="post">
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="sname" />
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" name="saddress" />
        </div>
        <div class="form-group">
            <label>Class</label>
            <select name="sclass">
                <option value="" selected disabled>Select Class</option>
                <?php 
                    $selectbQuery = "SELECT * FROM studentclass";
                    $selectbResult = mysqli_query($conn,$selectbQuery) or die("Query Not Found.");
                    if (mysqli_num_rows($selectbResult)>0) {
                        while ($class = mysqli_fetch_assoc($selectbResult)) { ?>
                            <option value="<?php echo $class['cid']; ?>"><?php echo $class['cname']; ?></option>
                        <?php }
                    }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="sphone" />
        </div>
        <input class="submit" type="submit" value="Save"  />
    </form>
</div>
</div>
</body>
</html>
