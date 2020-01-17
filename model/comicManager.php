<?php

function insertComic($roTitle, $enTitle, $jpTitle, $frTitle, $synonyms, $enSynopsis, $jpSynopsis, $frSynopsis, $episodes, $startAiring, $endAiring, $broadcast, $source, $duration, $comicType){
    $result = false;

    $_POST['inputRoTitle_Error'] = array();
    $_POST['inputEnTitle_Error'] = array();
    $_POST['inputJpTitle_Error'] = array();
    $_POST['inputFrTitle_Error'] = array();
    $_POST['inputSynonyms_Error'] = array();
    $_POST['inputEnSypnopsis_Error'] = array();
    $_POST['inputJpSynopsis_Error'] = array();
    $_POST['inputFrSynopsis_Error'] = array();
    $_POST['inputBroadcast_Error'] = array();
    $_POST['inputSource_Error'] = array();


    mediumTextCheck($roTitle, "inputRoTitle_Error");
    mediumTextCheck($enTitle, "inputEnTitle_Error");
    mediumTextCheck($jpTitle, "inputJpTitle_Error");
    mediumTextCheck($frTitle, "inputFrTitle_Error");
    bigTextCheck($synonyms, "inputSynonyms_Error");
    bigTextCheck($enSynopsis, "inputEnSynopsis");
    bigTextCheck($jpSynopsis, "inputJpSynopsis");
    bigTextCheck($frSynopsis, "inputFrSynopsis");
    mediumTextCheck($broadcast, "inputBroadcast");
    mediumTextCheck($source, "inputSource");

    if(
    mediumTextCheck($roTitle, "inputRoTitle_Error") &&
    mediumTextCheck($enTitle, "inputEnTitle_Error") &&
    mediumTextCheck($jpTitle, "inputJpTitle_Error") &&
    mediumTextCheck($frTitle, "inputFrTitle_Error") &&
    bigTextCheck($synonyms, "inputSynonyms_Error") &&
    bigTextCheck($enSynopsis, "inputEnSynopsis") &&
    bigTextCheck($jpSynopsis, "inputJpSynopsis") &&
    bigTextCheck($frSynopsis, "inputFrSynopsis") &&
    mediumTextCheck($broadcast, "inputBroadcast") &&
    mediumTextCheck($source, "inputSource")
    ){
        $arguments = array($roTitle, $enTitle, $jpTitle, $frTitle, $synonyms, $enSynopsis, $jpSynopsis, $frSynopsis, $episodes, $startAiring, $endAiring, $broadcast, $source, $duration, $comicType);

        $strSeparator = '\'';
        $query = 'INSERT INTO comic (
        `id`,
        `roTitle`, 
        `enTitle`, 
        `jpTitle`, 
        `frTitle`, 
        `synonyms`, 
        `enSynopsis`, 
        `jpSynopsis`, 
        `frSynopsis`, 
        `episodes`, 
        `startAiring`, 
        `endAiring`, 
        `broadcast`, 
        `source`, 
        `duration`,
        `type`,
        `dateAdded`
        ) VALUES (
        DEFAULT';

        foreach($arguments as $argument){
            if($argument == ''){
                $query = $query . ', DEFAULT';
            }else{
                $query = $query . ', ' . $strSeparator . $argument . $strSeparator;
            }
        }

        $query = $query . ', DEFAULT)';

        require_once 'model/dbConnector.php';
        $queryResult = executeQueryInsert($query);

        return $result;
    }
}

function getComicTypes(){
    $query = 'SELECT type FROM comicType';

    require_once 'model/dbConnector.php';
    $queryResult = executeQuerySelect($query);

    return $queryResult;
}