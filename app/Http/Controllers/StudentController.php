<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class StudentController extends Controller
{
    public function index()
    {
        return Student::all();
    }
    public function add(Request $request)
    {
        $rules = [
            'name' => "required|min:3 "
        ];
        $validation = validator($request->all(), $rules);
        if ($validation->failded()) {
            return "val failed";
        }
        $student = new Student();
        $student->name = $request->name;
        $student->email = $request->email;
        if ($student->save()) {
            return "Saved";
        }
    }
    public function update(Request $request)
    {
        $student = Student::find($request->id);
        $student->name = $request->name;
        $student->email = $request->email;
        if ($student->save()) {
            return "updtaed";
        }
    }
    public function delete($id)
    {


        $student = Student::destroy($id);
        if ($student) {
            return "deleted";
        }
    }


}
