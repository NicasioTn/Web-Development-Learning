<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!--  icon -->
    <!-- <link href="Image/" rel="icon"> -->

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- link data of class -->
    <link rel="stylesheet" href="class.php">
    <!-- css link -->
    <link rel="stylesheet" href="style.css">
    <!-- Boostrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>
<?php
        //>>  connect
        $server = "localhost";
        $username = "user";
        $password = "123";
        $dbname = "users";

        $conn = new mysqli($server, $username, $password, $dbname);
        if($conn->connect_error){
            die("connection fail " . $conn->connect_error);
        }
        else{// connection success
        
        }
        //>>
        $sql = "select firstname, lastname from users";
        $result = $conn->query($sql);
                  
 ?>
<body class="backblue">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card" style="width: 900px; height:700px;">
                    <div class="card-body">
                        <h5 class="card-title">Members Book</h5>
                        <p class="card-text">members of company</p>
                        <table class="table table-dark">
                            <tbody>
                                <tr>
                                    <th>UserName</th>
                                    <th>Details</th>
                                </tr>
                                    <?php  
                                        if ($result->num_rows > 0) {
                                            while($row = $result->fetch_assoc()) {
                                    ?>
                                        <tr> 
                                            <td>
                                                <?php  echo $row["firstname"]. "  " . $row["lastname"]; ?>
                                            </td>
                                            <td>
                                                <button class="btn btn-primary" type="button " name="mode" value="more">more</button>
                                            </td>
                                        </tr>
                                    <?php 
                                            } // end of while loop
                                        } 
                                        else {
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