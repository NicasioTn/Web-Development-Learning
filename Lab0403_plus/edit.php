<?php
session_start();
if (!isset($_SESSION['student'])) {
    $_SESSION['student'] = array();
}

class student
{
    public $studentID;
    public $titlename;
    public $fname;
    public $lname;
    public $cyear;
    public $gpa;
    public $birthday;

    public function __construct($stdID, $ttname, $fname, $lname, $cyear, $gpa, $birthday)
    {
        $this->studentID = $stdID;
        $this->titlename = $ttname;
        $this->fname = $fname;
        $this->lname = $lname;
        $this->cyear = $cyear;
        $this->gpa = $gpa;
        $this->birthday = $birthday;
    }
}
$identify = $_POST['identify'];

foreach ($_SESSION['student'] as $s) {
    $ind = 0;
    if ($s->studentID == $identify) {
        // echo $s->studentID . " " . $identify;
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>

            <link href="IMG/Worker.png" rel="icon">
            <!--  link BT -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>แก้ไขข้อมูลนิสิต</title>
            <link href="style.css" rel="stylesheet">
            <link href="index.php" rel="stylesheet">.

        </head>

        <body style="background-color: powderblue; ">
            <div class="container">
                <div class="row h-100">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-8 my-auto">
                        <div class="card mx-auto size-fix" style="width: 500px;">
                            <div class="card-body">
                                <h1 style="text-align: center">แก้ไขข้อมูลนิสิต</h1><br>

                                <form action="student.php" method="post">
                                    <div class="form-group">
                                        <br>

                                        <label for="stdID">รหัสนิสิต</label>
                                        <input class="form-control" placeholder="63000000000" type="text" name="stdID" value="<?= $s->studentID ?>">
                                        <div class="form-group">
                                            <label for="titlename">คำนำหน้า</label>
                                            <select id="my-select" class="form-control" name="ttname" value="<?= $s->titlename ?>">
                                                <option selected> <?= $s->titlename ?> </option>
                                                <option>นาย</option>
                                                <option>นางสาว</option>
                                            </select>
                                        </div>
                                        <label for="fname">ชื่อนิสิต</label>

                                        <input class="form-control" type="text" name="fname" value="<?= $s->fname ?>">
                                        <label for="lname">นามสกุลนิสิต</label>
                                        <input class="form-control" type="text" name="lname" value="<?= $s->lname ?>">
                                        <div class="form-group">
                                            <label for="cyear">ชั้นปี</label>
                                            <select class="form-control" name="cyear" value="<?= $s->cyear ?>">
                                                <option selected> <?= $s->cyear ?> </option>
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
                                        <input class="form-control" type="text" name="gpa" value="<?= $s->gpa ?>">
                                        <label for="birthday">วัน/เดือน/ปีเกิด</label>
                                        <input class="form-control" type="date" name="birthday" value="<?= $s->birthday ?>">
                                        <br>
                                        <div class="form-group">
                                            <a href="index.php">
                                                <button style="float: right;" type="submit" class="btn btn-success borderButton" name="mode" value="save">ยืนยันการแก้ไข</button>
                                            </a>
                                            <a name="" class="btn btn-outline-light text-danger borderButton " href="index.php" role="button">กลับไปหน้าแรก</a>
                                        </div>

                                        <!-- <br><br><br><br><br>
                                        <br><br><br><br><br> -->

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

<?php  } else {
        $ind++;
    }
}

?>