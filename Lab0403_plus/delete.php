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
$ind = 0;
foreach ($_SESSION['student'] as $s) {
    
    if ($s->studentID == $identify) {
        // echo $s->studentID . " " . $identify;
        //
        array_splice($_SESSION['student'], $ind ,1 );
        $_SESSION['manystudent']--;
    }
    else{
        $ind++;
    }
}



?>
<!-- link back to main page  -->
<head>
  <meta http-equiv='refresh' content='0; URL=index.php'>
</head>