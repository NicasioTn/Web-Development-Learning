<!DOCTYPE html>
<html lang="en">

<head>
    <!--  icon -->
    <!-- <link href="Image/" rel="icon"> -->

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มข้อมูล</title>
    <!-- link data of class -->
    <link rel="stylesheet" href="data.php">
    <!-- css link -->
    <link rel="stylesheet" href="style.css">
    <!-- Boostrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body class="backblue">


    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <?php
                                //>>  connect
                                $server = "localhost";
                                $username = "admin";
                                $password = "180201web";
                                $dbname = "users";

                                $conn = new mysqli($server, $username, $password, $dbname);
                                if($conn->connect_error){
                                    die("connection fail " . $conn->connect_error);
                                }
                                else{// connection success
                                ?>
                                    <!-- Show Icon Online becuase Login Success -->
                                    <img style="width: 30px; height: 40px; float: right;" src="Image/loginsuccess.png" alt="IconLoginSuccess">
                                <?php
                                }
                                //>>
                                
                        ?>
                        <h5 class="card-title">เพิ่มข้อมูลผู้ใช้</h5>
                        <p class="card-text">Insert Information of user</p>
                       
                        <form action="data.php" method="post">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="titlename">TitleName(คำนำหน้า)</label>
                                    <select id="my-select" class="form-control" name="ttname">
                                        <option selected>นาย</option>
                                        <option>นาย</option>
                                        <option>นาง</option>
                                        <option>นางสาว</option>
                                    </select>
                                </div>
                                
                                <label for="fname">FirstName(ชื่อ)</label>
                                    <input class="form-control" type="text" name="fname">
                                <label for="lname">LastName(นามสกุล))</label>
                                    <input class="form-control" type="text" name="lname">
                                <label for="nickname">NickName(ชื่อเล่น)</label>
                                    <input class="form-control" type="text" name="nickname">
                                <label for="email" required>Email</label>
                                    <input class="form-control" type="email" name="email">
                                    <label for="phone" required>Tel-Phone(เบอร์โทรศัพท์)</label>
                                    <input class="form-control" type="phone" name="phone">
                                <label for="faceboock-url" required>Facebook URL</label>
                                    <input class="form-control" type="url" name="url">
                                <br>
                                <div class="form-group">
                                    <a href="data.php">
                                        <button type="submit" style="float: left;" class="btn btn-success borderButton" name="mode" value="add" >เพิ่มข้อมูลนิสิต</button>
                                    
                                    </a>
                                    <a href="index.php" style="float: right;" class="btn btn-outline-light text-danger borderButton" role="button">กลับไปหน้าแรก</a>

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
</body>

</html>