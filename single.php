<?php 
if(isset($_GET["v"]) && intval($_GET["v"]) > 0){
    $video_id = intval($_GET["v"]);
} else {
    $error = true;
}
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

$mysqli = new mysqli(HOST, USER, USER_PASSWORD, DATABASE_NAME);

if(!$error){
    // OTHER VARIABLE AND OBJECTS
    $mysqli2 = new mysqli(HOST, USER, USER_PASSWORD, DATABASE_NAME);
    $query2 = $queryController->prepareAndExecuteQuery($mysqli2, "SELECT id, name, landscape_cover, year, category_id, plot, portrait, length, views FROM " . MOVIES_TABLE . " ORDER BY recommendation_date2 DESC LIMIT 1", 0, "", array());
    if($query2 === false){
        $messageModelObject->error_exist = false;
        $messageModelObject->body = "Failed getting category";
        $messageController->show_messge(ARE_WE_USING_LIVE_MODE, $messageModelObject, false);
        $error = true;
    } 

    // GETTING-RESULTS
    $query_results_array2 = $queryController->getQueryResults($query2, array("id", "name", "landscape_cover", "year", "category_id", "plot", "portrait", "length", "views"), 9, 1);

    if($query_results_array2 === false || (isset($query_results_array2[0]) && $query_results_array2[0] == "id")){
        $error = true;
    } 
    
    if(!$error){
        $mysqli3 = new mysqli(HOST, USER, USER_PASSWORD, DATABASE_NAME);
        $query3 = $queryController->prepareAndExecuteQuery($mysqli3, "SELECT name FROM " . CATEGORIES_FOR_MOVIES_TABLE . " WHERE id = ?", 1, "i", array($query_results_array2[4]));
        if($query3 === false){
            $messageModelObject->error_exist = false;
            $messageModelObject->body = "Failed getting category";
            $messageController->show_messge(ARE_WE_USING_LIVE_MODE, $messageModelObject, false);
            $error = true;
        } 
    
        // GETTING-RESULTS
        $query_results_array3 = $queryController->getQueryResults($query3, array("name"), 1, 1);
    
        if($query_results_array3 === false || (isset($query_results_array3[0]) && $query_results_array3[0] == "name")){
            $error = true;
        } 
    
    }
    //var_dump($query_results_array2);
    //var_dump($query_results_array3);
}
    
$page_title = "Single";
include('assets/inc/header.php');
?>


    <!-- ========== MAIN CONTENT ========== -->
    <main id="content">
        <div class="bg-black-1 pb-5 pb-lg-10">
            <div class="container px-md-6 mb-2">
                <br>
                <div class="row">
                    <div class="col-lg mb-5 mb-lg-0">
                        <div id="fancyboxGallery">
                            <div>
                                <div>
                                    <div class="position-relative min-h-270rem mb-2d mr-xl-3">
                                        <iframe class="position-absolute w-100 h-lg-down-100 position-xl-relative top-0 bottom-0 border-0" height="620" src="https://www.youtube.com/embed/uFxwkToatSg" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-auto">
                        <div class="pl-2 max-w-35rem">
                            <div class="mb-5">
                                <img class="img-fluid" src="<?php echo MOVIE_POSTER_PORTRAIT_FOLDER . $query_results_array2[6]; ?>" alt="Image-Description">
                            </div>

                            <div class="mb-12" style="width: 100%;">
                                <a href="../single-movies/single-movies-v2.html"  style="width: 100%;" class="btn btn-shugaban px-6 py-3d btn-sm mb-3 mb-md-0">RENT</a>
                                <br><br>
                                <a href="../single-movies/single-movies-v2.html"  style="width: 100%;" class="btn btn-outline-shugaban px-6 py-3d btn-sm mb-3 mb-md-0">BUY</a>
                            </div>
                            <div class="mb-5" style="width: 100%;">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg mb-12 mb-lg-0">
                        <div id="fancyboxGallery">
                            <div>
                                <div>
                                    <div class="mb-7 pb-1">
                                        <div class="d-md-flex align-items-center justify-content-between mb-1">
                                            <div>
                                                <h6 class="font-size-24 h-w-primary font-weight-semi-bold font-secondary mb-3 mb-md-1"><?php echo $query_results_array2[1]; ?></h6>
                                                <ul class="list-unstyled nav nav-meta font-secondary mb-3 overflow-auto overflow-md-hidden flex-nowrap flex-md-wrap">
                                                    <li class="text-white flex-shrink-0 flex-shrink-md-1"><?php echo $query_results_array2[3]; ?></li>
                                                    <li class="text-white flex-shrink-0 flex-shrink-md-1"><?php echo $query_results_array2[7]; ?></li>
                                                    <li class="text-white flex-shrink-0 flex-shrink-md-1">
                                                        <a href="../single-movies/single-movies-v4.html" class="h-w-primary"><?php echo $query_results_array3[0]; ?></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="d-flex align-items-center mb-4 mb-md-0">

                                                <?php if($query_results_array2[8] > VIEWS_TO_SHOW_THRESHOLD){ ?>
                                                        <div class="d-flex">
                                                            <div>
                                                                <i class="fas fa-eye h-w-primary font-size-42"></i>
                                                            </div>
                                                            <div class="text-lh-1 ml-1">
                                                                <div class="h-w-primary font-size-24 font-weight-semi-bold"><?php echo $utilController->number_format_short($query_results_array2[8]); ?> </div>
                                                                <span class="text-gray-1300 font-size-12">Views</span>
                                                            </div>
                                                        </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-7">
                                        <div class="tab-nav__v10 mb-6">
                                            <ul class="nav overflow-auto overflow-md-hidden flex-nowrap flex-md-nowrap justify-content-md-center border-bottom border-gray-5300" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active h-w-primary" id="pills-one-code-features-example2-tab" data-toggle="pill" href="#pills-one-code-features-example2" role="tab" aria-controls="pills-two-code-features-example2" aria-selected="true">Description</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="tab-content">
                                            <div class="tab-pane fade show active" id="pills-one-code-features-example2" role="tabpanel" aria-labelledby="pills-one-code-features-example2-tab">
                                                <p class="text-gray-1300 mb-0 line-clamp-2 line-height-lg"><?php echo $query_results_array2[5]; ?></p>
                                                <div class="collapse" id="collapseLinkExample">
                                                    <p class="mb-0 text-gray-1300 line-height-lg">euismod rhoncus. Sed eu euismod felis. Aenean ullamcorper dapibus odio ac tempor. Aliquam iaculis, quam vitae imperdiet consectetur, mi ante semper metus, ac efficitur nisi justo ut eros.</p>
                                                </div>
                                                <a class="link-collapse d-flex justify-content-center collapsed" data-toggle="collapse" href="#collapseLinkExample" role="button" aria-expanded="false" aria-controls="collapseLinkExample">
                                                    <span class="link-collapse-default font-size-14"><i class="fas fa-chevron-down h-w-primary font-size-10 ml-1"></i></span>
                                                </a>
                                            </div>
                                            <div class="tab-pane fade" id="pills-two-code-features-example2" role="tabpanel" aria-labelledby="pills-two-code-features-example2-tab">
                                                <div class="home-section">
                                                    <header class="d-md-flex align-items-center justify-content-between mb-3 pb-1 w-100">
                                                        <h6 class="section-title-dark d-block position-relative font-size-18 font-weight-medium overflow-md-hidden m-0 text-white flex-grow-1">Add a review</h6>
                                                    </header>
                                                </div>
                                                <div class="text-gray-1300 mb-8">You must be
                                                    <a href="#">logged in</a> to post a review.
                                                </div>
                                                <div>
                                                    <div class="font-size-24 font-weight-medium font-secondary text-white mb-4">User Reviews</div>
                                                    <div>
                                                        <div class="d-flex mb-3 pb-1">
                                                            <div>
                                                                <img class="img-fluid rounded-circle" src="https://placehold.it/36x36" alt="Image-Description">
                                                            </div>
                                                            <div class="ml-3">
                                                                <div class="mb-2">
                                                                    <span class="text-primary">abu backer</span>
                                                                    <span class="text-gray-1300 ml-1">March 1, 2020</span>
                                                                </div>
                                                                <div class="form-group d-flex align-items-center justify-content-between font-size-15 text-gray-1300 text-lh-lg text-body mb-0">
                                                                    <span class="d-block text-gray-1300">
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="far fa-star"></i>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="text-white mb-2 pb-1">Nice Movie</div>
                                                        <div class="text-gray-1300">
                                                            <a href="#" class="text-gray-1300">
                                                                <i class="far fa-thumbs-up font-size-18"></i>
                                                            </a>
                                                            <span class="font-size-12 font-weight-semi-bold ml-1">0</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="pills-three-code-features-example2" role="tabpanel" aria-labelledby="pills-three-code-features-example2-tab">
                                                <div class="table-responsive-sm">
                                                    <table class="table table-dark bg-transparent">
                                                        <thead>
                                                            <tr>
                                                              <th scope="col" class="border-0">Links</th>
                                                              <th scope="col" class="border-0">Quality</th>
                                                              <th scope="col" class="border-0">Language</th>
                                                              <th scope="col" class="border-0">Player</th>
                                                              <th scope="col" class="border-0">Date Added</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr class="border-bottom border-gray-5300 table-h-bg">
                                                                <th class="border-top-0 pl-0" scope="row">
                                                                    <a href="#" class="d-flex align-items-center">
                                                                      <svg class="d-none d-md-block" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="35px" height="35px"><image x="0px" y="0px" width="35px" height="35px" xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAACMAAAAjCAMAAAApB0NrAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAACClBMVEX///8qXKYqXqgrYKkrYqorZKwrZq0raK8rarArbLIrbrMrcLUrdbgrd7orebsre70rfb4rf8ArYqorZKwrZq0rf8ArgcErg8MqXqgrYKkrYqorg8MrhcQsh8UqXKYqXqgsh8UsiccqWqUqXKYsiccsi8gqWKQqWqUsi8gsjckqVqIqWKQsjcksj8sqVaEqVqIsj8sskMwqVaEskMwqU6AqVaEskMwsks0qU6Asks0qUZ8qU6Asks0slM4qUZ8slM4qUZ8slM4qUZ8slM4qUZ8slM4qUZ8slM4qU6AqU6AqVaEqVaEqVqIqWqUsi8gqXKYqXqgsh8UsiccqXqgrYKkrYqorg8Msh8UrYqorZq0rf8ArgcErg8MraK8rcLUrdbgrc7YraK8rarArbLIrbrMrcLUrdbgrd7orebsre70rfb4rZKwrZq0rf8ArgcErYKkrYqorg8MrhcQqXqgsh8UqXKYsiccqWqUsi8gqWKQsjckqVqIsj8sqVaGXtdj////W5PF8qdJDhcAskMzY4/DC1+tsoc81f74qU6Du8/n5+/2jxeFTlMksks37/P3a6PN9r9c5iMSx0OhQl8zQ4/FVnM/J3/AqUZ8slM7D3O7D2+1PmM39/f6kyORFkMnU5PJ4rNY0hcPu8/jw9fqav95PkcjW4vC40edjm8wxfb2SsdbQ4O93ptA/gr9MFIuTAAAAYHRSTlMAAAAAAAADQoW53/Dw37mFQwMWh+fnhxYGfPX1fQYmz88nP+/vP0L19kIn8PAnB8/QB3t8F/X2F4aHBOfoBEJFhYm4uODf8fHoh/Z80Pf3KNHQKAd99vYHF+npiBdD8fF0vQ+CAAAAAWJLR0QAiAUdSAAAAAd0SU1FB+MFFg8DAMHnUEEAAAF2SURBVDjLldRlV0JBEAbgsTuxxU4MLCzs7u7G7u5cu7u7O/6jF/CyC9wrOp+fs2d3duYFkJSauoamlraOrp6+gcjQyNjE1AyUijLmHIv6hsamZlFLa1t7h6WVtZKxsbXr7CJMd48910HeODr19imY/gFnF5K4ug0ymCF3D0w8vYYZzYg3jyY+vqMsZszPX0r4AeOsZiIwSGKCJ38xUyFiIgj91YSFUyZiWmZmEEKzc/NyZiESQBiFzSIS19LyCmmiYyB2FZs1iUHrG5uE2YqDeMJso5/a2d3DJgESCYNw7R/ITBIkMxt0eESbFEhlMeiYNmlwwmYQbU7ZzznD57Dd5/wC34f5XZdX18S7GPtzc3tH9ofs871UPDw+yfdZmI7Ns4S8vL4p/BdkYPNOiY/PL6V/B0Gm6vmBLNVzCPxs1fP8l72g9iuHxeTy/rWnAHn5DKagUD43iopLFEwpt0wpf8o5FYSprKpmyCgqx2qoHKsV1Snm2DfDMKyVe/jGtwAAAABJRU5ErkJggg=="></image></svg>
                                                                      <span class="text-white ml-3 font-weight-normal font-size-1">Play Now</span>
                                                                    </a>
                                                                </th>
                                                                <td class="border-top-0">1080p</td>
                                                                <td class="border-top-0">English</td>
                                                                <td class="border-top-0">OpenLoad</td>
                                                                <td class="border-top-0">2020-07-05</td>
                                                            </tr>
                                                            <tr class="border-bottom border-gray-5300 table-h-bg">
                                                                <th class="border-top-0 pl-0" scope="row">
                                                                    <a href="#" class="d-flex align-items-center">
                                                                      <svg class="d-none d-md-block" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="35px" height="35px"><image x="0px" y="0px" width="35px" height="35px" xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAACMAAAAjCAMAAAApB0NrAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAACClBMVEX///8qXKYqXqgrYKkrYqorZKwrZq0raK8rarArbLIrbrMrcLUrdbgrd7orebsre70rfb4rf8ArYqorZKwrZq0rf8ArgcErg8MqXqgrYKkrYqorg8MrhcQsh8UqXKYqXqgsh8UsiccqWqUqXKYsiccsi8gqWKQqWqUsi8gsjckqVqIqWKQsjcksj8sqVaEqVqIsj8sskMwqVaEskMwqU6AqVaEskMwsks0qU6Asks0qUZ8qU6Asks0slM4qUZ8slM4qUZ8slM4qUZ8slM4qUZ8slM4qUZ8slM4qU6AqU6AqVaEqVaEqVqIqWqUsi8gqXKYqXqgsh8UsiccqXqgrYKkrYqorg8Msh8UrYqorZq0rf8ArgcErg8MraK8rcLUrdbgrc7YraK8rarArbLIrbrMrcLUrdbgrd7orebsre70rfb4rZKwrZq0rf8ArgcErYKkrYqorg8MrhcQqXqgsh8UqXKYsiccqWqUsi8gqWKQsjckqVqIsj8sqVaGXtdj////W5PF8qdJDhcAskMzY4/DC1+tsoc81f74qU6Du8/n5+/2jxeFTlMksks37/P3a6PN9r9c5iMSx0OhQl8zQ4/FVnM/J3/AqUZ8slM7D3O7D2+1PmM39/f6kyORFkMnU5PJ4rNY0hcPu8/jw9fqav95PkcjW4vC40edjm8wxfb2SsdbQ4O93ptA/gr9MFIuTAAAAYHRSTlMAAAAAAAADQoW53/Dw37mFQwMWh+fnhxYGfPX1fQYmz88nP+/vP0L19kIn8PAnB8/QB3t8F/X2F4aHBOfoBEJFhYm4uODf8fHoh/Z80Pf3KNHQKAd99vYHF+npiBdD8fF0vQ+CAAAAAWJLR0QAiAUdSAAAAAd0SU1FB+MFFg8DAMHnUEEAAAF2SURBVDjLldRlV0JBEAbgsTuxxU4MLCzs7u7G7u5cu7u7O/6jF/CyC9wrOp+fs2d3duYFkJSauoamlraOrp6+gcjQyNjE1AyUijLmHIv6hsamZlFLa1t7h6WVtZKxsbXr7CJMd48910HeODr19imY/gFnF5K4ug0ymCF3D0w8vYYZzYg3jyY+vqMsZszPX0r4AeOsZiIwSGKCJ38xUyFiIgj91YSFUyZiWmZmEEKzc/NyZiESQBiFzSIS19LyCmmiYyB2FZs1iUHrG5uE2YqDeMJso5/a2d3DJgESCYNw7R/ITBIkMxt0eESbFEhlMeiYNmlwwmYQbU7ZzznD57Dd5/wC34f5XZdX18S7GPtzc3tH9ofs871UPDw+yfdZmI7Ns4S8vL4p/BdkYPNOiY/PL6V/B0Gm6vmBLNVzCPxs1fP8l72g9iuHxeTy/rWnAHn5DKagUD43iopLFEwpt0wpf8o5FYSprKpmyCgqx2qoHKsV1Snm2DfDMKyVe/jGtwAAAABJRU5ErkJggg=="></image></svg>
                                                                      <span class="text-white ml-3 font-weight-normal font-size-1">Play Now</span>
                                                                    </a>
                                                                </th>
                                                                <td class="border-top-0">1080p</td>
                                                                <td class="border-top-0">English</td>
                                                                <td class="border-top-0">Streamango</td>
                                                                <td class="border-top-0">2020-05-05</td>
                                                            </tr>
                                                            <tr class="table-h-bg">
                                                                <th class="border-top-0 pl-0" scope="row">
                                                                    <a href="#" class="d-flex align-items-center">
                                                                      <svg class="d-none d-md-block" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="35px" height="35px"><image x="0px" y="0px" width="35px" height="35px" xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAACMAAAAjCAMAAAApB0NrAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAACClBMVEX///8qXKYqXqgrYKkrYqorZKwrZq0raK8rarArbLIrbrMrcLUrdbgrd7orebsre70rfb4rf8ArYqorZKwrZq0rf8ArgcErg8MqXqgrYKkrYqorg8MrhcQsh8UqXKYqXqgsh8UsiccqWqUqXKYsiccsi8gqWKQqWqUsi8gsjckqVqIqWKQsjcksj8sqVaEqVqIsj8sskMwqVaEskMwqU6AqVaEskMwsks0qU6Asks0qUZ8qU6Asks0slM4qUZ8slM4qUZ8slM4qUZ8slM4qUZ8slM4qUZ8slM4qU6AqU6AqVaEqVaEqVqIqWqUsi8gqXKYqXqgsh8UsiccqXqgrYKkrYqorg8Msh8UrYqorZq0rf8ArgcErg8MraK8rcLUrdbgrc7YraK8rarArbLIrbrMrcLUrdbgrd7orebsre70rfb4rZKwrZq0rf8ArgcErYKkrYqorg8MrhcQqXqgsh8UqXKYsiccqWqUsi8gqWKQsjckqVqIsj8sqVaGXtdj////W5PF8qdJDhcAskMzY4/DC1+tsoc81f74qU6Du8/n5+/2jxeFTlMksks37/P3a6PN9r9c5iMSx0OhQl8zQ4/FVnM/J3/AqUZ8slM7D3O7D2+1PmM39/f6kyORFkMnU5PJ4rNY0hcPu8/jw9fqav95PkcjW4vC40edjm8wxfb2SsdbQ4O93ptA/gr9MFIuTAAAAYHRSTlMAAAAAAAADQoW53/Dw37mFQwMWh+fnhxYGfPX1fQYmz88nP+/vP0L19kIn8PAnB8/QB3t8F/X2F4aHBOfoBEJFhYm4uODf8fHoh/Z80Pf3KNHQKAd99vYHF+npiBdD8fF0vQ+CAAAAAWJLR0QAiAUdSAAAAAd0SU1FB+MFFg8DAMHnUEEAAAF2SURBVDjLldRlV0JBEAbgsTuxxU4MLCzs7u7G7u5cu7u7O/6jF/CyC9wrOp+fs2d3duYFkJSauoamlraOrp6+gcjQyNjE1AyUijLmHIv6hsamZlFLa1t7h6WVtZKxsbXr7CJMd48910HeODr19imY/gFnF5K4ug0ymCF3D0w8vYYZzYg3jyY+vqMsZszPX0r4AeOsZiIwSGKCJ38xUyFiIgj91YSFUyZiWmZmEEKzc/NyZiESQBiFzSIS19LyCmmiYyB2FZs1iUHrG5uE2YqDeMJso5/a2d3DJgESCYNw7R/ITBIkMxt0eESbFEhlMeiYNmlwwmYQbU7ZzznD57Dd5/wC34f5XZdX18S7GPtzc3tH9ofs871UPDw+yfdZmI7Ns4S8vL4p/BdkYPNOiY/PL6V/B0Gm6vmBLNVzCPxs1fP8l72g9iuHxeTy/rWnAHn5DKagUD43iopLFEwpt0wpf8o5FYSprKpmyCgqx2qoHKsV1Snm2DfDMKyVe/jGtwAAAABJRU5ErkJggg=="></image></svg>
                                                                      <span class="text-white ml-3 font-weight-normal font-size-1">Play Now</span>
                                                                    </a>
                                                                </th>
                                                                <td class="border-top-0">720p</td>
                                                                <td class="border-top-0">English</td>
                                                                <td class="border-top-0">StreamCherry</td>
                                                                <td class="border-top-0">2020-08-05</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="font-size-24 font-weight-medium font-secondary text-white mb-4">You may also like</div>
                                        <div class="section-hot-premier-show">
                                            <div class="row mx-n2d row-cols-1 row-cols-md-2 row-cols-xl-4">

                            <?php 
                            $query = $queryController->prepareAndExecuteQuery($mysqli, "SELECT id, name, portrait, year, plot FROM " . MOVIES_TABLE . " WHERE category_id = ? ORDER BY created_at DESC LIMIT 4", 1, "i", array($query_results_array2[4]));
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
                            
                                                <div class="col px-2d">
                                                    <div class="position-relative dark mb-4 mb-xl-0">
                                                        <div class="movie_poster">
                                                            <div>
                                                                <img class="img-fluid" src="<?php echo MOVIE_POSTER_PORTRAIT_FOLDER . $portrait ?>" alt="Image-Description">
                                                            </div>
                                                        </div>
                                                        <div class="position-absolute bottom-0">
                                                            <div class="px-3 pb-3">
                                                                <h6 class="text-center product-title font-size-3 mb-2">
                                                                    <a href="../single-movies/single-movies-v4.html"><?php echo $name ?></a>
                                                                </h6>
                                                                <p class="text-white text-center font-size-1 max-h-42rem overflow-hidden"><?php echo $plot ?></p>
                                                                <div class="pb-1">
                                                                    <a href="../single-movies/single-movies-v4.html" class="btn btn-outline-white py-3 w-100 btn-sm" tabindex="0">WATCH NOW</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                            <?php 
                                }
                            ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- ========== END MAIN CONTENT ========== -->

<?php include('assets/inc/footer.php') ?>