<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;


class StudentController extends Controller
{

    public function getStudents()
    {
        $stu = Student::get();
        return $stu;
    }

    public function getStudentById ($action, $id)
    {
        $stu = Student::where($action, $id)->get();
        return $stu;
    }

    public function insertStudent (Request $request)
    {
        $data = [
            'name'=>$request->name, 
            'grade'=>$request->grade,
            'age'=>$request->age,
            'major'=>$request->major,
            'create_date'=>$request->create_date,
            'modify_date'=>$request->modify_date
        ];

        Student::insert($data);
        $result = Student::get();
    
        return $result;
    }

    public function updateStudentByName(Request $request)
    {
        $name = $request->name;

        $data = [
            'grade'=>$request->grade,
            'age'=>$request->age,
            'major'=>$request->major,
            'modify_date'=>$request->modify_date
        ];

        Student::where('name',$name)->update($data);
        $result = Student::where('name',$name)->get();

        return $result;
    }

    public function deleteStudentByName($name)
    {
        Student::where('name',$name)->delete();
        $stu = Student::get();
        return $stu;
    }

    

}
