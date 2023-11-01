<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>Form</title>
</head>

<body>
  <?php
  include('conn.php');
  $sql = "select loginid from login_master where status='logged in'";
  $query = mysqli_query($con, $sql);
  $row = mysqli_fetch_array($query);
  $loginid = $row['loginid'];

  $sql = "select * from user_master where loginid = $loginid";
  $query = mysqli_query($con, $sql);
  $row = mysqli_fetch_array($query);
  $name = $row['name'];
  $rak = $row['rak'];
  $userid = $row['userid'];
  $grp = $row['grp'];
  $hod_name = $row['hod_name'];
  $desig = $row['desig'];

  $dat = $_POST['dat'];
  $sql = "select * from report_master where dat='$dat' and userid=$userid";
  $query = mysqli_query($con, $sql);
  $row = mysqli_fetch_array($query);
  if (empty($row)) {
    echo "<script>alert('Something Went Wrong. Please try again');</script>";
    echo "<script> document.location.href='report_delete.php';</script>";
  }
  $reportid = $row['reportid'];
  $d1 = $row['D1'];
  $d2 = $row['D2'];
  $d3 = $row['D3'];
  $d4 = $row['D4'];
  $d5 = $row['D5'];
  $d6 = $row['D6'];
  $d7 = $row['D7'];
  $d8 = $row['D8'];
  $cnt = $row['cnt'];
  $r1 = $row['R1'];
  $r2 = $row['R2'];
  $r3 = $row['R3'];
  $r4 = $row['R4'];
  $r5 = $row['R5'];
  $r6 = $row['R6'];
  $r7 = $row['R7'];
  $r81 = $row['R81'];
  $r82 = $row['R82'];
  $r83 = $row['R83'];
  $r84 = $row['R84'];
  $r85 = $row['R85'];
  $r86 = $row['R86'];
  $r87 = $row['R87'];
  $r88 = $row['R88'];
  ?>
  <div class="container my-5">
    <h4 class="text-center">CONFIRM USER DETAILS</h4>
    <form method="POST" action="">
      <div class="d-flex m-sm-auto justify-content-center">
        <div class="p-3">
          Name :
          <?php echo $name ?>
          <br>
          Rank :
          <?php echo $rak ?>
          <br>
          Group :
          <?php echo $grp ?>
        </div>
        <div class="p-3">
          HOD/OIC Name :
          <?php echo $hod_name ?>
          <br>
          HOD/OIC Designation :
          <?php echo $desig ?>
          <br>
          Date:
          <?php echo $dat ?>
        </div>
        <input type="text" name="reportid" value="<?php echo $reportid ?>" class="d-none">
        <input type="text" name="userid" value="<?php echo $userid ?>" class="d-none">
        <input type="text" name="name" value="<?php echo $name ?>" class="d-none">
        <input type="text" name="rak" value="<?php echo $rak ?>" class="d-none">
        <input type="text" name="grp" value="<?php echo $grp ?>" class="d-none">
        <input type="text" name="hod_name" value="<?php echo $hod_name ?>" class="d-none">
        <input type="text" name="desig" value="<?php echo $desig ?>" class="d-none">
        <input type="text" name="dat" value="<?php echo $dat ?>" class="d-none">
        <input type="text" name="d1" value="<?php echo $d1 ?>" class="d-none">
        <input type="text" name="d2" value="<?php echo $d2 ?>" class="d-none">
        <input type="text" name="d3" value="<?php echo $d3 ?>" class="d-none">
        <input type="text" name="d4" value="<?php echo $d4 ?>" class="d-none">
        <input type="text" name="d5" value="<?php echo $d5 ?>" class="d-none">
        <input type="text" name="d6" value="<?php echo $d6 ?>" class="d-none">
        <input type="text" name="d7" value="<?php echo $d7 ?>" class="d-none">
        <input type="text" name="d8" value="<?php echo $d8 ?>" class="d-none">
        <input type="text" name="cnt" value="<?php echo $cnt ?>" class="d-none">
        <input type="text" name="r1" value="<?php echo $r1 ?>" class="d-none">
        <input type="text" name="r2" value="<?php echo $r2 ?>" class="d-none">
        <input type="text" name="r3" value="<?php echo $r3 ?>" class="d-none">
        <input type="text" name="r4" value="<?php echo $r4 ?>" class="d-none">
        <input type="text" name="r5" value="<?php echo $r5 ?>" class="d-none">
        <input type="text" name="r6" value="<?php echo $r6 ?>" class="d-none">
        <input type="text" name="r7" value="<?php echo $r7 ?>" class="d-none">
        <input type="text" name="r81" value="<?php echo $r81 ?>" class="d-none">
        <input type="text" name="r82" value="<?php echo $r82 ?>" class="d-none">
        <input type="text" name="r83" value="<?php echo $r83 ?>" class="d-none">
        <input type="text" name="r84" value="<?php echo $r84 ?>" class="d-none">
        <input type="text" name="r85" value="<?php echo $r85 ?>" class="d-none">
        <input type="text" name="r86" value="<?php echo $r86 ?>" class="d-none">
        <input type="text" name="r87" value="<?php echo $r87 ?>" class="d-none">
        <input type="text" name="r88" value="<?php echo $r88 ?>" class="d-none">
      </div>
      <h3 class="my-5 text-center">DELETE REPORT</h3>
      <div class="m-auto">
        <table class="table table-striped table-hover">
          <tr class="text-center">
            <th>SNo.</th>
            <th>Topic</th>
            <th>Option</th>
            <th>Remarks</th>
          </tr>
          <tr class="text-center">
            <td>1.</td>
            <td>Control 1</td>
            <td>
              <?php echo $d1 ?>
            </td>
            <td>
              <?php echo $r1 ?>
            </td>
          </tr>
          <tr class="text-center">
            <td>2.</td>
            <td>Control 2</td>
            <td>
              <?php echo $d2 ?>
            </td>
            <td>
              <?php echo $r2 ?>
            </td>
          </tr>
          <tr class="text-center">
            <td>3.</td>
            <td>Control 3</td>
            <td>
              <?php echo $d3 ?>
            </td>
            <td>
              <?php echo $r3 ?>
            </td>
          </tr>
          <tr class="text-center">
            <td>4.</td>
            <td>Control 4</td>
            <td>
              <?php echo $d4 ?>
            </td>
            <td>
              <?php echo $r4 ?>
            </td>
          </tr>
          <tr class="text-center">
            <td>5.</td>
            <td>Control 5</td>
            <td>
              <?php echo $d5 ?>
            </td>
            <td>
              <?php echo $r5 ?>
            </td>
          </tr>
          <tr class="text-center">
            <td>6.</td>
            <td>Control 6</td>
            <td>
              <?php echo $d6 ?>
            </td>
            <td>
              <?php echo $r6 ?>
            </td>
          </tr>
          <tr class="text-center">
            <td>7.</td>
            <td>Control 7</td>
            <td>
              <?php echo $d7 ?>
            </td>
            <td>
              <?php echo $r7 ?>
            </td>
          </tr>
          <tr class="text-center">
            <td>8.</td>
            <td>Control 8</td>
            <td>
              <?php echo $d8 ?><br>
              <?php echo $cnt ?>
            </td>
            <td>
              <?php echo $r81 ?>
              <br>
              <?php
              if ($d8 == "Yes") {
                if ($cnt >= 2) {
                  echo $r82; ?>
                  <br>
                  <?php
                }
                if ($cnt >= 3) {
                  echo $r83; ?>
                  <br>
                  <?php
                }
                if ($cnt >= 4) {
                  echo $r84; ?>
                  <br>
                  <?php
                }
                if ($cnt >= 5) {
                  echo $r85; ?>
                  <br>
                  <?php
                }
                if ($cnt >= 6) {
                  echo $r86; ?>
                  <br>
                  <?php
                }
                if ($cnt >= 7) {
                  echo $r87; ?>
                  <br>
                  <?php
                }
                if ($cnt >= 8) {
                  echo $r88; ?>
                  <br>
                  <?php
                }
              }
              ?>
            </td>
          </tr>
        </table>
      </div>
      <button type="submit" name="submit" class="btn btn-success">
        Delete Report
      </button>
      <a class="btn btn-primary" href="report_delete.php">
        Back
      </a>
      <br><br>
    </form>
  </div>
  <?php
  if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $rak = $_POST['rak'];
    $dat = $_POST['dat'];
    $sql = "select * from user_master where name='$name' and rak='$rak'";
    $query = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($query);
    $userid = $row['userid'];
    $sql = "delete from report_master where userid = $userid and dat='$dat'";
    $query = mysqli_query($con, $sql);
    if ($query) {
      echo "<script>alert('You have successfully deleted the data');</script>";
      echo "<script> document.location.href='report.php';</script>";
    } else {
      echo "<script>alert('Something Went Wrong. Please try again');</script>";
    }
  }
  mysqli_close($con);
  ?>
</body>

</html>