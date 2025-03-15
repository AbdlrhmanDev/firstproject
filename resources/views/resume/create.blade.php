@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Create Your Resume</h2>

        <form action="{{ route('resume.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="full_name" class="form-label">Full Name</label>
                <input type="text" name="full_name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" name="phone" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="summary" class="form-label">Summary</label>
                <textarea name="summary" class="form-control" required></textarea>
            </div>

            <div class="mb-3">
                <label for="skills" class="form-label">Skills</label>
                <textarea name="skills" class="form-control"></textarea>
            </div>

            <div class="mb-3">
                <label for="experience" class="form-label">Experience</label>
                <textarea name="experience" class="form-control"></textarea>
            </div>

            <div class="mb-3">
                <label for="education" class="form-label">Education</label>
                <textarea name="education" class="form-control"></textarea>
            </div>

            <button type="submit" class="btn btn-success">Save Resume</button>
        </form>
    </div>
@endsection