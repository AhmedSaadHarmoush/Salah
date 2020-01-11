<?php
//regstration ajax step2 
include '../model/db_connect.php';
include './functions.php';
$ckeck_array=array();

if(isset($_POST['password'])){
    $password=$_POST['password'];
    $fpassword = clean ($password);
    $len = strlen($fpassword);
    $fp= preg_match('/^\w+$/', $password);
    
    if ( $fp == 1 && $len > 6 && $len<36){
        echo accept('Password is fine');
        $ckeck_array['password']=1;
    }else {
        echo error('Passowrd should be A-z 0-9 and bettwen 6-36 characters !');
        $ckeck_array['password']=0;
    }
    
}

if(isset($_POST['repassword'])){
    $repassword=$_POST['repassword'];
    $frepassword = clean ($repassword);
    $password=$_POST['passwordto'];
    $fpassword = clean ($password);
    if ($frepassword == $fpassword){
        echo accept('Passwords Matched');
        $ckeck_array['repassword']=1;
    }else {
        echo error('Password Not Match');
        $ckeck_array['repassword']=0;
    }
    
}

if(!empty($ckeck_array)){
    session_start();
        if(isset($ckeck_array['password'])){
            if($ckeck_array['password']==1){
                $_SESSION['password'] =1;
            }else{
                $_SESSION['password'] =0;
            }
        }
        if(isset($ckeck_array['repassword'])){
                if($ckeck_array['repassword']==1){
                    $_SESSION['repassword'] =1;
                }else{
                    $_SESSION['repassword'] =0;
                }
        }
}

