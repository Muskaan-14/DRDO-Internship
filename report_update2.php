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
  $month = substr($dat, 6, 2);
  $year = substr($dat, 1, 4);
  $sql = "select * from report_master where dat='$dat' and userid=$userid";
  $query = mysqli_query($con, $sql);
  $row = mysqli_fetch_array($query);
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
        </div>
        <input type="text" name="userid" value="<?php echo $userid ?>" class="d-none">
        <input type="text" name="reportid" value="<?php echo $reportid ?>" class="d-none">
        <input type="text" name="name" value="<?php echo $name ?>" class="d-none">
        <input type="text" name="month" value="<?php echo $month ?>" class="d-none">
      </div>
      <h3 class="my-4 text-center">UPDATE REPORT</h3>
      <div class="m-auto">
        <div class="text-center">
          Date:
          <input type="date" name="dat" value="<?php echo $dat ?>">
        </div>
        <br><br>
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
              <select name="d1" id="" value="<?php echo $d1 ?>">
                <?php
                if ($d1 == 'Yes') {
                  echo "<option value='Yes' selected> Yes </option>";
                  echo "<option value='No'> No </option>";
                } else {
                  echo "<option value='Yes'> Yes </option>";
                  echo "<option value='No' selected> No </option>";
                }
                ?>
              </select>
            </td>
            <td>
              <textarea name="r1" id="" value="<?php echo $r1; ?>" cols="40"><?php echo $r1 ?></textarea>
            </td>
          </tr>
          <tr class="text-center">
            <td>2.</td>
            <td>Control 2</td>
            <td>
              <select name="d2" id="">
                <?php
                if ($d2 == 'Yes') {
                  echo "<option value='Yes' selected> Yes </option>";
                  echo "<option value='No'> No </option>";
                } else {
                  echo "<option value='Yes'> Yes </option>";
                  echo "<option value='No' selected> No </option>";
                }
                ?>
              </select>
            </td>
            <td>
              <textarea name="r2" id="" cols="40" value="<?php echo $r2 ?>"><?php echo $r2 ?></textarea>
            </td>
          </tr>
          <tr class="text-center">
            <td>3.</td>
            <td>Control 3</td>
            <td>
              <select name="d3" id="">
                <?php
                if ($d3 == 'Yes') {
                  echo "<option value='Yes' selected> Yes </option>";
                  echo "<option value='No'> No </option>";
                } else {
                  echo "<option value='Yes'> Yes </option>";
                  echo "<option value='No' selected> No </option>";
                }
                ?>
              </select>
            </td>
            <td>
              <textarea name="r3" id="" cols="40" value="<?php echo $r3 ?>"><?php echo $r3 ?></textarea>
            </td>
          </tr>
          <tr class="text-center">
            <td>4.</td>
            <td>Control 4</td>
            <td>
              <select name="d4" id="">
                <?php
                if ($d4 == 'Yes') {
                  echo "<option value='Yes' selected> Yes </option>";
                  echo "<option value='No'> No </option>";
                } else {
                  echo "<option value='Yes'> Yes </option>";
                  echo "<option value='No' selected> No </option>";
                }
                ?>
              </select>
            </td>
            <td>
              <textarea name="r4" id="" cols="40" value="<?php echo $r4 ?>"><?php echo $r4 ?></textarea>
            </td>
          </tr>
          <tr class="text-center">
            <td>5.</td>
            <td>Control 5</td>
            <td>
              <select name="d5" id="">
                <?php
                if ($d5 == 'Yes') {
                  echo "<option value='Yes' selected> Yes </option>";
                  echo "<option value='No'> No </option>";
                } else {
                  echo "<option value='Yes'> Yes </option>";
                  echo "<option value='No' selected> No </option>";
                }
                ?>
              </select>
            </td>
            <td>
              <textarea name="r5" id="" cols="40" value="<?php echo $r5 ?>"><?php echo $r5 ?></textarea>
            </td>
          </tr>
          <tr class="text-center">
            <td>6.</td>
            <td>Control 6</td>
            <td>
              <select name="d6" id="">
                <?php
                if ($d6 == 'Yes') {
                  echo "<option value='Yes' selected> Yes </option>";
                  echo "<option value='No'> No </option>";
                } else {
                  echo "<option value='Yes'> Yes </option>";
                  echo "<option value='No' selected> No </option>";
                }
                ?>
              </select>
            </td>
            <td>
              <textarea name="r6" id="" cols="40" value="<?php echo $r6 ?>"><?php echo $r6 ?></textarea>
            </td>
          </tr>
          <tr class="text-center">
            <td>7.</td>
            <td>Control 7</td>
            <td>
              <select name="d7" id="">
                <?php
                if ($d7 == 'Yes') {
                  echo "<option value='Yes' selected> Yes </option>";
                  echo "<option value='No'> No </option>";
                } else {
                  echo "<option value='Yes'> Yes </option>";
                  echo "<option value='No' selected> No </option>";
                }
                ?>
              </select>
            </td>
            <td>
              <textarea name="r7" id="" cols="40" value="<?php echo $r7 ?>"><?php echo $r7 ?></textarea>
            </td>
          </tr>
          <tr class="text-center">
            <td>8.</td>
            <td>Control 8</td>
            <td>
              <?php
              if ($d8 == "Yes") {
                ?>
                <select class="m-2" name="d8" onchange="funccnt1(this.value)">
                  <option value='Yes' selected> Yes </option>
                  <option value='No'> No </option>
                </select>
                <p id='cnt1'>
                  <input type='number' value="<?php echo $cnt ?>" onchange='func2(this.value)' name='cnt' max='8' min='1'
                    required>
                </p>
                <?php
              } else {
                ?>
                <select class="m-2" name="d8" onchange="funccnt2(this.value)">
                  <option value='Yes'> Yes </option>
                  <option value='No' selected> No </option>
                </select>
                <p id='cnt2' style="display:none">
                  <input type='number' value="<?php echo $cnt ?>" onchange='func2(this.value)' name='cnt' max='8' min='1'
                    required>
                </p>
                <?php
              }
              ?>
            </td>
            <td>
              <textarea name='r81' cols='40' value="<?php echo $r81 ?>"><?php echo $r81 ?></textarea><br>
              <div id="multiple">
                <div id="multiple-inner">
                  <?php
                  if ($d8 == "Yes") {
                    if ($cnt >= 2) {
                      ?>
                      <textarea name="r82" id="" cols="40" value="<?php echo $r82 ?>"><?php echo $r82 ?></textarea><br>
                      <?php
                    }
                    if ($cnt >= 3) {
                      ?>
                      <textarea name="r83" id="" cols="40" value="<?php echo $r83 ?>"><?php echo $r83 ?></textarea><br>
                      <?php
                    }
                    if ($cnt >= 4) {
                      ?>
                      <textarea name="r84" id="" cols="40" value="<?php echo $r84 ?>"><?php echo $r84 ?></textarea><br>
                      <?php
                    }
                    if ($cnt >= 5) {
                      ?>
                      <textarea name="r85" id="" cols="40" value="<?php echo $r85 ?>"><?php echo $r85 ?></textarea><br>
                      <?php
                    }
                    if ($cnt >= 6) {
                      ?>
                      <textarea name="r86" id="" cols="40" value="<?php echo $r86 ?>"><?php echo $r86 ?></textarea><br>
                      <?php
                    }
                    if ($cnt >= 7) {
                      ?>
                      <textarea name="r87" id="" cols="40" value="<?php echo $r87 ?>"><?php echo $r87 ?></textarea><br>
                      <?php
                    }
                    if ($cnt >= 8) {
                      ?>
                      <textarea name="r88" id="" cols="40" value="<?php echo $r88 ?>"><?php echo $r88 ?></textarea><br>
                      <?php
                    }
                  }
                  ?>
                </div>
              </div>
            </td>
          </tr>
        </table>
      </div>
      <button type="submit" name="submit" class="btn btn-success">
        Update Report
      </button>
      <a class="btn btn-primary" href="report_update.php">
        Back
      </a>
      <br><br>
    </form>
  </div>
  <script>
    function funccnt1(data) {
      function fun(data) {
        let req = new XMLHttpRequest();
        req.open("GET", "http://localhost/Internship%202023%20Jdp/report3/report_add_cnt.php?last=" + data, true);
        req.send();
        req.onreadystatechange = function () {
          if (req.readyState == 4 && req.status == 200) {
            document.getElementById("cnt1").style.display = req.responseText;
          }
        }
      }
      function fun2(data) {
        let req = new XMLHttpRequest();
        req.open("GET", "http://localhost/Internship%202023%20Jdp/report3/report_add_cnt2.php?last=" + data, true);
        req.send();
        req.onreadystatechange = function () {
          if (req.readyState == 4 && req.status == 200) {
            document.getElementById("multiple").style.display = req.responseText;
          }
        }
      }
      fun(data);
      fun2(data);
    }
    function funccnt2(data) {
      function fun(data) {
        let req = new XMLHttpRequest();
        req.open("GET", "http://localhost/Internship%202023%20Jdp/report3/report_add_cnt.php?last=" + data, true);
        req.send();
        req.onreadystatechange = function () {
          if (req.readyState == 4 && req.status == 200) {
            document.getElementById("cnt2").style.display = req.responseText;
          }
        }
      }
      function fun2(data) {
        let req = new XMLHttpRequest();
        req.open("GET", "http://localhost/Internship%202023%20Jdp/report3/report_add_cnt2.php?last=" + data, true);
        req.send();
        req.onreadystatechange = function () {
          if (req.readyState == 4 && req.status == 200) {
            document.getElementById("multiple").style.display = req.responseText;
          }
        }
      }
      fun(data);
      fun2(data);
    }
    function func2(data) {
      let req = new XMLHttpRequest();
      req.open("GET", "http://localhost/Internship%202023%20Jdp/report3/report_add_remarks.php?last=" + data, true);
      req.send();
      req.onreadystatechange = function () {
        if (req.readyState == 4 && req.status == 200) {
          document.getElementById("multiple").innerHTML = req.responseText;
        }
      }
    }
  </script>
  <?php
  if (isset($_POST['submit'])) {
    $reportid = $_POST['reportid'];
    $userid = $_POST['userid'];
    $name = $_POST['name'];
    $dat = $_POST['dat'];
    $month = $_POST['month'];
    if (substr($dat, 6, 2) == $month and substr($dat, 1, 4) == $year) {
      $d1 = $_POST['d1'];
      $d2 = $_POST['d2'];
      $d3 = $_POST['d3'];
      $d4 = $_POST['d4'];
      $d5 = $_POST['d5'];
      $d6 = $_POST['d6'];
      $d7 = $_POST['d7'];
      $d8 = $_POST['d8'];
      $r1 = $_POST['r1'];
      $r2 = $_POST['r2'];
      $r3 = $_POST['r3'];
      $r4 = $_POST['r4'];
      $r5 = $_POST['r5'];
      $r6 = $_POST['r6'];
      $r7 = $_POST['r7'];
      $r81 = $_POST['r81'];
      if ($d8 == "Yes") {
        $cnt = $_POST['cnt'];
        $r82 = $_POST['r82'];
        $r83 = $_POST['r83'];
        $r84 = $_POST['r84'];
        $r85 = $_POST['r85'];
        $r86 = $_POST['r86'];
        $r87 = $_POST['r87'];
        $r88 = $_POST['r88'];
        $sql = "update report_master 
            set dat = '$dat', d1='$d1', d2='$d2', d3='$d3', d4='$d4', d5='$d5', d6='$d6', d7='$d7', d8='$d8',
            cnt=$cnt, r1='$r1', r2='$r2', r3='$r3', r4='$r4', r5='$r5', r6='$r6', r7='$r7', 
            r81='$r81', r82='$r82', r83='$r83', r84='$r84', r85='$r85', r86='$r86', r87='$r87', r88='$r88'
            where reportid= $reportid";
      } else {
        $sql = "update report_master 
            set dat = '$dat', d1='$d1', d2='$d2', d3='$d3', d4='$d4', d5='$d5', d6='$d6', d7='$d7', d8='$d8',
            cnt=NULL, r1='$r1', r2='$r2', r3='$r3', r4='$r4', r5='$r5', r6='$r6', r7='$r7', 
            r81='$r81', r82='', r83='', r84='', r85='', r86='', r87='', r88=''
            where reportid = $reportid";
      }
      $query = mysqli_query($con, $sql);
      if ($query) {
        echo "<script>alert('You have successfully updated the data');</script>";
        echo "<script> document.location.href='report.php';</script>";
      } else {
        echo "<script>alert('Something Went Wrong. Please try again');</script>";
        echo "<script> document.location.href='report.php';</script>";
      }
    } else {
      echo "<script>alert('Please do not change month/year');</script>";
      echo "<script> document.location.href='report.php';</script>";
    }
  }
  mysqli_close($con);
  ?>
</body>

</html>