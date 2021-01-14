<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .btn button, a {
                width: 100px;
                height: 20px;
                margin-top: 20px;
            }
        </style>
    </head>
    <body>
        <div class="content">
            <div class="login">
                <h1>Login</h1>

                <div>
                    <form method="POST" action='/users/login'>
                        
                        <div class="loginForm">
                            <input type="text" class='login_id' name="login_id" maxlength="10">
                            <input type="password" class='passwd' name="passwd" maxlength="15">
                        </div>
                        
                        <div class="btn">
                            <button type="submit" class="user_login">로그인</button>
                            <a type="button" class="user_join" href="/users/join">회원가입</a>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </body>

</html>

<script language="javascript">
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
        alert(msg);
    }
</script>