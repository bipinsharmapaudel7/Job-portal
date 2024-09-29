@include('navbar.header')
<div class="container job-applications">
    <h1 class="page-title">My Job Applications</h1>
    @if($applications->isEmpty())
        <p class="no-applications">You have not applied for any jobs yet. <a href="{{ route('jobs') }}">Browse available jobs</a> and apply now!</p>
    @else
        <ul class="application-list">
            @foreach($applications as $application)
                <li class="application-item">
                    <strong class="job-title">Job Title:</strong> {{ $application->job->title }}<br>
                    <strong class="applied-date">Applied Date:</strong> {{ $application->created_at->format('Y-m-d') }}<br>
                    <strong class="status">Status:</strong> {{ $application->status }}
                </li>
            @endforeach
        </ul>
    @endif
</div>

@include('navbar.footer')
