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
    $name = $_POST['name'];
    $rak = $_POST['rak'];
    $sql = "select * from user_master where name='$name' and rak='$rak'";
    $query = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($query);
    $userid = $row['userid'];
    $grp = $row['grp'];
    $hod_name = $row['hod_name'];
    $desig = $row['desig'];
    $dat = $_POST['dat'];

    $sql = "select * from report_master where dat='$dat' and userid=$userid";
    $query = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($query);
    $month = substr($dat, 5, 2);
    $year = substr($dat, 0, 4);
    $dat = substr($dat, 8, 2);
    $dat = $dat . '-' . $month . '-' . $year;
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
    <div class="container m-5 px-5">
        <h6 class="text-end"><u>Anexure - 'C'</u></h6>
        <h6><u>Compliance Report on Security Controls for handling Cyber incidents dated</u></h6>
        <br>
        <table class="table table-bordered">
            <tr>
                <th>SNo.</th>
                <th>Security Control</th>
                <th>Compliance/ Non-Compliance (Yes/No)</th>
                <th>Remarks, if any</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Control 1</td>
                <td>
                    <?php echo $d1 ?>
                </td>
                <td>
                    <?php echo $r1 ?>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>Control 2</td>
                <td>
                    <?php echo $d2 ?>
                </td>
                <td>
                    <?php echo $r2 ?>
                </td>
            </tr>
            <tr>
                <td>3</td>
                <td>Control 3</td>
                <td>
                    <?php echo $d3 ?>
                </td>
                <td>
                    <?php echo $r3 ?>
                </td>
            </tr>
            <tr>
                <td>4</td>
                <td>Control 4</td>
                <td>
                    <?php echo $d4 ?>
                </td>
                <td>
                    <?php echo $r4 ?>
                </td>
            </tr>
            <tr>
                <td>5</td>
                <td>Control 5</td>
                <td>
                    <?php echo $d5 ?>
                </td>
                <td>
                    <?php echo $r5 ?>
                </td>
            </tr>
            <tr>
                <td>6</td>
                <td>Control 6</td>
                <td>
                    <?php echo $d6 ?>
                </td>
                <td>
                    <?php echo $r6 ?>
                </td>
            </tr>
            <tr>
                <td>7</td>
                <td>Control 7</td>
                <td>
                    <?php echo $d7 ?>
                </td>
                <td>
                    <?php echo $r7 ?>
                </td>
            </tr>
            <tr>
                <td>8.</td>
                <td>Control 8<br></td>
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
        <br>
        <p>
            It is also certified that no incident of malware infection and
            data exfilteration has been reported in the division/group since
            past one month. In case of any such incidence, the same will be
            reported to Lab, ISO immediately.
        </p>
        <div class="d-flex justify-content-end">
            Signature : _______________
            <br>
            Name :
            <?php echo $name ?>
            <br>
            Rank :
            <?php echo $rak ?>
            <br>
            Group Name :
            <?php echo $grp ?>
            <br>
            Date :
            <?php echo $dat ?>
        </div>
        <div>
            Signature : _______________
            <br>
            HOD/OIC Name :
            <?php echo $hod_name ?>
            <br>
            Designation :
            <?php echo $desig ?>
        </div>
        <div class="mt-5 pt-5">
            To,
            Lab ISO & OIC IT&CS
        </div>
    </div>
</body>

</html>