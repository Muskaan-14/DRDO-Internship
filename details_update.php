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
        <h1 class="text-center">UPDATE USER DETAILS</h1>
        <form action="" method="post" class="m-4 mx-sm-auto my-5" style="width:350px;">
            <div class="row m-3">
                Name:
                <input type="text" name="name" value="<?php echo $name ?>">
            </div>
            <div class="row m-3">
                Rank:
                <input type="text" name="rak" value="<?php echo $rak ?>">
            </div>
            <div class="row m-3">
                Group:
                <input type="text" name="grp" value="<?php echo $grp ?>">
            </div>
            <div class="row m-3">
                HOD/OIC Name:
                <input type="text" name="hod_name" value="<?php echo $hod_name ?>">
            </div>
            <div class="row m-3">
                HOD/OIC Designation:
                <input type="text" name="desig" value="<?php echo $desig ?>">
            </div>
            <input class="d-none" name="userid" value="<?php echo $userid ?>">
            <div class="row m-3 my-5">
                <div class="col-sm-6">
                    <div class="row me-2">
                        <button type="submit" name="submit" class="btn btn-success fs-5">
                            Update
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
        $name = $_POST['name'];
        $rak = $_POST['rak'];
        $grp = $_POST['grp'];
        $hod_name = $_POST['hod_name'];
        $desig = $_POST['desig'];
        $userid = $_POST['userid'];
        $sql = "update user_master
            set name='$name', rak='$rak', grp='$grp', hod_name='$hod_name', desig='$desig'
            where userid=$userid";
        $query = mysqli_query($con, $sql);
        if (!$query) {
            echo "<script>alesrt('Something went wrong');</script>";
        } else {
            echo "<script>alert('You have successfully updated details');</script>";
            echo "<script type='text/javascript'> document.location ='details.php'; </script>";
        }
    }
    mysqli_close($con);
    ?>
</body>

</html>