<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- css link -->
    <link rel="stylesheet" href="style.css">
    <!-- Boostrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <title>Admin</title>
</head>
<?php
        //>>  connect
        $server = "localhost";
        $username = "admin";
        $password = "180201web";
        $dbname = "users";

        $conn = new mysqli($server, $username, $password, $dbname);
        if($conn->connect_error){
            die("connection fail " . $conn->connect_error);
        }
        else{// connection success
        
        }
        //>>
        $sql = "select name from admininfo";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {

 ?>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card mx-auto border-warning">
                    <div class="card-body ">
                        <h5 class="card-title">User Interface Admin</h5>
                        <p class="card-text">Admin :  <?php echo $row["name"] ?> </p>
                        <a name="mode" id="" class="btn btn-primary" href="#" role="button">เพิ่มข้อมูลผู้ใช้</a>
                        <a name="mode" id="" class="btn btn-primary" href="#" role="button">ลบข้อมูลผู้ใช้</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php 
        }
    }// end of if
?>