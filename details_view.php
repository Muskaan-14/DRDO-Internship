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
  if (empty($row)) {
    echo "<script>alert('User details does not exist! First try to add them');</script>";
    echo "<script> document.location.href='details.php';</script>";
  }
  $name = $row['name'];
  $rak = $row['rak'];
  $userid = $row['userid'];
  $grp = $row['grp'];
  $hod_name = $row['hod_name'];
  $desig = $row['desig'];
  ?>
  <div class="container my-5 py-5">
    <h1 class="text-center">VIEW USER DETAILS</h1>
    <form action="" method="post" class="m-4 mx-sm-auto my-5" style="width:350px;">
      <div class="row m-3">
        Name:
        <input type="text" name="name" value="<?php echo $name ?>" disabled>
      </div>
      <div class="row m-3">
        Rank:
        <input type="text" name="rak" value="<?php echo $rak ?>" disabled>
      </div>
      <div class="row m-3">
        Group:
        <input type="text" name="grp" value="<?php echo $grp ?>" disabled>
      </div>
      <div class="row m-3">
        HOD/OIC Name:
        <input type="text" name="hod_name" value="<?php echo $hod_name ?>" disabled>
      </div>
      <div class="row m-3">
        HOD/OIC Designation:
        <input type="text" name="desig" value="<?php echo $desig ?>" disabled>
      </div>
      <div class="col-sm-6 m-auto my-5">
        <div class="row">
          <a class="btn btn-primary fs-5" href="details.php">
            Back
          </a>
        </div>
      </div>
    </form>
  </div>
</body>

</html>