@extends('layouts.app')
@section('title', 'Create Student')

@section('content')
    <h2 class="mt-3">User Table</h2>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form action="{{ URL('students') }}" class="d-flex" role="search" method="GET">
                    @csrf
                    <input type="text" class="form-control me-2" name="search" id="">
                    <button type="submit" class="btn btn-primary">Search</button>
                    <a href="{{ URL('students/add') }}" class="btn btn-success ms-2">Create</a>
                </form>
            </div>
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Age</th>
                <th>Date of Birth</th>
                <th>Gender</th>
                <th>Score</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($students as $student)
                <tr>
                    <td> {{ $student->id }} </td>
                    <td> {{ $student->name }} </td>
                    <td> {{ $student->email }} </td>
                    <td> {{ $student->age }} </td>
                    <td> {{ $student->date_of_birth }} </td>
                    <td> {{ $student->gender }} </td>
                    <td> {{ $student->score }} </td>
                    <td>
                        @if ($student->image)
                            <img src="{{ asset('storage/' . $student->image) }}" width="100" alt="">
                        @endif
                    </td>

                    <td class="align-middle">
                        <div class="d-flex flex-row align-items-center justify-content-center gap-2">
                            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ url('students/delete', $student->id) }}" method="POST"
                                onsubmit="return confirm('Are you sure to delete this student?');">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </td>

                </tr>
            @endforeach

            <!-- Additional rows here -->
        </tbody>
    </table>

    <div class="paginationDiv mt-5">
        {{ $students->links('pagination::bootstrap-5') }}
    </div>

@endsection
