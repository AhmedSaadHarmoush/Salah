<?php
include './functions.php';
include '../model/db_connect.php';
include '../model/users.php';
include '../model/msg.php';
$users = new users();
$msgs = new msg();
if(isset($_POST['frid'])&&isset($_POST['user_id'])&&$_POST['frid'] != $_POST['user_id']){
    $user_id=$_POST['user_id'];
    $friend_id=$_POST['frid'];
    $endid=0;
    $userdata=$users->user_fetch_array($user_id);
    $frienddata=$users->user_fetch_array($friend_id);
    echo '<header class="top-chat" ><i class="fa fa-chevron-circle-left"></i> <h3 class="us_ti_ma">'
    .$frienddata['fname'].'</h3></header><ul id="chat"><div class="force-overflow"></div>';
    $fmsg= $msgs->msgs_fetch_ids($user_id, $friend_id);$n=  count($fmsg);
    for($i=0;$i<$n;$i++){
        $value=$fmsg[$i][0];
        $ids[$i]=$value;
    }
    foreach ($ids as $value) {
        $imsg=$msgs->msg_fetch_array($value);
        if($imsg['user_id']==$user_id){
        echo '<li class="self">
                      <div class="message">
                       <p>'.$imsg['msg'].'</p>
                        <h6><font color="#ccc">'.$imsg['created'].'</font></h6></div>'
                . '<div class="avatar"><img src="'.$userdata['pp_url'].'">
                      </div>
                        <div style="clear:both"></div>
                  </li>
                      </div>';
        }else{
           echo '<li class="other">
               <div class="avatar"><img src="'.$frienddata['pp_url'].'">
                      </div>
                      <div class="message">
                       <p>'.$imsg['msg'].'</p>
                        <h6><font color="#ccc">'.$imsg['created'].'</font></h6></div>
                        <div style="clear:both"></div>
                  </li>
                      </div>'; 
        }
        $endid=$imsg['id'];
    }
    echo '<div style="clear:both" class="endmsg" end="'.$endid.'></div></ul>';
}