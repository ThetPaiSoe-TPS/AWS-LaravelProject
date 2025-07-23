<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StudentAddRequest;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        // $students = DB::table('students')->get();
        // $students = DB::table('students')->find(2);

        // return $students;
        // $students = Student::all();


        $students = Student::when($request->search, function ($query) use ($request) {
            return $query->whereAny([
                'name',
                'age',
                'email',
                'date_of_birth',
                'score',
                'gender'
            ], 'like', '%' . $request->search . '%');
        })->paginate(5);
        return view('students.index', compact('students'));
    }

    public function create(StudentAddRequest $request)
    {

        $imagePath = null;
        if ($request->hasFile('image')) {
            $photoPath = $request->file('image')->store('photos', 'public');
        }


        $student = new Student();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->age = $request->age;
        $student->gender = $request->gender;
        $student->score = $request->score;
        $student->image = $photoPath;
        $student->save();

        return redirect('students');
    }

    public function edit($id)
    {
        $students = Student::findOrFail($id);
        return view('students.edit', compact('students'));
    }

    public function updates(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        $student->name = $request->name;
        $student->email = $request->email;
        $student->age = $request->age;
        $student->gender = $request->gender;
        $student->score = $request->score;
        $student->update();

        return redirect('students');
    }

    public function delete($id)
    {
        $students = Student::findOrFail($id);
        if ($students->image) {
            Storage::disk('public')->delete($students->image);
        }
        $students->delete();

        return redirect('students');
    }

    public function deleteData()
    {
        // Student::findOrFail(2)->delete();
        // return 'deleted successfully';

        Student::find(2)->forceDelete();
        return 'permenent deleted';
    }

    public function restoreData()
    {
        Student::onlyTrashed()->find(2)->restore();
        return 'successfully restored';
    }


    public function add_data()
    {
        $students = new Student();
        $students->name = 'name45';
        $students->email = 'name45@a.com';
        $students->age = '31';
        $students->date_of_birth = '2009-04-09';
        $students->gender = 'm';
        $students->save();

        return 'Student added successfully';
    }

    public function get_data()
    {
        // $student = Student::find(10);
        $student = Student::all();
        // $student = Student::onlyTrashed()->get();
        // $student = Student::withTrashed()->get();
        return $student;
    }

    public function update_eloquent()
    {
        $student = Student::find(10);
        $student->name = 'updated student name';
        $student->age = '20';
        $student->update();
        return 'Student data updated successfully';
    }

    // public function get_trashed()
    // {
    //     // $student = Student::onlyTrashed()->get();
    //     $student = Student::withTrashed()->get();
    //     return $student;
    // }

    // public function restored()
    // {
    //     Student::withTrashed()->find(5)->restore();
    //     return 'successfully restored';
    // }

    public function delete_eloquent()
    {
        $student = Student::findOrFail(5)->delete();

        return 'Student data deleted successfully';
    }



    public function whereConditions()
    {
        // $student = Student::where('age', '>', 18)->whereBetween('id', [1, 10])->get();
        // $student = Student::where('score', '>=', 40)->where(function ($query) {
        //     $query->where('age', '<', 10)->orWhere('age', '>', 20);
        // })->get();

        // $student = Student::whereNotIn('id', [3, 4, 5])->get();
        // $student = Student::whereAny(['age', 'score'], 25)->get();



        // $student = Student::where('age', '5')->where('id', '5')->get();

        $student = Student::whereAll(['age', 'score', 'id'], '=', 5)->get();

        return $student;
    }

    public function maleScope()
    {
        // $student = Student::where('age', 25)->orWhere('score', 25)->get();
        $student = Student::male()->get();
        return $student;
    }

    public function femaleScope()
    {
        // $student = Student::where('age', 25)->orWhere('score', 25)->get();
        $student = Student::female()->get();
        return $student;
    }

    public function currentTime()
    {
        $student = Student::recent()->get();
        return $student;
    }
}
