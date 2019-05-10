<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>#</title>
    <meta name="viewport" content="width=device-width, initial-scale =1">
    <script src="../libs/jquery/jquery.min.js"></script>
    <link rel="stylesheet" href="../libs/bootstrap/bootstrap-grid.min.css">
    <link rel="stylesheet" href="../libs/fontawesome/css/all.css">
    <link rel="stylesheet" href="header-footer.css">
    <link rel="stylesheet" href="../css/content.css">    <!-- here is conflict with products.css file -->
    <link rel="stylesheet" href="../css/products.css">  <!-- here is conflict with content.css file -->
    <link rel="stylesheet" href="../css/product-admin.css">
    <link rel="stylesheet" href="../css/contact.css">
    <link rel="stylesheet" href="../css/feedback_styles.css"> <!-- here is a problem with contact page if this file working -->
	<link rel="stylesheet" href="../css/referal.css">
	<link rel="stylesheet" href="../css/membership.css">
    <link rel="stylesheet" href="../css/feedback.css"><!--rohit modified his feature css-->
    <link rel="stylesheet" href="../css/register.css"><!--rohit modified his feature css-->
    <link rel="stylesheet" href="../css/login.css"><!--rohit modified his feature css-->
</head>

<body>
    <header id="header">
        <div class="logo-wrapper">
            <a href="index.php">
                <img src="../img/logo.png" alt="logo picture" class="img-responsive logo">
            </a>
        </div>
        <nav id="main-menu">
            <ul>
                <li><a href="#"><i class='fas fa-map-marker-alt'></i>Location</a></li>
                <li><a href="addContactForm.php"><i class="far fa-address-book"></i>Contact</a></li>
                <li><a href="#"><i class="fab fa-centos"></i>Premium</a></li>
                <li><a href="#"><i class="fas fa-shopping-basket"></i> Your shop</a></li>
                <li><a href="#"><i class="fas fa-user"></i>Sign In</a></li>
            </ul>
        </nav>
        <div class="hamburger-wrapper">
            <div class="hamburger"></div>
        </div>
        <nav class="mobile-menu">
            <ul>
                <li><a href="#"><i class='fas fa-map-marker-alt'></i>Location</a></li>
                <li><a href="addContactForm.php"><i class="far fa-address-book"></i>Contact</a></li>
                <li><a href="#"><i class="fab fa-centos"></i>Premium</a></li>
                <li><a href="#"><i class="fas fa-shopping-basket"></i> Your shop</a></li>
                <li><a href="#"><i class="fas fa-user"></i>Sign In</a></li>
            </ul>
        </nav>
    </header>