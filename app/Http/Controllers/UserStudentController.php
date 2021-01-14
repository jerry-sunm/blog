<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserStudentController extends Controller
{
    
    public function logout(Request $request) 
    {
        $request->session()->forget('userid');
        return view('users.login');
    }

    public function user(Request $request) 
    {
        // $data = $request->session()->all();
        // return $data;
        
        // 세션 검사
        if ($request->session()->has('userid')) {
            return redirect()->action('UserStudentController@profile', ['id' => $request->session()->get('userid')]);
            // return $request->session()->get('userid');
        }
        else return view('users.login');
    }

    /* 로그인 */
    // users/login POST
    public function login(Request $request) 
    {
        $login_id = $request->login_id;
        $passwd = $request->passwd;

        $id = User::where('login_id', $login_id)->value('id');
        $user_cnt = User::select(DB::raw('count(*) as cnt'))->where('id',$id)->count();

        // tb_users 테이블에 정보가 있을때
        if($user_cnt != 0) {  
            $val = User::where('login_id', $login_id)->value('passwd');
            
            // 비밀번호 검증
            if(Hash::check($passwd, $val)) {
                $student_cnt = Student::select(DB::raw('count(*) as cnt'))->where('user_id',$id)->count();
                session(['userid' => $id]); // 세션 저장
                
                if($student_cnt != 0) {
                    // return redirect()->action('UserStudentController@student', ['id' => $id]);
                    $studinfo = DB::connection('db_test')->table('tb_students')
                        ->join('tb_users','tb_students.user_id','=','tb_users.id')
                        ->where('tb_students.user_id',$id)
                        ->get();

                    // return $studinfo->all();
                    return view('users.studentinfo', compact('studinfo'));
                }
                else if($student_cnt == 0) {
                    // return redirect()->action('UserStudentController@studentCreate', ['id' => $id])->with('alert','등록된 학생정보가 없습니다. 등록페이지로 이동합니다.');
                    
                    $user_info = User::where('id', $id)->get();
                    return view('users.insertStudent', compact('user_info'))->with('alert','등록된 학생정보가 없습니다. 등록페이지로 이동합니다.');    
                }
                // return $studinfo->all();
            }
            else {
                return redirect()->back()->with('alert','비밀번호가 일치하지 않습니다.');
            }
        }
        // tb_users 테이블에 정보가 없을때
        else if($user_cnt == 0) {
            return redirect()->action('UserStudentController@join')->with('alert','회원이 존재하지 않습니다. 회원가입창으로 넘어갑니다.');
        }
        
    }

    /* 회원가입 */
    public function join() 
    {
        $now = date('Y-m-d H:i:s');
        return view('users.join', compact('now')); // compact 안쓰고 $now로 보내면 undifined 뜸
    }

    // users/join POST
    public function userJoin(Request $request) 
    {
        $password = $request->passwd;
        // 비밀번호 암호화
        $pass = Hash::make($password);

        $user_data = [
            'login_id' => $request->login_id,
            'passwd' => $pass,
            'name' => $request->name,
            'tel' => $request->tel,
            'addr' => $request->addr,
            'gender' => $request->gender,
            'email' => $request->email,
            'state' => '활동',
            'join_date' => $request->join_date
        ];

        // return $user_data;
        User::insert($user_data);

        // return view('users.login');
        return redirect()->action('UserStudentController@user')->with('alert','회원가입이 성공적으로 완료되었습니다.');
        
    }
    

    /*
    // 학생 정보 출력
    public function student($id) 
    {
        $studinfo = DB::connection('db_test')->table('tb_students')
                ->join('tb_users','tb_students.user_id','=','tb_users.id')
                ->where('tb_students.user_id',$id)
                ->get();

        // return $studinfo->all();
        return view('users.studentinfo', compact('studinfo'));
    }

    // 학생정보등록
    public function studentCreate(Request $request, $id) 
    {
        $info = User::where('id', $id)->get();
        return view('users.insertStudent', compact('info'));
    }
    */

    public function insertStudent(Request $request) 
    {
        $now = date('Y-m-d H:i:s');
        $stu_data = [
            'name'=>$request->name,
            'grade'=>$request->grade,
            'age'=>$request->age,
            'major'=>$request->major,
            'create_date'=>$now,
            'modify_date'=>$now,
            'user_id'=>$request->id
        ];

        // return $stu_data;
        Student::insert($stu_data);

        return redirect()->action('UserStudentController@student', ['id' => $stu_data['user_id']])->with('alert','학생정보가 정상적으로 등록되었습니다.');
    }

    /* 유저 정보 출력 */
    public function profile($id) 
    {
        $userinfo = User::where('id',$id)->get();
        return view('users.userprofile', compact('userinfo'));
    }


    

}
