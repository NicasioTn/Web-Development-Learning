<?php
session_start();
if (!isset($_SESSION['manystudent'])) { //$_COOKIE['student']  setcookie('student',$_COOKIE['student']+=1, time()+(86400 * 30));
    $_SESSION['manystudent'] = 0;
} else {
    // $_SESSION['manystudent']++;
}
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

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ข้อมูลนิสิต</title>
    <link href="style.css" rel="stylesheet">
    <link href="student.php" rel="stylesheet">

    <!-- Icon -->
    <link href="IMG/Document.png" rel="icon">


</head>

<body style="background-color: powderblue; text-align: center;">
    <div class="container">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <h1 class="jumbotron">Student Information</h1>
                <a href="addInfo.php">
                    <button class="borderButton btn-primary ">เพิ่มข้อมูลนิสิต</button>
                </a>
                <!-- <a href="#" name="mode" value="delete">
                    <button class="borderButton btn-danger">ลบข้อมูลนิสิต</button>
                </a>
                <a href="#" name="mode" value="edit">
                    <button class="borderButton btn-warning">แก้ไขข้อมูลนิสิต</button>
                </a> -->
                <h4><br>มีนักเรียนทั้งหมด <?php echo $_SESSION['manystudent']; ?> คน </h4>
                <!-- <hr> -->

            </div>
            <div class="col-sm-3"></div>
            <div>
            </div>
            <div class="row">
                <hr>
                <div class="col-sm-2"></div>
                <div class="col-sm-9">

                    <table width="100%" class="table table-striped table-bordered table-hover ">
                        <thead class="table-dark">
                            <tr class="info">
                                <th>รหัสนิสิต&nbsp</th>
                                <th>คำนำหน้า&nbsp</th>
                                <th>ชื่อ&nbsp</th>
                                <th>นามสกุล&nbsp</th>
                                <th>ชั้นปี&nbsp</th>
                                <th>เกรดเฉลี่ย&nbsp</th>
                                <th>วัน/เดือน/ปีเกิด&nbsp</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <?php foreach ($_SESSION['student'] as $s) { ?>
                            <tr>
                                <th> <?php echo $s->studentID ?> </th>
                                <th> <?php echo $s->titlename ?> </th>
                                <th> <?php echo $s->fname ?> </th>
                                <th> <?php echo $s->lname ?> </th>
                                <th> <?php echo $s->cyear ?> </th>
                                <th> <?php echo $s->gpa ?> </th>
                                <?php $date = new DateTime($s->birthday);   // Create date obj.   
                                ?>
                                <th> <?php echo $date->format('d-M-Y');     // format dd-mm-yyyy 
                                        ?> </th>
                                <th>
                                    <form action="edit.php" method="post">
                                        <a href="edit.php">
                                            <button class="borderButton btn-warning">แก้ไขข้อมูล</button>
                                            <input type="hidden" name="identify" value="<?= $s->studentID ?>">
                                        </a>
                                    </form>
                                </th>
                                <th>
                                    <form action="delete.php" method="post">
                                        <a href="index.php">
                                            <button class="borderButton btn-danger">ลบข้อมูล</button>
                                            <!-- send data to compare T ? F for delete  -->
                                            <input type="hidden" name="identify" value="<?= $s->studentID ?>">

                                        </a>
                                    </form>
                                </th>
                            <?php } ?>
                            </tr>

                    </table>
                    <div>
                    </div>

</body>

</html>