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
    
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $nickname = $_POST['nickname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $url = $_POST['url'];
    $mode = $_POST['mode'];
} else {

    $fname = $_GET['fname'];
    $lname = $_GET['lname'];
    $nickname = $_GET['nickname'];
    $email = $_GET['email'];
    $password = $_GET['password'];
    $phone = $_GET['phone'];
    $url = $_GET['url'];
    $mode = $_GET['mode'];
}

class user
{
    public $fname;
    public $lname;
    public $nickname;
    public $email;
    public $password;
    public $phone;
    public $url;

    public function __construct($fname, $lname, $nickname, $email, $password, $phone, $url)
    {
        $this->fname = $fname;
        $this->lname = $lname;
        $this->nickname = $nickname;
        $this->email = $email;
        $this->password = $password;
        $this->phone = $phone;
        $this->url = $url;
      
    }
}

if($mode == "add"){
    $user = new user($fname, $lname, $nickname, $email, $password, $phone, $url);
    array_push($_SESSION['users'], $user);
    // print
    // foreach($_SESSION['users'] as $a){
    //     echo $a->titlename." ".$a->fname." ".$a->lname." "
    //     . $a->nickname." ".$a->email." ".$a->phone." "
    //     . $a->url . "<br>";
    // }

    // hash password
    $hashed = password_hash($user->password, PASSWORD_DEFAULT);

    // Insert Member to Database
    $sql = "INSERT INTO users VALUES('$user->fname','$user->lname','$user->nickname', 
    '$user->email', '$hashed', '$user->phone', '$user->url', 'NULL')" ;

    if(mysqli_query($conn, $sql)){
        echo "Inserted!";
    }
    else
    {
        echo "failed to Insert users ". mysqli_error($conn);
    }
    $conn->close();
}
// check login while add or signUp
if($_SESSION['checkLogin'] == 1){
    header("Location: adminpage.php");
}
else{
    header("Location: index.php");
}
?>
<!-- link back to main page  -->
<!-- <head>
  <meta http-equiv='refresh' content='0; URL=index.php'>
</head> -->