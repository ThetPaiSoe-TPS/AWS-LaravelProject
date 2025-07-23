<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TestingController;
use App\Models\Student;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::prefix('details')->group(function () {
    Route::get('/student', function () {
        return 'This is students';
    });

    Route::get('/teacher', function () {
        return 'This is teacher';
    });
});

Route::get('/student/{id}/{reg}', function ($id, $reg) {
    return 'student ID is: ' . $id . 'and registration number is: ' . $reg;
});



Route::fallback(function () {
    return 'This is 404 page';
});


Route::get('/about-us', function () {
    $name = 'name1';
    $email = 'email1@eg.com';
    // return view('aboutus')->with('name', $name)->with('email', $email);
    // return view('aboutus', compact('name', 'email'));
    return view('aboutus', ['name' => $name, 'email' => $email]);
});

Route::view('contact-us', 'contactus');

Route::get('/testing', TestingController::class);

Route::resource('/task', TaskController::class);

Route::controller(StudentController::class)->group(function () {
    // Route::get('/students', 'index')->name('students');
    // Route::get('/students/update', 'update')->name('students.update');
    Route::get('/students/add', 'add_data')->name('students.add');
    Route::get('/students/get', 'get_data')->name('students.get');
    Route::get('/students/update-eloquent', 'update_eloquent')->name('studetns.eloquent.update');
    Route::get('/students/where', 'whereConditions');
    Route::get('/students/maleScope', [StudentController::class, 'maleScope']);
    Route::get('/students/femaleScope', [StudentController::class, 'femaleScope']);
    Route::get('/students/recent', [StudentController::class, 'currentTime']);
    // Route::get('/students/delete', [StudentController::class, 'deleteData']);
    Route::get('/students/restore', [StudentController::class, 'restoreData']);
});

Route::prefix('students')->controller(StudentController::class)->group(function () {
    Route::get('/', 'index');
    Route::view('add', 'students.create');
    Route::post('create', 'create');
    Route::get('edit/{id}', 'edit')->name('students.edit');
    Route::post('/update/{id}', 'updates')->name('students.update');
    Route::delete('/delete/{id}', 'delete')->name('students.delete');
});
