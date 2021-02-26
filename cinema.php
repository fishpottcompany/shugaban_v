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


$page_title = "Shugaban - Home Of Quality Nollywood Entertainment";
include('assets/inc/header.php');
?>


    <!-- ========== MAIN CONTENT ========== -->
    <main id="content">
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
                            <br><br><br>
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

        <!-- End movies carousel aside header -->

    </main>
    <!-- ========== END MAIN CONTENT ========== -->

<?php include('assets/inc/footer.php') ?>