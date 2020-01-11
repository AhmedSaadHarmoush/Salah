<?php
include './view/home_top.php';
include './view/home_header.php';
session_start();
$users= new users();
 if(isset($_SESSION['user_id'])){
     $user_id=$_SESSION['user_id'];
     $userdata=$users->user_fetch_array($user_id);
     include './view/home.php';
     echo '<div class="test_case"></div>';
     
 }else {
     include './view/home_core.php';
 }
 
 include './view/home_bottom.php';