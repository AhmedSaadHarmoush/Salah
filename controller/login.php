<?php include './view/top_log.php'; ?>
<?php
session_start();
$users = new users();
if(isset($_POST['login']) && isset($_SESSION['id'])){
    $id= $_SESSION['id'];
    $active = $users->activeation($id);
    if ($active === FALSE){
        $error = error('This email is not activated yet please visit your email and active it!');
        include './view/login.php';
    }else{
    $_SESSION['user_id']=$id;
    if(isset($_POST['ramemper'])){
        setcookie('user_id', $id, 60*60*24*7);
        setcookie('user_type', $type, 60*60*24*7);
    }
    header( "Location: index.php" );
    exit();
    }
}else {
include './view/login.php';
}
?>        
<?php include './view/bottom_log.php';?>