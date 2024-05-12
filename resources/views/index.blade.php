    @extends('layouts.master')


    @section('content')
        <div class="container">

            <div class="row">
                <div class="col text-center title">
                    Student Details
                </div>

            </div>
            @if (session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    </button>
                </div>
            @endif

            <div>
                <a href="{{ url('student/newstudent') }}" class="btn btn-primary">Add New Students</a>
            </div>
            <div class="row d-flex justify-content-start mt-5">
                <div class="col-12 ">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Student Name</th>
                                <th scope="col">Student Phone</th>
                                <th scope="col">Student Email</th>
                                <th scope="col">Crated at</th>
                                <th scope="col">Update at</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @foreach ($student as $student)
                                <tr>
                                    <th scope="row">{{ $student->id }}</th>
                                    <td>{{ $student->student_name }}</td>
                                    <td>{{ $student->student_phone }}</td>
                                    <td>{{ $student->student_email }}</td>
                                    <td>{{ $student->created_at}}</td>
                                    <td>{{ $student->updated_at->diffForHumans()}}</td>
                                    <td>
                                        <div class="d-flex align-content-between ">
                                            <a href="{{ url('student/editStudent/'. $student->id) }}" class="btn btn-primary mr-3 action-btn1">Edit</a>
                                            <a href="" class="btn btn-danger">Delete</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    @endsection
