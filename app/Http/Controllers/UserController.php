<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;


class UserController extends Controller
{

    public function getUsers()
    {
        $user = User::get();
        return $user;
    }

    public function getUserByLoginId ($login_id)
    {
        $user = User::where('login_id',$login_id)->get();
        return $user;
    }

    public function insertUser (Request $request)
    {
        $data = [
            'login_id'=>$request->login_id,
            'passwd'=>$request->passwd,
            'name'=>$request->name,
            'tel'=>$request->tel,
            'addr'=>$request->addr,
            'gender'=>$request->gender,
            'email'=>$request->email,
            'state'=>$request->state,
            'join_date'=>$request->join_date
        ];

        User::insert($data);
        $result = User::get();
    
        return $result;
    }

    public function updateUserByLoginId(Request $request)
    {
        $login_id = $request->login_id;

        $data = [
            'passwd'=>$request->passwd,
            'name'=>$request->name,
            'tel'=>$request->tel,
            'addr'=>$request->addr,
            'gender'=>$request->gender,
            'email'=>$request->email,
            'state'=>$request->state
        ];

        User::where('login_id',$login_id)->update($data);
        $result = User::where('login_id',$login_id)->get();

        return $result;
    }

    public function deleteUserByLoginId($login_id)
    {
        User::where('login_id',$login_id)->delete();
        $user = User::get();
        return $user;
    }

}
