@extends('layouts.master')
@section('title', 'Create New Student')
@section('content')

    <div class="container">
        <div class="row text-center mt-5">
            <h1>ADD NEW STUDENT</h1>
        </div>
        @if (session()->has('message'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
            </div>
        @endif
        <div class="row mt-2 mb-3">
            <div>
                <a href="{{ url('/') }}" class="btn btn-primary">Back to Home</a>
            </div>
        </div>
        <div class="row">
            <form method="POST" action="{{ url('student/addStudent') }}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Student Name</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Student Phone number</label>
                    <input type="text" class="form-control" id="phone" aria-describedby="emailHelp" name="phone">
                    <div id="phoneHelp" class="form-text">We'll never share your phone number anyone else.</div>
                </div>
                <div class="g-recaptcha mt-4 mb-4" data-sitekey={{ config('services.recaptcha.key') }}></div>
                <button type="submit" class="btn btn-success">Add Student</button>
            </form>
        </div>
    </div>

@endsection
