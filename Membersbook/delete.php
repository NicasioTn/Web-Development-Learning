<?php
//>>  connect
$server = "localhost";
$username = "admin";
$password = "180201web";
$dbname = "users";

$conn = new mysqli($server, $username, $password, $dbname);
if ($conn->connect_error) {
    die("connection fail " . $conn->connect_error);
} else {
    // connection success
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
$identify = $_POST["identify"];
$mode = $_POST["mode"];
// echo $identify ." ". $mode;
if ($mode == "delete") {
    // echo $identify;
    $deleted = deleteInfo($conn, $identify);
    // echo $deleted;
    refreshPage();
}
if ($mode == "edit") {
    $update = beforeEdite($conn, $identify);

    // echo $update . "==" . $identify;
    // echo gettype($update) . "/" . gettype($identify);
    // use -1 becuase echo strcmp($update, $identify); == -1 
    // $update return from func but $identify receive from form is not equal difference -1 charactor
    if (strcmp($update, $identify) == -1) {

        showData($conn, $identify);
    }
}

function deleteInfo($conn, $identify)
{
    $stmt = $conn->prepare("delete from users where email=?");
    $stmt->bind_param("s", $identify);
    $stmt->execute();
    // $result = $stmt->get_result();
    // if($result->num_rows == 1)
    // {
    //     return "deleted";
    // }
    // else{
    //     return "notfound";
    // }
    if ($stmt->affected_rows > 0) {
        return "deleted";
    } else {
        return "notfound";
    }
}

function beforeEdite($conn, $identify)
{
    $stmt = $conn->prepare("select email from users where email=?");
    $stmt->bind_param("s", $identify);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        return $row["email"];
    } else {
        return "don't have account in system";
    }
}

function showData($conn, $identify)
{
    $stmt = $conn->prepare("select * from users where email=?");
    $stmt->bind_param("s", $identify);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Edit Information</title>

            <!-- css link -->
            <link rel="stylesheet" href="styles.css">
            <!-- Boostrap link -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        </head>

        <body id="color-way2">
            <a href="adminpage.php"> <button style="font-family: 'Rubik', sans-serif; margin-top: 10px;" id="bt" type="button " name="mode" value="back">Back</button></a>
            <form id="font" class="box" action="edit.php" method="post">
                <h1 id="textcolor"> <b>Edit your Information</b> </h1>
                <label for="fname" id="textcolor"> First Name</label>
                <input class="form-control" id="input-signup" type="text" name="fname" value="<?= $row["firstname"] ?>">
                <label for="fname" id="textcolor"> Last Name </label>
                <input class="form-control" id="input-signup" type="text" name="lname" value="<?= $row["lastname"] ?>">
                <label for="fname" id="textcolor"> NickName </label>
                <input class="form-control" id="input-signup" type="text" name="nickname" value="<?= $row["nickname"] ?>">
                <input class="form-control" id="input-signup" type="email" name="email" disabled value="<?= $row["email"] ?>">
                <input class="form-control" id="input-signup" type="password" name="password" disabled value="<?= $row["password"] ?>" >
                <label for="fname" id="textcolor"> Phone </label>
                <input class="form-control" id="input-signup" type="text" name="phone" value="<?= $row["phone"] ?>">
                <input class="form-control" id="input-signup" type="url" name="url" disabled value="<?= $row["url"] ?>">
                <a href="edite.php">
                    <input class="form-control" id="input-signup" type="hidden" name="identify" value="<?= $row["email"] ?>">
                    <button class="btn btn-dark" style="float: ceter;" type="submit" name="mode" value="save" style="float: left;">Save</button>
                </a>
            </form>


        </body>

        </html>
    <?php
    } else {
        // echo "0 results";
    }
    $conn->close();
}

function refreshPage()
{
    ?>
    <!-- link back to main page  -->

    <head>
        <meta http-equiv='refresh' content='0; URL=adminpage.php'>
    </head>

<?php
}
?>