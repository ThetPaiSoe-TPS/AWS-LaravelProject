@extends('layouts.app')

@section('title', 'Add Student')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger my-5">
            <ul>
                @foreach ($errors->all() as $error)
                    <li> {{ $error }} </li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="mt-3">Add New Student</h2>

            <form action="{{ url('students/create') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')

                <div class="mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input value="{{ old('name') }}" type="text" name="name" id="name" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input value="{{ old('email') }}" type="email" name="email" id="email" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="age" class="form-label">Age:</label>
                    <input type="number" value="{{ old('age') }}" name="age" id="age" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="date_of_birth" class="form-label">Date of Birth:</label>
                    <input type="date" name="date_of_birth" class="form-control" id="">
                </div>

                <div class="mb-3">
                    <label class="form-label d-block">Gender:</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="male" value="m" checked>
                        <label class="form-check-label" for="male">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="female" value="f">
                        <label class="form-check-label" for="female">Female</label>
                    </div>
                    <div class="mb-3">
                        <label for="score" class="form-label">Score:</label>
                        <input type="number" name="score" id="score" value="{{ old('score') }}" class="form-control"
                            value="0">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image:</label>
                        <input type="file" name="image" id="image" class="form-control" accept="image/*"
                            value="0">
                    </div>
                    <button type="submit" class="btn btn-success">Add Student</button>
                    <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
                </div>


            </form>
        </div>
    </div>
@endsection
