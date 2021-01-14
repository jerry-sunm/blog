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
            <form method="POST" action="/users/students/insert" name="stuForm">
                <div class="insertstudent">
                    <h1>학생정보등록</h1>

                    <div>
                        <div class="insertForm">
                            <table>
                                <tr>
                                    <th>이름</th>
                                    <td>
                                        @foreach($user_info as $info)
                                        <input type="hidden" name="id" value="{{ $info->id }}" readonly>
                                        <input type="text" name="name" value="{{ $info->name }}" readonly>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>학년</th>
                                    <td>
                                        <input type="radio" name="grade" value="1학년"> 1학년
                                        <input type="radio" name="grade" value="2학년"> 2학년
                                        <input type="radio" name="grade" value="3학년"> 3학년
                                        <input type="radio" name="grade" value="4학년"> 4학년
                                    </td>
                                </tr>
                                <tr>
                                    <th>나이</th>
                                    <td>
                                        <input type="number" name="age" id="age" required>
                                    </td>
                                </tr>
                                <tr>
                                    <th>전공</th>
                                    <td>
                                        <input type="text" name="major" id="major" required>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        
                        <div class="btn">
                            <button type="button" class="student_info" onclick="student_check()">학생정보등록</button>
                            <a type="button" class="user_login" href="/users/logout">로그아웃</a>
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

    function student_check() {
        var grade = document.getElementsByName("grade").value;
        var age = document.getElementById("age");
        var major = document.getElementById("major");


        if(grade=="") {
            alert("학년을 입력해주세요.");
            grade.focus();
            return false;
        }

        if(age.value=="") {
            alert("나이를 입력해주세요.");
            age.focus();
            return false;
        }

        if(major.value=="") {
            alert("전공을 입력해주세요.");
            major.focus();
            return false;
        }

        var majorReg = /^[가-힣]{2,10}$/g;
        if(!majorReg.test(major.value)) {
            alert("전공을 형식에 맞게 입력해주세요.");
            major.focus();
            return false;
        }

        document.stuForm.submit();
    }
</script>