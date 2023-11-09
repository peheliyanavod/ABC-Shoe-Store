<?php

?>

<header class="header">
        <div class="header-1">
            <a href="#" class="logo"><img src="images/ABC_logo.png" alt=""></a>

            <div class="icons">
                <a href="profile.php" class="fas fa-user">
                    <?php 
                    if(isset($_SESSION['name'])){
                        $name = $_SESSION['name'];
                        echo $name;
                    }  
                ?></a>
            </div>
            
        </div>

        <div class="header-2">
            <nav class="navbar">
                <a href="home.php">Home</a>
                <a href="brands.php">Brands</a>
                <a href="about.php">About</a>
                <a href="contact.php">Contact</a>
                <?php

                    if(isset($_SESSION['userID'])){
                        $userID= $_SESSION['userID'];

                        $sql = "SELECT * from users where userID= '$userID' ;";
                        $select_user = mysqli_query($connect,$sql);

                        if(mysqli_num_rows($select_user)>0){
                            $row =mysqli_fetch_assoc($select_user);
                            $email=$row['email'];
                            $pass=$row['password'];
                            $select_admin = mysqli_query($connect,"SELECT * from admins where email='$email'and password='$pass'");

                            if(mysqli_num_rows($select_admin)>0){
                                echo '<a href="adminpanel.php">Admin</a>';
                            }
                        }

                    }

                ?>
            </nav>
        </div>
    </header>