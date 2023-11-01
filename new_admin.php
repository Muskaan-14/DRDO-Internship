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
    ?>
    <div class="container my-5 py-5">
        <h1 class="text-center text-uppercase">Create Admin/User</h1>
        <form action="" method="post" class="m-4 mx-sm-auto my-5" style="width:350px;">
            <div class="row m-3">
                Name:
                <input type="text" name="name" required>
            </div>
            <div class="row m-3">
                New Login ID:
                <input type="number" name="loginid" required>
            </div>
            <div class="row m-3">
                New Password:
                <input type="password" name="pswd" required>
            </div>
            <div class="row m-3">
                Type:
                <select name="type" class="p-1">
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
            </div>
            <div class="row m-3 my-5">
                <div class="col-sm-6">
                    <div class="row me-2">
                        <button type="submit" name="submit" class="btn btn-success fs-5">
                            Create
                        </button>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="row ms-2">
                        <a class="btn btn-primary fs-5" href="admin.php">
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
        $loginid = $_POST['loginid'];
        $pswd = $_POST['pswd'];
        $type = $_POST['type'];
        $sql = "select * from login_master where loginid = $loginid";
        $query = mysqli_query($con, $sql);
        if (!$query) {
            echo "<script>alert('Something went wrong');</script>";
        }
        $row = mysqli_fetch_array($query);
        if (empty($row)) {
            $sql = "insert into login_master(loginid, name, pswd,type)
            values ($loginid, '$name', '$pswd', '$type')";
            $query = mysqli_query($con, $sql);
            if ($query) {
                echo "<script>alert('You have successfully added $type');</script>";
                echo "<script type='text/javascript'> document.location ='main.php'; </script>";
            } else {
                echo "<script>alert('Something went wrong');</script>";
            }
        } else {
            echo "<script>alert('Login ID already exists!');</script>";
        }
    }
    ?>
</body>

</html>