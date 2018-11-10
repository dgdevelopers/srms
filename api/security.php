<?php

class input_validation{

    function check_subs_name($arg01){
		
        $res = preg_split("/ /",$arg01);
		
		$status = false;
		
        if(count($res)>0){
            for ($idx = 0; $idx < count($res); $idx++){
                $status = $status . ":" . $res[$idx];
            }
			//$status = true;
			
        }
		
        return $status ;
    }

    function check_mob_num($arg01){

    }

    function check_user_id($arg01){

    }

    function check_address($agr01){

    }
}