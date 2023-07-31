<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!--  icon -->
    <link href="IMG/Worker.png" rel="icon">
    <!--  link BT -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มข้อมูลนิสิตใหม่</title>
    <link href="style.css" rel="stylesheet">
    <link href="index.php" rel="stylesheet">.

</head>

<body style="background-color: powderblue; ">
    <div class="container">
        <div class="row h-100">
            <div class="col-sm-2"></div>
            <div class="col-sm-8 my-auto">
                <div class="card mx-auto size-fix " style="width: 500px;">
                    <div class="card-body">
                        <h1 style="text-align: center">เพิ่มข้อมูลนิสิตใหม่</h1><br>
                        <!-- Check student ID  -->

                        <form action="student.php" method="post">
                            <div class="form-group">
                                <br>
                                <label for="stdID">รหัสนิสิต</label>
                                <!-- tag required use for recheck null input -->
                                <input required class="form-control" placeholder="63000000000" type="text" name="stdID">
                                <div class="form-group">
                                    <label for="titlename">คำนำหน้า</label>
                                    <select id="my-select" class="form-control" name="ttname">
                                        <option selected>นาย</option>
                                        <option>นาย</option>
                                        <option>นางสาว</option>
                                    </select>
                                </div>
                                <label for="fname">ชื่อนิสิต</label>
                                <input class="form-control" type="text" name="fname">
                                <label for="lname">นามสกุลนิสิต</label>
                                <input class="form-control" type="text" name="lname">
                                <div class="form-group">
                                    <label for="cyear">ชั้นปี</label>
                                    <select class="form-control" name="cyear">
                                        <option selected>1</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>8</option>
                                    </select>
                                </div>
                                <label for="grade">เกรดเฉลี่ย</label>
                                <input class="form-control" type="text" name="gpa">
                                <label for="birthday">วัน/เดือน/ปีเกิด</label>
                                <input class="form-control" type="date" name="birthday">
                                <br>
                                <div class="form-group">
                                    <!-- <input class="form-control btn-info" type="submit" name="mode" value="เพิ่มข้อมูลนิสิต"> -->
                                    <a href="index.php" name="" class="btn btn-outline-light text-danger borderButton" role="button">กลับไปหน้าแรก</a>
                                    <a href="index.php">
                                        <button type="submit" style="float: right;" class="btn btn-success borderButton" name="mode" value="add" data-bs-toggle="modal" data-bs-target="#myModal">เพิ่มข้อมูลนิสิต</button>

                                    </a>

                                </div>

                                <!-- <br><br><br><br><br> -->

                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-2"></div>
            <div>
            </div>

</body>

</html>