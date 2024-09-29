<div>
	<h2>{{ $job->title }}</h2>
	@if($job->photo)
		<img src="\uploads\{{ $job->photo }}" height="200">
	@endif
	<div>Category: {{ $job->catgetory_id }}</div>
	<div>Type: {{ $job->type }}</div>
	<div>Salary: {{ $job->salary }}</div>
	<div>Description: {{ $job->description }}</div>
	<div>Apply before: {{ $job->deadline->format('jS M Y') }}</div>

	<div>
		Company: {{ $job->user->company->name }}<br>
		Location: {{ $job->user->company->address }}<br>
		Contact: {{ $job->user->company->phone }}<br>
		Web: {{ $job->user->company->URL }}<br>
	</div>

	@if(Auth::check() && Auth::user()->role==1 )
           @if($job->deadline >= now())
            <a href="{{ route('apply_job_form', ['id' => $job->id]) }}" class="link apply-link">Apply Now</a>
        @else
            <p>The deadline for this job has passed. The job has expired.</p>
        @endif
        @endif

        @if(Auth::check() && Auth::user()->role==2 )
            <a href="{{ route('applications', ['id' => $job->id]) }}" class="link applications-link">Application</a>
        @endif
	<a href="{{ route('jobs') }}">Back to job list</a>

</div>