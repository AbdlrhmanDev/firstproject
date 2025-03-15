@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Your Resume</h2>

        <div class="card">
            <div class="card-body">
                <h4>{{ $resume->full_name }}</h4>
                <p><strong>Phone:</strong> {{ $resume->phone }}</p>
                <p><strong>Email:</strong> {{ $resume->email }}</p>
                <p><strong>Summary:</strong> {{ $resume->summary }}</p>
                <p><strong>Skills:</strong> {{ $resume->skills }}</p>
                <p><strong>Experience:</strong> {{ $resume->experience }}</p>
                <p><strong>Education:</strong> {{ $resume->education }}</p>
                <a href="{{ route('resume.edit') }}" class="btn btn-primary">Edit Resume</a>
            </div>
        </div>
    </div>
@endsection