<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;



Route::GET('/',[StudentController::class,'getStudents']);
Route::GET('student/newstudent',[StudentController::class,'addStudent']);
Route::POST('student/addStudent',[StudentController::class,'saveStudent']);
Route::GET('student/editStudent/{stu_id}',[StudentController::class,'editStudent']);
Route::POST('student/updateStudent/{stu_id}',[StudentController::class,'updateStudent']);
