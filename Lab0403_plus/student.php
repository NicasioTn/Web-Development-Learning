<?php
session_start();
if (!isset($_SESSION['student'])) { //$_COOKIE['student']  setcookie('student',$_COOKIE['student']+=1, time()+(86400 * 30));
    $_SESSION['student'] = array();
} else {
}

//recive data from forms
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $studentID = $_POST['stdID'];
    $titlename = $_POST['ttname'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $cyear = $_POST['cyear'];
    $gpa  = $_POST['gpa'];
    $birthday = $_POST['birthday'];
    $mode = $_POST['mode'];
} else {
    $studentID = $_GET['stdID'];
    $titlename = $_GET['ttname'];
    $fname = $_GET['fname'];
    $lname = $_GET['lname'];
    $cyear = $_GET['cyear'];
    $gpa  = $_GET['gpa'];
    $birthday = $_GET['birthday'];
    $mode = $_GET['mode'];
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
        $this->birthday = $birthday;
    }
}
if ($mode == "add") {
    $student = new Student($studentID, $titlename, $fname, $lname, $cyear, $gpa, $birthday);
    array_push($_SESSION['student'], $student); // push data in array
    foreach ($_SESSION['student'] as $s) {
        // echo $s->studentID . " " . $s->titlename . " " . $s->fname . " " . $s->lname
        //     . " " . $s->cyear . " " . $s->gpa . " " . $s->birthday . "<br>";
    }
    $_SESSION['manystudent']++; // count many student 

} elseif ($mode == "save") {
    foreach ($_SESSION['student'] as $s) {
        if ($s->studentID == $studentID) {

            // $s->studentID = $studentID; //don't change because value is primarykey
            $s->titlename = $titlename;
            $s->fname = $fname;
            $s->lname = $lname;
            $s->cyear = $cyear;
            $s->gpa = $gpa;
            $s->birthday = $birthday;
        }
    }
}

?>
<!-- link back to main page  -->
<head>
  <meta http-equiv='refresh' content='0; URL=index.php'>
</head>