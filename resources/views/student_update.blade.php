
@extends('layouts.master')
@section('title','Update Student details')
@section('content')

<div class="container">

    <div class="row text-center mt-5">
        <h1>UPDATE STUDENT DETAILS</h1>
    </div>
    <div class="row mt-2 mb-3">
        <div>
            <a href="{{ url('/') }}" class="btn btn-primary">Back to Home</a>
        </div>
    </div>
    <div class="row">
        <form method="POST" action="{{ url('student/updateStudent/'. $student->id) }}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Student Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $student->student_name }}">
              </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" value="{{ $student->student_email }}">
              <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Student Phone number</label>
                <input type="text" class="form-control" id="phone" aria-describedby="emailHelp" name="phone" value="{{ $student->student_phone }}">
                <div id="phoneHelp" class="form-text">We'll never share your phone number anyone else.</div>
              </div>

            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
</div>

@endsection
