<?php

  @include 'config.php';
  
  session_start();

  @include_once 'header.php';
  
  if(isset($_POST['submit'])){
    $email = mysqli_real_escape_string($connect,$_POST['email']);
    $pass = md5($_POST['password']);

    $select = "SELECT * FROM users WHERE email = '$email' and password = '$pass';";
    $result = mysqli_query($connect,$select);

    if(mysqli_num_rows($result)>0){
        $row = mysqli_fetch_array($result);
        $_SESSION['name'] = $row['name'];
        $_SESSION['userID'] = $row['userID'];
        header('location:home.php');
    }
    else{
        $error[] = 'Incorrect Email or Password!';
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABC Shoes | Login</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>

    <div class="form-container">
        <form action="" method="post">
            <h3>Login</h3>
            <?php
                if(isset($error)){
                    foreach($error as $error){
                        echo '<span class="error-msg">'.$error.'</span>';
                    }
                }
            ?>
            <input type="email" name="email" required placeholder="Email">
            <input type="password" name="password" required placeholder="Password">
            <input type="submit" name="submit" value="Log In" class="form-btn">
            <p>don't have an account? <a href="register_form.php">register now</a></p>
        </form>
    </div>

<?php
    @include_once 'footer.php';
?>
    
</body>
</html>