<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
        span {
            color: red;
        }
    </style>
    <title>Document</title>
</head>
<body>

<?php

$nameErr = $emailErr = $phoneErr = $genderErr = $agreeErr = "";

$name = $email = $phone = $gender = $agree = "";

function input_data ($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// echo '<pre>';
// var_dump($_SERVER);

if ( $_SERVER['REQUEST_METHOD'] == "POST" ) {

    if ( empty($_POST['name'])) {

        $nameErr = 'name is required.';

        }  else {

        $name = input_data($_POST['name']);
        if(!preg_match("/^[A-Za-z ]*$/",$name)) {

            $nameErr = 'only alphabets and whitespace are allowed.';

        }

    }

    if ( empty($_POST['email'])) {

        $emailErr = 'email is required.';

        }  else {

        $email = input_data($_POST['email']);
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {

            $emailErr = 'please enter a valid email.';

        }

    }

    if ( empty($_POST['phone'])) {

        $phoneErr = 'phone number is required.';

        }  else {

        $phone = input_data($_POST['phone']);
        if(!preg_match("/^(\+98|0)?9[0-9]{9}$/",$phone)) {

            $phoneErr = 'please enter a phone number like +989 or 09.';

        }

    }

    if ( empty($_POST['gender'])) {

        $genderErr = 'gender is required.';

        }  else {

        $gender = input_data($_POST['gender']);

    }

    if ( empty($_POST['agree'])) {

        $agreeErr = 'gender is required.';

        }  else {

        $gender = input_data($_POST['gender']);

    }
    

}


 ?>

    <div class="container">
        <div class="row">

        <div class="col-12">
            <h2>Registration Form</h2>
        </div>

        <div class="offset-md-2 col-md-8">
            <form class="row" action="index.php" method="POST">
                <div class="col-md-6">
                    <label for="">Name : </label>
                    <input type="text" name="name">
                    <span><?= $nameErr; ?></span>
                </div>

                <div class="col-md-6">
                    <label for="">Email : </label>
                    <input type="email" name="email">
                    <span><?= $emailErr; ?></span>
                </div>
                
                <div class="col-md-6">
                    <label for="">Phone Number : </label>
                    <input type="text" name="phone">
                    <span><?= $phoneErr; ?></span>
                </div>
                                
                <div class="col-md-6">
                    <label for="">Gender : </label>
                    <input type="radio" name="gender" value="male">Male
                    <input type="radio" name="gender" value="femail">Female
                    <span><?= $genderErr; ?></span>
                </div>

                <div class="col-md-6">
                    <label for=""> agree vs. condition </label>
                    <input type="checkbox" name="agree">
                    <span><?= $agreeErr; ?></span>

                </div>

                <div class="col-md-6">
                    <input type="submit" name="submit">
                </div>
            </form>

           <?php if(isset($_POST['submit'])) {
                if($nameErr =="" && $emailErr =="" && $phoneErr =="" && $genderErr =="" && $agreeErr =="") {
                    echo '<h2 class="text-success">form submit successfully</h2>';
                } else {
                    echo '<h2 class="text-danger">Error in form submit</h2>';
                }
           }
            ?>

        </div>

        </div>
    </div>

    

</body>
</html>