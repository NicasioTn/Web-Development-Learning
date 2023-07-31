<?php

    session_start();
    if (!isset($_SESSION['users'])) { 
        $_SESSION['users'] = array();
    } 
    

    // connect
    $server = "localhost";
    $username = "admin";
    $password = "180201web";
    $dbname = "users";

    $conn = new mysqli($server, $username, $password, $dbname);
    if($conn->connect_error){
        die("connection fail " . $conn->connect_error);
    }
    else{}

//recive data from forms
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titlename = $_POST['ttname'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $nickname = $_POST['nickname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $url = $_POST['url'];
    $mode = $_POST['mode'];
} else {
    $titlename = $_GET['ttname'];
    $fname = $_GET['fname'];
    $lname = $_GET['lname'];
    $nickname = $_GET['nickname'];
    $email = $_GET['email'];
    $phone = $_GET['phone'];
    $url = $_GET['url'];
    $mode = $_GET['mode'];
}

class user
{
    public $titlename;
    public $fname;
    public $lname;
    public $nickname;
    public $email;
    public $phone;
    public $url;

    public function __construct($titlename, $fname, $lname, $nickname, $email, $phone, $url)
    {
        $this->titlename = $titlename;
        $this->fname = $fname;
        $this->lname = $lname;
        $this->nickname = $nickname;
        $this->email = $email;
        $this->phone = $phone;
        $this->url = $url;
      
    }
}

if($mode == "add"){
    $user = new user($titlename, $fname, $lname, $nickname, $email, $phone, $url);
    array_push($_SESSION['users'], $user);
    // print
    // foreach($_SESSION['users'] as $a){
    //     echo $a->titlename." ".$a->fname." ".$a->lname." "
    //     . $a->nickname." ".$a->email." ".$a->phone." "
    //     . $a->url . "<br>";
    // }
        
    $sql = "INSERT INTO users VALUES('$user->titlename', '$user->fname','$user->lname',
    '$user->nickname', '$user->email', '$user->phone', '$user->url')" ;

    if(mysqli_query($conn, $sql)){
        echo "Inserted!";
    }
    else
    {
        echo "failed to Insert users ". mysqli_error($conn);
    }
    $conn->close();
}
?>
<!-- link back to main page  -->
<head>
  <meta http-equiv='refresh' content='0; URL=index.php'>
</head>