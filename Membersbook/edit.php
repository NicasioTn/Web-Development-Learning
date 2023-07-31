<?php
    
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
    //recive data from forms
    // can be editable
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $nickname = $_POST['nickname'];
    $phone = $_POST['phone'];
    $identity = $_POST['identify'];
    $mode = $_POST['mode'];
    

    if($mode == "save"){
        $stmt = $conn->prepare("update users set firstname = ?, lastname = ?, nickname = ?, phone = ? where email = ?");
        $stmt->bind_param("sssss", $fname, $lname, $nickname, $phone, $identity);
        $stmt->execute();
        // $result = $stmt->get_result();
        // if ($result->num_rows > 0) {
        //     $row = $result->fetch_assoc();
        //     echo $row["firstname"]. $row["lastname"]. $row["nickname"]. $row["phone"]. $row["email"];
        // }
        if($stmt->affected_rows > 0){
            echo "updated";
            refreshPage();
        }
        else {
            echo "update fail";
            refreshPage();
        }
        $conn->close();
    }

    function refreshPage(){
        ?> 
        <!-- link back to main page  -->
        <head>
        <meta http-equiv='refresh' content='0; URL=adminpage.php'>
        </head>

        <?php
    }
?>