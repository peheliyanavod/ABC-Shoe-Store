<?php
    @include_once 'config.php';
    
    session_start();

    if(isset($_SESSION['userID'])){
        $userID=$_SESSION['userID'];
    }

    @include_once 'header.php';

    if(isset($_POST['add'])){
        $productName = mysqli_real_escape_string($connect,$_POST['productName']);
        $price = mysqli_real_escape_string($connect,$_POST['price']);
        $quantity = mysqli_real_escape_string($connect,$_POST['quantity']);
        $image = $_FILES['img']['name'];
        $description = mysqli_real_escape_string($connect,$_POST['description']);
        $imageLoc = 'upload/'.$image;
        $temp_image = $_FILES['img']['tmp_name'];

        $insert = "INSERT INTO `products`(`productName`, `quantity`, `price`, `image`, `description`) VALUES ('$productName','$quantity','$price','$image','$description');";
        $result_insert = mysqli_query($connect,$insert);

        if($result_insert){
            move_uploaded_file($temp_image,$imageLoc);
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABC Shoes | Admin</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>

    <section id="add-product">
        <div class="form-container">
            <form enctype="multipart/form-data" method="post">
                <h3>Add products</h3>

                <input type="text" name="productName" placeholder="Product Name" required>
                <input type="text" name="price" placeholder="Price" required>
                <input type="text" name="quantity" placeholder="Quantity" required>
                <input type="file" name="img" accept="image/png,image/jpg,image/jpeg" required>
                <input type="text" name="description" placeholder="Description" required>

                <input type="submit" name="add" value="Add" class="form-btn">
            </form>
        </div>
    </section>

    <?php


        if(isset($_SESSION['userID'])){
            $userID=$_SESSION['userID'];

            $sql="SELECT * FROM users where userID = '$userID';";
            $select_user= mysqli_query($connect,$sql);
    
            if(mysqli_num_rows($select_user)>0){
                $row=mysqli_fetch_assoc($select_user);
                $email=$row['email'];
                $pass=$row['password'];
                $select_super_admin=mysqli_query($connect,"SELECT * FROM superadmin where email='$email' and password='$pass';");
    
                if(mysqli_num_rows($select_super_admin)>0){
                    echo '<section id="add-admin">
                    <div class="form-container">
                        <form action="" method="post">
                            <h3>Add admins</h3>
                            <input type="text" name="name" required placeholder="Name">
                            <input type="email" name="email" required placeholder="Email">
                            <input type="text" name="phoneNumber" required placeholder="Phone Number (Sri Lankan)">
                            <input type="password" name="password" required placeholder="Password">
                            <input type="password" name="confirmPassword" required placeholder="Confirm Password">
                            <input type="submit" name="submit" value="Add" class="form-btn">
                        </form>
                    </div>
                </section>';
    
                if(isset($_POST['submit'])){
                    $name = mysqli_real_escape_string($connect,$_POST['name']);
                    $email = mysqli_real_escape_string($connect,$_POST['email']);
                    $phoneNumber = mysqli_real_escape_string($connect,$_POST['phoneNumber']);
                    $pass = md5($_POST['password']);
                    $cpass = md5($_POST['confirmPassword']);
                }
    
                $select = "SELECT * FROM users where email='$email' and password = '$pass';";
                $result = mysqli_query($connect,$select);
    
                if(mysqli_num_rows($result)>0){
                    $error[] = "User Already Exists!";
                }
                elseif(strlen($phoneNumber)!=10 || $phoneNumber[0]!='0'){
                    $error[] = 'Invalid Phone Number!';
                }
                elseif(strlen($email)<10 || substr($email,-10)!='@gmail.com'){
                    $error[] = 'Invalid Email Address!';
                }
                else{
                    if($pass!=$cpass){
                        $error[] = "Password Not Matched!";
                    }
                    else{
                        $insert_users = "INSERT INTO users (name,email,phoneNumber,password) VALUES('$name','$email','$phoneNumber','$pass');";
                        $insert_admins = "INSERT INTO admins (name,email,phoneNumber,password) VALUES('$name','$email','$phoneNumber','$pass');";
                        mysqli_query($connect,$insert_users);
                        mysqli_query($connect,$insert_admins);
                    }
                }
                }
            }
        }

        
    ?>

<?php
        @include_once 'footer.php';
?>
   
</body>
</html>