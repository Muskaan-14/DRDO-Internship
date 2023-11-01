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
        <h1 class=" text-center">ADMIN</h1>
        <form action="" method="post" class="m-4 mx-sm-auto my-5" style="width:350px;">
            <div class="row m-3">
                Login ID:
                <input type="text" name="loginid" required>
            </div>
            <div class="row m-3">
                Password:
                <input type="password" name="pswd" required>
            </div>
            <div class="row m-3 my-5">
                <div class="col-sm-6">
                    <div class="row me-2">
                        <button type="submit" name="submit" class="btn btn-success fs-5">
                            Login
                        </button>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="row ms-2">
                        <a class="btn btn-primary fs-5" href="main.php">
                            Back
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <?php
    if (isset($_POST['submit'])) {
        $sql = "update login_master set status = 'logged out'";
        $query = mysqli_query($con, $sql);
        $loginid = $_POST['loginid'];
        $pswd = $_POST['pswd'];
        $sql = "Select * from login_master where loginid = $loginid and type = 'admin' and pswd='$pswd'";
        $query = mysqli_query($con, $sql);
        $data = mysqli_fetch_array($query);
        if (empty($data)) {
            echo "<script>alert('Wrong userid/ password entered');</script>";
        } else {
            echo "<script>alert('You have successfully logged in');</script>";
            echo "<script type='text/javascript'> document.location ='new_admin.php'; </script>";
        }
    }
    ?>
</body>

</html>