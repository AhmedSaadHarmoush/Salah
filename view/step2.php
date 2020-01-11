<style>
    #step2{
            background-color: #fff;
            color: #28AE61;
    }
</style>
<section class="form">
        <form  action="" method="post" id='step2' >
            <table class="regtab">
                <tr class="out">
                    <td class="input" colspan="2">
                        <input id="password" type="password" name="password"  
                               placeholder="  choose a strong password" class="tall" required ></td>
                    <script>      
    
                        $(document).ready(function(){
                                    //chacking password
                                    $('#password').keyup(function(){
                                        var pass = $(this).val();
                                        $.ajax({url:'controller/step2.php',type:'POST',
                                            data:{password:pass},lode:'loging...',
                                            success:function (ret) {
                                                $(".passworde p").html(ret);
                                            }}
                                        ,200);
                                    });
                                });
                    </script>
                </tr>
                <tr class="hide">
                    <td class="error passworde" colspan="2"><center><p></p></center></td>
                </tr>
                <tr class="out">
                    <td class="input" colspan="2"><input id="repassword" type="password"
                        name="repassword"  placeholder=" Please Enter Your password again" class="tall" required ></td>
                    <script>      
    
    $(document).ready(function(){
                //ckecking repassword
                $('#repassword').keyup(function(){
                    var repass = $(this).val();
                    var passto = $('#password').val();
                    $.ajax({url:'controller/step2.php',type:'POST',
                        data:{
                            repassword:repass,
                            passwordto:passto
                        },lode:'loging...',
                        success:function (retp) {
                            $(".repassworde p").html(retp);
                        }}
                    ,200);
                });
            });
            
    
        </script>
                </tr>
                <tr class="hide">
                    <td class="error repassworde" colspan="2"><center><p></p></center></td>
                </tr>
                <tr class="out">
                    <td id='agrees'>
                        <input id='agree'type="checkbox" name="agree" value="agree" required > 
                    </td>
                    <td style="font-size: small;">
                        I Agree the terms of use and privacy police.
                    </td>
                </tr>
                <tr class="hide">
                    <td class="error agreee" colspan="2"><center><p></p></center></td>
                </tr>
                <tr><td colspan="2"><input type="submit" value=" Finish " name="step2" id="regbtn"></td></tr>
            </table>
        </form>
        <br>
        <br>
        <div style="float: left">
            <p style="font-size: small;"><b><a href="index.php" style="color: #28AE61;">    Go Back </a></b></p>
        </div>
                    
</section>