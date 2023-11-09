<?php
    @include_once 'config.php';
    session_start();
    if(isset($_SESSION['userID'])){
        $userID= $_SESSION['userID'];
        $_SESSION['userID'] = $userID;
    }

    if(isset($_GET['logout'])){
        session_destroy();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABC Shoes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
</head>
<body>

<?php
    @include_once 'header.php';
?>               
<br>
<section class="outbox">
    <h1>Products</h1>
    <?php
        $select_products = "SELECT * FROM products;";
        $get_product = mysqli_query($connect,$select_products);
        if(mysqli_num_rows($get_product)>0){
            while($row=mysqli_fetch_assoc($get_product)){
                echo '
                <div class="box">
                <img src="upload/'.$row['image'].'">
                <div class="inbox">
                    <h3>'.$row['productName'].'</h3>
                    <h4>Rs.'.$row['price'].'.00</h4>
                    <p>'.$row['description'].'</p>
                </div>
            </div>
                ';
            }
        }
    ?>
    

</section>

    


    
</body>
</html>