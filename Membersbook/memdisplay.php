<?php
session_start();
if (!isset($_SESSION['checkLogin'])) {
    $_SESSION['checkLogin'] = 0;
}
if (!isset($_SESSION['memsearch'])) {
    $_SESSION['memsearch'] = 0;
}
// check login
if($_SESSION['checkLogin'] == 1){
    header("Location: adminpage.php");
}
elseif($_SESSION['checkLogin'] == 2){
    
}
else{
    header("Location: index.php");
}
// echo $_SESSION['checkLogin'];

// use for search method
$strKeyword = null;
$word = null;
if (isset($_POST["txtKeyword"])) {

    $strKeyword["key"] = $_POST["txtKeyword"];
    $json = json_encode($strKeyword);
    // echo $json; 
    $word = json_decode($json, true);
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MemberPage</title>
    <!-- css link -->
    <link rel="stylesheet" href="styles.css">
    <!-- Boostrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- search icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
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

$sql = "select firstname, lastname,nickname, email, phone, url from users where role != 'admin'";
$result = $conn->query($sql);

?>

<body style="background-color: #1A374D;">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card" style="height: 850px; margin-top: 10px;border-radius: 20px;">
                    <div class="card-header">
                        <h1 id="textlocation">Member</h1>
                        <a href="index.php"> <button id= "bt" type="button " name="mode" value="back" style="float: right;  margin-right: 10px;">Logout</button></a>

                        <div class="search-container">
                            <?php

                            function searching($conn, $word)
                            {
                                // echo $word["key"];
                                $stmt = $conn->prepare("select firstname, lastname, nickname, email, phone, url from users 
                                    where firstname = ? OR lastname = ? OR nickname = ? OR email = ? OR phone = ? OR url = ? 
                                    and role != 'admin' 
                                    UNION
                                    select firstname, lastname, nickname, email, phone, url from users 
                                    where firstname is null OR lastname is null OR nickname is null OR email is null OR phone is null OR url is null 
                                    and role != 'admin' ");
                                $stmt->bind_param("ssssss", $word["key"], $word["key"], $word["key"], $word["key"], $word["key"], $word["key"]);
                                $stmt->execute();
                                $new = $stmt->get_result();
                                return $new;
                            }

                            ?>
                            <form name="formSearch" method="post" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>">
                                <input name="txtKeyword" style="width: 400px;" type="text" placeholder="Search...." id="boxsearch">
                                <button id="bt" type="submit">search</button><br>
                                <?php 
                                if($_SESSION['memsearch'] == 0 )
                                {
                                    $_SERVER['memsearch'] = 1;
                                    if($_SERVER['memsearch'] == 1 && $word != null)
                                    {
                                        // echo $_SERVER['memsearch']. $word["key"];
                                        $result = searching($conn, $word);
                                    }
                                }
                                ?>
                            </form>
                            <br>

                        </div>
                    </div>
                    <div>
                        <table class="table table-light">
                            <tbody>
                                <tr id="textlocation">
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>NickName</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>URL Facebook</th>
                                </tr>
                                <?php
                                
                   
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                ?>
                                        <tr id="textlocation">
                                            <td>
                                                <?php echo $row["firstname"]; ?>
                                            </td>
                                            <td>
                                                <?php echo $row["lastname"]; ?>
                                            </td>
                                            <td>
                                                <?php echo $row["nickname"]; ?>
                                            </td>
                                            <td>
                                                <?php echo $row["email"]; ?>
                                            </td>
                                            <td>
                                                <?php echo $row["phone"]; ?>
                                            </td>
                                            <td>
                                                <a href="<?php echo $row["url"]; ?>"><?php echo $row["url"]; ?></a>
                                            </td>
                                        </tr>
                                <?php
                                    } // end of while loop
                                } else {
                                    echo "0 results";
                                }
                                $conn->close();
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>