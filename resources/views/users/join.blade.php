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
            <form method="POST" id="joinForm" name="joinForm" action="/users/join">
                <div class="join">
                    <h1>회원가입</h1>

                    <div>
                        <div class="joinForm">
                            <table>
                                <tr>
                                    <th>아이디</th>
                                    <td>
                                        <input type="text" name="login_id" id="login_id" required>
                                    </td>
                                </tr>
                                <tr>
                                    <th>비밀번호</th>
                                    <td>
                                        <input type="password" name="passwd" id="passwd" required>
                                    </td>
                                </tr>
                                <tr>
                                    <th>이름</th>
                                    <td>
                                        <input type="text" name="name" id="name" required>
                                    </td>
                                </tr>
                                <tr>
                                    <th>전화번호</th>
                                    <td>
                                        <input type="text" name="tel" id="tel" maxlength="11" required>
                                    </td>
                                </tr>
                                <tr>
                                    <th>주소</th>
                                    <td>
                                        <input type="text" name="addr" id="addr" required>
                                    </td>
                                </tr>
                                <tr>
                                    <th>성별</th>
                                    <td>
                                        <input type="radio" name="gender" id="gender" value="남"> 남
                                        <input type="radio" name="gender" id="gender" value="여"> 여
                                    </td>
                                </tr>
                                <tr>
                                    <th>이메일</th>
                                    <td>
                                        <input type="text" name="email" id="email" required>
                                    </td>
                                </tr>
                                <tr>
                                    <th>회원가입 날짜</th>
                                    <td>
                                        <input type="text" name="join_date" value="{{ $now }}" readonly>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        
                        <div class="btn">
                            {{-- <button type="submit" class="user_join">회원가입</button> --}}
                            <button type="button" class="user_join" onclick="join_check(event)">회원가입</button>
                            <a type="button" class="user_login" href="/users/login">로그인페이지 이동</a>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </body>
</html>

<script language="javascript">
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
        alert(msg);
    }

    
    function join_check(e)
    {
        e.preventDefault();

        var login_id = document.getElementById("login_id");
        var passwd = document.getElementById("passwd");
        var name = document.getElementById("name");
        var tel = document.getElementById("tel");
        var gender = document.getElementById("gender");
        var addr = document.getElementById("addr");
        var email = document.getElementById("email");


        if(login_id.value=="") {
            alert("아이디를 입력해주세요.");
            login_id.focus();
            return false;
        }


        var idReg = /^[a-zA-Z0-9]{4,19}$/g;
        if(!idReg.test(login_id.value)) {
            alert("아이디를 형식에 맞게 입력해주세요.");
            login_id.focus();
            return false;
        }

        if(passwd.value=="") {
            alert("비밀번호를 입력해주세요.");
            passwd.focus();
            return false;
        }

        var passwdReg = /^(?=.*[a-zA-Z])(?=.*[0-9]).{6,12}$/g;
        if(!passwdReg.test(passwd.value)) {
            alert("비밀번호를 형식에 맞게 입력해주세요.");
            passwd.focus();
            return false;
        }

        if(name.value=="") {
            alert("이름을 입력해주세요.");
            name.focus();
            return false;
        }

        var nameReg = /^[가-힣]{2,10}$/g;
        if(!nameReg.test(name.value)) {
            alert("이름을 형식에 맞게 입력해주세요.");
            name.focus();
            return false;
        }

        if(tel.value=="") {
            alert("전화번호를 입력해주세요.");
            tel.focus();
            return false;
        }

        var telReg = /^(010|011|016|017|018|019)[0-9]{8}/g;
        if(!telReg.test(tel.value)) {
            alert("전화번호를 형식에 맞게 입력해주세요.");
            tel.focus();
            return false;
        }

        if(addr.value=="") {
            alert("주소를 입력해주세요.");
            addr.focus();
            return false;
        }

        // var addrReg = /^[가-힣]{3,15}$/g;
        // if(!addrReg.test(addr.value)) {
        //     alert("주소를 형식에 맞게 입력해주세요.");
        //     addr.focus();
        //     return false;
        // }

        if(gender.value=="") {
            alert("성별을 선택해주세요.");
            gender.focus();
            return false;
        }

        if(email.value=="") {
            alert("이메일을 입력해주세요.");
            email.focus();
            return false;
        }

        var emailReg = /^([a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+(\.[-a-zA-Z0-9]+)+)*$/g;
        if(!emailReg.test(email.value)) {
            alert("이메일을 형식에 맞게 입력해주세요.");
            email.focus();
            return false;
        }

        document.joinForm.submit();
        
    }
    
    

    /*
    function join_check() {
        var login_id = document.getElementById("login_id");
        var passwd = document.getElementById("passwd");
        var name = document.getElementById("name");
        var tel = document.getElementById("tel");
        var gender = document.getElementById("gender");
        var addr = document.getElementById("addr");
        var email = document.getElementById("email");


        if(login_id.value=="") {
            alert("아이디를 입력해주세요.");
            login_id.focus();
            return false;
        }


        var idReg = /^[a-zA-Z0-9]{4,19}$/g;
        if(!idReg.test(login_id.value)) {
            alert("아이디를 형식에 맞게 입력해주세요.");
            login_id.focus();
            return false;
        }

        if(passwd.value=="") {
            alert("비밀번호를 입력해주세요.");
            passwd.focus();
            return false;
        }

        var passwdReg = /^(?=.*[a-zA-Z])(?=.*[0-9]).{6,12}$/g;
        if(!passwdReg.test(passwd.value)) {
            alert("비밀번호를 형식에 맞게 입력해주세요.");
            passwd.focus();
            return false;
        }

        if(name.value=="") {
            alert("이름을 입력해주세요.");
            name.focus();
            return false;
        }

        var nameReg = /^[가-힣]{2,10}$/g;
        if(!nameReg.test(name.value)) {
            alert("이름을 형식에 맞게 입력해주세요.");
            name.focus();
            return false;
        }

        if(tel.value=="") {
            alert("전화번호를 입력해주세요.");
            tel.focus();
            return false;
        }

        var telReg = /^(010|011|016|017|018|019)[0-9]{8}/g;
        if(!telReg.test(tel.value)) {
            alert("전화번호를 형식에 맞게 입력해주세요.");
            tel.focus();
            return false;
        }

        if(addr.value=="") {
            alert("주소를 입력해주세요.");
            addr.focus();
            return false;
        }

        // var addrReg = /^[가-힣]{3,15}$/g;
        // if(!addrReg.test(addr.value)) {
        //     alert("주소를 형식에 맞게 입력해주세요.");
        //     addr.focus();
        //     return false;
        // }

        if(gender.value=="") {
            alert("성별을 선택해주세요.");
            gender.focus();
            return false;
        }

        if(email.value=="") {
            alert("이메일을 입력해주세요.");
            email.focus();
            return false;
        }

        var emailReg = /^([a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+(\.[-a-zA-Z0-9]+)+)*$/g;
        if(!emailReg.test(email.value)) {
            alert("이메일을 형식에 맞게 입력해주세요.");
            email.focus();
            return false;
        }

        document.joinForm.submit();
    }
    */
    
    


</script>