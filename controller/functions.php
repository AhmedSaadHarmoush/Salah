<?php

date_default_timezone_set('Africa/Cairo');

//getting time !. 
function timenow() {
    date_default_timezone_set('Africa/Cairo');
    $timenow = date('Y-M-D H:i:s a');
    return $timenow;
}

// cleaning the text before inputing 
function clean($str, $trim = FALSE) {
    $con = new db_connect();
    $link = $con->connect();
    if ($trim != FALSE) {
        $str = mysqli_real_escape_string($link, strip_tags(trim($str)));
        return $str;
    } else {
        $str = mysqli_real_escape_string($link, strip_tags($str));
        return $str;
    }
}

// haching the password .
function password($password) {
    $fpassword = md5($password);
    return $fpassword;
}

function error ($str) {
    $f = '<font style="color:red;font-size:smaller;">'.$str.'</font>';
    return $f;
}

function accept ($str) {
    $f = '<font style="color:#28AE61;font-size:smaller;">'.$str.'</font>';
    return $f;
}




