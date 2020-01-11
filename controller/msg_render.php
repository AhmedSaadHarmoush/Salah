<?php
include './functions.php';
include '../model/db_connect.php';
include '../model/users.php';
include '../model/msg.php';
$users = new users();
$msgs = new msg();
if(isset($_POST['msg_bo'])){
   echo  $user_id=$_POST['user_id'];
   echo  $friend_id=$_POST['frid'];
   echo $msg=$_POST['msg_bo'];
    
    echo $send=$msgs->send($msg, $user_id, $friend_id);
    if($send===TRUE){
        return TRUE;
    }else{
        return FALSE;
    }
    
}