<?php
//regstration ajax step1 
include './functions.php';
include '../model/db_connect.php';
include '../model/users.php';
$users = new users();
$ckeck_array=array();

//username
if(isset($_POST['username'])){
    $username=$_POST['username'];
    //username cleaned
    $fusername = clean ($username);
    //chacking username lenth once and char type
    $len = strlen($fusername);
    $fp= preg_match('/^\w+$/', $fusername);
    //chacking aviplity
    $uex = $users->user_exist($fusername);
    
    if ( $fp == 1 && $len > 6 && $len<36 && $uex===FALSE){
        echo accept("User name is Fine");
        $ckeck_array['username']='1';
    }elseif ($fp == 1 && $len > 6 && $len<36 && $uex===TRUE)
        {
        echo error('username already exists');
        $ckeck_array['username']='0';
    }else{
       echo error('username sould be 6-36 chars and A-z 0-9 only');
       $ckeck_array['username']='0';
    }
    
}

//email
if(isset($_POST['email'])){
    $email=$_POST['email'];
    //email cleaned
    $femail = clean ($email);
    //chacking email lenth once and char type
    $len = strlen($femail);
    $fp= preg_match(' /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/', $femail);
    //chacking aviplity
    $eex = $users->email_exist($femail);
    
    if ( $fp == 1 && $len > 6 && $len<36 && $eex===FALSE){
        echo accept("email is Fine");
        $ckeck_array['email']='1';
    }elseif ($fp == 1 && $len > 6 && $len<36 && $eex===TRUE)
        
        {
        echo error('email already exists');
        $ckeck_array['email']='0';
    }else{
       echo error('please write your valued email');
       $ckeck_array['email']='0';
    }
}

if(!empty($ckeck_array)){
    session_start();
        if(isset($ckeck_array['username'])){
            if($ckeck_array['username']==1){
                $_SESSION['username'] =1;
            }else{
                $_SESSION['username'] =0;
            }
        }
        if(isset($ckeck_array['email'])){
                if($ckeck_array['email']==1){
                    $_SESSION['email'] =1;
                }else{
                    $_SESSION['email'] =0;
                }
        }
}