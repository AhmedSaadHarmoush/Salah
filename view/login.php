<section id="forms">
    <form class="form" id="form1" action="" method="post">
        <!--error div-->
        <div class="error"><p><?php
                if (isset($error)) {
                    echo $error;
                }
                ?></p></div>
        <!--error div done-->
        <input  type="text" class="fucking-input" placeholder=" User name Or Email" id="username" required autocomplete="off" name="username"/>
        <script>
            $(document).ready(function () {
                //chacking username
                $('#username').keyup(function () {
                    var un = $(this).val();
                    $.ajax({url: 'controller/un.php', type: 'POST',
                        data: {username: un}, lode: 'loging...',
                        success: function (ret) {
                            $(".eun p").html(ret);
                        }}
                    , 200);
                });
            });
        </script>
        <div class="eun"><p></p></div>
        <input  type="password" class="fucking-input" id="password" placeholder="Password" required autocomplete="off" name="password"/>
        <script>
            $(document).ready(function () {
                //chacking username
                $('#password').keyup(function () {
                    var pw = $(this).val();
                    $.ajax({url: 'controller/un.php', type: 'POST',
                        data: {password: pw}, lode: 'loging...',
                        success: function (ret) {
                            $(".pun p").html(ret);
                        }}
                    , 200);
                });
            });
        </script>
        <div class="pun"><p></p></div>
        <br><br>
        <div class="fix">
            <div class="checkboxFive">
                <input type="checkbox" value="1" id="checkboxFiveInput" name="ramemper" />
                <label for="checkboxFiveInput"></label>
                <p class="remember">Remember me</p>
            </div>
        </div>
        <div id="aaa">
            <script src="https://apis.google.com/js/client:platform.js" async defer></script>
            <span
                class="g-signin"
                data-callback="signinCallback"
                data-clientid="CLIENT_ID"
                data-cookiepolicy="single_host_origin"
                data-requestvisibleactions="http://schema.org/AddAction"
                data-scope="https://www.googleapis.com/auth/plus.login">
            </span>
            </span><input  type="submit" value="Login" id="submit" name="login">
        </div>          
    </form>

    <div class="aaaa">
        <a href="#" id="signup" target="_blank">Forget Password?</a>
        <a href="reg.php" id="signup">New user?</a>

    </div>    
</section>