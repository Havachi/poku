<?php
/**
 * Created by PhpStorm.
 * User: Pascal.BENZONANA
 * Date: 08.05.2017
 * Time: 09:10
 * Updated by : 12-MAR-2019 - nicolas.glassey
 *              Add register function
 */

/**
 * This function is designed to redirect the user to the home page (depending on the action received by the index)
 */


/**********
 *
 *  PAGES
 *
 **********/

function home(){
    require_once "model/comicManager.php";
    $getComicTypesFunction_Result = getComicTypes();
    $_GET['action'] = "home";
    require "view/home.php";
}

function insertComicFunction($insertComicFunction_Request){
	if (isset($insertComicFunction_Request['inputRoTitle']) || 
		isset($insertComicFunction_Request['inputEnTitle']) ||
		isset($insertComicFunction_Request['inputJpTitle']) ||
		isset($insertComicFunction_Request['inputFrTitle'])) {
    	$roTitle = $insertComicFunction_Request['inputRoTitle'];
        $enTitle = $insertComicFunction_Request['inputEnTitle'];
    	$jpTitle = $insertComicFunction_Request['inputJpTitle'];
        $frTitle = $insertComicFunction_Request['inputFrTitle'];
        $synonyms = $insertComicFunction_Request['inputSynonyms'];
        $enSynopsis = $insertComicFunction_Request['inputEnSynopsis'];
        $jpSynopsis = $insertComicFunction_Request['inputJpSynopsis'];
        $frSynopsis = $insertComicFunction_Request['inputFrSynopsis'];
        $episodes = $insertComicFunction_Request['inputEpisodes'];
        $startAiring = $insertComicFunction_Request['inputStartAiring'];
        $endAiring = $insertComicFunction_Request['inputEndAiring'];
        $broadcast = $insertComicFunction_Request['inputBroadcast'];
        $source = $insertComicFunction_Request['inputSource'];
        $duration = $insertComicFunction_Request['inputDuration'];
        $comicType = $insertComicFunction_Request['inputComicType'];

        require_once "model/comicManager.php";
        if(insertComic($roTitle, $enTitle, $jpTitle, $frTitle, $synonyms, $enSynopsis, $jpSynopsis, $frSynopsis, $episodes, $startAiring, $endAiring, $broadcast, $source, $duration, $comicType)){
            $_GET['insertComicFunction_Error'] = false;
            $_GET['action'] = "home";
            require "view/home.php";
        }else{
        $_GET['insertComicFunction_Error'] = true;
        $_GET['action'] = "home";
        require "view/home.php";
        }
	}else{
        $_GET['action'] = "home";
        require "view/home.php";
	}
}

//endregion