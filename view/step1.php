<style>
    #step1{
            background-color: #fff;
            color: #28AE61;
    }
</style>
<section class="form">
                        <form  action="" method="post" id='step1'>
                            <table class="regtab">
                                    <tr class="out">
                                        <td class="input" colspan="2">
                                            <input id='username' type="text" name="username" placeholder="  Choose you username" class="tall" autocomplete="off" required >
                                        </td>
                                    <script>
                                        $(document).ready(function(){
                                            console.log('wasalna');
                                            //chacking username
                                            $('#username').keyup(function(){
                                                console.log('atakena');
                                                var un = $(this).val();
                                                console.log(un);
                                                $.ajax({url:'controller/step1.php',type:'POST',
                                                    data:{username:un},lode:'loging...',
                                                    success:function (ret) {
                                                        console.log('gepna dek on al data');
                                                        $(".username p").html(ret);
                                                    }}
                                                ,200);
                                            });
                                            
                                        });
            
    
                                    </script>
                                    </tr>
                                    <tr class="hide">
                                        <td class="error username" colspan="2" ><center><p></p></center></td></tr>
                                    <tr class="out">
                                        <td class="input">
                                            <input type="text" name="fname" placeholder=" your frist name" class="short" autocomplete="off" required >
                                        </td>
                                        <td class="input">
                                            <input type="text" name="lname" placeholder=" your last name" class="short" autocomplete="off" >
                                        </td>
                                    </tr>
                                    <tr class="hide">
                                        <td class="error" ><center></center></td>
                                        <td class="error" ><center></center></td>
                                    </tr>
                                    
                                    <tr class="out">
                                        <td class="input" colspan="2">
                                            <input id='email' type="email" name="email" placeholder=" Please Enter Your Valied Email" class="tall" autocomplete="off" required >
                                        </td>
                                        <script>
                                        $(document).ready(function(){
                                            console.log('wasalna');
                                            //chacking username
                                            $('#email').keyup(function(){
                                                console.log('atakena');
                                                var em = $(this).val();
                                                console.log(em);
                                                $.ajax({url:'controller/step1.php',type:'POST',
                                                    data:{email:em},lode:'loging...',
                                                    success:function (ret) {
                                                        console.log('gepna dek on al data');
                                                        $(".email p").html(ret);
                                                    }}
                                                ,200);
                                            });
                                            
                                        });
            
    
                                    </script>
                                    </tr>
                                    <tr class="hide">
                                        <td class="error email" colspan="2"><center> <p></p></center></td>
                                    </tr>
                                    <tr class="out">
                                        <td class="input" colspan="2" id='gender'>
                                            <select name="gender" required >
                                                <option value="1" selected>Male</option>
                                                <option value="2">Famile</option>
                                                <option value="3">Other</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr class="hide">
                                        <td class="error" colspan="2"><center></center></td>
                                    </tr>
                                    <tr><td><center><span id="signinButton">
                                                <script src="https://apis.google.com/js/client:platform.js" async defer></script>
  <span
    class="g-signin"
    data-callback="signinCallback"
    data-clientid="CLIENT_ID"
    data-cookiepolicy="single_host_origin"
    data-requestvisibleactions="http://schema.org/AddAction"
    data-scope="https://www.googleapis.com/auth/plus.login">
  </span>
</span></center></td><td colspan="1"><input type="submit" value=" Sign Up Now " name="step1" id="regbtn"></td></tr>
                            </table>
                        </form>
                    </section>