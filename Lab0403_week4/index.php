<!DOCTYPE html>
<html lang="en">

<head>
    <!--  link BT -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body style="background-color: powderblue">
    <div class="container">
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <form action="student.php">
                    <table>
                        <tr>
                            <td colspan="2">
                                <input type="radio" name="mode" value="add">Add
                                <input type="radio" name="mode" value="delete">Delete
                                <input type="radio" name="mode" value="show">Show
                            </td>
                        </tr>
                        <tr>
                            <td>ID</td>
                            <td> <input type="text" name="id"> </td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td> <input type="text" name="fullname"> </td>
                        </tr>
                        <tr>
                            <td>GPA</td>
                            <td> <input type="text" name="gpa"> </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="submit" value="Send">
                            </td>

                        </tr>
                    </table>
                </form>
            </div>
            <div class="col-sm-4"></div>
            <div>

            </div>

</body>

</html>