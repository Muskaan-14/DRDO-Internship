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
        <h1 class="text-center">DELETE USER DETAILS</h1>
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
                OIC:
                <input type="text" name="hod_name" value="<?php echo $hod_name ?>" disabled>
            </div>
            <div class="row m-3">
                Designation:
                <input type="text" name="desig" value="<?php echo $desig ?>" disabled>
            </div>
            <input class="d-none" name="userid" value="<?php echo $userid ?>">
            <div class="row m-3 my-5">
                <p>Are you sure you want to delete this user and all his/her reports?</p>
                <div class="col-sm-6">
                    <div class="row me-2">
                        <button type="submit" name="submit" class="btn btn-success fs-5">
                            DELETE
                        </button>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="row ms-2">
                        <a class="btn btn-primary fs-5" href="details.php">
                            Back
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <?php
    if (isset($_POST['submit'])) {
        $userid = $_POST['userid'];
        $sql = "delete from report_master where userid=$userid";
        $query1 = mysqli_query($con, $sql);
        $sql = "delete from user_master where userid = $userid";
        $query2 = mysqli_query($con, $sql);
        if ($query1 && $query2) {
            echo "<script>alert('You have successfully deleted details');</script>";
            echo "<script> document.location ='details.php'; </script>";
        } else {
            echo "<script>alert('Something went wrong');</script>";
        }
    }
    ?>
</body>

</html>