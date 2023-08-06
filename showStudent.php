<?php

    require "config/connDB.php";

    if ($_GET['studentDelete']){
        $id = $_GET['stdNo_del'];
        $qry = "DELETE FROM STUDENT_TB WHERE STD_NO = '$id' ;";
        $result = mysqli_query($conn, $qry);

    }

    $qry = "SELECT STD_NO, FNAME, LNAME, EMAIL, MOBILE, DOB, S.MAJOR, ADDRESS, CREATED_AT , M.NAME, M.ID FROM student_tb S , major_tb M WHERE S.MAJOR = M.ID;";
    $result = mysqli_query($conn, $qry);
    $students = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_free_result($result);
    mysqli_close($conn);


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Page Title</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet" href="https://bootswatch.com/4/materia/bootstrap.min.css">
</head>

<body>


    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#">Maba</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01"
            aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item"><a class="nav-link">Products</a></li>
                <li class="nav-item"><a class="nav-link">Users</a></li>
            </ul>
            <div class="form-inline my-2 my-lg-0">
                <button class="btn btn-secondary my-2 my-sm-0 ml-4">Profile</button>
                <button class="btn btn-secondary my-2 my-sm-0 ml-2">LogOut</button>
            </div>
        </div>
    </nav>

    <div class="container" style="margin-top:100px">
        <hr />
        <h1 style="display: inline-block;">Students</h1>
        <a href="addStudent.php" class="btn btn-success float-right">Add Student</a>
        <hr />

        
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">DOB</th>
                    <th scope="col">Major</th>
                    <th scope="col">Address</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($students as $std) {?>
                <tr>
                    <td> <?php echo $std['STD_NO'] ?> </td>
                    <td> <?php echo $std['FNAME'] ?> </td>
                    <td> <?php echo $std['LNAME'] ?> </td>
                    <td> <?php echo $std['EMAIL'] ?> </td>
                    <td> <?php echo $std['MOBILE'] ?> </td>
                    <td> <?php echo $std['DOB'] ?> </td>
                    <td> <?php echo $std['NAME'] ?> </td>
                    <td> <?php echo $std['ADDRESS'] ?> </td>
                    <td>
                    <button class="btn btn-outline-primary">Edit</button>   
                    
                    |
                        <form action="" method="get">
                            <input type="hidden" name="stdNo_del" value="<?php echo $std['STD_NO'] ?>">
                            <button name="studentDelete" value="studentDelete" class="btn btn-danger">Delete</button> 
                        </form>
                        
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>

        <footer class="my-5 pt-5 text-muted text-center text-small">
            <p class="mb-1">© 2017-2019 Maba</p>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="#">Privacy</a></li>
                <li class="list-inline-item"><a href="#">Terms</a></li>
                <li class="list-inline-item"><a href="#">Support</a></li>
            </ul>
        </footer>
    </div>
</body>

</html>