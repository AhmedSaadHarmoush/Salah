<?php require './view/top_reg.php';?>

    <?php
    session_start();
    //require_once "./view/$step.php"; 
    if(isset($_POST['step1'])){
        //step1
        if(isset($_SESSION['username'])){
            $vuser=$_SESSION['username'];
        }
        if(isset($_SESSION['email'])){
            $vemail=$_SESSION['email'];
        }
        if($vuser == 1 && $vemail == 1){
            $userdata['username']=  clean($_POST['username']);
            $userdata['fname']= clean($_POST['fname']);
            if(isset($_POST['lname'])){
                $userdata['lname']=clean($_POST['lname']);
            }
            $userdata['email']=clean($_POST['email']);
            if(isset($_POST['gender'])){
            $userdata['gender']=clean($_POST['gender']);
            $_SESSION['userdata']=$userdata;
            }
        }
        require_once "./view/step2.php"; 
    
    }elseif(isset ($_POST['step2'])){
        if(isset($_SESSION['password'])){
            $vpass=$_SESSION['password'];
        }
        if(isset($_SESSION['repassword'])){
            $vrepass=$_SESSION['repassword'];
        }
        if($vpass == 1 && $vrepass == 1){
            $userdata=$_SESSION['userdata'];
            $userdata['password']= password($_POST['password']);
            $users = new users();
            $add = $users->add($userdata);
            if($add === TRUE){
                $id= $users->user_id($userdata['username']);
                $emai_code=  password($userdata['username']+microtime());
                $add_code= $users->update(array('email_code'=>$emai_code), $id);
                if($add_code === TRUE){
                    $mail=  mail($userdata['email'],'Memo Activation Email','/n '
                            . 'Hi '.$userdata['username'].' :'
                            . '/n'
                            . '/n'
                            . 'you have sucseccfuly registrated in memo.com all you need to countiue is click on the link below :D'
                            . "https://localhost/registry.php?eco=$emai_code&i=$id"
                            .'/n'
                            .'/n'
                            . 'Thank you for join us');
                    if($mail === TRUE){
                        require_once "./view/step3.php";
                    }else{
                        echo error('FALIED !');
                    }
                            
                }
            
            }
            
        }
    }elseif (isset($_GET['eco']) && isset($_GET['i'])) {
        $ids=$_GET['i'];
        $code=$users->item('emailcode', $ids);
        $out=$_GET['eco'];
        if( $code == $out){
            $active = $users->active($ids);
            $_SESSION['user_id']=$ids;
            header( "Location: home.php" );
        }
    }else{
        require_once "./view/step1.php"; 
    }
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
?>                      
<?php require './view/bottom_reg.php';?>                    