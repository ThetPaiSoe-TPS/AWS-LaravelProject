@extends('layouts.app')

@section('title', 'Edit User')

@section('content')
    <div class="container">
        <div class="row col-md-8">
            <h2>Edit User</h2>
            <form action="{{ url('students/update', $students->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="">Name</label>
                    <input type="text" name="name" value="{{ $students->name }}" class="form-control" id="">
                </div>
                <div class="mb-3">
                    <label for="">Email</label>
                    <input type="email" name="email" value="{{ $students->email }}" class="form-control" id="">
                </div>
                <div class="mb-3">
                    <label for="">Date of Birth</label>
                    <input type="date" name="dob" value="{{ $students->date_of_birth }}" class="form-control"
                        id="">
                </div>
                <div class="mb-3">
                    <label for="">Age</label>
                    <input type="number" name="age" value="{{ $students->age }}" class="form-control" id="">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Gender</label>
                    <div class="">
                        <div class="form-check form-check-inline">
                            <input type="radio" name="gender" class="form-check-input" value="m" id="genderMale"
                                {{ $students->gender === 'm' ? 'checked' : '' }}>
                            <label for="genderMale">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" name="gender" class="form-check-input" value="f" id="genderFemale"
                                {{ $students->gender === 'f' ? 'checked' : '' }}>
                            <label for="genderFemale">Female</label>
                        </div>
                    </div>

                </div>
                <div class="mb-3">
                    <label for="">Score</label>
                    <input type="number" value="{{ $students->score }}" name="score" id="">
                </div>
                <button type="submit" class="btn btn-warning">Update</button>
                <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
            </form>
        </div>
    </div>
@endsection
