<?php
//regstration ajax username 
include './functions.php';
include '../model/db_connect.php';
include '../model/users.php';
$users = new users();
session_start();


//username
if(isset($_POST['username'])){
    $username=$_POST['username'];
    //username cleaned
    $fusername = clean ($username);
    //check user
    $uex = $users->user_exist($fusername);
    //check for emal
    $eex = $users->email_exist($fusername);
    
    if ( $uex===FALSE && $eex===FALSE){
        echo error("Username or Email Dose not Exist");
        $login['acc']=0;
    }else{
       if($uex === TRUE){
           echo accept('Username is fine');
       }
       if($eex === TRUE){
           echo accept('Email is fine');
       }
       $_SESSION['username']=$fusername;
    }
}
if(isset($_POST['password']) && isset($_SESSION['username'])){
    $password=$_POST['password'];
    $fusername = $_SESSION['username'];
    $logged = $users->login($fusername,$password);
    
    if($logged == FALSE){
        echo error('Wrong Password');
    }  else {
        echo accept('Password id fine');
        $id = $users->user_id($fusername);
        $_SESSION['id']=$id;
    }
}

