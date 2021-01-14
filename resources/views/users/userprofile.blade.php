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
            <div class="userprofile">
                <h1>회원정보</h1>

                <div>
                    <div class="infoForm">
                        <table>
                            @foreach($userinfo as $info)
                            <tr>
                                <th>이름</th>
                                <td>
                                    <input type="text" name="name" value="{{ $info->name }}" readonly>
                                </td>
                            </tr>
                            <tr>
                                <th>전화번호</th>
                                <td>
                                    <input type="text" name="tel" value="{{ $info->tel }}" readonly>
                                </td>
                            </tr>
                            <tr>
                                <th>주소</th>
                                <td>
                                    <input type="text" name="addr" value="{{ $info->addr }}" readonly>
                                </td>
                            </tr>
                            <tr>
                                <th>성별</th>
                                <td>
                                    <input type="text" name="gender" value="{{ $info->gender }}" readonly>
                                </td>
                            </tr>
                            <tr>
                                <th>이메일</th>
                                <td>
                                    <input type="text" name="email" value="{{ $info->email }}" readonly>
                                </td>
                            </tr>
                            <tr>
                                <th>가입날짜</th>
                                <td>
                                    <input type="text" name="join_date" value="{{ $info->join_date }}" readonly>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                    
                    <div class="btn">
                        <a type="button" class="user_logout" href="/users/logout">로그아웃</a>
                    </div>
                </div>

            </div>
        </div>
    </body>

</html>