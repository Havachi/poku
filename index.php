<?php

require "controler/controler.php";
require "model/entryChecker.php";

if (isset($_GET['action'])) {
  $action = $_GET['action'];
	switch ($action) {
	  /**********
	   *
	   *  PAGES
	   *
	   **********/

	  case 'home' :
	      home();
	      break;

      case 'insertComicFunction' :
          insertComicFunction($_POST);
          break;
	  case 'getComicTypesFunction' :
	      getComicTypesFunction();
	      break;
	}
}else {
    home();
}

?>