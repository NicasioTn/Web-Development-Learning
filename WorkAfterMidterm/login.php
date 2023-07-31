<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- css link -->
    <link rel="stylesheet" href="style.css">
    <!-- Boostrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- 12 colums -->
                <div class="card" style="background-color:powderblue">
                    <a href="index.php"><img src="Image/Logout2.png" class="loginset" alt="Go Back Icon"></a>


                    <div class="card-body backblue" style="margin-top:130px">

                        <h5 class="card-title">Login</h5>
                        <p class="card-text">ยืนยันการเข้าสู่ระบบ admin</p>
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-6">
                                    <!-- 9 in 12 colums -->
                                    <form action="" method="post">
                                        <div class="form-group">
                                            <label for="fname">User ID</label>
                                            <input class="form-control" type="text" name="fname">
                                            <label for="lname">Password</label>
                                            <input class="form-control" type="password" name="lname">
                                            <br>

                                            <div class="form-group">
                                                <a href="adminpage.php">
                                                    <button type="button" class="btn btn-success btn-block " name="mode" value="add">เข้าสู่ระบบ</button>
                                                </a>
                                                <!-- <a href="display.php">
                                                    <button type="" style="float: right;" class="btn btn-danger borderButton" name="mode" value="back" data-bs-toggle="modal" data-bs-target="#myModal">ยกเลิก</button>
                                                </a> -->
                                            </div>
                                        </div>
                                    </form>

                                    <br>
                                </div>

                            </div>

                        </div>


                    </div>
                   
                </div>
            </div>

        </div>
    </div>

</body>

</html>