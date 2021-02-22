    <!-- ========== FOOTER ========== -->
    <footer class="">
        <div class="bg-gray-4000">
            <div class="container px-md-5">
                <div class="d-flex flex-wrap align-items-center pt-6 pb-3d border-bottom mb-7 border-gray-4100">
                    <a href="../home/index.html" class="mb-4 mb-md-0 mr-auto">
                        <img src="assets/img/logo.png" />
                    </a>
                </div>
                <div class="row pb-5">
                    <div class="col-md mb-5 mb-md-0">
                        <h4 class="font-size-18 font-weight-medium mb-4 text-gray-4200">Movie Categories</h4>
                        <ul class="column-count-2 v2 list-unstyled mb-0">

                        <?php 
                            $query = $queryController->prepareAndExecuteQuery($mysqli, "SELECT name FROM " . CATEGORIES_FOR_MOVIES_TABLE . " LIMIT 8", 0, "", "");
                            if($query === false){
                                $messageModelObject->error_exist = false;
                                $messageModelObject->body = "Failed fetching categories for footer";
                            }
                            
                            // GETTING RESULTS
                            $query_results_array = $queryController->getQueryResults($query, array("name"), 1, 2);
                            
                            //BINDING THE RESULTS TO VARIABLES
                            $query_results_array->bind_result($name);

                            // GETTING THE QUERY RESULTS INTO THE RESPONSE ARRAY
                            while($query_results_array->fetch()){
                                //echo "<br><br>Movie Name: " . $name;
                            ?>
                                <li class="py-1d">
                                    <a class="h-g-white" href="../archive/movies.html"><?php echo $name ?></a>
                                </li>
                            <?php 
                                }
                            ?>
                        </ul>
                    </div>
                    <div class=" offset-2 col-md mb-5 mb-md-0">
                        <h4 class="font-size-18 font-weight-medium mb-4 text-gray-4200">Shugaban</h4>
                        <ul class="column-count-2 v2 list-unstyled mb-0">
                            <li class="py-1d">
                                <a class="h-g-white" href="../archive/tv-shows.html">Submit Your Movie</a>
                            </li>
                            <li class="py-1d">
                                <a class="h-g-white" href="../archive/tv-shows.html">About</a>
                            </li>
                            <li class="py-1d">
                                <a class="h-g-white" href="../archive/tv-shows.html">Terms</a>
                            </li>
                            <li class="py-1d">
                                <a class="h-g-white" href="../archive/tv-shows.html">Privacy Policy</a>
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
                    <div class="font-size-13 text-gray-1300 mb-2 mb-md-0">Copyright © <?php echo date('Y') ?>, Shugaban Media. All Rights Reserved</div>
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
