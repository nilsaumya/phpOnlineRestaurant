<?php require('config.php') ?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <title>Restoran - Bootstrap Restaurant Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.html" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&amp;family=Nunito:wght@600;700;800&amp;family=Pacifico&amp;display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="npm/bootstrap-icons%401.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <!-- <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div> -->
        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
                <a href="#" class="navbar-brand p-0">
                    <h1 class="text-primary m-0"><i class="fa fa-utensils me-3"></i>Restoran</h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <?php require("navbar.php") ?>
            </nav>

            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Food Menu</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Pages</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Menu</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->


        <!-- Menu Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Food Menu</h5>
                    <h1 class="mb-5">Most Popular Items</h1>
                </div>
                <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">
                    <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                        <?php
                        $src="SELECT * FROM menu";
                        $m_id=array();
                        $rs=mysqli_query($con,$src)or die(mysqli_error($con));
                        if(mysqli_num_rows($rs)>0){
                            $c=1;
                            while($rec=mysqli_fetch_assoc($rs)){
                                array_push($m_id,$rec['menu_id']);
                                ?>
                                <li class="nav-item">
                                    <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3 <?php if($c==1){ echo 'active'; } ?>" data-bs-toggle="pill" href="#tab-<?php echo $rec['menu_id']; ?>">
                                        <i class="fa fa-coffee fa-2x text-primary"></i>
                                        <div class="ps-3">
                                            <h6 class="mt-n1 mb-0"><?php echo $rec['m_name'].'['.$rec['type'].']' ?></h6>
                                        </div>
                                    </a>
                                </li>
                                <?php
                                $c++;
                            }
                        }else{
                            ?>
                            <li class="nav-item">
                            <a class="d-flex align-items-center text-start mx-3 me-0 pb-3" data-bs-toggle="pill" href="#tab-3">
                                <i class="fa fa-utensils fa-2x text-primary"></i>
                                <div class="ps-3">
                                    <h6 class="mt-n1 mb-0">Sorry No Menu Available</h6>
                                </div>
                            </a>
                            </li>
                            <?php
                        }
                        ?>
                        
                        <!-- <li class="nav-item">
                            <a class="d-flex align-items-center text-start mx-3 pb-3" data-bs-toggle="pill" href="#tab-2">
                                <i class="fa fa-hamburger fa-2x text-primary"></i>
                                <div class="ps-3">
                                    <small class="text-body">Special</small>
                                    <h6 class="mt-n1 mb-0">Launch</h6>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="d-flex align-items-center text-start mx-3 me-0 pb-3" data-bs-toggle="pill" href="#tab-3">
                                <i class="fa fa-utensils fa-2x text-primary"></i>
                                <div class="ps-3">
                                    <small class="text-body">Lovely</small>
                                    <h6 class="mt-n1 mb-0">Dinner</h6>
                                </div>
                            </a>
                        </li> -->
                    </ul>
                    <div class="tab-content">
                        <?php
                        $t=1;
                        foreach($m_id as $k=>$v){
                            $itemRs;
                            ?>
                            <div id="tab-<?php echo $v ?>" class="tab-pane fade show p-0 <?php if($t==1){ echo "active" ;} ?>">
                                <div class="row g-4">
                                    <?php
                                    // echo $v;
                                    $itemRs=mysqli_query($con,"SELECT * FROM items WHERE menu_id=".$v)or die(mysqli_error($con));
                                    if(mysqli_num_rows($itemRs)>0){
                                        while($itemRec=mysqli_fetch_assoc($itemRs)){
                                            ?>
                                            <div class="col-lg-6">
                                                <div class="d-flex align-items-center">
                                                    <img class="flex-shrink-0 img-fluid rounded" src="<?php echo $itemRec['i_image'] ?>" alt="" style="width: 80px;">
                                                    <div class="w-100 d-flex flex-column text-start ps-4">
                                                        <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                            <span><?php echo $itemRec['i_name'] ?></span>
                                                            <span class="text-primary">Rs<?php echo $itemRec['i_price'] ?></span>
                                                            
                                                        </h5>
                                                        <small class="fst-italic">
                                                        <form name="<?php echo $itemRec['i_name'] ?>" method="post" action="addtocart.php">
                                                            <input type="hidden" name="items_id" value="<?php echo $itemRec['items_id'] ?>">
                                                                <input type="hidden" name="i_name" value="<?php echo $itemRec['i_name'] ?>">
                                                                <input type="hidden" name="i_price" value="<?php echo $itemRec['i_price'] ?>">
                                                                <input type="hidden" name="i_qty" value="1">
                                                                <input type="submit" name="cart" value="Add to Cart" class="btn btn-primary">
                                                            </form>
                                                        </small>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                    }else{
                                        ?>
                                        <div class="col-lg-6">
                                            <div class="d-flex align-items-center">
                                                <!-- <img class="flex-shrink-0 img-fluid rounded" src="img/menu-1.jpg" alt="" style="width: 80px;"> -->
                                                <div class="w-100 d-flex flex-column text-start ps-4">
                                                    <h5 class="d-flex justify-content-between border-bottom pb-2 text-align">
                                                        <span class="text-danger">Item Not Found</span>
                                                        <!-- <span class="text-primary">Rs115</span> -->
                                                    </h5>
                                                    <!-- <small class="fst-italic">A chicken burger makes for a quick midweek meal or weekend BBQ’s with friends!</small> -->
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <?php
                            $t++;
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
        if(isset($_COOKIE['shopping_cart'])){
            echo $_COOKIE['shopping_cart'];
        }
        ?>
        <!-- Menu End -->
        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-lg-3 col-md-6">
                        <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Company</h4>
                        <a class="btn btn-link" href="#">About Us</a>
                        <a class="btn btn-link" href="#">Contact Us</a>
                        <a class="btn btn-link" href="#">Reservation</a>
                        <a class="btn btn-link" href="#">Privacy Policy</a>
                        <a class="btn btn-link" href="#">Terms & Condition</a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Contact</h4>
                        <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p>
                        <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@example.com</p>
                        <div class="d-flex pt-2">
                            <a class="btn btn-outline-light btn-social" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light btn-social" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social" href="#"><i class="fab fa-youtube"></i></a>
                            <a class="btn btn-outline-light btn-social" href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Opening</h4>
                        <h5 class="text-light fw-normal">Monday - Saturday</h5>
                        <p>09AM - 09PM</p>
                        <h5 class="text-light fw-normal">Sunday</h5>
                        <p>10AM - 08PM</p>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Newsletter</h4>
                        <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                        <div class="position-relative mx-auto" style="max-width: 400px;">
                            <input class="form-control border-primary w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                            <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="#">Your Site Name</a>, All Right Reserved. 
							
							<!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
							Designed By <a class="border-bottom" href="https://htmlcodex.com/">HTML Codex</a><br><br>
                            Distributed By <a class="border-bottom" href="https://themewagon.com/" target="_blank">ThemeWagon</a>
                        </div>
                        <div class="col-md-6 text-center text-md-end">
                            <div class="footer-menu">
                                <a href="#">Home</a>
                                <a href="#">Cookies</a>
                                <a href="#">Help</a>
                                <a href="#">FQAs</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="npm/bootstrap%405.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>


<!-- Mirrored from themewagon.github.io/restoran/menu.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Dec 2023 05:23:17 GMT -->
</html>