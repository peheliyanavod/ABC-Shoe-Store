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
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
</head>
<body>
<?php
    @include_once 'header.php';
?> 
<section class="home" id="home">
<h1>Our Brands</h1><br>
<p>From premium international brands to local labels, browse through our wide selection of branded shoes until you find your favourite.</p>
<div class="row">
    <div class="swiper brands-slider">
        <div class="swiper-wrapper">
            <a href="#" class="swiper-slide"><img src="images/Brand/brand-1.png" alt=""></a>
            <a href="#" class="swiper-slide"><img src="images/Brand/brand-2.jpeg" alt=""></a>
            <a href="#" class="swiper-slide"><img src="images/Brand/brand-3.png" alt=""></a>
            <a href="#" class="swiper-slide"><img src="images/Brand/brand-4.png" alt=""></a>
            <a href="#" class="swiper-slide"><img src="images/Brand/brand-5.png" alt=""></a>
            <a href="#" class="swiper-slide"><img src="images/Brand/brand-6.png" alt=""></a>
            <a href="#" class="swiper-slide"><img src="images/Brand/brand-7.png" alt=""></a>
            <a href="#" class="swiper-slide"><img src="images/Brand/brand-8.png" alt=""></a>
        </div>
    </div>
</div>

</section>
            

    
    <script src="script.js"></script>
</body>
</html>