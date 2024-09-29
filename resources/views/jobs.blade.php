<style>
	/* Global Styles */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

/* Header Styles */
h1 {
    margin-top: 20px;
    margin-bottom: 10px;
}

a.btn.btn-primary {
    background-color: #007bff; /* Blue color */
    color: #fff; /* White text color */
    padding: 5px 10px; /* Adjust padding for a smaller size */
    border-radius: 5px; /* Rounded corners */
    text-decoration: none; /* Remove underlines */
    font-size: 14px; /* Adjust font size */
}

a.btn.btn-primary:hover {
    background-color: #0056b3; /* Darker shade of blue on hover */
}


/* Add Job Link Styles */
a.add-job-link {
    display: inline-block;
    padding: 5px 10px;
    background-color: #337ab7;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
}

a.add-job-link:hover {
    background-color: #286090;
}


form {
    margin-bottom: 20px;
}

form label {
    font-weight: bold;
}

form select {
    padding: 5px;
    border-radius: 5px;
}

form button {
    padding: 5px 10px;
    background-color: #5cb85c;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

form button:hover {
    background-color: #4cae4c;
}

/* Job List Styles */
.job-item {
    margin-bottom: 20px;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.job-item h2 {
    margin-top: 0;
    margin-bottom: 5px;
}

.job-item .info {
    margin-bottom: 5px;
}

.job-item .actions a {
    margin-right: 10px;
    text-decoration: none;
    color: #337ab7;
}

.job-item .actions a:hover {
    color: #23527c;
}

.job-item hr {
    margin-top: 10px;
    margin-bottom: 0;
}

</style>

@include('navbar.header');
<h1>Job List</h1>
@if(Auth::check() && Auth::user()->role == 2)
	<a href="{{ route('add_job') }}" class="btn btn-primary">Add a new job!</a>
@endif
  
<form action="{{ route('jobs') }}" method="get">
	<label>Catgeory:</label>
	<select name="category">
		@foreach($categories as $category)
			<option value="{{ $category->id }} ">{{ $category->title }}</option>
		@endforeach
	</select>
	<button type="submit">Go!</button>
</form>

@foreach($jobs as $job)
	<div>
		<h2>{{ $job->title }}</h2>
		<div>Category: {{ $job->category->title }}</div>
		<div>Apply before: {{ $job->deadline->format('jS M Y') }}</div>
		<div>
			Company:{{ $job->user->company->name }}
		</div>
		<a href="{{ route('show_job', $job->id) }}">View more</a>
		@if(Auth::check() && (Auth::user()->role == 2 || Auth::user()->id == $job->user_id))
           <a href="{{ route('jobs.edit', $job->id) }}" class="btn btn-secondary">Edit</a>
           <form action="{{ route('delete_job', $job->id) }}" method="post" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="back-home-link" onclick="return confirm('Are you sure you want to delete this job?')">Delete</button>
            </form>
        @endif
		<hr>
	</div>
@endforeach

{{ $jobs->links() }}  

@include('navbar.footer')



