<?php

  @include 'config.php';
  
  session_start();
  @include_once 'header.php';
  
  if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($connect,$_POST['name']);
    $email = mysqli_real_escape_string($connect,$_POST['email']);
    $phoneNumber = mysqli_real_escape_string($connect,$_POST['phoneNumber']);
    $pass = md5($_POST['password']);
    $cPass = md5($_POST['confirmPassword']);

    $select = "SELECT * FROM users WHERE email = '$email' and password = '$pass';";
    $result = mysqli_query($connect,$select);

    if(mysqli_num_rows($result)>0){
        $error[] = 'User Already Exist!';
    }
    elseif(strlen($phoneNumber)!=10 || $phoneNumber[0]!='0'){
        $error[] = 'Invalid Phone Number!';
    }
    elseif(strlen($email)<10 || substr($email,-10)!='@gmail.com'){
        $error[] = 'Invalid Email Address!';
    }
    else{
        if($pass != $cPass){
            $error[] = 'Password Not Matched!';
        }
        else{
            $insert = "INSERT INTO users (name,email,phoneNumber,password) VALUES('$name','$email','$phoneNumber','$pass');";
            mysqli_query($connect,$insert);
            header('location:login_form.php');
        }
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABC Shoes | Register</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>

    <div class="form-container">
        <form action="" method="post">
            <h3>register</h3>
            <?php
                if(isset($error)){
                    foreach($error as $error){
                        echo '<span class="error-msg">'.$error.'</span>';
                    }
                }
            ?>
            <input type="text" name="name" required placeholder="Name">
            <input type="email" name="email" required placeholder="Email">
            <input type="text" name="phoneNumber" required placeholder="Phone Number (Sri Lankan)">
            <input type="password" name="password" required placeholder="Password">
            <input type="password" name="confirmPassword" required placeholder="Confirm Password">
            <input type="submit" name="submit" value="Register now" class="form-btn">
            <p>already have an account? <a href="login_form.php">Login now</a></p>
        </form>
    </div>
<?php
    @include_once 'footer.php';
?>
    
</body>
</html>