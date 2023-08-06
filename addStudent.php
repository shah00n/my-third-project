<?php 
    include "config/connDB.php";
    echo "test1";
    if (isset($_POST['saveStudent'])){
        echo "test2";
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $dob = $_POST['dob'];
        $major = $_POST['major'];
        $address = $_POST['address'];


        $qry = "INSERT INTO STUDENT_TB (FNAME, LNAME, EMAIL, MOBILE, DOB, MAJOR, ADDRESS) VALUES('$fname', '$lname', '$email', '$mobile', '$dob', '$major', '$address' );";
        $result = mysqli_query($conn, $qry);
        // $cnt = mysqli_fetch_rows($conn);
        if($result){
            header('Location:showStudent.php');
            exit();
        } else{
            echo $qry;
            echo mysqli_error();
        }

        mysqli_close($conn);
    }   else{
        echo "test3";
    }

    
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Add Student</title>

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
                <li class="nav-item"><a class="nav-link">About</a></li>
            </ul>
            <div class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2 ml-15" type="text" placeholder="Search" />
                <a class="p-cart">
                    <span class="material-icons md-48 ">shopping_cart</span>
                    <span class="badge badge-light bg-secondary">4</span>
                </a>
                <button class="btn btn-secondary my-2 my-sm-0 ml-4">Sign up</button>
                <button class="btn btn-secondary my-2 my-sm-0 ml-2">Login</button>
            </div>
        </div>
    </nav>

    <div class="container" style="margin-top:100px">
        <br />
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h4>Add Student</h4>
                        <hr />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                       
                        <form action="" method="post">

                            <div class="form-group row">
                                <label for="fname" class="col-4 col-form-label">First Name</label>
                                <div class="col-8">
                                    <input id="fname" name="fname" placeholder="name" class="form-control here"
                                        type="text" />
                                    <div class="valid-feedback">Looks good!</div>

                                    <div class="invalid-feedback">Please first name is required.</div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="lname" class="col-4 col-form-label">Last Name</label>
                                <div class="col-8">
                                    <input id="lname" name="lname" placeholder="name" class="form-control here"
                                        type="text" />
                                    <div class="valid-feedback">Looks good!</div>

                                    <div class="invalid-feedback">Please last name is required.</div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-4 col-form-label">Email</label>
                                <div class="col-8">
                                    <input id="email" name="email" placeholder="title" class="form-control here"
                                        type="email" />
                                    <div class="valid-feedback">Looks good!</div>

                                    <div class="invalid-feedback">
                                        Please title is required.
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="mobile" class="col-4 col-form-label">Mobile</label>
                                <div class="col-8">
                                    <input id="mobile" name="mobile" placeholder="title" class="form-control here"
                                        type="text" />
                                    <div class="valid-feedback">Looks good!</div>

                                    <div class="invalid-feedback">
                                        Please title is required.
                                    </div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="dob" class="col-4 col-form-label">DOB</label>
                                <div class="col-8">
                                    <input id="dob" name="dob" placeholder="subTitle"
                                        class="form-control here" type="text" />
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">
                                        Please SubTitle is required.
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="major" class="col-4 col-form-label">Major</label>
                                <div class="col-8">
                                    

                                        <select name="major" id="major" placeholder="price" class="form-control here">
                                            <?php 
                                                include "config/connDB.php";
                                                $qry = "SELECT * FROM MAJOR_TB;";
                                                $result = mysqli_query($conn, $qry);
                                                $cnt = mysqli_num_rows($result);
                                                for($i=0; $i<$cnt; $i++){
                                                    $row = mysqli_fetch_array($result);
                                                    
                                                    echo "<option value=" .  $row['ID'] . ">" .  $row['NAME'] . "</option>";
                                                }
                                            ?>
                                            
                                        </select>
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">
                                        Please Price is required.
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address" class="col-4 col-form-label">address</label>
                                <div class="col-8">
                                    <input id="address" name="address" placeholder="price" class="form-control here"
                                        type="text" />
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">
                                        Please Price is required.
                                    </div>
                                </div>
                            </div>

                            

                            
                            <div class="form-group row">
                                <div class="offset-4 col-8">
                                    <button name="saveStudent" type="submit" class="btn btn-primary">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

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