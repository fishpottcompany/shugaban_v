<?php 

// CALLING CONFIG FILE
require_once("app/config.php");

// CALLING MODELS
include_once "app/Models/MessageModel.php";

//CALLING CONTROLLERS
include_once "app/Controllers/DatabaseController.php";
include_once "app/Controllers/QueryController.php";
include_once "app/Controllers/MessageController.php";


// MAKING INSTANCES OF MODELS
$messageModelObject = new Message();

// MAKING INSTANCES OF CONTROLLERS 
$queryController = new QueryController();
$messageController = new MessageController();

// OTHER VARIABLE AND OBJECTS
$mysqli = new mysqli(HOST, USER, USER_PASSWORD, DATABASE_NAME);



// CREATING PREPARED STATEMENT QUERY OBJECT
$query = $queryController->prepareAndExecuteQuery($mysqli, "SELECT id, name, cover, portrait, url FROM " . MOVIES_TABLE . " ORDER BY recommendation_date DESC LIMIT 4", 0, "", "");
if($query === false){
    $messageModelObject->error_exist = false;
    $messageModelObject->body = "Fetching last 3 movies failed";
    $messageController->show_messge(ARE_WE_USING_LIVE_MODE, $messageModelObject, false);
}

// GETTING RESULTS
$query_results_array = $queryController->getQueryResults($query, array("id", "name", "cover", "portrait", "url"), 5, 2);


$page_title = "Shugaban - Home Of Quality Nollywood Entertainment";
include('assets/inc/header.php');
?>


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
                                <a href="../single-movies/single-movies-v2.html" class="btn btn-outline-shugaban ml-md-4 px-6 py-3d btn-sm">PREVIEW</a>
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
                $query = $queryController->prepareAndExecuteQuery($mysqli, "SELECT name, landscape_cover FROM " . MOVIES_TABLE . " ORDER BY recommendation_date DESC LIMIT 4", 0, "", "");
                if($query === false){
                    $messageModelObject->error_exist = false;
                    $messageModelObject->body = "Fetching last 3 movies failed";
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
                        <img class="img-fluid" style="width:180px; height:108;" src="<?php echo MOVIE_POSTER_LANDSCAPES_FOLDER . $landscape_cover; ?>" alt="<?php $name; ?>">
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
                            $query = $queryController->prepareAndExecuteQuery($mysqli, "SELECT id, name, portrait, year, category_id FROM " . MOVIES_TABLE . " ORDER BY views DESC LIMIT 12", 0, "", "");
                            if($query === false){
                                $messageModelObject->error_exist = false;
                                $messageModelObject->body = "Fetching last 5 movies failed";
                            }
                            
                            // GETTING RESULTS
                            $query_results_array = $queryController->getQueryResults($query, array("id", "name", "portrait", "year", "category_id"), 1, 2);
                            
                            //BINDING THE RESULTS TO VARIABLES
                            $query_results_array->bind_result($id, $name, $portrait, $year, $category_id);

                            // GETTING THE QUERY RESULTS INTO THE RESPONSE ARRAY
                            $i = 0;
                            while($query_results_array->fetch()){
                                //echo "<br><br>Movie Name: " . $name;
                                //echo "<br>Movie URL: " . $url;
                                //echo "<br>Movie portrait: " . $portrait;
                                //echo "<br>category_id: " . $category_id;
                                if(intval($category_id) > 0){
                                    //echo "<br>category_id: " . $category_id;

                                    $mysqli2 = new mysqli(HOST, USER, USER_PASSWORD, DATABASE_NAME);
                                    $query2 = $queryController->prepareAndExecuteQuery($mysqli2, "SELECT name FROM " . CATEGORIES_FOR_MOVIES_TABLE . " WHERE id = ?", 1, "i", array(intval($category_id)));
                                    if($query2 === false){
                                        $messageModelObject->error_exist = false;
                                        $messageModelObject->body = "Failed getting category";
                                        $messageController->show_messge(ARE_WE_USING_LIVE_MODE, $messageModelObject, false);
                                        $category_name = "";
                                    } else {
                                        // GETTING RESULTS
                                        $query_results_array2 = $queryController->getQueryResults($query2, array("name"), 1, 1);
        
                                        if($query_results_array2 === false || (isset($query_results_array2[0]) && $query_results_array2[0] == "name")){
                                            //echo "category_name: FAILED";
                                            $category_name = "";
                                        } else {
                                            $category_name = $query_results_array2[0];
                                        }
                                    }
                                } else {
                                    $category_name = "";
                                }
                                
                                if($i < 5){
                            ?>
                            <div class="col mb-5 mb-xl-0">
                                <div class="product">
                                    <div class="product-image mb-2">
                                        <a href="../single-movies/single-movies-v2.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="<?php echo MOVIE_POSTER_PORTRAIT_FOLDER . $portrait; ?>" alt="Image Description"></a>
                                    </div>
                                    <div class="product-meta font-size-12 mb-1">
                                        <span><a href="../single-movies/single-movies-v2.html" class="h-g-primary"><?php echo $year; ?></a></span>
                                        <span><a href="../single-movies/single-movies-v2.html" class="h-g-primary"><?php echo $category_name; ?></a></span>
                                    </div>
                                    <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v2.html"><?php echo $name; ?></a></div>
                                </div>
                            </div>
                            <?php }
                                $i++;
                                if($i == 5){
                            ?>
                                        </div>
                                    </div>
                                </div>

                            <div class="row row-cols-md-5 row-cols-xl">
                            <?php }  if($i > 5){?>
                            <div class="col-6 col-xl mb-5 mb-xl-0">
                                <div class="product">
                                    <div class="product-image mb-2">
                                        <a href="../single-movies/single-movies-v2.html" class="d-inline-block position-relative stretched-link">
                                            <span class="position-absolute px-2d line-height-lg bg-primary rounded content-centered-x z-index-2 mt-n2 text-white font-size-12">Featured</span>
                                            <img class="img-fluid" src="<?php echo MOVIE_POSTER_PORTRAIT_FOLDER . $portrait; ?>" alt="Image Description">
                                        </a>
                                    </div>
                                    <div class="product-meta font-size-12 mb-1">
                                        <span><a href="../single-movies/single-movies-v2.html" class="h-g-primary"><?php echo $year; ?></a></span>
                                        <span><a href="../single-movies/single-movies-v2.html" class="h-g-primary"><?php echo $category_name; ?></a></span>
                                    </div>
                                    <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v2.html"><?php echo $name; ?></a></div>
                                </div>
                            </div>
                            
                            <?php 
                                }
                            }
                            
                            ?>
                    
                </div>
            </div>
            <div class="space-1 position-relative d-flex">
                <button class="btn btn-shugaban mx-auto px-7 py-3 font-size-1 z-index-2 font-weight-medium font-secondary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    + View more
                </button>
                <div class="border-top content-centered w-100 border-gray-1400"></div>
            </div>
        </section>
        <!-- End movie aside header -->

        <!-- movies carousel aside header -->
        <section class="bg-shugaban-1500 space-2">
            <div class="container px-md-4">
                <!-- Nav -->
                <div class="text-center tab-nav__v1">
                    <ul class="nav mb-7" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link activeblack" id="pills-one-code-features-example2-tab" data-toggle="pill" href="#pills-one-code-features-example2" role="tab" aria-controls="pills-one-code-features-example2" aria-selected="true">New Releases</a>
                        </li>
                    </ul>
                </div>
                <!-- End Nav -->

                <!-- Tab Content -->
                
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

                            <?php 
                            $query = $queryController->prepareAndExecuteQuery($mysqli, "SELECT id, name, portrait, year, category_id FROM " . MOVIES_TABLE . " ORDER BY created_at DESC LIMIT 12", 0, "", "");
                            if($query === false){
                                $messageModelObject->error_exist = false;
                                $messageModelObject->body = "Fetching last 5 movies failed";
                            }
                            
                            // GETTING RESULTS
                            $query_results_array = $queryController->getQueryResults($query, array("id", "name", "portrait", "year", "category_id"), 1, 2);
                            
                            //BINDING THE RESULTS TO VARIABLES
                            $query_results_array->bind_result($id, $name, $portrait, $year, $category_id);

                            // GETTING THE QUERY RESULTS INTO THE RESPONSE ARRAY
                            $i = 0;
                            while($query_results_array->fetch()){
                                //echo "<br><br>Movie Name: " . $name;
                                //echo "<br>Movie URL: " . $url;
                                //echo "<br>Movie portrait: " . $portrait;
                                //echo "<br>category_id: " . $category_id;
                                if(intval($category_id) > 0){
                                    //echo "<br>category_id: " . $category_id;

                                    $mysqli2 = new mysqli(HOST, USER, USER_PASSWORD, DATABASE_NAME);
                                    $query2 = $queryController->prepareAndExecuteQuery($mysqli2, "SELECT name FROM " . CATEGORIES_FOR_MOVIES_TABLE . " WHERE id = ?", 1, "i", array(intval($category_id)));
                                    if($query2 === false){
                                        $messageModelObject->error_exist = false;
                                        $messageModelObject->body = "Failed getting category";
                                        $messageController->show_messge(ARE_WE_USING_LIVE_MODE, $messageModelObject, false);
                                        $category_name = "";
                                    } else {
                                        // GETTING RESULTS
                                        $query_results_array2 = $queryController->getQueryResults($query2, array("name"), 1, 1);
        
                                        if($query_results_array2 === false || (isset($query_results_array2[0]) && $query_results_array2[0] == "name")){
                                            //echo "category_name: FAILED";
                                            $category_name = "";
                                        } else {
                                            $category_name = $query_results_array2[0];
                                        }
                                    }
                                } else {
                                    $category_name = "";
                                }
                                $i++;
                            ?>
                                <div class="product">
                                    <div class="product-image mb-2">
                                        <a href="../single-movies/single-movies-v3.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="<?php echo MOVIE_POSTER_PORTRAIT_FOLDER . $portrait; ?>" alt="Image Description"></a>
                                    </div>
                                    <div class="product-meta font-size-12 mb-1">
                                        <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary"><?php echo $year; ?></a></span>
                                        <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary"><?php echo $category_name; ?></a></span>
                                    </div>
                                    <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v3.html"><?php echo $name; ?></a></div>
                                </div>
                            <?php 
                                }
                            ?>

                                </div>
                            </div>
                            <div class="col-md-5 col-lg-4 col-xl-3 d-flex">
                                <header class="max-w-370 mt-auto mb-xl-8 title-dash">
                                    <h3 class="display-7 mb-3 font-weight-semi-bold">New<br>Releases</h3>
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
                <!-- End Tab Content -->
            </div>
        </section>
        <!-- End movies carousel aside header -->

        <!-- featured-movie -->
        <?php
            $mysqli2 = new mysqli(HOST, USER, USER_PASSWORD, DATABASE_NAME);
            $query2 = $queryController->prepareAndExecuteQuery($mysqli2, "SELECT id, name, landscape_cover, year, category_id, plot FROM " . MOVIES_TABLE . " ORDER BY recommendation_date2 DESC LIMIT 1", 0, "", array());
            if($query2 === false){
                $messageModelObject->error_exist = false;
                $messageModelObject->body = "Failed getting category";
                $messageController->show_messge(ARE_WE_USING_LIVE_MODE, $messageModelObject, false);
                $category_name = "";
            } else {
                // GETTING-RESULTS
                $query_results_array2 = $queryController->getQueryResults($query2, array("id", "name", "landscape_cover", "year", "category_id", "plot"), 6, 1);

                if($query_results_array2 === false || (isset($query_results_array2[0]) && $query_results_array2[0] == "id")){
                    $category_name = "";
                } else {
        ?>
        
        <div class="bg-img-hero space-3" style="background-image: url(<?php echo MOVIE_POSTER_LANDSCAPES_FOLDER . $query_results_array2[2]; ?>);">
            <div class="container px-md-4">
                <div class="row">
                    <div class="col-lg-6 col-xl-5">
                        <div class="">
                            <img class="img-fluid mb-6 d-block" src="assets/img/188x60/img1.png" alt="Image Description">
                            <a href="../single-movies/single-movies-v4.html" class="display-8 h-w-primary d-inline-block font-secondary mb-6"><?php echo $name; ?></a>
                            <p class="text-gray-1800 mb-6 font-secondary d-block font-size-1 font-weight-medium"><?php echo $plot; ?></p>
                            <div class="d-md-flex">
                                <a href="../single-movies/single-movies-v3.html" class="btn btn-shugaban px-6 py-3d btn-sm mb-3 mb-md-0" tabindex="0">WATCH NOW</a>
                                <a href="../single-movies/single-movies-v3.html" class="btn btn-outline-shugaban ml-md-4 px-6 py-3d btn-sm" tabindex="0">PREVIEW</a>
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

        <?php
                }
            }
        ?>

        <!-- movies carousel aside header -->
        <section class="bg-gray-2000 dark space-2">
            <div class="container px-md-4">
                <!-- Nav -->
                <div class="text-center tab-nav__v1">
                    <ul class="nav mb-7" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-one-code-features-example2-tab-11" data-toggle="pill" href="#pills-one-code-features-example2-11" role="tab" aria-controls="pills-one-code-features-example2-11" aria-selected="true">Action Drama</a>
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
                                    <h3 class="h-w-primary display-7 mb-3 font-weight-semi-bold">Action<br> Drama</h3>
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

                            <?php 
                            $query = $queryController->prepareAndExecuteQuery($mysqli, "SELECT id, name, portrait, year, plot FROM " . MOVIES_TABLE . " WHERE category_id = ? ORDER BY created_at DESC LIMIT 6", 1, "i", array(20));
                            if($query === false){
                                $messageModelObject->error_exist = false;
                                $messageModelObject->body = "Fetching last 5 movies failed";
                            }
                            
                            // GETTING RESULTS
                            $query_results_array = $queryController->getQueryResults($query, array("id", "name", "portrait", "year", "plot"), 1, 2);
                            
                            //BINDING THE RESULTS TO VARIABLES
                            $query_results_array->bind_result($id, $name, $portrait, $year, $plot);

                            // GETTING THE QUERY RESULTS INTO THE RESPONSE ARRAY
                            while($query_results_array->fetch()){
                                //echo "<br><br>Movie Name: " . $name;
                                //echo "<br>Movie URL: " . $url;
                                //echo "<br>Movie portrait: " . $portrait;
                                //echo "<br>category_id: " . $category_id;
                            ?>
                                    <div class="product">
                                        <div class="product-image mb-2">
                                            <a href="../single-movies/single-movies-v3.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="<?php echo MOVIE_POSTER_PORTRAIT_FOLDER . $portrait; ?>" alt="Image Description"></a>
                                        </div>
                                        <div class="product-meta font-size-12 mb-1">
                                            <span><a href="../single-movies/single-movies-v3.html" class="h-g-primary"><?php echo $year; ?></a></span>
                                        </div>
                                        <div class="product-title font-weight-bold font-size-1"><a href="../single-movies/single-movies-v3.html"><?php echo $name; ?></a></div>
                                    </div>

                            <?php 
                                }
                            ?>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- End Tab Content -->
            </div>
        </section>
        <!-- End movies carousel aside header -->

    </main>
    <!-- ========== END MAIN CONTENT ========== -->

<?php include('assets/inc/footer.php') ?>