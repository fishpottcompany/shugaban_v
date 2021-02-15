<?php

class DatabaseController {

		private $mysqli;

		public function connectToDatabase($set_charset, $LIVE_MODE) {

			if($LIVE_MODE === true){
				// LIVE MODE
				$hosting = "";
				$user = "";
				$db_connect_password = "";
				$database = "";
				//echo "\n LIVE MODE";
			} else {
				// DEVELOPMENT MODE
				$hosting = "localhost";
				$user = "root";
				$db_connect_password = "th3j0y";
				$database = "genman_main";
				//echo "\n DEVELOPMENT MODE";
			}
			
			$mysqli = new mysqli($hosting, $user, $db_connect_password, $database);


			/* check connection */
			if ($mysqli->connect_errno) {
				// IF DATABASE CONNECTION FAILED
				return false;
			} else {
				// IF DATABASE CONNECTION WAS SUCCESSFUL.
				return $mysqli;
			}

		} // END OFconnectToDatabase

 		public function getDatabaseConnection() {		

			/* check connection */
			if ($mysqli->connect_errno) {
				// IF DATABASE CONNECTION FAILED
				return false;
			} else {
				// IF DATABASE CONNECTION WAS SUCCESSFUL.
				return $mysqli;
			}

		 } // END OF getDatabaseConnection

		public function checkDatabaseConnection() {		

			/* check connection */
			if ($mysqli->connect_errno) {
				// IF DATABASE CONNECTION FAILED
				return false;
			} else {
				// IF DATABASE CONNECTION WAS SUCCESSFUL.
				return true;
			}

		 }	// END OF checkDatabaseConnection

		 public function checkIfServerIsAlive(){

			/* check if server is alive */
			if ($mysqli->ping()) {
				return true;
			} else {
				return false;
			}

		 }	// end of checkIfServerIsAlive

		 public function closeDatabaseConnection($mysqli){

		 	$mysqli->close();

		 } // END OF closeDatabaseConnection
 
}	