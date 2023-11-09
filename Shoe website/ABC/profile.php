<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABC Shoes | Profile</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>

<?php
    @include_once 'config.php';
    
    session_start();

    @include_once 'header.php';

    if(isset($_SESSION['userID'])){
        $userID = $_SESSION['userID'];

        $select = "SELECT * FROM users where userID ='$userID';";
        $result = mysqli_query($connect,$select);
        $row = mysqli_fetch_assoc($result);
        $name = $row['name'];
        $phoneNumber = $row['phoneNumber'];
        $email = $row['email'];

        echo '
        <div class="profile-container">
            <div class="profile">
                <p>Name : '.$name.'</p>
                <p>Phone Number : '.$phoneNumber.'</p>
                <p>Email : '.$email.'</p><br><br><br>
                <a href="home.php?logout" class="form-btn">Log out</a>
            </div>         
        </div>
        ';

        
    }
    else{
        header('location:login_form.php');
    }
?>

<?php
        @include_once 'footer.php';
?>

</body>
</html>