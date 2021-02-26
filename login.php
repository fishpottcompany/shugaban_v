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
    <main id="content" class="bg-black-1"  style="background-image: url(assets/img/login.png); background-repeat: no-repeat; background-size: 100%;">
        <div class="space-bottom-1 space-bottom-lg-2" style="min-height: 500px;">
            <div class="container px-md-5 pb-lg-6">
            <br><br>
                <div class="row">
                    <div class="offset-4 col-lg-4 mt-6">
                        <div class="mb-5 mb-lg-0">
                            <h5 class="font-size-18 font-weight-medium mb-4  text-white">Login</h5>

                            <!-- Contacts Form -->
                            <form class="js-validate">
                                <div class="row">

                                    <!-- Input -->
                                    <div class="col-sm-12 mb-3">
                                      <div class="js-form-message">
                                        <label class="input-label font-size-15  font-weight-medium text-white">
                                        Username /  Email Address
                                        </label>

                                        <input type="text" class="form-control rounded-0 input" name="subject" placeholder="" aria-label="Web design" required
                                               data-msg="Please enter a subject.">
                                      </div>
                                    </div>
                                    <!-- End Input -->
                                    <!-- Input -->
                                    <div class="col-sm-12 mb-3">
                                      <div class="js-form-message">
                                        <label class="input-label font-size-15  font-weight-medium text-white">
                                        Password
                                        </label>

                                        <input type="text" class="form-control rounded-0 input" name="subject" placeholder="" aria-label="Web design" required
                                               data-msg="Please enter a subject.">
                                      </div>
                                    </div>
                                    <!-- End Input -->
                                </div>

                                <div>
                                    <button type="submit" class="btn btn-shugaban px-3 transition-3d-hover border-radius-sm font-size-1">
                                        <span class="mx-1">Login</span>
                                    </button>
                                </div>
                            </form>
                            <!-- End Contacts Form -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- ========== END MAIN CONTENT ========== -->


    <?php include('assets/inc/footer_black.php') ?>