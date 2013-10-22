<?php


// validates logged user
function validateUser($user, $pass) {
	// escape quotation marks
	$nuser = addslashes($user);
	$npass = addslashes($pass);
	// gets the query to find the user
	$sql = "SELECT `id_user`, `name` FROM `users` WHERE `username` = '".$nuser."' AND `password` = md5('".$npass."') LIMIT 1";
	$result = BD_Consulta($sql);
	// checks if something was found
	if (empty($result)) {
		// user not found
		return false;
	} else {
		// user found, define session variables
		$_SESSION['userID'] = $result[0]['id_user'];
		$_SESSION['userName'] = $result[0]['name'];
		// saves variables so that session can be validated everytime a page is loaded
		$_SESSION['userLogin'] = $user;
		$_SESSION['userPass'] = $pass;
		if (!isset($_SESSION['lang'])) {
			$_SESSION['lang'] = "ptbr";
		}
		return true;
	}
}

// validates current session
function validateSession() {
	if (!isset($_SESSION) OR !isset($_SESSION['userID'])) {
		// user is not logged
		gotoLoginPage();
	} else {
		// an user is logged, checks if login info is valid
		if (!validateUser($_SESSION['userLogin'], $_SESSION['userPass'])) {
			// invalid login data
			gotoLoginPage();
		}
	}
}

// returns to login page
function gotoLoginPage() {
	$_SESSION = array(); 
	session_unset();
	session_destroy();
	header( 'Location: login.php' ) ;
	exit();
}
?>