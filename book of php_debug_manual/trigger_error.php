<?php 
// p8 trigger_error() ;E_USER_WARNING E_USER_NOTICE E_USER_ERROR
function if_int($value){
	if(!is_int($value)){
		trigger_error("the num is not integer",E_USER_WARNING);
		return false;
	}
	return true;
}
// if_int(1.1);
if_int(1);
?>