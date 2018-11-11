<?php

class input_validation
{

    function if_spl_char($arg01) /* this function checks if any character other than a-z */
    {
        $res = preg_split("/ /", trim($arg01));
        $status = false;
        if (count($res) > 0) {
            for ($idx = 0; $idx < count($res); $idx++) {
                $status = preg_match('/([^A-Za-z])+/', $res[$idx]);
                if ($status == true) {
                    break;
                }
            }
        }
        if ($status == true) {
            $status = "valid";
        } else {
            $status = "invalid";
        }
        return $status;
    }

    function check_mob_num($arg01) /* this function checks for valid mobile number with 10 digits */
    {
        if (preg_match('/^(\+\d{1,3}[- ]?)?\d{10}$/', $arg01)) {
            return "valid";
        } else {
            return "invalid";
        }
    }

    function check_user_id($arg01) /* this function checks for valid construction of user id */
    {
        $res = preg_split("/ /", trim($arg01));
        if (count($res) > 1) {
            return "invalid";
        } else {
            if (preg_match('/[^a-zA-Z0-9_]+/', $arg01)) {
                return "invalid";
            } else {
                return "valid";
            }
        }
    }

    function check_address($arg01) /* this function is checking malicious code inside the address data  */
    {
        if (preg_match('/([=+\(\)\*\&\^\%\$\#\@\!<>?])+/', $arg01)) {
            return "invalid";
        } else {
            return "valid";
        }
    }
}