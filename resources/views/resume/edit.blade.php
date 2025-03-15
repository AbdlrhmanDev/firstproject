@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Your Resume</h2>

        <form action="{{ route('resume.update') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="full_name" class="form-label">Full Name</label>
                <input type="text" name="full_name" class="form-control" value="{{ $resume->full_name }}" required>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" name="phone" class="form-control" value="{{ $resume->phone }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="{{ $resume->email }}" required>
            </div>

            <div class="mb-3">
                <label for="summary" class="form-label">Summary</label>
                <textarea name="summary" class="form-control" required>{{ $resume->summary }}</textarea>
            </div>

            <div class="mb-3">
                <label for="skills" class="form-label">Skills</label>
                <textarea name="skills" class="form-control">{{ $resume->skills }}</textarea>
            </div>

            <button type="submit" class="btn btn-success">Update Resume</button>
        </form>
    </div>
@endsection