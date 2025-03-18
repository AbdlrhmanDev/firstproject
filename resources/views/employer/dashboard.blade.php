 @extends('layouts.app')

@section('content')
    <h2  class="text-white">Employer Dashboard</h2>
    <p  class="text-white">Welcome, {{ Auth::user()->name }}! You are logged in as an Employer.</p>
    <a  class="text-white" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        Logout
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
@endsection }    

