<?php
    session_start();

    if (!isset($_SESSION['login'])) {
        $_SESSION['login'] = 0;
    }
    if($_SESSION['login'] == 0){
        header("Location: index.php");
    }

   

    $servername = "localhost";
    $username = "adminCenima";
    $password = "123";
    $dbname = "cinema";
 
    $conn = new mysqli($servername, $username, $password, $dbname);

    $stmt = $conn->prepare("SELECT * FROM movie ORDER BY year DESC;");
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows == 1)
    {
        // successful
        $row = $result->fetch_assoc();        
    }
            

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="style.css">
    <!-- Icon -->
    <link href="Image/Icon.png" rel="icon">
    <!-- Boostrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- Google Font link -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@300&display=swap" rel="stylesheet">
    <!-- icon font -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display</title>
</head>

<body class="back2" >
    <div class="layout">
        <a href="index.php">
            <button class="btn btn-outline-warning" style="float:right;"type="button">ออกจากระบบ</button>
            $_SESSION['login'] = 0; ?>
            <? header("Location: index.php"); ?>
        </a>
    <button class="btn btn-outline-warning" style="float:left;"type="button">เพิ่มภาพยนตร์ใหม่</button>
    <table class="table" style="color: white;">
        <tr >
            <th> โปสเตอร์ </th>
            <th> ปีที่ฉาย </th>
            <th> ชื่อเรื่อง </th>
            <th> จัดการ </th>
        </tr>
        <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
        ?>
        <tr >
            <td>
                <img src="<?=$row["poster"]?>" style="width:100px; height: 150px;" alt="">
            </td>
            <td >
                <p style="font-size:36px"><?=$row["year"]?></p> 
            </td>
            <td>
               <p style="font-size:36px"><?=$row["name"]?></p> 
            </td>
            <td>
                <form action="delete.php" method="POST">
                    <a href="delete.php" >
                        
                    <button type="submit" >
                        <input type="hidden" name="idmovie" value="<?=$row["id"]?>">
                        <i class="fa fa-trash-o" style="font-size:36px" type="submit>" name="idmovie" value="<?=$row["id"]?>"></i>
                        
                    </button> 
                    </a>
                    
                </form>
            </td>
        </tr>
        <?php
                } // end of while loop
            } else {
                echo "0 results";
            }
            $conn->close();
        ?>
    </table>
    </div>
</body>

</html>