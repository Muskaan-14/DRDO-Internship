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
    <div class="container my-5">
        <h4 class="text-center">CONFIRM USER DETAILS</h4>
        <form method="POST" action="">
            <div class="d-flex m-sm-auto justify-content-center" >
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
                <input type="text" name="name" value="<?php echo $name ?>" class="d-none">
            </div>
            <h3 class="text-center my-4">FILL REPORT</h3>
            <div class="m-auto">
                <div class="text-center">
                    Select Date:
                    <input type="date" name="dat" required>
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
                            <select name="d1" id="">
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </td>
                        <td>
                            <textarea name="r1" id="" cols="40"></textarea>
                        </td>
                    </tr>
                    <tr class="text-center">
                        <td>2.</td>
                        <td>Control 2</td>
                        <td>
                            <select name="d2" id="">
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </td>
                        <td>
                            <textarea name="r2" id="" cols="40"></textarea>
                        </td>
                    </tr>
                    <tr class="text-center">
                        <td>3.</td>
                        <td>Control 3</td>
                        <td>
                            <select name="d3" id="">
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </td>
                        <td>
                            <textarea name="r3" id="" cols="40"></textarea>
                        </td>
                    </tr>
                    <tr class="text-center">
                        <td>4.</td>
                        <td>Control 4</td>
                        <td>
                            <select name="d4" id="">
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </td>
                        <td>
                            <textarea name="r4" id="" cols="40"></textarea>
                        </td>
                    </tr>
                    <tr class="text-center">
                        <td>5.</td>
                        <td>Control 5</td>
                        <td>
                            <select name="d5" id="">
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </td>
                        <td>
                            <textarea name="r5" id="" cols="40"></textarea>
                        </td>
                    </tr>
                    <tr class="text-center">
                        <td>6.</td>
                        <td>Control 6</td>
                        <td>
                            <select name="d6" id="">
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </td>
                        <td>
                            <textarea name="r6" id="" cols="40"></textarea>
                        </td>
                    </tr>
                    <tr class="text-center">
                        <td>7.</td>
                        <td>Control 7</td>
                        <td>
                            <select name="d7" id="">
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </td>
                        <td>
                            <textarea name="r7" id="" cols="40"></textarea>
                        </td>
                    </tr>
                    <tr class="text-center">
                        <td>8.</td>
                        <td>Control 8</td>
                        <td>
                            <select id="" class="mb-2" name="d8" onchange="func(this.value)" required>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                            <p id="cnt1">
                                <input type='number' onchange='func2(this.value)' name='cnt' id="cnt" max='8' min='1'
                                    value="1">
                            </p>
                        </td>
                        <td>
                            <textarea name='r81' cols='40'></textarea><br>
                            <div id="multiple">
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            <button type="submit" name="submit" value="submit" class="btn btn-success">
                Add Report
            </button>
            <a class="btn btn-primary" href="report_add.php">
                Back
            </a>
        </form>
    </div>
    <script>
        function func(data) {
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
        $name = $_POST['name'];
        $userid = $_POST['userid'];
        $dat = $_POST['dat'];
        echo $dat;
        $sql = "select * from report_master where substr(dat,1,4) = substr('$dat',1,4) and substr(dat,6,2) = substr('$dat',6,2) and userid=$userid";
        $query = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($query);
        if (empty($row)) {
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
                $sql = "insert into report_master (userid, name, dat, d1,d2,d3,d4,d5,d6,d7,d8,cnt,r1,r2,r3,r4,r5,r6,r7,r81,r82,r83,r84,r85,r86,r87,r88)
            values ($userid,'$name','$dat','$d1','$d2','$d3','$d4','$d5','$d6','$d7','$d8','$cnt','$r1','$r2','$r3','$r4','$r5','$r6','$r7','$r81','$r82','$r83','$r84','$r85','$r86','$r87','$r88')";
            } else {
                $sql = "insert into report_master (userid, name, dat, d1,d2,d3,d4,d5,d6,d7,d8,cnt,r1,r2,r3,r4,r5,r6,r7,r81,r82,r83,r84,r85,r86,r87,r88)
            values ($userid,'$name','$dat','$d1','$d2','$d3','$d4','$d5','$d6','$d7','$d8',NULL,'$r1','$r2','$r3','$r4','$r5','$r6','$r7','$r81',NULL,NULL,NULL,NULL,NULL,NULL,NULL)";
            }
            $query = mysqli_query($con, $sql);
            if ($query) {
                echo "<script>alert('You have successfully inserted the data');
            document.location ='report.php'; </script>";
            } else {
                echo "<script>alert('Something Went Wrong. Please try again');</script>";
                echo "<script type='text/javascript'> document.location ='report.php'; </script>";
            }
        } else {
            echo "<script>alert('Report is already filled for this Month. You can update it!');</script>";
            echo "<script type='text/javascript'> document.location ='report.php'; </script>";
        }
        mysqli_close($con);
    }
    ?>
</body>

</html>