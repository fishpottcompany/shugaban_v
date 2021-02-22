<?php
// USAGE MODE
define("ARE_WE_USING_LIVE_MODE", false); 

// MOVIE POSTER FOLDER
define("MOVIE_POSTER_FOLDER", "assets/img/covers/"); 
define("MOVIE_POSTER_LANDSCAPES_FOLDER", "assets/img/landscapes/"); 
define("MOVIE_POSTER_PORTRAIT_FOLDER", "assets/img/portrait/"); 


// VIEWS TO SHOW THRESHOLD
define("VIEWS_TO_SHOW_THRESHOLD", 100); 

/*********************************** DB CREDENTIALS ************************************************/
/*********************************** DB CREDENTIALS  ************************************************/
/*********************************** DB CREDENTIALS  ************************************************/

define("HOST", "localhost"); 
define("USER", "root"); 
define("USER_PASSWORD", "th3j0y"); 
define("DATABASE_NAME", "genman_main"); 

/*********************************** TABLES ************************************************/
/*********************************** TABLES ************************************************/
/*********************************** TABLES ************************************************/

define("MOVIES_TABLE", "movies"); 
define("CATEGORIES_FOR_MOVIES_TABLE", "categories"); 


/*********************************** DATABASE CHANGES START ************************************************

- Added "text" field "landscape_cover" to "movies" to table 
- Added "datetime" field "recommendation_date" to "movies" to table 

*********************************** DATABASE CHANGES END ************************************************/

/*********************************** SYSTEM SETTINGS START ************************************************

- MOVIE COVER RATIO :  WIDTH:  1920 x  HEIGHT: 676
- MOVIE LANDSCAPE RATIO :  WIDTH:  200 x  HEIGHT: 120
- MOVIE PORTRAIT RATIO :  WIDTH:  174 x  HEIGHT: 260

*********************************** SYSTEM SETTINGS END ************************************************/
// 


