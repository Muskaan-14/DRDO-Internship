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
    $userid = $row['userid'];
    ?>
    <div class="container my-5 py-5">
        <h1 class="text-center">SELECT DATE TO VIEW REPORT</h1>
        <form action="report_view2.php" method="post" class="m-4 mx-sm-auto my-5" style="width:350px;">
            <div class="row m-3">
                Date:
                <select name="dat" id="dat">
                    <?php
                    $sql = "select distinct(dat) from report_master where userid = $userid order by dat";
                    $query = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_array($query)) {
                        ?>
                        <option value="<?php echo $row['dat'] ?>">
                            <?php echo $row['dat'] ?>
                        </option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <div class="row m-3 my-5">
                <div class="col-sm-6">
                    <div class="row me-2">
                        <button type="submit" name="submit" class="btn btn-success fs-5">
                            Next
                        </button>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="row ms-2">
                        <a class="btn btn-primary fs-5" href="report.php">
                            Back
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>

</html>