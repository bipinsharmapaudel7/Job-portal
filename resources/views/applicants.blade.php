<!-- all_applications.blade.php -->
@include('navbar.header')

<h1>All Job Applications</h1>

@if($applications->isEmpty())
    <div>No job applications found!</div>
@else
    @foreach($applications as $application)
        <div>
            <div>Job Title: {{ $application->job->title }}</div>
            <div>Name: {{ $application->user->name }}</div>
            <div>Email: {{ $application->user->email }}</div>
            <!-- Display other application details as needed -->
            <hr>
        </div>
    @endforeach
@endif
<a href="{{ route('dashboard') }}">Back to Dashboard</a>        

@include('navbar.footer')