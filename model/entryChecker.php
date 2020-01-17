<?php

require "model/exception.php";

function littleTextCheck($text, $errorName){
	try{
		if(strlen($text) > 50){ throw new TooManyCharacters_Exception("The maximum size is 50 characters."); }
		return true;
	}
	catch(TooManyCharacters_Exception $e){
        $text = $e->getMessage();
        array_push($_POST[$errorName], $text);
		return false;
	}
}

function mediumTextCheck($text, $errorName){
	try{
		if(strlen($text) > 0){ throw new TooManyCharacters_Exception("The maximum size is 255 characters."); }
		return true;
	}
	catch(TooManyCharacters_Exception $e){
        $text = $e->getMessage();
        array_push($_POST[$errorName], $text);
		return false;
	}
}

function bigTextCheck($text, $errorName){
	try{
		if(strlen($text) > 2000){ throw new TooManyCharacters_Exception("The maximum size is 2000 characters."); }
		return true;
	}
	catch(TooManyCharacters_Exception $e){
        $text = $e->getMessage();
        array_push($_POST[$errorName], $text);
		return false;
	}
}

function specialCharactersCheck($text, $errorName){
	try{
		if(preg_match("/[`'\"~!@#$*()<>,:;{}\|]/", $text)){ throw new ContainsSpecialCharacters_Exception("Special characters are prohibited."); }
		return true;
	}catch(ContainsSpecialCharacters_Exception $e){
        $text = $e->getMessage();
        array_push($_POST[$errorName], $text);
		return false;
	}
}