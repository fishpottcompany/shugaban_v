<?php 

// CALLING CONFIG FILE
require_once("app/config.php");

// CALLING MODELS
include_once "app/Models/MessageModel.php";

//CALLING CONTROLLERS
include_once "app/Controllers/DatabaseController.php";
include_once "app/Controllers/QueryController.php";


// MAKING INSTANCES OF MODELS
$messageModelObject = new Message();

// MAKING INSTANCES OF CONTROLLERS 
$queryController = new QueryController();

// OTHER VARIABLE AND OBJECTS
$mysqli = new mysqli(HOST, USER, USER_PASSWORD, DATABASE_NAME);



// CREATING PREPARED STATEMENT QUERY OBJECT
$query = $queryController->prepareAndExecuteQuery($mysqli, "SELECT id, name, cover, portrait, url FROM " . MOVIES_TABLE . " ORDER BY id DESC LIMIT 2", 0, "", "");
if($query === false){
    $messageModelObject->error_exist = false;
    $messageModelObject->body = "Fetching last 3 movies failed";
    var_dump($messageModelObject->body);
}

// GETTING RESULTS
$query_results_array = $queryController->getQueryResults($query, array("id", "name", "cover", "portrait", "url"), 5, 2);


//var_dump($query_results_array);
//var_dump($messageModelObject->error_exist);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Title -->
    <title>Shugaban - Home Of Quality Nollywood Entertainment</title>

    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon -->
    <link href="https://legacy.shugaban.com/assets/images/favicon/favicon.png" rel="icon" type="image/png">
    <link href="https://legacy.shugaban.com/assets/images/favicon/favicon-144x144.png" rel="apple-touch-icon" type="image/png" sizes="144x144">
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="assets/vendor/font-awesome/css/all.min.css">
    <link rel="stylesheet" href="assets/vendor/hs-mega-menu/dist/hs-mega-menu.min.css">
    <link rel="stylesheet" href="assets/vendor/dzsparallaxer/dzsparallaxer.css">
    <link rel="stylesheet" href="assets/vendor/cubeportfolio/css/cubeportfolio.min.css">
    <link rel="stylesheet" href="assets/vendor/aos/dist/aos.css">
    <link rel="stylesheet" href="assets/vendor/slick-carousel/slick/slick.css">
    <link rel="stylesheet" href="assets/vendor/fancybox/dist/jquery.fancybox.css">

    <!-- CSS Vodi Template -->
    <link rel="stylesheet" href="assets/css/theme.css">
</head>
<body>
    <!-- ========== HEADER ========== -->
    <header id="header" class="header left-aligned-navbar"
        data-hs-header-options='{
            "fixMoment": 1000,
            "fixEffect": "slide"
        }'>
        <div class="header-section shadow-soft">
            <div id="logoAndNav" class="container-fluid px-md-5">
                <!-- Nav -->
                <nav class="js-mega-menu navbar navbar-expand-xl py-0 position-static justify-content-start">
                    <!-- Responsive Toggle Button -->
                    <button type="button" class="navbar-toggler btn btn-icon btn-sm rounded-circle mr-2"
                        aria-label="Toggle navigation"
                        aria-expanded="false"
                        aria-controls="navBar"
                        data-toggle="collapse"
                        data-target="#navBar">
                        <span class="navbar-toggler-default">
                            <svg width="14" height="14" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                                <path fill="currentColor" d="M17.4,6.2H0.6C0.3,6.2,0,5.9,0,5.5V4.1c0-0.4,0.3-0.7,0.6-0.7h16.9c0.3,0,0.6,0.3,0.6,0.7v1.4C18,5.9,17.7,6.2,17.4,6.2z M17.4,14.1H0.6c-0.3,0-0.6-0.3-0.6-0.7V12c0-0.4,0.3-0.7,0.6-0.7h16.9c0.3,0,0.6,0.3,0.6,0.7v1.4C18,13.7,17.7,14.1,17.4,14.1z"/>
                            </svg>
                        </span>
                        <span class="navbar-toggler-toggled">
                            <svg width="14" height="14" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                                <path fill="currentColor" d="M11.5,9.5l5-5c0.2-0.2,0.2-0.6-0.1-0.9l-1-1c-0.3-0.3-0.7-0.3-0.9-0.1l-5,5l-5-5C4.3,2.3,3.9,2.4,3.6,2.6l-1,1 C2.4,3.9,2.3,4.3,2.5,4.5l5,5l-5,5c-0.2,0.2-0.2,0.6,0.1,0.9l1,1c0.3,0.3,0.7,0.3,0.9,0.1l5-5l5,5c0.2,0.2,0.6,0.2,0.9-0.1l1-1 c0.3-0.3,0.3-0.7,0.1-0.9L11.5,9.5z"/>
                            </svg>
                        </span>
                    </button>
                    <!-- End Responsive Toggle Button -->


                    <!-- Logo -->
                    <a class="navbar-brand w-auto mr-xl-5 mr-wd-8" href="../home/index.html" aria-label="Vodi">                        
                        <img src="assets/img/logo.png" />
                    </a>
                    <!-- End Logo -->

                    <!-- Navigation -->
                    <div id="navBar" class="collapse navbar-collapse order-1 order-xl-0">
                        <div class="navbar-body header-abs-top-inner">
                            <ul class="navbar-nav">
                                <li class="hs-has-mega-menu navbar-nav-item">
                                    <a id="homeMegaMenu" class="hs-mega-menu-invoker nav-link font-secondary" href="javascript:;" aria-haspopup="false" aria-expanded="false"><b>Home</b></a>
                                    <div class="hs-mega-menu dropdown-menu w-100" aria-labelledby="homeMegaMenu">
                                        
                                    </div>
                                </li>
                                <li class="hs-has-mega-menu navbar-nav-item">
                                    <a id="homeMegaMenu" class="hs-mega-menu-invoker nav-link font-secondary" href="javascript:;" aria-haspopup="false" aria-expanded="false"><b>Series</b></a>
                                    <div class="hs-mega-menu dropdown-menu w-100" aria-labelledby="homeMegaMenu">
                                        
                                    </div>
                                </li>
                                <li class="hs-has-mega-menu navbar-nav-item">
                                    <a id="homeMegaMenu" class="hs-mega-menu-invoker nav-link font-secondary" href="javascript:;" aria-haspopup="false" aria-expanded="false"><b>Featured</b></a>
                                    <div class="hs-mega-menu dropdown-menu w-100" aria-labelledby="homeMegaMenu">
                                        
                                    </div>
                                </li>
                                <li class="hs-has-mega-menu navbar-nav-item">
                                    <a id="homeMegaMenu" class="hs-mega-menu-invoker nav-link font-secondary" href="javascript:;" aria-haspopup="false" aria-expanded="false"><b>Free</b></a>
                                    <div class="hs-mega-menu dropdown-menu w-100" aria-labelledby="homeMegaMenu">
                                        
                                    </div>
                                </li>
                                <li class="hs-has-mega-menu navbar-nav-item">
                                    <a id="homeMegaMenu" class="hs-mega-menu-invoker nav-link font-secondary" href="javascript:;" aria-haspopup="false" aria-expanded="false"><b>Live</b></a>
                                    <div class="hs-mega-menu dropdown-menu w-100" aria-labelledby="homeMegaMenu">
                                        
                                    </div>
                                </li>
                                <li class="hs-has-mega-menu navbar-nav-item">
                                    <a id="homeMegaMenu" class="hs-mega-menu-invoker nav-link font-secondary" href="javascript:;" aria-haspopup="false" aria-expanded="false"><b>Join Cinema</b></a>
                                    <div class="hs-mega-menu dropdown-menu w-100" aria-labelledby="homeMegaMenu">
                                        
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- End Navigation -->

                    <div class="d-flex align-items-center ml-auto">
                        <form class="d-none d-xl-block" style="border-color: #495057;">
                            <label class="sr-only">Search</label>
                            <div class="input-group" style="border-color: #495057;">
                                <input  style="border-color: #495057;" type="text" class="search-form-control form-control py-2 pl-4 min-width-250 rounded-pill" name="search" id="searchproduct-item" aria-describedby="searchProduct1" required="">
                                <div class="input-group-append position-absolute top-0 bottom-0 right-0  z-index-4">
                                    <button class="d-flex py-2 px-3 border-0 bg-transparent align-items-center" type="button" id="searchProduct1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" style="fill: #656565;">
                                            <path d="M7 0C11-0.1 13.4 2.1 14.6 4.9 15.5 7.1 14.9 9.8 13.9 11.4 13.7 11.7 13.6 12 13.3 12.2 13.4 12.5 14.2 13.1 14.4 13.4 15.4 14.3 16.3 15.2 17.2 16.1 17.5 16.4 18.2 16.9 18 17.5 17.9 17.6 17.9 17.7 17.8 17.8 17.2 18.3 16.7 17.8 16.4 17.4 15.4 16.4 14.3 15.4 13.3 14.3 13 14.1 12.8 13.8 12.5 13.6 12.4 13.5 12.3 13.3 12.2 13.3 12 13.4 11.5 13.8 11.3 14 10.7 14.4 9.9 14.6 9.2 14.8 8.9 14.9 8.6 14.9 8.3 14.9 8 15 7.4 15.1 7.1 15 6.3 14.8 5.6 14.8 4.9 14.5 2.7 13.6 1.1 12.1 0.4 9.7 0 8.7-0.2 7.1 0.2 6 0.3 5.3 0.5 4.6 0.9 4 1.8 2.4 3 1.3 4.7 0.5 5.2 0.3 5.7 0.2 6.3 0.1 6.5 0 6.8 0.1 7 0ZM7.3 1.5C7.1 1.6 6.8 1.5 6.7 1.5 6.2 1.6 5.8 1.7 5.4 1.9 3.7 2.5 2.6 3.7 1.9 5.4 1.7 5.8 1.7 6.2 1.6 6.6 1.4 7.4 1.6 8.5 1.8 9.1 2.4 11.1 3.5 12.3 5.3 13 5.9 13.3 6.6 13.5 7.5 13.5 7.7 13.5 7.9 13.5 8.1 13.5 8.6 13.4 9.1 13.3 9.6 13.1 11.2 12.5 12.4 11.4 13.1 9.8 13.6 8.5 13.6 6.6 13.1 5.3 12.2 3.1 10.4 1.5 7.3 1.5Z"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div class="d-inline-flex ml-md-5">
                            <ul class="d-flex list-unstyled mb-0 align-items-center">
                                <li class="col d-xl-none position-static px-2">
                                    <!-- Search -->
                                    <div class="hs-unfold mr-2 position-static">
                                        <a class="js-hs-unfold-invoker btn btn-icon btn-ghost-secondary" href="javascript:;"
                                            data-hs-unfold-options='{
                                                "target": "#searchClassic",
                                                "type": "css-animation",
                                                "animationIn": "slideInUp"
                                            }'>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18">
                                                <path d="M7 0C11-0.1 13.4 2.1 14.6 4.9 15.5 7.1 14.9 9.8 13.9 11.4 13.7 11.7 13.6 12 13.3 12.2 13.4 12.5 14.2 13.1 14.4 13.4 15.4 14.3 16.3 15.2 17.2 16.1 17.5 16.4 18.2 16.9 18 17.5 17.9 17.6 17.9 17.7 17.8 17.8 17.2 18.3 16.7 17.8 16.4 17.4 15.4 16.4 14.3 15.4 13.3 14.3 13 14.1 12.8 13.8 12.5 13.6 12.4 13.5 12.3 13.3 12.2 13.3 12 13.4 11.5 13.8 11.3 14 10.7 14.4 9.9 14.6 9.2 14.8 8.9 14.9 8.6 14.9 8.3 14.9 8 15 7.4 15.1 7.1 15 6.3 14.8 5.6 14.8 4.9 14.5 2.7 13.6 1.1 12.1 0.4 9.7 0 8.7-0.2 7.1 0.2 6 0.3 5.3 0.5 4.6 0.9 4 1.8 2.4 3 1.3 4.7 0.5 5.2 0.3 5.7 0.2 6.3 0.1 6.5 0 6.8 0.1 7 0ZM7.3 1.5C7.1 1.6 6.8 1.5 6.7 1.5 6.2 1.6 5.8 1.7 5.4 1.9 3.7 2.5 2.6 3.7 1.9 5.4 1.7 5.8 1.7 6.2 1.6 6.6 1.4 7.4 1.6 8.5 1.8 9.1 2.4 11.1 3.5 12.3 5.3 13 5.9 13.3 6.6 13.5 7.5 13.5 7.7 13.5 7.9 13.5 8.1 13.5 8.6 13.4 9.1 13.3 9.6 13.1 11.2 12.5 12.4 11.4 13.1 9.8 13.6 8.5 13.6 6.6 13.1 5.3 12.2 3.1 10.4 1.5 7.3 1.5Z"></path>
                                            </svg>
                                        </a>

                                        <div id="searchClassic" class="hs-unfold-content dropdown-menu w-100 border-0 rounded-0 px-3 mt-0 right-0 left-0 mt-n2">
                                            <form class="input-group input-group-sm input-group-merge">
                                                <div class="input-group-append">
                                                    <button type="button" class="btn">
                                                        <i class="fas fa-search" ></i>
                                                    </button>
                                                </div>
                                                <input type="text" class="form-control search-form-control rounded-pill">
                                            </form>
                                        </div>
                                    </div>
                                    <!-- End Search -->
                                </li>
                                <li class="col pr-xl-0 px-2 px-sm-3">
                                    <!-- Unfold (Dropdown) -->
                                    <div class="hs-unfold">
                                        <a class="js-hs-unfold-invoker dropdown-nav-link dropdown-toggle py-4 position-relative d-flex align-items-center" href="javascript:;"
                                            data-hs-unfold-options='{
                                                "target": "#basicDropdownHover",
                                                "type": "css-animation",
                                                "event": "click"
                                            }'>
                                            <img src="assets/img/user.svg"  width="32px" height="32px" />
                                        </a>

                                        <div id="basicDropdownHover" class="hs-unfold-content dropdown-menu my-account-dropdown">
                                            <!-- Modal Trigger -->
                                            <a class="dropdown-item" href="javascript:;" data-toggle="modal" data-target="#loginModal">Sign in</a>
                                            <a class="dropdown-item" href="javascript:;" data-toggle="modal" data-target="#loginModal">Register</a>
                                            <!-- End Modal Trigger -->
                                        </div>
                                    </div>
                                    <!-- End Unfold (Dropdown) -->
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- End Nav -->
            </div>
        </div>
    </header>
    <!-- ========== END HEADER ========== -->

    <!-- ========== MAIN CONTENT ========== -->
    <main id="content">
        <div class="home-slider position-relative overflow-hidden" >
            <div id="sliderSyncingNav" class="js-slick-carousel slick"
                data-hs-slick-carousel-options='{
                    "dots": true,
                    "dotsClass": "d-xl-none slick-pagination mb-3 position-absolute right-0 left-0 bottom-0",
                    "infinite": true,
                    "asNavFor": "#sliderSyncingThumb"
                }'>
                <?php 
                //BINDING THE RESULTS TO VARIABLES
                $query_results_array->bind_result($id, $name, $cover, $portrait, $url);

                // GETTING THE QUERY RESULTS INTO THE RESPONSE ARRAY
                while($query_results_array->fetch()){
                    //echo "<br><br>Movie Name: " . $name;
                    //echo "<br>Movie URL: " . $url;
                    //echo "<br>Movie portrait: " . $portrait;
                ?>

                <div  class="bg-img-hero d-flex align-items-center min-h-676rem slider-gradient" style="background-image: url(<?php echo MOVIE_POSTER_FOLDER . $cover ?>);">
                    <div class="container">
                        <div class="mx-3 mx-md-5  col-xl-5 px-0">
                            <h1 class="display-3 mb-3"><a href="../single-movies/single-movies-v2.html" class="h-w-primary"><?php echo $name ?></a></h1>
                            <div class="mb-4d">
                                <ul class="list-unstyled nav nav-meta nav-meta__yellow">
                                    <li class="">2020</li>
                                    <li class=""><a href="../single-movies/single-movies-v2.html">Comedy</a></li>
                                    <li class="">1hr 55 mins</li>
                                </ul>
                            </div>
                            <div class="d-md-flex">
                                <a href="../single-movies/single-movies-v2.html" class="btn btn-shugaban px-6 py-3d btn-sm mb-3 mb-md-0">WATCH NOW</a>
                                <a href="../single-movies/single-movies-v2.html" class="btn btn-outline-shugaban ml-md-4 px-6 py-3d btn-sm">VIEW</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>

            <div class="d-none d-xl-flex position-xl-absolute col-xl-6 mr-1 right-0 bottom-0  mb-xl-12  slider-m-0 flex-column">
                <h4 class="text-white font-size-22 font-weight-normal mb-3"><b>Todays Recomendation</b></h4>
                <div id="sliderSyncingThumb" class="js-slick-carousel slick slick-gutters-1 slick-transform-off"
                    data-hs-slick-carousel-options='{
                        "infinite": true,
                        "slidesToShow": 8,
                        "isThumbs": true,
                        "asNavFor": "#sliderSyncingNav",
                        "responsive": [{
                            "breakpoint": 1199,
                            "settings": {
                                "slidesToShow": 2
                            },
                            "breakpoint": 768,
                            "settings": {
                                "slidesToShow": 2
                            }
                        }]
                    }'>

                <?php 
                $query = $queryController->prepareAndExecuteQuery($mysqli, "SELECT name, landscape_cover FROM " . MOVIES_TABLE . " ORDER BY id DESC LIMIT 2", 0, "", "");
                if($query === false){
                    $messageModelObject->error_exist = false;
                    $messageModelObject->body = "Fetching last 3 movies failed";
                    var_dump($messageModelObject->body);
                }
                
                // GETTING RESULTS
                $query_results_array = $queryController->getQueryResults($query, array("name", "landscape_cover"), 1, 2);
                
                //BINDING THE RESULTS TO VARIABLES
                $query_results_array->bind_result($name, $landscape_cover);

                // GETTING THE QUERY RESULTS INTO THE RESPONSE ARRAY
                while($query_results_array->fetch()){
                    //echo "<br><br>Movie Name: " . $name;
                    //echo "<br>Movie URL: " . $url;
                    //echo "<br>Movie portrait: " . $portrait;
                ?>
                    <div class="my-1d" style="cursor: pointer;">
                        <img class="img-fluid" style="width:200px; height:120px;" src="<?php echo MOVIE_POSTER_LANDSCAPES_FOLDER . $landscape_cover; ?>" alt="<?php $name; ?>">
                    </div>
                <?php } ?>
                </div>
            </div>
        </div>

        <!-- movie aside header -->
        <section class="bg-gray-1100 dark">
            <div class="container px-md-4">
                <div class="row mb-xl-5">
                    <div class="col-xl-auto d-flex">
                        <header class="max-w-370 mt-auto mb-8 title-dash">
                            <h3 class="display-7 h-w-primary mb-3 pr-xl-12 font-weight-semi-bold">Popular Movies to Watch Now</h3>
                            <p class=" h-w-primarydark font-secondary font-weight-medium">Most watched movies by days</p>
                            <div class="border-top border-g-1200-op mr-xl-7">
                                <a href="../archive/movies.html" class="h-w-primarydark text-gray-1300 font-size-13 d-inline-flex align-items-center pt-2 font-secondary font-weight-medium">VIEW ALL
                                    <svg class="ml-2" xmlns="http://www.w3.org/2000/svg" width="4" height="7"><path d="M3.979,3.703 C3.987,3.785 3.966,3.869 3.903,3.934 L1.038,6.901 C0.921,7.023 0.724,7.029 0.598,6.916 L0.143,6.506 C0.017,6.393 0.011,6.203 0.128,6.082 L2.190,3.946 C2.276,3.829 2.356,3.691 2.356,3.548 C2.356,3.214 1.947,2.885 1.947,2.885 L1.963,2.877 L0.080,0.905 C-0.036,0.784 -0.029,0.592 0.095,0.479 L0.547,0.068 C0.671,-0.045 0.867,-0.039 0.983,0.083 L3.823,3.057 C3.867,3.102 3.876,3.161 3.885,3.218 C3.945,3.267 3.988,3.334 3.988,3.416 L3.988,3.681 C3.988,3.690 3.979,3.694 3.979,3.703 Z" fill="rgb(148, 156, 176)"/></svg>
                                </a>
                            </div>
                        </header>
                    </div>
                    <div class="col">
                        <div class="row row-cols-2 row-cols-md-5">
                            <?php 
                            $query = $queryController->prepareAndExecuteQuery($mysqli, "SELECT id, name, portrait, year FROM " . MOVIES_TABLE . " ORDER BY views DESC LIMIT 5", 0, "", "");
                            if($query === false){
                                $messageModelObject->error_exist = false;
                                $messageModelObject->body = "Fetching last 5 movies failed";
                            }
                            
                            // GETTING RESULTS
                            $query_results_array = $queryController->getQueryResults($query, array("id", "name", "portrait", "year"), 1, 2);
                            
                            //BINDING THE RESULTS TO VARIABLES
                            $query_results_array->bind_result($id, $name, $portrait, $year);
                            // GETTING THE QUERY RESULTS INTO THE RESPONSE ARRAY
                            while($query_results_array->fetch()){
                                //echo "<br><br>Movie Name: " . $name;
                                //echo "<br>Movie URL: " . $url;
                                //echo "<br>Movie portrait: " . $portrait;
                            ?>
                            <div class="col mb-5 mb-xl-0">
                                <div class="product">
                                    <div class="product-image mb-2">
                                        <a href="../single-movies/single-movies-v2.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="<?php echo MOVIE_POSTER_PORTRAIT_FOLDER . $portrait; ?>" alt="Image Description"></a>
                                    </div>
                                    <div class="product-meta font-size-12 mb-1">
                                        <span><a href="../single-movies/single-movies-v2.html" class="h-g-primary"><?php echo $year; ?></a></span>
                                        <span><a href="../single-movies/single-movies-v2.html" class="h-g-primary">Action</a></span>
                                        <span><a href="../single-movies/single-movies-v2.html" class="h-g-primary">Comedy</a></span>
                                        <span><a href="../single-movies/single-movies-v2.html" class="h-g-primary">Mystery</a></span>
                                    </div>
                                    <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v2.html"><?php echo $name; ?></a></div>
                                </div>
                            </div>


                            <?php $i++; } ?>
                        </div>
                    </div>
                </div>
                <div class="row row-cols-md-5 row-cols-xl">
                    <div class="col-6 col-xl mb-5 mb-xl-0">
                        <div class="product">
                            <div class="product-image mb-2">
                                <a href="../single-movies/single-movies-v2.html" class="d-inline-block position-relative stretched-link">
                                    <span class="position-absolute px-2d line-height-lg bg-primary rounded content-centered-x z-index-2 mt-n2 text-white font-size-12">Featured</span>
                                    <img class="img-fluid" src="https://placehold.it/174x260g" alt="Image Description">
                                </a>
                            </div>
                            <div class="product-meta font-size-12 mb-1">
                                <span><a href="../single-movies/single-movies-v2.html" class="h-g-primary">2020</a></span>
                                <span><a href="../single-movies/single-movies-v2.html" class="h-g-primary">Action</a></span>
                                <span><a href="../single-movies/single-movies-v2.html" class="h-g-primary">Comedy</a></span>
                                <span><a href="../single-movies/single-movies-v2.html" class="h-g-primary">Mystery</a></span>
                            </div>
                            <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v2.html">The Convenient Groom</a></div>
                        </div>
                    </div>
                    <div class="col-6 col-xl mb-5 mb-xl-0">
                        <div class="product">
                            <div class="product-image mb-2">
                                <a href="../single-movies/single-movies-v2.html" class="d-inline-block position-relative stretched-link">
                                    <span class="position-absolute px-2d line-height-lg bg-primary rounded content-centered-x z-index-2 mt-n2 text-white font-size-12">Featured</span>
                                    <img class="img-fluid" src="https://placehold.it/174x260g" alt="Image Description">
                                </a>
                            </div>
                            <div class="product-meta font-size-12 mb-1">
                                <span><a href="../single-movies/single-movies-v2.html" class="h-g-primary">2020</a></span>
                                <span><a href="../single-movies/single-movies-v2.html" class="h-g-primary">Action</a></span>
                                <span><a href="../single-movies/single-movies-v2.html" class="h-g-primary">Comedy</a></span>
                                <span><a href="../single-movies/single-movies-v2.html" class="h-g-primary">Mystery</a></span>
                            </div>
                            <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v2.html">Paradigm Lost</a></div>
                        </div>
                    </div>
                    <div class="col-6 col-xl mb-5 mb-xl-0">
                        <div class="product">
                            <div class="product-image mb-2">
                                <a href="../single-movies/single-movies-v2.html" class="d-inline-block position-relative stretched-link">
                                    <span class="position-absolute px-2d line-height-lg bg-primary rounded content-centered-x z-index-2 mt-n2 text-white font-size-12">Featured</span>
                                    <img class="img-fluid" src="https://placehold.it/174x260g" alt="Image Description">
                                </a>
                            </div>
                            <div class="product-meta font-size-12 mb-1">
                                <span><a href="../single-movies/single-movies-v2.html" class="h-g-primary">2020</a></span>
                                <span><a href="../single-movies/single-movies-v2.html" class="h-g-primary">Action</a></span>
                                <span><a href="../single-movies/single-movies-v2.html" class="h-g-primary">Comedy</a></span>
                                <span><a href="../single-movies/single-movies-v2.html" class="h-g-primary">Mystery</a></span>
                            </div>
                            <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v2.html">Pacific Rim: Uprising</a></div>
                        </div>
                    </div>
                    <div class="col-6 col-xl mb-5 mb-xl-0">
                        <div class="product">
                            <div class="product-image mb-2">
                                <a href="../single-movies/single-movies-v2.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                            </div>
                            <div class="product-meta font-size-12 mb-1">
                                <span><a href="../single-movies/single-movies-v2.html" class="h-g-primary">2020</a></span>
                                <span><a href="../single-movies/single-movies-v2.html" class="h-g-primary">Action</a></span>
                                <span><a href="../single-movies/single-movies-v2.html" class="h-g-primary">Comedy</a></span>
                                <span><a href="../single-movies/single-movies-v2.html" class="h-g-primary">Mystery</a></span>
                            </div>
                            <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v2.html">Dirt</a></div>
                        </div>
                    </div>
                    <div class="col-6 col-xl mb-5 mb-xl-0">
                        <div class="product">
                            <div class="product-image mb-2">
                                <a href="../single-movies/single-movies-v2.html" class="d-inline-block position-relative stretched-link">
                                    <span class="position-absolute px-2d line-height-lg bg-primary rounded content-centered-x z-index-2 mt-n2 text-white font-size-12">Featured</span>
                                    <img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description">
                                </a>
                            </div>
                            <div class="product-meta font-size-12 mb-1">
                                <span><a href="../single-movies/single-movies-v2.html" class="h-g-primary">2020</a></span>
                                <span><a href="../single-movies/single-movies-v2.html" class="h-g-primary">Action</a></span>
                                <span><a href="../single-movies/single-movies-v2.html" class="h-g-primary">Comedy</a></span>
                                <span><a href="../single-movies/single-movies-v2.html" class="h-g-primary">Mystery</a></span>
                            </div>
                            <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v2.html">Fantastic Beasts and Where to Find Them</a></div>
                        </div>
                    </div>
                    <div class="col-6 col-xl mb-5 mb-xl-0">
                        <div class="product">
                            <div class="product-image mb-2">
                                <a href="../single-movies/single-movies-v2.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                            </div>
                            <div class="product-meta font-size-12 mb-1">
                                <span><a href="../single-movies/single-movies-v2.html" class="h-g-primary">2020</a></span>
                                <span><a href="../single-movies/single-movies-v2.html" class="h-g-primary">Action</a></span>
                                <span><a href="../single-movies/single-movies-v2.html" class="h-g-primary">Comedy</a></span>
                                <span><a href="../single-movies/single-movies-v2.html" class="h-g-primary">Mystery</a></span>
                            </div>
                            <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v2.html">Sunday</a></div>
                        </div>
                    </div>
                    <div class="col-6 col-xl mb-5 mb-xl-0">
                        <div class="product">
                            <div class="product-image mb-2">
                                <a href="../single-movies/single-movies-v2.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                            </div>
                            <div class="product-meta font-size-12 mb-1">
                                <span><a href="../single-movies/single-movies-v2.html" class="h-g-primary">2020</a></span>
                                <span><a href="../single-movies/single-movies-v2.html" class="h-g-primary">Action</a></span>
                                <span><a href="../single-movies/single-movies-v2.html" class="h-g-primary">Comedy</a></span>
                                <span><a href="../single-movies/single-movies-v2.html" class="h-g-primary">Mystery</a></span>
                            </div>
                            <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v2.html">Bpm</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="collapse mt-6" id="collapseExample">
                <div class="container px-md-4">
                    <div class="row row-cols-md-5 row-cols-xl">
                        <div class="col-6 col-xl mb-5 mb-xl-0">
                            <div class="product">
                                <div class="product-image mb-2">
                                    <a href="../single-movies/single-movies-v2.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                </div>
                                <div class="product-meta font-size-12 mb-1">
                                    <span><a href="../single-movies/single-movies-v2.html" class="h-g-primary">2020</a></span>
                                    <span><a href="../single-movies/single-movies-v2.html" class="h-g-primary">Action</a></span>
                                    <span><a href="../single-movies/single-movies-v2.html" class="h-g-primary">Comedy</a></span>
                                    <span><a href="../single-movies/single-movies-v2.html" class="h-g-primary">Mystery</a></span>
                                </div>
                                <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v2.html">The Convenient Groom</a></div>
                            </div>
                        </div>
                        <div class="col-6 col-xl mb-5 mb-xl-0">
                            <div class="product">
                                <div class="product-image mb-2">
                                    <a href="../single-movies/single-movies-v2.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                </div>
                                <div class="product-meta font-size-12 mb-1">
                                    <span><a href="../single-movies/single-movies-v2.html" class="h-g-primary">2020</a></span>
                                    <span><a href="../single-movies/single-movies-v2.html" class="h-g-primary">Action</a></span>
                                    <span><a href="../single-movies/single-movies-v2.html" class="h-g-primary">Comedy</a></span>
                                    <span><a href="../single-movies/single-movies-v2.html" class="h-g-primary">Mystery</a></span>
                                </div>
                                <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v2.html">Paradigm Lost</a></div>
                            </div>
                        </div>
                        <div class="col-6 col-xl mb-5 mb-xl-0">
                            <div class="product">
                                <div class="product-image mb-2">
                                    <a href="../single-movies/single-movies-v2.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                </div>
                                <div class="product-meta font-size-12 mb-1">
                                    <span><a href="../single-movies/single-movies-v2.html" class="h-g-primary">2020</a></span>
                                    <span><a href="../single-movies/single-movies-v2.html" class="h-g-primary">Action</a></span>
                                    <span><a href="../single-movies/single-movies-v2.html" class="h-g-primary">Comedy</a></span>
                                    <span><a href="../single-movies/single-movies-v2.html" class="h-g-primary">Mystery</a></span>
                                </div>
                                <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v2.html">Pacific Rim: Uprising</a></div>
                            </div>
                        </div>
                        <div class="col-6 col-xl mb-5 mb-xl-0">
                            <div class="product">
                                <div class="product-image mb-2">
                                    <a href="../single-movies/single-movies-v2.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                </div>
                                <div class="product-meta font-size-12 mb-1">
                                    <span><a href="../single-movies/single-movies-v2.html" class="h-g-primary">2020</a></span>
                                    <span><a href="../single-movies/single-movies-v2.html" class="h-g-primary">Action</a></span>
                                    <span><a href="../single-movies/single-movies-v2.html" class="h-g-primary">Comedy</a></span>
                                    <span><a href="../single-movies/single-movies-v2.html" class="h-g-primary">Mystery</a></span>
                                </div>
                                <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v2.html">Dirt</a></div>
                            </div>
                        </div>
                        <div class="col-6 col-xl mb-5 mb-xl-0">
                            <div class="product">
                                <div class="product-image mb-2">
                                    <a href="../single-movies/single-movies-v2.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                </div>
                                <div class="product-meta font-size-12 mb-1">
                                    <span><a href="../single-movies/single-movies-v2.html" class="h-g-primary">2020</a></span>
                                    <span><a href="../single-movies/single-movies-v2.html" class="h-g-primary">Action</a></span>
                                    <span><a href="../single-movies/single-movies-v2.html" class="h-g-primary">Comedy</a></span>
                                    <span><a href="../single-movies/single-movies-v2.html" class="h-g-primary">Mystery</a></span>
                                </div>
                                <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v2.html">Fantastic Beasts and Where to Find Them</a></div>
                            </div>
                        </div>
                        <div class="col-6 col-xl mb-5 mb-xl-0">
                            <div class="product">
                                <div class="product-image mb-2">
                                    <a href="../single-movies/single-movies-v2.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                </div>
                                <div class="product-meta font-size-12 mb-1">
                                    <span><a href="../single-movies/single-movies-v2.html" class="h-g-primary">2020</a></span>
                                    <span><a href="../single-movies/single-movies-v2.html" class="h-g-primary">Action</a></span>
                                    <span><a href="../single-movies/single-movies-v2.html" class="h-g-primary">Comedy</a></span>
                                    <span><a href="../single-movies/single-movies-v2.html" class="h-g-primary">Mystery</a></span>
                                </div>
                                <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v2.html">Sunday</a></div>
                            </div>
                        </div>
                        <div class="col-6 col-xl mb-5 mb-xl-0">
                            <div class="product">
                                <div class="product-image mb-2">
                                    <a href="../single-movies/single-movies-v2.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                </div>
                                <div class="product-meta font-size-12 mb-1">
                                    <span><a href="../single-movies/single-movies-v2.html" class="h-g-primary">2020</a></span>
                                    <span><a href="../single-movies/single-movies-v2.html" class="h-g-primary">Action</a></span>
                                    <span><a href="../single-movies/single-movies-v2.html" class="h-g-primary">Comedy</a></span>
                                    <span><a href="../single-movies/single-movies-v2.html" class="h-g-primary">Mystery</a></span>
                                </div>
                                <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v2.html">Bpm</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="space-1 position-relative d-flex">
                <button class="btn btn-outline-dark-primary mx-auto px-7 py-3 font-size-1 z-index-2 font-weight-medium font-secondary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    + View more
                </button>
                <div class="border-top content-centered w-100 border-gray-1400"></div>
            </div>
        </section>
        <!-- End movie aside header -->

        <!-- movies carousel aside header -->
        <section class="bg-gray-1500 space-2">
            <div class="container px-md-4">
                <!-- Nav -->
                <div class="text-center tab-nav__v1">
                    <ul class="nav mb-7" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-one-code-features-example2-tab" data-toggle="pill" href="#pills-one-code-features-example2" role="tab" aria-controls="pills-one-code-features-example2" aria-selected="true">Today</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-two-code-features-example2-tab" data-toggle="pill" href="#pills-two-code-features-example2" role="tab" aria-controls="pills-two-code-features-example2" aria-selected="false">This week</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-three-code-features-example2-tab" data-toggle="pill" href="#pills-three-code-features-example2" role="tab" aria-controls="pills-three-code-features-example2" aria-selected="false">Last 30 days</a>
                        </li>
                    </ul>
                </div>
                <!-- End Nav -->

                <!-- Tab Content -->
                <div class="tab-content slick__tab">
                    <div class="tab-pane fade show active" id="pills-one-code-features-example2" role="tabpanel" aria-labelledby="pills-one-code-features-example2-tab">
                        <div class="row">
                            <div class="col-md-7 col-lg-8 col-xl-9">
                                <div class="js-slick-carousel slick slick-gutters-2"
                                    data-hs-slick-carousel-options='{
                                        "prevArrow": "<span class=\"fas fa-chevron-left slick-arrow slick-arrow-v1 left slick-arrow-right rounded-circle position-absolute\"></span>",
                                        "nextArrow": "<span class=\"fas fa-chevron-right slick-arrow slick-arrow-v1 right slick-arrow-right rounded-circle position-absolute\"></span>",
                                        "slidesToShow": 6,
                                        "responsive": [{
                                            "breakpoint": 1199,
                                            "settings": {
                                                "slidesToShow": 3
                                            }
                                        }, {
                                            "breakpoint": 768,
                                            "settings": {
                                                "slidesToShow": 1
                                            }
                                        }]
                                    }'>
                                    <div class="product">
                                        <div class="product-image mb-2">
                                            <a href="../single-movies/single-movies-v3.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                        </div>
                                        <div class="product-meta font-size-12 mb-1">
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">2020</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Action</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Comedy</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Mystery</a></span>
                                        </div>
                                        <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v3.html">The Convenient Groom</a></div>
                                    </div>
                                    <div class="product">
                                        <div class="product-image mb-2">
                                            <a href="../single-movies/single-movies-v3.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                        </div>
                                        <div class="product-meta font-size-12 mb-1">
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">2020</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Action</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Comedy</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Mystery</a></span>
                                        </div>
                                        <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v3.html">Bpm</a></div>
                                    </div>
                                    <div class="product">
                                        <div class="product-image mb-2">
                                            <a href="../single-movies/single-movies-v3.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                        </div>
                                        <div class="product-meta font-size-12 mb-1">
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">2020</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Action</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Comedy</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Mystery</a></span>
                                        </div>
                                        <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v3.html">Sunday</a></div>
                                    </div>
                                    <div class="product">
                                        <div class="product-image mb-2">
                                            <a href="../single-movies/single-movies-v3.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                        </div>
                                        <div class="product-meta font-size-12 mb-1">
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">2020</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Action</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Comedy</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Mystery</a></span>
                                        </div>
                                        <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v3.html">Fantastic Beasts and Where to Find Them</a></div>
                                    </div>
                                    <div class="product">
                                        <div class="product-image mb-2">
                                            <a href="../single-movies/single-movies-v3.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                        </div>
                                        <div class="product-meta font-size-12 mb-1">
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">2020</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Action</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Comedy</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Mystery</a></span>
                                        </div>
                                        <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v3.html">Dirt</a></div>
                                    </div>
                                    <div class="product">
                                        <div class="product-image mb-2">
                                            <a href="../single-movies/single-movies-v3.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                        </div>
                                        <div class="product-meta font-size-12 mb-1">
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">2020</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Action</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Comedy</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Mystery</a></span>
                                        </div>
                                        <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v3.html">The Convenient Groom</a></div>
                                    </div>
                                    <div class="product">
                                        <div class="product-image mb-2">
                                            <a href="../single-movies/single-movies-v3.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                        </div>
                                        <div class="product-meta font-size-12 mb-1">
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">2020</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Action</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Comedy</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Mystery</a></span>
                                        </div>
                                        <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v3.html">The Convenient Groom</a></div>
                                    </div>
                                    <div class="product">
                                        <div class="product-image mb-2">
                                            <a href="../single-movies/single-movies-v3.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                        </div>
                                        <div class="product-meta font-size-12 mb-1">
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">2020</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Action</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Comedy</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Mystery</a></span>
                                        </div>
                                        <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v3.html">Bpm</a></div>
                                    </div>
                                    <div class="product">
                                        <div class="product-image mb-2">
                                            <a href="../single-movies/single-movies-v3.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                        </div>
                                        <div class="product-meta font-size-12 mb-1">
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">2020</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Action</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Comedy</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Mystery</a></span>
                                        </div>
                                        <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v3.html">Sunday</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 col-lg-4 col-xl-3 d-flex">
                                <header class="max-w-370 mt-auto mb-xl-8 title-dash">
                                    <h3 class="display-7 mb-3 font-weight-semi-bold">Romantic for Valentines Day</h3>
                                    <div class="mt-11">
                                        <a href="../archive/movies.html" class="h-w-primary text-gray-1300 d-inline-flex align-items-center pt-2 font-secondary font-weight-medium font-size-13">VIEW ALL
                                            <svg class="ml-2" xmlns="http://www.w3.org/2000/svg" width="4" height="7"><path d="M3.979,3.703 C3.987,3.785 3.966,3.869 3.903,3.934 L1.038,6.901 C0.921,7.023 0.724,7.029 0.598,6.916 L0.143,6.506 C0.017,6.393 0.011,6.203 0.128,6.082 L2.190,3.946 C2.276,3.829 2.356,3.691 2.356,3.548 C2.356,3.214 1.947,2.885 1.947,2.885 L1.963,2.877 L0.080,0.905 C-0.036,0.784 -0.029,0.592 0.095,0.479 L0.547,0.068 C0.671,-0.045 0.867,-0.039 0.983,0.083 L3.823,3.057 C3.867,3.102 3.876,3.161 3.885,3.218 C3.945,3.267 3.988,3.334 3.988,3.416 L3.988,3.681 C3.988,3.690 3.979,3.694 3.979,3.703 Z" fill="rgb(148, 156, 176)"/></svg>
                                        </a>
                                    </div>
                                </header>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="pills-two-code-features-example2" role="tabpanel" aria-labelledby="pills-two-code-features-example2-tab">
                        <div class="row">
                            <div class="col-md-7 col-lg-8 col-xl-9">
                                <div class="js-slick-carousel slick slick-gutters-2"
                                    data-hs-slick-carousel-options='{
                                        "prevArrow": "<span class=\"fas fa-chevron-left slick-arrow slick-arrow-v1 left slick-arrow-right rounded-circle position-absolute\"></span>",
                                        "nextArrow": "<span class=\"fas fa-chevron-right slick-arrow slick-arrow-v1 right slick-arrow-right rounded-circle position-absolute\"></span>",
                                        "slidesToShow": 6,
                                        "responsive": [{
                                            "breakpoint": 1199,
                                            "settings": {
                                                "slidesToShow": 3
                                            }
                                        }, {
                                            "breakpoint": 768,
                                            "settings": {
                                                "slidesToShow": 1
                                            }
                                        }]
                                    }'>
                                    <div class="product">
                                        <div class="product-image mb-2">
                                            <a href="../single-movies/single-movies-v3.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                        </div>
                                        <div class="product-meta font-size-12 mb-1">
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">2020</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Action</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Comedy</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Mystery</a></span>
                                        </div>
                                        <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v3.html">Dirt</a></div>
                                    </div>
                                    <div class="product">
                                        <div class="product-image mb-2">
                                            <a href="../single-movies/single-movies-v3.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                        </div>
                                        <div class="product-meta font-size-12 mb-1">
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">2020</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Action</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Comedy</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Mystery</a></span>
                                        </div>
                                        <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v3.html">The Convenient Groom</a></div>
                                    </div>
                                    <div class="product">
                                        <div class="product-image mb-2">
                                            <a href="../single-movies/single-movies-v3.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                        </div>
                                        <div class="product-meta font-size-12 mb-1">
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">2020</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Action</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Comedy</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Mystery</a></span>
                                        </div>
                                        <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v3.html">The Convenient Groom</a></div>
                                    </div>
                                    <div class="product">
                                        <div class="product-image mb-2">
                                            <a href="../single-movies/single-movies-v3.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                        </div>
                                        <div class="product-meta font-size-12 mb-1">
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">2020</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Action</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Comedy</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Mystery</a></span>
                                        </div>
                                        <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v3.html">Bpm</a></div>
                                    </div>
                                    <div class="product">
                                        <div class="product-image mb-2">
                                            <a href="../single-movies/single-movies-v3.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                        </div>
                                        <div class="product-meta font-size-12 mb-1">
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">2020</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Action</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Comedy</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Mystery</a></span>
                                        </div>
                                        <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v3.html">Sunday</a></div>
                                    </div>
                                    <div class="product">
                                        <div class="product-image mb-2">
                                            <a href="../single-movies/single-movies-v3.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                        </div>
                                        <div class="product-meta font-size-12 mb-1">
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">2020</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Action</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Comedy</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Mystery</a></span>
                                        </div>
                                        <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v3.html">The Convenient Groom</a></div>
                                    </div>
                                    <div class="product">
                                        <div class="product-image mb-2">
                                            <a href="../single-movies/single-movies-v3.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                        </div>
                                        <div class="product-meta font-size-12 mb-1">
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">2020</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Action</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Comedy</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Mystery</a></span>
                                        </div>
                                        <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v3.html">Bpm</a></div>
                                    </div>
                                    <div class="product">
                                        <div class="product-image mb-2">
                                            <a href="../single-movies/single-movies-v3.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                        </div>
                                        <div class="product-meta font-size-12 mb-1">
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">2020</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Action</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Comedy</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Mystery</a></span>
                                        </div>
                                        <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v3.html">Sunday</a></div>
                                    </div>
                                    <div class="product">
                                        <div class="product-image mb-2">
                                            <a href="../single-movies/single-movies-v3.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                        </div>
                                        <div class="product-meta font-size-12 mb-1">
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">2020</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Action</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Comedy</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Mystery</a></span>
                                        </div>
                                        <div class="product-title font-weight-bold font-size-1"><a href="#">Fantastic Beasts and Where to Find Them</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 col-lg-4 col-xl-3 d-flex">
                                <header class="max-w-370 mt-auto mb-xl-8 title-dash">
                                    <h4 class="display-7 mb-3 font-weight-semi-bold">Romantic for Valentines Day</h4>
                                    <div class="mt-11">
                                        <a href="../archive/movies.html" class="h-w-primary text-gray-1300 d-inline-flex align-items-center pt-2 font-secondary font-weight-medium font-size-13">VIEW ALL
                                            <svg class="ml-2" xmlns="http://www.w3.org/2000/svg" width="4" height="7"><path d="M3.979,3.703 C3.987,3.785 3.966,3.869 3.903,3.934 L1.038,6.901 C0.921,7.023 0.724,7.029 0.598,6.916 L0.143,6.506 C0.017,6.393 0.011,6.203 0.128,6.082 L2.190,3.946 C2.276,3.829 2.356,3.691 2.356,3.548 C2.356,3.214 1.947,2.885 1.947,2.885 L1.963,2.877 L0.080,0.905 C-0.036,0.784 -0.029,0.592 0.095,0.479 L0.547,0.068 C0.671,-0.045 0.867,-0.039 0.983,0.083 L3.823,3.057 C3.867,3.102 3.876,3.161 3.885,3.218 C3.945,3.267 3.988,3.334 3.988,3.416 L3.988,3.681 C3.988,3.690 3.979,3.694 3.979,3.703 Z" fill="rgb(148, 156, 176)"/></svg>
                                        </a>
                                    </div>
                                </header>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="pills-three-code-features-example2" role="tabpanel" aria-labelledby="pills-three-code-features-example2-tab">
                        <div class="row">
                            <div class="col-md-7 col-lg-8 col-xl-9">
                                <div class="js-slick-carousel slick slick-gutters-2"
                                    data-hs-slick-carousel-options='{
                                        "prevArrow": "<span class=\"fas fa-chevron-left slick-arrow slick-arrow-v1 left slick-arrow-right rounded-circle position-absolute\"></span>",
                                        "nextArrow": "<span class=\"fas fa-chevron-right slick-arrow slick-arrow-v1 right slick-arrow-right rounded-circle position-absolute\"></span>",
                                        "slidesToShow": 6,
                                        "responsive": [{
                                            "breakpoint": 1199,
                                            "settings": {
                                                "slidesToShow": 3
                                            }
                                        }, {
                                            "breakpoint": 768,
                                            "settings": {
                                                "slidesToShow": 1
                                            }
                                        }]
                                    }'>
                                    <div class="product">
                                        <div class="product-image mb-2">
                                            <a href="../single-movies/single-movies-v3.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                        </div>
                                        <div class="product-meta font-size-12 mb-1">
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">2020</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Action</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Comedy</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Mystery</a></span>
                                        </div>
                                        <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v3.html">The Convenient Groom</a></div>
                                    </div>
                                    <div class="product">
                                        <div class="product-image mb-2">
                                            <a href="../single-movies/single-movies-v3.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                        </div>
                                        <div class="product-meta font-size-12 mb-1">
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">2020</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Action</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Comedy</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Mystery</a></span>
                                        </div>
                                        <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v3.html">Bpm</a></div>
                                    </div>
                                    <div class="product">
                                        <div class="product-image mb-2">
                                            <a href="../single-movies/single-movies-v3.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                        </div>
                                        <div class="product-meta font-size-12 mb-1">
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">2020</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Action</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Comedy</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Mystery</a></span>
                                        </div>
                                        <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v3.html">Sunday</a></div>
                                    </div>
                                    <div class="product">
                                        <div class="product-image mb-2">
                                            <a href="../single-movies/single-movies-v3.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                        </div>
                                        <div class="product-meta font-size-12 mb-1">
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">2020</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Action</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Comedy</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Mystery</a></span>
                                        </div>
                                        <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v3.html">Fantastic Beasts and Where to Find Them</a></div>
                                    </div>
                                    <div class="product">
                                        <div class="product-image mb-2">
                                            <a href="../single-movies/single-movies-v3.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                        </div>
                                        <div class="product-meta font-size-12 mb-1">
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">2020</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Action</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Comedy</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Mystery</a></span>
                                        </div>
                                        <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v3.html">Dirt</a></div>
                                    </div>
                                    <div class="product">
                                        <div class="product-image mb-2">
                                            <a href="../single-movies/single-movies-v3.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                        </div>
                                        <div class="product-meta font-size-12 mb-1">
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">2020</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Action</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Comedy</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Mystery</a></span>
                                        </div>
                                        <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v3.html">The Convenient Groom</a></div>
                                    </div>
                                    <div class="product">
                                        <div class="product-image mb-2">
                                            <a href="../single-movies/single-movies-v3.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                        </div>
                                        <div class="product-meta font-size-12 mb-1">
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">2020</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Action</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Comedy</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Mystery</a></span>
                                        </div>
                                        <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v3.html">The Convenient Groom</a></div>
                                    </div>
                                    <div class="product">
                                        <div class="product-image mb-2">
                                            <a href="../single-movies/single-movies-v3.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                        </div>
                                        <div class="product-meta font-size-12 mb-1">
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">2020</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Action</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Comedy</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Mystery</a></span>
                                        </div>
                                        <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v3.html">Bpm</a></div>
                                    </div>
                                    <div class="product">
                                        <div class="product-image mb-2">
                                            <a href="../single-movies/single-movies-v3.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                        </div>
                                        <div class="product-meta font-size-12 mb-1">
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">2020</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Action</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Comedy</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Mystery</a></span>
                                        </div>
                                        <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v3.html">Sunday</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 col-lg-4 col-xl-3 d-flex">
                                <header class="max-w-370 mt-auto mb-xl-8 title-dash">
                                    <h3 class="display-7 mb-3 font-weight-semi-bold">Romantic for Valentines Day</h3>
                                    <div class="mt-11">
                                        <a href="../archive/movies.html" class="h-w-primary text-gray-1300 d-inline-flex align-items-center pt-2 font-secondary font-weight-medium font-size-13">VIEW ALL
                                            <svg class="ml-2" xmlns="http://www.w3.org/2000/svg" width="4" height="7"><path d="M3.979,3.703 C3.987,3.785 3.966,3.869 3.903,3.934 L1.038,6.901 C0.921,7.023 0.724,7.029 0.598,6.916 L0.143,6.506 C0.017,6.393 0.011,6.203 0.128,6.082 L2.190,3.946 C2.276,3.829 2.356,3.691 2.356,3.548 C2.356,3.214 1.947,2.885 1.947,2.885 L1.963,2.877 L0.080,0.905 C-0.036,0.784 -0.029,0.592 0.095,0.479 L0.547,0.068 C0.671,-0.045 0.867,-0.039 0.983,0.083 L3.823,3.057 C3.867,3.102 3.876,3.161 3.885,3.218 C3.945,3.267 3.988,3.334 3.988,3.416 L3.988,3.681 C3.988,3.690 3.979,3.694 3.979,3.703 Z" fill="rgb(148, 156, 176)"/></svg>
                                        </a>
                                    </div>
                                </header>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Tab Content -->
            </div>
        </section>
        <!-- End movies carousel aside header -->

        <!-- featured-movie -->
        <div class="bg-img-hero space-3" style="background-image: url(https://placehold.it/1920x600/606060);">
            <div class="container px-md-4">
                <div class="row">
                    <div class="col-lg-6 col-xl-5">
                        <div class="">
                            <img class="img-fluid mb-6 d-block" src="assets/img/188x60/img1.png" alt="Image Description">
                            <a href="../single-movies/single-movies-v4.html" class="display-8 h-w-primary d-inline-block font-secondary mb-6">Delta Bravo</a>
                            <p class="text-gray-1800 mb-6 font-secondary d-block font-size-1 font-weight-medium">strange black entity from another world bonds with Peter Parker and causes inner turmoil as he contends with new villains, temptations, and revenge.</p>
                            <div class="d-md-flex">
                                <a href="../single-movies/single-movies-v3.html" class="btn btn-shugaban px-6 py-3d btn-sm mb-3 mb-md-0" tabindex="0">WATCH NOW</a>
                                <a href="../single-movies/single-movies-v3.html" class="btn btn-outline-shugaban ml-md-4 px-6 py-3d btn-sm" tabindex="0">+ PLAYLIST</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-7 d-none d-lg-flex align-items-center justify-content-center">
                        <div class="">
                            <!-- Video -->
                            <a class="js-fancybox btn btn-play d-flex align-items-center justify-content-center rounded-circle" href="javascript:;"
                                data-hs-fancybox-options='{
                                    "src": "//youtube.com/0qisGSwZym4",
                                    "speed": 700
                                }'>
                                <i class="fas fa-play text-primary"></i>
                            </a>
                            <!-- End Video -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End featured-movie -->

        <!-- movies carousel aside header -->
        <section class="bg-gray-1100 dark space-2">
            <div class="container px-md-4">
                <!-- Nav -->
                <div class="text-center tab-nav__v1">
                    <ul class="nav mb-7" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-one-code-features-example2-tab-1" data-toggle="pill" href="#pills-one-code-features-example2-1" role="tab" aria-controls="pills-one-code-features-example2-1" aria-selected="true">Today</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-two-code-features-example2-tab-2" data-toggle="pill" href="#pills-two-code-features-example2-2" role="tab" aria-controls="pills-two-code-features-example2-2" aria-selected="false">This week</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-three-code-features-example2-tab-3" data-toggle="pill" href="#pills-three-code-features-example2-3" role="tab" aria-controls="pills-three-code-features-example2-3" aria-selected="false">Last 30 days</a>
                        </li>
                    </ul>
                </div>
                <!-- End Nav -->

                <!-- Tab Content -->
                <div class="tab-content slick__tab">
                    <div class="tab-pane fade show active" id="pills-one-code-features-example2-1" role="tabpanel" aria-labelledby="pills-one-code-features-example2-tab-1">
                        <div class="row">
                            <div class="col-md-7 col-lg-8 col-xl-9">
                                <div class="js-slick-carousel slick slick-gutters-2"
                                    data-hs-slick-carousel-options='{
                                        "prevArrow": "<span class=\"fas fa-chevron-left dark slick-arrow slick-arrow-v1 left slick-arrow-right rounded-circle position-absolute bottom-0\"></span>",
                                        "nextArrow": "<span class=\"fas fa-chevron-right dark slick-arrow slick-arrow-v1 right slick-arrow-right rounded-circle position-absolute\"></span>",
                                        "slidesToShow": 6,
                                        "responsive": [{
                                            "breakpoint": 1199,
                                            "settings": {
                                                "slidesToShow": 3
                                            }
                                        }, {
                                            "breakpoint": 768,
                                            "settings": {
                                                "slidesToShow": 1
                                            }
                                        }]
                                    }'>
                                    <div class="product">
                                        <div class="product-image mb-2">
                                            <a href="../single-movies/single-movies-v3.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                        </div>
                                        <div class="product-meta font-size-12 mb-1">
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">2020</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Action</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Comedy</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Mystery</a></span>
                                        </div>
                                        <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v3.html">The Convenient Groom</a></div>
                                    </div>
                                    <div class="product">
                                        <div class="product-image mb-2">
                                            <a href="../single-movies/single-movies-v3.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                        </div>
                                        <div class="product-meta font-size-12 mb-1">
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">2020</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Action</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Comedy</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Mystery</a></span>
                                        </div>
                                        <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v3.html">Bpm</a></div>
                                    </div>
                                    <div class="product">
                                        <div class="product-image mb-2">
                                            <a href="../single-movies/single-movies-v3.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                        </div>
                                        <div class="product-meta font-size-12 mb-1">
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">2020</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Action</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Comedy</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Mystery</a></span>
                                        </div>
                                        <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v3.html">Sunday</a></div>
                                    </div>
                                    <div class="product">
                                        <div class="product-image mb-2">
                                            <a href="../single-movies/single-movies-v3.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                        </div>
                                        <div class="product-meta font-size-12 mb-1">
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">2020</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Action</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Comedy</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Mystery</a></span>
                                        </div>
                                        <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v3.html">Fantastic Beasts and Where to Find Them</a></div>
                                    </div>
                                    <div class="product">
                                        <div class="product-image mb-2">
                                            <a href="../single-movies/single-movies-v3.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                        </div>
                                        <div class="product-meta font-size-12 mb-1">
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">2020</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Action</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Comedy</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Mystery</a></span>
                                        </div>
                                        <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v3.html">Dirt</a></div>
                                    </div>
                                    <div class="product">
                                        <div class="product-image mb-2">
                                            <a href="../single-movies/single-movies-v3.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                        </div>
                                        <div class="product-meta font-size-12 mb-1">
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">2020</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Action</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Comedy</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Mystery</a></span>
                                        </div>
                                        <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v3.html">The Convenient Groom</a></div>
                                    </div>
                                    <div class="product">
                                        <div class="product-image mb-2">
                                            <a href="../single-movies/single-movies-v3.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                        </div>
                                        <div class="product-meta font-size-12 mb-1">
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">2020</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Action</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Comedy</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Mystery</a></span>
                                        </div>
                                        <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v3.html">The Convenient Groom</a></div>
                                    </div>
                                    <div class="product">
                                        <div class="product-image mb-2">
                                            <a href="../single-movies/single-movies-v3.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                        </div>
                                        <div class="product-meta font-size-12 mb-1">
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">2020</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Action</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Comedy</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Mystery</a></span>
                                        </div>
                                        <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v3.html">Bpm</a></div>
                                    </div>
                                    <div class="product">
                                        <div class="product-image mb-2">
                                            <a href="../single-movies/single-movies-v3.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                        </div>
                                        <div class="product-meta font-size-12 mb-1">
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">2020</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Action</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Comedy</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Mystery</a></span>
                                        </div>
                                        <div class="product-title font-weight-bold font-size-1"><a href="#">Sunday</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 col-lg-4 col-xl-3 d-flex">
                                <header class="max-w-370 mt-auto mb-xl-8 title-dash">
                                    <h3 class="text-white display-7 mb-3 font-weight-semi-bold">Romantic for Valentines Day</h3>
                                    <div class="mt-11">
                                        <a href="../archive/movies.html" class="h-w-primary text-gray-1300 d-inline-flex align-items-center pt-2 font-secondary font-weight-medium font-size-13">VIEW ALL
                                            <svg class="ml-2" xmlns="http://www.w3.org/2000/svg" width="4" height="7"><path d="M3.979,3.703 C3.987,3.785 3.966,3.869 3.903,3.934 L1.038,6.901 C0.921,7.023 0.724,7.029 0.598,6.916 L0.143,6.506 C0.017,6.393 0.011,6.203 0.128,6.082 L2.190,3.946 C2.276,3.829 2.356,3.691 2.356,3.548 C2.356,3.214 1.947,2.885 1.947,2.885 L1.963,2.877 L0.080,0.905 C-0.036,0.784 -0.029,0.592 0.095,0.479 L0.547,0.068 C0.671,-0.045 0.867,-0.039 0.983,0.083 L3.823,3.057 C3.867,3.102 3.876,3.161 3.885,3.218 C3.945,3.267 3.988,3.334 3.988,3.416 L3.988,3.681 C3.988,3.690 3.979,3.694 3.979,3.703 Z" fill="rgb(148, 156, 176)"/></svg>
                                        </a>
                                    </div>
                                </header>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="pills-two-code-features-example2-2" role="tabpanel" aria-labelledby="pills-two-code-features-example2-tab-2">
                        <div class="row">
                            <div class="col-md-7 col-lg-8 col-xl-9">
                                <div class="js-slick-carousel slick slick-gutters-2"
                                    data-hs-slick-carousel-options='{
                                        "prevArrow": "<span class=\"fas fa-chevron-left dark slick-arrow slick-arrow-v1 left slick-arrow-right rounded-circle position-absolute bottom-0\"></span>",
                                        "nextArrow": "<span class=\"fas fa-chevron-right dark slick-arrow slick-arrow-v1 right slick-arrow-right rounded-circle position-absolute\"></span>",
                                        "slidesToShow": 6,
                                        "responsive": [{
                                            "breakpoint": 1199,
                                            "settings": {
                                                "slidesToShow": 3
                                            }
                                        }, {
                                            "breakpoint": 768,
                                            "settings": {
                                                "slidesToShow": 1
                                            }
                                        }]
                                    }'>
                                    <div class="product">
                                        <div class="product-image mb-2">
                                            <a href="../single-movies/single-movies-v3.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                        </div>
                                        <div class="product-meta font-size-12 mb-1">
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">2020</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Action</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Comedy</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Mystery</a></span>
                                        </div>
                                        <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v3.html">Dirt</a></div>
                                    </div>
                                    <div class="product">
                                        <div class="product-image mb-2">
                                            <a href="../single-movies/single-movies-v3.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                        </div>
                                        <div class="product-meta font-size-12 mb-1">
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">2020</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Action</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Comedy</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Mystery</a></span>
                                        </div>
                                        <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v3.html">The Convenient Groom</a></div>
                                    </div>
                                    <div class="product">
                                        <div class="product-image mb-2">
                                            <a href="../single-movies/single-movies-v3.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                        </div>
                                        <div class="product-meta font-size-12 mb-1">
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">2020</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Action</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Comedy</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Mystery</a></span>
                                        </div>
                                        <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v3.html">The Convenient Groom</a></div>
                                    </div>
                                    <div class="product">
                                        <div class="product-image mb-2">
                                            <a href="../single-movies/single-movies-v3.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                        </div>
                                        <div class="product-meta font-size-12 mb-1">
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">2020</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Action</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Comedy</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Mystery</a></span>
                                        </div>
                                        <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v3.html">Bpm</a></div>
                                    </div>
                                    <div class="product">
                                        <div class="product-image mb-2">
                                            <a href="../single-movies/single-movies-v3.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                        </div>
                                        <div class="product-meta font-size-12 mb-1">
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">2020</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Action</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Comedy</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Mystery</a></span>
                                        </div>
                                        <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v3.html">Sunday</a></div>
                                    </div>
                                    <div class="product">
                                        <div class="product-image mb-2">
                                            <a href="../single-movies/single-movies-v3.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                        </div>
                                        <div class="product-meta font-size-12 mb-1">
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">2020</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Action</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Comedy</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Mystery</a></span>
                                        </div>
                                        <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v3.html">The Convenient Groom</a></div>
                                    </div>
                                    <div class="product">
                                        <div class="product-image mb-2">
                                            <a href="../single-movies/single-movies-v3.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                        </div>
                                        <div class="product-meta font-size-12 mb-1">
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">2020</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Action</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Comedy</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Mystery</a></span>
                                        </div>
                                        <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v3.html">Bpm</a></div>
                                    </div>
                                    <div class="product">
                                        <div class="product-image mb-2">
                                            <a href="../single-movies/single-movies-v3.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                        </div>
                                        <div class="product-meta font-size-12 mb-1">
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">2020</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Action</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Comedy</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Mystery</a></span>
                                        </div>
                                        <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v3.html">Sunday</a></div>
                                    </div>
                                    <div class="product">
                                        <div class="product-image mb-2">
                                            <a href="../single-movies/single-movies-v3.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                        </div>
                                        <div class="product-meta font-size-12 mb-1">
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">2020</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Action</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Comedy</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Mystery</a></span>
                                        </div>
                                        <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v3.html">Fantastic Beasts and Where to Find Them</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 col-lg-4 col-xl-3 d-flex">
                                <header class="max-w-370 mt-auto mb-xl-8 title-dash">
                                    <h4 class="text-white display-7 mb-3 font-weight-semi-bold">Romantic for Valentines Day</h4>
                                    <div class="mt-11">
                                        <a href="../archive/movies.html" class="h-w-primary text-gray-1300 d-inline-flex align-items-center pt-2 font-secondary font-weight-medium font-size-13">VIEW ALL
                                            <svg class="ml-2" xmlns="http://www.w3.org/2000/svg" width="4" height="7"><path d="M3.979,3.703 C3.987,3.785 3.966,3.869 3.903,3.934 L1.038,6.901 C0.921,7.023 0.724,7.029 0.598,6.916 L0.143,6.506 C0.017,6.393 0.011,6.203 0.128,6.082 L2.190,3.946 C2.276,3.829 2.356,3.691 2.356,3.548 C2.356,3.214 1.947,2.885 1.947,2.885 L1.963,2.877 L0.080,0.905 C-0.036,0.784 -0.029,0.592 0.095,0.479 L0.547,0.068 C0.671,-0.045 0.867,-0.039 0.983,0.083 L3.823,3.057 C3.867,3.102 3.876,3.161 3.885,3.218 C3.945,3.267 3.988,3.334 3.988,3.416 L3.988,3.681 C3.988,3.690 3.979,3.694 3.979,3.703 Z" fill="rgb(148, 156, 176)"/></svg>
                                        </a>
                                    </div>
                                </header>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="pills-three-code-features-example2-3" role="tabpanel" aria-labelledby="pills-three-code-features-example2-tab-3">
                        <div class="row">
                            <div class="col-md-7 col-lg-8 col-xl-9">
                                <div class="js-slick-carousel slick slick-gutters-2"
                                    data-hs-slick-carousel-options='{
                                        "prevArrow": "<span class=\"fas fa-chevron-left dark slick-arrow slick-arrow-v1 left slick-arrow-right rounded-circle position-absolute bottom-0\"></span>",
                                        "nextArrow": "<span class=\"fas fa-chevron-right dark slick-arrow slick-arrow-v1 right slick-arrow-right rounded-circle position-absolute\"></span>",
                                        "slidesToShow": 6,
                                        "responsive": [{
                                            "breakpoint": 1199,
                                            "settings": {
                                                "slidesToShow": 3
                                            }
                                        }, {
                                            "breakpoint": 768,
                                            "settings": {
                                                "slidesToShow": 1
                                            }
                                        }]
                                    }'>
                                    <div class="product">
                                        <div class="product-image mb-2">
                                            <a href="../single-movies/single-movies-v3.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                        </div>
                                        <div class="product-meta font-size-12 mb-1">
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">2020</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Action</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Comedy</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Mystery</a></span>
                                        </div>
                                        <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v3.html">The Convenient Groom</a></div>
                                    </div>
                                    <div class="product">
                                        <div class="product-image mb-2">
                                            <a href="../single-movies/single-movies-v3.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                        </div>
                                        <div class="product-meta font-size-12 mb-1">
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">2020</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Action</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Comedy</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Mystery</a></span>
                                        </div>
                                        <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v3.html">Bpm</a></div>
                                    </div>
                                    <div class="product">
                                        <div class="product-image mb-2">
                                            <a href="../single-movies/single-movies-v3.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                        </div>
                                        <div class="product-meta font-size-12 mb-1">
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">2020</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Action</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Comedy</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Mystery</a></span>
                                        </div>
                                        <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v3.html">Sunday</a></div>
                                    </div>
                                    <div class="product">
                                        <div class="product-image mb-2">
                                            <a href="../single-movies/single-movies-v3.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                        </div>
                                        <div class="product-meta font-size-12 mb-1">
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">2020</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Action</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Comedy</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Mystery</a></span>
                                        </div>
                                        <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v3.html">Fantastic Beasts and Where to Find Them</a></div>
                                    </div>
                                    <div class="product">
                                        <div class="product-image mb-2">
                                            <a href="../single-movies/single-movies-v3.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                        </div>
                                        <div class="product-meta font-size-12 mb-1">
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">2020</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Action</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Comedy</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Mystery</a></span>
                                        </div>
                                        <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v3.html">Dirt</a></div>
                                    </div>
                                    <div class="product">
                                        <div class="product-image mb-2">
                                            <a href="../single-movies/single-movies-v3.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                        </div>
                                        <div class="product-meta font-size-12 mb-1">
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">2020</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Action</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Comedy</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Mystery</a></span>
                                        </div>
                                        <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v3.html">The Convenient Groom</a></div>
                                    </div>
                                    <div class="product">
                                        <div class="product-image mb-2">
                                            <a href="../single-movies/single-movies-v3.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                        </div>
                                        <div class="product-meta font-size-12 mb-1">
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">2020</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Action</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Comedy</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Mystery</a></span>
                                        </div>
                                        <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v3.html">The Convenient Groom</a></div>
                                    </div>
                                    <div class="product">
                                        <div class="product-image mb-2">
                                            <a href="../single-movies/single-movies-v3.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                        </div>
                                        <div class="product-meta font-size-12 mb-1">
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">2020</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Action</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Comedy</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Mystery</a></span>
                                        </div>
                                        <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v3.html">Bpm</a></div>
                                    </div>
                                    <div class="product">
                                        <div class="product-image mb-2">
                                            <a href="../single-movies/single-movies-v3.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                        </div>
                                        <div class="product-meta font-size-12 mb-1">
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">2020</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Action</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Comedy</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Mystery</a></span>
                                        </div>
                                        <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v3.html">Sunday</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 col-lg-4 col-xl-3 d-flex">
                                <header class="max-w-370 mt-auto mb-xl-8 title-dash">
                                    <h4 class="text-white display-7 mb-3 font-weight-semi-bold">Romantic for Valentines Day</h4>
                                    <div class="mt-11">
                                        <a href="../archive/movies.html" class="h-w-primary text-gray-1300 d-inline-flex align-items-center pt-2 font-secondary font-weight-medium font-size-13">VIEW ALL
                                            <svg class="ml-2" xmlns="http://www.w3.org/2000/svg" width="4" height="7"><path d="M3.979,3.703 C3.987,3.785 3.966,3.869 3.903,3.934 L1.038,6.901 C0.921,7.023 0.724,7.029 0.598,6.916 L0.143,6.506 C0.017,6.393 0.011,6.203 0.128,6.082 L2.190,3.946 C2.276,3.829 2.356,3.691 2.356,3.548 C2.356,3.214 1.947,2.885 1.947,2.885 L1.963,2.877 L0.080,0.905 C-0.036,0.784 -0.029,0.592 0.095,0.479 L0.547,0.068 C0.671,-0.045 0.867,-0.039 0.983,0.083 L3.823,3.057 C3.867,3.102 3.876,3.161 3.885,3.218 C3.945,3.267 3.988,3.334 3.988,3.416 L3.988,3.681 C3.988,3.690 3.979,3.694 3.979,3.703 Z" fill="rgb(148, 156, 176)"/></svg>
                                        </a>
                                    </div>
                                </header>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Tab Content -->
            </div>
        </section>
        <!-- End movies carousel aside header -->

        <!-- movies carousel aside header -->
        <section class="bg-gray-2000 dark space-2">
            <div class="container px-md-4">
                <!-- Nav -->
                <div class="text-center tab-nav__v1">
                    <ul class="nav mb-7" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-one-code-features-example2-tab-11" data-toggle="pill" href="#pills-one-code-features-example2-11" role="tab" aria-controls="pills-one-code-features-example2-11" aria-selected="true">Today</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-two-code-features-example2-tab-22" data-toggle="pill" href="#pills-two-code-features-example2-22" role="tab" aria-controls="pills-two-code-features-example2-22" aria-selected="false">This week</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-three-code-features-example2-tab-33" data-toggle="pill" href="#pills-three-code-features-example2-33" role="tab" aria-controls="pills-three-code-features-example2-33" aria-selected="false">Last 30 days</a>
                        </li>
                    </ul>
                </div>
                <!-- End Nav -->

                <!-- Tab Content -->
                <div class="tab-content slick__tab">
                    <div class="tab-pane fade show active" id="pills-one-code-features-example2-11" role="tabpanel" aria-labelledby="pills-one-code-features-example2-tab-11">
                        <div class="row position-relative">
                            <div class="col-md-5 col-lg-4 col-xl-3 d-flex">
                                <header class="max-w-370 mt-auto mb-8 title-dash">
                                    <h3 class="text-white display-7 mb-3 font-weight-semi-bold">Romantic for Valentines Day</h3>
                                    <div class="mt-11">
                                        <a href="../archive/movies.html" class="h-w-primary text-gray-1300 d-inline-flex align-items-center pt-2 font-secondary font-weight-medium font-size-13">VIEW ALL
                                            <svg class="ml-2" xmlns="http://www.w3.org/2000/svg" width="4" height="7"><path d="M3.979,3.703 C3.987,3.785 3.966,3.869 3.903,3.934 L1.038,6.901 C0.921,7.023 0.724,7.029 0.598,6.916 L0.143,6.506 C0.017,6.393 0.011,6.203 0.128,6.082 L2.190,3.946 C2.276,3.829 2.356,3.691 2.356,3.548 C2.356,3.214 1.947,2.885 1.947,2.885 L1.963,2.877 L0.080,0.905 C-0.036,0.784 -0.029,0.592 0.095,0.479 L0.547,0.068 C0.671,-0.045 0.867,-0.039 0.983,0.083 L3.823,3.057 C3.867,3.102 3.876,3.161 3.885,3.218 C3.945,3.267 3.988,3.334 3.988,3.416 L3.988,3.681 C3.988,3.690 3.979,3.694 3.979,3.703 Z" fill="rgb(148, 156, 176)"/></svg>
                                        </a>
                                    </div>
                                </header>
                            </div>
                            <div class="col-md-7 col-lg-8 col-xl-9 position-static">
                                <div class="js-slick-carousel slick slick-gutters-2 position-static"
                                    data-hs-slick-carousel-options='{
                                        "prevArrow": "<span class=\"fas fa-chevron-left dark slick-arrow slick-arrow-v1 left-position left slick-arrow-right rounded-circle position-absolute bottom-0\"></span>",
                                        "nextArrow": "<span class=\"fas fa-chevron-right dark slick-arrow slick-arrow-v1 left-position right slick-arrow-right rounded-circle position-absolute\"></span>",
                                        "slidesToShow": 6,
                                        "responsive": [{
                                            "breakpoint": 1199,
                                            "settings": {
                                                "slidesToShow": 3
                                            }
                                        }, {
                                            "breakpoint": 768,
                                            "settings": {
                                                "slidesToShow": 1
                                            }
                                        }]
                                    }'>
                                    <div class="product">
                                        <div class="product-image mb-2">
                                            <a href="../single-movies/single-movies-v3.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                        </div>
                                        <div class="product-meta font-size-12 mb-1">
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">2020</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Action</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Comedy</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Mystery</a></span>
                                        </div>
                                        <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v3.html">The Convenient Groom</a></div>
                                    </div>
                                    <div class="product">
                                        <div class="product-image mb-2">
                                            <a href="../single-movies/single-movies-v3.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                        </div>
                                        <div class="product-meta font-size-12 mb-1">
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">2020</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Action</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Comedy</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Mystery</a></span>
                                        </div>
                                        <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v3.html">Bpm</a></div>
                                    </div>
                                    <div class="product">
                                        <div class="product-image mb-2">
                                            <a href="../single-movies/single-movies-v3.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                        </div>
                                        <div class="product-meta font-size-12 mb-1">
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">2020</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Action</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Comedy</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Mystery</a></span>
                                        </div>
                                        <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v3.html">Sunday</a></div>
                                    </div>
                                    <div class="product">
                                        <div class="product-image mb-2">
                                            <a href="../single-movies/single-movies-v3.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                        </div>
                                        <div class="product-meta font-size-12 mb-1">
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">2020</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Action</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Comedy</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Mystery</a></span>
                                        </div>
                                        <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v3.html">Fantastic Beasts and Where to Find Them</a></div>
                                    </div>
                                    <div class="product">
                                        <div class="product-image mb-2">
                                            <a href="../single-movies/single-movies-v3.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                        </div>
                                        <div class="product-meta font-size-12 mb-1">
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">2020</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Action</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Comedy</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Mystery</a></span>
                                        </div>
                                        <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v3.html">Dirt</a></div>
                                    </div>
                                    <div class="product">
                                        <div class="product-image mb-2">
                                            <a href="../single-movies/single-movies-v3.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                        </div>
                                        <div class="product-meta font-size-12 mb-1">
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">2020</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Action</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Comedy</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Mystery</a></span>
                                        </div>
                                        <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v3.html">The Convenient Groom</a></div>
                                    </div>
                                    <div class="product">
                                        <div class="product-image mb-2">
                                            <a href="../single-movies/single-movies-v3.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                        </div>
                                        <div class="product-meta font-size-12 mb-1">
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">2020</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Action</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Comedy</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Mystery</a></span>
                                        </div>
                                        <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v3.html">The Convenient Groom</a></div>
                                    </div>
                                    <div class="product">
                                        <div class="product-image mb-2">
                                            <a href="../single-movies/single-movies-v3.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                        </div>
                                        <div class="product-meta font-size-12 mb-1">
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">2020</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Action</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Comedy</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Mystery</a></span>
                                        </div>
                                        <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v3.html">Bpm</a></div>
                                    </div>
                                    <div class="product">
                                        <div class="product-image mb-2">
                                            <a href="../single-movies/single-movies-v3.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                        </div>
                                        <div class="product-meta font-size-12 mb-1">
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">2020</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Action</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Comedy</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Mystery</a></span>
                                        </div>
                                        <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v3.html">Sunday</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="pills-two-code-features-example2-22" role="tabpanel" aria-labelledby="pills-two-code-features-example2-tab-22">
                        <div class="row position-relative">
                            <div class="col-md-5 col-lg-4 col-xl-3 d-flex">
                                <header class="max-w-370 mt-auto mb-8 title-dash">
                                    <h3 class="text-white display-7 mb-3 font-weight-semi-bold">Romantic for Valentines Day</h3>
                                    <div class="mt-11">
                                        <a href="../archive/movies.html" class="h-w-primary text-gray-1300 d-inline-flex align-items-center pt-2 font-secondary font-weight-medium font-size-13">VIEW ALL
                                            <svg class="ml-2" xmlns="http://www.w3.org/2000/svg" width="4" height="7"><path d="M3.979,3.703 C3.987,3.785 3.966,3.869 3.903,3.934 L1.038,6.901 C0.921,7.023 0.724,7.029 0.598,6.916 L0.143,6.506 C0.017,6.393 0.011,6.203 0.128,6.082 L2.190,3.946 C2.276,3.829 2.356,3.691 2.356,3.548 C2.356,3.214 1.947,2.885 1.947,2.885 L1.963,2.877 L0.080,0.905 C-0.036,0.784 -0.029,0.592 0.095,0.479 L0.547,0.068 C0.671,-0.045 0.867,-0.039 0.983,0.083 L3.823,3.057 C3.867,3.102 3.876,3.161 3.885,3.218 C3.945,3.267 3.988,3.334 3.988,3.416 L3.988,3.681 C3.988,3.690 3.979,3.694 3.979,3.703 Z" fill="rgb(148, 156, 176)"/></svg>
                                        </a>
                                    </div>
                                </header>
                            </div>
                            <div class="col-md-7 col-lg-8 col-xl-9 position-static">
                                <div class="js-slick-carousel slick slick-gutters-2 position-static"
                                    data-hs-slick-carousel-options='{
                                        "prevArrow": "<span class=\"fas fa-chevron-left dark slick-arrow slick-arrow-v1 left-position left slick-arrow-right rounded-circle position-absolute bottom-0\"></span>",
                                        "nextArrow": "<span class=\"fas fa-chevron-right dark slick-arrow slick-arrow-v1 left-position right slick-arrow-right rounded-circle position-absolute\"></span>",
                                        "slidesToShow": 6,
                                        "responsive": [{
                                            "breakpoint": 1199,
                                            "settings": {
                                                "slidesToShow": 3
                                            }
                                        }, {
                                            "breakpoint": 768,
                                            "settings": {
                                                "slidesToShow": 1
                                            }
                                        }]
                                    }'>
                                    <div class="product">
                                        <div class="product-image mb-2">
                                            <a href="../single-movies/single-movies-v3.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                        </div>
                                        <div class="product-meta font-size-12 mb-1">
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">2020</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Action</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Comedy</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Mystery</a></span>
                                        </div>
                                        <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v3.html">Dirt</a></div>
                                    </div>
                                    <div class="product">
                                        <div class="product-image mb-2">
                                            <a href="../single-movies/single-movies-v3.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                        </div>
                                        <div class="product-meta font-size-12 mb-1">
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">2020</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Action</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Comedy</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Mystery</a></span>
                                        </div>
                                        <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v3.html">The Convenient Groom</a></div>
                                    </div>
                                    <div class="product">
                                        <div class="product-image mb-2">
                                            <a href="../single-movies/single-movies-v3.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                        </div>
                                        <div class="product-meta font-size-12 mb-1">
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">2020</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Action</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Comedy</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Mystery</a></span>
                                        </div>
                                        <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v3.html">The Convenient Groom</a></div>
                                    </div>
                                    <div class="product">
                                        <div class="product-image mb-2">
                                            <a href="../single-movies/single-movies-v3.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                        </div>
                                        <div class="product-meta font-size-12 mb-1">
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">2020</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Action</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Comedy</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Mystery</a></span>
                                        </div>
                                        <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v3.html">Bpm</a></div>
                                    </div>
                                    <div class="product">
                                        <div class="product-image mb-2">
                                            <a href="../single-movies/single-movies-v3.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                        </div>
                                        <div class="product-meta font-size-12 mb-1">
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">2020</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Action</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Comedy</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Mystery</a></span>
                                        </div>
                                        <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v3.html">Sunday</a></div>
                                    </div>
                                    <div class="product">
                                        <div class="product-image mb-2">
                                            <a href="../single-movies/single-movies-v3.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                        </div>
                                        <div class="product-meta font-size-12 mb-1">
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">2020</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Action</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Comedy</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Mystery</a></span>
                                        </div>
                                        <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v3.html">The Convenient Groom</a></div>
                                    </div>
                                    <div class="product">
                                        <div class="product-image mb-2">
                                            <a href="../single-movies/single-movies-v3.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                        </div>
                                        <div class="product-meta font-size-12 mb-1">
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">2020</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Action</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Comedy</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Mystery</a></span>
                                        </div>
                                        <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v3.html">Bpm</a></div>
                                    </div>
                                    <div class="product">
                                        <div class="product-image mb-2">
                                            <a href="../single-movies/single-movies-v3.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                        </div>
                                        <div class="product-meta font-size-12 mb-1">
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">2020</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Action</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Comedy</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Mystery</a></span>
                                        </div>
                                        <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v3.html">Sunday</a></div>
                                    </div>
                                    <div class="product">
                                        <div class="product-image mb-2">
                                            <a href="../single-movies/single-movies-v3.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                        </div>
                                        <div class="product-meta font-size-12 mb-1">
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">2020</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Action</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Comedy</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Mystery</a></span>
                                        </div>
                                        <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v3.html">Fantastic Beasts and Where to Find Them</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="pills-three-code-features-example2-33" role="tabpanel" aria-labelledby="pills-three-code-features-example2-tab-33">
                        <div class="row position-relative">
                            <div class="col-md-5 col-lg-4 col-xl-3 d-flex">
                                <header class="max-w-370 mt-auto mb-8 title-dash">
                                    <h3 class="text-white display-7 mb-3 font-weight-semi-bold">Romantic for Valentines Day</h3>
                                    <div class="mt-11">
                                        <a href="../archive/movies.html" class="h-w-primary text-gray-1300 d-inline-flex align-items-center pt-2 font-secondary font-weight-medium font-size-13">VIEW ALL
                                            <svg class="ml-2" xmlns="http://www.w3.org/2000/svg" width="4" height="7"><path d="M3.979,3.703 C3.987,3.785 3.966,3.869 3.903,3.934 L1.038,6.901 C0.921,7.023 0.724,7.029 0.598,6.916 L0.143,6.506 C0.017,6.393 0.011,6.203 0.128,6.082 L2.190,3.946 C2.276,3.829 2.356,3.691 2.356,3.548 C2.356,3.214 1.947,2.885 1.947,2.885 L1.963,2.877 L0.080,0.905 C-0.036,0.784 -0.029,0.592 0.095,0.479 L0.547,0.068 C0.671,-0.045 0.867,-0.039 0.983,0.083 L3.823,3.057 C3.867,3.102 3.876,3.161 3.885,3.218 C3.945,3.267 3.988,3.334 3.988,3.416 L3.988,3.681 C3.988,3.690 3.979,3.694 3.979,3.703 Z" fill="rgb(148, 156, 176)"/></svg>
                                        </a>
                                    </div>
                                </header>
                            </div>
                            <div class="col-md-7 col-lg-8 col-xl-9 position-static">
                                <div class="js-slick-carousel slick slick-gutters-2 position-static"
                                    data-hs-slick-carousel-options='{
                                        "prevArrow": "<span class=\"fas fa-chevron-left dark slick-arrow slick-arrow-v1 left-position left slick-arrow-right rounded-circle position-absolute bottom-0\"></span>",
                                        "nextArrow": "<span class=\"fas fa-chevron-right dark slick-arrow slick-arrow-v1 left-position right slick-arrow-right rounded-circle position-absolute\"></span>",
                                        "slidesToShow": 6,
                                        "responsive": [{
                                            "breakpoint": 1199,
                                            "settings": {
                                                "slidesToShow": 3
                                            }
                                        }, {
                                            "breakpoint": 768,
                                            "settings": {
                                                "slidesToShow": 1
                                            }
                                        }]
                                    }'>
                                    <div class="product">
                                        <div class="product-image mb-2">
                                            <a href="../single-movies/single-movies-v3.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                        </div>
                                        <div class="product-meta font-size-12 mb-1">
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">2020</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Action</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Comedy</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Mystery</a></span>
                                        </div>
                                        <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v3.html">The Convenient Groom</a></div>
                                    </div>
                                    <div class="product">
                                        <div class="product-image mb-2">
                                            <a href="../single-movies/single-movies-v3.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                        </div>
                                        <div class="product-meta font-size-12 mb-1">
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">2020</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Action</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Comedy</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Mystery</a></span>
                                        </div>
                                        <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v3.html">Bpm</a></div>
                                    </div>
                                    <div class="product">
                                        <div class="product-image mb-2">
                                            <a href="../single-movies/single-movies-v3.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                        </div>
                                        <div class="product-meta font-size-12 mb-1">
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">2020</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Action</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Comedy</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Mystery</a></span>
                                        </div>
                                        <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v3.html">Sunday</a></div>
                                    </div>
                                    <div class="product">
                                        <div class="product-image mb-2">
                                            <a href="../single-movies/single-movies-v3.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                        </div>
                                        <div class="product-meta font-size-12 mb-1">
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">2020</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Action</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Comedy</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Mystery</a></span>
                                        </div>
                                        <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v3.html">Fantastic Beasts and Where to Find Them</a></div>
                                    </div>
                                    <div class="product">
                                        <div class="product-image mb-2">
                                            <a href="../single-movies/single-movies-v3.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                        </div>
                                        <div class="product-meta font-size-12 mb-1">
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">2020</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Action</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Comedy</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Mystery</a></span>
                                        </div>
                                        <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v3.html">Dirt</a></div>
                                    </div>
                                    <div class="product">
                                        <div class="product-image mb-2">
                                            <a href="../single-movies/single-movies-v3.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                        </div>
                                        <div class="product-meta font-size-12 mb-1">
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">2020</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Action</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Comedy</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Mystery</a></span>
                                        </div>
                                        <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v3.html">The Convenient Groom</a></div>
                                    </div>
                                    <div class="product">
                                        <div class="product-image mb-2">
                                            <a href="../single-movies/single-movies-v3.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                        </div>
                                        <div class="product-meta font-size-12 mb-1">
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">2020</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Action</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Comedy</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Mystery</a></span>
                                        </div>
                                        <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v3.html">The Convenient Groom</a></div>
                                    </div>
                                    <div class="product">
                                        <div class="product-image mb-2">
                                            <a href="../single-movies/single-movies-v3.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                        </div>
                                        <div class="product-meta font-size-12 mb-1">
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">2020</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Action</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Comedy</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Mystery</a></span>
                                        </div>
                                        <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v3.html">Bpm</a></div>
                                    </div>
                                    <div class="product">
                                        <div class="product-image mb-2">
                                            <a href="../single-movies/single-movies-v3.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                        </div>
                                        <div class="product-meta font-size-12 mb-1">
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">2020</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Action</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Comedy</a></span>
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary">Mystery</a></span>
                                        </div>
                                        <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v3.html">Sunday</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Tab Content -->
            </div>
        </section>
        <!-- End movies carousel aside header -->

        <div class="bg-img-hero space-top-3 space-bottom-1  dark" style="background-image: url(https://placehold.it/1920x667/424242);">
            <div class="text-center">
                <a href="#" class="display-8 h-w-primary d-inline-block font-secondary mb-5">Vikings</a>
                <p class="max-w-370 font-size-26 mx-auto text-white font-secondary mb-6">New Season 5 just flow in. Watch and Debate</p>
            </div>
            <!-- Nav -->
            <div class="text-center">
                <ul class="nav justify-content-center align-items-center mb-7 tab-nav__v4 font-secondary font-weight-semi-bold font-size-1rem" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-one-code-features-example2-tab-9" data-toggle="pill" href="#pills-one-code-features-example2-9" role="tab" aria-controls="pills-one-code-features-example2-9" aria-selected="true">Season 1</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-two-code-features-example2-tab-99" data-toggle="pill" href="#pills-two-code-features-example2-99" role="tab" aria-controls="pills-two-code-features-example2-99" aria-selected="false">Season 2</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-three-code-features-example2-tab-999" data-toggle="pill" href="#pills-three-code-features-example2-999" role="tab" aria-controls="pills-three-code-features-example2-999" aria-selected="false">Season 3</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-three-code-features-example2-tab-8" data-toggle="pill" href="#pills-three-code-features-example2-8" role="tab" aria-controls="pills-three-code-features-example2-8" aria-selected="false">Season 4</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-three-code-features-example2-tab-88" data-toggle="pill" href="#pills-three-code-features-example2-88" role="tab" aria-controls="pills-three-code-features-example2-88" aria-selected="false">Season 5</a>
                    </li>
                </ul>
            </div>
            <!-- End Nav -->

            <!-- Tab Content -->
            <div class="tab-content">
                <div class="tab-pane fade show active" id="pills-one-code-features-example2-9" role="tabpanel" aria-labelledby="pills-one-code-features-example2-tab-9">
                    <div class="container">
                        <div class="row row-cols-2 row-cols-md-3 row-cols-xl-5 no-gutters">
                            <div class="col">
                                <div class="product px-2 mb-4">
                                    <div class="product-image mb-1">
                                        <a class="d-inline-block position-relative stretched-link" href="../single-episodes/single-episodes-v2.html">
                                            <img class="img-fluid" src="https://placehold.it/261x148" alt="Image Description">
                                        </a>
                                    </div>
                                    <div class="product-title">
                                        <a class="d-inline-block" href="../single-episodes/single-episodes-v2.html">
                                            <span class="text-gray-1300 font-size-12">S01E01</span>
                                            <div class="mb-0 font-weight-bold font-size-1">15 Million Merit</div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="product px-2 mb-4">
                                    <div class="product-image mb-1">
                                        <a class="d-inline-block position-relative stretched-link" href="../single-episodes/single-episodes-v2.html">
                                            <img class="img-fluid" src="https://placehold.it/261x148" alt="Image Description">
                                        </a>
                                    </div>
                                    <div class="product-title">
                                        <a class="d-inline-block" href="../single-episodes/single-episodes-v2.html">
                                            <span class="text-gray-1300 font-size-12">S01E02</span>
                                            <div class="mb-0 font-weight-bold font-size-1">The Departed Part 2</div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="product px-2 mb-4">
                                    <div class="product-image mb-1">
                                        <a class="d-inline-block position-relative stretched-link" href="../single-episodes/single-episodes-v2.html">
                                            <img class="img-fluid" src="https://placehold.it/261x148" alt="Image Description">
                                        </a>
                                    </div>
                                    <div class="product-title">
                                        <a class="d-inline-block" href="../single-episodes/single-episodes-v2.html">
                                            <span class="text-gray-1300 font-size-12">S01E03</span>
                                            <div class="mb-0 font-weight-bold font-size-1">Homeland</div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="product px-2 mb-4">
                                    <div class="product-image mb-1">
                                        <a class="d-inline-block position-relative stretched-link" href="../single-episodes/single-episodes-v2.html">
                                            <img class="img-fluid" src="https://placehold.it/261x148" alt="Image Description">
                                        </a>
                                    </div>
                                    <div class="product-title">
                                        <a class="d-inline-block" href="../single-episodes/single-episodes-v2.html">
                                            <span class="text-gray-1300 font-size-12">S01E04</span>
                                            <div class="mb-0 font-weight-bold font-size-1">The Plan</div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="product px-2 mb-4">
                                    <div class="product-image mb-1">
                                        <a class="d-inline-block position-relative stretched-link" href="../single-episodes/single-episodes-v2.html">
                                            <img class="img-fluid" src="https://placehold.it/261x148" alt="Image Description">
                                        </a>
                                    </div>
                                    <div class="product-title">
                                        <a class="d-inline-block" href="../single-episodes/single-episodes-v2.html">
                                            <span class="text-gray-1300 font-size-12">S01E05</span>
                                            <div class="mb-0 font-weight-bold font-size-1">The Prisoner</div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="pills-two-code-features-example2-99" role="tabpanel" aria-labelledby="pills-two-code-features-example2-tab-99">
                    <div class="container">
                        <div class="row row-cols-2 row-cols-md-3 row-cols-xl-5 no-gutters">
                            <div class="col">
                                <div class="product px-2 mb-4">
                                    <div class="product-image mb-1">
                                        <a class="d-inline-block position-relative stretched-link" href="../single-episodes/single-episodes-v2.html">
                                            <img class="img-fluid" src="https://placehold.it/261x148" alt="Image Description">
                                        </a>
                                    </div>
                                    <div class="product-title">
                                        <a class="d-inline-block" href="../single-episodes/single-episodes-v2.html">
                                            <span class="text-gray-1300 font-size-12">S01E01</span>
                                            <div class="mb-0 font-weight-bold font-size-1">15 Million Merit</div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="product px-2 mb-4">
                                    <div class="product-image mb-1">
                                        <a class="d-inline-block position-relative stretched-link" href="../single-episodes/single-episodes-v2.html">
                                            <img class="img-fluid" src="https://placehold.it/261x148" alt="Image Description">
                                        </a>
                                    </div>
                                    <div class="product-title">
                                        <a class="d-inline-block" href="../single-episodes/single-episodes-v2.html">
                                            <span class="text-gray-1300 font-size-12">S01E02</span>
                                            <div class="mb-0 font-weight-bold font-size-1">The Departed Part 2</div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="product px-2 mb-4">
                                    <div class="product-image mb-1">
                                        <a class="d-inline-block position-relative stretched-link" href="../single-episodes/single-episodes-v2.html">
                                            <img class="img-fluid" src="https://placehold.it/261x148" alt="Image Description">
                                        </a>
                                    </div>
                                    <div class="product-title">
                                        <a class="d-inline-block" href="../single-episodes/single-episodes-v2.html">
                                            <span class="text-gray-1300 font-size-12">S01E03</span>
                                            <div class="mb-0 font-weight-bold font-size-1">Homeland</div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="product px-2 mb-4">
                                    <div class="product-image mb-1">
                                        <a class="d-inline-block position-relative stretched-link" href="../single-episodes/single-episodes-v2.html">
                                            <img class="img-fluid" src="https://placehold.it/261x148" alt="Image Description">
                                        </a>
                                    </div>
                                    <div class="product-title">
                                        <a class="d-inline-block" href="../single-episodes/single-episodes-v2.html">
                                            <span class="text-gray-1300 font-size-12">S01E04</span>
                                            <div class="mb-0 font-weight-bold font-size-1">The Plan</div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="product px-2 mb-4">
                                    <div class="product-image mb-1">
                                        <a class="d-inline-block position-relative stretched-link" href="../single-episodes/single-episodes-v2.html">
                                            <img class="img-fluid" src="https://placehold.it/261x148" alt="Image Description">
                                        </a>
                                    </div>
                                    <div class="product-title">
                                        <a class="d-inline-block" href="../single-episodes/single-episodes-v2.html">
                                            <span class="text-gray-1300 font-size-12">S01E05</span>
                                            <div class="mb-0 font-weight-bold font-size-1">The Prisoner</div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="pills-three-code-features-example2-999" role="tabpanel" aria-labelledby="pills-three-code-features-example2-tab-999">
                    <div class="container">
                        <div class="row row-cols-2 row-cols-md-3 row-cols-xl-5 no-gutters">
                            <div class="col">
                                <div class="product px-2 mb-4">
                                    <div class="product-image mb-1">
                                        <a class="d-inline-block position-relative stretched-link" href="../single-episodes/single-episodes-v2.html">
                                            <img class="img-fluid" src="https://placehold.it/261x148" alt="Image Description">
                                        </a>
                                    </div>
                                    <div class="product-title">
                                        <a class="d-inline-block" href="../single-episodes/single-episodes-v2.html">
                                            <span class="text-gray-1300 font-size-12">S01E01</span>
                                            <div class="mb-0 font-weight-bold font-size-1">15 Million Merit</div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="product px-2 mb-4">
                                    <div class="product-image mb-1">
                                        <a class="d-inline-block position-relative stretched-link" href="../single-episodes/single-episodes-v2.html">
                                            <img class="img-fluid" src="https://placehold.it/261x148" alt="Image Description">
                                        </a>
                                    </div>
                                    <div class="product-title">
                                        <a class="d-inline-block" href="../single-episodes/single-episodes-v2.html">
                                            <span class="text-gray-1300 font-size-12">S01E02</span>
                                            <div class="mb-0 font-weight-bold font-size-1">The Departed Part 2</div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="product px-2 mb-4">
                                    <div class="product-image mb-1">
                                        <a class="d-inline-block position-relative stretched-link" href="../single-episodes/single-episodes-v2.html">
                                            <img class="img-fluid" src="https://placehold.it/261x148" alt="Image Description">
                                        </a>
                                    </div>
                                    <div class="product-title">
                                        <a class="d-inline-block" href="../single-episodes/single-episodes-v2.html">
                                            <span class="text-gray-1300 font-size-12">S01E03</span>
                                            <div class="mb-0 font-weight-bold font-size-1">Homeland</div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="product px-2 mb-4">
                                    <div class="product-image mb-1">
                                        <a class="d-inline-block position-relative stretched-link" href="../single-episodes/single-episodes-v2.html">
                                            <img class="img-fluid" src="https://placehold.it/261x148" alt="Image Description">
                                        </a>
                                    </div>
                                    <div class="product-title">
                                        <a class="d-inline-block" href="../single-episodes/single-episodes-v2.html">
                                            <span class="text-gray-1300 font-size-12">S01E04</span>
                                            <div class="mb-0 font-weight-bold font-size-1">The Plan</div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="product px-2 mb-4">
                                    <div class="product-image mb-1">
                                        <a class="d-inline-block position-relative stretched-link" href="../single-episodes/single-episodes-v2.html">
                                            <img class="img-fluid" src="https://placehold.it/261x148" alt="Image Description">
                                        </a>
                                    </div>
                                    <div class="product-title">
                                        <a class="d-inline-block" href="../single-episodes/single-episodes-v2.html">
                                            <span class="text-gray-1300 font-size-12">S01E05</span>
                                            <div class="mb-0 font-weight-bold font-size-1">The Prisoner</div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="pills-three-code-features-example2-8" role="tabpanel" aria-labelledby="pills-three-code-features-example2-tab-8">
                    <div class="container">
                        <div class="row row-cols-2 row-cols-md-3 row-cols-xl-5 no-gutters">
                            <div class="col">
                                <div class="product px-2 mb-4">
                                    <div class="product-image mb-1">
                                        <a class="d-inline-block position-relative stretched-link" href="../single-episodes/single-episodes-v2.html">
                                            <img class="img-fluid" src="https://placehold.it/261x148" alt="Image Description">
                                        </a>
                                    </div>
                                    <div class="product-title">
                                        <a class="d-inline-block" href="../single-episodes/single-episodes-v2.html">
                                            <span class="text-gray-1300 font-size-12">S01E01</span>
                                            <div class="mb-0 font-weight-bold font-size-1">15 Million Merit</div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="product px-2 mb-4">
                                    <div class="product-image mb-1">
                                        <a class="d-inline-block position-relative stretched-link" href="../single-episodes/single-episodes-v2.html">
                                            <img class="img-fluid" src="https://placehold.it/261x148" alt="Image Description">
                                        </a>
                                    </div>
                                    <div class="product-title">
                                        <a class="d-inline-block" href="../single-episodes/single-episodes-v2.html">
                                            <span class="text-gray-1300 font-size-12">S01E02</span>
                                            <div class="mb-0 font-weight-bold font-size-1">The Departed Part 2</div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="product px-2 mb-4">
                                    <div class="product-image mb-1">
                                        <a class="d-inline-block position-relative stretched-link" href="../single-episodes/single-episodes-v2.html">
                                            <img class="img-fluid" src="https://placehold.it/261x148" alt="Image Description">
                                        </a>
                                    </div>
                                    <div class="product-title">
                                        <a class="d-inline-block" href="../single-episodes/single-episodes-v2.html">
                                            <span class="text-gray-1300 font-size-12">S01E03</span>
                                            <div class="mb-0 font-weight-bold font-size-1">Homeland</div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="product px-2 mb-4">
                                    <div class="product-image mb-1">
                                        <a class="d-inline-block position-relative stretched-link" href="../single-episodes/single-episodes-v2.html">
                                            <img class="img-fluid" src="https://placehold.it/261x148" alt="Image Description">
                                        </a>
                                    </div>
                                    <div class="product-title">
                                        <a class="d-inline-block" href="../single-episodes/single-episodes-v2.html">
                                            <span class="text-gray-1300 font-size-12">S01E04</span>
                                            <div class="mb-0 font-weight-bold font-size-1">The Plan</div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="product px-2 mb-4">
                                    <div class="product-image mb-1">
                                        <a class="d-inline-block position-relative stretched-link" href="../single-episodes/single-episodes-v2.html">
                                            <img class="img-fluid" src="https://placehold.it/261x148" alt="Image Description">
                                        </a>
                                    </div>
                                    <div class="product-title">
                                        <a class="d-inline-block" href="../single-episodes/single-episodes-v2.html">
                                            <span class="text-gray-1300 font-size-12">S01E05</span>
                                            <div class="mb-0 font-weight-bold font-size-1">The Prisoner</div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="pills-three-code-features-example2-88" role="tabpanel" aria-labelledby="pills-three-code-features-example2-tab-88">
                    <div class="container">
                        <div class="row row-cols-2 row-cols-md-3 row-cols-xl-5 no-gutters">
                            <div class="col">
                                <div class="product px-2 mb-4">
                                    <div class="product-image mb-1">
                                        <a class="d-inline-block position-relative stretched-link" href="../single-episodes/single-episodes-v2.html">
                                            <img class="img-fluid" src="https://placehold.it/261x148" alt="Image Description">
                                        </a>
                                    </div>
                                    <div class="product-title">
                                        <a class="d-inline-block" href="../single-episodes/single-episodes-v2.html">
                                            <span class="text-gray-1300 font-size-12">S01E01</span>
                                            <div class="mb-0 font-weight-bold font-size-1">15 Million Merit</div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="product px-2 mb-4">
                                    <div class="product-image mb-1">
                                        <a class="d-inline-block position-relative stretched-link" href="../single-episodes/single-episodes-v2.html">
                                            <img class="img-fluid" src="https://placehold.it/261x148" alt="Image Description">
                                        </a>
                                    </div>
                                    <div class="product-title">
                                        <a class="d-inline-block" href="../single-episodes/single-episodes-v2.html">
                                            <span class="text-gray-1300 font-size-12">S01E02</span>
                                            <div class="mb-0 font-weight-bold font-size-1">The Departed Part 2</div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="product px-2 mb-4">
                                    <div class="product-image mb-1">
                                        <a class="d-inline-block position-relative stretched-link" href="../single-episodes/single-episodes-v2.html">
                                            <img class="img-fluid" src="https://placehold.it/261x148" alt="Image Description">
                                        </a>
                                    </div>
                                    <div class="product-title">
                                        <a class="d-inline-block" href="../single-episodes/single-episodes-v2.html">
                                            <span class="text-gray-1300 font-size-12">S01E03</span>
                                            <div class="mb-0 font-weight-bold font-size-1">Homeland</div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="product px-2 mb-4">
                                    <div class="product-image mb-1">
                                        <a class="d-inline-block position-relative stretched-link" href="../single-episodes/single-episodes-v2.html">
                                            <img class="img-fluid" src="https://placehold.it/261x148" alt="Image Description">
                                        </a>
                                    </div>
                                    <div class="product-title">
                                        <a class="d-inline-block" href="../single-episodes/single-episodes-v2.html">
                                            <span class="text-gray-1300 font-size-12">S01E04</span>
                                            <div class="mb-0 font-weight-bold font-size-1">The Plan</div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="product px-2 mb-4">
                                    <div class="product-image mb-1">
                                        <a class="d-inline-block position-relative stretched-link" href="../single-episodes/single-episodes-v2.html">
                                            <img class="img-fluid" src="https://placehold.it/261x148" alt="Image Description">
                                        </a>
                                    </div>
                                    <div class="product-title">
                                        <a class="d-inline-block" href="../single-episodes/single-episodes-v2.html">
                                            <span class="text-gray-1300 font-size-12">S01E05</span>
                                            <div class="mb-0 font-weight-bold font-size-1">The Prisoner</div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Tab Content -->
        </div>

        <section class="space-1 bg-gray-2800">
            <div class="container my-3">
                <div class="row">
                    <div class="offset-md-5 offset-lg-4 col-md-7 col-lg-8">
                        <!-- Nav -->
                        <div class="text-center tab-nav__v1">
                            <ul class="nav mb-2 mb-md-7" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-one-code-example2-tab" data-toggle="pill" href="#pills-one-code-example2" role="tab" aria-controls="pills-one-code-example2" aria-selected="true">Today</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-two-code-example2-tab" data-toggle="pill" href="#pills-two-code-example2" role="tab" aria-controls="pills-two-code-example2" aria-selected="false">This week</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-three-code-example2-tab" data-toggle="pill" href="#pills-three-code-example2" role="tab" aria-controls="pills-three-code-example2" aria-selected="false">Last 30 days</a>
                                </li>
                            </ul>
                        </div>
                        <!-- End Nav -->
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <!-- Tab Content -->
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="pills-one-code-example2" role="tabpanel" aria-labelledby="pills-one-code-example2-tab">
                                <div class="row">
                                    <div class="col-md-5 col-lg-4 mb-3 mb-md-5">
                                        <header class="max-w-370 mt-auto mb-xl-8 title-dash">
                                            <h3 class="display-7 mb-3 font-weight-semi-bold">Popular TV Series Right Now</h3>
                                        </header>
                                    </div>
                                    <div class="col-md-7 col-lg-8 mb-md-5">
                                        <div class="row row-cols-2 row-cols-lg-3 row-cols-xl-4 mx-n2">
                                            <div class="col px-2 mb-5 mb-md-0">
                                                <div class="product">
                                                    <div class="product-image mb-2">
                                                        <a href="../single-episodes/single-episodes-v4.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/222x126" alt="Image Description"></a>
                                                    </div>
                                                    <div class="product-meta font-size-12 mb-1">
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">Action</a></span>
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">Comedy</a></span>
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">2020</a></span>
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">Mystery</a></span>
                                                    </div>
                                                    <div class="product-title font-weight-bold font-size-1"><a href="../single-episodes/single-episodes-v4.html">Chicago Med</a></div>
                                                </div>
                                            </div>

                                            <div class="col px-2 mb-5 mb-md-0">
                                                <div class="product">
                                                    <div class="product-image mb-2">
                                                        <a href="../single-episodes/single-episodes-v4.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/222x126" alt="Image Description"></a>
                                                    </div>
                                                    <div class="product-meta font-size-12 mb-1">
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">Action</a></span>
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">Comedy</a></span>
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">Mystery</a></span>
                                                    </div>
                                                    <div class="product-title font-weight-bold font-size-1"><a href="../single-episodes/single-episodes-v4.html">The Last Man on the earth</a></div>
                                                </div>
                                            </div>

                                            <div class="col px-2 mb-5 mb-md-0 d-md-none d-lg-block">
                                                <div class="product">
                                                    <div class="product-image mb-2">
                                                        <a href="../single-episodes/single-episodes-v4.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/222x126" alt="Image Description"></a>
                                                    </div>
                                                    <div class="product-meta font-size-12 mb-1">
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">Comedy</a></span>
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">Mystery</a></span>
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">2020</a></span>
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">Action</a></span>
                                                    </div>
                                                    <div class="product-title font-weight-bold font-size-1"><a href="../single-episodes/single-episodes-v4.html">Unbreakable Kimmy Schmidt</a></div>
                                                </div>
                                            </div>

                                            <div class="col px-2 mb-5 mb-md-0 d-md-none d-xl-block">
                                                <div class="product">
                                                    <div class="product-image mb-2">
                                                        <a href="../single-episodes/single-episodes-v4.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/222x126" alt="Image Description"></a>
                                                    </div>
                                                    <div class="product-meta font-size-12 mb-1">
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">Mystery</a></span>
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">2020</a></span>
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">Action</a></span>
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">Comedy</a></span>
                                                    </div>
                                                    <div class="product-title font-weight-bold font-size-1"><a href="../single-episodes/single-episodes-v4.html">House of cards</a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-6 mx-n2">
                                            <div class="col px-2 mb-5 mb-md-0">
                                                <div class="product">
                                                    <div class="product-image mb-2">
                                                        <a href="../single-episodes/single-episodes-v4.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/222x126" alt="Image Description"></a>
                                                    </div>
                                                    <div class="product-meta font-size-12 mb-1">
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">Action</a></span>
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">Comedy</a></span>
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">2020</a></span>
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">Mystery</a></span>
                                                    </div>
                                                    <div class="product-title font-weight-bold font-size-1"><a href="../single-episodes/single-episodes-v4.html">Chicago Med</a></div>
                                                </div>
                                            </div>

                                            <div class="col px-2 mb-5 mb-md-0">
                                                <div class="product">
                                                    <div class="product-image mb-2">
                                                        <a href="../single-episodes/single-episodes-v4.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/222x126" alt="Image Description"></a>
                                                    </div>
                                                    <div class="product-meta font-size-12 mb-1">
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">Action</a></span>
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">Comedy</a></span>
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">Mystery</a></span>
                                                    </div>
                                                    <div class="product-title font-weight-bold font-size-1"><a href="../single-episodes/single-episodes-v4.html">The Last Man on the earth</a></div>
                                                </div>
                                            </div>

                                            <div class="col px-2 mb-5 mb-md-0">
                                                <div class="product">
                                                    <div class="product-image mb-2">
                                                        <a href="../single-episodes/single-episodes-v4.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/222x126" alt="Image Description"></a>
                                                    </div>
                                                    <div class="product-meta font-size-12 mb-1">
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">Comedy</a></span>
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">Mystery</a></span>
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">2020</a></span>
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">Action</a></span>
                                                    </div>
                                                    <div class="product-title font-weight-bold font-size-1"><a href="../single-episodes/single-episodes-v4.html">Unbreakable Kimmy Schmidt</a></div>
                                                </div>
                                            </div>

                                            <div class="col px-2 mb-5 mb-md-0 d-md-none d-lg-block">
                                                <div class="product">
                                                    <div class="product-image mb-2">
                                                        <a href="../single-episodes/single-episodes-v4.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/222x126" alt="Image Description"></a>
                                                    </div>
                                                    <div class="product-meta font-size-12 mb-1">
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">Mystery</a></span>
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">2020</a></span>
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">Action</a></span>
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">Comedy</a></span>
                                                    </div>
                                                    <div class="product-title font-weight-bold font-size-1"><a href="../single-episodes/single-episodes-v4.html">House of cards</a></div>
                                                </div>
                                            </div>

                                            <div class="col px-2 mb-5 mb-md-0 d-md-none d-xl-block">
                                                <div class="product">
                                                    <div class="product-image mb-2">
                                                        <a href="../single-episodes/single-episodes-v4.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/222x126" alt="Image Description"></a>
                                                    </div>
                                                    <div class="product-meta font-size-12 mb-1">
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">Action</a></span>
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">Comedy</a></span>
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">2020</a></span>
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">Mystery</a></span>
                                                    </div>
                                                    <div class="product-title font-weight-bold font-size-1"><a href="../single-episodes/single-episodes-v4.html">Chicago Med</a></div>
                                                </div>
                                            </div>

                                            <div class="col px-2 mb-5 mb-md-0 d-md-none d-xl-block">
                                                <div class="product">
                                                    <div class="product-image mb-2">
                                                        <a href="../single-episodes/single-episodes-v4.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/222x126" alt="Image Description"></a>
                                                    </div>
                                                    <div class="product-meta font-size-12 mb-1">
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">Action</a></span>
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">Comedy</a></span>
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">Mystery</a></span>
                                                    </div>
                                                    <div class="product-title font-weight-bold font-size-1"><a href="../single-episodes/single-episodes-v4.html">The Last Man on the earth</a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="pills-two-code-example2" role="tabpanel" aria-labelledby="pills-two-code-example2-tab">
                                <div class="row">
                                    <div class="col-md-5 col-lg-4 mb-3 mb-md-5">
                                        <header class="max-w-370 mt-auto mb-xl-8 title-dash">
                                            <h4 class="display-7 mb-3 font-weight-semi-bold">Popular TV Series Right Now</h4>
                                        </header>
                                    </div>
                                    <div class="col-md-7 col-lg-8 mb-md-5">
                                        <div class="row row-cols-2 row-cols-lg-3 row-cols-xl-4 mx-n2">
                                            <div class="col px-2 mb-5 mb-md-0">
                                                <div class="product">
                                                    <div class="product-image mb-2">
                                                        <a href="../single-episodes/single-episodes-v4.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/222x126" alt="Image Description"></a>
                                                    </div>
                                                    <div class="product-meta font-size-12 mb-1">
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">Action</a></span>
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">Comedy</a></span>
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">2020</a></span>
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">Mystery</a></span>
                                                    </div>
                                                    <div class="product-title font-weight-bold font-size-1"><a href="../single-episodes/single-episodes-v4.html">Chicago Med</a></div>
                                                </div>
                                            </div>

                                            <div class="col px-2 mb-5 mb-md-0">
                                                <div class="product">
                                                    <div class="product-image mb-2">
                                                        <a href="../single-episodes/single-episodes-v4.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/222x126" alt="Image Description"></a>
                                                    </div>
                                                    <div class="product-meta font-size-12 mb-1">
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">Action</a></span>
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">Comedy</a></span>
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">Mystery</a></span>
                                                    </div>
                                                    <div class="product-title font-weight-bold font-size-1"><a href="../single-episodes/single-episodes-v4.html">The Last Man on the earth</a></div>
                                                </div>
                                            </div>

                                            <div class="col px-2 mb-5 mb-md-0 d-md-none d-lg-block">
                                                <div class="product">
                                                    <div class="product-image mb-2">
                                                        <a href="../single-episodes/single-episodes-v4.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/222x126" alt="Image Description"></a>
                                                    </div>
                                                    <div class="product-meta font-size-12 mb-1">
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">Comedy</a></span>
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">Mystery</a></span>
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">2020</a></span>
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">Action</a></span>
                                                    </div>
                                                    <div class="product-title font-weight-bold font-size-1"><a href="../single-episodes/single-episodes-v4.html">Unbreakable Kimmy Schmidt</a></div>
                                                </div>
                                            </div>

                                            <div class="col px-2 mb-5 mb-md-0 d-md-none d-xl-block">
                                                <div class="product">
                                                    <div class="product-image mb-2">
                                                        <a href="../single-episodes/single-episodes-v4.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/222x126" alt="Image Description"></a>
                                                    </div>
                                                    <div class="product-meta font-size-12 mb-1">
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">Mystery</a></span>
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">2020</a></span>
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">Action</a></span>
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">Comedy</a></span>
                                                    </div>
                                                    <div class="product-title font-weight-bold font-size-1"><a href="../single-episodes/single-episodes-v4.html">House of cards</a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-6 mx-n2">
                                            <div class="col px-2 mb-5 mb-md-0">
                                                <div class="product">
                                                    <div class="product-image mb-2">
                                                        <a href="../single-episodes/single-episodes-v4.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/222x126" alt="Image Description"></a>
                                                    </div>
                                                    <div class="product-meta font-size-12 mb-1">
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">Action</a></span>
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">Comedy</a></span>
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">2020</a></span>
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">Mystery</a></span>
                                                    </div>
                                                    <div class="product-title font-weight-bold font-size-1"><a href="../single-episodes/single-episodes-v4.html">Chicago Med</a></div>
                                                </div>
                                            </div>

                                            <div class="col px-2 mb-5 mb-md-0">
                                                <div class="product">
                                                    <div class="product-image mb-2">
                                                        <a href="../single-episodes/single-episodes-v4.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/222x126" alt="Image Description"></a>
                                                    </div>
                                                    <div class="product-meta font-size-12 mb-1">
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">Action</a></span>
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">Comedy</a></span>
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">Mystery</a></span>
                                                    </div>
                                                    <div class="product-title font-weight-bold font-size-1"><a href="../single-episodes/single-episodes-v4.html">The Last Man on the earth</a></div>
                                                </div>
                                            </div>

                                            <div class="col px-2 mb-5 mb-md-0">
                                                <div class="product">
                                                    <div class="product-image mb-2">
                                                        <a href="../single-episodes/single-episodes-v4.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/222x126" alt="Image Description"></a>
                                                    </div>
                                                    <div class="product-meta font-size-12 mb-1">
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">Comedy</a></span>
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">Mystery</a></span>
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">2020</a></span>
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">Action</a></span>
                                                    </div>
                                                    <div class="product-title font-weight-bold font-size-1"><a href="../single-episodes/single-episodes-v4.html">Unbreakable Kimmy Schmidt</a></div>
                                                </div>
                                            </div>

                                            <div class="col px-2 mb-5 mb-md-0 d-md-none d-lg-block">
                                                <div class="product">
                                                    <div class="product-image mb-2">
                                                        <a href="../single-episodes/single-episodes-v4.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/222x126" alt="Image Description"></a>
                                                    </div>
                                                    <div class="product-meta font-size-12 mb-1">
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">Mystery</a></span>
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">2020</a></span>
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">Action</a></span>
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">Comedy</a></span>
                                                    </div>
                                                    <div class="product-title font-weight-bold font-size-1"><a href="../single-episodes/single-episodes-v4.html">House of cards</a></div>
                                                </div>
                                            </div>

                                            <div class="col px-2 mb-5 mb-md-0 d-md-none d-xl-block">
                                                <div class="product">
                                                    <div class="product-image mb-2">
                                                        <a href="../single-episodes/single-episodes-v4.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/222x126" alt="Image Description"></a>
                                                    </div>
                                                    <div class="product-meta font-size-12 mb-1">
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">Action</a></span>
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">Comedy</a></span>
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">2020</a></span>
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">Mystery</a></span>
                                                    </div>
                                                    <div class="product-title font-weight-bold font-size-1"><a href="../single-episodes/single-episodes-v4.html">Chicago Med</a></div>
                                                </div>
                                            </div>

                                            <div class="col px-2 mb-5 mb-md-0 d-md-none d-xl-block">
                                                <div class="product">
                                                    <div class="product-image mb-2">
                                                        <a href="../single-episodes/single-episodes-v4.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/222x126" alt="Image Description"></a>
                                                    </div>
                                                    <div class="product-meta font-size-12 mb-1">
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">Action</a></span>
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">Comedy</a></span>
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">Mystery</a></span>
                                                    </div>
                                                    <div class="product-title font-weight-bold font-size-1"><a href="../single-episodes/single-episodes-v4.html">The Last Man on the earth</a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="pills-three-code-example2" role="tabpanel" aria-labelledby="pills-three-code-example2-tab">
                                <div class="row">
                                    <div class="col-md-5 col-lg-4 mb-3 mb-md-5">
                                        <header class="max-w-370 mt-auto mb-xl-8 title-dash">
                                            <h3 class="display-7 mb-3 font-weight-semi-bold">Popular TV Series Right Now</h3>
                                        </header>
                                    </div>
                                    <div class="col-md-7 col-lg-8 mb-md-5">
                                        <div class="row row-cols-2 row-cols-lg-3 row-cols-xl-4 mx-n2">
                                            <div class="col px-2 mb-5 mb-md-0">
                                                <div class="product">
                                                    <div class="product-image mb-2">
                                                        <a href="../single-episodes/single-episodes-v4.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/222x126" alt="Image Description"></a>
                                                    </div>
                                                    <div class="product-meta font-size-12 mb-1">
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">Action</a></span>
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">Comedy</a></span>
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">2020</a></span>
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">Mystery</a></span>
                                                    </div>
                                                    <div class="product-title font-weight-bold font-size-1"><a href="../single-episodes/single-episodes-v4.html">Chicago Med</a></div>
                                                </div>
                                            </div>

                                            <div class="col px-2 mb-5 mb-md-0">
                                                <div class="product">
                                                    <div class="product-image mb-2">
                                                        <a href="../single-episodes/single-episodes-v4.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/222x126" alt="Image Description"></a>
                                                    </div>
                                                    <div class="product-meta font-size-12 mb-1">
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">Action</a></span>
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">Comedy</a></span>
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">Mystery</a></span>
                                                    </div>
                                                    <div class="product-title font-weight-bold font-size-1"><a href="../single-episodes/single-episodes-v4.html">The Last Man on the earth</a></div>
                                                </div>
                                            </div>

                                            <div class="col px-2 mb-5 mb-md-0 d-md-none d-lg-block">
                                                <div class="product">
                                                    <div class="product-image mb-2">
                                                        <a href="../single-episodes/single-episodes-v4.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/222x126" alt="Image Description"></a>
                                                    </div>
                                                    <div class="product-meta font-size-12 mb-1">
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">Comedy</a></span>
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">Mystery</a></span>
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">2020</a></span>
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">Action</a></span>
                                                    </div>
                                                    <div class="product-title font-weight-bold font-size-1"><a href="../single-episodes/single-episodes-v4.html">Unbreakable Kimmy Schmidt</a></div>
                                                </div>
                                            </div>

                                            <div class="col px-2 mb-5 mb-md-0 d-md-none d-xl-block">
                                                <div class="product">
                                                    <div class="product-image mb-2">
                                                        <a href="../single-episodes/single-episodes-v4.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/222x126" alt="Image Description"></a>
                                                    </div>
                                                    <div class="product-meta font-size-12 mb-1">
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">Mystery</a></span>
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">2020</a></span>
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">Action</a></span>
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">Comedy</a></span>
                                                    </div>
                                                    <div class="product-title font-weight-bold font-size-1"><a href="../single-episodes/single-episodes-v4.html">House of cards</a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-6 mx-n2">
                                            <div class="col px-2 mb-5 mb-md-0">
                                                <div class="product">
                                                    <div class="product-image mb-2">
                                                        <a href="../single-episodes/single-episodes-v4.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/222x126" alt="Image Description"></a>
                                                    </div>
                                                    <div class="product-meta font-size-12 mb-1">
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">Action</a></span>
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">Comedy</a></span>
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">2020</a></span>
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">Mystery</a></span>
                                                    </div>
                                                    <div class="product-title font-weight-bold font-size-1"><a href="../single-episodes/single-episodes-v4.html">Chicago Med</a></div>
                                                </div>
                                            </div>

                                            <div class="col px-2 mb-5 mb-md-0">
                                                <div class="product">
                                                    <div class="product-image mb-2">
                                                        <a href="../single-episodes/single-episodes-v4.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/222x126" alt="Image Description"></a>
                                                    </div>
                                                    <div class="product-meta font-size-12 mb-1">
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">Action</a></span>
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">Comedy</a></span>
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">Mystery</a></span>
                                                    </div>
                                                    <div class="product-title font-weight-bold font-size-1"><a href="../single-episodes/single-episodes-v4.html">The Last Man on the earth</a></div>
                                                </div>
                                            </div>

                                            <div class="col px-2 mb-5 mb-md-0">
                                                <div class="product">
                                                    <div class="product-image mb-2">
                                                        <a href="../single-episodes/single-episodes-v4.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/222x126" alt="Image Description"></a>
                                                    </div>
                                                    <div class="product-meta font-size-12 mb-1">
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">Comedy</a></span>
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">Mystery</a></span>
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">2020</a></span>
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">Action</a></span>
                                                    </div>
                                                    <div class="product-title font-weight-bold font-size-1"><a href="../single-episodes/single-episodes-v4.html">Unbreakable Kimmy Schmidt</a></div>
                                                </div>
                                            </div>

                                            <div class="col px-2 mb-5 mb-md-0 d-md-none d-lg-block">
                                                <div class="product">
                                                    <div class="product-image mb-2">
                                                        <a href="../single-episodes/single-episodes-v4.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/222x126" alt="Image Description"></a>
                                                    </div>
                                                    <div class="product-meta font-size-12 mb-1">
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">Mystery</a></span>
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">2020</a></span>
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">Action</a></span>
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">Comedy</a></span>
                                                    </div>
                                                    <div class="product-title font-weight-bold font-size-1"><a href="../single-episodes/single-episodes-v4.html">House of cards</a></div>
                                                </div>
                                            </div>

                                            <div class="col px-2 mb-5 mb-md-0 d-md-none d-xl-block">
                                                <div class="product">
                                                    <div class="product-image mb-2">
                                                        <a href="../single-episodes/single-episodes-v4.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/222x126" alt="Image Description"></a>
                                                    </div>
                                                    <div class="product-meta font-size-12 mb-1">
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">Action</a></span>
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">Comedy</a></span>
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">2020</a></span>
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">Mystery</a></span>
                                                    </div>
                                                    <div class="product-title font-weight-bold font-size-1"><a href="../single-episodes/single-episodes-v4.html">Chicago Med</a></div>
                                                </div>
                                            </div>

                                            <div class="col px-2 mb-5 mb-md-0 d-md-none d-xl-block">
                                                <div class="product">
                                                    <div class="product-image mb-2">
                                                        <a href="../single-episodes/single-episodes-v4.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/222x126" alt="Image Description"></a>
                                                    </div>
                                                    <div class="product-meta font-size-12 mb-1">
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">Action</a></span>
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">Comedy</a></span>
                                                        <span><a href="../single-episodes/single-episodes-v4.html" class="h-g-primary">Mystery</a></span>
                                                    </div>
                                                    <div class="product-title font-weight-bold font-size-1"><a href="#">The Last Man on the earth</a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Tab Content -->
                    </div>
                </div>
            </div>
        </section>


        <section class="bg-gray-1100 dark space-2">
            <div class="container px-md-4">
                <!-- Nav -->
                <div class="text-center tab-nav__v1">
                    <ul class="nav mb-7" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-one-code-features-tab-1" data-toggle="pill" href="#pills-one-code-features-1" role="tab" aria-controls="pills-one-code-features-1" aria-selected="true">Today</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-two-code-features-tab-2" data-toggle="pill" href="#pills-two-code-features-2" role="tab" aria-controls="pills-two-code-features-2" aria-selected="false">This week</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-three-code-features-tab-3" data-toggle="pill" href="#pills-three-code-features-3" role="tab" aria-controls="pills-three-code-features-3" aria-selected="false">Last 30 days</a>
                        </li>
                    </ul>
                </div>
                <!-- End Nav -->

                <!-- Tab Content -->
                <div class="tab-content slick__tab mb-12 mb-md-6">
                    <div class="tab-pane fade show active" id="pills-one-code-features-1" role="tabpanel" aria-labelledby="pills-one-code-features-tab-1">
                        <div class="row">
                            <div class="col-md-6 col-lg-7 col-xl-9 mb-2 mb-md-0">
                                <div class="js-slick-carousel slick slick-gutters-2"
                                    data-hs-slick-carousel-options='{
                                        "prevArrow": "<span class=\"fas fa-chevron-left dark slick-arrow slick-arrow-v1 slick-arrow-v11 left slick-arrow-right rounded-circle position-absolute bottom-0\"></span>",
                                        "nextArrow": "<span class=\"fas fa-chevron-right dark slick-arrow slick-arrow-v1 slick-arrow-v11 right slick-arrow-right rounded-circle position-absolute\"></span>",
                                        "slidesToShow": 4,
                                        "responsive": [{
                                            "breakpoint": 1199,
                                            "settings": {
                                                "slidesToShow": 2
                                            }
                                        }, {
                                            "breakpoint": 996,
                                            "settings": {
                                                "slidesToShow": 1
                                            }
                                        }]
                                    }'>
                                    <div class="product">
                                        <div class="product-image mb-1">
                                            <a class="d-inline-block position-relative stretched-link" href="../single-episodes/single-episodes-v2.html">
                                                <img class="img-fluid" src="https://placehold.it/225x127" alt="Image Description">
                                            </a>
                                        </div>
                                        <div class="product-title">
                                            <a class="d-inline-block" href="../single-episodes/single-episodes-v2.html">
                                                <span class="text-gray-1300 font-size-12">S01E01</span>
                                                <div class="mb-0 font-weight-bold font-size-1">15 Million Merit</div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product">
                                        <div class="product-image mb-1">
                                            <a class="d-inline-block position-relative stretched-link" href="../single-episodes/single-episodes-v2.html">
                                                <img class="img-fluid" src="https://placehold.it/225x127" alt="Image Description">
                                            </a>
                                        </div>
                                        <div class="product-title">
                                            <a class="d-inline-block" href="../single-episodes/single-episodes-v2.html">
                                                <span class="text-gray-1300 font-size-12">S01E01</span>
                                                <div class="mb-0 font-weight-bold font-size-1">All Backed Up</div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product">
                                        <div class="product-image mb-1">
                                            <a class="d-inline-block position-relative stretched-link" href="../single-episodes/single-episodes-v2.html">
                                                <img class="img-fluid" src="https://placehold.it/225x127" alt="Image Description">
                                            </a>
                                        </div>
                                        <div class="product-title">
                                            <a class="d-inline-block" href="../single-episodes/single-episodes-v2.html">
                                                <span class="text-gray-1300 font-size-12">S01E01</span>
                                                <div class="mb-0 font-weight-bold font-size-1">Climax</div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product">
                                        <div class="product-image mb-1">
                                            <a class="d-inline-block position-relative stretched-link" href="../single-episodes/single-episodes-v2.html">
                                                <img class="img-fluid" src="https://placehold.it/225x127" alt="Image Description">
                                            </a>
                                        </div>
                                        <div class="product-title">
                                            <a class="d-inline-block" href="../single-episodes/single-episodes-v2.html">
                                                <span class="text-gray-1300 font-size-12">S01E01</span>
                                                <div class="mb-0 font-weight-bold font-size-1">Chapter 3</div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product">
                                        <div class="product-image mb-1">
                                            <a class="d-inline-block position-relative stretched-link" href="../single-episodes/single-episodes-v2.html">
                                                <img class="img-fluid" src="https://placehold.it/225x127" alt="Image Description">
                                            </a>
                                        </div>
                                        <div class="product-title">
                                            <a class="d-inline-block" href="../single-episodes/single-episodes-v2.html">
                                                <span class="text-gray-1300 font-size-12">S01E01</span>
                                                <div class="mb-0 font-weight-bold font-size-1">Home</div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product">
                                        <div class="product-image mb-1">
                                            <a class="d-inline-block position-relative stretched-link" href="../single-episodes/single-episodes-v2.html">
                                                <img class="img-fluid" src="https://placehold.it/225x127" alt="Image Description">
                                            </a>
                                        </div>
                                        <div class="product-title">
                                            <a class="d-inline-block" href="../single-episodes/single-episodes-v2.html">
                                                <span class="text-gray-1300 font-size-12">S01E01</span>
                                                <div class="mb-0 font-weight-bold font-size-1">15 Million Merit</div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product">
                                        <div class="product-image mb-1">
                                            <a class="d-inline-block position-relative stretched-link" href="../single-episodes/single-episodes-v2.html">
                                                <img class="img-fluid" src="https://placehold.it/225x127" alt="Image Description">
                                            </a>
                                        </div>
                                        <div class="product-title">
                                            <a class="d-inline-block" href="../single-episodes/single-episodes-v2.html">
                                                <span class="text-gray-1300 font-size-12">S01E01</span>
                                                <div class="mb-0 font-weight-bold font-size-1">15 Million Merit</div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-5 col-xl-3 d-flex">
                                <header class="max-w-370  mb-xl-8 title-dash">
                                    <h5 class="text-white display-7 mb-3 font-weight-semi-bold">Featured TV Episode Premieres</h5>
                                </header>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="pills-two-code-features-2" role="tabpanel" aria-labelledby="pills-two-code-features-tab-2">
                        <div class="row">
                            <div class="col-md-6 col-lg-7 col-xl-9 mb-2 mb-md-0">
                                <div class="js-slick-carousel slick slick-gutters-2"
                                    data-hs-slick-carousel-options='{
                                        "prevArrow": "<span class=\"fas fa-chevron-left dark slick-arrow slick-arrow-v1 slick-arrow-v11 left slick-arrow-right rounded-circle position-absolute bottom-0\"></span>",
                                        "nextArrow": "<span class=\"fas fa-chevron-right dark slick-arrow slick-arrow-v1 slick-arrow-v11 right slick-arrow-right rounded-circle position-absolute\"></span>",
                                        "slidesToShow": 4,
                                        "responsive": [{
                                            "breakpoint": 1199,
                                            "settings": {
                                                "slidesToShow": 2
                                            }
                                        }, {
                                            "breakpoint": 996,
                                            "settings": {
                                                "slidesToShow": 1
                                            }
                                        }]
                                    }'>
                                    <div class="product">
                                        <div class="product-image mb-1">
                                            <a class="d-inline-block position-relative stretched-link" href="../single-episodes/single-episodes-v2.html">
                                                <img class="img-fluid" src="https://placehold.it/225x127" alt="Image Description">
                                            </a>
                                        </div>
                                        <div class="product-title">
                                            <a class="d-inline-block" href="../single-episodes/single-episodes-v2.html">
                                                <span class="text-gray-1300 font-size-12">S01E01</span>
                                                <div class="mb-0 font-weight-bold font-size-1">15 Million Merit</div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product">
                                        <div class="product-image mb-1">
                                            <a class="d-inline-block position-relative stretched-link" href="../single-episodes/single-episodes-v2.html">
                                                <img class="img-fluid" src="https://placehold.it/225x127" alt="Image Description">
                                            </a>
                                        </div>
                                        <div class="product-title">
                                            <a class="d-inline-block" href="../single-episodes/single-episodes-v2.html">
                                                <span class="text-gray-1300 font-size-12">S01E01</span>
                                                <div class="mb-0 font-weight-bold font-size-1">All Backed Up</div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product">
                                        <div class="product-image mb-1">
                                            <a class="d-inline-block position-relative stretched-link" href="../single-episodes/single-episodes-v2.html">
                                                <img class="img-fluid" src="https://placehold.it/225x127" alt="Image Description">
                                            </a>
                                        </div>
                                        <div class="product-title">
                                            <a class="d-inline-block" href="../single-episodes/single-episodes-v2.html">
                                                <span class="text-gray-1300 font-size-12">S01E01</span>
                                                <div class="mb-0 font-weight-bold font-size-1">Climax</div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product">
                                        <div class="product-image mb-1">
                                            <a class="d-inline-block position-relative stretched-link" href="../single-episodes/single-episodes-v2.html">
                                                <img class="img-fluid" src="https://placehold.it/225x127" alt="Image Description">
                                            </a>
                                        </div>
                                        <div class="product-title">
                                            <a class="d-inline-block" href="../single-episodes/single-episodes-v2.html">
                                                <span class="text-gray-1300 font-size-12">S01E01</span>
                                                <div class="mb-0 font-weight-bold font-size-1">Chapter 3</div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product">
                                        <div class="product-image mb-1">
                                            <a class="d-inline-block position-relative stretched-link" href="../single-episodes/single-episodes-v2.html">
                                                <img class="img-fluid" src="https://placehold.it/225x127" alt="Image Description">
                                            </a>
                                        </div>
                                        <div class="product-title">
                                            <a class="d-inline-block" href="../single-episodes/single-episodes-v2.html">
                                                <span class="text-gray-1300 font-size-12">S01E01</span>
                                                <div class="mb-0 font-weight-bold font-size-1">Home</div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product">
                                        <div class="product-image mb-1">
                                            <a class="d-inline-block position-relative stretched-link" href="../single-episodes/single-episodes-v2.html">
                                                <img class="img-fluid" src="https://placehold.it/225x127" alt="Image Description">
                                            </a>
                                        </div>
                                        <div class="product-title">
                                            <a class="d-inline-block" href="../single-episodes/single-episodes-v2.html">
                                                <span class="text-gray-1300 font-size-12">S01E01</span>
                                                <div class="mb-0 font-weight-bold font-size-1">15 Million Merit</div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product">
                                        <div class="product-image mb-1">
                                            <a class="d-inline-block position-relative stretched-link" href="../single-episodes/single-episodes-v2.html">
                                                <img class="img-fluid" src="https://placehold.it/225x127" alt="Image Description">
                                            </a>
                                        </div>
                                        <div class="product-title">
                                            <a class="d-inline-block" href="../single-episodes/single-episodes-v2.html">
                                                <span class="text-gray-1300 font-size-12">S01E01</span>
                                                <div class="mb-0 font-weight-bold font-size-1">15 Million Merit</div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-5 col-xl-3 d-flex">
                                <header class="max-w-370  mb-xl-8 title-dash">
                                    <h3 class="text-white display-7 mb-3 font-weight-semi-bold">Featured TV Episode Premieres</h3>
                                </header>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="pills-three-code-features-3" role="tabpanel" aria-labelledby="pills-three-code-features-tab-3">
                        <div class="row">
                            <div class="col-md-6 col-lg-7 col-xl-9 mb-2 mb-md-0">
                                <div class="js-slick-carousel slick slick-gutters-2"
                                    data-hs-slick-carousel-options='{
                                        "prevArrow": "<span class=\"fas fa-chevron-left dark slick-arrow slick-arrow-v1 slick-arrow-v11 left slick-arrow-right rounded-circle position-absolute bottom-0\"></span>",
                                        "nextArrow": "<span class=\"fas fa-chevron-right dark slick-arrow slick-arrow-v1 slick-arrow-v11 right slick-arrow-right rounded-circle position-absolute\"></span>",
                                        "slidesToShow": 4,
                                        "responsive": [{
                                            "breakpoint": 1199,
                                            "settings": {
                                                "slidesToShow": 2
                                            }
                                        }, {
                                            "breakpoint": 996,
                                            "settings": {
                                                "slidesToShow": 1
                                            }
                                        }]
                                    }'>
                                    <div class="product">
                                        <div class="product-image mb-1">
                                            <a class="d-inline-block position-relative stretched-link" href="../single-episodes/single-episodes-v2.html">
                                                <img class="img-fluid" src="https://placehold.it/225x127" alt="Image Description">
                                            </a>
                                        </div>
                                        <div class="product-title">
                                            <a class="d-inline-block" href="../single-episodes/single-episodes-v2.html">
                                                <span class="text-gray-1300 font-size-12">S01E01</span>
                                                <div class="mb-0 font-weight-bold font-size-1">15 Million Merit</div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product">
                                        <div class="product-image mb-1">
                                            <a class="d-inline-block position-relative stretched-link" href="../single-episodes/single-episodes-v2.html">
                                                <img class="img-fluid" src="https://placehold.it/225x127" alt="Image Description">
                                            </a>
                                        </div>
                                        <div class="product-title">
                                            <a class="d-inline-block" href="../single-episodes/single-episodes-v2.html">
                                                <span class="text-gray-1300 font-size-12">S01E01</span>
                                                <div class="mb-0 font-weight-bold font-size-1">All Backed Up</div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product">
                                        <div class="product-image mb-1">
                                            <a class="d-inline-block position-relative stretched-link" href="../single-episodes/single-episodes-v2.html">
                                                <img class="img-fluid" src="https://placehold.it/225x127" alt="Image Description">
                                            </a>
                                        </div>
                                        <div class="product-title">
                                            <a class="d-inline-block" href="../single-episodes/single-episodes-v2.html">
                                                <span class="text-gray-1300 font-size-12">S01E01</span>
                                                <div class="mb-0 font-weight-bold font-size-1">Climax</div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product">
                                        <div class="product-image mb-1">
                                            <a class="d-inline-block position-relative stretched-link" href="../single-episodes/single-episodes-v2.html">
                                                <img class="img-fluid" src="https://placehold.it/225x127" alt="Image Description">
                                            </a>
                                        </div>
                                        <div class="product-title">
                                            <a class="d-inline-block" href="../single-episodes/single-episodes-v2.html">
                                                <span class="text-gray-1300 font-size-12">S01E01</span>
                                                <div class="mb-0 font-weight-bold font-size-1">Chapter 3</div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product">
                                        <div class="product-image mb-1">
                                            <a class="d-inline-block position-relative stretched-link" href="../single-episodes/single-episodes-v2.html">
                                                <img class="img-fluid" src="https://placehold.it/225x127" alt="Image Description">
                                            </a>
                                        </div>
                                        <div class="product-title">
                                            <a class="d-inline-block" href="../single-episodes/single-episodes-v2.html">
                                                <span class="text-gray-1300 font-size-12">S01E01</span>
                                                <div class="mb-0 font-weight-bold font-size-1">Home</div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product">
                                        <div class="product-image mb-1">
                                            <a class="d-inline-block position-relative stretched-link" href="../single-episodes/single-episodes-v2.html">
                                                <img class="img-fluid" src="https://placehold.it/225x127" alt="Image Description">
                                            </a>
                                        </div>
                                        <div class="product-title">
                                            <a class="d-inline-block" href="../single-episodes/single-episodes-v2.html">
                                                <span class="text-gray-1300 font-size-12">S01E01</span>
                                                <div class="mb-0 font-weight-bold font-size-1">15 Million Merit</div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product">
                                        <div class="product-image mb-1">
                                            <a class="d-inline-block position-relative stretched-link" href="../single-episodes/single-episodes-v2.html">
                                                <img class="img-fluid" src="https://placehold.it/225x127" alt="Image Description">
                                            </a>
                                        </div>
                                        <div class="product-title">
                                            <a class="d-inline-block" href="../single-episodes/single-episodes-v2.html">
                                                <span class="text-gray-1300 font-size-12">S01E01</span>
                                                <div class="mb-0 font-weight-bold font-size-1">15 Million Merit</div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-5 col-xl-3 d-flex">
                                <header class="max-w-370  mb-xl-8 title-dash">
                                    <h3 class="text-white display-7 mb-3 font-weight-semi-bold">Featured TV Episode Premieres</h3>
                                </header>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Tab Content -->

                <div class="row">
                    <div class="col-md-5">
                        <div class="bg-gray-3100 p-4">
                            <!-- Nav -->
                            <div class="border-bottom d-xl-flex pb-2d mb-2 align-items-center border-gray-3200">
                                <h3 class="font-size-22 text-white mb-xl-0 font-weight-medium">
                                    Top 9 this Week
                                </h3>
                                <ul class="nav ml-md-auto tab-nav__v9" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="pills-one-example2-tab" data-toggle="pill" href="#pills-one-example2" role="tab" aria-controls="pills-one-example2" aria-selected="true">Movies</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-two-example2-tab" data-toggle="pill" href="#pills-two-example2" role="tab" aria-controls="pills-two-example2" aria-selected="false">TV Series</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- End Nav -->

                            <!-- Tab Content -->
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="pills-one-example2" role="tabpanel" aria-labelledby="pills-one-example2-tab">
                                    <ol class="list-counter v1 list-unstyled">
                                        <li class="d-flex border-gray-3200 border-bottom py-2d align-items-center">
                                            <div class="">
                                                <span class="font-size-12 text-gray-1300 mb-1 d-inline-block text-lh-1">1997</span>
                                                <h6 class="mb-0 font-size-14"><a href="../single-movies/single-movies-v3.html" class="text-white">Delta Bravo</a></h6>
                                                <a href="../single-movies/single-movies-v3.html" class="font-size-12">Action</a>
                                            </div>
                                        </li>
                                        <li class="d-flex border-gray-3200 border-bottom py-2d align-items-center">
                                            <div class="">
                                                <span class="font-size-12 text-gray-1300 mb-1 d-inline-block text-lh-1">2020</span>
                                                <h6 class="mb-0 font-size-14"><a href="../single-movies/single-movies-v3.html" class="text-white">Mad</a></h6>
                                                <a href="../single-movies/single-movies-v3.html" class="font-size-12">Drama</a>
                                            </div>
                                        </li>
                                        <li class="d-flex border-gray-3200 border-bottom py-2d align-items-center">
                                            <div class="">
                                                <span class="font-size-12 text-gray-1300 mb-1 d-inline-block text-lh-1">1999</span>
                                                <h6 class="mb-0 font-size-14"><a href="../single-movies/single-movies-v3.html" class="text-white">Oh Lucy</a></h6>
                                                <a href="../single-movies/single-movies-v3.html" class="font-size-12">Comedy, </a><a href="../single-movies/single-movies-v3.html" class="font-size-12">Adventure</a>
                                            </div>
                                        </li>
                                        <li class="d-flex border-gray-3200 border-bottom py-2d align-items-center">
                                            <div class="">
                                                <span class="font-size-12 text-gray-1300 mb-1 d-inline-block text-lh-1">1998</span>
                                                <h6 class="mb-0 font-size-14"><a href="../single-movies/single-movies-v3.html" class="text-white">Black Mirror</a></h6>
                                                <a href="../single-movies/single-movies-v3.html" class="font-size-12">Comedy, </a><a href="../single-movies/single-movies-v3.html" class="font-size-12">Mystery</a>
                                            </div>
                                        </li>
                                        <li class="d-flex border-gray-3200 border-bottom py-2d align-items-center">
                                            <div class="">
                                                <span class="font-size-12 text-gray-1300 mb-1 d-inline-block text-lh-1">1999</span>
                                                <h6 class="mb-0 font-size-14"><a href="../single-movies/single-movies-v3.html" class="text-white">The Convenient Groom</a></h6>
                                                <a href="../single-movies/single-movies-v3.html" class="font-size-12">Comedy, </a><a href="../single-movies/single-movies-v3.html" class="font-size-12">Adventure</a>
                                            </div>
                                        </li>
                                        <li class="d-flex border-gray-3200 border-bottom py-2d align-items-center">
                                            <div class="">
                                                <span class="font-size-12 text-gray-1300 mb-1 d-inline-block text-lh-1">2004</span>
                                                <h6 class="mb-0 font-size-14"><a href="../single-movies/single-movies-v3.html" class="text-white">Paradigm Lost</a></h6>
                                                <a href="../single-movies/single-movies-v3.html" class="font-size-12">Documentary, </a><a href="../single-movies/single-movies-v3.html" class="font-size-12">Action</a>
                                            </div>
                                        </li>
                                        <li class="d-flex border-gray-3200 border-bottom py-2d align-items-center">
                                            <div class="">
                                                <span class="font-size-12 text-gray-1300 mb-1 d-inline-block text-lh-1">2008</span>
                                                <h6 class="mb-0 font-size-14"><a href="../single-movies/single-movies-v3.html" class="text-white">Pacific Rim: Uprising</a></h6>
                                                <a href="../single-movies/single-movies-v3.html" class="font-size-12">Sci-Fi, </a><a href="../single-movies/single-movies-v3.html" class="font-size-12">Action</a>
                                            </div>
                                        </li>
                                        <li class="d-flex border-gray-3200 border-bottom py-2d align-items-center">
                                            <div class="">
                                                <span class="font-size-12 text-gray-1300 mb-1 d-inline-block text-lh-1">1999</span>
                                                <h6 class="mb-0 font-size-14"><a href="../single-movies/single-movies-v3.html" class="text-white">Dirt</a></h6>
                                                <a href="../single-movies/single-movies-v3.html" class="font-size-12">Comedy, </a><a href="../single-movies/single-movies-v3.html" class="font-size-12">Adventure</a>
                                            </div>
                                        </li>
                                        <li class="d-flex py-2d align-items-center">
                                            <div class="">
                                                <span class="font-size-12 text-gray-1300 mb-1 d-inline-block text-lh-1">2004</span>
                                                <h6 class="mb-0 font-size-14"><a href="../single-movies/single-movies-v3.html" class="text-white">Euphoria</a></h6>
                                                <a href="../single-movies/single-movies-v3.html" class="font-size-12">Documentary, </a><a href="../single-movies/single-movies-v3.html" class="font-size-12">Action</a>
                                            </div>
                                        </li>
                                    </ol>
                                </div>

                                <div class="tab-pane fade" id="pills-two-example2" role="tabpanel" aria-labelledby="pills-two-example2-tab">
                                    <ol class="list-counter v1 list-unstyled">
                                        <li class="d-flex border-gray-3200 border-bottom py-2d align-items-center">
                                            <div class="">
                                                <span class="font-size-12 text-gray-1300 mb-1 d-inline-block text-lh-1">2008</span>
                                                <h6 class="mb-0 font-size-14"><a href="../single-episodes/single-episodes-v4.html" class="text-white">Pacific Rim: Uprising</a></h6>
                                                <a href="../single-episodes/single-episodes-v4.html" class="font-size-12">Sci-Fi, </a><a href="../single-episodes/single-episodes-v4.html" class="font-size-12">Action</a>
                                            </div>
                                        </li>
                                        <li class="d-flex border-gray-3200 border-bottom py-2d align-items-center">
                                            <div class="">
                                                <span class="font-size-12 text-gray-1300 mb-1 d-inline-block text-lh-1">1999</span>
                                                <h6 class="mb-0 font-size-14"><a href="../single-episodes/single-episodes-v4.html" class="text-white">Dirt</a></h6>
                                                <a href="../single-episodes/single-episodes-v4.html" class="font-size-12">Comedy, </a><a href="../single-episodes/single-episodes-v4.html" class="font-size-12">Adventure</a>
                                            </div>
                                        </li>
                                        <li class="d-flex border-gray-3200 border-bottom py-2d align-items-center">
                                            <div class="">
                                                <span class="font-size-12 text-gray-1300 mb-1 d-inline-block text-lh-1">2004</span>
                                                <h6 class="mb-0 font-size-14"><a href="../single-episodes/single-episodes-v4.html" class="text-white">Euphoria</a></h6>
                                                <a href="../single-episodes/single-episodes-v4.html" class="font-size-12">Documentary, </a><a href="../single-episodes/single-episodes-v4.html" class="font-size-12">Action</a>
                                            </div>
                                        </li>
                                        <li class="d-flex border-gray-3200 border-bottom py-2d align-items-center">
                                            <div class="">
                                                <span class="font-size-12 text-gray-1300 mb-1 d-inline-block text-lh-1">1997</span>
                                                <h6 class="mb-0 font-size-14"><a href="../single-episodes/single-episodes-v4.html" class="text-white">Delta Bravo</a></h6>
                                                <a href="../single-episodes/single-episodes-v4.html" class="font-size-12">Action</a>
                                            </div>
                                        </li>
                                        <li class="d-flex border-gray-3200 border-bottom py-2d align-items-center">
                                            <div class="">
                                                <span class="font-size-12 text-gray-1300 mb-1 d-inline-block text-lh-1">2020</span>
                                                <h6 class="mb-0 font-size-14"><a href="../single-episodes/single-episodes-v4.html" class="text-white">Mad</a></h6>
                                                <a href="../single-episodes/single-episodes-v4.html" class="font-size-12">Drama</a>
                                            </div>
                                        </li>
                                        <li class="d-flex border-gray-3200 border-bottom py-2d align-items-center">
                                            <div class="">
                                                <span class="font-size-12 text-gray-1300 mb-1 d-inline-block text-lh-1">1999</span>
                                                <h6 class="mb-0 font-size-14"><a href="../single-episodes/single-episodes-v4.html" class="text-white">Oh Lucy</a></h6>
                                                <a href="../single-episodes/single-episodes-v4.html" class="font-size-12">Comedy, </a><a href="../single-episodes/single-episodes-v4.html" class="font-size-12">Adventure</a>
                                            </div>
                                        </li>
                                        <li class="d-flex border-gray-3200 border-bottom py-2d align-items-center">
                                            <div class="">
                                                <span class="font-size-12 text-gray-1300 mb-1 d-inline-block text-lh-1">1998</span>
                                                <h6 class="mb-0 font-size-14"><a href="../single-episodes/single-episodes-v4.html" class="text-white">Black Mirror</a></h6>
                                                <a href="../single-episodes/single-episodes-v4.html" class="font-size-12">Comedy, </a><a href="../single-episodes/single-episodes-v4.html" class="font-size-12">Mystery</a>
                                            </div>
                                        </li>
                                        <li class="d-flex border-gray-3200 border-bottom py-2d align-items-center">
                                            <div class="">
                                                <span class="font-size-12 text-gray-1300 mb-1 d-inline-block text-lh-1">1999</span>
                                                <h6 class="mb-0 font-size-14"><a href="../single-episodes/single-episodes-v4.html" class="text-white">The Convenient Groom</a></h6>
                                                <a href="../single-episodes/single-episodes-v4.html" class="font-size-12">Comedy, </a><a href="../single-episodes/single-episodes-v4.html" class="font-size-12">Adventure</a>
                                            </div>
                                        </li>
                                        <li class="d-flex py-2d align-items-center">
                                            <div class="">
                                                <span class="font-size-12 text-gray-1300 mb-1 d-inline-block text-lh-1">2004</span>
                                                <h6 class="mb-0 font-size-14"><a href="../single-episodes/single-episodes-v4.html" class="text-white">Paradigm Lost</a></h6>
                                                <a href="../single-episodes/single-episodes-v4.html" class="font-size-12">Documentary, </a><a href="../single-episodes/single-episodes-v4.html" class="font-size-12">Action</a>
                                            </div>
                                        </li>

                                    </ol>
                                </div>
                            </div>
                            <!-- End Tab Content -->

                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="py-4 p-md-4 ml-wd-3">
                            <!-- Nav -->
                            <div class="border-bottom d-xl-flex pb-2d mb-3d align-items-center border-gray-3200">
                                <h3 class="font-size-22 text-white mb-xl-0 font-weight-medium">
                                    Newest Movies
                                </h3>
                                <ul class="nav ml-md-auto tab-nav__v9" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="pill-one-code-features-example2-tab" data-toggle="pill" href="#pill-one-code-features-example2" role="tab" aria-controls="pill-one-code-features-example2" aria-selected="true">Today</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pill-two-code-features-example2-tab" data-toggle="pill" href="#pill-two-code-features-example2" role="tab" aria-controls="pill-two-code-features-example2" aria-selected="false">This week</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pill-three-code-features-example2-tab" data-toggle="pill" href="#pill-three-code-features-example2" role="tab" aria-controls="pill-three-code-features-example2" aria-selected="false">Last 30 days</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- End Nav -->

                            <!-- Tab Content -->
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="pill-one-code-features-example2" role="tabpanel" aria-labelledby="pill-one-code-features-example2-tab">
                                    <div class="product">
                                        <div class="row">
                                            <div class="col-auto">
                                                <div class="product-image mb-2 mb-md-0 max-w-23rem">
                                                    <a href="../single-movies/single-movies-v2.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/300x450" alt="Image Description"></a>
                                                </div>
                                            </div>
                                            <div class="col d-flex">
                                                <div class="my-lg-auto ml-lg-3 mt-3">
                                                    <div class="product-meta font-size-12 mb-1">
                                                        <span><a href="../single-movies/single-movies-v2.html" class="h-g-primary">2020</a></span>
                                                    </div>
                                                    <div class="product-title font-weight-bold font-size-19 mb-2"><a href="../single-movies/single-movies-v2.html">The Last Witness</a></div>
                                                    <p class="text-gray-1800 font-size-14">In 1892, a legendary Army captain reluctantly agrees to escort a Cheyenne chief and his family through dangerous territory.</p>
                                                    <div class="d-md-flex font-size-12">
                                                        <a href="../single-movies/single-movies-v2.html" class="btn btn-shugaban px-4 py-2d line-height-md font-size-12 mb-3 mb-md-0" tabindex="0">WATCH NOW</a>
                                                        <a href="../single-movies/single-movies-v2.html" class="btn btn-outline-shugaban ml-md-2 px-4 py-2d line-height-md font-size-12 border-0" tabindex="0">+ PLAYLIST</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="w-100 mb-4"></div>
                                            <div class="col">
                                                <ul class="column-count-2 v1 pl-0">
                                                    <li>
                                                        <div class="row d-block d-lg-flex no-gutters product border-bottom mr-lg-6 pb-2d border-gray-3200 mb-2d">
                                                            <div class="col-auto">
                                                                <div class="product-image mb-2 mb-md-0 max-w-9rem-lg">
                                                                    <a href="../single-movies/single-movies-v2.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                                                </div>
                                                            </div>
                                                            <div class="col d-flex">
                                                                <div class="my-auto pl-lg-3d">
                                                                    <span><a href="../single-movies/single-movies-v2.html" class="h-g-primary font-size-12">2017</a></span>
                                                                    <div class="product-title font-weight-bold font-secondary font-size-1 mb-2d"><a href="../single-movies/single-movies-v2.html">Delta Bravo</a></div>
                                                                    <div class="product-meta font-size-12 mb-1">
                                                                        <span><a href="../single-movies/single-movies-v2.html" class="">Action</a></span>
                                                                        <span><a href="../single-movies/single-movies-v2.html" class="">Comedy</a></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="row d-block d-lg-flex no-gutters product border-bottom mr-lg-6 pb-2d border-gray-3200 mb-2d">
                                                            <div class="col-auto">
                                                                <div class="product-image mb-2 mb-md-0 max-w-9rem-lg">
                                                                    <a href="../single-movies/single-movies-v2.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                                                </div>
                                                            </div>
                                                            <div class="col d-flex">
                                                                <div class="my-auto pl-lg-3d">
                                                                    <span><a href="../single-movies/single-movies-v2.html" class="h-g-primary font-size-12">1998</a></span>
                                                                    <div class="product-title font-weight-bold font-secondary font-size-1 mb-2d"><a href="../single-movies/single-movies-v2.html">Mad</a></div>
                                                                    <div class="product-meta font-size-12 mb-1">
                                                                        <span><a href="../single-movies/single-movies-v2.html" class="">Action</a></span>
                                                                        <span><a href="../single-movies/single-movies-v2.html" class="">Comedy</a></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="row d-block d-lg-flex no-gutters product border-bottom mr-lg-6 pb-2d border-gray-3200 mb-2d">
                                                            <div class="col-auto">
                                                                <div class="product-image mb-2 mb-md-0 max-w-9rem-lg">
                                                                    <a href="../single-movies/single-movies-v2.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                                                </div>
                                                            </div>
                                                            <div class="col d-flex">
                                                                <div class="my-auto pl-lg-3d">
                                                                    <span><a href="../single-movies/single-movies-v2.html" class="h-g-primary font-size-12">1998</a></span>
                                                                    <div class="product-title font-weight-bold font-secondary font-size-1 mb-2d"><a href="../single-movies/single-movies-v2.html">Mad</a></div>
                                                                    <div class="product-meta font-size-12 mb-1">
                                                                        <span><a href="../single-movies/single-movies-v2.html" class="">Action</a></span>
                                                                        <span><a href="../single-movies/single-movies-v2.html" class="">Comedy</a></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="row d-block d-lg-flex no-gutters product border-bottom mr-lg-6 pb-2d border-gray-3200 mb-2d">
                                                            <div class="col-auto">
                                                                <div class="product-image mb-2 mb-md-0 max-w-9rem-lg">
                                                                    <a href="../single-movies/single-movies-v2.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                                                </div>
                                                            </div>
                                                            <div class="col d-flex">
                                                                <div class="my-auto pl-lg-3d">
                                                                    <span><a href="../single-movies/single-movies-v2.html" class="h-g-primary font-size-12">1998</a></span>
                                                                    <div class="product-title font-weight-bold font-secondary font-size-1 mb-2d"><a href="../single-movies/single-movies-v2.html">Mad</a></div>
                                                                    <div class="product-meta font-size-12 mb-1">
                                                                        <span><a href="../single-movies/single-movies-v2.html" class="">Action</a></span>
                                                                        <span><a href="../single-movies/single-movies-v2.html" class="">Comedy</a></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="row d-block d-lg-flex no-gutters product border-bottom mr-lg-6 pb-2d border-gray-3200 mb-2d">
                                                            <div class="col-auto">
                                                                <div class="product-image mb-2 mb-md-0 max-w-9rem-lg">
                                                                    <a href="../single-movies/single-movies-v2.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                                                </div>
                                                            </div>
                                                            <div class="col d-flex">
                                                                <div class="my-auto pl-lg-3d">
                                                                    <span><a href="../single-movies/single-movies-v2.html" class="h-g-primary font-size-12">1998</a></span>
                                                                    <div class="product-title font-weight-bold font-secondary font-size-1 mb-2d"><a href="../single-movies/single-movies-v2.html">Mad</a></div>
                                                                    <div class="product-meta font-size-12 mb-1">
                                                                        <span><a href="../single-movies/single-movies-v2.html" class="">Action</a></span>
                                                                        <span><a href="../single-movies/single-movies-v2.html" class="">Comedy</a></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="row d-block d-lg-flex no-gutters product border-bottom mr-lg-6 pb-2d border-gray-3200 mb-2d">
                                                            <div class="col-auto">
                                                                <div class="product-image mb-2 mb-md-0 max-w-9rem-lg">
                                                                    <a href="../single-movies/single-movies-v2.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                                                </div>
                                                            </div>
                                                            <div class="col d-flex">
                                                                <div class="my-auto pl-lg-3d">
                                                                    <span><a href="../single-movies/single-movies-v2.html" class="h-g-primary font-size-12">1998</a></span>
                                                                    <div class="product-title font-weight-bold font-secondary font-size-1 mb-2d"><a href="../single-movies/single-movies-v2.html">Mad</a></div>
                                                                    <div class="product-meta font-size-12 mb-1">
                                                                        <span><a href="../single-movies/single-movies-v2.html" class="">Action</a></span>
                                                                        <span><a href="../single-movies/single-movies-v2.html" class="">Comedy</a></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="row d-block d-lg-flex no-gutters product border-bottom mr-lg-6 pb-2d border-gray-3200 mb-2d">
                                                            <div class="col-auto">
                                                                <div class="product-image mb-2 mb-md-0 max-w-9rem-lg">
                                                                    <a href="../single-movies/single-movies-v2.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                                                </div>
                                                            </div>
                                                            <div class="col d-flex">
                                                                <div class="my-auto pl-lg-3d">
                                                                    <span><a href="../single-movies/single-movies-v2.html" class="h-g-primary font-size-12">1998</a></span>
                                                                    <div class="product-title font-weight-bold font-secondary font-size-1 mb-2d"><a href="../single-movies/single-movies-v2.html">Mad</a></div>
                                                                    <div class="product-meta font-size-12 mb-1">
                                                                        <span><a href="../single-movies/single-movies-v2.html" class="">Action</a></span>
                                                                        <span><a href="../single-movies/single-movies-v2.html" class="">Comedy</a></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="row d-block d-lg-flex no-gutters product border-bottom mr-lg-6 pb-2d border-gray-3200 mb-2d">
                                                            <div class="col-auto">
                                                                <div class="product-image mb-2 mb-md-0 max-w-9rem-lg">
                                                                    <a href="../single-movies/single-movies-v2.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                                                </div>
                                                            </div>
                                                            <div class="col d-flex">
                                                                <div class="my-auto pl-lg-3d">
                                                                    <span><a href="../single-movies/single-movies-v2.html" class="h-g-primary font-size-12">1998</a></span>
                                                                    <div class="product-title font-weight-bold font-secondary font-size-1 mb-2d"><a href="../single-movies/single-movies-v2.html">Mad</a></div>
                                                                    <div class="product-meta font-size-12 mb-1">
                                                                        <span><a href="../single-movies/single-movies-v2.html" class="">Action</a></span>
                                                                        <span><a href="../single-movies/single-movies-v2.html" class="">Comedy</a></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="pill-two-code-features-example2" role="tabpanel" aria-labelledby="pill-two-code-features-example2-tab">
                                    <div class="product">
                                        <div class="row">
                                            <div class="col-auto">
                                                <div class="product-image mb-2 mb-md-0 max-w-23rem">
                                                    <a href="../single-movies/single-movies-v2.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/300x450" alt="Image Description"></a>
                                                </div>
                                            </div>
                                            <div class="col d-flex">
                                                <div class="my-lg-auto ml-lg-3 mt-3">
                                                    <div class="product-meta font-size-12 mb-1">
                                                        <span><a href="../single-movies/single-movies-v2.html" class="h-g-primary">2020</a></span>
                                                    </div>
                                                    <div class="product-title font-weight-bold font-size-19 mb-2"><a href="../single-movies/single-movies-v2.html">The Last Witness</a></div>
                                                    <p class="text-gray-1800 font-size-14">In 1892, a legendary Army captain reluctantly agrees to escort a Cheyenne chief and his family through dangerous territory.</p>
                                                    <div class="d-md-flex font-size-12">
                                                        <a href="../single-movies/single-movies-v2.html" class="btn btn-shugaban px-4 py-2d line-height-md font-size-12 mb-3 mb-md-0" tabindex="0">WATCH NOW</a>
                                                        <a href="../single-movies/single-movies-v2.html" class="btn btn-outline-shugaban ml-md-2 px-4 py-2d line-height-md font-size-12 border-0" tabindex="0">+ PLAYLIST</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="w-100 mb-4"></div>
                                            <div class="col">
                                                <ul class="column-count-2 v1 pl-0">
                                                    <li>
                                                        <div class="row d-block d-lg-flex no-gutters product border-bottom mr-lg-6 pb-2d border-gray-3200 mb-2d">
                                                            <div class="col-auto">
                                                                <div class="product-image mb-2 mb-md-0 max-w-9rem-lg">
                                                                    <a href="../single-movies/single-movies-v2.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                                                </div>
                                                            </div>
                                                            <div class="col d-flex">
                                                                <div class="my-auto pl-lg-3d">
                                                                    <span><a href="../single-movies/single-movies-v2.html" class="h-g-primary font-size-12">1998</a></span>
                                                                    <div class="product-title font-weight-bold font-secondary font-size-1 mb-2d"><a href="../single-movies/single-movies-v2.html">Mad</a></div>
                                                                    <div class="product-meta font-size-12 mb-1">
                                                                        <span><a href="../single-movies/single-movies-v2.html" class="">Action</a></span>
                                                                        <span><a href="../single-movies/single-movies-v2.html" class="">Comedy</a></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="row d-block d-lg-flex no-gutters product border-bottom mr-lg-6 pb-2d border-gray-3200 mb-2d">
                                                            <div class="col-auto">
                                                                <div class="product-image mb-2 mb-md-0 max-w-9rem-lg">
                                                                    <a href="../single-movies/single-movies-v2.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                                                </div>
                                                            </div>
                                                            <div class="col d-flex">
                                                                <div class="my-auto pl-lg-3d">
                                                                    <span><a href="../single-movies/single-movies-v2.html" class="h-g-primary font-size-12">1998</a></span>
                                                                    <div class="product-title font-weight-bold font-secondary font-size-1 mb-2d"><a href="../single-movies/single-movies-v2.html">Mad</a></div>
                                                                    <div class="product-meta font-size-12 mb-1">
                                                                        <span><a href="../single-movies/single-movies-v2.html" class="">Action</a></span>
                                                                        <span><a href="../single-movies/single-movies-v2.html" class="">Comedy</a></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="row d-block d-lg-flex no-gutters product border-bottom mr-lg-6 pb-2d border-gray-3200 mb-2d">
                                                            <div class="col-auto">
                                                                <div class="product-image mb-2 mb-md-0 max-w-9rem-lg">
                                                                    <a href="../single-movies/single-movies-v2.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                                                </div>
                                                            </div>
                                                            <div class="col d-flex">
                                                                <div class="my-auto pl-lg-3d">
                                                                    <span><a href="../single-movies/single-movies-v2.html" class="h-g-primary font-size-12">1998</a></span>
                                                                    <div class="product-title font-weight-bold font-secondary font-size-1 mb-2d"><a href="../single-movies/single-movies-v2.html">Mad</a></div>
                                                                    <div class="product-meta font-size-12 mb-1">
                                                                        <span><a href="../single-movies/single-movies-v2.html" class="">Action</a></span>
                                                                        <span><a href="../single-movies/single-movies-v2.html" class="">Comedy</a></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="row d-block d-lg-flex no-gutters product border-bottom mr-lg-6 pb-2d border-gray-3200 mb-2d">
                                                            <div class="col-auto">
                                                                <div class="product-image mb-2 mb-md-0 max-w-9rem-lg">
                                                                    <a href="../single-movies/single-movies-v2.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                                                </div>
                                                            </div>
                                                            <div class="col d-flex">
                                                                <div class="my-auto pl-lg-3d">
                                                                    <span><a href="../single-movies/single-movies-v2.html" class="h-g-primary font-size-12">2017</a></span>
                                                                    <div class="product-title font-weight-bold font-secondary font-size-1 mb-2d"><a href="../single-movies/single-movies-v2.html">Delta Bravo</a></div>
                                                                    <div class="product-meta font-size-12 mb-1">
                                                                        <span><a href="../single-movies/single-movies-v2.html" class="">Action</a></span>
                                                                        <span><a href="../single-movies/single-movies-v2.html" class="">Comedy</a></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="row d-block d-lg-flex no-gutters product border-bottom mr-lg-6 pb-2d border-gray-3200 mb-2d">
                                                            <div class="col-auto">
                                                                <div class="product-image mb-2 mb-md-0 max-w-9rem-lg">
                                                                    <a href="../single-movies/single-movies-v2.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                                                </div>
                                                            </div>
                                                            <div class="col d-flex">
                                                                <div class="my-auto pl-lg-3d">
                                                                    <span><a href="../single-movies/single-movies-v2.html" class="h-g-primary font-size-12">1998</a></span>
                                                                    <div class="product-title font-weight-bold font-secondary font-size-1 mb-2d"><a href="../single-movies/single-movies-v2.html">Mad</a></div>
                                                                    <div class="product-meta font-size-12 mb-1">
                                                                        <span><a href="../single-movies/single-movies-v2.html" class="">Action</a></span>
                                                                        <span><a href="../single-movies/single-movies-v2.html" class="">Comedy</a></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="row d-block d-lg-flex no-gutters product border-bottom mr-lg-6 pb-2d border-gray-3200 mb-2d">
                                                            <div class="col-auto">
                                                                <div class="product-image mb-2 mb-md-0 max-w-9rem-lg">
                                                                    <a href="../single-movies/single-movies-v2.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                                                </div>
                                                            </div>
                                                            <div class="col d-flex">
                                                                <div class="my-auto pl-lg-3d">
                                                                    <span><a href="../single-movies/single-movies-v2.html" class="h-g-primary font-size-12">1998</a></span>
                                                                    <div class="product-title font-weight-bold font-secondary font-size-1 mb-2d"><a href="../single-movies/single-movies-v2.html">Mad</a></div>
                                                                    <div class="product-meta font-size-12 mb-1">
                                                                        <span><a href="../single-movies/single-movies-v2.html" class="">Action</a></span>
                                                                        <span><a href="../single-movies/single-movies-v2.html" class="">Comedy</a></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="row d-block d-lg-flex no-gutters product border-bottom mr-lg-6 pb-2d border-gray-3200 mb-2d">
                                                            <div class="col-auto">
                                                                <div class="product-image mb-2 mb-md-0 max-w-9rem-lg">
                                                                    <a href="../single-movies/single-movies-v2.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                                                </div>
                                                            </div>
                                                            <div class="col d-flex">
                                                                <div class="my-auto pl-lg-3d">
                                                                    <span><a href="../single-movies/single-movies-v2.html" class="h-g-primary font-size-12">1998</a></span>
                                                                    <div class="product-title font-weight-bold font-secondary font-size-1 mb-2d"><a href="../single-movies/single-movies-v2.html">Mad</a></div>
                                                                    <div class="product-meta font-size-12 mb-1">
                                                                        <span><a href="../single-movies/single-movies-v2.html" class="">Action</a></span>
                                                                        <span><a href="../single-movies/single-movies-v2.html" class="">Comedy</a></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="row d-block d-lg-flex no-gutters product border-bottom mr-lg-6 pb-2d border-gray-3200 mb-2d">
                                                            <div class="col-auto">
                                                                <div class="product-image mb-2 mb-md-0 max-w-9rem-lg">
                                                                    <a href="../single-movies/single-movies-v2.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                                                </div>
                                                            </div>
                                                            <div class="col d-flex">
                                                                <div class="my-auto pl-lg-3d">
                                                                    <span><a href="../single-movies/single-movies-v2.html" class="h-g-primary font-size-12">1998</a></span>
                                                                    <div class="product-title font-weight-bold font-secondary font-size-1 mb-2d"><a href="../single-movies/single-movies-v2.html">Mad</a></div>
                                                                    <div class="product-meta font-size-12 mb-1">
                                                                        <span><a href="../single-movies/single-movies-v2.html" class="">Action</a></span>
                                                                        <span><a href="../single-movies/single-movies-v2.html" class="">Comedy</a></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="pill-three-code-features-example2" role="tabpanel" aria-labelledby="pill-three-code-features-example2-tab">
                                    <div class="product">
                                        <div class="row">
                                            <div class="col-auto">
                                                <div class="product-image mb-2 mb-md-0 max-w-23rem">
                                                    <a href="../single-movies/single-movies-v2.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/300x450" alt="Image Description"></a>
                                                </div>
                                            </div>
                                            <div class="col d-flex">
                                                <div class="my-lg-auto ml-lg-3 mt-3">
                                                    <div class="product-meta font-size-12 mb-1">
                                                        <span><a href="../single-movies/single-movies-v2.html" class="h-g-primary">2020</a></span>
                                                    </div>
                                                    <div class="product-title font-weight-bold font-size-19 mb-2"><a href="../single-movies/single-movies-v2.html">The Last Witness</a></div>
                                                    <p class="text-gray-1800 font-size-14">In 1892, a legendary Army captain reluctantly agrees to escort a Cheyenne chief and his family through dangerous territory.</p>
                                                    <div class="d-md-flex font-size-12">
                                                        <a href="../single-movies/single-movies-v2.html" class="btn btn-shugaban px-4 py-2d line-height-md font-size-12 mb-3 mb-md-0" tabindex="0">WATCH NOW</a>
                                                        <a href="../single-movies/single-movies-v2.html" class="btn btn-outline-shugaban ml-md-2 px-4 py-2d line-height-md font-size-12 border-0" tabindex="0">+ PLAYLIST</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="w-100 mb-4"></div>
                                            <div class="col">
                                                <ul class="column-count-2 v1 pl-0">
                                                    <li>
                                                        <div class="row d-block d-lg-flex no-gutters product border-bottom mr-lg-6 pb-2d border-gray-3200 mb-2d">
                                                            <div class="col-auto">
                                                                <div class="product-image mb-2 mb-md-0 max-w-9rem-lg">
                                                                    <a href="../single-movies/single-movies-v2.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                                                </div>
                                                            </div>
                                                            <div class="col d-flex">
                                                                <div class="my-auto pl-lg-3d">
                                                                    <span><a href="../single-movies/single-movies-v2.html" class="h-g-primary font-size-12">2017</a></span>
                                                                    <div class="product-title font-weight-bold font-secondary font-size-1 mb-2d"><a href="../single-movies/single-movies-v2.html">Delta Bravo</a></div>
                                                                    <div class="product-meta font-size-12 mb-1">
                                                                        <span><a href="../single-movies/single-movies-v2.html" class="">Action</a></span>
                                                                        <span><a href="../single-movies/single-movies-v2.html" class="">Comedy</a></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="row d-block d-lg-flex no-gutters product border-bottom mr-lg-6 pb-2d border-gray-3200 mb-2d">
                                                            <div class="col-auto">
                                                                <div class="product-image mb-2 mb-md-0 max-w-9rem-lg">
                                                                    <a href="../single-movies/single-movies-v2.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                                                </div>
                                                            </div>
                                                            <div class="col d-flex">
                                                                <div class="my-auto pl-lg-3d">
                                                                    <span><a href="../single-movies/single-movies-v2.html" class="h-g-primary font-size-12">1998</a></span>
                                                                    <div class="product-title font-weight-bold font-secondary font-size-1 mb-2d"><a href="../single-movies/single-movies-v2.html">Mad</a></div>
                                                                    <div class="product-meta font-size-12 mb-1">
                                                                        <span><a href="../single-movies/single-movies-v2.html" class="">Action</a></span>
                                                                        <span><a href="../single-movies/single-movies-v2.html" class="">Comedy</a></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="row d-block d-lg-flex no-gutters product border-bottom mr-lg-6 pb-2d border-gray-3200 mb-2d">
                                                            <div class="col-auto">
                                                                <div class="product-image mb-2 mb-md-0 max-w-9rem-lg">
                                                                    <a href="../single-movies/single-movies-v2.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                                                </div>
                                                            </div>
                                                            <div class="col d-flex">
                                                                <div class="my-auto pl-lg-3d">
                                                                    <span><a href="../single-movies/single-movies-v2.html" class="h-g-primary font-size-12">1998</a></span>
                                                                    <div class="product-title font-weight-bold font-secondary font-size-1 mb-2d"><a href="../single-movies/single-movies-v2.html">Mad</a></div>
                                                                    <div class="product-meta font-size-12 mb-1">
                                                                        <span><a href="../single-movies/single-movies-v2.html" class="">Action</a></span>
                                                                        <span><a href="../single-movies/single-movies-v2.html" class="">Comedy</a></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="row d-block d-lg-flex no-gutters product border-bottom mr-lg-6 pb-2d border-gray-3200 mb-2d">
                                                            <div class="col-auto">
                                                                <div class="product-image mb-2 mb-md-0 max-w-9rem-lg">
                                                                    <a href="../single-movies/single-movies-v2.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                                                </div>
                                                            </div>
                                                            <div class="col d-flex">
                                                                <div class="my-auto pl-lg-3d">
                                                                    <span><a href="../single-movies/single-movies-v2.html" class="h-g-primary font-size-12">1998</a></span>
                                                                    <div class="product-title font-weight-bold font-secondary font-size-1 mb-2d"><a href="../single-movies/single-movies-v2.html">Mad</a></div>
                                                                    <div class="product-meta font-size-12 mb-1">
                                                                        <span><a href="../single-movies/single-movies-v2.html" class="">Action</a></span>
                                                                        <span><a href="../single-movies/single-movies-v2.html" class="">Comedy</a></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="row d-block d-lg-flex no-gutters product border-bottom mr-lg-6 pb-2d border-gray-3200 mb-2d">
                                                            <div class="col-auto">
                                                                <div class="product-image mb-2 mb-md-0 max-w-9rem-lg">
                                                                    <a href="../single-movies/single-movies-v2.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                                                </div>
                                                            </div>
                                                            <div class="col d-flex">
                                                                <div class="my-auto pl-lg-3d">
                                                                    <span><a href="../single-movies/single-movies-v2.html" class="h-g-primary font-size-12">1998</a></span>
                                                                    <div class="product-title font-weight-bold font-secondary font-size-1 mb-2d"><a href="../single-movies/single-movies-v2.html">Mad</a></div>
                                                                    <div class="product-meta font-size-12 mb-1">
                                                                        <span><a href="../single-movies/single-movies-v2.html" class="">Action</a></span>
                                                                        <span><a href="../single-movies/single-movies-v2.html" class="">Comedy</a></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="row d-block d-lg-flex no-gutters product border-bottom mr-lg-6 pb-2d border-gray-3200 mb-2d">
                                                            <div class="col-auto">
                                                                <div class="product-image mb-2 mb-md-0 max-w-9rem-lg">
                                                                    <a href="../single-movies/single-movies-v2.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                                                </div>
                                                            </div>
                                                            <div class="col d-flex">
                                                                <div class="my-auto pl-lg-3d">
                                                                    <span><a href="../single-movies/single-movies-v2.html" class="h-g-primary font-size-12">1998</a></span>
                                                                    <div class="product-title font-weight-bold font-secondary font-size-1 mb-2d"><a href="../single-movies/single-movies-v2.html">Mad</a></div>
                                                                    <div class="product-meta font-size-12 mb-1">
                                                                        <span><a href="../single-movies/single-movies-v2.html" class="">Action</a></span>
                                                                        <span><a href="../single-movies/single-movies-v2.html" class="">Comedy</a></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="row d-block d-lg-flex no-gutters product border-bottom mr-lg-6 pb-2d border-gray-3200 mb-2d">
                                                            <div class="col-auto">
                                                                <div class="product-image mb-2 mb-md-0 max-w-9rem-lg">
                                                                    <a href="../single-movies/single-movies-v2.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                                                </div>
                                                            </div>
                                                            <div class="col d-flex">
                                                                <div class="my-auto pl-lg-3d">
                                                                    <span><a href="../single-movies/single-movies-v2.html" class="h-g-primary font-size-12">1998</a></span>
                                                                    <div class="product-title font-weight-bold font-secondary font-size-1 mb-2d"><a href="../single-movies/single-movies-v2.html">Mad</a></div>
                                                                    <div class="product-meta font-size-12 mb-1">
                                                                        <span><a href="../single-movies/single-movies-v2.html" class="">Action</a></span>
                                                                        <span><a href="../single-movies/single-movies-v2.html" class="">Comedy</a></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="row d-block d-lg-flex no-gutters product border-bottom mr-lg-6 pb-2d border-gray-3200 mb-2d">
                                                            <div class="col-auto">
                                                                <div class="product-image mb-2 mb-md-0 max-w-9rem-lg">
                                                                    <a href="../single-movies/single-movies-v2.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="https://placehold.it/174x260" alt="Image Description"></a>
                                                                </div>
                                                            </div>
                                                            <div class="col d-flex">
                                                                <div class="my-auto pl-lg-3d">
                                                                    <span><a href="../single-movies/single-movies-v2.html" class="h-g-primary font-size-12">1998</a></span>
                                                                    <div class="product-title font-weight-bold font-secondary font-size-1 mb-2d"><a href="../single-movies/single-movies-v2.html">Mad</a></div>
                                                                    <div class="product-meta font-size-12 mb-1">
                                                                        <span><a href="../single-movies/single-movies-v2.html" class="">Action</a></span>
                                                                        <span><a href="../single-movies/single-movies-v2.html" class="">Comedy</a></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Tab Content -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- ========== END MAIN CONTENT ========== -->

    <!-- ========== FOOTER ========== -->
    <footer class="">
        <div class="bg-gray-4000">
            <div class="container px-md-5">
                <div class="d-flex flex-wrap align-items-center pt-6 pb-3d border-bottom mb-7 border-gray-4100">
                    <a href="../home/index.html" class="mb-4 mb-md-0 mr-auto">
                        <svg version="1.1" width="103" height="40px">
                            <g style="fill: #ffffff;">
                                <path class="vodi-stream0" d="M72.8,12.5c0-2.7,0-1.8,0-4.4c0-0.9,0-1.8,0-2.8C73,2.8,74.7,1.2,77,1.2s4.1,1.8,4.2,4.2c0,1,0,2.1,0,3.1
                                c0,6.5,0,9.4,0,15.9c0,4.7-1.7,8.8-5.6,11.5c-4.5,3.1-9.3,3.5-14.1,0.9c-4.7-2.5-7.1-6.7-7-12.1c0.1-7.8,6.3-13.6,14.1-13.2
                                c0.7,0,1.4,0.2,2.1,0.3C71.3,12,72,12.2,72.8,12.5z M67.8,19.6c-2.9,0-5.2,2.2-5.2,5c0,2.9,2.3,5.3,5.2,5.3c2.8,0,5.2-2.4,5.2-5.2
                                C73,22,70.6,19.6,67.8,19.6z"></path>
                                <path class="vodi-stream0" d="M39.9,38.4c-7.3,0-13.3-6.1-13.3-13.5c0-7.5,5.9-13.4,13.4-13.4s13.4,6,13.4,13.5
                                C53.4,32.4,47.4,38.4,39.9,38.4z M39.9,30.4c3.2,0,5.6-2.3,5.6-5.6c0-3.2-2.3-5.5-5.5-5.5s-5.6,2.2-5.6,5.4
                                C34.4,28,36.7,30.4,39.9,30.4z"></path>
                                <path class="vodi-stream0" d="M14.6,26.8c0.6-1.4,1.1-2.6,1.6-3.8c1.2-2.9,2.5-5.8,3.7-8.8c0.7-1.7,2-2.8,4-2.7c3,0,4.9,2.6,3.8,5.4
                                c-0.5,1.3-1.2,2.6-1.8,3.9c-2.4,5-4.9,10-7.3,15c-0.8,1.6-2,2.6-3.9,2.6c-2,0-3.3-0.8-4.2-2.6c-2.7-5.6-5.3-11.1-8-16.7
                                c-0.3-0.7-0.6-1.3-0.9-2c-0.8-1.8-0.3-3.7,1.1-4.8c1.5-1.2,4-1.3,5.3,0c0.7,0.6,1.2,1.5,1.6,2.3C11.3,18.6,12.9,22.5,14.6,26.8z"></path>
                                <path class="vodi-stream0" d="M90.9,24.9c0,3.1,0,6.2,0,9.4c0,1.9-1.2,3.4-2.9,4c-1.7,0.5-3.5,0-4.5-1.6c-0.5-0.8-0.8-1.8-0.8-2.6
                                c-0.1-6.1-0.1-11.3,0-17.5c0-2.2,1.5-3.9,3.5-4.2c2.1-0.3,4.1,0.9,4.7,2.9c0.1,0.5,0.2,1.1,0.2,1.6C90.9,19.8,90.9,21.9,90.9,24.9
                                L90.9,24.9z"></path>
                                <path style="fill: #51C9F0;" d="M90.2,4.5L86,2.1c-1.3-0.8-3,0.2-3,1.7v4.8c0,1.5,1.7,2.5,3,1.7l4.2-2.4C91.5,7.2,91.5,5.3,90.2,4.5z"></path>
                            </g>
                        </svg>
                    </a>
                    <ul class="list-unstyled mx-n3 mb-0 d-flex flex-wrap align-items-center">
                        <li class="px-3">
                            <a href="#" class="text-gray-1300 d-flex flex-wrap align-items-center"><i class="fab fa-facebook-f fa-inverse"></i> <span class="ml-2">Facebook</span></a>
                        </li>
                        <li class="px-3">
                            <a href="#" class="text-gray-1300 d-flex flex-wrap align-items-center"><i class="fab fa-twitter fa-inverse"></i> <span class="ml-2">Twitter</span></a>
                        </li>
                        <li class="px-3">
                            <a href="#" class="text-gray-1300 d-flex flex-wrap align-items-center"><i class="fab fa-google-plus-g fa-inverse"></i> <span class="ml-2">Google+</span></a>
                        </li>
                        <li class="px-3">
                            <a href="#" class="text-gray-1300 d-flex flex-wrap align-items-center"><i class="fab fa-vimeo-v fa-inverse"></i> <span class="ml-2">Vimeo</span></a>
                        </li>
                        <li class="px-3">
                            <a href="#" class="text-gray-1300 d-flex flex-wrap align-items-center"><i class="fas fa-rss fa-inverse"></i> <span class="ml-2">RSS</span></a>
                        </li>
                    </ul>
                </div>
                <div class="row pb-5">
                    <div class="col-md mb-5 mb-md-0">
                        <h4 class="font-size-18 font-weight-medium mb-4 text-gray-4200">Movie Categories</h4>
                        <ul class="column-count-2 v2 list-unstyled mb-0">
                            <li class="py-1d">
                                <a class="h-g-white" href="../archive/movies.html">Action</a>
                            </li>
                            <li class="py-1d">
                                <a class="h-g-white" href="../archive/movies.html">Adventure</a>
                            </li>
                            <li class="py-1d">
                                <a class="h-g-white" href="../archive/movies.html">Animation</a>
                            </li>
                            <li class="py-1d">
                                <a class="h-g-white" href="../archive/movies.html">Comedy</a>
                            </li>
                            <li class="py-1d">
                                <a class="h-g-white" href="../archive/movies.html">Crime</a>
                            </li>
                            <li class="py-1d">
                                <a class="h-g-white" href="../archive/movies.html">Drama</a>
                            </li>
                            <li class="py-1d">
                                <a class="h-g-white" href="../archive/movies.html">Fantacy</a>
                            </li>
                            <li class="py-1d">
                                <a class="h-g-white" href="../archive/movies.html">Horror</a>
                            </li>
                            <li class="py-1d">
                                <a class="h-g-white" href="../archive/movies.html">Mystrey</a>
                            </li>
                            <li class="py-1d">
                                <a class="h-g-white" href="../archive/movies.html">Romance</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md mb-5 mb-md-0">
                        <h4 class="font-size-18 font-weight-medium mb-4 text-gray-4200">TV Series</h4>
                        <ul class="column-count-2 v2 list-unstyled mb-0">
                            <li class="py-1d">
                                <a class="h-g-white" href="../archive/tv-shows.html">Valentine Day</a>
                            </li>
                            <li class="py-1d">
                                <a class="h-g-white" href="../archive/tv-shows.html">Underrated Comedies</a>
                            </li>
                            <li class="py-1d">
                                <a class="h-g-white" href="../archive/tv-shows.html">Scary TV Series</a>
                            </li>
                            <li class="py-1d">
                                <a class="h-g-white" href="../archive/tv-shows.html">Best 2020 Documentaries</a>
                            </li>
                            <li class="py-1d">
                                <a class="h-g-white" href="../archive/tv-shows.html">Classic Shows</a>
                            </li>
                            <li class="py-1d">
                                <a class="h-g-white" href="../archive/tv-shows.html">Big TV Premieres</a>
                            </li>
                            <li class="py-1d">
                                <a class="h-g-white" href="../archive/tv-shows.html">Reality TV Shows</a>
                            </li>
                            <li class="py-1d">
                                <a class="h-g-white" href="../archive/tv-shows.html">Original Shows</a>
                            </li>
                            <li class="py-1d">
                                <a class="h-g-white" href="../archive/tv-shows.html">Suprise of the Year Shows</a>
                            </li>
                            <li class="py-1d">
                                <a class="h-g-white" href="../archive/tv-shows.html">Top 10 TV Shows</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-2 mb-5 mb-md-0 border-left border-gray-4100">
                        <div class="ml-1">
                            <h4 class="font-size-18 font-weight-medium mb-4 text-gray-4200">Support</h4>
                            <ul class="list-unstyled mb-0">
                                <li class="py-1d">
                                    <a class="h-g-white" href="../static/contact.html">My Account</a>
                                </li>
                                <li class="py-1d">
                                    <a class="h-g-white" href="../static/contact.html">FAQ</a>
                                </li>
                                <li class="py-1d">
                                    <a class="h-g-white" href="../static/contact.html">Watch on TV</a>
                                </li>
                                <li class="py-1d">
                                    <a class="h-g-white" href="../static/contact.html">Help Center</a>
                                </li>
                                <li class="py-1d">
                                    <a class="h-g-white" href="../static/contact.html">Contact</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-gray-4300">
            <div class="container px-md-5">
                <div class="text-center d-md-flex flex-wrap align-items-center py-3">
                    <div class="font-size-13 text-gray-1300 mb-2 mb-md-0">Copyright © 2020, Vodi. All Rights Reserved</div>
                    <a href="../static/contact.html" class="font-size-13 h-g-white ml-md-auto">Privacy Policy</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- ========== END FOOTER ========== -->

    <!-- ========== SECONDARY CONTENTS ========== -->
    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <button type="button" class="close position-absolute top-0 right-0 z-index-2 mt-3 mr-3" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" class="mb-0" width="14" height="14" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                        <path fill="currentColor" d="M11.5,9.5l5-5c0.2-0.2,0.2-0.6-0.1-0.9l-1-1c-0.3-0.3-0.7-0.3-0.9-0.1l-5,5l-5-5C4.3,2.3,3.9,2.4,3.6,2.6l-1,1 C2.4,3.9,2.3,4.3,2.5,4.5l5,5l-5,5c-0.2,0.2-0.2,0.6,0.1,0.9l1,1c0.3,0.3,0.7,0.3,0.9,0.1l5-5l5,5c0.2,0.2,0.6,0.2,0.9-0.1l1-1 c0.3-0.3,0.3-0.7,0.1-0.9L11.5,9.5z"/>
                    </svg>
                </button>

                <!-- Body -->
                <div class="modal-body">
                    <form class="js-validate">
                        <!-- Login -->
                        <div id="login">
                            <!-- Title -->
                            <div class="text-center mb-7">
                                <h3 class="mb-0">Sign In to Vodi</h3>
                                <p>Login to manage your account.</p>
                            </div>
                            <!-- End Title -->

                            <!-- Input Group -->
                            <div class="js-form-message mb-4">
                                <label class="input-label">Email</label>
                                <div class="input-group input-group-sm mb-2">
                                    <input type="email" class="form-control" name="email" id="signinEmail" placeholder="Email" aria-label="Email" required
                                    data-msg="Please enter a valid email address.">
                                </div>
                            </div>
                            <!-- End Input Group -->

                            <!-- Input Group -->
                            <div class="js-form-message mb-3">
                                <label class="input-label">Password</label>
                                <div class="input-group input-group-sm mb-2">
                                    <input type="password" class="form-control" name="password" id="signinPassword" placeholder="Password" aria-label="Password" required
                                    data-msg="Your password is invalid. Please try again.">
                                </div>
                            </div>
                            <!-- End Input Group -->

                            <div class="d-flex justify-content-end mb-4">
                                <a class="js-animation-link small link-underline" href="javascript:;"
                                    data-hs-show-animation-options='{
                                        "targetSelector": "#forgotPassword",
                                        "groupName": "idForm"
                                    }'>Forgot Password?
                                </a>
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-sm btn-shugaban btn-block">Sign In</button>
                            </div>

                            <div class="text-center mb-3">
                                <span class="divider divider-xs divider-text">OR</span>
                            </div>

                            <a class="btn btn-sm btn-ghost-secondary btn-block mb-2" href="#">
                                <span class="d-flex justify-content-center align-items-center">
                                    <i class="fab fa-google mr-2"></i>
                                    Sign In with Google
                                </span>
                            </a>

                            <div class="text-center">
                                <span class="small text-muted">Do not have an account?</span>
                                <a class="js-animation-link small font-weight-bold" href="javascript:;"
                                    data-hs-show-animation-options='{
                                        "targetSelector": "#signup",
                                        "groupName": "idForm"
                                    }'>Sign Up
                                </a>
                            </div>
                        </div>

                        <!-- Signup -->
                        <div id="signup" style="display: none; opacity: 0;">
                            <!-- Title -->
                            <div class="text-center mb-7">
                                <h3 class="mb-0">Create your account</h3>
                                <p>Fill out the form to get started.</p>
                            </div>
                            <!-- End Title -->

                            <!-- Input Group -->
                            <div class="js-form-message mb-4">
                                <label class="input-label">Email</label>
                                <div class="input-group input-group-sm mb-2">
                                    <input type="email" class="form-control" name="email" id="signupEmail" placeholder="Email" aria-label="Email" required
                                    data-msg="Please enter a valid email address.">
                                </div>
                            </div>
                            <!-- End Input Group -->

                            <!-- Input Group -->
                            <div class="js-form-message mb-4">
                                <label class="input-label">Password</label>
                                <div class="input-group input-group-sm mb-2">
                                    <input type="password" class="form-control" name="password" id="signupPassword" placeholder="Password" aria-label="Password" required
                                    data-msg="Your password is invalid. Please try again.">
                                </div>
                            </div>
                            <!-- End Input Group -->

                            <!-- Input Group -->
                            <div class="js-form-message mb-4">
                                <label class="input-label">Confirm Password</label>
                                <div class="input-group input-group-sm mb-2">
                                    <input type="password" class="form-control" name="confirmPassword" id="signupConfirmPassword" placeholder="Confirm Password" aria-label="Confirm Password" required
                                    data-msg="Password does not match the confirm password.">
                                </div>
                            </div>
                            <!-- End Input Group -->

                            <div class="mb-3">
                                <button type="submit" class="btn btn-sm btn-shugaban btn-block">Sign Up</button>
                            </div>

                            <div class="text-center mb-3">
                                <span class="divider divider-xs divider-text">OR</span>
                            </div>

                            <a class="btn btn-sm btn-ghost-secondary btn-block mb-2" href="#">
                                <span class="d-flex justify-content-center align-items-center">
                                    <i class="fab fa-google mr-2"></i>
                                    Sign Up with Google
                                </span>
                            </a>

                            <div class="text-center">
                                <span class="small text-muted">Already have an account?</span>
                                <a class="js-animation-link small font-weight-bold" href="javascript:;"
                                    data-hs-show-animation-options='{
                                        "targetSelector": "#login",
                                        "groupName": "idForm"
                                    }'>Sign In
                                </a>
                            </div>
                        </div>
                        <!-- End Signup -->

                        <!-- Forgot Password -->
                        <div id="forgotPassword" style="display: none; opacity: 0;">
                            <!-- Title -->
                            <div class="text-center mb-7">
                                <h3 class="mb-0">Recover password</h3>
                                <p>Instructions will be sent to you.</p>
                            </div>
                            <!-- End Title -->

                            <!-- Input Group -->
                            <div class="js-form-message">
                                <label class="sr-only" for="recoverEmail">Your email</label>
                                <div class="input-group input-group-sm mb-2">
                                    <input type="email" class="form-control" name="email" id="recoverEmail" placeholder="Your email" aria-label="Your email" required
                                    data-msg="Please enter a valid email address.">
                                </div>
                            </div>
                            <!-- End Input Group -->

                            <div class="mb-3">
                                <button type="submit" class="btn btn-sm btn-shugaban btn-block">Recover Password</button>
                            </div>

                            <div class="text-center mb-4">
                                <span class="small text-muted">Remember your password?</span>
                                <a class="js-animation-link small font-weight-bold" href="javascript:;"
                                    data-hs-show-animation-options='{
                                        "targetSelector": "#login",
                                        "groupName": "idForm"
                                    }'>Login
                                </a>
                            </div>
                        </div>
                        <!-- End Forgot Password -->
                    </form>
                </div>
                <!-- End Body -->
            </div>
        </div>
    </div>
    <!-- End Login Modal -->

    <!-- Sidebar Navigation -->
    <aside id="sidebarContent" class="hs-unfold-content sidebar sidebar-left off-canvas-menu">
        <div class="sidebar-scroller">
            <div class="sidebar-container">
                <div class="sidebar-footer-offset" style="padding-bottom: 7rem;">
                    <!-- Toggle Button -->
                    <div class="d-flex justify-content-end align-items-center py-2 px-4 border-bottom">
                        <!-- Logo -->
                        <a class="navbar-brand mr-auto" href="../home/index.html" aria-label="Vodi">
                            <svg version="1.1" width="103" height="40px">
                                <linearGradient id="vodi-gr1" x1="0%" y1="0%" x2="100%" y2="0%">
                                    <stop offset="0" style="stop-color:#2A4999"></stop>
                                    <stop offset="1" style="stop-color:#2C9CD4"></stop>
                                </linearGradient>
                                <g class="vodi-gr">
                                    <path class="vodi-svg0" d="M72.8,12.7c0-2.7,0-1.8,0-4.4c0-0.9,0-1.8,0-2.8C73,3,74.7,1.4,77,1.4c2.3,0,4.1,1.8,4.2,4.2c0,1,0,2.1,0,3.1
                                    c0,6.5,0,9.4,0,15.9c0,4.7-1.7,8.8-5.6,11.5c-4.5,3.1-9.3,3.5-14.1,0.9c-4.7-2.5-7.1-6.7-7-12.1c0.1-7.8,6.3-13.6,14.1-13.2
                                    c0.7,0,1.4,0.2,2.1,0.3C71.3,12.2,72,12.4,72.8,12.7z M67.8,19.8c-2.9,0-5.2,2.2-5.2,5c0,2.9,2.3,5.3,5.2,5.3
                                    c2.8,0,5.2-2.4,5.2-5.2C73,22.2,70.6,19.8,67.8,19.8z
                                    M39.9,38.6c-7.3,0-13.3-6.1-13.3-13.5c0-7.5,5.9-13.4,13.4-13.4c7.5,0,13.4,6,13.4,13.5
                                    C53.4,32.6,47.4,38.6,39.9,38.6z M39.9,30.6c3.2,0,5.6-2.3,5.6-5.6c0-3.2-2.3-5.5-5.5-5.5c-3.2,0-5.6,2.2-5.6,5.4
                                    C34.4,28.2,36.7,30.6,39.9,30.6z
                                    M14.6,27c0.6-1.4,1.1-2.6,1.6-3.8c1.2-2.9,2.5-5.8,3.7-8.8c0.7-1.7,2-2.8,4-2.7c3,0,4.9,2.6,3.8,5.4
                                    c-0.5,1.3-1.2,2.6-1.8,3.9c-2.4,5-4.9,10-7.3,15c-0.8,1.6-2,2.6-3.9,2.6c-2,0-3.3-0.8-4.2-2.6c-2.7-5.6-5.3-11.1-8-16.7
                                    c-0.3-0.7-0.6-1.3-0.9-2c-0.8-1.8-0.3-3.7,1.1-4.8c1.5-1.2,4-1.3,5.3,0c0.7,0.6,1.2,1.5,1.6,2.3C11.3,18.8,12.9,22.7,14.6,27z
                                    M90.9,25.1c0,3.1,0,6.2,0,9.4c0,1.9-1.2,3.4-2.9,4c-1.7,0.5-3.5,0-4.5-1.6c-0.5-0.8-0.8-1.8-0.8-2.6
                                    c-0.1-6.1-0.1-11.3,0-17.5c0-2.2,1.5-3.9,3.5-4.2c2.1-0.3,4.1,0.9,4.7,2.9c0.1,0.5,0.2,1.1,0.2,1.6C90.9,20,90.9,22.1,90.9,25.1
                                    C90.9,25.1,90.9,25.1,90.9,25.1z
                                    M90.2,4.7L86,2.3c-1.3-0.8-3,0.2-3,1.7v4.8c0,1.5,1.7,2.5,3,1.7l4.2-2.4C91.5,7.4,91.5,5.5,90.2,4.7z"></path>
                                </g>
                            </svg>
                        </a>
                        <!-- End Logo -->
                        <div class="hs-unfold">
                            <a class="js-hs-unfold-invoker btn btn-icon btn-xs btn-soft-secondary" href="javascript:;"
                                data-hs-unfold-options='{
                                    "target": "#sidebarContent",
                                    "type": "css-animation",
                                    "animationIn": "fadeInLeft",
                                    "animationOut": "fadeOutLeft",
                                    "hasOverlay": "rgba(55, 125, 255, 0.1)",
                                    "smartPositionOff": true
                                }'>
                                <svg width="10" height="10" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                                    <path fill="currentColor" d="M11.5,9.5l5-5c0.2-0.2,0.2-0.6-0.1-0.9l-1-1c-0.3-0.3-0.7-0.3-0.9-0.1l-5,5l-5-5C4.3,2.3,3.9,2.4,3.6,2.6l-1,1 C2.4,3.9,2.3,4.3,2.5,4.5l5,5l-5,5c-0.2,0.2-0.2,0.6,0.1,0.9l1,1c0.3,0.3,0.7,0.3,0.9,0.1l5-5l5,5c0.2,0.2,0.6,0.2,0.9-0.1l1-1 c0.3-0.3,0.3-0.7,0.1-0.9L11.5,9.5z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                    <!-- End Toggle Button -->

                    <!-- Content -->
                    <div class="scrollbar sidebar-body">
                        <div class="sidebar-content py-4">
                            <!-- Sidebar Navbar -->
                            <div class="">
                                <div id="sidebarNavExample3" class="collapse show navbar-collapse">
                                    <!-- Nav Link -->
                                    <div class="sidebar-body_inner">
                                        <div class="position-relative">
                                            <a class="dropdown-nav-link dropdown-toggle dropdown-toggle-collapse" href="javascript:;" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="sidebarNav1Collapse" data-target="#sidebarNav1Collapse">
                                                Home
                                            </a>

                                            <div id="sidebarNav1Collapse" class="collapse" data-parent="#sidebarNavExample3">
                                                <div id="sidebarNav1" class="navbar-nav align-items-start flex-column">
                                                    <a class="dropdown-item" href="../home/index.html">Home v1</a>
                                                    <a class="dropdown-item" href="../home/home-v2.html">Home v2</a>
                                                    <a class="dropdown-item" href="../home/home-v3.html">Home v3</a>
                                                    <a class="dropdown-item" href="../home/home-v4.html">Home v4</a>
                                                    <a class="dropdown-item" href="../home/home-v5.html">Home v5</a>
                                                    <a class="dropdown-item" href="../home/home-v6.html">Home v6 - Vodi Prime (Light)</a>
                                                    <a class="dropdown-item" href="../home/home-v7.html">Home v7 - Vodi Prime (Dark)</a>
                                                    <a class="dropdown-item" href="../home/home-v8.html">Home v8 - Vodi Stream</a>
                                                    <a class="dropdown-item" href="../home/home-v9.html">Home v9 - Vodi Tube (Light)</a>
                                                    <a class="dropdown-item" href="../home/home-v10.html">Home v10 - Vodi Tube (Dark)</a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="position-relative">
                                            <a class="dropdown-nav-link dropdown-toggle dropdown-toggle-collapse" href="javascript:;" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="sidebarNav2Collapse" data-target="#sidebarNav2Collapse">
                                                Archive Pages
                                            </a>

                                            <div id="sidebarNav2Collapse" class="collapse" data-parent="#sidebarNavExample3">
                                                <div id="sidebarNav2" class="navbar-nav align-items-start flex-column">
                                                    <a class="dropdown-item" href="../archive/movies.html">Movies</a>
                                                    <a class="dropdown-item" href="../archive/tv-shows.html">TV Shows</a>
                                                    <a class="dropdown-item" href="../archive/videos.html">Videos</a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="position-relative">
                                            <a class="dropdown-nav-link dropdown-toggle dropdown-toggle-collapse" href="javascript:;" data-target="#sidebarNav2One" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="sidebarNav2One">
                                                Single Movies
                                            </a>
                                            <div id="sidebarNav2One" class="navbar-nav flex-column collapse" data-parent="#sidebarNav2">
                                                <a class="dropdown-item" href="../single-movies/single-movies-v1.html">Movie v1</a>
                                                <a class="dropdown-item" href="../single-movies/single-movies-v2.html">Movie v2</a>
                                                <a class="dropdown-item" href="../single-movies/single-movies-v3.html">Movie v3</a>
                                                <a class="dropdown-item" href="../single-movies/single-movies-v4.html">Movie v4</a>
                                                <a class="dropdown-item" href="../single-movies/single-movies-v5.html">Movie v5</a>
                                                <a class="dropdown-item" href="../single-movies/single-movies-v6.html">Movie v6</a>
                                                <a class="dropdown-item" href="../single-movies/single-movies-v7.html">Movie v7</a>
                                            </div>
                                        </div>

                                        <div class="position-relative">
                                            <a class="dropdown-nav-link dropdown-toggle dropdown-toggle-collapse" href="javascript:;" data-target="#sidebarNav2Two" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="sidebarNav2Two">
                                                Single Videos
                                            </a>
                                            <div id="sidebarNav2Two" class="navbar-nav flex-column collapse" data-parent="#sidebarNav2">
                                                <a class="dropdown-item" href="../single-video/single-video-v1.html">Video v1</a>
                                                <a class="dropdown-item" href="../single-video/single-video-v2.html">Video v2</a>
                                                <a class="dropdown-item" href="../single-video/single-video-v3.html">Video v3</a>
                                                <a class="dropdown-item" href="../single-video/single-video-v4.html">Video v4</a>
                                                <a class="dropdown-item" href="../single-video/single-video-v5.html">Video v5</a>
                                                <a class="dropdown-item" href="../single-video/single-video-v6.html">Video v6</a>
                                            </div>
                                        </div>

                                        <div class="position-relative">
                                            <a class="dropdown-nav-link dropdown-toggle dropdown-toggle-collapse" href="javascript:;" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="sidebarNav3Collapse" data-target="#sidebarNav3Collapse">
                                                Single Episodes
                                            </a>

                                            <div id="sidebarNav3Collapse" class="collapse" data-parent="#sidebarNavExample3">
                                                <div id="sidebarNav3" class="navbar-nav align-items-start flex-column">
                                                    <a class="dropdown-item" href="../single-episodes/single-episodes-v1.html">Episode v1</a>
                                                    <a class="dropdown-item" href="../single-episodes/single-episodes-v2.html">Episode v2</a>
                                                    <a class="dropdown-item" href="../single-episodes/single-episodes-v3.html">Episode v3</a>
                                                    <a class="dropdown-item" href="../single-episodes/single-episodes-v4.html">Episode v4</a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="position-relative">
                                            <a class="dropdown-nav-link dropdown-toggle dropdown-toggle-collapse" href="javascript:;" data-target="#sidebarNav3One" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="sidebarNav3One">
                                                Other Pages
                                            </a>
                                            <div id="sidebarNav3One" class="navbar-nav flex-column collapse" data-parent="#sidebarNav3">
                                                <a class="dropdown-item" href="../other/landing-v1.html">Landing v1</a>
                                                <a class="dropdown-item" href="../other/landing-v2.html">Landing v2</a>
                                                <a class="dropdown-item" href="../other/coming-soon.html">Coming Soon</a>
                                                <a class="dropdown-item" href="../single-tv-show/single-tv-show.html">Single TV Show</a>
                                            </div>
                                        </div>

                                        <div class="position-relative">
                                            <a class="dropdown-nav-link dropdown-toggle dropdown-toggle-collapse" href="javascript:;" data-target="#sidebarNav3Two" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="sidebarNav3Two">
                                                Blog Pages
                                            </a>
                                            <div id="sidebarNav3Two" class="navbar-nav flex-column collapse" data-parent="#sidebarNav3">
                                                <a class="dropdown-item" href="../blog/blog.html">Blog</a>
                                                <a class="dropdown-item" href="../blog/blog-single.html">Single Blog</a>
                                            </div>
                                        </div>

                                        <div class="position-relative">
                                            <a class="dropdown-nav-link dropdown-toggle dropdown-toggle-collapse" href="javascript:;" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="sidebarNav4Collapse" data-target="#sidebarNav4Collapse">
                                                Static Pages
                                            </a>

                                            <div id="sidebarNav4Collapse" class="collapse" data-parent="#sidebarNavExample3">
                                                <div id="sidebarNav4" class="navbar-nav align-items-start flex-column">
                                                    <a class="dropdown-item" href="../static/contact.html">Contact Us</a>
                                                    <a class="dropdown-item" href="../static/404.html">404</a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="position-relative">
                                            <a class="dropdown-nav-link dropdown-toggle dropdown-toggle-collapse" href="javascript:;" data-target="#sidebarNav4One" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="sidebarNav4One">
                                                Docs
                                            </a>
                                            <div id="sidebarNav4One" class="navbar-nav flex-column collapse" data-parent="#sidebarNav4">
                                                <a class="dropdown-item" href="documentation/index.html">Documentation</a>
                                                <a class="dropdown-item" href="snippets/index.html">Snippets</a>
                                            </div>
                                        </div>
                                        <!-- End Nav Link -->
                                    </div>
                                </div>
                            </div>
                            <!-- End Sidebar Navbar -->
                        </div>
                    </div>
                    <!-- End Content -->
                </div>
            </div>
        </div>
    </aside>
    <!-- End Sidebar Navigation -->
    <!-- ========== END SECONDARY CONTENTS ========== -->

    <!-- Go to Top -->
    <a class="js-go-to go-to position-fixed" href="javascript:;" style="visibility: hidden;"
        data-hs-go-to-options='{
            "offsetTop": 700,
            "position": {
                "init": {
                    "right": 15
                },
                "show": {
                    "bottom": 15
                },
                "hide": {
                    "bottom": -15
                }
            }
        }'>
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- End Go to Top -->

    <!-- JS Global Compulsory -->
    <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="assets/vendor/jquery-migrate/dist/jquery-migrate.min.js"></script>
    <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <!-- JS Implementing Plugins -->
    <script src="assets/vendor/hs-header/dist/hs-header.min.js"></script>
    <script src="assets/vendor/hs-go-to/dist/hs-go-to.min.js"></script>
    <script src="assets/vendor/hs-unfold/dist/hs-unfold.min.js"></script>
    <script src="assets/vendor/hs-mega-menu/dist/hs-mega-menu.min.js"></script>
    <script src="assets/vendor/hs-show-animation/dist/hs-show-animation.min.js"></script>
    <script src="assets/vendor/hs-sticky-block/dist/hs-sticky-block.min.js"></script>
    <script src="assets/vendor/hs-counter/dist/hs-counter.min.js"></script>
    <script src="assets/vendor/appear.js"></script>
    <script src="assets/vendor/cubeportfolio/js/jquery.cubeportfolio.min.js"></script>
    <script src="assets/vendor/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="assets/vendor/dzsparallaxer/dzsparallaxer.js"></script>
    <script src="assets/vendor/aos/dist/aos.js"></script>
    <script src="assets/vendor/slick-carousel/slick/slick.js"></script>
    <script src="assets/vendor/fancybox/dist/jquery.fancybox.min.js"></script>

    <!-- JS Vodi -->
    <script src="assets/js/hs.core.js"></script>
    <script src="assets/js/hs.validation.js"></script>
    <script src="assets/js/hs.cubeportfolio.js"></script>
    <script src="assets/js/hs.slick-carousel.js"></script>
    <script src="assets/js/hs.fancybox.js"></script>

    <!-- JS Plugins Init. -->
    <script>
        $(document).on('ready', function () {
            // initialization of header
            var header = new HSHeader($('#header')).init();

            // initialization of mega menu
            var megaMenu = new HSMegaMenu($('.js-mega-menu'), {
                desktop: {
                    position: 'left'
                }
            }).init();

            // initialization of fancybox
            $('.js-fancybox').each(function () {
              var fancybox = $.HSCore.components.HSFancyBox.init($(this));
            });

            // initialization of unfold
            var unfold = new HSUnfold('.js-hs-unfold-invoker').init();

            // initialization of slick carousel
            $('.js-slick-carousel').each(function() {
                var slickCarousel = $.HSCore.components.HSSlickCarousel.init($(this));
            });

            // initialization of form validation
            $('.js-validate').each(function() {
                $.HSCore.components.HSValidation.init($(this), {
                    rules: {
                        confirmPassword: {
                            equalTo: '#signupPassword'
                        }
                    }
                });
            });

            // initialization of show animations
            $('.js-animation-link').each(function () {
                var showAnimation = new HSShowAnimation($(this)).init();
            });

            // initialization of counter
            $('.js-counter').each(function() {
                var counter = new HSCounter($(this)).init();
            });

            // initialization of sticky block
            var cbpStickyFilter = new HSStickyBlock($('#cbpStickyFilter'));

            // initialization of cubeportfolio
            $('.cbp').each(function () {
                var cbp = $.HSCore.components.HSCubeportfolio.init($(this), {
                    layoutMode: 'grid',
                    filters: '#filterControls',
                    displayTypeSpeed: 0
                });
            });

            $('.cbp').on('initComplete.cbp', function() {
                // update sticky block
                cbpStickyFilter.update();

                // initialization of aos
                AOS.init({
                    duration: 650,
                    once: true
                });
            });

            $('.cbp').on('filterComplete.cbp', function() {
                // update sticky block
                cbpStickyFilter.update();

                // initialization of aos
                AOS.init({
                    duration: 650,
                    once: true
                });
            });

            $('.cbp').on('pluginResize.cbp', function() {
                // update sticky block
                cbpStickyFilter.update();
            });

            // animated scroll to cbp container
            $('#cbpStickyFilter').on('click', '.cbp-filter-item', function (e) {
                $('html, body').stop().animate({
                    scrollTop: $('#demoExamplesSection').offset().top
                }, 200);
            });

            // initialization of go to
            $('.js-go-to').each(function () {
                var goTo = new HSGoTo($(this)).init();
            });
        });
    </script>
        <!-- IE Support -->
    <script>
        if (/MSIE \d|Trident.*rv:/.test(navigator.userAgent)) document.write('<script src="assets/vendor/polifills.js"><\/script>');
    </script>
</body>
</html>
