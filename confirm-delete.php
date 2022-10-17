<?php 
  include 'header.php'; 
  include 'config.php';
?>
<div id="main-content">
    <h2>Are You Confirm Deleting This Record?</h2>
    <?php
      $stu_id = $_GET['id'];
      $readForUpdateQuery = "SELECT * FROM student WHERE sid = '{$stu_id}'";
      $readForUpdateQueryResult = mysqli_query($conn,$readForUpdateQuery) or die("Query Failed");
      if (mysqli_num_rows($readForUpdateQueryResult)>0) {
        while ($readUp = mysqli_fetch_assoc($readForUpdateQueryResult)) { ?>
          <form class="post-form" action="delete-inline.php" method="post">
            <div class="form-group">
                <label>Name</label>
                <input type="hidden" name="sid" value="<?php echo $readUp['sid']; ?>"/>
                <input type="text" name="sname" disabled value="<?php echo $readUp['sname']; ?>"/>
            </div>
            <div class="form-group">
                <label>Address</label>
                <input type="text" name="saddress" disabled value="<?php echo $readUp['saddress']; ?>"/>
            </div>
            <div class="form-group">
                <label>Class</label>
                <select disabled name="sclass">
                  <?php
                    $selectbQuery = "SELECT * FROM studentclass";
                    $selectbResult = mysqli_query($conn,$selectbQuery) or die("Query Not Found.");
                    if (mysqli_num_rows($selectbResult)>0) {
                      while ($class = mysqli_fetch_assoc($selectbResult)) { 
                          if($readUp['sclass'] == $class['cid']){ ?>
                            <option selected value="<?php echo $class['cid']; ?>"><?php echo $class['cname']; ?></option>
                          <?php }
                          else{ ?>
                            <option value="<?php echo $class['cid']; ?>"><?php echo $class['cname']; ?></option>
                          <?php }
                        }
                      }
                  ?>
                </select>
            </div>
            <div class="form-group">
                <label>Phone</label>
                <input type="text" name="sphone" disabled value="<?php echo $readUp['sphone']; ?>"/>
            </div>
            <input class="submit" type="submit" value="Delete"/>
          </form>

        <?php }
      }
    ?>
</div>
</div>
</body>
</html>
