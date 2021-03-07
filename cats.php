<?php 
session_start();
// CALLING CONFIG FILE
require_once("app/config.php");

// CALLING MODELS
include_once "app/Models/MessageModel.php";

//CALLING CONTROLLERS
include_once "app/Controllers/DatabaseController.php";
include_once "app/Controllers/QueryController.php";
include_once "app/Controllers/MessageController.php";
include_once "app/Controllers/UtilController.php";


// MAKING INSTANCES OF MODELS
$messageModelObject = new Message();

// MAKING INSTANCES OF CONTROLLERS 
$queryController = new QueryController();
$messageController = new MessageController();
$utilController = new UtilController();

// OTHER VARIABLE AND OBJECTS
$mysqli = new mysqli(HOST, USER, USER_PASSWORD, DATABASE_NAME);
$last_created_at = "0";

if(isset($_GET["pback"]) && trim($_GET["pback"]) != ""){
    $pback_first_created_at = trim($_GET["pback"]);
}
if(isset($_GET["s"]) && intval($_GET["s"]) > 0){
    $nex_pg_keyword = "s=" . strval(intval($_GET["s"]))  . "&";
    $keyword = strval(intval($_GET["s"]));
    if(isset($_GET["pll"]) && trim($_GET["pll"]) != ""){
        $max_created_at = trim($_GET["pll"]);
        $added_condition = " AND created_at <= ? ";
        $query = $queryController->prepareAndExecuteQuery($mysqli, "SELECT id, name, portrait, year, category_id, plot, views, created_at FROM " . MOVIES_TABLE . " WHERE category_id = ? " . $added_condition . " ORDER by created_at DESC LIMIT 6", 2, "is", array($keyword, $max_created_at));

    } else {
        $max_created_at = "";
        $added_condition = "";
        $query = $queryController->prepareAndExecuteQuery($mysqli, "SELECT id, name, portrait, year, category_id, plot, views, created_at FROM " . MOVIES_TABLE . " WHERE category_id = ? " . $added_condition . " ORDER by created_at DESC LIMIT 6", 1, "i", array($keyword));
    }
} else {
    $nex_pg_keyword = "";
    if(isset($_GET["pll"]) && intval($_GET["pll"]) != ""){
        $max_created_at = trim($_GET["pll"]);
        $added_condition = " WHERE created_at <= ?";
        $query = $queryController->prepareAndExecuteQuery($mysqli, "SELECT id, name, portrait, year, category_id, plot, views, created_at FROM " . MOVIES_TABLE . " " . $added_condition . "   ORDER by created_at DESC LIMIT 6", 1, "s", array($max_created_at));

    } else {
        $max_created_at = "";
        $added_condition = "";
        $query = $queryController->prepareAndExecuteQuery($mysqli, "SELECT id, name, portrait, year, category_id, plot, views, created_at FROM " . MOVIES_TABLE . " ORDER by created_at DESC LIMIT 6", 0, "", "");
    }
}


$page_title = "Search";
include('assets/inc/header.php');
?>



    <!-- ========== MAIN CONTENT ========== -->
    <main id="content">
        <div class="bg-black-1 dark">
            <div class="container px-md-5">
                <br>
                <div class="row">
                    <div class="col-lg-auto d-none d-xl-block">
                        <div class="w-md-352rem space-bottom-2">
                            <div class="bg-shugaban-1500 px-3 py-4 mb-4">
                                <div class="mx-1 mb-1">
                                    <div class="mb-6">
                                        <!-- Categories -->
                                        <h6 class="font-size-22 font-weight-medium border-bottom border-gray-3700 pb-2 mb-5 text-black"> Categories</h6>
                                        <div class="row mb-4 pb-1">

                                        <?php 
                                            $error = false;
                                            $mysqli3 = new mysqli(HOST, USER, USER_PASSWORD, DATABASE_NAME);
                                            $query3 = $queryController->prepareAndExecuteQuery($mysqli3, "SELECT COUNT(*) FROM " . CATEGORIES_FOR_MOVIES_TABLE, 0, "", "");
                                            if($query3 === false){
                                                $messageModelObject->error_exist = false;
                                                $messageModelObject->body = "Failed getting count category";
                                                $messageController->show_messge(ARE_WE_USING_LIVE_MODE, $messageModelObject, false);
                                                $error = true;
                                            } 
                                        
                                            // GETTING-RESULTS
                                            $query_results_array3 = $queryController->getQueryResults($query3, array("COUNT(*)"), 1, 1);
                                        
                                            if($query_results_array3 === false || (isset($query_results_array3[0]) && $query_results_array3[0] == "COUNT(*)")){
                                                $error = true;
                                            } 

                                            $mysqli2 = new mysqli(HOST, USER, USER_PASSWORD, DATABASE_NAME);
                                            $query2 = $queryController->prepareAndExecuteQuery($mysqli2, "SELECT name, id FROM " . CATEGORIES_FOR_MOVIES_TABLE . " LIMIT 16", 0, "", "");
                                            if($query2 === false){
                                                $messageModelObject->error_exist = false;
                                                $messageModelObject->body = "Failed fetching categories for footer";
                                            }
                                            
                                            // GETTING RESULTS
                                            $query_results_array2 = $queryController->getQueryResults($query2, array("name", "id"), 2, 2);
                                            
                                            //BINDING THE RESULTS TO VARIABLES
                                            $query_results_array2->bind_result($name, $id);

                                            // GETTING THE QUERY RESULTS INTO THE RESPONSE ARRAY
                                            $i = 0;
                                            while($query_results_array2->fetch()){
                                                //echo "<br><br>Movie Name: " . $name;
                                            ?>
                                            <?php if($i == 0){ ?>

                                                <div class="col-md">
                                                <ul class="list-unstyled mb-0">

                                            <?php } ?>
                                            <li class="mb-1" style="cursor: pointer;">
                                                <div class="d-flex align-items-center" style="cursor: pointer;">
                                                    <!-- Checkboxes -->
                                                    <a class="custom-control custom-checkbox" href="cats?s=<?php echo $id ?>" style="cursor: pointer;">
                                                    
                                                      <label class="custom-control-label custom-control-label-custom" style="color: black; cursor: pointer;" for="action">
                                                      <?php if($keyword == $id){ ?>
                                                       <b>
                                                      <?php echo $name ?>
                                                      </b>
                                                      <?php } else { ?>
                                                      <?php echo $name ?>
                                                      <?php } ?>
                                                    </label>
                                                    </a>
                                                </div>
                                            </li>
                                            <?php if(!$error && $query_results_array3[0] > 1 && $i == ($query_results_array3[0]/2)){ ?>

                                                </ul>
                                            </div>
                                            <div class="col-md">
                                                <ul class="list-unstyled mb-0">
                                            <? } ?>

                                            <?php if($i == $query_results_array3[0]){ ?>

                                                </ul>
                                            </div>

                                            <?php } ?>

                                            <?php 
                                                $i++;}
                                            ?>
                                            </div>
                                        </div>
                                        <!-- End Categories -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg">
                        <section>
                            <div class="mb-4">
                                <div class="home-section mb-5">
                                    <header class="d-md-flex align-items-center justify-content-between mb-3 mb-lg-1 pb-2 w-100 border-bottom border-gray-3900">
                                        <h6 class="d-block position-relative font-size-24 font-weight-medium overflow-md-hidden m-0 text-white">Movies</h6>
                                    </header>
                                    <div class="d-xl-flex align-items-center justify-content-between">
                                        <div class="d-xl-flex align-items-center">
                                            <div class="d-flex align-items-center ml-auto">
                                                <!-- Unfold (Sidebar) -->
                                                <div class="hs-unfold d-xl-none">
                                                    <a class="js-hs-unfold-invoker text-white font-weight-bold" href="javascript:;"
                                                        data-hs-unfold-options='{
                                                            "target": "#sidebarContent-menu",
                                                            "type": "css-animation",
                                                            "animationIn": "fadeInLeft",
                                                            "animationOut": "fadeOutLeft",
                                                            "hasOverlay": "rgba(55, 125, 255, 0.1)",
                                                            "smartPositionOff": true
                                                        }'><i class="fas fa-sliders-h"></i><span class="ml-2 font-secondary">FILTERS</span>
                                                    </a>
                                                </div>
                                                <!-- End Unfold (Sidebar) -->

                                                <!-- Sidebar Navigation -->
                                                <aside id="sidebarContent-menu" class="hs-unfold-content sidebar sidebar-left">
                                                    <div class="sidebar-scroller bg-gray-3100">
                                                        <div class="sidebar-container">
                                                            <div class="sidebar-footer-offset" style="padding-bottom: 7rem;">
                                                                <!-- Toggle Button -->
                                                                <div class="d-flex justify-content-end align-items-center pt-4 px-4">
                                                                    <div class="hs-unfold">
                                                                        <a class="js-hs-unfold-invoker btn btn-icon btn-xs btn-soft-secondary" href="javascript:;"
                                                                            data-hs-unfold-options='{
                                                                                "target": "#sidebarContent-menu",
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
                                                                    <div class="sidebar-content py-4 px-3">
                                                                        <div class="bg-gray-3100">
                                                                            <div class="sidebar-area">
                                                                                <div class="mx-1 mb-1">
                                                                                    <div class="mb-6">
                                                                                        <!-- Categories -->
                                                                                        <h6 class="font-size-22 font-weight-medium border-bottom border-gray-3700 pb-2 mb-5 text-white"> Categories</h6>
                                                                                        <div class="row mb-4 pb-1">
                                                                                            <div class="col-md">
                                                                                                <ul class="list-unstyled mb-0">
                                                                                                    <li class="mb-1">
                                                                                                        <div class="d-flex align-items-center">
                                                                                                            <!-- Checkboxes -->
                                                                                                            <div class="custom-control custom-checkbox">
                                                                                                              <input type="checkbox" class="custom-control-input" id="Action">
                                                                                                              <label class="custom-control-label custom-control-label-custom text-gray-1800" for="Action">Action</label>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </li>
                                                                                                    <li class="mb-1">
                                                                                                        <div class="d-flex align-items-center">
                                                                                                            <!-- Checkboxes -->
                                                                                                            <div class="custom-control custom-checkbox">
                                                                                                              <input type="checkbox" class="custom-control-input" id="Adventures">
                                                                                                              <label class="custom-control-label custom-control-label-custom text-gray-1800" for="Adventures">Adventures</label>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </li>
                                                                                                    <li class="mb-1">
                                                                                                        <div class="d-flex align-items-center">
                                                                                                            <!-- Checkboxes -->
                                                                                                            <div class="custom-control custom-checkbox">
                                                                                                              <input type="checkbox" class="custom-control-input" id="Animation">
                                                                                                              <label class="custom-control-label custom-control-label-custom text-gray-1800" for="Animation">Animation</label>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </li>
                                                                                                    <li class="mb-1">
                                                                                                        <div class="d-flex align-items-center">
                                                                                                            <!-- Checkboxes -->
                                                                                                            <div class="custom-control custom-checkbox">
                                                                                                              <input type="checkbox" class="custom-control-input" id="Bio">
                                                                                                              <label class="custom-control-label custom-control-label-custom text-gray-1800" for="Bio">Biography</label>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </li>
                                                                                                    <li class="mb-1">
                                                                                                        <div class="d-flex align-items-center">
                                                                                                            <!-- Checkboxes -->
                                                                                                            <div class="custom-control custom-checkbox">
                                                                                                              <input type="checkbox" class="custom-control-input" id="Comedy">
                                                                                                              <label class="custom-control-label custom-control-label-custom text-gray-1800" for="Comedy">Comedy</label>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </li>
                                                                                                    <li class="mb-1">
                                                                                                        <div class="d-flex align-items-center">
                                                                                                            <!-- Checkboxes -->
                                                                                                            <div class="custom-control custom-checkbox">
                                                                                                              <input type="checkbox" class="custom-control-input" id="Crime">
                                                                                                              <label class="custom-control-label custom-control-label-custom text-gray-1800" for="Crime">Crime</label>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </li>
                                                                                                    <li class="mb-1">
                                                                                                        <div class="d-flex align-items-center">
                                                                                                            <!-- Checkboxes -->
                                                                                                            <div class="custom-control custom-checkbox">
                                                                                                              <input type="checkbox" class="custom-control-input" id="Doc">
                                                                                                              <label class="custom-control-label custom-control-label-custom text-gray-1800" for="Doc">Documentary</label>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </li>
                                                                                                    <li class="mb-1">
                                                                                                        <div class="d-flex align-items-center">
                                                                                                            <!-- Checkboxes -->
                                                                                                            <div class="custom-control custom-checkbox">
                                                                                                              <input type="checkbox" class="custom-control-input" id="Drama">
                                                                                                              <label class="custom-control-label custom-control-label-custom text-gray-1800" for="Drama">Drama</label>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </li>
                                                                                                    <li class="mb-1">
                                                                                                        <div class="d-flex align-items-center">
                                                                                                            <!-- Checkboxes -->
                                                                                                            <div class="custom-control custom-checkbox">
                                                                                                              <input type="checkbox" class="custom-control-input" id="Family">
                                                                                                              <label class="custom-control-label custom-control-label-custom text-gray-1800" for="Family">Family</label>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </li>
                                                                                                    <li class="mb-1">
                                                                                                        <div class="d-flex align-items-center">
                                                                                                            <!-- Checkboxes -->
                                                                                                            <div class="custom-control custom-checkbox">
                                                                                                              <input type="checkbox" class="custom-control-input" id="Fantasy">
                                                                                                              <label class="custom-control-label custom-control-label-custom text-gray-1800" for="Fantasy">Fantasy</label>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </li>
                                                                                                </ul>
                                                                                            </div>
                                                                                            <div class="col-md">
                                                                                                <ul class="list-unstyled mb-0">
                                                                                                    <li class="mb-1">
                                                                                                        <div class="d-flex align-items-center">
                                                                                                            <!-- Checkboxes -->
                                                                                                            <div class="custom-control custom-checkbox">
                                                                                                              <input type="checkbox" class="custom-control-input" id="History">
                                                                                                              <label class="custom-control-label custom-control-label-custom text-gray-1800" for="History">History</label>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </li>
                                                                                                    <li class="mb-1">
                                                                                                        <div class="d-flex align-items-center">
                                                                                                            <!-- Checkboxes -->
                                                                                                            <div class="custom-control custom-checkbox">
                                                                                                              <input type="checkbox" class="custom-control-input" id="Horror">
                                                                                                              <label class="custom-control-label custom-control-label-custom text-gray-1800" for="Horror">Horror</label>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </li>
                                                                                                    <li class="mb-1">
                                                                                                        <div class="d-flex align-items-center">
                                                                                                            <!-- Checkboxes -->
                                                                                                            <div class="custom-control custom-checkbox">
                                                                                                              <input type="checkbox" class="custom-control-input" id="Music">
                                                                                                              <label class="custom-control-label custom-control-label-custom text-gray-1800" for="Music">Music</label>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </li>
                                                                                                    <li class="mb-1">
                                                                                                        <div class="d-flex align-items-center">
                                                                                                            <!-- Checkboxes -->
                                                                                                            <div class="custom-control custom-checkbox">
                                                                                                              <input type="checkbox" class="custom-control-input" id="Mystery">
                                                                                                              <label class="custom-control-label custom-control-label-custom text-gray-1800" for="Mystery">Mystery</label>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </li>
                                                                                                    <li class="mb-1">
                                                                                                        <div class="d-flex align-items-center">
                                                                                                            <!-- Checkboxes -->
                                                                                                            <div class="custom-control custom-checkbox">
                                                                                                              <input type="checkbox" class="custom-control-input" id="Romance">
                                                                                                              <label class="custom-control-label custom-control-label-custom text-gray-1800" for="Romance">Romance</label>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </li>
                                                                                                    <li class="mb-1">
                                                                                                        <div class="d-flex align-items-center">
                                                                                                            <!-- Checkboxes -->
                                                                                                            <div class="custom-control custom-checkbox">
                                                                                                              <input type="checkbox" class="custom-control-input" id="Sci">
                                                                                                              <label class="custom-control-label custom-control-label-custom text-gray-1800" for="Sci">Sci-Fi</label>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </li>
                                                                                                    <li class="mb-1">
                                                                                                        <div class="d-flex align-items-center">
                                                                                                            <!-- Checkboxes -->
                                                                                                            <div class="custom-control custom-checkbox">
                                                                                                              <input type="checkbox" class="custom-control-input" id="Sports">
                                                                                                              <label class="custom-control-label custom-control-label-custom text-gray-1800" for="Sports">Sports</label>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </li>
                                                                                                    <li class="mb-1">
                                                                                                        <div class="d-flex align-items-center">
                                                                                                            <!-- Checkboxes -->
                                                                                                            <div class="custom-control custom-checkbox">
                                                                                                              <input type="checkbox" class="custom-control-input" id="Thriller">
                                                                                                              <label class="custom-control-label custom-control-label-custom text-gray-1800" for="Thriller">Thriller</label>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </li>
                                                                                                </ul>
                                                                                            </div>
                                                                                        </div>
                                                                                        <!-- End Categories -->
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- End Content -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </aside>
                                                <!-- End Sidebar Navigation -->

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-content dark mb-4">
                                <div class="tab-pane fade show active" id="pills-one-example1" role="tabpanel" aria-labelledby="pills-one-example1-tab">
                                   

                                    <?php 

                            if($query === false){
                                $messageModelObject->error_exist = false;
                                $messageModelObject->body = "Fetching last 5 movies failed";
                            }
                            
                            // GETTING RESULTS 
                            $query_results_array = $queryController->getQueryResults($query, array("id", "name", "portrait", "year", "category_id", "plot", "views", "created_at"), 1, 8);
                            
                            //BINDING THE RESULTS TO VARIABLES
                            $query_results_array->bind_result($id, $name, $portrait, $year, $category_id, $plot, $views, $created_at);

                            // GETTING THE QUERY RESULTS INTO THE RESPONSE ARRAY
                            $rows_count = 0;
                            while($query_results_array->fetch()){
                                //echo "<br><br>Movie Name: " . $name;
                                //echo "<br>Movie URL: " . $url;
                                //echo "<br>Movie portrait: " . $portrait;
                                //echo "<br>category_id: " . $category_id;
                                if(intval($category_id) > 0){
                                    //echo "<br>name: " . $name;

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
                                $last_created_at = $created_at;

                                if($rows_count == 0){
                                    $first_created_at = $created_at;
                                }
                            ?>

                                <div class="product h-btn-show dark">
                                        <div class="row no-gutters border-bottom border-gray-3800 py-4">
                                            <div class="col-md-2">
                                                <div class="product-image mb-2 mb-md-0">
                                                    <a href="../single-movies/single-movies-v1.html" class="d-inline-block position-relative stretched-link"><img class="img-fluid" src="<?php echo MOVIE_POSTER_PORTRAIT_FOLDER . $portrait; ?>" alt="Image Description"></a>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="px-md-4d mt-2d">
                                                    <div class="product-meta font-size-12">
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0"><?php echo $year; ?></a></span>
                                                        <span><a href="../single-movies/single-movies-v1.html" class="h-g-primary" tabindex="0"><?php echo $category_name; ?></a></span>
                                                    </div>
                                                    <div class="font-size-17 font-weight-bold mb-2 product-title d-inline-block">
                                                        <a href="../single-movies/single-movies-v1.html"><?php echo $name; ?></a>
                                                    </div>
                                                    <p class="font-size-1 line-clamp-1 text-gray-1300 mb-7"><?php echo $plot; ?></p>
                                                    <div class="d-md-flex">
                                                        <a href="../single-movies/single-movies-v1.html" class="btn btn-shugaban d-flex align-items-center justify-content-center mb-3 mb-md-0 font-size-12 px-3 h-44rem font-secondary mr-2" tabindex="0">
                                                            <span class="mx-1">WATCH NOW</span>
                                                        </a>
                                                        <a href="../single-movies/single-movies-v1.html" class="btn btn-outline-shugaban d-flex align-items-center justify-content-center mb-3 mb-md-0 font-size-12 px-3 h-44rem font-secondary" tabindex="0">
                                                            <span class="mx-1">PREVIEW</span>
                                                        </a>

                                                    </div>
                                                </div>
                                            </div>
                                                <?php if($views > VIEWS_TO_SHOW_THRESHOLD){ ?>
                                                    <div class="col-auto pr-3">
                                                        <div class="font-size-12 text-gray-1300 text-center text-lh-1">
                                                            <span><?php echo $utilController->number_format_short($views); ?><br>Views</span>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                        </div>
                                    </div>
                            <?php 
                                $rows_count++;}
                            ?>
                                </div>
                            </div>

                                <div style="float: right;">
                                    <nav aria-label="Page navigation example">
                                            
                                        <ul class="pagination custom-pagination-dark justify-content-center justify-content-md-start mb-0">
                                        <?php if(isset($pback_first_created_at) && $pback_first_created_at != "") { ?>
                                        <li class="page-item active"><a class="page-link" href="search.php?<?php echo $nex_pg_keyword ?>pll=<?php echo rawurlencode($pback_first_created_at); ?>&pback=<?php echo rawurlencode($pback_first_created_at); ?>">Previous Page <i class="fas fa-long-arrow-alt-left ml-2 font-size-11"></i></a></li>
                                        <?php } ?>
                                        <?php 
                                        
                                        if($rows_count > 5) { ?>
                                            
                                        <li class="page-item active"><a class="page-link" href="search.php?<?php echo $nex_pg_keyword ?>pll=<?php echo rawurlencode($last_created_at); ?>&pback=<?php echo rawurlencode($first_created_at); ?>">Next Page <i class="fas fa-long-arrow-alt-right ml-2 font-size-11"></i></a></li>      
                                        <?php } ?>
                                        <li style="display: none;" class="page-item"><a class="page-link" href="#">2</a></li>
                                            
                                        </ul>
                                    </nav>
                            <br>
                            <br>
                                </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- ========== END MAIN CONTENT ========== -->

    <?php include('assets/inc/footer_black.php') ?>