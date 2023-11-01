<!-- ALTER USER 'root'@'localhost' IDENTIFIED BY 'a123';; 
echo "Error: " . $sql . "<br>" . $con->error; -->

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

    $con = mysqli_connect("localhost", "root", "");
    if (mysqli_connect_errno()) {
        echo "Connection Fail" . mysqli_connect_error();
    }
    ;
    $query = mysqli_query($con, "create database drdo_form");

    $con = mysqli_connect("localhost", "root", "", "drdo_form");
    if (mysqli_connect_errno()) {
        echo "Connection Fail" . mysqli_connect_error();
    }
    ;

    $sql = "create table if not exists login_master(
        loginid int(6) primary key,
        name varchar(40) Not Null,
        pswd varchar(20) Not Null,
        type varchar(10) Not Null,
        status varchar(15) default 'logged out'
        )";
    $query = mysqli_query($con, $sql);

    $sql = "select * from login_master";
    $query = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($query);
    if(empty($row)){
      $sql = "insert into login_master
      values (123, 'admin', 'ab12','admin','logged out')";
      $query = mysqli_query($con, $sql);  
    }
    
    $sql = "create table if not exists user_master(
    userid int(5) auto_increment primary key,
    loginid int(6) Not Null,
    name varchar(40) Not Null,
    rak varchar(20) Not Null,
    grp varchar(40) Not Null,
    hod_name varchar(40) Not Null,
    desig varchar(30) Not Null,
    FOREIGN KEY (loginid) REFERENCES login_master(loginid)
    )";
    $query = mysqli_query($con, $sql);

    $sql = "create table if not exists report_master(
        reportid int(5) auto_increment primary key,
        userid int(5) Not NULL,
        name varchar(40) Not Null,
        dat date Not Null,
        D1 varchar(3),
        D2 varchar(3),
        D3 varchar(3),
        D4 varchar(3),
        D5 varchar(3),
        D6 varchar(3),
        D7 varchar(3),
        D8 varchar(3),
        cnt int(1),
        R1 varchar(150),
        R2 varchar(150),
        R3 varchar(150),
        R4 varchar(150),
        R5 varchar(150),
        R6 varchar(150),
        R7 varchar(150),
        R81 varchar(150),
        R82 varchar(150),
        R83 varchar(150),
        R84 varchar(150),
        R85 varchar(150),
        R86 varchar(150),
        R87 varchar(150),
        R88 varchar(150),
        FOREIGN KEY (userid) REFERENCES user_master(userid)
        )";
    $query = mysqli_query($con, $sql);
    ?>
    <div class="container text-center m-5">
        <br><br>
        <h1 class="text-uppercase">Compliance Report on Security Controls</h1>
        <br><br>
        <a class="btn btn-success m-4 p-3 px-5 fs-1" href="admin.php">Admin</a>
        <br>
        <a class="btn btn-success m-4 p-3 px-5 fs-1" href="user.php">User</a>
    </div>
</body>

</html>