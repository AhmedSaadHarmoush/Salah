
<?php
include './functions.php';
include '../model/db_connect.php';
include '../model/users.php';
$users = new users();

if(isset($_POST['user_id'])){
    $id=$_POST['user_id'];
    $userdata=$users->user_fetch_array($id);
    $frsrows=$users->friends($id,"TRUE");$n=count($frsrows);
    for($i=0;$i<($n);$i++) {
        $value=$frsrows[$i][0];
        $frdata=$users->user_fetch_array($value);
        
        echo '<li class="chat_list_container" fr_id="'.$frdata['id'].'">';
        echo '<img src="'.$frdata['pp_url'].'" id="chat_img" class="details">';
        echo '<p id="chat_username" class="details">'.$frdata['username'].'</p>';
        echo '<div style="clear:both"></div> ';
        echo '</li>';
        
    }
    
}
